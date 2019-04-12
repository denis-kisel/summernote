<?php

namespace DenisKisel\Summernote;

use Encore\Admin\Form\Field;

class Summernote extends Field
{
    public static $js = [
        '/vendor/deniskisel/bower_components/summernote/dist/summernote-bs4.js',
    ];

    public static $css = [
        '/vendor/deniskisel/bower_components/summernote/dist/summernote-bs4.css',
    ];

    protected $view = 'dksummernote::summernote';

    public function render()
    {
        $this->script = "
                $('.summernote').summernote({
                    height: 400,
                    callbacks: {
                        onImageUpload: function(image) {
                            uploadImage(image[0], this);
                        }
                    }
                });
                
                function uploadImage(image, currentEditor) {
                    var data = new FormData();
                    data.append(\"image\", image);
                    $.ajax({
                        url: '/admin/ajax/uploader',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: data,
                        type: \"post\",
                        success: function(url) {
                            var image = $('<img>').attr('src', url);
                            $(currentEditor).summernote(\"insertNode\", image[0]);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            ";

        return parent::render();
    }
}
