@extends('layouts.master')

@section('title')
Bookshop - Book details
@endsection
@section('content')
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-area">
                        <div class="card my-4">
                            <div class="card-header bg-dark">
                                <h4 class="text-white">Book Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4">
                                        <div class="book-img-details">
                                            <img src="{{$book->image_url}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="book-title">
                                            <h5>{{$book->title}}</h5>
                                        </div>
                                        <div class="author mb-2">
                                            By <a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a>
                                        </div>
                                        @if(($book->quantity) > 1)
                                            <div class="badge badge-success mb-2">In Stock</div>
                                        @else
                                            <div class="badge badge-danger mb-2">out of Stock</div>
                                        @endif
                                        @if($book->discount_rate)
                                            <h6><span class="badge badge-warning">{{$book->discount_rate}}% Discount</span></h6>
                                        @endif
                                        <div class="book-price mb-2">
                                            <span class="mr-1">Price</span>
                                            @if($book->discount_rate)
                                                <span></span><strong class="line-through">{{$book->init_price}} TK</strong>
                                            @endif
                                                <span>now</span><strong> {{$book->price}} TK</strong>
                                            @if($book->discount_rate)
                                                <div><strong class="text-danger">Save {{$book->init_price - $book->price}} TK</strong></div>
                                            @endif
                                        </div>
                                        <div class="book-category mb-2 py-1 d-flex flex-row border-top border-bottom">
                                            <a href="{{route('category', $book->category->slug)}}" class="mr-4"><i class="fas fa-folder"></i> {{$book->category->name}}</a>
                                            <a href="#review-section" class="mr-4"><i class="fas fa-comments"></i> Reviews</a>
                                        </div>

                                        <form action="{{route('cart.add')}}" method="post">
                                            @csrf
                                            <div class="cart">
                                            <span class="quantity-input mr-2 mb-2">
                                                <a href="#" class="cart-minus" id="cart-minus">-</a>
                                                <input title="QTY" name="quantity" type="text" value="1" class="qty-text">
                                                <a href="#" class="cart-plus" id="cart-plus">+</a>
                                            </span>
                                                <input type="hidden" name="book_id" value="{{$book->id}}">

                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart"></i> Add to cart</button>
                                            </div>
                                        </form>
                                        @include('layouts.includes.flash-message')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="book-description p-3">
                                        <p>{!! Markdown::convertToHtml(e($book->description)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body my-4">
                            <div class="author-description d-flex flex-row">
                                <div class="author-img mr-4">
                                    <img src="{{$book->author->image? $book->author->image_url : $book->default_img}}" alt="">
                                </div>
                                <div class="des">
                                    <h5><a href="{{route('author', $book->author->slug)}}">{{$book->author->name}}</a></h5>
                                    <small>
                                        <a href="{{route('author', $book->author->slug)}}">
                                            <i class="fas fa-book"></i>
                                            {{$book->author->books()->count()}}
                                            {{str_plural('Book', $book->author->books()->count())}}
                                        </a>
                                    </small>
                                    <p>{!! Markdown::convertToHtml(e($book->author->bio)) !!}</p>
                                </div>
                            </div>
                        </div>
                        <!-- COMMENTS HERE -->
                        @include('layouts.includes.reviews')
                    </div>
                </div>
                <!-- Sidebar -->
                    @include('layouts.includes.side-bar')
                <!-- Sidebar end -->
            </div>
        </div>
    </section>
@endsection
