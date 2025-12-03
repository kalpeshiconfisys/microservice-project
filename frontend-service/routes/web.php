<?php

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
    return view('welcome');
});


use App\Http\Controllers\FrontendController;

Route::get('/register', [FrontendController::class, 'registerPage']);
Route::post('/register', [FrontendController::class, 'register']);

Route::get('/login', [FrontendController::class, 'loginPage']);
Route::post('/login', [FrontendController::class, 'login']);

Route::get('/products', [FrontendController::class, 'products']);
Route::post('/products', [FrontendController::class, 'addProduct']);
Route::post('/products/update/{id}', [FrontendController::class, 'updateProduct']);
Route::get('/products/delete/{id}', [FrontendController::class, 'deleteProduct']);
