<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugController;
use App\Http\Controllers\AdminController;
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
    $bugs = Bug::orderBy('id', 'DESC')->get();
    $resolved = Bug::whereNotNull('resolved_by')->orderBy('id', 'DESC')->get();
    return view('dashboard', compact('bugs', 'resolved'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dashboard/qa', [AdminController::class, 'qaDashboard'])->name('qa-dashboard');

Route::get('/admin/bugs', function () {
        if(auth()->user()->role->name == 'Developer'){
            return redirect(route('dashboard'));
        }
        return redirect(route('qa-dashboard'));
})->middleware(['auth'])->name('bugs-dashboard');

Route::get('/user/report-bug', [BugController::class, 'create'])->name('create-bug');

Route::post('/user/report-bug', [BugController::class, 'store'])->name('save-bug');

Route::post('/admin/markas-resolved', [AdminController::class, 'resolveBug'])->middleware(['auth'])->name('mark-as-resolved');


Route::post('/admin/approved', [AdminController::class, 'approve'])->middleware(['auth'])->name('approve-solution');
