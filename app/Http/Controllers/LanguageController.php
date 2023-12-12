<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use \App\Models\MediaCollection;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection as CollectionsMedia;
class LanguageController extends Controller
{
    public function switchLang($lang): \Illuminate\Http\RedirectResponse
    {
        if (in_array($lang, array_keys(config('nova-language-switch.supported-languages')))) {
            Session::put('applocale', $lang);
        }

        if ($lang === 'ru') {
            return Redirect::route('landing');
        }

        return Redirect::route('landing', ['lang' => $lang]);
    }
}
