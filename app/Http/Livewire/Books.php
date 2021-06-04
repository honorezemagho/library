<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Author;
use Livewire\Component;
use App\Models\BookType;
use App\Models\Publisher;
use App\Models\AuthorWork;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;

class Books extends Component
{
    use WithFileUploads;

    public $book_id;
    public $title;
    public $number_of_pages;
    public $cover;
    public $api_cover;
    public $url;
    public $new_url;
    public $description;
    public $author_1;
    public $author_2;
    public $ISBN; 
    public $ISSN;
    public $type;
    public $ddc_natural_id;
    public $ddc_decimal_id;
    public $language;
    public $publisher;
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
            //Book cover
            $api_cover = $data['thumbnail_url'];
            if ($api_cover) {
            $this->api_cover = $api_cover;
            }else{
                $this->api_cover = null;
            }

            //Details of the book
            $details = $data["details"]; 

            //number_of_pages
            if($details["number_of_pages"]){
                $this->number_of_pages = $details["number_of_pages"];
            }

            //title
             if($details["title"]){
                $this->title = $details["title"];
            }

            //description
            if($details["description"]){
                $this->description = $details["description"];
            }
            
            //authors
            if($details["authors"][0]){
                $author = Author::where('name', 'like','%'.$details["authors"][0]["name"].'%')->first();
                if(empty($author)){
                    Author::create(["name" => $details["authors"][0]["name"]]);
                }
                $this->author_1 = $details["authors"][0]["name"];
            }
            if(!empty($details["authors"][1])){
                $author = Author::where('name', 'like','%'.$details["authors"][1]["name"].'%')->first();
                if(empty($author)){
                    Author::create(["name" => $details["authors"][1]["name"]]);
                }
                $this->author_2 = $details["authors"][1]["name"];
            }

            //dewey_decimal_class
            if($details["dewey_decimal_class"][0]){
                $this->ddc_natural_id = $details["dewey_decimal_class"][0];
            }

            //dewey_decimal_class
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

            //type
            if($details["type"]["key"]){
                //$this->type = $details["type"]["key"];
            }

            //Dewey Classification
            if($details["dewey_decimal_class"][0]){
                $ddc = explode("/",$details["dewey_decimal_class"][0]);
                $ddc_integer = $ddc[0];
                $ddc_decimal = str_replace(".","",$ddc[1]);
                if(Str::length($ddc_decimal) == 1){
                    $ddc_decimal.="00";
                }elseif(Str::length($ddc_decimal) == 2){
                    $ddc_decimal.="0";
                }
                dd($ddc_decimal);
                
                

            }


        }else{
             //reset Book cover
            $this->reset();
            $this->showCreateBookModal();
       }
    }

    public function showCreateBookModal()
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

    public function storeBook()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_1' => ['required', 'string', 'max:255'],
           ]);
        
        if ($this->cover) {
            $cover_extension = $this->cover->getClientOriginalExtension();
            $cover_name = 'books'.'/'.Str::random(40).'.'.$cover_extension;
            $this->cover->storeAs('public/',  $cover_name);

        }elseif($this->api_cover){
            $contents = file_get_contents($this->api_cover);
            $cover_extension = substr($this->api_cover, strrpos($this->api_cover, '.') + 1);
            $cover_name = 'books'.'/'.Str::random(40).'.'.$cover_extension;
            Storage::put('public/'. $cover_name, $contents);
        }

        if ($this->url) {
            $url_extension = $this->url->getClientOriginalExtension();
            $url_name = 'books'.'/'.Str::random(40).'.'.$url_extension;
            $this->url->storeAs('public/', $url_name);
        }

        if(!$this->ISSN){
            $this->ISSN = '';
        }
        if(!$this->ISBN){
            $this->ISBN = '';
        }
        $publisher= Publisher::where('name', 'like','%'.$this->publisher.'%')->orwhere('id', $this->publisher)->first();
        $author_1= Author::where('name', 'like','%'.$this->author_1.'%')->first();
      
        $book = Book::create([
            'title' => $this->title,
            'book_type_id' => $this->type,
            'ISBN' => $this->ISBN,
            'ISSN' => $this->ISSN,
            'cover' => $cover_name,
            'description' => $this->description,
            'author_1' => $author_1->id,
            'number_of_pages' => $this->number_of_pages,
            'language' =>  $this->language,
            'publisher_id' => $publisher->id,
         ]);
        
        if ($this->author_1) {
            AuthorWork::create([
                'author_work_id' => $book->id,
                'author_work_type' => Book::class,
                'author_id' => $author_1->id,
                'status'  => true,
             ]);
        }
        if ($this->author_2) {
            AuthorWork::create([
                'author_work_id' => $book->id,
                'author_work_type' => Book::class,
                'author_id' => $author_1->id,
                'status'  => false,
             ]);
        }
       
        $this->reset();
       
        //session()->flash('flash.banner', 'Book created Successfully');
    }
    public function updateBook()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_1' => ['required'],
            ]);

      if ($this->url) {
        Storage::delete('public/', $this->new_url);
        $this->new_url = 'books'.'/'.Str::random(40).'.'.$this->url->getClientOriginalExtension();
        $this->url->storeAs('public/', $this->new_url);
    }
        $publisher= Publisher::where('name', 'like','%'.$this->publisher.'%')->first();
        $author_1= Author::where('name', 'like','%'.$this->author_1.'%')->first();
        if(!$this->ISSN){
            $this->ISSN = '';
        }
        if(!$this->ISBN){
            $this->ISBN = '';
        }
        Book::find($this->book_id)->update([
            'title' => $this->title,
            'book_type_id' => $this->type,
            'ISBN' => $this->ISBN,
            'ISSN' => $this->ISSN,
            'cover' => $this->cover,
            'author_1' => $author_1,
            'number_of_pages' => $this->number_of_pages,
            'language' =>  $this->language,
            'publisher_id' => $publisher->id,
      
        ]);
        $this->reset();
        //session()->flash('flash.banner', 'Post Updated Successfully');
    }

    public function showEditBookModal($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->book_id = $id;
        $this->loadEditForm();
    }

    public function loadEditForm()
    {
        $book = Book::findOrFail($this->book_id);
        $this->title =  $book->title;
        $this->type =  $book->book_type_id;
        $this->ISBN =  $book->ISBN;
        $this->ISSN =  $book->ISSN;
        $this->language =  $book->language;
        $this->number_of_pages =  $book->number_of_pages;
        if(!empty($book->authors[0])){
            $this->author_1 =  $book->authors[0]->id;
        }
        if(!empty($book->authors[1])){
            $this->author_2 =  $book->authors[1]->id;
        }
        $this->cover = $book->cover;
    }

    public function showDeleteBookModal($id)
    {
        $this->reset();
        $this->showDeleteModalForm = true;
        $this->book_id = $id;
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        $book->delete();
        Storage::delete('public/', $book->url);
        Storage::delete('public/', $book->cover);
        $this->showDeleteModalForm = false;
        //session()->flash('flash.banner', 'Book'. $book->name.' Deleted Successfully');
    }

    public function render()
    {
        $books = Book::with('authors')->get();
        $types = BookType::all();
        $authors = Author::all();
        $publishers = Publisher::all();
      
        return view('livewire.books', [
            'books' => $books,
            'authors' => $authors,
            'types' => $types,
            'publishers' => $publishers,
            ]);
    }
}
