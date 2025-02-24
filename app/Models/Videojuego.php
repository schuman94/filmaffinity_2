<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    /** @use HasFactory<\Database\Factories\VideojuegoFactory> */
    use HasFactory;


    protected $fillable = ['titulo', 'desarrollador', 'fecha_lanzamiento'];

    public function ficha() {
        return $this->morphOne(Ficha::class, 'fichable');
    }
}
