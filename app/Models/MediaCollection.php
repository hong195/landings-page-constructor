<?php

namespace App\Models;

enum MediaCollection : string
{
    case LOGO = 'logo';

    case FAVICON = 'favicon';

    case SLIDER = 'slider';

    case ADVANTAGES_ICON = 'advantages_icon';

    case ADVANTAGE_IMAGE = 'advantage_image';

    case GALLERY = 'gallery';

    case BROCHURE = 'brochure';

    case LAYOUTS = 'layouts';

    case LAYOUTS_FILE = 'layouts_file';

    case BUILDER_VIDEO = 'builder_video';

    public static function getByCollection(self $case): string
    {
        $currentLocale = app()->getLocale();

        return "{$case->value}_{$currentLocale}";
    }
}
