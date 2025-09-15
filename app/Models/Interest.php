<?php

namespace App\Models;

use App\Models\Lender;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';
    protected $fillable = [
        'lender_id',
        'tenor',
        'interest_rate'
    ];

    public function lender()
    {
        return $this->belongsTo(Lender::class, 'lender_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offers::class, 'interest_id', 'id');
    }
}
