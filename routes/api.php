<?php

use App\Http\Controllers\api\CatigorieApiController;
use App\Http\Controllers\api\MedicineApiController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\FactoryMedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFactoryMedicineController;
use App\Http\Controllers\UserFactoryMedicineFavoriteController;
use App\Http\Controllers\web\CatigoriesController;
use App\Http\Controllers\web\MedicineController;
use App\Http\Controllers\web\TranslateController;
use Stichoza\GoogleTranslate\GoogleTranslate;

use App\Models\Factory;
use App\Models\UserFactoryMedicine;
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

Route::middleware(['auth:api','isAdmin'])->group(function () {
    Route::get('getAllOrders',[OrderController::class,'getAllOrders']);
    Route::post('PaymentStatus',[OrderController::class,'PaymentStatus']);
    Route::post('factory-medicines', [FactoryMedicineController::class, 'store']);

});

Route::prefix('auth')->middleware(['api'])->group(function(){
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('user/password/email', [UserController::class,'userForgotPassword']);
    Route::post('user/password/code/check', [UserController::class,'userCheckCode']);
    Route::post('user/password/reset', [UserController::class,'userResetPassword']);
});

Route::middleware(['auth:api',])->group(function () {
    Route::get('index/catigories',[CatigorieApiController::class,'indexCat']);
    Route::get('searchC',[CatigorieApiController::class,'searchC']);
    Route::get('index/medicines',[MedicineApiController::class,'indexMed']);
    Route::get('indexMedicines',[MedicineApiController::class,'indexMedicines']);
    Route::get('searchM',[MedicineApiController::class,'searchM']);
    Route::get('getFactory',[FactoryController::class,'getFactory']);
    Route::post('newCart',[OrderController::class,'newCart']);
    Route::post('addToCart',[UserFactoryMedicineController::class,'addCart']);
    Route::get('delete_from_cart',[UserFactoryMedicineController::class,'delete']);
    Route::post('sendOrder',[OrderController::class,'sendOrder']);
    Route::get('getOrders',[OrderController::class,'getOrder']);
    Route::get('favorites', [UserFactoryMedicineFavoriteController::class, 'index']);
    Route::post('favorites/store', [UserFactoryMedicineFavoriteController::class, 'store']);
    Route::post('favorites/delete', [UserFactoryMedicineFavoriteController::class, 'destroy']);

    Route::get('/all_notifications',[UserController::class,'listAllNotification']);
    Route::post('/order_status',[OrderController::class,'OrderStatus']);
    Route::post('report',[OrderController::class,'get_report']);
});




//Route::get('/translate',[TranslateController::class,'translate']);
