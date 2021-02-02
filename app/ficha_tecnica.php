<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\materia_prima;
use App\mano_de_obra;

class ficha_tecnica extends Model
{
    //
    public function materias_primas(){
        return $this->belongsToMany(materia_prima::class)->withPivot(['cantidad','tipoMP']);
    }
    public function mano_obras(){
        return $this->belongsToMany(mano_de_obra::class)->withPivot(['cantidad_tiempo','tipoMO']);
    }
    public function cifs() {
        $cifs = cifs::sum('Precio');
        if ($cifs>0) {
            return $cifs;
        } else {
            return 0;
        }
    } 
}
