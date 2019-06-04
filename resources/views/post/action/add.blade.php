@extends('master')
@section('content')
<form action="/api/submitpost" method="POST" role="form">
    @csrf
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="post_name" placeholder="Post Title" required>
    </div>
    <div class="form-group">
        <label for="">Author</label>
        <input type="text" class="form-control" name="post_author" value="{{Auth::user()->name}}" placeholder="Author" disabled>
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <textarea class="form-control" name="post_content" placeholder="Content" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="text" class="form-control" name="post_thumbnail" placeholder="Thumbnail" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit Post</button>
</form>
@endsection