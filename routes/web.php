<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AdminController;


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
})->name('home');



Auth::loginUsingId(2);

//auth()->loginUsingId(2);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list-cards', [CardController::class, 'index'])->name('list.cards');




// se sto moze da pravi adminot ke sto vo ovaa grupa ! 
Route::middleware(['auth', 'hasRole:admin'])->group(function () {

Route::get('/admin-cards', [AdminController::class, 'cards'])->middleware('auth', 'hasRole:admin')->name('admin.cards');
Route::post('/store-card', [CardController::class, 'store'])->name('card.store');
Route::get('/edit-card/{id}', [CardController::class, 'edit'])->name('card.edit');
Route::put('/update-card/{id}', [CardController::class, 'update'])->name('card.update');
Route::delete('/delete-card/{id}', [CardController::class, 'destroy'])->name('card.destroy');

});




