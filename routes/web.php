<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(BookController::class)->group(function() {
    Route::get('/books/{id}', 'details');
    Route::get('/search/books', 'search');
    Route::patch('/borrowBook/{book_id}', 'borrowBook');
    Route::patch('/returnBook/{book_id}', 'returnBook');
});


Route::controller(ClientController::class)->group(function() {
    Route::post('/clients', 'store');
    Route::get('/clients', 'show');
    Route::get('/clients/{id}', 'details');
});

