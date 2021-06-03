<?php

namespace App\Http\Livewire;

use App\Models\BookItem;
use App\Models\BookFormat;
use App\Models\Status;
use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use App\Models\Publisher;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PageController;

class BookItems extends Component
{
    use WithFileUploads;

    public $book;
    public $book_id;
    public $book_item_id;
    public $code;
    public $format;
    public $price;
    public $publish_date;
    public $publish_country;
    public $date_of_purchase;
    public $url;
    public $status_id;
    public $showModalForm = false;
    public $showDeleteModalForm = false;
    protected $pageController;

    public function callAPI(){
        $ISBN = $this->book->ISBN;
        $response = json_decode(file_get_contents('https://openlibrary.org/api/books?bibkeys=ISBN:'.$ISBN.'&jscmd=details&format=json'), true);
        if($response){
            $data = $response["ISBN:$ISBN"];  

            //Details of the book
            $details = $data["details"]; 

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
        $book_id = $this->book_id;
        $this->reset();
        $this->book_id = $book_id;
    }

    public function closeModal()
    {
        $book_id = $this->book_id;
        $this->reset();
        $this->book_id = $book_id;
        $this->showDeleteModalForm = false;
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
        $book_id = $this->book_id;
        $this->reset();
        $this->book_id = $book_id;
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditBookItemModal($id)
    {
        $book_id = $this->book_id;
        $this->reset();
        $this->book_id = $book_id;
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
        $book_id = $this->book_id;
        $this->reset();
        $this->book_id = $book_id;
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
        $this->book = Book::where('id', $this->book_id)->with('bookItems')->first();
        $this->pageController = new PageController();
        $book_item_page  =  $this->pageController->loadPage("books");
        $book_items = $this->book->bookItems;
        $formats = BookFormat::all();
        $status = Status::all();
        return view('livewire.book-items', [
            'layout' => 'side-menu', 
            'side_menu' =>  $book_item_page->side_menu,
            'first_page_name' =>$book_item_page->first_page_name,
            'second_page_name' =>$book_item_page->second_page_name,
            'third_page_name' =>"Book-Items",
            'book_items' => $book_items,
            'formats' => $formats,
            'status' => $status
            ])->layout('layouts.side-menu',
            [ 
            'layout' => 'side-menu', 
            'side_menu' =>  $book_item_page->side_menu,
            'first_page_name' =>$book_item_page->first_page_name,
            'second_page_name' =>$book_item_page->second_page_name,
            'third_page_name' =>"Book-Items",  
            ]);
    }
}
