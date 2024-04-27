@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="table-header">
        <h2>Edit Book</h2>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('home.update', ['home' => $book->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title', $book->title) }}" placeholder="Title">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAuthor">Author</label>
                <input type="text" class="form-control" id="inputAuthor" name="author" value="{{ old('author', $book->author) }}" placeholder="Author">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCategory">Category</label>
                <select id="inputCategory" class="form-control" name="book_category_id">
                    <option disabled selected value>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('book_category_id', $book->book_category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPrice">Price</label>
                <input type="text" class="form-control" id="inputPrice" name="price" value="{{ old('price', $book->price) }}" placeholder="Price">
            </div>
        </div>
        <div class="form-group">
            <label for="inputStock">Stock</label>
            <input type="text" class="form-control" id="inputStock" name="stock" value="{{ old('stock', $book->stock) }}" placeholder="Stock">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/home') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
@endsection
