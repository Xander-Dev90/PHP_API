<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\TagResource;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::with('tickets')->get());
    }

     public function store() {}

    public function show(Tag $tag)
    {
        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }
        return new TagResource($tag->load('tickets'));
    }

    public function update() {}

    public function delete() {}
}
