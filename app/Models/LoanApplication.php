<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanApplication extends Model
{
    protected $table = 'loan_applications';
    protected $fillable = [
        'user_id',
        'amount',
        'tenor',
        'purpose',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function borrower()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
