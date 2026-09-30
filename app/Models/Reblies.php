<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class Reblies extends Model
{
    /** @use HasFactory<\Database\Factories\RebliesFactory> */
    use HasFactory;
    
    public function reactions():MorphMany
    {
        return $this-> morphMany(Reactions::class,'reactble');
    }
        public function comments() :BelongsTo
    {
          return $this->BelongsTo(Comments::class,'comment_id');  
    }
    
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class,'user_id');
    }
}
