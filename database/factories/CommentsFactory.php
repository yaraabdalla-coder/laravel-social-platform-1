<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Comments;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'Comment'=>Fake()->text(500),
            'user_id'=>User::inRandomOrder()->first()->id,
            'post_id'=>Posts::inRandomOrder()->first()->id,
        ];
    }
}
