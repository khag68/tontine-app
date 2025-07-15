<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
     /**
     * Types de notifications disponibles
     */
     public const TYPE_KYC_PENDING = 'kyc_pending';

    public const TYPE_KYC_APPROVED = 'kyc_approved';
    public const TYPE_KYC_REJECTED = 'kyc_rejected';
    public const TYPE_WITHDRAWAL_PROCESSED = 'withdrawal_processed';
    public const TYPE_DEPOSIT_CONFIRMED = 'deposit_confirmed';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'read_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'read_at' => 'datetime',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope pour les notifications non lues
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Scope pour les notifications lues
     */
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Marquer la notification comme lue
     */
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->update(['read_at' => now()]);
        }
    }

    /**
     * Marquer la notification comme non lue
     */
    public function markAsUnread()
    {
        if (!is_null($this->read_at)) {
            $this->update(['read_at' => null]);
        }
    }

    /**
     * Vérifie si la notification est lue
     */
    public function isRead(): bool
    {
        return !is_null($this->read_at);
    }

    /**
     * Vérifie si la notification est non lue
     */
    public function isUnread(): bool
    {
        return is_null($this->read_at);
    }

    /**
     * Obtenir le type de notification sous forme lisible
     */
    public function getTypeLabel(): string
    {
        return match($this->type) {
            self::TYPE_KYC_PENDING => 'KYC En attente',
            self::TYPE_KYC_APPROVED => 'KYC Approuvé',
            self::TYPE_KYC_REJECTED => 'KYC Rejeté',
            self::TYPE_WITHDRAWAL_PROCESSED => 'Retrait Traité',
            self::TYPE_DEPOSIT_CONFIRMED => 'Dépôt Confirmé',
            default => 'Notification',
        };
    }
}