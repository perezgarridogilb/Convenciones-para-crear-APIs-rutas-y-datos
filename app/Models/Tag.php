<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Una etiqueta tiene muchas recetas
     * una etiqueta pertenece a una receta, pero también tiene muchas recetas
     */

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
