<?php

namespace Database\Seeders;
use App\Models\ReactionTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['haha','like','love','wow','sad','angry'];

             foreach ($types as $type) {
                 ReactionTypes::create([
                  'type' => $type
            ]);
               }
              }
}
