<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use TCG\Voyager\Actions\DeleteAction;
use TCG\Voyager\Actions\EditAction;
use TCG\Voyager\Actions\ViewAction;
use TCG\Voyager\Facades\Voyager;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Voyager::addAction(\App\Actions\UserInitDataAction::class);
    }
}
