<?php

namespace App\Services;

use App\Models\Landing;
use App\Models\MediaCollection;

class MediaService
{
    public static function getFavicon(Landing $landing): ?string
    {
        $favicon = $landing?->getFirstMedia(MediaCollection::getByCollection(MediaCollection::FAVICON));

        return $favicon?->getFullUrl();
    }

    public static function getSliderData(Landing $landing)
    {
        $images = $landing->getMedia(MediaCollection::getByCollection(MediaCollection::SLIDER));

        return $images->map(function ($image) {
            return [
                'url' => $image?->getFullUrl(),
                'title' => $image?->getCustomProperty('title'),
                'subtitle' => $image?->getCustomProperty('subtitle'),
                'description' => $image?->getCustomProperty('description'),
            ];
        });
    }

    public static function getAboutUsData(Landing $landing): ?string
    {
        $brochure = $landing->getFirstMedia(MediaCollection::getByCollection(MediaCollection::BROCHURE));

        return $brochure?->getFullUrl();
    }

    public static function getAdvantages(Landing $landing): array
    {
        $image = $landing->getFirstMedia(MediaCollection::getByCollection(MediaCollection::ADVANTAGE_IMAGE));

        $icons = $landing->getMedia(MediaCollection::getByCollection(MediaCollection::ADVANTAGES_ICON));
        $icons = $icons->map(function ($image) {
            return [
                'url' => $image?->getFullUrl(),
                'text' => $image?->getCustomProperty('text'),
            ];
        });

        return [
            'image' => $image?->getFullUrl(),
            'icons' => $icons,
        ];
    }

    public static function getGallery(Landing $landing)
    {
        $images = $landing->getMedia(MediaCollection::getByCollection(MediaCollection::GALLERY));

        return $images->map(function($image) {
            return [
                'url' => $image?->getFullUrl(),
            ];
        });
    }

    public static function getPlans(Landing $landing)
    {
        $layouts = $landing?->getMedia(MediaCollection::getByCollection(MediaCollection::LAYOUTS));

        $layouts =  $layouts->map(function($layout) {
            return [
                'url' => $layout?->getFullUrl(),
                'bedrooms' => $layout?->getCustomProperty('bedrooms'),
                'area' => $layout?->getCustomProperty('area'),
                'floor' => $layout?->getCustomProperty('floor'),
            ];
        });

        return $layouts->groupBy('bedrooms');
    }

    public static function getBuilderVideo(Landing $landing): ?string
    {
        return $landing->getFirstMedia(MediaCollection::getByCollection(MediaCollection::BUILDER_VIDEO))?->getFullUrl();
    }
}
