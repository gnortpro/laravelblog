@extends('master')
@section('content')

<form action="/api/submitpost" method="POST" role="form">
    @csrf
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" class="form-control" name="post_name" value="{{ $post_by_slug->name }}" required>
    </div>
    <div class="form-group">
        <label for="">Author</label>
        <input type="text" class="form-control" name="post_author" value="{{ Auth::user($post_by_slug->author_id)->name }}" placeholder="Author" disabled>
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <textarea class="form-control" name="post_content"  rows="3" required>{{ $post_by_slug->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="text" class="form-control" name="post_thumbnail" value="{{ $post_by_slug->thumbnail }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Edit Post</button>
    <a href="{{route('posts')}}" class="btn btn-danger">Cancel</a>
</form>
@endsection