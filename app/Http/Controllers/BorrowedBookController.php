<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrowed_books = BorrowedBook::get();
        return view('dashboard.borrow.index', compact('borrowed_books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $books = Book::get();
        $students = User::get();
        return view('dashboard.borrow.create', compact('books','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate($this->rules);
        BorrowedBook::create($data);
        return redirect(route('admin.borrows.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $borrowed_book = BorrowedBook::findOrFail($id);
        $books = Book::get();
        $students = User::get();

        return view('dashboard.borrow.edit', compact('books','students','borrowed_book'));
    }


    public $rules = [
        'book_id' => 'required|integer',
        'student_id' => 'required|integer',
    ];

    /**
     * Update the specified resource a borrowed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $borrowed_book = BorrowedBook::findOrFail($id);
        $data = $request->validate($this->rules);
        $borrowed_book->update($data);

        return redirect(route('admin.borrows.index'));
    }

    /**
     * Mark the book as returned in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function returnBook(Request $request, $id)
    {
        //
        $borrowed_book = BorrowedBook::findOrFail($id);
        $data['isReturned'] = 1;
        $borrowed_book->update($data);

        return redirect(route('admin.borrows.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowedBook  $borrowedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowedBook $borrowedBook)
    {
        //
    }
}
