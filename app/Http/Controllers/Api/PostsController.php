<?php

namespace App\Http\Controllers\Api;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostResource;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Resources\Api\UserResource;

class PostsController extends Controller
{
    public function index()
     {
    //    $posts = Post::paginate(3);
    //    return PostResource::collection($posts);



       return Post::with('user')->paginate(3);


    
    }
    public function show($post)
    {
        $post = Post::findOrFail($post);
        return new PostResource($post);
    }
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return response()->json([
            'message' => 'Post Created Successfully'
        ],201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $slug= SlugService::createSlug(Post::class, 'slug', $request->title);
       
        $post->update(['title'=>$request->title,'description'=>$request->description,'slug'=>$slug]);
        return response()->json([
            'message' => 'Post Updated Successfully'
        ],201);
    }
    public function destroy(Post $post)
    {
       
        $post->delete();
        return response()->json([
            'message' => 'Post deleted Successfully'
        ],201);
    }


}
