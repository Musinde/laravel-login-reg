<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\MemberController;

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
Route::get('/', [MemberController:: class, 'index']);
Route::get('/', [MemberController:: class, 'getMembers']);
Route::post('/save', [MemberController:: class, 'save']);
Route::post('/update/{id}', [MemberController:: class, 'update']);
Route::get('/delete/{id}', [MemberController:: class, 'delete']);