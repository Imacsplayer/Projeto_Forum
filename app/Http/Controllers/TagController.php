<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listAllTags()
    {
        $tags = Tag::all();

        return view('tags.listAllTags', ['tags' => $tags]);
    }
    public function createTag(Request $request)
    {
        if ($request->isMethod('GET')) {

            return view('tags.createTag');
        } else {

            $request->validate([
                'tagtitle' => 'required|string|max:255',
            ]);

            Tag::create([
                'tagtitle' => $request->title,
            ]);
            $tags = Tag::all();

            return redirect()->route('routeListAllTags', ['tags' => $tags])
                ->with('message-sucess', 'Tag criada com sucesso');
        }
    }

    public function listTagById(Request $request, $id)
    {
        $tag = Tag::where('id', $id)->first();
        return view('tags.viewTag', ['tag' => $tag]);
    }

    public function UpdateTag(Request $request, $id)
    {
        $tag = Tag::where('id', $id)->first();

        $tag->title = $request->title;
        $tag->save();

        $tags = Tag::all();

        return redirect()->route('routeListAllTags', ['tags' => $tags])
            ->with('message-sucess', 'Tag alterada com sucesso');
    }

    public function deleteTag(Request $request, $id)
    {
        Tag::where('id', $id)->delete();
        return redirect()->route('routeListAllTags');
    }
}
