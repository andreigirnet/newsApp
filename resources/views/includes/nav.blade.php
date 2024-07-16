<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tb-contact">
                    <p><i class="fas fa-envelope"></i>info@hype-news.eu</p>
                    <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tb-menu">
                    <a href="{{route('about')}}">About</a>
                    <a href="{{route('privacy')}}">Privacy</a>
                    <a href="{{route('terms')}}">Terms</a>
                    <a href="{{route('contact')}}">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar Start -->

<!-- Brand Start -->
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="b-logo">
                    <a href="/">
                        <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="b-ads">
                    <a href="/">
{{--                        <img src="{{asset('assets/img/ads-1.jpg')}}" alt="Ads">--}}
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="b-search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
                        <div class="dropdown-menu">
                            @foreach(App\Models\Category::all() as $category)
                                <a href="{{route('byCategory', $category->id)}}" class="dropdown-item">{{$category->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{route('byCategory', 3)}}" class="nav-item nav-link">Military</a>
                    <a href="{{route('byCategory', 5)}}" class="nav-item nav-link">Elections</a>
                    <a href="{{route('byCategory', 4)}}" class="nav-item nav-link">Sports</a>
                </div>
                <div class="social ml-auto">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
