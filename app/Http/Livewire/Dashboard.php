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
        $reservations = Reservation::count();
        $members = User::role('Member')->count();

        $chartWorksCategory = (new LarapexChart)->pieChart()
        ->setTitle('Category of Works')
        ->addData([ $reports,$books, $subjects])
        ->setLabels(['Report', 'Books', 'Subjects']);

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
        ]);
    }
}
