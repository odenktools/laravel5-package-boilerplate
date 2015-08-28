# laravel5-package-boilerplate
How to create Laravel 5 package from scratch

# install

Require this package with composer using the following command:

    @todo

After updating composer, add the service provider to the `providers` array in `config/app.php`

	Odenktools\Cms\OdenktoolsServiceProvider::class,
	
#Publish after installing

You can also publish the views, assets, public folder

php artisan vendor:publish --provider="Odenktools\Cms\OdenktoolsServiceProvider"