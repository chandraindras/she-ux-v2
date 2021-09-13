<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SheUX</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{('Dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{('Dashboard/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{('Dashboard/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{('Dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}"/>
  <link rel="stylesheet" href="{{('Dashboard/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{('Dashboard/vendors/jquery-bar-rating/fontawesome-stars-o.css')}}">
  <link rel="stylesheet" href="{{('Dashboard/vendors/jquery-bar-rating/fontawesome-stars.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{('Dashboard/css/style.css')}}">
  <link rel="stylesheet" href="{{('Dashboard/css/upload-image.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{('Dashboard/images/favicon.png')}}" />
  <link rel="stylesheet" href="{{('node_modules/node_modules/shepherd.js/dist/css/shepherd.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
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
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile two">
          <div class="user-image">
            @php
              if (Auth::user()->image === NULL) {
            @endphp
              <img src="{{('modalDocument/no-avatar (3).png')}}">
              <button type="button" class="btn-image" data-toggle="modal" data-target="#exampleModal">
                <img src="{{('modalDocument/edit-avatar.svg')}}" style="width: 25px;height: 25px;">
              </button>
            @php
              } else {
            @endphp
              <img src="{{asset('uploads/profile_picture/' . Auth::user()->image)}}">
              <button type="button" class="btn-image" data-toggle="modal" data-target="#exampleModal">
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
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="">
            <div class="row">
              <div class="col-lg-12">
                <div>
                  <span style="font-size: 24px; font-weight: bold; color: #7353C4;">Documentation</span><br>
                  
                </div>
                <div class="mt-2">
                  <span style="font-size: 14px;">Welcome to SheUX ! Get familiar with our product and explore the feature we provide :</span>
                </div>
<!--                 <div class="mt-3">
                  <span style="font-size: 18px; font-weight: 600; color: #2B2828;">Strategy</span>
                </div> -->
              </div>
            </div>
          </div>
          <div class="mt-5">
            <div class="row">
                <div class="col-xl-3 flex-column d-flex grid-margin">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body example-css-selector-2">
                          <img src="{{ asset('modalDocument/Documentation/Lean.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Lean Canvas</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Business plan template that helps you deconstruct your idea into its key assumptions</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin four">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/swot.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">SWOT</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Strategic planning technique used to help organization analyzed competitor</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/comparison.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Comparison Matrix</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Strategy to identify major competitors and research their products</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/project-statement.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Project Statement</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">A statement of the scope, objectives, and participants in a project</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="row">
                <div class="col-xl-3 flex-column d-flex grid-margin">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body example-css-selector-2">
                          <img src="{{ asset('modalDocument/Documentation/persona.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">User Persona</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">A semi-fictional character created to represent different customer types</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin four">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/empathy 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Empathy Map</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">A collaborative visualization used to articulate what we know about a particular</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/destination 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Customer Journey Map</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">A visual story of customers' interactions with a product
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">User Story</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">General explanation of a software feature written from the perspective of customer </span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Idea Generation</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">The process of creating, developing, and communicating ideas which are abstract</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Affinity Diagram</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Tool that gathers large amounts of language data (ideas, opinions, issues)</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Prioritization Matrix</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Useful technique to identify which problems are the most important to work on solving first</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">User Flow</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">The path taken by a prototypical user on a website or app to complete a task.</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 flex-column d-flex grid-margin five">
                <div class="row flex-grow">
                  <div class="col-sm-12 grid-margin">
                      <div class="card card-style" style="height: 190px;">
                        <div class="card-body">
                          <img src="{{ asset('modalDocument/Documentation/story 1.svg') }}">
                            <div class="mt-3">
                              <span style="font-size: 16px; color: #4C12AB; font-weight: bold;">Sitemap</span>
                            </div>
                            <div class="mt-2">
                              <span style="font-size: 14px;">Hierarchical diagram of a website or application, that shows how pages are prioritized</span>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Electronic Engineering Polytechnic Institute of Surabaya and Rasyid Institue</span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <script src="{{('Dashboard/vendors/base/vendor.bundle.base.js')}}"></script>
  <script src="{{('Dashboard/js/off-canvas.js')}}"></script>
  <script src="{{('Dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{('Dashboard/js/template.js')}}"></script>
  <script src="{{('Dashboard/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{('Dashboard/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <script src="{{('Dashboard/js/dashboard.js')}}"></script>
</body>

</html>
