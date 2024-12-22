<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('home', [App\Http\Controllers\HomeController::class, 'edit'])->name('Home.edit');


Route::get('calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [App\Http\Controllers\CalendarController::class, 'save'])->name('calendar.save');

Route::get('books', [App\Http\Controllers\BooksController::class, 'index'])->name('books.index');







