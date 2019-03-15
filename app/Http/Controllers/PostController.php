<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App; 
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       return view('posts.create',['users' =>User::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $request->validate([

        // ])
        // $validated = $request->validated();
       
        Post::create($request->all());
        return redirect()->route('posts.index');
       //Post::create(['title' => $request->title , 'description' => $request->decription,'user_id'=>$request->user_id]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',['post'=>$post,'user'=>User::find($post->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    return view('posts.edit', ['post' => $post,'users' =>User::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {  
    
       $slug= SlugService::createSlug(Post::class, 'slug', $request->title);
       
       $post->update(['title'=>$request->title,'description'=>$request->description,'slug'=>$slug]);
        // $post->update($request->all());
       return redirect()->route('posts.index');

       // $post->update->where('id',request()->all()->id)(request()->all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
        $post->delete();
        return redirect()->route('posts.index');
    }
}
