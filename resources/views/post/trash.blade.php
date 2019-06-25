@extends('master')
@section('content')
<div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class="mb-3 form-inline">
               {{-- <h4 class="card-title">List Posts</h4> --}}
               <a title="Add New Post" class="btn btn-success ml-2" href="{{route('posts',['action' => 'add'])}}"><i class="mdi mdi-plus menu-icon"></i>New Post</a>
               <a title="Trash" class="btn btn-danger ml-2" href="{{route('posts',['action' => 'trash'])}}"><i class="mdi mdi-delete menu-icon"></i>Trash</a>
            </div>

            <div class="card-description">
               <table class="table table-striped">
                  <tbody>
                     <tr>
                        <td>
                           <form class="form-inline" id="makePostaction">
                              <select class="form-control border-primary" id="postAction">
                                 <option value="" selected disabled>Make an action</option>
                                 <option value="movetotrash">Move to trash</option>
                                 <option value="clone">Clone</option>
                                 <option value="restore">Restore</option>
                                 <option value="delete">Delete permanently</option>
                              </select>
                              <input type="hidden" id="author_id" value="{{Auth::user()->id}}">
                              <button class="btn btn-danger ml-2">Apply</button>
                           </form>
                        </td>
                        <td>
                           <div class="">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <button class="btn btn-danger">Filter</button>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <table id="order-listing" class="table" cellspacing="0">
               <thead>
                  <tr>
                     <th>
                        <div class="icheck-square action-check"><input type="checkbox" id="" value=""></div>
                     </th>
                     <th>Title</th>
                     <th>Author</th>
                     <th>Category</th>
                     <th>Tags</th>
                     <th>Comment</th>
                     <th>Time</th>
                     <th>View</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($posts as $post)
                  <tr>
                     <td>
                        <div class="icheck-square action-single-check"><input type="checkbox" id="" value="{{$post->slug}}"></div>
                     </td>
                     <td><a href="{{route('single-posts',[ 'action' => 'edit', 'slug' => $post->slug ])}}">{{$post->name}}</a></td>
                     <td>{{Auth::user($post->author_id)->name}}</td>
                     <td>Edinburgh</td>
                     <td>New York</td>
                     <td>$1500</td>
                     <td>$3200</td>
                     <td>
                        <label class="badge badge-info badge-pill">On hold</label>
                     </td>
                     <td>
                        <button onclick="previewPost('{{ $post->slug }}')" class="btn btn-outline-primary">Preview</button>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
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
   })

   function previewPost(slug) {
      var data = {
         post_slug: slug,
      }
      $.ajax({
         type: "POST",
         url: '<?php echo env('API_URL'); ?>/post/previewPost',
         data: JSON.stringify(data),
         dataType: 'json',
         contentType: 'application/json',
         success: function(res) {
            if (res.err == 0) {
               $('#previewModal').modal('show');
               $('#previewModal .modal-body').html(res.data.content)
               $('#previewModal .modal-title').html(res.data.name)
            }

         },
      });
   }
</script>
@endsection