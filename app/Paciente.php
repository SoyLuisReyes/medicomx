<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{

    protected $fillable = [
        'nombre','apellido','direccion','edad','padecimiento','doctors_id','medicamento','fecha'
    ];
    //Obtiene el doctor del paciente via FK

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctors_id');
    }
}
