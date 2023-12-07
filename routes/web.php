<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Services\AmoCRMService;
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
    $amoCrm = new AmoCRMService();

    $amoCrm->createDeal();
});
