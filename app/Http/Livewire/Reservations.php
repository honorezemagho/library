<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use Livewire\Component;

class Reservations extends Component
{
    public $reservation_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function showCreatePublisherModal()
    {
        $this->showModalForm = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->showDeleteModalForm = false;
    }

    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function render()
    {
        $reservations = Reservation::with('book')->get();
       
        return view('livewire.reservations', [
            'reservations' => $reservations,
        ]);
    }
}
