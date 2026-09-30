<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
#[Fillable(['name', 'email', 'password','roles','mobile'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
           'password' => 'hashed',
        ];
        
    }
  
       public function roles(): Attribute
{
    return new Attribute(
        get: fn ($val) => explode(',', $val),
        set: fn ($val) => implode(',', $val)
    );
}


         public function posts() :HasMany
    {
          return $this->Hasmany(Posts::class,'user_id');
    }

     public function comments():HasMany
    {
          return $this->Hasmany(Comments::class,'user_id');
    }

     public function Reblies():HasMany
    {
          return $this->Hasmany (Reblies::class,'user_id');
    }

     public function Reactions():HasMany
    {
          return $this->Hasmany(Reactions::class,'user_id');
    }
     public function isAdmain():bool {
      
      $userRoles =$this->roles;
        $isAdmin= in_array('admin',$userRoles);
        return $isAdmin;
     }
}
