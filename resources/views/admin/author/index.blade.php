@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Authors</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{route('authors.create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add Authors
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="#">Discount books</a> |</span>
                    <span class="mr-2"><a href="#">Trash books</a></span>
                </div>
            </div>
        </div>

        @include('layouts.includes.flash-message')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Authors list</h6>
            </div>
            <div class="card-body">
                @if($authors->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Books Count</th>
                                <th>Bio</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Books Count</th>
                                <th>Bio</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminAuthorsController@destroy', $author->id]]) !!}
                                        <div class="action d-flex flex-row">
                                            <a href="{{route('authors.edit', $author->id)}}" class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>

                                            <button type="submit" onclick="return confirm('Author will delete permanently! Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                     {!! Form::close() !!}
                                    </td>
                                    <td><img src="{{$author->image? $author->image_url : $author->default_img}}" height="50" alt=""></td>
                                    <td><a href="{{route('authors.edit', $author->id)}}">{{$author->name}}</a></td>
                                    <td>{{$author->books->count()}}</td>
                                    <td>{{str_limit($author->bio, 100)}}<a href="#">read more</a></td>
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
