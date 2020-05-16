<?php

use Illuminate\Support\Facades\Route;

Route::post('/admin/pages/image-upload', 'Appoly\LaravelPages\Http\Controllers\PagesController@imageUpload');

Route::middleware(config('laravel_pages.admin_middle_ware'))->name(config('laravel_pages.admin_route_prefix'))->group(function () {
    Route::resource(config('laravel_pages.admin_pages_route'), 'Appoly\LaravelPages\Http\Controllers\PagesController')->except('show');
});

if (! config('laravel_pages.disable_show_route')) {
    Route::get(config('laravel_pages.view_pages_route'), 'Appoly\LaravelPages\Http\Controllers\PagesController@show')->name('laravel-pages.show');
}
