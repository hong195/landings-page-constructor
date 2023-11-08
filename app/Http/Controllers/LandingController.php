<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use \App\Models\MediaCollection;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection as CollectionsMedia;
class LandingController extends Controller
{
    public function index()
    {
        /** @var Landing $landing */
        $landing = Landing::whereLang(\app()->getLocale())->first();

        return view('landing', [
            'landing' => $landing,
            'slides' => MediaService::getSliderData($landing),
            'brochure' => MediaService::getAboutUsData($landing),
            'advantages' => MediaService::getAdvantages($landing),
            'gallery' => MediaService::getGallery($landing),
            'plans' => MediaService::getPlans($landing),
            'builderVideo' => MediaService::getBuilderVideo($landing),
        ]);
    }
}
