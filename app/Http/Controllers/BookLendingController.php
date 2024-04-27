<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use App\Models\BookLending;
use App\Models\BookUsers;
use App\Models\Book;


class BookLendingController extends Controller
{
    protected $book_lending;

    public function __construct(){
        $this->book_lending = new BookLending();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book_lendings = BookLending::paginate(7);

        foreach($book_lendings as $book_lending){
            $user = BookUsers::find($book_lending->user_id);
            $book = Book::find($book_lending->book_id);

            $book_lending->lent_to = $user->name;
            $book_lending->book = $book->title;

        }
        $response['book_lendings'] = $book_lendings;
        return view('book-lending')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-book-lending');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = Book::find($request->input('book_id'));

        if ($book) {
            echo ($book->stock);
            // Check if stock is available
            if ($book->stock > 0) {
                // Create the book lending
                $this->book_lending->create($request->all());

                // Decrease the stock of the book by 1
                $book->stock -= 1;
                $book->save();

                // Flash success message to session
                Session::flash('success', 'Book lent successfully!');
                if($book->stock == 0){
                    // Flash warning message if stock has become zero
                    Session::flash('warning', 'FYI, the book just got out of stock!');
                }
            } else {
                // Flash warning message if stock is zero
                Session::flash('error', 'Sorry, the book is out of stock!');
            }
        } else {
            // Flash error message if book is not found
            Session::flash('error', 'Book not found!');
        }

        // Redirect back to the book lending index page
        return redirect()->route('book-lendings.index');
    }

    

    public function returnBook(Request $request, $id)
    {
        // Find the book lending record by ID
        $bookLending = BookLending::find($id);

        if ($bookLending) {
            // Update the returned_at column with the current time
            $bookLending->returned_at = Carbon::now();
            $bookLending->save();

            // Increase the stock of the corresponding book by one
            $book = Book::find($bookLending->book_id);
            if ($book) {
                $book->stock += 1;
                $book->save();
            }
        }

        // Flash success message to session
        Session::flash('success', 'Book Return Recorded!');

        // Redirect back to the book lendings index page
        return redirect()->route('book-lendings.index');
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
