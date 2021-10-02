<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SheUX</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/jquery-bar-rating/fontawesome-stars-o.css')}}">
  <link rel="stylesheet" href="{{asset('Dashboard/vendors/jquery-bar-rating/fontawesome-stars.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('Dashboard/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('Dashboard/css/upload-image.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('Dashboard/images/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <link href="{{asset('tiny-tour-master/dist/tour.min.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('tiny-tour-master/dist/tour.min.js')}}" rel="stylesheet" type="text/javascript"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="Dashboard/images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="Dashboard/images/logo-mini.svg" alt="logo"/></a> -->
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
            <li class="nav-item dropdown d-flex mr-4">
              <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModal">+ Create Project</button>
            </li>
<!--           <li class="nav-item dropdown d-flex">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="icon-air-play mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{('Dashboard/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{('Dashboard/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{('Dashboard/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item dropdown d-flex mr-4">
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
         <!--  <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-grid"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile two">
          <div class="user-image">
            @php
              if (Auth::user()->image === NULL) {
            @endphp
              <img src="{{('modalDocument/no-avatar (3).png')}}">
              <button type="button" id="btn1" class="btn-image " data-toggle="modal" data-target="#addImage">
                <img src="{{('modalDocument/edit-avatar.svg')}}" style="width: 25px;height: 25px;>
              </button>
            @php
              } else {
            @endphp
              <img src="{{asset('uploads/profile_picture/' . Auth::user()->image)}}">
              <button type="button" id="btn1" class="btn-image" data-toggle="modal" data-target="#addImage">
                <img src="{{('modalDocument/edit-avatar.svg')}}" style="width: 25px;height: 25px;">
              </button>
            @php
              }
            @endphp
          </div>
          <div class="user-name one">
              {{ Auth::user()->name }}
          </div>
          <div class="user-designation">
              {{ Auth::user()->email }}
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="">
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
            <div class="collapse three" id="ui-basic">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about-us') }}">
                    <i class="icon-command menu-icon"></i>
                    <span class="menu-title">About Us</span>
                </a>
            </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0 grid-margin stretch-card">
              <div class="card card-first-style">
                <div class="card-horizontal">
                  <div class="img-square-wrapper">
                    <img class="db-image" src="{{('Dashboard/images/ilustrasi/db-1.png')}}" alt="Card image cap">
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
                  <p class="font-weight-normal mb-2 text-muted">{{ $date }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-9 col-12">
              <div class="row">
                <div class="col-xl-4 flex-column d-flex grid-margin">
                  <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin">
                      <div class="card card-style">
                        <div class="card-body example-css-selector-2">
                          <h4 class="card-title">Your Project</h4>
                          <!-- p>there are no new projects</p> -->
                          <center><h4 class="mt-3 text-dark font-weight-bold mb-2" style="font-size: 55px;">{{ $countProject }}</h4></center>
                          <!-- <canvas id="customers"></canvas> -->
                        </div>
                      </div>
                    </div>
                    <!--  <div class="col-sm-12 stretch-card">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Orders</h4>
                              <p>6% decrease in earnings</p>
                              <h4 class="text-dark font-weight-bold mb-2">55,543</h4>
                              <canvas id="orders"></canvas>
                          </div>
                        </div>
                    </div> -->
                  </div>
                </div>
                <div class="col-xl-4 flex-column d-flex grid-margin four">
                  <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin">
                      <div class="card card-style">
                        <div class="card-body">
                          <h4 class="card-title">Invitation Project</h4>
                          <!-- <p>2 new invite projects</p> -->
                          <center><h4 class="mt-3 text-dark font-weight-bold mb-2" style="font-size: 55px;">{{ $countInvitationProject }}</h4></center>
                          <!--  <canvas id="customers"></canvas> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 flex-column d-flex grid-margin five">
                  <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin">
                      <div class="card card-style">
                        <div class="card-body">
                          <h4 class="card-title">Total Elements</h4>
                          <!-- <p>10 new elements</p> -->
                          <center><h4 class="mt-3 text-dark font-weight-bold mb-2" style="font-size: 55px;">0</h4></center>
                          <!--  <canvas id="customers"></canvas> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="font-weight-bold ml-1">What's News</div>
                </div>
                <div class="mt-3 col-xl-4 flex-column d-flex grid-margin">
                  <div class="row flex-grow">
                      <div class="col-sm-12 grid-margin">
                          <div class="card card-style-2">
                              <div class="card-image">
                                  <img class="card-img-top" src="{{('Dashboard/images/News/News 1.jpeg')}}">
                              </div>
                              <div class="card-body">
                                  <h4 class="card-title-style">Overthinking and UX Design Process with UX Design Element</h4>
                                  <div class="font-weight-normal mt-4 card-creator">Amanda Pedersen</div>
                                  <!-- <h4 class="card-text text-dark font-weight-bold mb-2">43,981</h4> -->
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="mt-3 col-xl-4 flex-column d-flex grid-margin">
                    <div class="row flex-grow">
                        <div class="col-sm-12 grid-margin">
                            <div class="card card-style-2">
                                <div class="card-image">
                                    <img class="card-img-top" src="{{('Dashboard/images/News/platforms.jpg')}}">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title-style">3 Practical Tips for Great User Interface and User Experience</h4>
                                    <div class="font-weight-normal mt-4 card-creator">Bill Siwicki</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-xl-4 flex-column d-flex grid-margin">
                    <div class="row flex-grow">
                        <div class="col-sm-12 grid-margin">
                            <div class="card card-style-2">
                                <div class="card-image">
                                    <img class="card-img-top" src="{{('Dashboard/images/News/3.png')}}">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title-style">How EHR vendors are redesigning UI and UX to battle stress</h4>
                                    <div class="font-weight-normal mt-4 card-creator">Bill Siwicki</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-12">
              <div class="card card-style">
                <div class="card-body">
                  <h4 class="card-title mb-3">Recent Activity</h4>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="text-dark">
                        <div class="d-flex pb-3 border-bottom justify-content-between">
                          <!-- <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div> -->
                          <div class="font-weight-bold mr-sm-4">
                            <div style="color: #A4013D;">Lean Canvas</div>
                            <div class="text-muted font-weight-bold mt-1">SHEUX</div>
                            <div class="text-muted font-weight-normal mt-1" style="font-size: 11px;">32 Minutes Ago</div>
                          </div>
                          <!-- <div><h6 class="font-weight-bold text-info ml-sm-2">$325</h6></div> -->
                        </div>
                        <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                          <!-- <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div> -->
                          <div class="font-weight-bold mr-sm-4">
                            <div style="color: #A4013D;">Customer Journey Map</div>
                            <div class="text-muted font-weight-bold mt-1">SHEUX</div>
                            <div class="text-muted font-weight-normal mt-1" style="font-size: 11px;">45 Minutes Ago</div>
                          </div>
                          <!-- <div><h6 class="font-weight-bold text-info ml-sm-2">$4987</h6></div> -->
                        </div>
                        <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                          <!-- <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div> -->
                          <div class="font-weight-bold mr-sm-4">
                            <div style="color: #A4013D;">User Persona</div>
                            <div class="text-muted font-weight-bold mt-1">BENJOL</div>
                            <div class="text-muted font-weight-normal mt-1" style="font-size: 11px;">1 Days Ago</div>
                          </div>
                          <!--  <div><h6 class="font-weight-bold text-info ml-sm-2">$5391</h6></div> -->
                        </div>
                        <div class="d-flex pb-3 pt-3 border-bottom justify-content-between">
                          <!--  <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div> -->
                          <div class="font-weight-bold mr-sm-4">
                            <div style="color: #A4013D;">Lean Canvas</div>
                            <div class="text-muted font-weight-bold mt-1">BENJOL</div>
                            <div class="text-muted font-weight-normal mt-1" style="font-size: 11px;">3 weeks Ago</div>
                          </div>
                          <!-- <div><h6 class="font-weight-bold text-info ml-sm-2">$264</h6></div> -->
                        </div>
                        <div class="d-flex pt-3 justify-content-between">
                          <!--  <div class="mr-3"><i class="mdi mdi-signal-cellular-outline icon-md"></i></div> -->
                          <div class="font-weight-bold mr-sm-4">
                            <div style="color: #A4013D;">Empathy Map</div>
                            <div class="text-muted font-weight-bold mt-1">ASSETNEST</div>
                            <div class="text-muted font-weight-normal mt-1" style="font-size: 11px;">3 weeks Ago</div>
                          </div>
                          <!-- <div><h6 class="font-weight-bold text-info ml-sm-2">$264</h6></div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Electronic Engineering Polytechnic Institute of Surabaya and Rasyid Institue</span>
           <!--  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span> -->
          </div>
        </footer>
    </div>
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
  <!-- Modal -->
  <div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
          <button type="button" class="close modal-times-position" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-mdal center">
            <form name="upload" method="post" action="{{ url('/change-profile', Auth::user()->id) }}" enctype="multipart/form-data" accept-charset="utf-8" onSubmit="return validate();">
              @csrf
              <div class="row">
                <div class="col-md-12 col-md-offset-3 center">
                  <div class="btn-container">
                    <!--the three icons: default, ok file (img), error file (not an img)-->
                    <h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
                    <h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
                    <h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
                    <!--this field changes dinamically displaying the filename we are trying to upload-->
                    <p id="namefile">Only pics allowed! (jpg,jpeg,bmp,png)</p>
                    <!--our custom btn which which stays under the actual one-->
                    <button type="button" id="btnup" class="btn btn-primary">Browse for your pic!</button>
                    <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                    <input type="file" value="" name="image" id="fileup">
                  </div>
                </div>
              </div>
                <!--additional fields-->
              <div class="row">
                <div class="col-md-12">
                  <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
                  <input type="submit" value="Submit!" class="btn btn-primary btn-lg" id="submitbtn">
                  <button type="button" class="btn btn-default btn-lg" disabled="disabled" id="fakebtn">Submit! <i class="fa fa-minus-circle"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  <!-- base:js -->
  <script src="{{('Dashboard/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{('Dashboard/js/off-canvas.js')}}"></script>
  <script src="{{('Dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{('Dashboard/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{('Dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{('Dashboard/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{('Dashboard/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
  <!-- <script type="text/javascript">
    window.tour = new Tour({
      padding: 0,
      nextText: 'More',
      doneText: 'Done',
      prevText: 'Less',
      tipClasses: 'tip-class active',
      steps: [
        {
          element: ".one",
          title: "Tourquoise",
          description: "This box is tourqoise!",
          position: "right"
        },
        {
          element: ".two",
          title: "Red",
          description: "Look how red this box is!",
          data: "Custom Data",
          position: "right"
        },
        {
          element: ".three",
          title: "Blue",
          description: "Almost too blue! Reminds of a default anchor tag.",
          position: "right"
        },
        {
          element: ".four",
          title: "Green",
          description: "Trees!",
          position: "right"
        },
        {
          element: ".five",
          title: "Purple",
          description: "Because there should probably be five of these.",
          position: "top"
        }
      ]
    })
    tour.override('showStep', function(self, step) {
      self(step);
    })

    tour.override('end', function(self, step) {
      self(step);
    })

    tour.start();
  </script> -->
  <script type="text/javascript">
    $('#fileup').change(function(){
    //here we take the file extension and set an array of valid extensions
        var res=$('#fileup').val();
        var arr = res.split("\\");
        var filename=arr.slice(-1)[0];
        filextension=filename.split(".");
        filext="."+filextension.slice(-1)[0];
        valid=[".jpg",".png",".jpeg",".bmp"];
        var file_size = $('#fileup')[0].files[0].size;
    //if file is not valid we show the error icon, the red alert, and hide the submit button
        if (valid.indexOf(filext.toLowerCase())==-1){
            $( ".imgupload" ).hide("slow");
            $( ".imgupload.ok" ).hide("slow");
            $( ".imgupload.stop" ).show("slow");

            $('#namefile').css({"color":"red","font-weight":700});
            $('#namefile').html("File "+filename+" is not  pic!");

            $( "#submitbtn" ).hide();
            $( "#fakebtn" ).show();
        }else{
            //if file is valid we show the green alert and show the valid submit
            if (file_size > 2097152) {
              $('#namefile').css({"color":"red","font-weight":700});
              $('#namefile').html("File size is greater than 2MB. Please choose other images");
            } else {
              $( ".imgupload" ).hide("slow");
              $( ".imgupload.stop" ).hide("slow");
              $( ".imgupload.ok" ).show("slow");

              $('#namefile').css({"color":"green","font-weight":700});
              $('#namefile').html(filename);

              $( "#submitbtn" ).show();
              $( "#fakebtn" ).hide();
              // $( "#btnup" ).hide();
            }
        }
    });
  </script>
  <script type="text/javascript">
    function validate() {
      $("#file_error").html("");
      $(".demoInputBox").css("border-color","#F0F0F0");
      var file_size = $('#file')[0].files[0].size;
      if(file_size>2097152) {
        $("#file_error").html("File size is greater than 2MB");
        $(".demoInputBox").css("border-color","#FF0000");
        return false;
      }
      return true;
    }
  </script>
</body>

</html>
