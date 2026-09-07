<?php

namespace Marshmallow\Nova\TinyMCE;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Marshmallow\Nova\TinyMCE\Console\SupportFileManagerCommand;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../dist/tinymce') => public_path('vendor/tinymce'),
        ], 'resources');

        $this->publishes([
            realpath(__DIR__ . '/../dist/css/custom.css') => public_path('vendor/tinymce/css/custom.css'),
        ], 'resources');

        $this->publishes([
            __DIR__ . '/../config/nova-tinymce.php' => config_path('nova-tinymce.php'),
        ], 'config');

        // Asset names are served verbatim as /nova-api/scripts/<name> and matched
        // case-sensitively, so a capitalised name breaks on any host that
        // normalises urls to lowercase - the script 404s, the Vue component never
        // registers, and every Nova form using this field dies on submit with
        // "t.fill is not a function" (MM-25314). The Vue component names in
        // resources/js are a separate contract and stay as they are.
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-tinymce-tinymce', __DIR__ . '/../dist/js/tinymce.js');
            Nova::script('nova-tinymce', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-tinymce', __DIR__ . '/../dist/css/field.css');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                SupportFileManagerCommand::class
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-tinymce.php', 'nova-tinymce');
    }
}
