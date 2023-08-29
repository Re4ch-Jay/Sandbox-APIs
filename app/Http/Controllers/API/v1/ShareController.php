<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Share;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShareRequest;
use App\Http\Resources\ShareResource;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ShareResource::collection(Share::query()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShareRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;

        $share = Share::create($attributes);

        return new ShareResource($share);
    }

    /**
     * Display the specified resource.
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShareRequest $request, Share $share)
    {
        $this->authorize('update', $share);

        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;

        $share->update($attributes);

        return new ShareResource($share);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Share $share)
    {
        $this->authorize('delete', $share);

        $share->delete();
        return response()->json([
            'message' => 'Share has been deleted',
            'status' => '200'
        ]);
    }
}
