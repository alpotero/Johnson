<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. Call the database model. Blog in this case.
        // ***line 6: use App\Blog
        
        // Show all the contents of Blog table from database.
        // This will show in json array form.
        //return Blog::all();

        // Return the blank index page.
        //return view('pages.blogs.index');

        // Return the index page together with data from Blog table form databse
        //$blogs = Blog::all();
        //return view('pages.blogs.index')->with('blogs', $blogs);
        // Then move to the targe view and properly display the data from the $blogs variable.

        // Return the index page together with data from Blog table from data base order by "date_created" desc
        //Blog::orderBy('published_date', 'desc')->get();
        $blogs = Blog::orderBy('published_date', 'desc')->get();
        return view('pages.blogs.index')->with('blogs', $blogs);

        // Return the index page together with data from Blog table from data base with WHERE condition that is =
        //$blogs = Blog::where('title', 'iPhones of 36 Journalists Hacked Using iMessage Zero-Click Exploit')->get();
        //return view('pages.blogs.index')->with('blogs', $blogs);

        // Return the index page together with data from Blog table from data base with WHERE condition that is LIKE
        //$blogs = Blog::where('title', 'LIKE', '%new%')->get();
        //return view('pages.blogs.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($blog_id)
    {
        // Show single db record when 1 data of $blog_id is passed.
        //return Blog::select()->where('blog_id', $blog_id)->get();
        $blog = Blog::select()->where('blog_id', $blog_id)->get();
        return view('pages.blogs.show')->with('blog', $blog);
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
