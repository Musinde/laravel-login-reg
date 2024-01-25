<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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
})->name(name: 'home');
Route::get('/login', [AuthManager::class, 'login']);
Route::post('/login', [AuthManager::class, 'loginPost']);
Route::get('/registration', [AuthManager::class, 'registration']);
Route::post('/registration', [AuthManager::class, 'registrationPost']);
Route::get('/logout', [AuthManager::class, 'logout']);
Route::group(['middleware' => 'auth'], function (){
    Route::get('/profile', function (){
        return "Hello";
    });
});
