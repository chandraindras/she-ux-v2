<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SheUX</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
   <link rel="stylesheet" href="{{ asset('Dashboard/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('Dashboard/modal/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
</head>

<body>
  @include('sweetalert::alert')
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('Dashboard/images/sheuxwhttp.png') }}" style="width: 100px; height: 350px;" alt="logo"/></a> -->
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('Dashboard/images/sheuxwhttp.png') }}" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModal">+ Create New</button>
            </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Profile
              </a>
              <a href="{{ route('logout') }}" class="dropdown-item preview-item">
                  <i class="icon-inbox"></i> Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            @php
              if (Auth::user()->image === NULL) {
            @endphp
              <img src="{{asset('modalDocument/no-avatar (3).png')}}">
              <button type="button" class="btn-image" data-toggle="modal" data-target="#exampleModal">
                <img src="{{asset('modalDocument/edit-avatar.svg')}}" style="width: 25px;height: 25px;">
              </button>
            @php
              } else {
            @endphp
              <img src="{{asset('uploads/profile_picture/' . Auth::user()->image)}}">
              <button type="button" class="btn-image" data-toggle="modal" data-target="#exampleModal">
                <img src="{{asset('modalDocument/edit-avatar.svg')}}" style="width: 25px;height: 25px;">
              </button>
            @php
              }
            @endphp
          </div>
          <div class="user-name">
              {{ Auth::user()->name }}
          </div>
          <div class="user-designation">
              {{ Auth::user()->email }}
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Project</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('project/your') }}">Your Project</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('project/invitation') }}">Invitation Project</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/faq') }}">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">FAQ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/documentation') }}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card" style="height: 550px;">
                <div class="card-body">
                  <h4 class="card-title">Your Project List</h4>
                  <center>
                    <img src="{{ asset('Dashboard/images/ilustrasi/noproject.svg') }}" class="mt-7 mb-4">
                    <div class="mb-2 no-project-title">
                      <span>NO INVITATION PROJECTS CREATED YET</span>                    
                    </div>
                  </center>
                </div>
              </div>
            </div>
            <div class="">
                <div class="col-xl-10 grid-margin stretch-card" >
                  <div class="card" style="overflow-y: auto; position: absolute; top: -1px; width: 315px; height: 260px;">
                    <div class="card-body">
                      <h4 class="card-title">Team</h4>
                        <!-- <p class="card-description">Add class <code>.btn-social-icon-text</code></p> -->
                      <div class="template-dem mt-4">
                        <center>
                          <img src="{{ asset('Dashboard/images/ilustrasi/feature-not-ready.svg') }}" style="width: 80px; height: 80px;" class="mb-2">
                          <div class="mb-1 progress-title">
                            <span >Feature not ready</span>
                          </div>
                          <span>Sorry ! This feature is not ready use (or is unimplemented)</span> 
                        </center>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="">
                <div class="col-xl-10 grid-margin stretch-card" >
                  <div class="card" style="position: absolute; top: 285px; left: -9px; width: 315px; height: 260px;">
                    <div class="card-body">
                      <h4 class="card-title">Progress</h4>
                        <!-- <p class="card-description">Add class <code>.btn-social-icon-text</code></p> -->
                      <div class="template-dem mt-4">
                          <center>
                            <img src="{{ asset('Dashboard/images/ilustrasi/feature-not-ready.svg') }}" style="width: 80px; height: 80px;" class="mb-2">
                            <div class="mb-1 progress-title">
                              <span >Feature not ready</span>
                            </div>
                            <span>Sorry ! This feature is not ready use (or is unimplemented)</span>
                          </center>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Electronic Engineering Polytechnic Institute of Surabaya and Rasyid Institue</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- modal-create-new-project -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="  border-radius: 20px;">
        <div class="modal-header">
          <h5 class="modal-title modal-title-projec" id="exampleModalLabel">Create Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createProject" method="POST" action="{{'/create_project'}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Project Name</label>
              <input type="text" class="form-control" id="project-name" name="project_name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Project Description</label>
              <textarea placeholder="Short Description" class="form-control" id="description-text" name="project_desc"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" value="submit" for="createProject" class="btn-create">Create</button>
        </div>
        </form>
      </div>
    </div>
  </div>  
  <!-- end-modal-create-new-project -->
  <!-- modal-create-new-project -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="  border-radius: 20px;">
        <div class="modal-header">
          <h5 class="modal-title modal-title-projec" id="exampleModalLabel">Create Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createProject" method="POST" action="{{'/create_project'}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Project Name</label>
              <input type="text" class="form-control" id="project-name" name="project_name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Project Description</label>
              <textarea placeholder="Short Description" class="form-control" id="description-text" name="project_desc"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" value="submit" for="createProject" class="btn-create">Create</button>
        </div>
        </form>
      </div>
    </div>
  </div>  
  <!-- end-modal-create-new-project -->
  <!-- base:js -->
  <script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
 <script src="{{ asset('Dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('Dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('Dashboard/js/template.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
