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
Route::resource('users', App\Http\Controllers\UserController::class );
Route::resource('dogs', App\Http\Controllers\DogController::class );

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\DogController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\UserController::class ,'profile'])->name('profile');
Route::get('/addDogForAdoption', [App\Http\Controllers\DogController::class, 'create'])->name('addDogForAdoption');
Route::get('/myDogs', [App\Http\Controllers\UserController::class, 'myDogs'])->name('myDogs');
Route::get('/adopt', [App\Http\Controllers\DogController::class, 'adopt'])->name('adopt');
Route::get('/editDog', [App\Http\Controllers\DogController::class, 'edit'])->name('editDog');
Route::get('/freeConsultation', [App\Http\Controllers\DogController::class, 'freeConsultation'])->name('freeConsultation');
Route::get('/dogsBreeds', [App\Http\Controllers\DogController::class, 'dogsBreeds'])->name('dogsBreeds');

Route::post('/predictImage',  [App\Http\Controllers\PredictController::class, 'predictImage'])->name('predictImage');
Route::get('/chatbot', function () {
    return view('freeConsultation');
});
    
Route::match(['get', 'post'], '/botman', 'ChatBotController@handle');
