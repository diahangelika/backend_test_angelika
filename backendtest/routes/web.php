<?php

use App\Http\Controllers\BooklistController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });


// Route::resource('book', BooklistController::class);

Route::get('/books', [BooklistController::class, 'index'])->name('index');
Route::get('/authors', [BooklistController::class, 'author'])->name('author');
// Route::get('/books/{book}/rate', [BooklistController::class, 'rate'])->name('rate');
// Route::post('/books/{book}/rate', [BooklistController::class, 'storeRate'])->name('rate.store');
Route::get('/rate', [BooklistController::class, 'rate'])->name('rate');
Route::post('/rate', [BooklistController::class, 'storeRate'])->name('rate.store');


