<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
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

Route::post('amocrm/integration', [ApplicationController::class, 'store'])->name('applications.store');

Route::any('test', function() {
    $application = \App\Models\Application::first();

    $dataToAppend = [
        $application->data['name'] ?? '',
        $application->data['phone'] ?? '',
        $application->data['type'] ?? '',
        $application->created_at->toDateTimeString(),
    ];

    Sheets::spreadsheet(config('google.sheets.post_spreadsheet_id'))
        ->sheet(config('google.sheets.post_sheet_id'))
        ->append([$dataToAppend]);
});
