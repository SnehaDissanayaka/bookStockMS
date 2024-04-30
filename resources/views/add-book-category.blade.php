@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="table-header">
        <h2>Lend Books</h2>
    </div>
    <?php 
        echo '<script type="text/javascript">' .
        'console.log(' . $book_users . ');
        console.log(' . $books . ');</script>';
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
    <form method="POST" action="{{ route('book-lendings.store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputCategory">Book</label>
            <select id="inputCategory" class="form-control" name="book_id">
                <option  disabled selected value>Choose...</option>
                @foreach($books as $item)
                <option value={{$item->id}}  @if($item->stock == 0) disabled title="Out of stock" @endif>{{ $item->title }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputCategory">Lend to</label>
            <select id="inputCategory" class="form-control" name="user_id">
                <option  disabled selected value>Choose...</option>
                @foreach($book_users as $item)
                <option value={{$item->id}}>{{ $item->name }}</option>
                @endforeach
            </select>
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

