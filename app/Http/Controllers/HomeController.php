<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionController;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Mockery\Matcher\Subset;

class HomeController extends Controller
{
    protected $sessionController;
    public function __construct(SessionController $sessionController){
        $this->sessionController = $sessionController;
    }

    public function home(){
        $books = Book::with('authors')->withCount('views')->with('publisher')->with('format')->with('type')->limit(10)->orderBy('id', 'DESC')->get();
        $reports = Report::with('authors')->withCount('views')->with('field')->with('level')->limit(10)->orderBy('id', 'DESC')->get();
        $subjects = Subject::with('author')->withCount('views')->with('field')->with('period')->with('level')->limit(10)->orderBy('id', 'DESC')->get();

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
            'works' =>  $works,
            'session' => $this->sessionController->index()
        ]);
    }

    public function about(){
        return Inertia::render('About/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'session' => $this->sessionController->index()

        ]);
    }

    public function help(){
        return Inertia::render('Help/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'session' => $this->sessionController->index()
        ]);
    }

    public function physicalLibrary(){
        //Select a book  if the format is physical
        $works = Book::whereHas('bookItems.format', function ($query) {
            return $query->where('slug', '=', "p_doc");
        })->with('bookItems')->with('authors')->with('publisher')->get();

        return Inertia::render('PhysicalLibrary/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'works' => $works,
            'session' => $this->sessionController->index()
        ]);
    }

    public function work_details($type,$id){
        $work = null;
        $related = null;
       if ($type == "report") {
            $work = Report::where('id', $id)->with('authors')->with('field')->with('level')->first();
            $related = Report::where('title','like','%'.$work->title.'%')->with('authors')->with('field')->with('level')->get();

        }elseif ($type == "book") {
            $work = Book::where('id', $id)->with('authors')->with('bookItems',function($query){
                $query->with('format')->with('status');
            })->with('publisher')->first();
            $related = Book::where('title','like','%'.$work->title.'%')->with('authors')->with('publisher')->get();
            //dd($work);
        }elseif ($type == "subject") {
            $work = Subject::where('id', $id)->with('author')->with('field')->with('level')->first();
            $related = Subject::where('title','like','%'.$work->title.'%')->with('author')->with('field')->with('level')->get();
        }

        $related = $related->slice(0, 4);

        return Inertia::render('WorkDetails/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'work' =>  $work,
            'related' =>  $related,
            'session' => $this->sessionController->index()
        ]);
    }
}

