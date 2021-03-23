<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Butaca extends Model
{
    protected $table = "butacas";

    protected $fillable = [
        'reserva_id','columna_id', 'fila_id', 'estado'
    ];

    public function fila()
    {
        return $this->belongsTo(Fila::class);
    }

    public function columna()
    {
        return $this->belongsTo(Columna::class);
    }


    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
