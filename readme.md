# Summernote

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Summernote for laravel-admin with image uploader

## Installation

Via Composer

``` bash
$ composer require deniskisel/summernote
```

## Usage with laravel-admin
Put below code in the <font color="green">app/admin/bootstrap.php</font> file

``` php
Encore\Admin\Form::extend('summernote', DenisKisel\Summernote\Summernote::class);
```

Add csrf exception in the <font color="green">app/http/middleware/VerifyCsrfToken.php</font> file


``` php
protected $except = [
        '/admin/ajax/uploader'
    ];
```

Use in the laravel-admin controller files
``` php
$form->summernote('description', 'Description');
```
