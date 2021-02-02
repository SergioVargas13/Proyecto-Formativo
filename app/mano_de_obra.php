<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mano_de_obra extends Model
{
    //
    public function fichas_tecnicas(){
        return $this->belongsToMany(ficha_tecnica::class);
    }
}
