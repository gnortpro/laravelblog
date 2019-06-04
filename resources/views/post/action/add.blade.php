@extends('master')
@section('content')
<div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
           <div class="card">
              <div class="card-body">
                    <form id="form-add-post" action="" role="form">
                        @csrf
                
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" id="post_name" placeholder="Post Title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" id="post_author" value="{{Auth::user()->name}}" placeholder="Author" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea id='addpost' placeholder=" Your content here..." required>
                               
                            </textarea>
                            {{-- <textarea class="form-control" name="post_content" placeholder="Content" rows="3" required></textarea> --}}
                        </div>
                        <div class="form-group">
                            <label for="">Thumbnail</label>
                            <input type="text" class="form-control" id="post_thumbnail" placeholder="Thumbnail" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Post</button>
                    </form>
              </div>
            </div>
            </div>
            </div>
<script>
     $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $('#form-add-post').submit(function(e){
            e.preventDefault();
            if (confirm('Are you sure you want to Delete Ad ?')) {
                var post_name = $('#post_name').val()
                var post_content = $('#addpost').val()
                var post_thumbnail = $('#post_thumbnail').val()
                var data = {
                    post_name: post_name,
                    post_content: post_content,
                    post_thumbnail: post_thumbnail
                }
                $.ajax({
                    type: "POST",
                    url: 'http://127.0.0.1:8000/api/submitPost',
                    data: JSON.stringify(data),
                    success: function(res){
                        console.log(res)
                    },
                    dataType: 'json',
                    contentType: 'application/json',
                });
            }
           
        })
     })

    
</script>
@endsection