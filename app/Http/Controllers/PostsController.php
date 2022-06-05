<?php

namespace App\Http\Controllers;

#import BlogPost Models

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // private $posts = [
    //     1 => [
    //         'title' => 'Intro to Laravel',
    //         'content' => 'This is a short intro to Laravel',
    //         'is_new' => true,
    //         'has_comments' => true,
    //     ],
    //     2 => [
    //         'title' => 'Intro to PHP',
    //         'content' => 'This is a short intro to PHP',
    //         'is_new' => false,
    //         'has_comments' => true,
    //     ],
    //     3 => [
    //         'title' => 'Intro to Golang',
    //         'content' => 'This is a short intro to Golang',
    //         'is_new' => true,
    //     ],
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::all()]);
        // will return all BlogPost oldest ASC by default > use query builder if you want to change the default
        // eg. instead of BlogPost::all() > BlogPost::orderBy('created_at', 'desc')->get();
        // take method is like limit in sql. ensure if you only want to fetch a limited result, position take() before get()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(request());
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10',
        ]);
        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        //direct to newly made page -> call object (route), call the route name, parameter > parse an post id.
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);

        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
