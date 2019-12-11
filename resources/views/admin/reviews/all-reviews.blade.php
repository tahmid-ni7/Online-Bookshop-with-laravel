@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Reviews by user</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">

                </div>
            </div>
        </div>

    {{--Flash Message--}}
    @include('layouts.includes.flash-message')

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Reviews list</span>
            </div>
            <div class="card-body">
                @if($reviews->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>id</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Review</th>
                                <th>Created at</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>id</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Review</th>
                                <th>Created at</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=> ['reviews.destroy', $review->id]]) !!}
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$review->id}}</td>
                                    <td>{{$review->user->name}}</td>
                                    <td><img src="{{$review->book->image_url}}" width="60" alt=""></td>
                                    <td>{{str_limit($review->body, 200)}}</td>
                                    <td>{{$review->created_at->diffForHumans()}}</td>
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
