<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //para devolver el objeto que hay relaccionado (siempre que hay fk hay que hacer esto en ambos modelos)
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
