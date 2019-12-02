@extends('layouts.master')
@section('title')
    Bookshop - All books
@endsection
@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-area">
                        @if($term = request('term'))
                            <div class="alert alert-info my-3">
                                Search result for <strong>{{$term}}</strong>
                            </div>
                        @endif
                        @if(! $books->count())
                            <div class="alert alert-warning my-4">No books availavle</div>
                        @else
                            <div class="card my-4">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">All books</h4>
                                </div>
                                @if(isset($categoryName))
                                    <div class="alert alert-info m-3">
                                        Books from <strong>{{$categoryName}}</strong>
                                    </div>
                                @endif
                                @if(isset($authorName))
                                    <div class="alert alert-info m-3">
                                        Writer <strong>{{$authorName}}</strong>
                                    </div>
                                @endif
                                @if(isset($discountTitle))
                                    <div class="alert alert-info m-3">
                                        <strong>{{$discountTitle}}</strong>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($books as $book)
                                            <div class="col-lg-3 col-6">
                                                <div class="book-wrap">
                                                    <div class="book-image mb-2">
                                                        <a href="{{route('book-details', $book->id)}}"><img src="{{$book->image_url}}" alt=""></a>
                                                        @if($book->discount_rate)
                                                            <h6><span class="badge badge-warning discount-tag">Discount {{$book->discount_rate}}%</span></h6>
                                                        @endif
                                                    </div>
                                                    <div class="book-title mb-2">
                                                        <a href="{{route('book-details', $book->id)}}">{{str_limit($book->title, 30)}}</a>
                                                    </div>
                                                    <div class="book-author mb-2">
                                                        <small>By <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></small>
                                                    </div>
                                                    <div class="pbook-price mb-3">
                                                        @if($book->discount_rate)
                                                            <span class="line-through mr-3">{{$book->init_price}} TK</span>
                                                        @endif
                                                        <span class=""><strong>{{$book->price}} TK</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="show-more pt-2 text-right">
                                        <nav class="text-center">
                                            {{$books->appends(request()->only(['term']))->render()}}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Sidebar -->
                @include('layouts.includes.side-bar')
                <!-- Sidebar end -->
                </div>
        </div>
    </section>
@endsection
