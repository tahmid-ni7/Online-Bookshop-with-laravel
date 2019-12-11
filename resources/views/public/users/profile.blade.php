@extends('layouts.user-master')

@section('content')
    <div class="container">
        <h4 class="my-4 p-3 bg-light">Profile</h4>

        <div class="row">
            <div class="col-lg-6">
                    <div class="card card-body my-3 d-flex flex-row">
                        <div class="user-avatar mr-3">
                            <img src="{{Auth::user()->image? Auth::user()->image_url:Auth::user()->default_img}}" width="100" alt="">
                        </div>

                        <div class="user-info">
                            <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <p><i class="fas fa-envelope mr-2"></i> {{Auth::user()->email}}</p>
                            <p><i class="fas fa-clock mr-2"></i> {{Auth::user()->created_at? Auth::user()->created_at->diffForHumans(): ''}} </p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-body my-3">
                    <h6>Activities</h6>
                    <p><a href="{{route('user.orders')}}" class="mr-2"><i class="fas fa-shopping-basket mr-1"></i> Orders</a> {{Auth::user()->orders? Auth::user()->orders->count(): 'No order yet'}}</p>
                    <p><a href="{{route('user.reviews')}}" class="mr-2"><i class="fas fa-comments mr-1"></i> Reviews</a> {{Auth::user()->reviews? Auth::user()->reviews->count(): 'No review yet'}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
