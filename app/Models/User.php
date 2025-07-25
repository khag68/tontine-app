<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Deposit;
use App\Models\KycDocument;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'date_of_birth',
        'kyc_status',
        'balance',
        'role',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];
    public function kycDocuments()
{
    return $this->hasMany(KycDocument::class);
}

 // Exemple simple basé sur un champ 'role' dans la table users


    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function adminActions()
    {
        return $this->hasMany(AdminAction::class, 'admin_id');
    }


    public function isClient()
    {
        return $this->role === 'client';
    }

    public function isKycVerified()
    {
        return $this->kyc_status === 'verified';
    }

    public function canWithdraw(): bool
    {
        return $this->isKycVerified() && $this->is_active;
    }

}