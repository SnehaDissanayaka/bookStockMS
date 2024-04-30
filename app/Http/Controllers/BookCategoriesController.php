<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategories;


class BookCategoriesController extends Controller
{
    protected $book_cate;

    public function __construct(){
        $this->book_cate = new BookCategories();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book_categories = BookCategories::paginate(7);
        $response['book_categories'] = $book_categories;
        return view('book-categories')->with($response);
    }

    /**
     * Get the list of resource for adding to another page.
     */
    public function get_book_categories()
    {
        $book_categories = BookCategories::all();
        $response['book_categories'] = $book_categories;
        return view('add-book')->with($response);
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
