<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function bookDetails($id){
        $book = Book::findOrFail($id);
        return view('frontend.book-details', compact('book'));
    }

    public function requestBook(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $user  = User::where('email',$request->email)->get();

        $email = User::where('email',$request->email)->exists();


        if($email){
            $book = Book::where('id',$request['book_id'])->first();

            $remaining = $book->number_copies -=1;

            $book->update(['number_copies' => $remaining]);

            BorrowedBook::create(['student_id' => $user[0]['id'], 'book_id' => $book['id']]);
        }
        else{
            throw ValidationException::withMessages([
                'email' => ['Email is incorrect. Please ask your librarian to register you']
            ]);
        }

        return back()->withSuccess("You've successfully requested the book.");
    }
}
