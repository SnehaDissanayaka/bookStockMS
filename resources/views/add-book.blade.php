@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="table-header">
        <h2>Add new Book</h2>
    </div>

    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="Title">
            </div>
            <div class="form-group col-md-6">
            <label for="inputAuthor">Author</label>
            <input type="text" class="form-control" id="inputAuthor" placeholder="Author">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputState">Category</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                
                <option>...</option>
            </select>
            </div>
            <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text" class="form-control" id="inputPrice" placeholder="Price">
            </div>
            <div class="form-group col-md-4">
            <label for="inputStock">Stock</label>
            <input type="text" class="form-control" id="inputStock" placeholder="Stock">
            </div>
            
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
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

