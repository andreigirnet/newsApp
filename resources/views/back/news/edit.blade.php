@extends('back.backLayout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit News</h4>
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
                <a href="#">Edit News</a>
            </li>
        </ul>
    </div>
    <form action="/news/{{$news->id}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group form-group">
            <select name="category" class="form-select" id="formGroupDefaultSelect">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category', $news->category_id) ? 'selected' : '' }}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="defaultInput">Title</label>
            <input type="text" class="form-control form-control" name="title" id="defaultInput" value="{{$news->title}}" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="content">News Content</label>
            <script>
                tinymce.init({
                    selector: 'textarea',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                    ],
                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                });
            </script>
            <textarea name="content" id="content">
                {{$news->content}}
            </textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control form-control" name="image" id="defaultInput" >
        </div>

        <div class="form-group">
            <label for="defaultInput">Video Link</label>
            <input type="text" class="form-control form-control" name="video" id="defaultInput" placeholder="Video Link">
        </div>

        <div class="form-group">
            <label for="hotNews">Hot News</label>
            <select name="hotNews" id="hotNews" class="form-select">
                <option value="0" {{ old('hotNews', $news->hot_news) == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('hotNews', $news->hot_news) == 1 ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection