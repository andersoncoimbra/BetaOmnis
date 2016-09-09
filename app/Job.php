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

    public function pracas()
    {
        return $this->belongsTo(Praca::class, 'praca');
    }

    public function faturas()
    {
        return $this->hasMany(Faturamento::class, 'job_id');
    }

    public function reembolsos()
    {
        return $this->hasMany(Reembolso::class, "job_id");
    }
}
