<?php

namespace App\Models;

use App\Models\SdgsList;
use Illuminate\Database\Eloquent\Model;

class SdgsEmission extends Model
{
    //
    protected $fillable = [
        'sdgs_list_id',
        'resource',
        'description',
        'co2_target',
        'file'
    ];

    public function sdgs(){
        return $this->belongsTo(SdgsList::class);
    }
}
