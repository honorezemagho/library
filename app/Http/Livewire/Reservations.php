<?php

namespace App\Http\Livewire;

use App\Mail\ReservationMail;
use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;

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

    public function showEditReservationModal(){

    }
    public function showDeleteReservationModal(){
        
    }

    public function confirmReservation($id){
        //Send email after confirming the reservation
       Reservation::find($id)->update([
            'status_id' => 3,
       ]);

        $reservation = Reservation::find($id);
        $user = User::where("id", $reservation->user_id)->first()->toArray();
        $book_item =  $reservation->book;
        $book = Book::find($book_item->book_id);
        $details = [
            "issue_date" =>  $reservation->issue_date,
            "book_title" =>  $book->title,
            "book_item_code"  =>   $book_item->code,
            "reservation_id"  =>  $reservation->id,
         ];

        Mail::to('anafackjordan@gmail.com')->send(new ReservationMail($details));

    	dd('Mail Send Successfully');


    }

    public function deleteReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Role'. $role->name.' Deleted Successfully');
    }

    public function render()
    {
        $reservations = Reservation::with('book')->get();
        return view('livewire.reservations', [
            'reservations' => $reservations,
        ]);
    }
}
