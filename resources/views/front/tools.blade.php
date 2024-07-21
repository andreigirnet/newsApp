@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <h1 class="sn-title" style="margin-top: 20px">Tools</h1>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{asset('assets/img/youtube.webp')}}" class="card-img-top" style="height: 200px" alt="" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Youtube Revenue Calculator</h5>
                            <p class="card-text"></p>
                            <a href="{{route('ytCalc')}}" class="btn btn-primary mt-auto">Calculate</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{asset('assets/img/loss.png')}}" class="card-img-top" style="height: 200px" alt="" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Fitness Calorie Calculator</h5>
                            <p class="card-text"></p>
                            <a href="{{route('calorie')}}" class="btn btn-primary mt-auto">Calculate</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
