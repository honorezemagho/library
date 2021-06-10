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
    public function render()
    {
        $reports = Report::count();
        $books = Book::count();
        $subjects = Subject::count();
        $reservations = Reservation::with('status')->get();
        $members = User::role('Member')->count();

        $chartWorksCategory = (new LarapexChart)->pieChart()
        ->setTitle('Category of Works')
        ->addData([ $reports,$books, $subjects])
        ->setLabels(['Report', 'Books', 'Subjects']);

        //Chart reservation
        $reservations_confirmed = $reservations->status->where('slug', "confirmed")->count();
        $reservations_validated = $reservations->status->where('slug', "validated")->count();
        $reservations_pending = $reservations->status->where('slug', "pending")->count();
     
        $chartReservation = (new LarapexChart)->pieChart()
        ->setTitle('Reservaion status')
        ->addData([ $reservations_confirmed, $reservations_validated, $reservations_pending])
        ->setLabels(['Pending', 'Validated', 'Confirmed']);

        $chartEvolutionOfUsers = (new LarapexChart)->lineChart()
        ->setTitle('Evolution of Users')
        ->addLine('Users', \App\Models\User::query()->pluck('id')->toArray())
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'])
        ->setColors(['#ffc63b']);
        
        return view('livewire.dashboard', 
        ['reports' => $reports,
         'books' => $books, 
         'subjects' => $subjects,
         'members' => $members,
         'reservations' => $reservations,
         'chartWorksCategory' => $chartWorksCategory,
         'chartEvolutionOfUsers' => $chartEvolutionOfUsers,
         'chartReservation' => $chartReservation,
        ]);
    }
}
