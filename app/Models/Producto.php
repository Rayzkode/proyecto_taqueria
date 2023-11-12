<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function orden() {
        return $this->belongsToMany(Producto::class, 'orden_detalle');
    }
}
