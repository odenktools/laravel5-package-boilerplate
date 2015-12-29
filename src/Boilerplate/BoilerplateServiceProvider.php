<?php

namespace Odenktools\Boilerplate;

use Illuminate\Support\ServiceProvider;

class BoilerplateServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'stoplite');

		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'stoplite');
		
		$this->publishViewFolder();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['stoplite'];
	}

	/**
	 * package views files
	 * php artisan vendor:publish --provider="Odenktools\Boilerplate\BoilerplateServiceProvider" --tag="views"
	 * @return void
	 */
	private function publishViewFolder()
	{
		$this->publishes([
		__DIR__ . '/../resources/views' => base_path('resources/views/vendor/odenktools'),
		], 'views');
	}
	
}
