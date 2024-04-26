@extends('layout')
@section('content')
        <div class="container-fluid">
            <?php 
            echo '<script type="text/javascript">' .
            'console.log(' . $books . ');</script>';
            ?>

            <div class="table-header">
                <h2>Books</h2>
                <a href="{{ url('/add-book') }}" class="btn btn-success" title="Add New Book">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
            </div>

            <div class="col-md-9">
                        
                        <br/>
                        <br/>
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
                                            <a href="{{ url('/book/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }
        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush