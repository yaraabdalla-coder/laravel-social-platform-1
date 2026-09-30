<?php

namespace App\Http\Controllers;

use App\Models\Reactions;
use App\Http\Requests\StoreReactionsRequest;
use App\Http\Requests\UpdateReactionsRequest;
use Illuminate\Routing\Controller;

class  ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreReactionsRequest $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reactions $reactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reactions $reactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReactionsRequest $request, Reactions $reactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reactions $reactions)
    {
        //
    }
}
