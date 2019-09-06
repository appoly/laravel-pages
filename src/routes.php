<?php

use Illuminate\Support\Facades\Route;

    Route::post('/admin/pages/image-upload', 'Appoly\LaravelPages\Http\Controllers\PagesController@imageUpload');
    Route::resource(config('laravel_pages.admin_pages_route'), 'Appoly\LaravelPages\Http\Controllers\PagesController')->except('show');
    Route::get(config('laravel_pages.view_pages_route'), 'Appoly\LaravelPages\Http\Controllers\PagesController@show')->name('laravel-pages.show');
   