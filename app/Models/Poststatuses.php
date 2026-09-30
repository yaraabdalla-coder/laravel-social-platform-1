<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poststatuses extends Model
{
    /** @use HasFactory<\Database\Factories\PostStatusesFactory> */
    use HasFactory;
     public function posts() :HasMany
    {
          return $this->Hasmany(Posts::class,'poststatus_id');
    }

}
