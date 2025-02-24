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
    'license_key' => 'gpl',
    'height' => 350,
    'content_css' => '/vendor/tinymce/skins/ui/oxide/content.min.css, /vendor/tinymce/css/custom.css',
    'skin_url' => '/vendor/tinymce/skins/ui/oxide',
    'content_css_dark' => '/vendor/tinymce/skins/ui/oxide-dark/content.min.css',
    'skin_url_dark' => '/vendor/tinymce/skins/ui/oxide-dark',
    'path_absolute' => '/',
    'plugins' => [
        'my_variables',
        'my_buttons',
        'lists',
        'preview',
        'anchor',
        'pagebreak',
        'image',
        'wordcount',
        'fullscreen',
        'directionality',
        'advlist',
        'autolink',
        'charmap',
        'code',
        'emoticons',
        'fullscreen',
        'insertdatetime',
        'link',
        'media',
        'nonbreaking',
        'preview',
        'save',
        'table',

        // 'pasteword',

        // 'hr','print','paste',

        // 'searchreplace', 'template', 'textpattern',
        // 'visualblocks', 'visualchars', 'toc', 'tabfocus',
        // 'quickbars', 'noneditable', 'legacyoutput', 'importcss',
        // 'imagetools', 'fullpage', 'contextmenu', 'colorpicker',
        // 'codesample', 'bbcode', 'autosave', 'autoresize',
        // 'spellchecker', 'help',
    ],

    'menubar' => 'file edit view insert format tools table',

    'toolbar' => ' undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link | my_buttons my_variables ',
    'relative_urls' => false,
    'lfm_url' => 'filemanager',
    'use_lfm' => false,
    'use_dark' => true,
    'browser_spellcheck' => false,

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
        'account_id' => 'Account ID',
        'email' => 'E-mail address'
    ],
    'my_variables' => [],
    'my_buttons' => [
        ['title' => 'Default', 'value' => ''],
        ['title' => 'Button Primary', 'value' => 'btn btn-primary btn-wide'],
        ['title' => 'Button Primary (Outline)', 'value' => 'btn btn-primary-outline btn-wide'],
        ['title' => 'Button Secondary', 'value' => 'btn btn-secondary btn-wide'],
        ['title' => 'Button Secondary (Outline)', 'value' => 'btn btn-secondary-outline btn-wide'],
    ],
    'color_map' => [
        '#BFEDD2',
        'Light Green',
        '#FBEEB8',
        'Light Yellow',
        '#F8CAC6',
        'Light Red',
        '#ECCAFA',
        'Light Purple',
        '#C2E0F4',
        'Light Blue',

        '#2DC26B',
        'Green',
        '#F1C40F',
        'Yellow',
        '#E03E2D',
        'Red',
        '#B96AD9',
        'Purple',
        '#3598DB',
        'Blue',

        '#169179',
        'Dark Turquoise',
        '#E67E23',
        'Orange',
        '#BA372A',
        'Dark Red',
        '#843FA1',
        'Dark Purple',
        '#236FA1',
        'Dark Blue',

        '#ECF0F1',
        'Light Gray',
        '#CED4D9',
        'Medium Gray',
        '#95A5A6',
        'Gray',
        '#7E8C8D',
        'Dark Gray',
        '#34495E',
        'Navy Blue',

        '#000000',
        'Black',
        '#ffffff',
        'White'
    ],
    'extra_options' => [
        // 'paste_enable_default_filters' => true,
        // 'paste_word_valid_elements' => 'b,strong,i,em,h1,h2',
        // 'paste_retain_style_properties' => 'color font-size',
        // 'paste_convert_word_fake_lists' => false,

        // 'valid_classes' => [
        //     'p' => '',
        //     'span' => '',
        // ],
    ],

];
