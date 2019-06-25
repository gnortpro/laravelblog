@extends('master')
@section('content')


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
                  <label for="">Post Slug</label>
                  <input type="text" class="form-control" id="post_slug" placeholder="Post Slug" required>
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
               <button type="button" id="preview_post" title="Preview Post" class="btn btn-info"><i class="mdi mdi-file-find menu-icon"></i>Preview</button>
               <button type="submit" class="btn btn-primary ml-2"><i class="mdi mdi-send menu-icon"></i>Submit Post</button>
               <a title="Cancel" class="btn btn-danger ml-2" href="{{route('posts')}}"><i class="mdi mdi-close-circle menu-icon"></i>Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title"></h3>
         </div>
         <div class="modal-body">

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal" aria-label="Close">
               Close
            </button>
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
               var post_slug = $('#post_slug').val()
               var data = {
                  post_name: post_name,
                  post_content: post_content,
                  post_thumbnail: post_thumbnail,
                  post_author: post_author_id,
                  post_slug: post_slug,
                  '_token': $('meta[name="csrf-token"]').attr('content')
               }
               $.ajax({
                  type: "POST",
                  url: '<?php echo env('API_URL'); ?>/post/submitPost',
                  data: JSON.stringify(data),
                  dataType: 'json',
                  contentType: 'application/json',
                  success: function(res) {
                     if (res.err == 3) {
                        swal({
                           title: 'Fail!',
                           text: res.msg,
                           icon: 'error',
                           button: {
                              text: "OK",
                              value: true,
                              visible: true,
                              className: "btn btn-primary"
                           }
                        })
                     }
                     if (res.err == 0) {
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
                     }

                  },
               });
            }
         });
      })
      $("#post_name").on('keyup', function(event) {

         eventKeyCode = $("#post_name").val()

         $("#post_slug").val(convertToSlug(eventKeyCode));

      });

      function convertToSlug(str) {
         str = str.replace(/^\s+|\s+$/g, ''); // trim
         str = str.toLowerCase();

         // remove accents, swap ñ for n, etc
         var from = "ãăắằặẳàáạảäâẽèẹẻéëêểệềễếìíïîõớợờởỡơòọỏớóöôùủụúüûñçđừứựửưốồộổ·/_,:;";
         var to = "aaaaaaaaaaaaeeeeeeeeeeeeiiiioooooooooooooouuuuuuncduuuuuoooo------";
         for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
         }

         str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

         return str;
      }
      $('#preview_post').click(function() {
         var content = tinyMCE.activeEditor.getContent();
         var title = $('#post_name').val();
         if (content != '' && title != '') {
            $('#previewModal').modal('show');
            $('.modal-title').html(title)
            $('.modal-body').html(content)
         } else {
            swal({
               title: 'Fail!',
               text: 'Please input content',
               icon: 'error',
               button: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-primary"
               }
            })
         }

      })

   })
</script>
@endsection