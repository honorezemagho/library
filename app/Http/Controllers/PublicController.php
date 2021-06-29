<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //
    public function welcome(){
        $latest_books = Book::take(4)->latest()->get();
        $categories = Category::take(3)->get();
        return view('welcome', compact('latest_books', 'categories'));
    }

    public function books(){
        $books = Book::get();
        return view('frontend.books', compact('books'));
    }

    public function about(){
        return view('frontend.about');
    }
}
