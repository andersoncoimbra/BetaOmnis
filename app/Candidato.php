<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    public function jobs()
    {
        $this->belongsToMany('App\VagasJob', 'vagasjobs_candidatos');
    }
}
