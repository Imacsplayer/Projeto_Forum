<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listAllTopics()
    {
        $topics = Topic::all();

        return view('topics.listAllTopics', ['topics' => $topics]);
    }
    public function createTopic(Request $request)
    {
        if ($request->isMethod('GET')) {

            return view('topics.createTopic');
        } else {

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|string|',
                'image' => 'required|string|',
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image,
            ]);

            $post = new Post([
                'image' => $request->input('image'),
            ]);

            return redirect()->route('welcome');
        }
    }

    public function listTopicById(Request $request, $id)
    {

        $topic = Topic::where('id', $id)->first();

        return view('topics.viewTopic', ['topic' => $topic]);
    }

    public function UpdateTopic(Request $request, $id)
    {

        $topic = Topic::where('id', $id)->first();

        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->status = $request->status;

        $topic->save();

        return redirect()->route('routeListTopicById', [$topic->id])
            ->with('message-sucess', 'Atualizado com sucesso');
    }

    public function deleteTopic(Request $request, $id)
    {

        $topic = Topic::where('id', $id)->delete();

        return redirect()->route('routeTopics.viewTopic');
    }
}
