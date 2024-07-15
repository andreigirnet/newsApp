@extends('back.backLayout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Categories</h4>
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
                <a href="#">Categories</a>
            </li>
        </ul>
    </div>
    <table
        id="basic-datatables"
        class="display table table-striped table-hover"
    >
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <div style="display: flex; column-gap: 5px">
                <form action="category/{{$category->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a href="category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
@endsection
