<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Resources\usercollection;
USE App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;

class UserController extends Controller
{
    

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //$User=User::with('posts','comments','Reblies','Reactions')->get();
    //return $User;
    $users= cache::remember('users',60,function() {
     return User::all();
       });
     //  dd($users);
    $usersdata =usercollection::make($users);
   return $this->jsonResponse(  'sucsess','200', 'usersfound ', $usersdata);
     
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
             $data=$request->validated();
             $user=user::create($data);
            
             return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
