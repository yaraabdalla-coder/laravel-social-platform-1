<?php 

namespace App\Http\Controllers;

use App\Models\Reactiontypes;
use App\Http\Requests\StoreReaction_typesRequest;
use App\Http\Requests\UpdateReaction_typesRequest;
use Illuminate\Routing\Controller;

class ReactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $ReactionTypeS=ReactionTypeS::with('Ractions')->get();
    return $ReactionTypeS;
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
    public function store(StoreReaction_typesRequest $request)
    {
         return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show($reaction_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $reaction_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReaction_typesRequest $request, $reaction_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $reaction_types)
    {
        //
    }
}
