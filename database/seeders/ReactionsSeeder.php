<?php
    

use App\Models\Reactions;
use App\Models\User;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\Reblies;
use App\Models\ReactionTypes;
use Illuminate\Database\Seeder;

class ReactionsSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 500; $i++) {

        
            $reactable_type = fake()->randomElement([
                Posts::class,
                Comments::class,
                Reblies::class,
            ]);

            $reactable_id = match ($reactable_type) {
                Posts::class => Posts::inRandomOrder()->first()->id,
                Comments::class => Comments::inRandomOrder()->first()->id,
                default => Reblies::inRandomOrder()->first()->id,
            };

        
            $user_id = User::inRandomOrder()->first()->id;

            
            $reaction_type_id = ReactionTypes::inRandomOrder()->first()->id;

            $exists = Reactions::where('user_id', $user_id)
                ->where('reactable_type', $reactable_type)
                ->where('reactable_id', $reactable_id)
                ->exists();

            if (!$exists) {
                Reactions::factory()->create([
                    'user_id' => $user_id,
                    'reaction_type_id' => $reaction_type_id,
                    'reactable_type' => $reactable_type,
                    'reactable_id' => $reactable_id,
                ]);
            }
        }
    }
}