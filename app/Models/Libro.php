<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros'; // Especifica el nombre de la tabla si no coincide con la convención.

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
