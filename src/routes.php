<?php

use Illuminate\Routing\Router;

app('router')->namespace('DenisKisel\Summernote\Controllers')->group(function ($router) {
    $router->post('/admin/ajax/uploader', 'Uploader@store');
});
