<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];

    /** 
     * Tienes muchas recetas
     * Aquí se está diciendo especificamente, que este objeto como categoría tiene muchas
     * recetas
     * Sin embargo una receta no puede tener muchas categorías, pertenece a una categoría y ese 
     * es el objetivo
     * */
    public function recipes() {
        return $this->hasMany(Recipe::class);
    }
}
