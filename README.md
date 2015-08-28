# laravel5-package-boilerplate
How to create Laravel 5 package from scratch

#Install
To install odenktools, add the following lines in your composer.json file:
	
	"require-dev": {
		"odenktools/cms": "dev-master"
	}

Save, then run it from your console

	composer update --dev

#Setup
After updating composer, add the service provider to the `providers` array in `config/app.php`

	Illuminate\Html\HtmlServiceProvider::class,
	Odenktools\Cms\Providers\OdenktoolsServiceProvider::class,

add the Html facade to the `aliases` array in `config/app.php`

	'Html'      => Illuminate\Html\HtmlFacade::class,

#Publish

You can also publish the views, assets, public folder

php artisan vendor:publish --provider="Odenktools\Cms\Providers\OdenktoolsServiceProvider"

#Test

navigate your browser to http://your-url/blog