@extends('back.backLayout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Category</h4>
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
                <a href="#">Edit Category</a>
            </li>
        </ul>
    </div>
    <form action="/category/{{$category->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="defaultInput">Title</label>
            <input type="text" class="form-control form-control" name="title" id="defaultInput" value="{{$category->title}}" placeholder="Title">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
