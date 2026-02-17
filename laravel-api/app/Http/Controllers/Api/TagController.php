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
        $tags = Tag::with('tickets.category', 'tickets.tags', 'tickets.user')->get();
        return TagResource::collection($tags);
    }

     public function store() {}

    public function show(Tag $tag)
    {
        $tag = $tag->load('tickets.category', 'tickets.tags', 'tickets.user');
        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        return new TagResource($tag);
    }

    public function update() {}

    public function delete() {}
}
