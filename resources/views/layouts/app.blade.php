<!DOCTYPE html>
<html lang="en">

<head>
    <!-- =========== meta =========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(Route::is('home'))
    <title>Jibon Bani - Get your favourite quote</title>
    @else
    <title>@yield('title') - bdquotes-home</title>
    @endif

    <!-- =========== link =========== -->
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>

<body>

    <!-- =========== navbar start =========== -->
    <div id="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ url('front/images/logo.png')}}" style="width: 150px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <div class="menu-nav d-lg-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('home') ? 'active' : ''}}" href="{{ route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('quote.index') ? 'active' : ''}}" href="{{ route('quote.index')}}">Quotes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('writer.index') ? 'active' : ''}}" href="{{ route('writer.index')}}">Writers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('topic.index') ? 'active' : ''}}" href="{{ route('topic.index')}}">Topics</a>
                        </li>
                        
                    </ul>
                    <div class="search-form">
                        <form >
                            <input type="text" name="search" class="search" placeholder="search">
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="#">Top 10 Quotes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Quotes of the Day</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Popular Topics</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Popular Writer</a>
        </li>
    </ul>
    
    <!-- =========== navbar end =========== -->

    @yield('content')



    <!-- =========== footer section start =========== -->
    <div class="footer">
        <div class="bg-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="footer-menu justify-content-center">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =========== footer section end =========== -->

    <!-- =========== copyright start =========== -->
    <div class="copyright">
        <div class="bg-area">
            <div class="container">
                <div class="text-area">
                    <p>Copyright © 2021 <a href="#">jibonbani.com</a></p>
                    <p>Developed By: <a href="#">Sabya Roy</a></p>
                </div>
            </div>
        </div>
    </div>


    <!-- =========== copyright end =========== -->


    <!-- =========== script =========== -->
    <script src="{{ asset('front/js/all.min.2.2.4.js') }}"></script>

    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('front/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('front/js/canvas2image.js') }}"></script>

    <script src="{{ asset('front/js/script.js') }}"></script>


    @yield('script')

</body>

</html>