<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategories;

class BooksController extends Controller
{
    protected $book;

    public function __construct(){
        $this->book = new Book();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        foreach($books as $book){
            $category = BookCategories::find($book->book_category_id);
            $book->category = $category->name;
        }
        $response['books'] = $books;
        return view('home')->with($response);
    }

    /**
     * Redirect to Add a book
     */
    public function addNewBook(){
        return view('add-book');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
