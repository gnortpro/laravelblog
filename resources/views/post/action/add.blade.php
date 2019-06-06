@extends('master')
@section('content')
<input type="text" id="Restaurant_Name">
        <script>
            $(document).ready(function(){
                $("#Restaurant_Name").on('keyup', function(event){
                    
                        eventKeyCode =  $("#Restaurant_Name").val() // what I already tried is in StackOverflow answer    
                        
                        console.log(eventKeyCode);
                   
                });
               
            })
        </script>
<div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
        
      <div class="card">
         <div class="card-body">
            <a title="Add New Post" class="btn btn-danger mb-3" href="{{route('posts')}}"><i class="mdi mdi-keyboard-backspace menu-icon"></i>Back</a>
            <form id="form-add-post" action="" role="form">
               @csrf
               <div class="form-group">
                  <label for="">Post Title</label>
                  <input type="text" class="form-control" id="post_name" placeholder="Post Title" required>
               </div>
               <div class="form-group">
                  <label for="">Author</label>
                  <input type="hidden" id="post_author_id" value="{{Auth::user()->id}}">
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
               <a title="Preview Post" class="btn btn-info" href="{{route('posts')}}"><i class="mdi mdi-file-find menu-icon"></i>Preview</a>
               <button type="submit" class="btn btn-primary ml-2"><i class="mdi mdi-send menu-icon"></i>Submit Post</button>
               <a title="Cancel" class="btn btn-danger ml-2" href="{{route('posts')}}"><i class="mdi mdi-close-circle menu-icon"></i>Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $('#form-add-post').submit(function(e) {
         e.preventDefault();
         swal({
            title: 'Are you sure?',
            //   text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: {
               cancel: {
                  text: "Cancel",
                  value: null,
                  visible: true,
                  className: "btn btn-danger",
                  closeModal: true,
               },
               confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-primary",
                  closeModal: true
               }
            }
         }).then((value) => {
            if (value) {
               var post_name = $('#post_name').val()
               var post_content = $('#addpost').val()
               var post_thumbnail = $('#post_thumbnail').val()
               var post_author_id = $('#post_author_id').val()
               var data = {
                  post_name: post_name,
                  post_content: post_content,
                  post_thumbnail: post_thumbnail,
                  post_author: post_author_id,
                  '_token': $('meta[name="csrf-token"]').attr('content')
               }
               $.ajax({
                  type: "POST",
                  url: '<?php echo env('API_URL'); ?>/api/post/submitPost',
                  data: JSON.stringify(data),
                  dataType: 'json',
                  contentType: 'application/json',
                  success: function(res) {
                     tinyMCE.activeEditor.setContent('');
                     $('#form-add-post').find("input[type=text], textarea").val("");
                     swal({
                        title: 'Congratulations!',
                        text: 'Post added succesfully!',
                        icon: 'success',
                        button: {
                           text: "OK",
                           value: true,
                           visible: true,
                           className: "btn btn-primary"
                        }
                     })
                  },
               });
            }
         });
      })
   })
</script>
@endsection