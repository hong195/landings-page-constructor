<?php

namespace App\Models;

enum MediaCollection : string
{
    case LOGO = 'logo';

    case SLIDER = 'slider';

    case ADVANTAGES_ICON = 'advantages_icon';

    case ADVANTAGE_IMAGE = 'advantage_image';

    case GALLERY = 'gallery';
    case LAYOUTS = 'layouts';

    case BUILDER_VIDEO = 'builder_video';

    public static function getByCollection(self $case): string
    {
        $currentLocale = app()->getLocale();

        return "{$case->value}_{$currentLocale}";
    }
}
