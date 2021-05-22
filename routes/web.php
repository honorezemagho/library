<?php

use Inertia\Inertia;
use App\Http\Livewire\Roles\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RolePermissionController;

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

//Home page
Route::get('/', [HomeController::class, 'home'])->name('home');

//About page
Route::get('/about', function () {
    return Inertia::render('About/index', [
        'auth' => Auth::check(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('about');

//Help page
Route::get('/help', function () {
    return Inertia::render('Help/index', [
        'auth' => Auth::check(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('help');

//Work page 
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

//Work details page conserning the work details
Route::get('/work-details/{type}/{id}', [HomeController::class, 'work_details'])->name('work_details');


Route::get('/physical-library', function () {
    return Inertia::render('PhysicalLibrary/index', [
        'auth' => Auth::check(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('physical-library');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('admin')
    ->group(function () {
        Route::get('',  [PageController::class, 'loadPage'])->name('admindashboard');
       //Route::get('/roles', Roles::class)->name('admin');
       //Route::get('/roles',  [RolePermissionController::class, 'index_roles'])->name('roles.index');
    
        Route::get('/{pageName}', [PageController::class, 'loadPage'])->name('admin');        
    });