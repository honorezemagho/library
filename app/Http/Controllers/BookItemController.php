<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;

class BookItemController extends Controller
{

    protected $pageController;

    public function __construct(PageController $pageController)
    {
        $this->pageController = $pageController;
    }

    public function index($book_id){
        $bookPage  =  $this->pageController->loadPage("books");
        return view('pages.book-items',[ 'layout' => 'side-menu',
        'side_menu' =>  $bookPage->side_menu,
        'first_page_name' => $bookPage->first_page_name,
        'second_page_name' => $bookPage->second_page_name,
        'third_page_name' => "BookItem",
        'book_id' => $book_id
        ]);
    }
}
