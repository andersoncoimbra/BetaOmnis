<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    //
    public function jobs()
    {
        return $this->hasMany(Job::class, 'parceiro');
    }
}
