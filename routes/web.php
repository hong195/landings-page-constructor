<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Models\AmoCRM\LeadsService;
use App\Services\AmoCRM\AmoCrmService;
use App\Services\AmoCRM\TokenService;
use Illuminate\Support\Facades\Route;
use Revolution\Google\Sheets\Facades\Sheets;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing');

Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');

Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('switch-lang');

Route::post('amocrm/integration', function (\Illuminate\Http\Request $request) {
    info('info', [$request->all()]);
})
    ->name('amocrm.integration');

Route::any('test', function() {
    /* @var AmoCrmService $amoCrm*/
    $amoCrm = new AmoCrmService(
        'test',
        'test',
        'test'
    );

    dd($amoCrm->send('test', 'test2', 'test'));
});
