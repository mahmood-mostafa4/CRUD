<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $allPosts = Post::all();
        $users = User::all();

        return view('posts' , ['posts' => $allPosts , 'users' => $users]);
    }

    public function show(Post $post)
    {
        return view('show' , ['post' => $post]);
    }


    public function create()
    {
        $users = User::all();

        return view('create' , ['users' => $users]);
    }

    public function store()
    {
        // Validation
        request()->validate([
            'title' => ['required' , 'min:5'],
            'description' => ['required' , 'min:10'],
            'posted_by' => ['required' , 'exists:users,id'],
        ]);

        // 1- get the data from the user
        $data = request()->all();
        $userName = request()->posted_by;
        // 2- store the data in the database
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->posted_by
        ]);

        // 3- redirect to the index page
        return to_route('index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('edit', ['users' => $users , 'post' => $post]);
    }
    public function update($postId)
    {
        // Validation
        request()->validate([
            'title' => ['required' , 'min:5'],
            'description' => ['required' , 'min:10'],
            'posted_by' => ['required' , 'exists:users,id'],
        ]);
        // 1- get the data from the user
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->posted_by;

        // 2- update the data in the database

        $post_id = Post::find($postId);
        $post_id->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);

        // 3- redirect to the show page

        return to_route('show' , $postId);
    }

    public function destroy($postId){

        $post = Post::find($postId);
        $post->delete();

        return to_route('index');
    }
}
