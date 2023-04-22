<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostStoreRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.student');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPost::blogPostSelect();

        return view('blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostStoreRequest $request)
    {
        if (($request->title && $request->body) || ($request->title_fr && $request->body_fr)) {
            $blogPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'title_fr' => $request->title_fr,
            'body_fr' => $request->body_fr,
            'user_id' => Auth::user()->id
            ]);
            return redirect(route('blog.show', $blogPost->id))->withSuccess('Post inserted');
        } else return redirect(route('blog.create'))->withErrors('You must insert a title and a post in french or in english');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        return view('blog.show', ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('blog.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostStoreRequest $request, BlogPost $blogPost)
    {
        if (($request->title && $request->body) || ($request->title_fr && $request->body_fr)) {
            $blogPost->update([
                'title' => $request->title,
                'body' => $request->body,
                'title_fr' => $request->title_fr,
                'body_fr' => $request->body_fr
            ]);
            return redirect(route('blog.show', $blogPost->id))->withSuccess('Post updated');
        } else return redirect(route('blog.edit'))->withErrors('You must insert a title and a post in french or in english');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog.index'))->withSuccess('Post Deleted');
    }

    public function myPosts() {
        $blogPosts = BlogPost::select()
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('blog.myPosts', ['blogPosts' => $blogPosts]);
        
    }

}
