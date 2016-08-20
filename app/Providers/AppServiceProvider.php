<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') != 'local') {
            URL::forceSchema('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('League\Glide\Server', function ()
        {
            return \League\Glide\ServerFactory::create([
                'source'                => Storage::disk()->getDriver(),
                'cache'                 => Storage::disk('local')->getDriver(),
                'cache_path_prefix'     => 'images/.cache',
                'base_url'              => 'img',
                'useSecureURLs'         => false,
            ]);
        });

    }
}
