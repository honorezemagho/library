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
        $books = Book::with('authors')->with('publisher')->with('format')->with('type')->limit(10)->orderBy('id', 'DESC')->get();
        $reports = Report::with('authors')->with('field')->with('level')->limit(10)->orderBy('id', 'DESC')->get();
        $subjects = Subject::with('author')->with('field')->with('period')->with('level')->limit(10)->orderBy('id', 'DESC')->get();

        $works = new \Illuminate\Database\Eloquent\Collection; 
        $works = $works->concat($books);
        $works = $works->concat($reports);
        $works = $works->concat($subjects);
        $works = $works->shuffle();
        $works = $works->slice(0,4);
        return Inertia::render('Home/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'works' =>  $works
        ]);
    }

    public function work_details($type,$id){
        $work = null;
   
       if ($type == "report") {
            $work = Report::where('id', $id)->with('authors')->with('field')->with('level')->first();
     
        }elseif ($type == "book") {
            $work = Book::where('id', $id)->with('authors')->with('publisher')->first();
     
        }elseif ($type == "subject") {
            $work = Subject::with('author')->with('field')->with('level')->first();
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

