@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                    <div>
                        <a href="{{route('categories.create')}}" class="btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>
                            Add categories
                        </a>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="#">Discount books</a> |</span>
                    <span class="mr-2"><a href="#">Trash books</a></span>
                </div>
            </div>
        </div>

        {{--Flash Message--}}
        @include('layouts.includes.flash-message')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Categories list</span>
            </div>
            <div class="card-body">
                @if($categories->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Books Count</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Books Count</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminCategoriesController@destroy', $category->id]]) !!}

                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                                        <button type="submit" onclick="return confirm('Category will delete permanently. All books related with this category will deleted. Are you sure to delete??')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>

                                        {!! Form::close() !!}
                                    </td>
                                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                    <td>{{$category->books->count()}}</td>
                                    <td>{{$category->created_at? $category->created_at->diffForHumans(): '-'}}</td>
                                    <td>{{$category->updated_at? $category->updated_at->diffForHumans(): '-'}}</td>
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
