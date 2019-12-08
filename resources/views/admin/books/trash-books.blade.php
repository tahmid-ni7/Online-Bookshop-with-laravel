@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Trashed Books</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{route('books.create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Book
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="{{route('books.index')}}">All books</a> |</span>
                    <span class="mr-2"><a href="{{route('admin.discountBooks')}}">Discount books</a> |</span>
                    <span class="mr-2"><a href="{{route('admin.trash-books')}}">Trash books</a></span>
                </div>
            </div>
        </div>

    @include('layouts.includes.flash-message')
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All trashed books list</h6>
            </div>
            <div class="card-body">
                @if($books->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Regular price</th>
                                <th>Discount</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Regular price</th>
                                <th>Discount</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                    <div class="action d-flex flex-row">
                                        {!! Form::open(['method'=>'PUT', 'route'=>['book.restore', $book->id]]) !!}
                                            <button type="submit" class="btn btn-sm btn-primary mr-2" title="Restore"><i class="fa fa-undo"></i></button>
                                        {!! Form::close() !!}

                                        {!! Form::open(['method'=>'DELETE', 'route'=>['book.forceDelete', $book->id]]) !!}
                                            <button type="submit" onclick="return confirm('Book will delete to permanently! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                        {!! Form::close() !!}
                                    </div>

                                    </td>
                                    <td><img src="{{$book->image_url}}" width="60" height="70" alt=""></td>
                                    <td><a href="#">{{$book->title}}</a></td>
                                    <td>{{$book->category->name}}</td>
                                    <td>{{$book->author->name}}</td>
                                    <td>{{$book->init_price}}</td>
                                    <td>{{$book->discount_rate}}%</td>
                                    <td>{{$book->price}}</td>
                                    <td>{{$book->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
