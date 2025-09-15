<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [
        'loan_id',
        'lender_id',
        'interest_id',
        'total_repayment',
        'status'
    ];


    public function loan()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function lender()
    {
        return $this->belongsTo(Lender::class, 'lender_id', 'id');
    }

    public function interest()
    {
        return $this->belongsTo(Interest::class, 'interest_id', 'id');
    }

}
