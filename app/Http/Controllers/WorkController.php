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
    public function fetch_works($page, $per_page){
        //$books = Book::with('authors')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
        $reports = Report::with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
        $subjects = Subject::with('author')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();

        $works = new \Illuminate\Database\Eloquent\Collection; 
        //$works = $works->concat($books);
        $works = $works->concat($reports);
        $works = $works->concat($subjects);
        $works = $works->shuffle();
        $works = $works->slice((($page - 1)*$per_page), $per_page);
        dd($works);
        return $works;
    }

    public function fetch_reports($page, $per_page){
        $reports = Report::with('authors')->with('field')->with('level')->orderBy('id', 'DESC')->get();
        $works = $reports->slice((($page - 1)*$per_page), $per_page);
        return $works;
    }
    public function works(){

        return Inertia::render('Works/index', [
            'auth' => Auth::check(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
