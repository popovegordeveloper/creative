<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('categories')) \View::share(['menu_categories' => Category::roots()->active()->get()]);
        if (Schema::hasTable('settings')) \View::share(['settings' => Setting::all()]);
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
