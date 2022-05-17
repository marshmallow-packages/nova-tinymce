![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# Laravel Nova TinyMCE editor

This Nova package allows you to use [TinyMCE editor](https://tiny.cloud) for text areas. You can customize the editor options.

## Composer

You can install the package via composer:

```bash
composer require marshmallow/nova-tinymce
```

## Installation

Run the command bellow, to publish TinyMCE JavaScript and CSS assets.

```bash
php artisan vendor:publish --provider="Marshmallow\Nova\TinyMCE\FieldServiceProvider" --tag="resources"
```

## Usage

Include `TinyMCE` in your fields array on the Nova Resource.

```php
use Marshmallow\Nova\Tinymce\TinyMCE;

public function fields(Request $request)
{
    return [
        ID::make()->sortable(),
        TinyMCE::make(__('Content'), 'content'),
    ];
}
```

### Add custom HTML (buttons)

To add buttons or custom html with the click of a button, you can call the `buttons()` method when you're making the field.

```php
TinyMCE::make('body')->buttons([
    'Name button' =>  'value of HTML',
    'Name button2' =>  '<p>More HTML</p>'
]),
```

### Add variables

To add variables with the click of a button, you can call the `variables()` method when you're making the field. More docs see: https://www.npmjs.com/package/icp-tinymce-variable

```php
TinyMCE::make('body')->variables([
    'name_var' =>  'value_var',
]),
```

### Set the height

The default height of the TinyMCE editor is handled by the `nova-tinymce.php` config file. If there is a need to change the height on some TinyMCE fields, you can do this by calling the `height()` method when you're making the field.

```php
TinyMCE::make('body')->height(300),
```

### Override config file

You can publish the config and override all `TinyMCE` settings.

```bash
php artisan vendor:publish --provider="Marshmallow\Nova\TinyMCE\FieldServiceProvider" --tag="config"
```

### Adding custom styling

If you want to add an extra styling that can be used on all TinyMCE fields, you need to publish the config file. In can add your custom styling options to the `custom_items` array in the config file. These custom styling options should look like the example below.

```php
'custom_items' => [
    // This will add a .lead class on the paragraph tag.
    [
        'title' => 'Lead Paragraph',
        'block' => 'p',
        'classes' => 'lead',
    ],
],
```

### Plugin customization

You can pass any configuration option for the javascript SDK to the array in the `options()` method.
For example, you like to have increased the height of the text area:

```php
TinyMCE::make('body')->options([
    'height' => '980'
]),
```

You can see the full list of parameters in the docs:
[https://www.tiny.cloud/docs/configure/](https://www.tiny.cloud/docs/configure/)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email stef@marshmallow.dev instead of using the issue tracker.

## Credits

-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
