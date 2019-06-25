@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
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
                    <button type="button" id="preview_post" title="Preview Post" class="btn btn-info"><i class="mdi mdi-file-find menu-icon"></i>Preview</button>
                    <button type="submit" class="btn btn-primary">Save Post</button>
                    <a href="{{route('posts')}}" class="btn btn-danger">Cancel</a>
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
                        url: '<?php echo env('API_URL'); ?>/post/editPost',
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
                                    window.location.href = '<?php echo env('APP_URL'); ?>/posts/' + post_slug_new + '?action=edit';
                                }
                            })

                        },
                    });
                }
            });
        })
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