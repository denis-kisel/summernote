<?php

use Illuminate\Routing\Router;
Route::group([
    'namespace'     => 'DenisKisel\Summernote\Controllers',
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
        $router->post('/summernote/media', 'Uploader@store');
});
