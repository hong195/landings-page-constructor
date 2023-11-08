<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use \App\Models\MediaCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection as CollectionsMedia;
class LandingController extends Controller
{
    public function index()
    {
        /** @var Landing $landing */
        $landing = Landing::first();

        dd($this->mapSlider($landing->getMedia(MediaCollection::SLIDER->value)));
        return view('landing', [
            'landing' => $landing,
            'slider' => $this->mapSlider($landing->getMedia(MediaCollection::SLIDER->value)),
        ]);
    }

    private function getLocale(): string
    {
        return App::currentLocale();
    }
    private function mapSlider(CollectionsMedia $collection)
    {
        return $collection->map(function ($media) {
            dump($media->toArray());
            return [
                'url' => $media->original_path,
                'title' => $media->getCustomProperty("data.{$this->getLocale()}.slider.title"),
                'subtitle' => $media->getCustomProperty("data.{$this->getLocale()}.slider.subtitle"),
                'text' => $media->getCustomProperty("data.{$this->getLocale()}.slider.description"),
            ];
        });
    }
}
