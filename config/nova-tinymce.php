<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    |
    | Here you can define the options that are passed to all TinyMCE
    | fields by default.
    |
    */

    'height' => 800,
    'content_css' => '/vendor/tinymce/skins/ui/oxide/content.min.css',
    'skin_url' => '/vendor/tinymce/skins/ui/oxide',
    'path_absolute' => '/',
    'plugins' => [
        'lists', 'preview', 'hr', 'anchor', 
        'pagebreak', 'image', 'wordcount', 
        'fullscreen', 'directionality', 'paste', 'textpattern',
        'advlist', 'autolink', 'charmap', 'code', 'emoticons',
        'fullscreen', 'insertdatetime', 'legacyoutput', 'link',
        'media', 'nonbreaking', 'preview', 'print', 'save', 'table',

        // 'searchreplace', 'template', 'textpattern',
        // 'visualblocks', 'visualchars', 'toc', 'tabfocus',
        // 'quickbars', 'noneditable', 'legacyoutput', 'importcss',
        // 'imagetools', 'fullpage', 'contextmenu', 'colorpicker',
        // 'codesample', 'bbcode', 'autosave', 'autoresize',
        // 'spellchecker', 'help',
    ],

  //   image_list: [
  //   {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
  //   {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
  // ]

    'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
    'relative_urls' => false,
    'use_lfm' => false,
    'lfm_url' => 'filemanager',
];
