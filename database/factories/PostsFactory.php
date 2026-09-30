<?php

namespace Database\Factories;
Use App\Models\Poststatuses;
use App\Models\Posts;
Use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->text(100),
            'body'=>fake()->text(),
            'user_id'=> User::all()->random()->id,
          // 'poststatus_id'=>Poststatuses::all()->random()->id,
          'poststatus_id' => 'required|exists:post_statuses,id',
        ];
    }
}
