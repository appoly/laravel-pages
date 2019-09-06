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
    'view_pages_route' => '/page/{slug}',

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | Here you may specify which editor your pages form should use.
    |
    | Supported: "textarea", "tiptap"
    | tiptap - requires installation see readme
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

];
