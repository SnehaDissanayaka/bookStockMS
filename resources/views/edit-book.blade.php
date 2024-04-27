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

    <form id="editBookForm" method="POST" action="{{ route('home.update', ['home' => $book->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTitle">Title</label>
                <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title', $book->title) }}" placeholder="Title" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAuthor">Author</label>
                <input type="text" class="form-control" id="inputAuthor" name="author" value="{{ old('author', $book->author) }}" placeholder="Author" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCategory">Category</label>
                <select id="inputCategory" class="form-control" name="book_category_id" required>
                    <option disabled selected value>Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('book_category_id', $book->book_category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPrice">Price</label>
                <input type="number" class="form-control" id="inputPrice" name="price" value="{{ old('price', $book->price) }}" placeholder="Price" min="0" step="0.01" required>
            </div>
            <div class="form-group col-md-4">
            <label for="inputStock">Stock</label>
            <input type="number" class="form-control" id="inputStock" name="stock" value="{{ old('stock', $book->stock) }}" placeholder="Stock" min="0" required>
        </div>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/home') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
@endsection

@push('css')
<style>
    .table-header {
        margin-top: 20px;
        margin-bottom: 40px;
        margin-right: 20px;
        display: flex;
        justify-content: space-between;
    }

    form {
        width: 60%;
    }

    a,
    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        color: inherit;
    }
</style>
@endpush

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Initially disable submit button
        $('button[type="submit"]').prop('disabled', true);

        // Enable submit button if all required fields are filled
        $('input, select').keyup(function () {
            var title = $('#inputTitle').val().trim();
            var author = $('#inputAuthor').val().trim();
            var category = $('#inputCategory').val();
            var price = $('#inputPrice').val().trim();
            var stock = $('#inputStock').val().trim();

            if (title !== '' && author !== '' && category !== '' && price !== '' && stock !== '') {
                $('button[type="submit"]').prop('disabled', false);
            } else {
                $('button[type="submit"]').prop('disabled', true);
            }
        });

        // Form submission
        $('#editBookForm').submit(function (event) {
            // Prevent form submission
            event.preventDefault();

            // Validate price
            var price = $('#inputPrice').val().trim();
            if (price !== '' && isNaN(price)) {
                $('#inputPrice').addClass('is-invalid');
                return;
            } else {
                $('#inputPrice').removeClass('is-invalid');
            }

            // Validate stock
            var stock = $('#inputStock').val().trim();
            if (stock !== '' && isNaN(stock)) {
                $('#inputStock').addClass('is-invalid');
                return;
            } else {
                $('#inputStock').removeClass('is-invalid');
            }

            // Submit the form if validation passed
            $(this).unbind('submit').submit();
        });
    });
</script>
@endpush
