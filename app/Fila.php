<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    protected $table = "filas";

    protected $fillable = [
        'n_fila',
    ];

    public function butacas()
    {
        //relacion uno a muchos
        return $this->hasMany(Butaca::class);
    }
}
