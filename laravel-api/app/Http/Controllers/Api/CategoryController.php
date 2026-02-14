<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\CategoryResource;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        return response()->json($categories);
    }

     public function store() {}

    public function show(Category $category)
    {
        $category = $category->load('tickets');
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json(new CategoryResource($category));
    }

    public function update() {}

    public function delete() {}



    
}
