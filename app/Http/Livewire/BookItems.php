<?php

namespace App\Http\Livewire;

use App\Models\BookItem;
use App\Models\Author;
use Livewire\Component;
use App\Models\Publisher;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookItems extends Component
{
    use WithFileUploads;

    public $book;
    public $book_item_id;
    public $book_item_code;
    public $book_format;
    public $publisher;
    public $publish_date;
    public $publish_country;
    public $date_of_purchase;
    public $url;
    public $status_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;

    public function updatingISBN($value)
    {
        if(strlen($value) >= 10){
            $this->callAPI($value);
        }else{
            // 
        }
    }

    public function callAPI($ISBN){
        $response = json_decode(file_get_contents('https://openlibrary.org/api/books?bibkeys=ISBN:'.$ISBN.'&jscmd=details&format=json'), true);
        if($response){
            $data = $response["ISBN:$ISBN"];  

            //Details of the book
            $details = $data["details"]; 

            //language
            if($details["languages"][0]['key']){
                $this->language = $details["languages"][0]['key'];
            }

            //publishers
             if($details["publishers"][0]){
                $publisher = Publisher::where('name', 'like','%'.$details["publishers"][0].'%')->first();
                if(empty($publisher)){
                    $publisher =  Publisher::create(["name" => $details["publishers"][0]]);
                }
                $this->publisher = $details["publishers"][0];
            }

        }else{
            $this->reset();
            $this->showCreateBookItemModal();
       }
    }

    public function showCreateBookItemModal()
    {
        $this->showModalForm = true;
    }
    public function updatedShowModalForm()
    {
        $this->reset();
    }

    public function storeBookItem()
    {
        $this->validate([
            'code' => ['required', 'string', 'max:255'],
            ]);
    
        if ($this->url) {
            $url_extension = $this->url->getClientOriginalExtension();
            $url_name = 'books'.'/'.Str::random(40).'.'.$url_extension;
            $this->url->storeAs('public/', $url_name);
        }

        $publisher= Publisher::where('name', 'like','%'.$this->publisher.'%')->first();
      
        $book = BookItem::create([
            'title' => $this->title,
            'book_type_id' => $this->type,
            'ISBN' => $this->ISBN,
            'ISSN' => $this->ISSN,
            'language' =>  $this->language,
            'publisher_id' => $publisher->id,
         ]);
        
     
        $this->reset();
       
        //session()->flash('flash.banner', 'BookItem created Successfully');
    }
    public function updateBookItem()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_1' => ['required', 'string', 'max:255'],
            ]);

      if ($this->url) {
        Storage::delete('public/', $this->new_url);
        $this->new_url = 'books'.'/'.Str::random(40).'.'.$this->url->getClientOriginalExtension();
        $this->url->storeAs('public/', $this->new_url);
    }
        $publisher= Publisher::where('name', 'like','%'.$this->publisher.'%')->first();
        
        BookItem::find($this->book_item_id)->update([
            'title' => $this->title,
            'type' => $this->type,
            'language' =>  $this->ISSN,
            'language' =>  $this->language,
            'publisher_id' => $publisher->id,
      
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditBookItemModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->book_item_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $book = BookItem::findOrFail($this->book_item_id);
         $this->language =  $book->title;
      }

    public function showDeleteBookItemModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->book_item_id = $id;
    }

    public function deleteBookItem($id)
    {
        $book = BookItem::find($id);
        $book->delete();
        Storage::delete('public/', $book->url);
       $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'BookItem'. $book->name.' Deleted Successfully');
    }

    public function render()
    {
        $book_items = $this->book->bookItems;
        $authors = Author::all();
        $publishers = Publisher::all();
      
        return view('livewire.books', [
            'book_items' => $book_items,
            'publishers' => $publishers,
            ]);
    }
}
