@extends('master')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-12">
         <div class="mt-2">
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
      </div>
   </div>
</div>
@endsection