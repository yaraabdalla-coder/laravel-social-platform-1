<?php

namespace App\Http\Resources;
use App\Http\Resources\CommentsResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResources;
use App\Http\Resources\Post_statusesResource;
class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID'=>$this->id,
            'TITTLE'=>$this->tittle,
            'Content'=>$this->body,
            'posted on'=>$this->created_at->format('D d F y'),
            'posted at'=>$this->created_at->format('h:i:s a'),
            'posted scince'=>$this->created_at->diffforhumans(),
           // 'by'=>$this->whenLoaded('user'),
            //'By'=>new UserResources($this->user),
             'By'=>UserResources::make($this-> whenloaded('user')),
            'post status'=>Post_statusesResource::make($this->whenloaded('poststatuses')),
          'comments'=>CommentsResource::collection($this->whenloaded('comments')),
         
        ];
}
}