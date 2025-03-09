<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\FortifyServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->register(FortifyServiceProvider::class);
    }

    public function boot()
    {
        //
    }
}
