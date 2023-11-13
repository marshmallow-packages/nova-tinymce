<?php

namespace Marshmallow\Nova\TinyMCE;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Expandable;

class TinyMCE extends Field
{
    use Expandable;

    public $showOnIndex = false;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'Nova-TinyMCE';

    public function __construct(string $name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => $this->buildOptionsArray(),
        ]);
    }

    public function height($height)
    {
        $currentOptions = $this->meta['options'];
        $currentOptions['height'] = $height;

        return $this->withMeta([
            'options' => $currentOptions,
        ]);

        return $this;
    }

    protected function buildOptionsArray()
    {
        $options = [
            'content_css' => config('nova-tinymce.content_css'),
            'skin_url' => config('nova-tinymce.skin_url'),
            'content_css_dark' => config('nova-tinymce.content_css_dark'),
            'skin_url_dark' => config('nova-tinymce.skin_url_dark'),
            'path_absolute' => config('nova-tinymce.path_absolute'),
            'plugins' => join(' ', config('nova-tinymce.plugins')),
            'toolbar' => config('nova-tinymce.toolbar'),
            'relative_urls' => config('nova-tinymce.relative_urls'),
            'use_lfm' => config('nova-tinymce.use_lfm'),
            'use_dark' => config('nova-tinymce.use_dark'),
            'lfm_url' => config('nova-tinymce.lfm_url'),
            'height' => config('nova-tinymce.height'),
            'table_header_type' => config('nova-tinymce.table_header_type'),
            'link_class_list' => config('nova-tinymce.link_class_list'),
            'table_class_list' => config('nova-tinymce.table_class_list'),
            'table_cell_class_list' => config('nova-tinymce.table_cell_class_list'),
            'table_row_class_list' => config('nova-tinymce.table_row_class_list'),
            'image_class_list' => config('nova-tinymce.image_class_list'),
            'variable_mapper' => config('nova-tinymce.variable_mapper'),
            'variable_valid' => config('nova-tinymce.variable_valid'),
            'menu' => config('nova-tinymce.menu'),
            'menubar' => config('nova-tinymce.menubar'),
            'my_buttons' => config('nova-tinymce.my_buttons'),
            'my_variables' => config('nova-tinymce.my_variables'),
            'style_formats_merge' => true,
            'paste_as_text' => config('nova-tinymce.paste_as_text'),
            'removed_menuitems' => config('nova-tinymce.removed_menuitems'),
            'color_map' => config('nova-tinymce.color_map'),
            'promotion' => false,
        ];

        if (config('nova-tinymce.formats') && !empty(config('nova-tinymce.formats'))) {
            $options['formats'] = config('nova-tinymce.formats');
        }

        if ($custom_items = config('nova-tinymce.custom_items')) {
            $options['style_formats'] = [
                [
                    'title' => config('app.name'),
                    'items' => $custom_items,
                ],
            ];
        }

        return $options;
    }

    /**
     * Allow to pass any existing TinyMCE option to the editor.
     * Consult the TinyMCE documentation [https://github.com/tinymce/tinymce-vue]
     * to view the list of all the available options.
     *
     * @param  array $options
     * @return self
     */
    public function options(array $options)
    {
        $currentOptions = $this->meta['options'];

        return $this->withMeta([
            'options' => array_merge($currentOptions, $options),
        ]);
    }

    public function plugins(array $plugins)
    {
        return $this->withMeta([
            'options' => array_merge($this->meta['options'], [
                "plugins" => join(' ', $plugins),
            ]),
        ]);
    }


    public function buttons(array $buttons)
    {

        $mappedButtons = [];
        collect($buttons)->map(function ($value, $key) use (&$mappedButtons) {
            $mappedButtons[] = [
                'title' => $key,
                'value' => $value,
            ];
            return $mappedButtons;
        });

        return $this->withMeta([
            'options' => array_merge($this->meta['options'], [
                "my_buttons" => $mappedButtons,
            ]),
        ]);
    }

    public function variables(array $variables)
    {
        $mappedVars = [];
        $allowedVars = [];
        collect($variables)->map(function ($key, $value) use (&$mappedVars, &$allowedVars) {
            $mappedVars[] = [
                'title' => $key,
                'value' => $value,
            ];
            $allowedVars[] = $value;
            $allowedVars[] = " " . $value . " ";
            return $mappedVars;
        });

        // $allowedVars

        return $this->withMeta([
            'options' => array_merge($this->meta['options'], [
                "my_variables" => $mappedVars,
                // "variable_valid" => $allowedVars,
            ]),
        ]);
    }

    public function toolbar(string $toolbar)
    {
        return $this->withMeta([
            'options' => array_merge($this->meta['options'], [
                'toolbar' => $toolbar
            ]),
        ]);
    }

    /**
     * Set the field id html attribute.
     *
     * @return $this
     */
    public function id($id)
    {
        $this->withMeta([
            'id' => $id,
        ]);

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
        ]);
    }

    public function addStyle(array $style)
    {
        $this->meta['options']['style_formats'][(count($this->meta['options']['style_formats']) - 1)]['items'][] = $style;

        return $this;
    }

    public function addStyles(array $styles)
    {
        foreach ($styles as $style) {
            $this->addStyle($style);
        }

        return $this;
    }
}
