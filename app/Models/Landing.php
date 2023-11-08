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

    public function registerMediaCollections() : void
    {
        $availableLocales = config('app.available_locales');
        foreach (MediaCollection::cases() as $case) {
            foreach ($availableLocales as $locale) {
                $this->addMediaCollection("{$case->value}_{$locale}");
            }
        }
    }
}
