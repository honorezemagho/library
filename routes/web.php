<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
use App\Http\Controllers\AdminController;

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
})->name('welcome');


Route::get('/user/report-bug', [BugController::class, 'create'])->name('create-bug');

Route::post('/user/report-bug', [BugController::class, 'store'])->name('save-bug');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::post('/admin/approved', [AdminController::class, 'approve'])->middleware(['auth'])->name('approve-solution');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

    Route::get('/admin/bugs', [AdminController::class, 'bugs'])->name('bugs-dashboard');
});


