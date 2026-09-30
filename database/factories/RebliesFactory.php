<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Comments;
use App\Models\Reblies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reblies>
 */
class RebliesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'replay'=>fake()->text(),
            'comment_id'=>Comments::inRandomOrder()->first()->id,
             'user_id'=>User::inRandomOrder()->first()->id,
        ];
    }
}
