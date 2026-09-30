<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReactionTypes extends Model
{
    /** @use HasFactory<\Database\Factories\ReactionTypesFactory> */
    use HasFactory;
     public function Ractions():HasMany
    {
        return $this->hasMany(Reactions::class,'reaction_type_id');
    }
}
