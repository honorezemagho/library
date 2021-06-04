<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Report;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class WorkController extends Controller
{
    protected $sessionController;
    public function __construct(SessionController $sessionController){
        $this->sessionController = $sessionController;
    }

    public function fetch_works($page, $per_page){
        $books = Book::with('authors')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
        $reports = Report::with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
        $subjects = Subject::with('author')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();

        $works = new \Illuminate\Database\Eloquent\Collection; 
        $works = $works->concat($books);
        $works = $works->concat($reports);
        $works = $works->concat($subjects);
        $works = $works->shuffle();
        $works = $works->slice((($page - 1)*$per_page), $per_page);
        return $works;
    }

    public function fetch_reports($page, $per_page){
        $reports = Report::with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
        $works = $reports->slice((($page - 1)*$per_page), $per_page);
        return json_encode($works);
    }

    public function works($type="all", $search=""){
        $search = '%'.$search.'%';
        $works = null;
        if ($type == 'all') {
            $books = Book::where('title','like',$search)->with('authors')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
            $reports = Report::where('title','like',$search)->with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
            $subjects = Subject::where('title','like',$search)->with('author')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();
            $works = new \Illuminate\Database\Eloquent\Collection; 
            $works = $works->concat($books);
            $works = $works->concat($reports);
            $works = $works->concat($subjects);

        }elseif($type == 'reports'){
            $reports = Report::where('title','like',$search)->with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
            $works = $reports;

        }elseif($type == 'books'){
            $books = Book::where('title','like',$search)->with('authors')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
            $works = $books;
            
        }elseif($type == 'subjects'){
            $subjects = Subject::where('title','like',$search)->with('author')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();
            $works = $subjects;
        }
        $works = $works->shuffle();
        return Inertia::render('Works/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'works' => $works,
            'session' => $this->sessionController->index()
       
        ]);
    }
}
