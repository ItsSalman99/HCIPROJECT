<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CheckinController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\FetchDataController;
use App\Http\Controllers\Api\PostDataController;
use App\Http\Controllers\Api\SalesmanController;
use App\Http\Controllers\Api\SaleorderController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\DeliveryBoxController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('login', [AuthController::class, 'login']);
// Route::post('verificationlogin', [AuthController::class, 'vlogin']);
// Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group( function () {
    // Route::resource('tasks', TaskController::class);
});
