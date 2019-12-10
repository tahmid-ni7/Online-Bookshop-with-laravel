@extends('layouts.admin-master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container-fluid">
                <h4 class="my-4 p-4 bg-light">Order Details of order no <b>{{$order->id}}</b></h4>

                <div class="card my-4">
                    <div class="card-header">
                        <h4>Billing Address</h4>
                    </div>
                    <div class="card-body">
                        <p><i class="fas fa-user"></i> <span class="mx-2">{{$order->shipping->shipping_name}}</span></p>
                        <p><i class="fas fa-phone"></i><span class="mx-2">{{$order->shipping->mobile_no}}</span></p>
                        <p><i class="fas fa-map-marked"></i> <span class="mx-2">{{$order->shipping->address}}</span></p>
                    </div>
                </div>
                <div class="order-product mb-4">
                    <h4 class="my-4 p-4 bg-light">Order information</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{$order_detail->book_name}}</td>
                                <td>{{$order_detail->book_quantity}}</td>
                                <td>{{$order_detail->price}} TK</td>
                                <td>{{$order_detail->price * $order_detail->book_quantity}} TK</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Total</strong></td>
                            <td><strong>{{$order->total_price}} TK</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
