<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | Choose what routes to use for your pages.
    |
    |
    */

    'admin_pages_route' => '/admin/pages',
    'admin_route_prefix' => 'admin.',
    'admin_middle_ware' => ['web', 'auth'],
    'view_pages_route' => '/page/{slug}',
    'disable_show_route' => false,
    'disable_header_image' => false,
    'disable_page_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | Here you may specify which editor your pages form should use.
    |
    | Supported: "textarea", "tiptap"
    |
    */

    'editor' => 'tiptap',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here you can define the layout file you would like to use for your pages.
    |
    |
    |
    */

    'layout_file' => 'layouts.app',
    'layout_file_frontend' => 'layouts.frontend',

    /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    |
    | Here you can define a custom view for your pages.
    | When creating your view the page will come through as $page
    | Keep blank to use the default
    |
    */

    'custom_view' => '',

    /*
    |--------------------------------------------------------------------------
    | S3
    |--------------------------------------------------------------------------
    |
    | Here you can define your s3 details for image uploads
    | without these details images will not be available
    |
    |
    */

    'AWS_ACCESS_KEY_ID' => env('AWS_ACCESS_KEY_ID', ''),

    'AWS_SECRET_ACCESS_KEY'=> env('AWS_SECRET_ACCESS_KEY', ''),

    'AWS_DEFAULT_REGION'=>env('AWS_DEFAULT_REGION', 'us-east-1'),

    'AWS_BUCKET' => env('AWS_BUCKET', ''),

    /*
    |--------------------------------------------------------------------------
    | Partials
    |--------------------------------------------------------------------------
    |
    | Here you can include an array of partials that you would like
    | included on you page. An example can be seen below
    |   'partials' => [
    |       [
    |           'name' => 'Contact Form',
    |           'location' => 'partials.contact-form'
    |       ]
    |   ]
    | WARNING: ALTERING THESE AFTER PRODUCTION WILL CAUSE ERRORS
    */

    'partials' => [

    ],

];
