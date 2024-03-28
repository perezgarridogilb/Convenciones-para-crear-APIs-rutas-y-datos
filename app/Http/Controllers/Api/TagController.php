<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::with('recipes.category', 'recipes.tags', 'recipes.user')->get();
        // Para la misma configuracion usa collection
        return TagResource::collection($tags);
        /* return Tag::with('recipes')->get(); */
    }

    public function show(Tag $tag) {
        /* return Tag */
        /* return $tag->load('recipes'); */
        $tag = $tag->load('recipes.category', 'recipes.tags', 'recipes.user');
        return new TagResource($tag);
    }
}
