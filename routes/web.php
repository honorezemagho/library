<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
use App\Models\Bug;

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

Route::get('/dashboard', function () {
    $bugs = Bug::all();
    $resolved = Bug::whereNotNull('resolved_by');
    return view('dashboard', compact('bugs', 'resolved'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/user/report-bug', [BugController::class, 'create'])->name('create-bug');

Route::post('/user/report-bug', [BugController::class, 'store'])->name('save-bug');
