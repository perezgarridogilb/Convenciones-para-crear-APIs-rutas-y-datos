<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    public function index() {
        /** el select es así debido a la estructura de la tabla recipes y así obtengamos las relaciones subsecuentes */
        // el recurso debe estar aislado
        /* return Recipe::select('id', 'category_id', 'user_id', 'title')->with('category', 'tags', 'user')->get(); */
        $recipes = Recipe::with('category', 'tags', 'user')->get();
        return RecipeResource::collection($recipes);
    }

    public function store(StoreRecipeRequest $request) {
/*         $request->validate([
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required'
        ]); */

        /* $recipe = Recipe::create($request->all()); */
        /** 
         * El user_id se asigna automáticamente
         */
        $recipe = $request->user()->recipes()->create($request->all());
        /* $recipe->tags()->attach($tags); */ 

        /** recibimos en string para convertir en un array */
        // if ($tags = json_decode($request->tags)) {
            /** asignamos esas etiquetas a la receta que estamos manejando
             * en ese momento
             */
            $recipe->tags()->attach(json_decode($request->tags));
            # code...
        // }

        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED); // 201
    }

    public function show(Recipe $recipe) {
        $recipe = $recipe->load('category', 'tags', 'user');
        return new RecipeResource($recipe);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe) {
        $recipe->update($request->all());

        if ($tags = json_decode($request->tags)) {
            /** elimina lo que existe y crea eso que estamos asignando */
            $recipe->tags()->sync($tags);
            # code...
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_OK); // 200
    }

    public function destroy(Recipe $recipe) {
        $recipe->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); // 204
        
    }
}
