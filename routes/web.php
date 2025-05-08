<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
Route::post('/chatbot', [App\Http\Controllers\ChatbotController::class, 'handle'])->name('chatbot.ask');

Route::get('/', function () {
    return view('layouts.app');
});
