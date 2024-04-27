<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BookUsers;
use App\Models\Book;


class BookUsersController extends Controller
{
    protected $book_user;

    public function __construct(){
        $this->book_user = new BookUsers();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book_users = BookUsers::all();
        $books = Book::all();
        return view('add-book-lending', compact('books', 'book_users'));
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
