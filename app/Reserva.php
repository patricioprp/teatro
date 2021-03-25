<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";

    protected $fillable = [
        'id','n_personas', 'fecha','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function butacas()
    {
       return $this->belongsToMany(Butaca::class);
    }

}
