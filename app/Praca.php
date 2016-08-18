<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praca extends Model
{
    public function jobs()
    {
        return $this->hasMany(Job::class, 'praca');
    }

}
