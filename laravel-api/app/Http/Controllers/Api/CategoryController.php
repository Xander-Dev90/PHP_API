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
        return new CategoryCollection(Category::all());
    }

     public function store() {}

    public function show(Category $category)
    {
        $category = $category->load('tickets.category', 'tickets.tags', 'tickets.user');
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return new CategoryResource($category);
    }

    public function update() {}

    public function delete() {}



    
}
