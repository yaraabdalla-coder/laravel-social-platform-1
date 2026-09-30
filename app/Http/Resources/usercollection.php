<?php

namespace App\Http\Resources;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class usercollection extends  JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
    'data' => UserResources::collection(User::all()),
    'meta' => [
        'total_users' => User::count(),
    ],
       ];
}
}
