<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('Calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('Calendar.index');
Route::post('Calendar', [App\Http\Controllers\CalendarController::class, 'save'])->name('Calendar.save');
// Route::post('Calendar', [App\Http\Controllers\CalendarController::class, 'edit'])->name('Calendar.edit');



