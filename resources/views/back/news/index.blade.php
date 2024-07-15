@extends('back.backLayout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">News</h4>
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
                <a href="#">News</a>
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
            <th>Category</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $new)
            <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->category->title}}</td>
                <td>{{$new->title}}</td>
                <td>{{$new->created_at}}</td>
                <td>
                    <div style="display: flex; column-gap: 5px">
                        <form action="news/{{$new->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        <a href="news/{{$new->id}}/edit" class="btn btn-warning">Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $news->links('paginator') }}
    </div>
    </div>
    </div>
    </div>
@endsection
