<?php

namespace App\Models;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    protected $table = 'lenders';
    protected $fillable = [
        'user_id',
        'company_name',
        'address',
        'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'lender_id', 'id');
    }
}
