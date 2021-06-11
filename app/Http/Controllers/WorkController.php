<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\View;
use Inertia\Inertia;
use App\Models\Report;
use App\Models\Status;
use App\Models\Subject;
use App\Models\BookItem;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;

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
            $books = Book::where('title','like',$search)->with('authors')->withCount('views')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
            $reports = Report::where('title','like',$search)->with('authors')->withCount('views')->with('field')->with('level')->orderBy('id', 'DESC')->get();
            $subjects = Subject::where('title','like',$search)->with('author')->withCount('views')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();
            $works = new \Illuminate\Database\Eloquent\Collection; 
            $works = $works->concat($books);
            $works = $works->concat($reports);
            $works = $works->concat($subjects);

        }elseif($type == 'reports'){
            $reports = Report::where('title','like',$search)->with('authors')->withCount('views')->with('field')->with('level')->orderBy('id', 'DESC')->get();
            $works = $reports;
        }elseif($type == 'books'){
            $books = Book::where('title','like',$search)->with('authors')->withCount('views')->with('publisher')->with('format')->with('type')->orderBy('id', 'DESC')->get();
            $works = $books;
            
        }elseif($type == 'subjects'){
            $subjects = Subject::where('title','like',$search)->with('author')->withCount('views')->with('field')->with('period')->with('level')->orderBy('id', 'DESC')->get();
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

    public function reservation(Request $request){
        $request->validate([
                'book_item_id' => 'required',
                'issue_date' => 'required|date_format:Y/m/d',
                'due_date' => 'required|date_format:Y/m/d',
            ]);
       
        $reservation = Reservation::create([
            'reserv_date' => Now(),
            'issue_date' =>$request->input('issue_date'),
            'due_date' => $request->input('due_date'),
            'book_item_id' => $request->input('book_item_id'),
            'status_id' => Status::select('id')->where("slug",'pending')->first()->id,
            'user_id' => Auth::id(),
 
         ]);
            BookItem::find($request->input('book_item_id'))->update([
                'status_id' => Status::select('id')->where("slug",'reserved')->first()->id,
            ]);

         return Redirect::route('work_details', ['book', $request->input('book_id')]);
     
    }

    public function save_view(Request $datas){
        $work_id = $datas['work_id'];
        $model_name = $datas['model_name'];

        $class_name = "";
        if ( $model_name == "Report") {
           $class_name = Report::class;
        }else if ( $model_name == "Book") {
            $class_name = Book::class;
        }else if ( $model_name == "Subject") {
            $class_name = Subject::class;
         }

        View::create([
            'view_id' => $work_id,
            'view_type' => $class_name,
            'user_id' => Auth::id(),
         ]);

        return true;
    }
}
