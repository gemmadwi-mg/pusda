<?php

use App\Http\Controllers\Api\AuthenticationController;
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
    // logout
    Route::get('logout', [AuthenticationController::class, 'logout']);


});
