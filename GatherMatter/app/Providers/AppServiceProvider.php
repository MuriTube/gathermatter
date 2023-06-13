<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            if (auth()->user()) {
                $cartItemsCount = \App\Models\Cart::where('user_id', auth()->user()->id)
                    ->whereHas('cart', function ($query) {
                        $query->where('status', 'open');
                    })->count();
                $view->with('cartItemsCount', $cartItemsCount);
            }
        });
    }
}
