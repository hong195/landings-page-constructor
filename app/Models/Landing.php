<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Landing extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'domain',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $availableLocales = config('nova-language-switch.supported-languages');

        foreach (MediaCollection::cases() as $case) {
            foreach ($availableLocales as $locale => $name) {

                if (in_array($case->value, [MediaCollection::BUILDER_VIDEO->value,
                    MediaCollection::LOGO->value, MediaCollection::BROCHURE->value])) {
                    $this->addMediaCollection("{$case->value}_{$locale}")->singleFile();
                    continue;
                }

                $this->addMediaCollection("{$case->value}_{$locale}");
            }
        }
    }
}
