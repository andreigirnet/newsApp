@extends('welcome')
@section('content')
    <div class="container">
        <div class="row flex justify-content-center">
            <div class="ytCalc ">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_Logo_2017.svg" alt="YouTube Logo">
                <h1 class="h1-yt">YouTube Revenue Calculator</h1>
                <small>Medium rates</small>
                <label for="shortViews" class="label-yt">Shorts Views Rate(0.1 cents/ 1000 views)</label>
                <input type="number" id="shortViews" class="input-yt" placeholder="Enter number of views" oninput="calculateRevenue()">

                <label for="longViews" class="label-yt">Long Videos Views Rate(1 dollar/ 1000 views)</label>
                <input type="number" id="longViews" class="input-yt" placeholder="Enter number of views" oninput="calculateRevenue()">

                <div class="result-yt" id="shortRevenueResult"></div>
                <div class="result-yt" id="longRevenueResult"></div>
                <div class="result-yt" id="totalRevenueResult"></div>
            </div>
        </div>
    </div>
@endsection
