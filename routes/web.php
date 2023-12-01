<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\HydrantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BfpMapController;

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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/map', [MapController::class, 'viewMap']);

Route::post('/map', [HydrantController::class, 'storeRecommendedHydrant'])->name('hydrant.store');

Route::get('/login', function () {
    return view('login');
});

Route::get('/bfp-map', function () {
    return view('bfpMap');
});

Route::get('/map/{id}', [HydrantController::class, 'showHydrantInfo']);

Route::get('/bfp-map/{id}', [HydrantController::class, 'showHydrantInfo']);

Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('web');

Route::middleware(['auth'])->group(function () {
    Route::get('/bfp-admin', function () {
        return view('bfpAdmin');
    })->name('bfpAdmin');  

    Route::get('/bfp-responder', function () {
        return view('bfpResponder');
    })->name('bfpResponder'); 

    Route::get('/cabwad-admin', function () {
        return view('cabwadAdmin');
    })->name('cabwadAdmin'); 
    
    Route::get('/get-users-info', [UserController::class, 'getUserInfo'])->name('get.users.info');
});

Route::get('/fetch-coordinates', [MapController::class, 'fetchCoordinates']);

Route::get('/close-map', [BfpMapController::class, 'closeMap']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/report-issue', [HydrantController::class, 'storeReportIssue'])->name('store.report.issue');

Route::post('/create-report', [HydrantController::class, 'createReport'])->name('create.generate.report');
Route::get('/get-generate-report', [HydrantController::class, 'getGenerateReport'])->name('get.generate.report');

Route::post('/create-account', [UserController::class, 'createAccount'])->name('create.account');
Route::get('/get-user/{id}', [UserController::class, 'getUser'])->name('get.user');
Route::post('/update-user', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
Route::get('/get-users', [UserController::class, 'getUserS'])->name('get.users');

