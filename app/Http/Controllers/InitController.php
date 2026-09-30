<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use function Pest\Laravel\artisan;


class InitController extends Controller
{
   private $Models =[
         'user',
        'Post_statuses',
        'Posts',
        'Comments',
        'Reblies',
        'Reaction_types',
        'Reactions',
    
     ];
    public function migrations()
    {
    
    foreach ($this->Models as $table) {
      Artisan::call('make:migration', [
        'name' => "create_$table"
      ]);

      sleep(1);
     } 

    }
    public function controllers (){
     
    
     foreach($this->Models as $class){
       Artisan::call('make:controller' ,[
        'name' =>$class.'controllers',
        '--api'=> true,
        '--no-interaction'=>true,
       ]);
       
     } 
    }
      public function models()
{
    foreach ($this->Models as $model) {
        Artisan::call('make:model', [
            'name' => $model,
            '-a' => true,
        ]);
    }

    return 'done';
}

public function resources()
{
 $all=count($this->Models);
  $created=0;
    foreach ($this->Models as $model) {
      Artisan::call('make:resource', [
            'name' => $model . 'Resource',
        ]);

        Artisan::call('make:resource', [
           'name' => $model . 'collection',
        ]);
        $created++;

     }
     return $created.'/'.$all . 'resource created sucfully .';
   }


}