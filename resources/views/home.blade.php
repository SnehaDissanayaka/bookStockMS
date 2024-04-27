@extends('layout')
@section('content')
        <div class="container-fluid">
            <?php 
            echo '<script type="text/javascript">' .
            'console.log(' . $books . ');</script>';
            ?>

            <div class="table-header">
                <h2>Books</h2>
                <a href="{{ url('/add-book') }}" class="btn btn-success add-button" title="Add New Book">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="col-md-9">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>author</th>
                                <th>price</th>
                                <th>category</th>
                                <th>Stock</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->stock}}</d>
                                <td>
                                    <a href="{{ route('home.edit', ['home' => $item->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('home.destroy', ['home' => $item->id]) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
 
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