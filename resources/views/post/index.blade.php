@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-12">
         <div class="mt-2">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#listpost" role="tab" aria-controls="listpost" aria-selected="false">List Post</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link " id="home-tab" data-toggle="tab" href="#createpost" role="tab" aria-controls="createpost" aria-selected="true">Create Post</a>
               </li>
            </ul>
            <div class="tab-content mt-2" id="myTabContent">
               <div class="tab-pane fade show active" id="listpost" role="tabpanel" aria-labelledby="listpost-tab">
                  @foreach ($posts as $post)
                  <div class="card mt-2 mb-2">
                     <div class="card-header">
                        <h2 class="post_title">{{$post->name}}</h2>
                        <i class="author">Posted by {{Auth::user($post->author_id)->name}}</i>
                     </div>
                     <div class="card-body">
                        <p class="card-text">{{$post->content}}</p>
                     </div>
                     <div class="card-footer">
                        <a href="#" class="btn btn-primary">Edit Post</a>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="tab-pane fade " id="createpost" role="tabpanel" aria-labelledby="createpost-tab">
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
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection