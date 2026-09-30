<?php

namespace Database\Seeders;
use App\Models\Poststatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $poststatus_types=[

                            'pending',
                            'published',
                            'cancaled',
                            'postpoend',
                            'draft',
                            'private',
                            ]; 
        foreach($poststatus_types as $type){
        Poststatuses::Factory()->create(
                [
                    'type'=>$type,
                ]
            );
            
            }
    }

}
