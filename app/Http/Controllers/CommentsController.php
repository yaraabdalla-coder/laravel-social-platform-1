<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdateCommentesRequest;
use App\Models\Comments;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCommentsRequest;
class  CommentsController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $Comments=Comments::with('reactions','Reply','post','user')->get();
     return $Comments;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(StoreCommentsRequest$request)
{
     
      $comments_date=$request->validated();
    return Comments::create($comments_date);
}
    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
