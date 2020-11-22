<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre',
        'rubro',
        'nit',
        'direccion',
        'año_gestion',
        'ingreso_enero',
        'ingreso_febrero',
        'ingreso_marzo',
        'ingreso_abril',
        'ingreso_mayo',
        'ingreso_junio',
        'ingreso_julio',
        'ingreso_agosto',
        'ingreso_septiembre',
        'ingreso_octubre',
        'ingreso_noviembre',
        'ingreso_diciembre',
    ];

    public function credito(){
        return $this->hasOne(Credito::class);
    }
}
