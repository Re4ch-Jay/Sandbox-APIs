<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
                    ->filter(request(['search']))
                    ->with('comments', 'likes')
                    ->get();
                    
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;

        $post = Post::create($attributes);

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        
        $this->authorize('update', $post);
    
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;

        $post->update($attributes);

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return response()->json(
            [
                'message' => 'Post has been deleted', 
                'status' => '200'
            ]);
    }
}
