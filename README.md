# Laravel Pages

Laravel pages is a package that makes creating custom pages for your web app easy!

## Installation 

    composer require appoly/laravel-pages
       
## Assets

To publish the packages assets run the following command.

    php artisan vendor:publish --tag=public --force

To include the packages JS and CSS you need to add the following to the top of your layout.app file

    @yield('scripts')

## Config

To publish the packages config file run the following command.

    php artisan vendor:publish --tag=config --force

To include the packages JS and CSS you need to add the following to the top of your layout.app file

## How to use

Once you've installed this package new routes will be created for your web app.
To see all of your apps pages navigate to

    /admin/pages
    
From there you can create and edit your pages. To view your pages you can navigate to 

    /page/{slug}
    
These routes are editable via the config file.

If you are removing the `page` part from the config, place this as the last time in your routes file:

`Route::get(config('laravel_pages.view_pages_route'), '\Appoly\LaravelPages\Http\Controllers\PagesController@show')->name('laravel-pages.show');
`