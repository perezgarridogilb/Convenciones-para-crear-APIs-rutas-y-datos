<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index() {
        $a = 1;
        $b = $a;
       /**
        * La colección de recursos va a traer la definición que definimos
        * en el recurso 
        */
        
        /* return CategoryResource::collection(Category::all()); */

        // Para no mostrar las relaciones

        return new CategoryCollection(Category::all());
    }

    public function show(Category $category) {
        // with, load
        /**
         * Carga a todas las recetas que tienes relacionadas
         */
        $category = $category->load('recipes.category', 'recipes.tags', 'recipes.user');
        return new CategoryResource($category);
    }
}
