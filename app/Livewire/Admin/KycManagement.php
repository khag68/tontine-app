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

    public $statusFilter = 'pending';
    public $selectedDocument;
    public $adminNotes = '';

    public function getDocumentsProperty()
    {
        return KycDocument::with('user')
            ->where('status', $this->statusFilter)
            ->latest()
            ->paginate(10);
    }

    public function selectDocument($id)
    {
        $this->selectedDocument = KycDocument::with('user')->findOrFail($id);
    }

    public function approve()
    {
        $this->selectedDocument->update([
            'status' => 'approved',
            'admin_notes' => $this->adminNotes
        ]);

        $this->selectedDocument->user->update(['kyc_status' => 'verified']);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_KYC_VALIDATION,
            'target_id' => $this->selectedDocument->user_id,
            'action_details' => ['status' => 'approved'],
            'notes' => $this->adminNotes,
        ]);

        Notification::create([
            'user_id' => $this->selectedDocument->user_id,
            'type' => 'kyc_approved',
            'title' => 'KYC Approuvé',
            'message' => 'Votre vérification KYC a été approuvée.'
        ]);

        $this->reset(['selectedDocument', 'adminNotes']);
        $this->dispatchBrowserEvent('notify', [
    'message' => 'Action effectuée avec succès ✅'
]);

    }

    public function reject()
    {
        $this->selectedDocument->update([
            'status' => 'rejected',
            'admin_notes' => $this->adminNotes
        ]);

        $this->selectedDocument->user->update(['kyc_status' => 'rejected']);

        AdminAction::create([
            'admin_id' => Auth::id(),
            'action_type' => AdminAction::ACTION_KYC_VALIDATION,
            'target_id' => $this->selectedDocument->user_id,
            'action_details' => ['status' => 'rejected'],
            'notes' => $this->adminNotes,
        ]);

        Notification::create([
            'user_id' => $this->selectedDocument->user_id,
            'type' => 'kyc_rejected',
            'title' => 'KYC Rejeté',
            'message' => 'Votre vérification KYC a été rejetée.'
        ]);

        $this->reset(['selectedDocument', 'adminNotes']);
        $this->dispatchBrowserEvent('notify', [
    'message' => 'Action effectuée avec succès ✅'
]);

    }

    public function render()
    {
        return view('livewire.admin.kyc-management', [
            'documents' => $this->documents
        ]);
    }
}