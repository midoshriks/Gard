<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GardsController;
use App\Http\Controllers\SweetController;
use App\Http\Controllers\BigWaterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\PepsiCansController;
use App\Http\Controllers\SmallWaterController;
use App\Http\Controllers\PepsiPlasticController;
use App\Http\Controllers\PepsiPlasticsController;
use App\Http\Controllers\SweetProductionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('gard', GardsController::class);


Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...

        // dashboard
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
            // Dashboard
            Route::resource('/index', DashboardController::class);

            // PepsiCans
            Route::resource('/pepsi_cans', PepsiCansController::class);
            // PepsiPlastic
            Route::resource('/pepsiplastic', PepsiPlasticController::class);

            // Route::get('edit/pepsi_plastics/{id}', [PepsiPlasticController::class, 'edit'])->name('edit.pepsi');
            // Route::put('update/pepsi_plastics/{id}', [PepsiPlasticController::class, 'update'])->name('update.pepsi');
            // Route::delete('delete/pepsi_plastics/{id}', [PepsiPlasticController::class, 'destroy'])->name('delete.pepsi');

            // SmallWater
            Route::resource('/smallwater', SmallWaterController::class);

            // BigWater
            Route::resource('/bigwater', BigWaterController::class);

            // SweetPoding
            Route::resource('/sweetpoding', SweetController::class);

            // SweetProduction
            Route::resource('/sweetProduction', SweetProductionController::class);

            // ------------------------ admin ------------------------
            Route::resource('/lang',LanguagesController::class);
        });
    }
);
