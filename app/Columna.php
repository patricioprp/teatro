<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Columna extends Model
{
    protected $table = "columnas";

    protected $fillable = [
        'n_columna',
    ];
    
    public function butacas()
    {
        //relacion uno a muchos
        return $this->hasMany(Butaca::class);
    }
}
