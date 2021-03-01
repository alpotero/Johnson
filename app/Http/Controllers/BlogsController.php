<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Ioc;
use DB;

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

        // Use pure SQL query without relying on builtin function of laravel models.
        // First call the DB library. ***line 7: use DB;
        // This is commonly used if you are not comftable with Eloquent. But Eloquent is much nicer
        //$blogs = DB::select('SELECT * FROM blogs');
        //return view('pages.blogs.index')->with('blogs', $blogs);

        // Return the index page together with data from Blog table from data base order by "date_created" desc. Limit the query to a specific number.
        // Taking 10 records only for example
        //$blogs = Blog::orderBy('published_date', 'desc')->take(10)->get();
        //return view('pages.blogs.index')->with('blogs', $blogs);
        
        // Return the index page together with data from Blog table from data base order by "date_created" desc. With pagination of 5 records each.
        // Add the following pagination string on the view: {{ $blog->link() }}. Add it below the @endforeach
        // @if(count($blogs) > 0)
        //      @foreach($blogs as $blog)
        //          {{ $blog->id }}
        //      @endforeach
        //      {{ $blog->links() }}
        // @else
        //      <p>No blogs found</p>
        // @endif
        //$blogs = Blog::orderBy('published_date', 'desc')->paginate(5)->get();
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
    public function edit($blog_id)
    {
        //
        //return $blog_id;
        $blog = Blog::select()->where('blog_id', $blog_id)->get();
        return view('pages.blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        //
        // Request is similar to store.
        // Validate the passed inputs
        $this->validate($request, [
            'summary' => 'required',
            'testing_status' => 'required',
            'hidden' => 'required'
        ]);
        // Validation error messages are stored in pages.inc.messages then is included in the posts.create page ( @include('inc.messages') )

        // Create Post and submit to database.
        $blog = Blog::find($blog_id); //edit this because we want to find the id and update that record.
        $blog->summary = $request->input('summary');
        $blog->testing_status = $request->input('testing_status');
        $blog->hidden = $request->input('hidden');
        $blog->save();

        //Then Redirect to landing page with a message
        return redirect('/blogs/$blog_id')->with('success', 'Post Updated');
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
