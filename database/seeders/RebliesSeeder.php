<?php

namespace Database\Seeders;
use App\Models\Reblies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RebliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reblies::factory(1000)->create();
    }
}
