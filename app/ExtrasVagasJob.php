<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtrasVagasJob extends Model
{
    //
    public function vagaJob()
    {
        return $this->belongsTo(VagasJob::class);
    }
}
