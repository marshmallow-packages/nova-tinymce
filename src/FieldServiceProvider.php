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

        Nova::serving(function (ServingNova $event) {
            Nova::script('Nova-TinyMCE-tinymce', __DIR__ . '/../dist/js/tinymce.js');
            Nova::script('Nova-TinyMCE', __DIR__ . '/../dist/js/field.js');
            Nova::style('Nova-TinyMCE', __DIR__ . '/../dist/css/field.css');
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
