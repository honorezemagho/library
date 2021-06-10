<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\User;
use App\Models\Report;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Reservation;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Dashboard extends Component
{
    public $category;
    public $orderBy;
    public $order;
    public $limit;
    protected $chartWorks;
    protected $works;

    public function mount(){
        
        //Chart Works
        $this->works = Report::withCount('views')->get()->sortBy(function($report)
        {
            return $report->views->count();

        });

    }

    public function updatedCategory($cat){
        if ($cat == "book"){
            $this->works = Book::withCount('views')->get()->sortBy(function($report) {
                return $report->views->count();
    
            });
     
        }else if ($cat == "report") {
            $this->works = Report::withCount('views')->get()->sortBy(function($report) {
                return $report->views->count();
    
            });
     
        }else{
            $this->works = Subject::withCount('views')->get()->sortBy(function($report) {
                return $report->views->count();
    
            });
        }
    }

    public function render()
    {
        $reports = Report::count();
        $books = Book::count();
        $subjects = Subject::count();
        $reservations_count = Reservation::count();
        $reservations = Reservation::with('status')->get();
        $members = User::role('Member')->count();

        $chartWorksCategory = (new LarapexChart)->pieChart()
        ->setTitle('Category of Works')
        ->addData([ $reports,$books, $subjects])
        ->setLabels(['Report', 'Books', 'Subjects']);

        //Chart reservation
        $reservations_confirmed = $reservations->filter(function($reservation) {
            return $reservation->status->slug == "confirmed";
        })->count();
        $reservations_validated = $reservations->filter(function($reservation) {
            return $reservation->status->slug == "validated";
        })->count();
        $reservations_pending = $reservations->filter(function($reservation) {
            return $reservation->status->slug == "pending";
        })->count();
       
        $chartReservation = (new LarapexChart)->pieChart()
        ->setTitle('Reservaion status')
        ->addData([ $reservations_confirmed, $reservations_validated, $reservations_pending])
        ->setLabels(['Pending', 'Validated', 'Confirmed']);

        $chartEvolutionOfUsers = (new LarapexChart)->lineChart()
        ->setTitle('Evolution of Users')
        ->addLine('Users', \App\Models\User::query()->pluck('id')->toArray())
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
        ->setColors(['#ffc63b']);

        //Chart works
        $works_count = $this->works->pluck('views_count')->toArray();
        $works_title = $this->works->pluck('title')->toArray();
        $this->chartWorks =  (new LarapexChart)->barChart()
        ->addData('', $works_count)
        ->setXAxis($works_title);

        
        return view('livewire.dashboard', 
        ['reports' => $reports,
         'books' => $books, 
         'subjects' => $subjects,
         'members' => $members,
         'reservations_count' => $reservations_count,
         'chartWorksCategory' => $chartWorksCategory,
         'chartEvolutionOfUsers' => $chartEvolutionOfUsers,
         'chartReservation' => $chartReservation,
         'chartWorks' => $this->chartWorks,
        ]);
    }
}
