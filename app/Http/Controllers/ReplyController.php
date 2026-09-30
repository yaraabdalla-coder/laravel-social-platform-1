<?php

namespace App\Http\Controllers;

use App\Models\Reblies;
use App\Http\Requests\StoreRebliesRequest;
use App\Http\Requests\UpdateRebliesRequest;
use Illuminate\Routing\Controller;

class  ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $Reblies=Reblies::with('reactions','comments','user')->get();
    return $Reblies;
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
    public function store(StoreRebliesRequest $request)
    {
          return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reblies $reblies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reblies $reblies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRebliesRequest $request, Reblies $reblies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reblies $reblies)
    {
        //
    }
}
