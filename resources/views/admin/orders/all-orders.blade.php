@extends('layouts.admin-master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All orders</h1>
        <div class="my-2 px-1">
            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">
                    <span class="mr-2"><a href="#">All orders</a> |</span>
                    <span class="mr-2"><a href="#">Pending orders</a></span>
                </div>
            </div>
        </div>

    {{--Flash Message--}}
    @include('layouts.includes.flash-message')

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-primary">Orders list</span>
            </div>
            <div class="card-body">
                @if($orders->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>id</th>
                                <th>User</th>
                                <th>Payment</th>
                                <th>Total Price</th>
                                <th>Order status</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>id</th>
                                <th>User</th>
                                <th>Payment</th>
                                <th>Total Price</th>
                                <th>Order status</th>
                                <th>Details</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=> ['orders.destroy', $order->id]]) !!}
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->payment_type}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>
                                        @if($order->order_status == 1)
                                        {!! Form::open(['method'=>'PATCH', 'route'=>['orders.update', $order->id]]) !!}
                                            <input type="hidden" name="order_status" value="0">
                                          <button type="submit" class="btn btn-success btn-sm">Accepted</button>
                                        {!! Form::close() !!}
                                        @else
                                            {!! Form::open(['method'=>'PATCH', 'route'=>['orders.update', $order->id]]) !!}
                                            <input type="hidden" name="order_status" value="1">
                                            <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                    <td><a href="{{route('orders.show', $order->id)}}">Order Details</a></td>
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
