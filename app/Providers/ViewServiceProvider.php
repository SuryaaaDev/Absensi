<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravolt\Avatar\Facade as Avatar;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $user = Auth::user();

            $avatar = $user
                ? Avatar::create($user->name)
                ->setDimension(128, 128)
                ->toBase64()
                : null;

            $view->with('avatar', $avatar);
        });
    }
}
