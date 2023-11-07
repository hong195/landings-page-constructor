<?php

namespace App\Models;

enum MediaCollection : string
{
    case LOGO = 'logo';

    case SLIDER = 'slider';

    case ADVANTAGES_ICON = 'advantages_icon';

    case ADVANTAGE_IMAGE = 'advantage_image';

    case LAYOUTS = 'layouts';

    case BUILDER_VIDEO = 'builder_video';
}
