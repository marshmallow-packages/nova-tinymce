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
    'content_css' => '/vendor/tinymce/skins/ui/oxide/content.min.css, /vendor/tinymce/css/custom.css',
    'skin_url' => '/vendor/tinymce/skins/ui/oxide',
    'content_css_dark' => '/vendor/tinymce/skins/ui/oxide-dark/content.min.css',
    'skin_url_dark' => '/vendor/tinymce/skins/ui/oxide-dark',
    'path_absolute' => '/',
    'plugins' => [
        'my_variables', 'my_buttons', 'lists', 'wordcount', 'advlist', 'autolink', 'charmap', 'emoticons', 'link', 'table', 'visualblocks',
        // 'preview', 'anchor','pagebreak','image', 'fullscreen','directionality', 'code',
        // 'insertdatetime','media','nonbreaking', 'save',
        // 'hr','print','paste', 'searchreplace', 'template', 'textpattern',
        // 'visualchars', 'toc', 'tabfocus',
        // 'quickbars', 'noneditable', 'legacyoutput', 'importcss',
        // 'imagetools', 'fullpage', 'contextmenu', 'colorpicker',
        // 'codesample', 'bbcode', 'autosave', 'autoresize',
        // 'spellchecker', 'help',
    ],

    'menubar' => 'file edit view insert format tools table',

    'toolbar' => 'undo redo | styleselect | bold italic forecolor | link | visualblocks removeformat | alignleft aligncenter alignright | bullist numlist |  my_buttons my_variables ',

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
    'formats' => [],
    // 'removed_menuitems' => [],
    'paste_as_text' => false,
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
    'variable_mapper' => [
        'account_id' => "Account ID",
        'email' => "E-mail address"
    ],
    'my_variables' => [],
    'my_buttons' => [
        ['title' => 'Default', 'value' => ''],
        ['title' => 'Button Primary', 'value' => 'btn btn-primary btn-wide'],
        ['title' => 'Button Primary (Outline)', 'value' => 'btn btn-primary-outline btn-wide'],
        ['title' => 'Button Secondary', 'value' => 'btn btn-secondary btn-wide'],
        ['title' => 'Button Secondary (Outline)', 'value' => 'btn btn-secondary-outline btn-wide'],
    ]
];
