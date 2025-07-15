<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'amount',
        'reason',
        'status',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Vérifie si le retrait est encore en attente.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }
}
