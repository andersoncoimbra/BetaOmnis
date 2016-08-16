<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VagasJob extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function extras()
    {
        return $this->hasMany(ExtrasVagasJob::class, 'id_vaga_job');
    }
}
