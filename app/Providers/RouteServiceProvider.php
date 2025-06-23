<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public static function redirectByRole(): string
{
    return match (Auth::user()->role) {
        'admin' => '/dashboard',
        'customer' => '/dashboard',
        default => '/dashboard',
    };
}


    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
