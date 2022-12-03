<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    
    public function compania()
    {
        //Se pone para hacer la relaccion con compania esta es la parte de N
        return $this->belongsTo(Compania::class);
    }
}
