# laravel5-package-boilerplate
How to create Laravel 5 package from scratch

#Install
To install odenktools, add the following lines in your composer.json file:
	
	"require-dev": {
		"odenktools/boilerplate": "dev-master"
	}

Save, then run it from your console

	composer update --dev

#Setup
After updating composer, add the service provider to the `providers` array in `config/app.php`

	Odenktools\Boilerplate\BoilerplateServiceProvider::class,

#Publish

You can also publish the views, assets, public folder

	php artisan vendor:publish --provider="Odenktools\Boilerplate\BoilerplateServiceProvider"

Or using tag

	php artisan vendor:publish --provider="Odenktools\Boilerplate\BoilerplateServiceProvider" --tag="views"
	
#Migration
	php artisan vendor:publish --provider="Odenktools\Boilerplate\BoilerplateServiceProvider" --tag="migrations"
	php artisan migrate
	
#Test

navigate your browser to http://your-url/blog