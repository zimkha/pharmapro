<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Bon_commande;
use App\Events\CommandcreateEvent;
use Event;
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
        Bon_commande::created(function($item){
            Event::dispatch(new CommandcreateEvent($item));
        });
    }
}
