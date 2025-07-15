<?php
 namespace App\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\KycDocument;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class KycForm extends Component
{
    use WithFileUploads;

    public $identityCard;
    public $proofOfAddress;

    protected $rules = [
        'identityCard' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        'proofOfAddress' => 'required|file|mimes:jpeg,png,pdf|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();

        $identityPath = $this->identityCard->store('kyc/identity', 'public');
        $proofPath = $this->proofOfAddress->store('kyc/proof', 'public');

        KycDocument::create([
            'user_id' => $user->id,
            'document_type' => 'identity_card',
            'document_path' => $identityPath,
            'status' => 'pending',
        ]);

        KycDocument::create([
            'user_id' => $user->id,
            'document_type' => 'proof_of_address',
            'document_path' => $proofPath,
            'status' => 'pending',
        ]);

        Notification::create([
    'user_id' => auth()->id(),
    'type' => 'kyc_pending',
    'title' => 'Documents KYC soumis',
    'message' => "Vos documents KYC ont été soumis. Vérification en cours."
]);


        $user->update(['kyc_status' => 'pending']);

        session()->flash('message', '📤 Documents KYC soumis avec succès.');
        $this->reset(['identityCard', 'proofOfAddress']);
    }

    public function render()
    {
        return view('livewire.client.kyc-form');
    }
}
