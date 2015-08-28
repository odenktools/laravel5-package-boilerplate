<?php

namespace Odenktools\Cms\Providers;

use Illuminate\Support\ServiceProvider;

class OdenktoolsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Load view from
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'odenktools');
		
		//After publish.. wheres my view files are located?
		$this->publishes([
			__DIR__ . '/../resources/views' => base_path('resources/views/vendor/odenktools'),
        ]);
		
		//Setup routes for the great package
		if (! $this->app->routesAreCached()) {
			require __DIR__.'/../Http/routes.php';
		}
		
		//After publish.. wheres my config file are located?
        $this->publishes([
			__DIR__ . '/../config/odenktools.php' => config_path('odenktools.php')
        ], 'config');
		
		//After publish.. wheres my asset files are located?
        $this->publishes([
			__DIR__. '/../resources/assets' => base_path ('resources/assets/vendor/odenktools'),
        ], 'assets');
		
		//After publish.. wheres my public folder are located?
        $this->publishes([
			__DIR__. '/../public' => public_path ('vendor/odenktools'),
        ], 'public');	
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->mergeConfigFrom(
			__DIR__.'/../config/odenktools.php', 'odenktools'
		);
		
    }
}
