<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        /** el select es así debido a la estructura de la tabla recipes y así obtengamos las relaciones subsecuentes */
        // el recurso debe estar aislado
        /* return Recipe::select('id', 'category_id', 'user_id', 'title')->with('category', 'tags', 'user')->get(); */
        $recipes = Recipe::with('category', 'tags', 'user')->get();
        return RecipeResource::collection($recipes);
    }

    public function store() {
        
    }

    public function show(Recipe $recipe) {
        $recipe = $recipe->load('category', 'tags', 'user');
        return new RecipeResource($recipe);
    }

    public function update() {
        
    }

    public function destroy() {
        
    }
}
