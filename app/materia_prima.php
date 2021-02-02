<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ficha_tecnica;

class materia_prima extends Model
{
    //
    public function fichas_tecnicas(){
        return $this->belongsToMany(ficha_tecnica::class);
    }
}
