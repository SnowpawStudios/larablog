<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all();
        return view('posts.index')->with([
            'posts'=> $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:5'
        ]);

        $post = BlogPost::create($validated);
        $request->session()->flash('status', 'The blog post was created');

        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $post)
    {
        
        return view('posts.show')->with([
             'post' => $post,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $post)
    {
        // dd('edit');
        return view('posts.edit')->with([
            'post'=>$post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:5'
        ]);

        $post->update($validated);
        $request->session()->flash('status', 'The blog post was updated');

        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $post)
    {
        $deletedPost = $post->title;
        $post->delete();

        session()->flash('status', 'The post '. $deletedPost .' was deleted');
        return redirect()->route('posts.index');

    }
}
