<?php

namespace App\Http\Livewire;

use App\Models\Library;
use Livewire\Component;

class Settings extends Component
{
    public $default_issue_days;
    public $max_issue_book_limit;
    public $max_reserv_book_limit;
    public $book_due_reminder_before_Days;
    public $fine_per_overdue_day;
    public $currency;
    public $lib_default_language;

    public function submit(){
        $this->validate([
            'lib_default_language' => ['required', 'string', 'max:255'],
            'book_due_reminder_before_Days' => ['required'],
            'max_reserv_book_limit' => ['required'],
            'default_issue_days' => ['required']
        ]);

        Library::find(1)->update([
            'lib_default_language' => $this->lib_default_language,
            'book_due_reminder_before_Days' => $this->book_due_reminder_before_Days,
            'max_reserv_book_limit' => $this->max_reserv_book_limit,
            'default_issue_days' => $this->default_issue_days,   
            'fine_per_overdue_day' => $this->fine_per_overdue_day,
            'max_issue_book_limit' => $this->max_issue_book_limit,
            'currency' => $this->currency,
        ]);
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
