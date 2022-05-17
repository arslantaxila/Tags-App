<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagsApiController extends Controller
{
    public function index()
    {

        return Tag::all();
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return $this->sendError('Tag not found.');
        }
        return $tag;
    }

    public function store()
    {

        request()->validate([
            'name' => 'required'
        ]);

        return Tag::create([
            'name' => request('name')
        ]);
    }

    public function update(Tag $tag)
    {

        request()->validate([
            'name' => 'required'
        ]);

        return $tag->update([
            'name' => request('name')
        ]);
    }

    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
}
