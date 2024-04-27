@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="table-header">
        <h2>Add new Book</h2>
    </div>
    <?php 
        echo '<script type="text/javascript">' .
        'console.log(' . $book_categories . ');</script>';
    ?> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('home.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}" placeholder="Title">
            </div>
            <div class="form-group col-md-6">
            <label for="inputAuthor">Author</label>
            <input type="text" class="form-control" id="inputAuthor" name="author" value="{{ old('author') }}" placeholder="Author">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputCategory">Category</label>
            <select id="inputCategory" class="form-control" name="book_category_id">
                <option  disabled selected value>Choose...</option>
                @foreach($book_categories as $item)
                <option value={{$item->id}} {{ old('book_category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="price" value="{{ old('price') }}" placeholder="Price">
            </div>
            <div class="form-group col-md-4">
            <label for="inputStock">Stock</label>
            <input type="text" class="form-control" id="inputStock" name="stock" value="{{ old('stock') }}" placeholder="Stock">
            </div>
        </div>
        <button type="submit" class="btn btn-success" type="submit">Submit</button>
        <button type="submit" class="btn btn-danger"><a href="{{ url('/home') }}" >Cancel</a></button>
    
    </form>
</div>
@endsection

@push('css')
    <style>
        .table-header{
            margin-top: 20px;
            margin-bottom: 40px;
            margin-right: 20px;
            display: flex;
            justify-content: space-between;
        }
        form{
            width: 60%;
        }
        a, a:hover, a:focus, a:active {
        text-decoration: none;
        color: inherit;
        }
    </style>
@endpush

