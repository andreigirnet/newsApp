@extends('back.backLayout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Create Category</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pages</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Create Category</a>
            </li>
        </ul>
    </div>
    <form action="/category" method="POST">
        @csrf
        <div class="form-group">
            <label for="defaultInput">Title</label>
            <input type="text" class="form-control form-control" name="title" id="defaultInput" placeholder="Title">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
