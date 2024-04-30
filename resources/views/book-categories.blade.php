@extends('layout')
@section('content')
<div class="container-fluid">
            <?php 
            echo '<script type="text/javascript">' .
            'console.log(' . $book_categories . ');</script>';
            ?>

            <div class="table-header">
                <h2>Book Lending</h2>
                <a href="{{ url('/add-book-lending') }}" class="btn btn-success add-button" title="Add New Book">
                            <i class="fa fa-plus" aria-hidden="true"></i> Lend Book
                </a>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('warning'))
                <div class="alert alert-warning">
                    {{ Session::get('warning') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="col-md-9">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>category</th>
                                <th>created on</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($book_categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    Edit/Delete
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <!-- Pagination links -->
                {{ $book_categories->links() }}
            </div>
        </div>
@endsection

@push('css')
    <style>
        .home-container{
            margin-top: 20px;
            margin-left: 20px;
        }
        .table-header{
            margin-top: 20px;
            margin-right: 20px;
            display: flex;
            justify-content: space-between;
        }
        .add-button{
            display: flex;
            align-items: center;
            height: 37.6px;
        }
        .table td, .table th {
            padding: .5rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>
@endpush