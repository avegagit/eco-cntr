<?php

if (!function_exists('assetsPath'))
{
    function assetsPath(string $path): string
    {
        $templateName = service('avegacmsconfig')->getConfig('template.name');

        return "template/{$templateName}/assets/{$path}";
    }
}

if (!function_exists('getIcon'))
{
    function getIcon(string $path, array $attributes = []): string
    {
        if (!isset($attributes['width']))
        {
            $attributes['width'] = '1em';
        }

        if (!isset($attributes['height']))
        {
            $attributes['height'] = '1em';
        }

        if (!isset($attributes['class']))
        {
            $attributes['class'] = 'bi';
        }

        if (!isset($attributes['fill']))
        {
            $attributes['fill'] = 'currentColor';
        }

        return sprintf('<svg%s><use xlink:href="#%s"/></svg>', stringify_attributes($attributes), $path);
    }
}

if (!function_exists('imgLazy'))
{
    function imgLazy(array $data): string
    {
        return img(
            [
                'src'      => 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7',
                'data-src' => base_url($data['src'] ?? ''),
                'class'    => implode(
                    ' ',
                    [
                        'img-background',
                        'lozad',
                        $data['use_placeholder'] ?? true ? 'placeholder-image' : '',
                        $data['class'] ?? false
                    ]
                ),
                'alt'      => $data['alt'] ?? '',
            ]
        );
    }
}