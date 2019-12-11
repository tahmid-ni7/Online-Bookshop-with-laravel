<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bookshop - User home</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('/')}}assets/img/favicon-2.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1 border-bottom" id="nav-top">
    <div class="container">
        <a href="{{route('bookshop.home')}}" class="logo-img"><img src="{{asset('/')}}assets/img/logo.png" alt=""></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="{{route('bookshop.home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{route('all-books')}}" class="nav-link">Books</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{route('discount-books')}}" class="nav-link">Discount's Books</a>
                </li>
                <li class="nav-item px-2">
                    <a href="#" class="nav-link">About</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" data-toggle="dropdown">
                        <span class="image-circle"><img src="{{Auth::user()->image? Auth::user()->image_url:Auth::user()->default_img}}" width="30" alt=""></span>
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('user.home')}}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-muted"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-muted"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{url('logout')}}">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-muted"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVBAR END -->
<!-- HEADER -->
<section class="header py-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="headings">
                    <h3><a href="{{route('bookshop.home')}}" class="text-secondary"><b class="text-danger">Book</b> Shop</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="activity-user">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-danger" href="#" data-toggle="dropdown"><i class="fas fa-cog"></i> Your
                                activities</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('user.reviews')}}">Reviews</a>
                                <a class="dropdown-item" href="{{route('user.orders')}}">Orders</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shopping-cart text-right">
                    <a href="{{route('cart')}}" class="text-danger"><i class="fas fa-shopping-cart fa-2x m-1"></i>
                        @if(Cart::content()->count())
                            <span class="count-cart">{{Cart::content()->count()}}</span>
                        @endif
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- HEADER END -->

@yield('content')

<footer class="py-3 text-center border-top bg-light">
    <div class="container">
        <div class="go-to-top mb-2">
            <a href="#nav-top" class="text-muted" title="Go to top"><i class="fas fa-angle-double-up"></i></a>
        </div>
        <div class="footer-text">
            Copyright &copy; tahmid-ni7 - <span id="year"></span>
        </div>
        <div class="social-icon mt-2">
                <span class="mr-2">
                    <a href="https://www.facebook.com/iamTahmid.ni7" class="text-primary"><i
                            class="fab fa-facebook fa-2x"></i></a>
                </span>
            <span class="mr-2">
                    <a href="https://github.com/tahmid-ni7" class="text-secondary"><i
                            class="fab fa-github fa-2x"></i></a>
                </span>
            <span class="mr-2">
                    <a href="https://stackoverflow.com/users/11026749/tahmid-ni7" class="text-warning"><i
                            class="fab fa-stack-overflow fa-2x"></i></a>
                </span>
        </div>
    </div>
</footer>



<!-- jQuery -->
<script type="text/javascript" src="{{asset('/')}}assets/js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('/')}}assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="{{asset('/')}}assets/js/script.js"></script>

</body>

</html>
