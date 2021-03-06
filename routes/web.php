<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\LibrarianBooksController;

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


Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/books', [PublicController::class, 'books'])->name('books');

Route::get('/books/{detail}', [PublicController::class, 'bookDetails'])->name('book-detail');

Route::get('/about', [PublicController::class, 'about'])->name('about');

Route::get('/user/report-bug', [BugController::class, 'create'])->name('create-bug');

Route::post('/user/report-bug', [BugController::class, 'store'])->name('save-bug');

Route::post('/user/request-book', [PublicController::class, 'requestBook'])->name('request-book');


require __DIR__.'/auth.php';

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('library/books', LibrarianBooksController::class);

    Route::resource('users', AdminUsersController::class);

    Route::resource('library/borrows', BorrowedBookController::class);

    Route::put('library/borrows/returned/{book}', [BorrowedBookController::class, 'returnBook'])->name('borrows.mark-as-returned');

});


