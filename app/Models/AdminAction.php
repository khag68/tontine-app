<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAction extends Model
{
    use HasFactory;
     /**
     * Types d'actions disponibles
     */
    public const ACTION_KYC_VALIDATION = 'kyc_validation';
    public const ACTION_USER_ACTIVATION = 'user_activation';
    public const ACTION_WITHDRAWAL_APPROVAL = 'withdrawal_approval';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'admin_id',
        'action_type',
        'target_id',
        'action_details',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'action_details' => 'array',
    ];

    /**
     * Relation avec l'administrateur
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Scope pour les actions de validation KYC
     */
    public function scopeKycValidations($query)
    {
        return $query->where('action_type', self::ACTION_KYC_VALIDATION);
    }

    /**
     * Scope pour les actions d'activation utilisateur
     */
    public function scopeUserActivations($query)
    {
        return $query->where('action_type', self::ACTION_USER_ACTIVATION);
    }

    /**
     * Scope pour les actions d'approbation de retrait
     */
    public function scopeWithdrawalApprovals($query)
    {
        return $query->where('action_type', self::ACTION_WITHDRAWAL_APPROVAL);
    }

    /**
     * Obtenir le type d'action sous forme lisible
     */
    public function getActionTypeLabel(): string
    {
        return match($this->action_type) {
            self::ACTION_KYC_VALIDATION => 'Validation KYC',
            self::ACTION_USER_ACTIVATION => 'Activation Utilisateur',
            self::ACTION_WITHDRAWAL_APPROVAL => 'Approbation de Retrait',
            default => 'Action Admin',
        };
    }

    /**
     * Obtenir la cible de l'action (relation polymorphique implicite)
     */
    public function target()
    {
        return match($this->action_type) {
            self::ACTION_KYC_VALIDATION => $this->belongsTo(User::class, 'target_id'),
            self::ACTION_USER_ACTIVATION => $this->belongsTo(User::class, 'target_id'),
            self::ACTION_WITHDRAWAL_APPROVAL => $this->belongsTo(Withdrawal::class, 'target_id'),
            default => null,
        };
    }

    /**
     * Ajouter des détails à l'action
     */
    public function addDetails(array $details): void
    {
        $currentDetails = $this->action_details ?? [];
        $this->update(['action_details' => array_merge($currentDetails, $details)]);
    }
}
