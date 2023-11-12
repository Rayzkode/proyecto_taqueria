<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'orden';

    public function producto() {
        return $this->belongsToMany(Orden::class, 'orden_detalle');
    }
}
