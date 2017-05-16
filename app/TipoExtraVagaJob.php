<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExtraVagaJob extends Model
{
    //

    public function extrasvagajob()
    {
        return $this->hasMany(ExtrasVagasJob::class, 'tipo');
    }
}
