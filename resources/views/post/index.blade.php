@extends('master')
@section('content')
<div class="row">
   <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <div class=" form-inline">
                  <h4 class="card-title">List Posts</h4>
                  <a class="btn btn-success" href="{{route('posts',['action' => 'add'])}}">New Post</a>
            </div>
            
            <div class="card-description">
               <table class="table table-striped">
                  <tbody>
                     <tr>
                        <td>
                           <div class="form-group form-inline">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option value="" selected disabled>Make an action</option>
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                              <button class="btn btn-danger">Apply</button>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <select class="form-control border-primary" id="exampleSelectPrimary">
                                 <option>Move to trash</option>
                                 <option>Clone</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
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
                        <button class="btn btn-outline-primary">View</button>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection