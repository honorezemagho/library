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
        
        //Chart Works
        $works = Report::withCount('views')->limit(10)->get()->sortBy(function($report)
        {
            return $report->views->count();

        });


        $this->chartWorks =  (new LarapexChart)->barChart()
        ->setTitle('San Francisco vs Boston.')
        ->addData('',[7, 3, 8, 2, 6, 4])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);

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
