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

    'height' => 350,
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

    'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
    'relative_urls' => false,
    'use_lfm' => false,
    'lfm_url' => 'filemanager',
];
