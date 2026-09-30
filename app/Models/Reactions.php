<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reactions extends Model
{
    /** @use HasFactory<\Database\Factories\ReactionsFactory> */
    use HasFactory;

    
    public function user():BelongsTo
    {
        return $this-> BelongsTo(User::class);
    }

    
    public function Reactiontype():BelongsTo
    {
        return $this-> BelongsTo(Reactiontypes::class);
    }
    
     public function reactable():MorphTo
    {
        return $this->morphTo();
    }

}
