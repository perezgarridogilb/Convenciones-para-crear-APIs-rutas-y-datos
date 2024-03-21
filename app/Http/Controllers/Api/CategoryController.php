<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $a = 1;
        $b = $a;
        return Category::all();
    }

    public function show(Category $category) {
        // with, load
        /**
         * Carga a todas las recetas que tienes relacionadas
         */
        return $category->load('recipes');
    }
}
