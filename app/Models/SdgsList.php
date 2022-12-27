<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SdgsList extends Model
{
    //
    protected $fillable = [
        'code',
        'sdgs_id',
        'user_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function emission(){
        return $this->hasMany(SdgsEmission::class);
    }
}
