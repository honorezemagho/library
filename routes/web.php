<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BookItemController;
use App\Http\Controllers\SendMailController;
use App\Http\Livewire\HomeSettings;

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


Route::get('/send-mail', [SendMailController::class, 'index'])->name('send.mail.index');

//Home page
Route::get('/', [HomeController::class, 'home'])->name('home');

//About page
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Help page
Route::get('/help', [HomeController::class, 'help'])->name('help');

//Work page 
Route::get('/works/{type}/{search}', [WorkController::class, 'works'])->name('works_full');
Route::get('/works/{type}/', [WorkController::class, 'works'])->name('works_type');
Route::get('/works', [WorkController::class, 'works'])->name('works');

//fetch work 
Route::get('/fetch_works/{page}/{per_page}', [WorkController::class, 'fetch_works'])->name('fetch_works');

//fetch report 
Route::get('/fetch_reports/{page}/{per_page}', [WorkController::class, 'fetch_reports'])->name('fetch_reports');

//Work page with books selected
Route::get('/books', [WorkController::class, 'books'])->name('books');

//Work page with reports selected
Route::get('/reports',[WorkController::class, 'reports'])->name('reports');

//Work page with subjects selected
Route::get('/subjects', [WorkController::class, 'subjects'])->name('subjects');

//reservation
Route::get('/reservation', [WorkController::class, 'reservation'])->name('subjects');

//Work details page conserning the work details
Route::get('/work-details/{type}/{id}', [HomeController::class, 'work_details'])->name('work_details');


Route::get('/physical-library', [HomeController::class, 'PhysicalLibrary'])->name('physical-library');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('admin')
    ->group(function () {
        Route::get('',  [PageController::class, 'loadPage'])->name('admindashboard');
        Route::get('/book/book-item/{id}',[ BookItemController::class, 'index'])->name('book-items.index');
        Route::get('/{pageName}', [PageController::class, 'loadPage'])->name('admin'); 
        Route::post('/home-setting', HomeSettings::class)->name('home-setting');
            
    });