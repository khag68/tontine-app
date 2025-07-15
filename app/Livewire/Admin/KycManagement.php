<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use App\Models\KycDocument;
use App\Models\AdminAction;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class KycManagement extends Component
{
    use WithPagination;

    public $selectedDocument;
    public $adminNotes = '';
    public $filter = 'pending';
    public $perPage = 10;

    public function render()
    {
        return view('livewire.admin.kyc-management', [
            'kycDocuments' => KycDocument::with('user')
                ->where('status', $this->filter)
                ->latest()
                ->paginate($this->perPage)
        ]);
    }

    public function selectDocument($documentId)
    {
        $this->selectedDocument = KycDocument::with('user')->findOrFail($documentId);
    }

    public function approveDocument()
    {
        $this->selectedDocument->update([
            'status' => 'approved',
            'admin_notes' => $this->adminNotes
        ]);

        $user = $this->selectedDocument->user;
        $user->update(['kyc_status' => 'verified']);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_KYC_VALIDATION,
            'target_id' => $user->id,
            'action_details' => [
                'document_id' => $this->selectedDocument->id,
                'status' => 'approved',
            ],
            'notes' => $this->adminNotes,
        ]);

        $this->createNotification($user->id, 'kyc_approved');
        $this->reset(['selectedDocument', 'adminNotes']);
    }

    public function rejectDocument()
    {
        $this->selectedDocument->update([
            'status' => 'rejected',
            'admin_notes' => $this->adminNotes
        ]);

        $user = $this->selectedDocument->user;
        $user->update(['kyc_status' => 'rejected']);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_KYC_VALIDATION,
            'target_id' => $user->id,
            'action_details' => [
                'document_id' => $this->selectedDocument->id,
                'status' => 'rejected',
            ],
            'notes' => $this->adminNotes,
        ]);

        $this->createNotification($user->id, 'kyc_rejected');
        $this->reset(['selectedDocument', 'adminNotes']);
    }

    private function createNotification($userId, $type)
    {
        Notification::create([
            'user_id' => $userId,
            'type' => $type,
            'title' => $type === 'kyc_approved' ? 'KYC Approuvé' : 'KYC Rejeté',
            'message' => $type === 'kyc_approved'
                ? 'Votre vérification d\'identité a été approuvée.'
                : 'Votre vérification d\'identité a été rejetée. Veuillez revoir vos documents.'
        ]);
    }
}