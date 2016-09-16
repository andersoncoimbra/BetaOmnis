<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VagasJob extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class, 'id');
    }


    public function extras()
    {
        return $this->hasMany(ExtrasVagasJob::class, 'id_vaga_job');
    }

    public function cargos()
    {
        return $this->hasOne(Funcoes::class, 'id');
    }

}
