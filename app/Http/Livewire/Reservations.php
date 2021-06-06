<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use Livewire\Component;

class Reservations extends Component
{
    public $reservation_id;

    public function render()
    {
        $reservations = Reservation::all();
        return view('livewire.reservations', [
            'reservations' => $reservations,
        ]);
    }
}
