@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <h1 class="sn-title" style="margin-top: 20px">{{$category->title}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($newsByCategory as $news)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        @if($news->photo)
                            <img src="{{ asset('storage/' . $news->photo) }}" class="card-img-top" alt="{{ $news->title }}" />
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ Str::limit($news->description, 100) }}</p>
                            <a href="{{ route('singleNews', $news->id) }}" class="btn btn-primary mt-auto">Detalii</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
                {{ $newsByCategory->links('paginator') }}
            </div>
        </div>
    </div>
@endsection
