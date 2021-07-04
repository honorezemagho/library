<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class LibrarianBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::latest()->get();
        return view('dashboard.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('dashboard.books.create', compact('categories'));
    }
    public function rules(){
        return [
            'title' => 'required|string|min:3',
            'isbn' => 'required|alpha_num|min:9',
            'author' => 'required|string|min:3',
            'category_id' => 'required|integer',
            'pub_year' => 'required|integer|min:1600',
            'number_copies' => 'required|integer|min:1',
            'description' => 'sometimes',
            'cover' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate($this->rules());

        $request->validate([
            'isbn' => 'required|unique:books'
        ]);

        if($request->hasFile('cover')){
            $image  =  time().'.'.$request->cover->extension();
            $request->cover->move(public_path('uploads'), $image);
            $data['cover'] = $image;
        }


        $book = Book::create($data);

        if(!is_null($book)) {
            return redirect(route('admin.books.index'))->with("success", "Success! Book successfully added");
        }
        else {
            return back()->with("error", "Alert! Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $categories = Category::get();
        return view('dashboard.books.edit', compact('categories', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        $data = $request->validate($this->rules());

        if($request->hasFile('cover')){
            $image  =  time().'.'.$request->cover->extension();
            $request->cover->move(public_path('uploads'), $image);
            $data['cover'] = $image;
        }

        $book->update($data);

        if(!is_null($book)) {
            return redirect(route('admin.books.index'))->with("success", "Success! Book successfully updated");
        }
        else {
            return back()->with("error", "Alert! Something went wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        if(!is_null($book)) {
            return redirect(route('admin.books.index'))->with("success", "Success! Book successfully deleted");
        }
        else {
            return back()->with("error", "Alert! Something went wrong");
        }
    }
}
