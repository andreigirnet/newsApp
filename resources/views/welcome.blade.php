<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {!! SEO::generate() !!}
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="breaking news, latest news, world news, politics, business, technology, entertainment, sports, health, science, lifestyle, travel, opinion, editorials, local news, global news, news updates, headlines, current events">


    <!-- Favicon -->
    <link href="{{asset('assets/img/icon.jpg')}}" rel="icon" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('assets/lib/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/lib/slick/slick-theme.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/pagination.css')}}" />


    <meta name="google-site-verification" content="tnbRsy03S4_f3BOYVKh_shJ2Yj--0lJNcy3px_tx6xI" />

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9112272212670993"
            crossorigin="anonymous"></script>



</head>

<body>
@include('includes.nav')

@yield('content')

@include('includes.footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('assets/lib/slick/slick.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('assets/js/main.js')}}"></script>


</body>
</html>
