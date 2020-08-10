<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
}
