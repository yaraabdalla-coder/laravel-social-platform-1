<?php

namespace App\Providers;

//use Illuminate\Cache\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
  RateLimiter::for('auth',function(Request $request){
        return[
            Limit::perMinute(3)->by($request->ip()),
            Limit::perSecond(3,20)->by($request->users()?->id?: $request->ip()),
        ];
    });
    }

}
