<?php

namespace Database\Seeders;
use app\Models\Reactions;

use App\Models\Posts;
use App\Models\Poststatuses;
USE App\Models\User;
use App\Models\Reactiontypes;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
             UserSeeder::class,
            PostStatusesSeeder::class,
           ReactionTypesSeeder::class,
            PostsSeeder::class,
            CommentsSeeder::class,
             ReactionTypesSeeder::class,
            RebliesSeeder::class,
            
                    ]);
      }
      
      }