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
        return [
            'content_css' => config('nova-tinymce.content_css'),
            'skin_url' => config('nova-tinymce.skin_url'),
            'path_absolute' => config('nova-tinymce.path_absolute'),
            'plugins' => join(' ', config('nova-tinymce.plugins')),
            'toolbar' => config('nova-tinymce.toolbar'),
            'relative_urls' => config('nova-tinymce.relative_urls'),
            'use_lfm' => config('nova-tinymce.use_lfm'),
            'lfm_url' => config('nova-tinymce.lfm_url'),
            'height' => config('nova-tinymce.height'),
            'link_class_list' => [
                ['title' => 'No class', 'value' => ''],
                ['title' => 'Button (primary - soft)', 'value' => 'btn btn-soft-primary btn-wide transition-3d-hover']
            ],
            'style_formats' => [
                [
                    'title' => env('APP_NAME'),
                    'items' => [
                        [
                            'title' => 'Lead Paragraph',
                            'block' => 'p',
                            'classes' => 'lead'
                        ]
                    ]
                ],
            ],
            'style_formats_merge' => true,
        ];
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
            'options' => array_merge($currentOptions, $options)
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
            'id' => $id
        ]);

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
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
