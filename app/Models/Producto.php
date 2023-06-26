<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'desarrollador',
        'lanzamiento',
        'genero',
        'descripcion',
        'categoria_id',
        'precio',
        'en_oferta',
        'activo',
        'imagen',
        'video'
    ];

    public function precio_format()
    {
        return '$' . number_format($this->precio, 2, ",", ".");
    }

    public function categoria()
    {
       return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }
}
