<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    
    protected $fillable = [
        'monto_solicitado',
        'interes',
        'monto_valuacion',
        'promedio',
        'descripcion_valucion',
        'empresas_id',
    ];

    public function empresa(){
        return $this->hasOne(Empresa::class,'id','empresas_id');
    }
}
