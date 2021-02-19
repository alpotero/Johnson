<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the passed inputs
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Validation error messages are stored in pages.inc.messages then is included in the posts.create page ( @include('inc.messages') )

        // Create Post and submit to database.
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        //Then Redirect to landing page with a message
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the id from the passed url.
        $post = Post::find($id);
        //return Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        // Request is similar to store.
        // Validate the passed inputs
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Validation error messages are stored in pages.inc.messages then is included in the posts.create page ( @include('inc.messages') )

        // Create Post and submit to database.
        $post = Post::find($id); //edit this because we want to find the id and update that record.
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        //Then Redirect to landing page with a message
        return redirect('/posts')->with('success', 'Post Updated');
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
