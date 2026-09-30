<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{ 
    protected $fillable = [
    'title',
    'body',
    'user_id',
    'poststatus_id'
];
public const posts_key ='posts';
public const posts_expiration=60*60*24;
    /** @use HasFactory<\Database\Factories\PostsFactory> */
    use HasFactory,SoftDeletes;

    public function comments() :HasMany
    {
          return $this->Hasmany(Comments::class,'post_id');  
    }

   public function user():BelongsTo
    {
        return $this-> BelongsTo(User::class);
    }

    
    public function poststatuses():BelongsTo
    {
        return $this-> BelongsTo(Poststatuses::class);
    }
     public function reactions():MorphMany
    {
        return $this-> morphMany(Reactions::class,'reactble');
    }
    }
