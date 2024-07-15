@extends('welcome')
@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">News</a></li>
                <li class="breadcrumb-item active">News details</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <h1 class="sn-title">{{$news->title}}</h1>
                        <div class="sn-img">
                            @if($news->photo)
                                <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->title }}" />
                            @endif
                        </div>
                        <div class="sn-content">
                            {!! $news->content !!}
                        </div>
                    </div>
                    <div class="sn-related">
                        <h2>Related News</h2>
                        <div class="row sn-slider" style="row-gap: 20px;">
                            @foreach($hotNews as $related)
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <img src="{{ asset('storage/' . $related->photo) }}" alt="{{ $related->title }}" />
                                    <div class="sn-title">
                                        <a href="">{{$related->title}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">
                                @foreach($inThisCategory as $categoryNew)
                                <div class="nl-item">
                                    <div class="nl-img">
                                        @if($categoryNew->photo)
                                            <img src="{{ asset('storage/' . $categoryNew->photo) }}" alt="{{ $categoryNew->title }}" />
                                        @endif
                                    </div>
                                    <div class="nl-title">
                                        <a href="{{route('byCategory', $categoryNew->id)}}"> {{\Illuminate\Support\Str::limit($categoryNew->title, 40)}}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="{{asset('assets/img/ads-2.jpg')}}" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        @foreach($hotNews as $news)
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                @if($news->photo)
                                                    <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->title }}" />
                                                @endif
                                            </div>
                                            <div class="tn-title">
                                                <a href="">{{$news->title}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        @foreach($hotNews as $news)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    @if($news->photo)
                                                        <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->title }}" />
                                                    @endif
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">{{$news->title}}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        @foreach($hotNews as $news)
                                            <div class="tn-news">
                                                <div class="tn-img">
                                                    @if($news->photo)
                                                        <img src="{{ asset('storage/' . $news->photo) }}" alt="{{ $news->title }}" />
                                                    @endif
                                                </div>
                                                <div class="tn-title">
                                                    <a href="">{{$news->title}}</a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="{{asset('assets/img/ads-2.jpg')}}" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            <div class="category">
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{route('byCategory', $category->id)}}">{{$category->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="{{asset('assets/img/ads-2.jpg')}}" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags Cloud</h2>
                            <div class="tags">
                                @foreach($categories as $category)
                                <a href="{{route('byCategory', $category->id)}}">{{$category->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->
@endsection
