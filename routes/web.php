<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CheckInputController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(ForumController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/d/{id}', 'detail');
    Route::post('/startDiscussion', 'store');
    Route::post('/replyDiscussion', 'storeComments');
    Route::delete('/delete', 'delete');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/doLogin', 'doLogin');
    Route::get('/logout', 'doLogout');
});

Route::get('/checkInput', [CheckInputController::class, 'index']);
Route::post('/process', [CheckInputController::class, 'process']);

