<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;

    public function cities(){
        return $this->hasMany('App\Models\City');
    }
}
