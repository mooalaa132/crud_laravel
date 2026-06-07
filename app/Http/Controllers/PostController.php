<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class PostController extends Controller
{

    public function index()
    {
        $allPosts  = [
            ["id" => 1, "title" => 'PHP',   "posted_by" => "Mohamed", "creat_at" => "2026-01-01"],
            ["id" => 2,   "title" => 'HTML',    "posted_by" => "Ali", "creat_at" => "2026-02-2"],
            ["id" => 3,  "title" => 'DART',     "posted_by" => "Sofian", "creat_at" => "2026-05-07"],
            ["id" => 4,  "title" => 'CSS',     "posted_by" => "Adam", "creat_at" => "2026-04-03"],
        ];

        return view('posts.index', ['posts' => $allPosts]);
    }
    public function show()
    {
        $singlePost  =  [
            "id" => 1,
            "title" => 'PHP',
            'description' => "This is a Description",
            "posted_by" => "Mohamed",
            "creat_at" => "2026-01-01"
        ];
        return view("posts.show", ["post" => $singlePost]);
    }

    public function create()
    {
        return view("posts.create",);
    }

    public function store()
    {

        // 1 - get data  
        //2 - add data in database 
        //3- go to all posts page 
        $data = request()->all();
        ///  dd($data);

        return to_route("posts.index");
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function update()
    {
        // 1 - get data  
        //2 - add data in database 
        //3- go to all posts page 
        $data = request()->all();
        return to_route("posts.show" ,1);
    }
}
