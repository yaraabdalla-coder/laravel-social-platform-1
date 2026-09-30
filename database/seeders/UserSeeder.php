<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class   UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            User::factory()->create([
            'name' => 'yara abdalla',
            'roles'=>    'admin',
            'email' => 'yaraabdlla295@example.com',
            'mobile' =>'12345',
            'password'=>'password',
            ]);
            User::factory(10)->create();
    }
}
