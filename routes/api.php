<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\ChilderController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// authentication
Route::post('login', [AuthenticationController::class, 'login']);


Route::group(['middleware' => ['jwt.verify']], function () {

    // Get User
    Route::get('user', [AuthenticationController::class, 'getUser']);
    Route::post('/user/upload/photo/{id}', [ProfileController::class, 'upload']);
    Route::put('/user/update/{id}', [ProfileController::class, 'update']);
    Route::post('/user/change-password', [ProfileController::class, 'changePassword']);

    // logout
    Route::get('logout', [AuthenticationController::class, 'logout']);

    // parent
    Route::group(['prefix' => 'parent'], function () {
        Route::post('/create', [ParentController::class, 'createParent']);
        Route::get('/', [ParentController::class, 'getAll']);
        Route::put('/update/{id}', [ParentController::class, 'updateParent']);
        Route::delete('/delete/{id}', [ParentController::class, 'deleteParent']);
    });

    // childer
    Route::group(['prefix' => 'childer'], function () {
        Route::post('/create', [ChilderController::class, 'createChilder']);
        Route::get('/', [ChilderController::class, 'getAll']);
        Route::put('/update/{id}', [ChilderController::class, 'updateChilder']);
        Route::delete('/delete/{id}', [ChilderController::class, 'deleteChilder']);
    });

    // payment
    Route::group(['prefix' => 'payment'], function () {
        Route::post('/create', [PaymentController::class, 'createPayment']);
        Route::get('/', [PaymentController::class, 'getAll']);
        Route::put('/update/{id}', [PaymentController::class, 'updatePayment']);
        Route::delete('/delete/{id}', [PaymentController::class, 'deletePayment']);
    });
});
