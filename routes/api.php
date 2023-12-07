<?php

use App\Http\Controllers\api\CatigorieApiController;
use App\Http\Controllers\api\MedicineApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\web\CatigoriesController;
use App\Http\Controllers\web\MedicineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->group(function(){
//     Route::get('/user', function (Request $request) {return $request->user();});

// });



// Route::group(['middleware' => ['api'],'prefix' => 'auth'], function ($router) {
//     Route::post('/login', [UserController::class, 'login']);
//     Route::post('/register', [UserController::class, 'register']);
//     Route::post('/logout', [UserController::class, 'logout']);
// });


Route::prefix('admin')->middleware(['auth:api','isAdmin'])->group(function(){
    Route::post('/loginWeb',[UserController::class,'loginWeb']);
    Route::get('/indexCat',[CatigoriesController::class,'indexCat']);
    Route::get('/indexMed',[MedicineController::class,'indexMed']);
    Route::get('/searchMed',[MedicineController::class,'searchMed']);
    Route::get('/searchCat',[CatigoriesController::class,'searchCat']);



});

Route::prefix('auth')->middleware(['api'])->group(function(){
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);

});

Route::middleware(['auth:api',])->group(function () {
    Route::get('index/catigories',[CatigorieApiController::class,'indexCat']);
    Route::get('searchC',[CatigorieApiController::class,'searchC']);
    Route::get('index/medicines',[MedicineApiController::class,'indexMed']);
    Route::get('searchM',[MedicineApiController::class,'searchM']);
    Route::get('index',[MedicineApiController::class,'index']);
});


