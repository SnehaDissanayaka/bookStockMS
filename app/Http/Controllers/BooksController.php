<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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
    public function index(Request $request)
    {
        // $books = Book::paginate(7);
        // $categories = BookCategories::all();
        // foreach($books as $book){
        //     $category = BookCategories::find($book->book_category_id);
        //     $book->category = $category->name;
        // }
        // $response['books'] = $books;
        // return view('home', compact('books', 'categories'));
        $query = Book::query();
        $categories = BookCategories::all();
        
        // Filter by category if category filter is applied
        if ($request->has('category_filter')) {
            $query->where('book_category_id', $request->input('category_filter'));
        }
        
        // Paginate the results
        $books = $query->paginate(7);

        foreach($books as $book){
            $category = BookCategories::find($book->book_category_id);
            $book->category = $category->name;
        }

        return view('home', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'book_category_id' => 'required|exists:book_cate,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, store the book
        $this->book->create($request->all());

        // Flash success message to session
        Session::flash('success', 'Book added successfully!');

        // Redirect to the home page
        return redirect()->route('home.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = BookCategories::all();
        return view('edit-book', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'book_category_id' => 'required|exists:book_cate,id',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, update the book
        $book = Book::findOrFail($id);
        $book->update($request->all());

        // Flash success message to session
        Session::flash('success', 'Book updated successfully!');

        // Redirect to the home page
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($home)
    {
        $book = Book::findOrFail($home);
        $book->delete();

        // Flash success message to session
        Session::flash('success', 'Book deleted successfully!');

        // Redirect to the home page
        return redirect()->route('home.index');
    }
}
