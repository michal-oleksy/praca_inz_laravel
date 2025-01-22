<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('home', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.edit');


Route::get('calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [App\Http\Controllers\CalendarController::class, 'save'])->name('calendar.save');

Route::get('books', [App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
Route::post('booksStatus/{bookID}', [App\Http\Controllers\BooksController::class, 'updateStatus'])->name('books.updateStatus');


Route::get('bookSpecs/{bookID}', [App\Http\Controllers\BookSpecsController::class, 'index'])->name('bookSpecs');

Route::post('bookSpecs/addRate', [App\Http\Controllers\BookSpecsController::class, 'addRate'])->name('bookSpecs.addRate');
Route::post('bookSpecs/addReview', [App\Http\Controllers\BookSpecsController::class, 'addReview'])->name('bookSpecs.addReview');

Route::get('userList', [App\Http\Controllers\UserListController::class, 'index'])->name('userList.index');

Route::get('userList/{userID}', [App\Http\Controllers\UserSpecsController::class, 'index'])->name('userSpecs.index');

Route::get('friends', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends.index');
Route::get('addFriend/{userID}', [App\Http\Controllers\FriendsController::class, 'addFriend'])->name('friends.addFriend');
Route::post('acceptFriend/{userID}', [App\Http\Controllers\FriendsController::class, 'acceptFriend'])->name('friends.acceptFriend');






