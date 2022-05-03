<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom items
    |--------------------------------------------------------------------------
    |
    | Here you can define the custom styling items that will be available in
    | the TinyMCE "Content type" selector.
    |
    */
    'custom_items' => [
        [
            'title' => 'Lead Paragraph',
            'block' => 'p',
            'classes' => 'lead',
        ],
    ],

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
    'content_css_dark' => '/vendor/tinymce/skins/ui/oxide-dark/content.min.css',
    'skin_url_dark' => '/vendor/tinymce/skins/ui/oxide-dark',
    'path_absolute' => '/',
    'plugins' => [
        'lists', 'preview',  'anchor',
        'pagebreak', 'image', 'wordcount',
        'fullscreen', 'directionality', 'paste',
        'advlist', 'autolink', 'charmap', 'code', 'emoticons',
        'fullscreen', 'insertdatetime',  'link',
        'media', 'nonbreaking', 'preview',  'save', 'table',

        // 'hr','print',

        // 'searchreplace', 'template', 'textpattern',
        // 'visualblocks', 'visualchars', 'toc', 'tabfocus',
        // 'quickbars', 'noneditable', 'legacyoutput', 'importcss',
        // 'imagetools', 'fullpage', 'contextmenu', 'colorpicker',
        // 'codesample', 'bbcode', 'autosave', 'autoresize',
        // 'spellchecker', 'help',
    ],

    'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
    'relative_urls' => false,
    'lfm_url' => 'filemanager',
    'use_lfm' => false,
    'use_dark' => true,
    'table_header_type' => 'sectionCells',
    'link_class_list' => [
        ['title' => 'Default', 'value' => ''],
        ['title' => 'Button Primary', 'value' => 'btn btn-primary btn-wide'],
        ['title' => 'Button Primary (Outline)', 'value' => 'btn btn-primary-outline btn-wide'],
        ['title' => 'Button Secondary', 'value' => 'btn btn-secondary btn-wide'],
        ['title' => 'Button Secondary (Outline)', 'value' => 'btn btn-secondary-outline btn-wide'],
    ],
    'table_class_list' => [
        ['title' => 'Default', 'value' => ''],
    ],
    'table_cell_class_list' => [
        ['title' => 'Default', 'value' => ''],
    ],
    'table_row_class_list' => [
        ['title' => 'Default', 'value' => ''],
    ],
    'image_class_list' => [
        ['title' => 'Default', 'value' => ''],
    ],
];
