<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Like;
use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LikeResource::collection(Like::query()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikeRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;

        $like = Like::create($attributes);

        return new LikeResource($like);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        $this->authorize('delete', $like);

        $like->delete();
        return response()->json([
            'message' => 'You have been unlike the post',
            'status' => '200',
        ]);
    }
}
