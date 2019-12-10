@extends('layouts.user-master')

@section('content')
   <div class="container">
       @include('layouts.includes.flash-message')
       <h4 class="my-4 p-4 bg-light">My orders</h4>

       @if($myOrders->count())
       <table class="table table-borderless table-striped mb-4">
       <thead>
       <tr>
         <th>Order id</th>
         <th scope="col">Payment type</th>
         <th scope="col">Total price</th>
         <th scope="col">Orders status</th>
         <th scope="col">Action</th>
       </tr>
       </thead>
        <tbody>
        @foreach($myOrders as $order)
           <tr>
               <td>{{$order->id}}</td>
               <td>{{$order->payment_type}}</td>
               <td>{{$order->total_price}} TK</td>
               <td>
                   @if($order->order_status == 0)
                       <span class="text-danger">Pending</span>
                   @else
                       <span class="text-success">Accepted</span>
                   @endif
               </td>
               <td><a href="{{route('order.details', $order->id)}}">Order Details</a></td>
           </tr>
        @endforeach
        </tbody>
       </table>
       @else
           <div class="alert alert-warning">You have no order.</div>
       @endif
   </div>
@endsection
