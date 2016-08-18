<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public function parceiros()
    {
        return $this->belongsTo(Parceiro::class, 'parceiro');
    }

    public function vagaJobs()
    {
        return $this->hasMany(VagasJob::class, 'id_job');
    }

    public function praca()
    {
        return $this->belongsTo(Praca::class, 'praca');
    }
}
