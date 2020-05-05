# Laravel Nova TinyMCE editor

This Nova package allow you to use [TinyMCE editor](https://tiny.cloud) for text areas. You can customize the editor options.

## Installation

```shell
composer require marshmallow/nova-tinymce
```
Run the command bellow, to publish TinyMCE JavaScript and CSS assets.
```shell
php artisan vendor:publish --provider="Marshmallow\Nova\TinyMCE\FieldServiceProvider"
```

## Usage
In your Nova resource add the use declaration and use the TinyMCE field:
```php
public function fields(Request $request)
{
    return [
        ID::make()->sortable(),

        \Marshmallow\Nova\Tinymce\TinyMCE::make('body'),
    ];
}
```

You can use custome options like this:

```php
TinyMCE::make('body')->height(300),
```

### Override config file
In case you have in mind a default `options` array to load any time you instantiate the `TinyMCE` field, you can optionally publish the config file and override the default options:

```bash
php artisan vendor:publish --provider="Marshmallow\Nova\TinyMCE\FieldServiceProvider" --tag="config"
```

### Plugin customization
You can virtually pass any configuration option for the javascript SDK to the array in the `options()` method.
For example, you like to have increased the height of the text area:
```php
TinyMCE::make('body')->options([
    'height' => '980'
]),
```

You can see the full list of parameters in the docs:
[https://www.tiny.cloud/docs/configure/](https://www.tiny.cloud/docs/configure/)