   <!-- partial:partials/_navbar.html -->
   <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <a class="navbar-brand brand-logo" href="/"><img src="images/logo.svg" alt="logo" /></a>
       <a class="navbar-brand brand-logo-mini" href="/"><img src="images/logo-mini.svg" alt="logo" /></a>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-stretch">
       <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
         <i class="mdi mdi-menu"></i>
       </button>
       <ul class="navbar-nav">
         <li class="nav-item dropdown">
           <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
             <i class="mdi mdi-bell-outline"></i>
             <span class="count bg-success">7</span>
           </a>
           <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
             <h6 class="p-3 mb-0 text-center">Notifications</h6>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                 <img src="images/faces/face4.jpg" class="profile-pic">
               </div>
               <div class="preview-item-content">
                 <p class="mb-0">Dany Miles <span class="text-small text-muted">commented on your photo</span></p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                 <img src="images/faces/face3.jpg" class="profile-pic">
               </div>
               <div class="preview-item-content">
                 <p class="mb-0">James <span class="text-small text-muted">posted a photo on your wall</span></p>
               </div>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-thumbnail">
                 <img src="images/faces/face2.jpg" class="profile-pic">
               </div>
               <div class="preview-item-content">
                 <p class="mb-0">Alex <span class="text-small text-muted">just mentioned you in his post</span></p>
               </div>
             </a>
             <div class="dropdown-divider"></div>
             <p class="p-3 mb-0 text-center">View all activities</p>
           </div>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
             <i class="mdi mdi-email-outline"></i>
             <span class="count bg-warning">5</span>
           </a>
           <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
             <h6 class="p-3 mb-0 text-center">Messages</h6>
             <a class="dropdown-item preview-item">
               <div class="preview-item-content flex-grow">
                 <span class="badge badge-pill badge-success">Request</span>
                 <p class="text-small text-muted ellipsis mb-0">
                   Suport needed for user123
                 </p>
               </div>
               <p class="text-small text-muted align-self-start">4:10 PM</p>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-item-content flex-grow">
                 <span class="badge badge-pill badge-warning">Invoices</span>
                 <p class="text-small text-muted ellipsis mb-0">
                   Invoice for order is mailed
                 </p>
               </div>
               <p class="text-small text-muted align-self-start">4:10 PM</p>
             </a>
             <a class="dropdown-item preview-item">
               <div class="preview-item-content flex-grow">
                 <span class="badge badge-pill badge-danger">Projects</span>
                 <p class="text-small text-muted ellipsis mb-0">
                   New project will start tomorrow
                 </p>
               </div>
               <p class="text-small text-muted align-self-start">4:10 PM</p>
             </a>
             <h6 class="p-3 mb-0 text-center">See all activity</h6>
           </div>
         </li>
       </ul>
       <ul class="navbar-nav navbar-nav-right ml-lg-auto">
         <li class="nav-item nav-search">
           <form class="nav-link form-inline mt-2 mt-md-0 d-none d-lg-flex">
             <div class="input-group">
               <input type="text" class="form-control" placeholder="Search">
               <div class="input-group-append">
                 <span class="input-group-text">
                   <i class="mdi mdi-magnify"></i>
                 </span>
               </div>
             </div>
           </form>
         </li>
         <li class="nav-item dropdown d-none d-lg-flex">
           <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
             <i class="mdi mdi-earth"></i>
             English
           </a>
           <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
             <a class="dropdown-item" href="#">
               French
             </a>
             <a class="dropdown-item" href="#">
               Spain
             </a>
             <a class="dropdown-item" href="#">
               Latin
             </a>
             <a class="dropdown-item" href="#">
               Japanese
             </a>
           </div>
         </li>
         <li class="nav-item  nav-profile dropdown">
           <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
             <img src="images/faces-clipart/pic-1.png">
             <span class="profile-name">Peter John</span>
           </a>
           <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
             <a class="dropdown-item" href="#">
               <i class="mdi mdi-cached mr-2 text-success"></i>
               Activity Log
             </a>
             <a class="dropdown-item logoutButton" href="/logout">
               <i class="mdi mdi-logout mr-2 text-primary"></i>
               Log Out
             </a>
           </div>
         </li>
       </ul>
       <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
         <span class="mdi mdi-menu"></span>
       </button>
     </div>
   </nav>
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <!-- partial:partials/_settings-panel.html -->
     <div class="theme-setting-wrapper">
       <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
       <div id="theme-settings" class="settings-panel">
         <i class="settings-close mdi mdi-close"></i>
         <p class="settings-heading">SIDEBAR SKINS</p>
         <div class="sidebar-bg-options" id="sidebar-light-theme">
           <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
         </div>
         <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
           <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
         </div>
         <p class="settings-heading mt-2">HEADER SKINS</p>
         <div class="color-tiles mx-0 px-4">
           <div class="tiles primary"></div>
           <div class="tiles success"></div>
           <div class="tiles warning"></div>
           <div class="tiles danger"></div>
           <div class="tiles pink"></div>
           <div class="tiles info"></div>
           <div class="tiles dark"></div>
           <div class="tiles default"></div>
         </div>
       </div>
     </div>
     <!-- partial -->
     <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-noti" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">Notifications</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-noti">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Updates</a></li>
             </ul>
           </div>
         </li>

         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-posts" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">Posts</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-posts">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="{{route('posts')}}">All Posts</a></li>
               <li class="nav-item"> <a class="nav-link" href="{{route('posts',['action' => 'add'])}}">New Post</a></li>
               <li class="nav-item"> <a class="nav-link" href="{{route('posts',['action' => 'categories'])}}">Categories</a></li>
               <li class="nav-item"> <a class="nav-link" href="{{route('posts',['action' => 'tags'])}}">Tags</a></li>
             </ul>
           </div>
         </li>

         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-media" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">Media</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-media">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Media</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Upload</a></li>
             </ul>
           </div>
         </li>

         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-pages" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">Pages</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-pages">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">All pages</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">New pages</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Categories</a></li>
             </ul>
           </div>
         </li>

         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-setting" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">Settings</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-setting">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">All settings</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Permanlinks</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Writing</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Reading</a></li>
             </ul>
           </div>
         </li>

         <li class="nav-item">
           <a class="nav-link" data-toggle="collapse" href="#page-seo" aria-expanded="false" aria-controls="page-layouts">
             <i class="mdi mdi-arrow-expand-all menu-icon"></i>
             <span class="menu-title">SEO</span>
             <i class="menu-arrow"></i>
           </a>
           <div class="collapse" id="page-seo">
             <ul class="nav flex-column sub-menu">
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">All settings</a></li>
               <li class="nav-item"> <a class="nav-link" href="pages/layout/boxed-layout.html">Permanlinks</a></li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="pages/widgets.html">
             <i class="mdi mdi-puzzle menu-icon"></i>
             <span class="menu-title">Widgets</span>
           </a>
         </li>
       </ul>
     </nav>
     <!-- <script>
       (function($) {
         'use strict';
         $('span.logoutButton').click(function() {
           $.ajax({
             type: "POST",
             url: '<?php echo env('API_URL'); ?>/api/logout',
             //  data: JSON.stringify(data),
             dataType: 'json',
             contentType: 'application/json',
             success: function(res) {
               if (res.err == 0) {

               }
             },
           });
         })
       })(jQuery);
     </script> -->