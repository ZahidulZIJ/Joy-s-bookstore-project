<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Home route (optional)
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Book CRUD routes
Route::resource('books', BookController::class);
