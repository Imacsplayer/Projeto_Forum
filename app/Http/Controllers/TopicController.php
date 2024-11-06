<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Category;

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

            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);
        } else {

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|string|',
                'image' => 'required|string|',
                'category' => 'required',
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image,
                'category_id' => $request->category,
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image,

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
