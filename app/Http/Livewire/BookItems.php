<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Status;
use Livewire\Component;
use App\Models\BookItem;
use App\Models\Publisher;
use App\Models\BookFormat;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

    public function mount(){
        $this->book = Book::where('id', $this->book_id)->with('bookItems')->first();
    }
    public function callAPI(){
        $ISBN = $this->book->ISBN;
        $response = json_decode(file_get_contents('https://openlibrary.org/api/books?bibkeys=ISBN:'.$ISBN.'&jscmd=details&format=json'), true);
        if($response){
            $data = $response["ISBN:$ISBN"];  

            //Details of the book
            $details = $data["details"]; 
            
            //publish_country
           if($details['publish_country']){
               $this->publish_country = $details['publish_country'];
           }
            //publishers
             if($details["publishers"]){
                $publisher = Publisher::where('name', 'like','%'.$details["publishers"][0].'%')->first();
                if(empty($publisher)){
                    $publisher =  Publisher::create(["name" => $details["publishers"][0]]);
                }
                $this->publisher = $details["publishers"][0];
            }

            //publish_date
             if($details["publish_date"]){
                $this->publish_date = $details["publish_date"];
            }

        }else{
            $book_id = $this->book_id;
            $this->reset();
            $this->book_id = $book_id;
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
            'code' => ['required', 'string', 'max:10'],
            ]);
    
        $url_name_file = "";
        if ($this->url) {
            $url_extension = $this->url->getClientOriginalExtension();
            $url_name = 'books'.'/'.Str::random(40).'.'.$url_extension;
            $url_name_file = 'storage/'.$url_name;
            $this->url->storeAs('public/', $url_name);
        }

        $book = BookItem::create([
            'code' => $this->code,
            'price' => $this->price,
            'date_of_purchase' => $this->date_of_purchase,
            'publish_date' => $this->publish_date,
            'publish_country' => $this->publish_country,
            'book_format' => $this->format,
            'status_id' => $this->status_id,
            'book_id' => $this->book->id,
            'url' => $url_name_file,
           ]);
        
         $book_id = $this->book_id;
         $this->reset();
         $this->book_id = $book_id;
       
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
            'code' => $this->code,
            'price' => $this->price,
            'date_of_purchase' => $this->date_of_purchase,
            'publish_date' => $this->publish_date,
            'publish_country' => $this->publish_country,
            'book_format' => $this->book_format,
            'status_id' => $this->status,
            'book_id' => $this->book->id,
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
        $book_item = BookItem::findOrFail($this->book_item_id);
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
        $this->callAPI();
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
