<?php

use App\Models\Posts;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InitController;
use App\Http\Controllers\SystemController;
USE App\Http\Controllers\TaskController;
use App\Http\Controllers\{
    AuthController,
    CommentsController,
    PostController,
    PostStatusController,
    ReactionController,
    ReactionTypeController,
    ReplyController,
    UserController,
 

};
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
  


Route::prefix('auth')->controller(AuthController::class)->group(function () {

    Route::post('login', 'login')->name('login');
    Route::post('register', 'register');
    Route::post('forget-password', 'forget_password');
    Route::post('reset-password', 'reset_password');
    

});

Route::prefix('init')->controller(InitController::class)->group(function () {
    Route::get('migrations', 'migrations');
    Route::get('controllers', 'controllers');
    Route::get('models', 'models');
    Route::get('resources', 'resources');
});


Route::middleware(['auth:sanctum','hasRole:admin,user,editor,guest','throttle:3,0.2'])->name('api.')->group(function(){
    Route::apiResources([
        'comments'       => CommentsController::class,
       'posts'          => PostController::class,
        'reactions'      => ReactionController::class,
        'replies'        => ReplyController::class,
        'users'          => UserController::class,
        'tasks'          =>  TaskController::class,
       
        ]);

    Route::middleware(['hasRole:admin'])->group(function(){
        Route::apiResources ([
             'reaction-types' => ReactionTypeController::class,
              'post-statuses'  => PostStatusController::class,
         ]);
    });
    Route::prefix('auth')->middleware('throttle:auth')->controller(AuthController::class)->group(function () {
    Route::post('change-password', 'change_password');
    Route::get('active-sessions', 'active_sessions');
    Route::delete('logout-all', 'logout_all');
    Route::get('logout-current', 'logout_current');
     Route::get('logout-sessions/{id}', 'logout_sessions');
    Route::get('logout-others', 'logout_others');

});

});



Route::fallback(function () {
    throw new NotFoundHttpException(' api route not found');
    
});