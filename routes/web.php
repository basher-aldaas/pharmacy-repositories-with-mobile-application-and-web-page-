<?php

use App\Http\Controllers\web\CatigoriesController;
use App\Http\Controllers\web\MedicineController;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
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
    return view('login');
});


// Route::controller(CatigoriesController::class)->group(function () {

//     Route::get('/Home','home')->name('medicine.home');
//     Route::get('/AnalgesicsLink', 'AnalgesicsFunction');
//     Route::get('/AntibioticsLink', 'AntibioticsFunction');
//     Route::get('/AntidepressantsLink', 'AntidepressantsFunction');
//     Route::get('/AntihypertensivesLink', 'AntihypertensivesFunction');
//     Route::get('/AntacidsLink', 'AntacidsFunction');
//     Route::get('/AntihistaminesLink', 'AntihistaminesFunction');

// });
// Route::controller(MedicineController::class)->group(function () {
//     Route::get('/Home/searchMed','searchMed')->name('medicine.search');

// });

// Route::controller(CatigoriesController::class)->group(function () {
//     Route::get('/Home/searchCat','searchCat')->name('catigorie.search');

// });

Route::get('/translate', function () {
    $tr = new GoogleTranslate('en');
    return $tr->setSource("en")->setTarget("ar")->translate("hello world");
});