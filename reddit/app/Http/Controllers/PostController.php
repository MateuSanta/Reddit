<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comentary;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::get();


        $comments = Comentary::get();
        return (view('posts', ['posts' => $posts],['comments'=>$comments]));
    }

    function edit(Post $post)
    {

        return (view('postEdit', [
            'post' => $post,
        ]));
    }

    function store(Request $request)
    {


        $request->validated();

        $post = new Post;
        $post->title = $request->title;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->user_id = $request->user()->id;


        $post->save();

        session()->flash('status', 'Post Creado!');

        return redirect()->route(('posts.index'));
    }

    function update(Request $request, Post $post)
    {
        $validated =$request->validate([
            'body'=>'required'
        ]);
/*      $post->body=$request->get('body'); */
        $post->update($validated);
        return redirect(route('posts.index'));
    }

    function destroy(Post $post)
    {

        $post->delete();
        return redirect(route('posts.index'));

    }
}
