<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        //Retrieve all posts from the database
        $posts = Post::select('id', 'title', 'body', 'created_at','slug')->orderBy('created_at', 'desc')->get();
        return view('post.index',['posts'=>$posts]);
    }

    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        //Validate the request data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //Create a new post using the request data
        $post = new Post;
        $post->user_id = auth()->id();
        $post->categor_id = 1;
        $post->title = $request->input('title');
        $post->slug = Str::slug($request->input('title'));
        $post->type = 1;
        $post->body = $request->input('body');
        $post->save();
        //Redirect to the post create page
        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }



    public function show(Post $post)
    {
        //Return the view with the post data
        return view('post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        //Redirect to the post create page
        return view('post.edit', compact('post'));
    }


    public function update($id, Request $request)
    {
        //Validate the request data
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        //Find the post in the database and update it
        $post = Post::find($id);
        //Update the post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        //Redirect to the post show page
        return redirect()->route('post.show', $post->slug)->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        //Find the post in the database and delete it
        $post = Post::find($id);
        $post->delete();
        //Redirect to the post index page
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
