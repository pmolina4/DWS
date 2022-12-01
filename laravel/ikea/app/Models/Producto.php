<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria()
    {
        //Se pone para hacer la relaccion con categoria esta es la parte de 1
        return $this->belongsTo(Categoria::class);
    }
}
