<?php
use App\Http\Controllers\Web\PostController;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Route;

Route::Resources([
       'posts'          => PostController::class,
]);

Route::fallback(function () {
return view('page-404');
    
});