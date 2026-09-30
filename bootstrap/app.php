<?php

use App\Support\jsonResponseHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Ensureuserhasrole;
use Illuminate\Validation\ValidationException;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\Log;
//use Throwable;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'hasRole'=>Ensureuserhasrole::class
        ]);
    })
 ->withExceptions(function (Exceptions $exceptions): void {

    $exceptions->render(function (\Throwable $e) {
       //dd (get_class($e));

   
         $json = new JsonResponseHandler();
         $message = $e->getmessage();
      log::error($e->getMessage(),[    'exception' => $e]);


         if($e instanceof AccessDeniedHttpException ){
             return $json->jsonResponse('fail',403, $message);
         }
             if($e instanceof ValidationException ){
             return $json->jsonResponse('fail',422, $message,$e->errors());
         }
   if($e instanceof AuthenticationException){
             return $json->jsonResponse('fail',401, $message);
         }
               
 if($e instanceof NotFoundHttpException){
          return $json->jsonResponse('fail',404, $message);
        }
        if($e instanceof ThrottleRequestsException){
          return $json->jsonResponse('fail',429, $message);
        } 

         if(app()->hasDebugModeEnabled()){
        
return $json->jsonResponse('fail',500, $message,[
            'trace'=>$e->getTraceAsString(),
            'file'=>$e->getFile(),
            'line'=>$e->getLine(),
         
         ]);
         }
             return $json->jsonResponse('fail',500, 'internal server error');

     
    });     
       

})->create();