@extends('welcome')
@section('content')
    <!-- Top News Start-->
    <div class="top-news">
        <div class="container">
            <div class="row">

                <div class="col-md-6 tn-left">
                    <div class="row tn-slider">
                        @foreach($firstBannerNews as $bannerNew)
                        <div class="col-md-6">
                            <div class="tn-img">
                                @if($bannerNew->photo)
                                    <img src="{{ asset('storage/' . $bannerNew->photo) }}" class="leftBannerImage" alt="{{ $bannerNew->title }}" />
                                @endif
                                <div class="tn-title">
                                    <a href="{{route('singleNews',  $bannerNew->slug)}}">{{$bannerNew->title}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6 tn-right">
                    <div class="row">
                        @foreach($rightBanners as $rightBanner)
                        <div class="col-md-6">
                            <div class="tn-img">
                                @if($rightBanner->photo)
                                    <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="imageRightBanner" alt="{{ $rightBanner->title }}" />
                                @endif
                                <div class="tn-title">
                                    <a href="{{route('singleNews',  $rightBanner->slug)}}">{{ $rightBanner->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('byCategory', 4)}}"><h2>Sports</h2></a>
                    <div class="row cn-slider">
                        @foreach($sports as $sport)
                        <div class="col-md-6">
                            <div class="cn-img">
                                @if($sport->photo)
                                    <img src="{{ asset('storage/' . $sport->photo) }}" class="middleNewsHome" alt="{{ $sport->title }}" />
                                @endif
                                <div class="cn-title">
                                    <a href="{{route('singleNews',  $sport->slug)}}">{{ $sport->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{route('byCategory', 5)}}"><h2>Politics</h2></a>
                    <div class="row cn-slider">
                        @foreach($politics as $politic)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    @if($politic->photo)
                                        <img src="{{ asset('storage/' . $politic->photo) }}" class="middleNewsHome" alt="{{ $politic->title }}" />
                                    @endif
                                    <div class="cn-title">
                                        <a href="{{route('singleNews',  $politic->slug)}}">{{ $politic->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Category News Start-->
    <div class="cat-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('byCategory', 8)}}"><h2>Social</h2></a>
                    <div class="row cn-slider">
                        @foreach($socials as $social)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    @if($social->photo)
                                        <img src="{{ asset('storage/' . $social->photo) }}" class="middleNewsHome" alt="{{ $social->title }}" />
                                    @endif
                                    <div class="cn-title">
                                        <a href="{{route('singleNews',  $social->slug)}}">{{ $social->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{route('byCategory', 3)}}"><h2>Military</h2></a>
                    <div class="row cn-slider">
                        @foreach($militars as $militar)
                            <div class="col-md-6">
                                <div class="cn-img">
                                    @if($militar->photo)
                                        <img src="{{ asset('storage/' . $militar->photo) }}" class="middleNewsHome" alt="{{ $militar->title }}" />
                                    @endif
                                    <div class="cn-title">
                                        <a href="{{route('singleNews',  $militar->slug)}}">{{ $militar->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category News End-->

    <!-- Tab News Start-->
    <div class="tab-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#featured">Featured News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#latest">Latest News</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="featured" class="container tab-pane active">
                            @foreach($rightBanners as $rightBanner)
                            <div class="tn-news">
                                <div class="tn-img">
                                    @if($rightBanner->photo)
                                    <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage"  alt="{{ $rightBanner->title }}" />
                                    @endif
                                </div>
                                <div class="tn-title">
                                    <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div id="popular" class="container tab-pane fade">
                            @foreach($rightBanners as $rightBanner)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        @if($rightBanner->photo)
                                            <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage" alt="{{ $rightBanner->title }}" />
                                        @endif
                                    </div>
                                    <div class="tn-title">
                                        <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="latest" class="container tab-pane fade">
                            @foreach($rightBanners as $rightBanner)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        @if($rightBanner->photo)
                                            <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage" alt="{{ $rightBanner->title }}" />
                                        @endif                                    </div>
                                    <div class="tn-title">
                                        <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#m-viewed">Most Viewed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#m-recent">Most Recent</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="m-viewed" class="container tab-pane active">
                            @foreach($rightBanners as $rightBanner)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        @if($rightBanner->photo)
                                            <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage" alt="{{ $rightBanner->title }}" />
                                        @endif                                    </div>
                                    <div class="tn-title">
                                        <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="m-read" class="container tab-pane fade">
                            @foreach($rightBanners as $rightBanner)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        @if($rightBanner->photo)
                                            <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage" alt="{{ $rightBanner->title }}" />
                                        @endif                                    </div>
                                    <div class="tn-title">
                                        <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="m-recent" class="container tab-pane fade">
                            @foreach($rightBanners as $rightBanner)
                                <div class="tn-news">
                                    <div class="tn-img">
                                        @if($rightBanner->photo)
                                            <img src="{{ asset('storage/' . $rightBanner->photo) }}" class="featuredImage" alt="{{ $rightBanner->title }}" />
                                        @endif                                    </div>
                                    <div class="tn-title">
                                        <a href="{{route('singleNews',  $rightBanner->slug)}}">{{$rightBanner->title}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tab News Start-->

    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($footerNews as $footerNew)
                        <div class="col-md-4">
                            <div class="mn-img">
                                @if($footerNew->photo)
                                    <img src="{{ asset('storage/' . $footerNew->photo) }}" class="middleNewsHome" alt="{{ $footerNew->title }}" />
                                @endif
                                <div class="mn-title">
                                    <a href="{{route('singleNews',  $footerNew->slug)}}">{{ $footerNew->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            @foreach($footerNews as $footerNew)
                            <li> <a href="{{route('singleNews',  $footerNew->slug)}}">{{  \Illuminate\Support\Str::limit($footerNew->title, 35) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News End-->


@endsection
