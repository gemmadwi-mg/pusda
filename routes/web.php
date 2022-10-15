<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'home' => false,
    'password.confirm' => false,
    'password.email' => false,
    'password.request' => false,
    'password.reset' => false,
    'password.update' => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard','middleware' => ['web','auth']] , function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('changes-password', [DashboardController::class, 'changePassword'])->name('change.password');
    Route::post('changes-password', [DashboardController::class, 'changePasswordPost'])->name('changepassword.post');

    Route::get('/upload-photo/{id}', [DashboardController::class, 'vieUpload'])->name('upload.photo');
    Route::post('/upload-photo/{id}', [DashboardController::class, 'vieUploadPost'])->name('uploadphoto.post');

    Route::resource('/profil',ProfileController::class)->except('show','create','store','destroy');

    Route::resource('/assets/soil',ParentsController::class);

    // Route::post('/assets/soil', [ParentsController::class, 'store'])->name('soil.store');
    // Route::get('/assets/soil/create', [ParentsController::class, 'create'])->name('soil.create');
    // Route::get('/assets/soil', [ParentsController::class, 'index'])->name('soil.index');

});
