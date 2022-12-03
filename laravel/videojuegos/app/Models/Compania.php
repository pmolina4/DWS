<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    //para devolver el objeto que hay relaccionado (siempre que hay fk hay que hacer esto en ambos modelos)
    public function juegos()
    {
        return $this->hasMany(Videojuego::class);
    }
}
