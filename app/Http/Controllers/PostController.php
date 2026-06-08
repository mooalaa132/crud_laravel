<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $allPosts =  Post::all();
        // dd($allPosts->first->toArray()) ; 
        return view('posts.index', ['posts' => $allPosts]);
    }
    public function show($postId)
    {

        $singlePost  = Post::find($postId);   // and can use where with first becouse retrun builder or  get with first 
        return view("posts.show", ["post" => $singlePost]);
    }

    public function create()
    {

        $users = User::all();
        return view("posts.create",  ['users' => $users]);
    }

    public function store()
    {

        // 1 - get data  
        //2 - add data in database 
        //3- go to all posts page 
        $data = request()->all();
        // dd($data);

        $desc = request()->description;
        $title = request()->title;
        $postedBy = request()->posted_by;

        // $post  = new Post();
        // $post->title = $title;
        // $post->desc  = $desc;
        // $post->create_by  = $postedBy;

        // $post->save();  


        Post::create([
            "title" => $title,
            "desc" => $desc,
            "create_by" => $postedBy,
        ]);



        return to_route("posts.index");
    }

    public function edit(Post $post) // binding
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
        // 1 - get data  
        //2 - add data in database 
        //3-go to show post  


        $data = request()->all();
        $title = request()->title;
        $desc = request()->description;
        $postedBy = request()->posted_by;
        $post = Post::findOrFail($postId);
        $post->update([
            "title"  =>  $title,
            "desc"  =>  $desc,
            "create_by"  =>  $postedBy,
        ]);

        return to_route("posts.show", $postId);
    }

    public function destroy($postId)
    {
        $post  = Post::find($postId);
        $post->delete();
        return to_route("posts.index");
    }
}
