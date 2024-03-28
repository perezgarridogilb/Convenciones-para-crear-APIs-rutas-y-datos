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
        // Para la misma configuracion
        return TagResource::collection(Tag::with('recipes')->get());
        /* return Tag::with('recipes')->get(); */
    }

    public function show(Tag $tag) {
        /* return Tag */
        /* return $tag->load('recipes'); */
        return new TagResource($tag->load('recipes'));
    }
}
