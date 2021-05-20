<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\User;
use App\Models\Report;
use App\Models\Subject;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $reports = Report::count();
        $books = Book::count();
        $subjects = Subject::count();
        $members = User::role('Member')->count();
        
        return view('livewire.dashboard', 
        ['reports' => $reports,
         'books' => $books, 
         'subjects' => $subjects,
         'members' => $members,
        ]);
    }
}
