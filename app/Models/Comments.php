<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['comment','user_id','post_id'])]
class Comments extends Model
{
//protected $fillable = [
    //'comment',
    //'user_id',
    //'post_id'
//];
//protected $guarded = [
  //  'is_admin'
//];

    /** @use HasFactory<\Database\Factories\CommentsFactory> */
    use HasFactory;

    public function reactions():MorphMany
    {
        return $this-> morphMany(Reactions::class,'reactble');
    }
        public function Reply() :HasMany
    {
          return $this->Hasmany(Reblies::class,'comment_id');  
    }
    
    public function post():BelongsTo
    {
        return $this-> BelongsTo(Posts::class);
    }

    public function user():BelongsTo
    {
        return $this-> BelongsTo(User::class);
    }

    public function Task():HasMany
  {
     return $this->hasMany(Task::class);
  }


    
}
