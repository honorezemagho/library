<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\User;
use App\Models\Report;
use App\Models\Subject;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Dashboard extends Component
{
    public function render()
    {
        $reports = Report::count();
        $books = Book::count();
        $subjects = Subject::count();
        $members = User::role('Member')->count();

        $categoryWorkChart = (new LarapexChart)->pieChart()
        ->setTitle('Posts')
        ->setDataset([150, 120])
        ->setLabels(['Published', 'No Published']);
        
        return view('livewire.dashboard', 
        ['reports' => $reports,
         'books' => $books, 
         'subjects' => $subjects,
         'members' => $members,
         'categoryWorkChart' => $categoryWorkChart,
        ]);
    }
}
