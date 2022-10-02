<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
        if (env('APP_ENV') === 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {


        setlocale(LC_ALL, 'ru_RU.UTF-8');

        Carbon::setLocale('ru');
        $Carbone = Carbon::now()->locale('ru_RU');



        $verticalMenuJson = file_get_contents(base_path('resources/admin/data/menus/vertical-menu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);



        // share all menuData to all the views
        \View::share('menuData',[$verticalMenuData]);
        \View::share('Carbone',$Carbone);



        Relation::morphMap([
            'post' => 'App\Models\Post',
            'doc' => 'App\Models\Doc',
        ]);
    }
}
