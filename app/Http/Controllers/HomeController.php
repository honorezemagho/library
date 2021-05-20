<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Mockery\Matcher\Subset;

class HomeController extends Controller
{
    public function home(){
        $reports = Report::with('authors')->with('field')->with('level')->limit(4)->orderBy('id', 'DESC')->get();
        return Inertia::render('Home/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'reports' =>  $reports
        ]);
    }

    public function work_details($type,$id){
        $work = null;
   
       if ($type == "report") {
            $work = Report::where('id', $id)->with('authors')->with('field')->with('level')->first();
            $work->type = 'Report';
     
        }elseif ($type == "book") {
            $work = Book::where('id', $id)->with('authors')->with('publisher')->first();
            $work->type = 'Book';
     
        }elseif ($type == "subject") {
            $work = Subject::with('authors')->with('field')->with('level')->first();
            $work->type = 'Subject';
        }

        return Inertia::render('WorkDetails/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'work' =>  $work
        ]);
    }
}

