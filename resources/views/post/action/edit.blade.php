@extends('master')
@section('content')
<form action="" id="form-edit-post">
    @csrf
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="hidden" id="post_slug" value="{{ $post_by_slug->slug }}" />
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" class="form-control" id="post_name" value="{{ $post_by_slug->name }}" required>
    </div>
    <div class="form-group">
        <label for="">Author</label>
        <input type="text" class="form-control" id="post_author" value="{{ Auth::user($post_by_slug->author_id)->name }}" placeholder="Author" disabled>
    </div>
    <div class="form-group">
        <label for="">Content</label>
        <textarea id='addpost' placeholder=" Your content here..." required>
        {{ $post_by_slug->content }}
        </textarea>
    </div>
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="text" class="form-control" id="post_thumbnail" value="{{ $post_by_slug->thumbnail }}" required>
    </div>
    
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" id="post_slug_new" value="{{ $post_by_slug->slug }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Save Post</button>
    <a href="{{route('posts')}}" class="btn btn-danger">Cancel</a>
</form>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form-edit-post').submit(function(e) {
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
                    var post_slug = $('#post_slug').val()
                    var post_name = $('#post_name').val()
                    var post_content = $('#addpost').val()
                    var post_thumbnail = $('#post_thumbnail').val()
                    var post_slug_new = $('#post_slug_new').val()
                    var data = {
                        post_slug: post_slug,
                        post_name: post_name,
                        post_content: post_content,
                        post_thumbnail: post_thumbnail,
                        post_slug_new: post_slug_new,
                    }
                    $.ajax({
                        type: "POST",
                        url: '<?php echo env('API_URL'); ?>/api/post/editPost',
                        data: JSON.stringify(data),
                        dataType: 'json',
                        contentType: 'application/json',
                        success: function(res) {
                            swal({
                                title: 'Congratulations!',
                                text: 'Post updated succesfully!',
                                icon: 'success',
                                button: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-primary"
                                }
                            }).then((value) => {
                                if (value) {
                                    window.location.href = '<?php echo env('APP_URL'); ?>/posts/'+post_slug_new+'?action=edit';
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