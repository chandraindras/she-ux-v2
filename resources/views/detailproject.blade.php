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
   <link rel="stylesheet" href="{{ asset('Dashboard/css/style2.css') }}">
   <link rel="stylesheet" href="{{ asset('Dashboard/modal/style.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('DataTable/datatables.min.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</head>

<body>
  @include('sweetalert::alert')
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <div class="">
          <a class="navbar-brand brand-logo" href="{{ url('/home') }}"><img src="{{asset('modalDocument/no-logo.svg')}}" alt="logo"/></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="Dashboard/images/logo-mini.svg" alt="logo"/></a> -->
        </div>
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
            <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModal">+ Create Document</button>
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
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0 grid-margin">
              <div class="card card-first-style">
                <div class="card-horizontal">
                  <div class="img-square-wrapper">
                    <img class="db-image-2" src="{{asset('Dashboard/images/ilustrasi/detail-element.svg')}}" alt="Card image cap">
                  </div>
                  <div class="">
                    <table id="table-detail-project" class="table" style="margin-left: 5.5rem; margin-top: 1rem;">
                      <thead>
                        @foreach ($dataProject as $project)
                        <tr>
                          <th width="200px">
                            <center>
                              <span  class="thead-detail-component">Project Name</span>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditProject-{{$project->id}}" >
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                            </center>
                          </th>
                          <th width="200px">
                            <center>
                              <span class="thead-detail-component">Description</span>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditProject-{{$project->id}}" >
                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                            </center>
                          </th>
                          <th width="200px">
                            <center>
                              <span class="thead-detail-component">Created at</span>
                            </center>
                          </th>
                          <th>
                            <center>
                              <span class="thead-detail-component">Members</span>
                            </center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th align="text-center">
                            <center>
                              <span class="tbody-detail-component" style="margin-left: -20%;">{{ $project->project_name }}</span>
                            </center>
                          </th>
                          <th align="text-center">
                            <center>
                              <span class="tbody-detail-component">{{ $project->project_desc }}</span>
                            </center>
                          </th>
                          <th>
                            <center>
                              <span class="tbody-detail-component">{{ $project->created_at }}</span>
                            </center>
                          </th>
                          <th>
                            <center>
                              <span class="tbody-detail-component">Not Ready !</span>
                            </center>
                          </th>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if(session()->has('error'))
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <span class="alert-style">
                    {{ session()->get('error') }}
                  </span>
              </div>
          @endif
          <div class="row mt-4">
            <div class="col-sm-12 mb-4 mb-xl-0 grid-margin stretch-card">
              <div class="card card-second-style">
                <div class="card-body">
                  <div class="tabs menu">
                    <input type="radio" name="tabs" id="tabone" checked="checked">
                    <label class="ml-3" for="tabone">Comparison Matrix</label>
                    <div class="tab mt-3">
                      @php
                        $cekJumlahComparison = 1;
                        if ($cekJumlahComparison === 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any comparison matrix</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-detail-element">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataComparison as $comparison)
                          @php
                            $i = 0;
                            if ($i == 0){
                          @endphp
                          <tr>
                            <td>
                              <span><a href="{{ url('/detail-project/comparison-matrix/index', $comparison->id_project) }}" class="table-document-name">{{ $comparison->comparison_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $comparison->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditComparison-{{$comparison->id_comparison}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/comparison/destroy', $comparison->id_project) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @php
                            }
                            $i = $i + 1;
                          @endphp
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
                    </div>

                    <input type="radio" name="tabs" id="tabtwo">
                    <label class="ml-3" for="tabtwo">SWOT</label>
                    <div class="tab mt-3">
                      @php
                        if ($cekJumlahSwot == 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any SWOT</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-element-swot">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataSwot as $swot)
                          <tr>
                            <!-- <input type="hidden" class="serdelete_val_id" value="{{ $swot->id_swot }}"> -->
                            <td>
                              <span><a href="{{ url('/detail-project/swot/index', $swot->id_swot) }}" class="table-document-name">{{ $swot->swot_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $swot->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditModal-{{$swot->id_swot}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/swot/destroy', $swot->id_swot) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
                    </div>
                    <input type="radio" name="tabs" id="tabthree">
                    <label class="ml-3" for="tabthree">Lean Canvas</label>
                    <div class="tab mt-3">
                      @php
                        if ($cekJumlahLean === 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any Lean Canvas</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-element-lean">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataLean as $lean)
                          <tr>
                            <input type="hidden" class="serdelete_val_id" value="{{ $lean->id_lean }}">
                            <td>
                              <span><a href="{{ url('/detail-project/lean-canvas/index', $lean->id_lean) }}" class="table-document-name">{{ $lean->lean_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $lean->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditLean-{{$lean->id_lean}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/lean/destroy', $swot->id_swot) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
                    </div>

                    <input type="radio" name="tabs" id="tabfour">
                    <label class="ml-3" for="tabfour">Project Statement</label>
                    <div class="tab mt-3">
                      @php
                        if ($cekJumlahPStatement === 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any Project Statement</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-element-projectstatement">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataProjectStatement as $projectStatement)
                          <tr>
                            <input type="hidden" class="serdelete_val_id" value="{{ $projectStatement->id_project_statement }}">
                            <td>
                              <span><a href="{{ url('/detail-project/project-statement-update/index', $projectStatement->id_project_statement) }}" class="table-document-name">{{ $projectStatement->project_statement_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $projectStatement->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditPstatement-{{$projectStatement->id_project_statement}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/pstatement/destroy', $projectStatement->id_project_statement) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
                    </div>

                    <input type="radio" name="tabs" id="tabfive">
                    <label class="ml-3" for="tabfive">User Persona</label>
                    <div class="tab mt-3">
                      @php
                        if ($cekJumlahPersona === 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any User Persona</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-element-persona">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataPersona as $persona)
                          <tr>
                            <input type="hidden" class="serdelete_val_id" value="{{ $persona->id_persona }}">
                            <td>
                              <span><a href="{{ url('/detail-project/user-persona-update/index', $persona->id_persona) }}" class="table-document-name">{{ $persona->persona_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $persona->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditPersona-{{$persona->id_persona}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/persona/destroy', $persona->id_persona) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
                    </div>

                    <input type="radio" name="tabs" id="tabeight">
                    <label class="ml-3" for="tabeight">User Story</label>
                    <div class="tab mt-3">
                      @php
                        if ($cekJumlahStory === 0) {
                      @endphp
                      <center>
                        <img class="" src="{{asset('Dashboard/images/ilustrasi/no-element.svg')}}" alt="Card image cap">
                        <div class="no-document-title mt-3">
                          <span>You don't have any User Story</span>
                        </div>
                        <div class="no-project-sub">
                          <span><a type="button" style="color: #4C12AB;" data-toggle="modal" data-target="#exampleModal" >Click here</a> to create one or the violet button on the nav bar </span>
                        </div>
                      </center>
                      @php
                        } else {
                      @endphp
                      <table class="table" id="table-element-userstory">
                        <thead>
                          <tr>
                            <th class="thead-table-document">Name</th>
                            <th class="thead-table-document">Created by</th>
                            <th class="thead-table-document">Created at</th>
                            <th class="thead-table-document">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dataStory as $story)
                          @php
                            $i = 0;
                            if ($i == 0){
                          @endphp
                          <tr>
                            <input type="hidden" class="serdelete_val_id" value="{{ $story->id_project }}">
                            <td>
                              <span><a href="{{ url('/detail-project/userStory/index/'. $story->id_project.'/'.$story->id_story) }}" class="table-document-name">{{ $story->story_name }}</a></span>
                            </td>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $story->created_at }}</td>
                            <td>
                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditStory-{{$story->id_story}}" >
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                              </a>
                              <a type="button" href="{{ url('/story/destroy', $story->id_project) }}" class=" color-primary ml-3">
                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                              </a>
                            </td>
                          </tr>
                          @php
                            }
                          @endphp
                          @endforeach
                        </tbody>
                      </table>
                      @php
                        }
                      @endphp
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
  <!-- MODAL ADD NEW DOCUMENT -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="">
        <div class="modal-header">
          <h5 class="modal-title modal-title-projec" id="exampleModalLabel">Create Document</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="tab-modal">
                  <button class="tablinks" onclick="openCity(event, 'swot')" id="defaultOpen">SWOT</button>
                  <button class="tablinks" onclick="openCity(event, 'comparisonMatrix')">Comparison Matrix</button>
                  <button class="tablinks" onclick="openCity(event, 'leanCanvas')">Lean Canvas</button>
                  <button class="tablinks" onclick="openCity(event, 'projectStatement')">Project Statement</button>
                  <button class="tablinks" onclick="openCity(event, 'persona')">User Persona</button>
                  <!-- <button class="tablinks" onclick="openCity(event, 'journeyMap')">Customer Journey Map</button>
                  <button class="tablinks" onclick="openCity(event, 'empathyMap')">Empathy Map</button> -->
                  <button class="tablinks" onclick="openCity(event, 'userStory')">User Story</button>
                </div>
                <div id="swot" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createSwot" method="POST" action="{{ url('/detail-project/swot/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your SWOT</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="swot_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/SWOT.svg')}}" alt="SWOT">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is SWOT ?</span><br>
                      <span class="document-description-body mt-1">SWOT is a business strategy building tool that is divided into 4 parts, consists of strengths, weaknesses that come from within your business and opportunities, threats that come from outside of your business.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is SWOT important ?</span><br>
                      <span class="document-description-body">SWOT is able to produce a strong business strategy to achieve goals, helps you determine which priorities should come first and know how competitive is in today's market.</span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                    <div class="btn-preview-document">
                        <div>
                            <a href="{{route('preview.swot')}}"  class="btn-create-document" role="button">Preview </a>
                        </div>
                    </div>
                  </form>
                  @endforeach
                </div>

                <div id="comparisonMatrix" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createComparison" method="POST" action="{{ url('/detail-project/comparison-matrix/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Comparison Matrix</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="comparison_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/comparison-matrix-2.jpg')}}" alt="SWOT">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is Comparison Matrix ?</span><br>
                      <span class="document-description-body mt-1">Comparison matrix is a matrix used to analyze the comparison of product features with competitors. This matrix is in the form of a table with columns as a list of competitors and rows as a list of features.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is Comparison Matrix important ?</span><br>
                      <span class="document-description-body">Every year the number of products launched is increasing, this causes competition in the global market to also increase. Comparison matrix aims to find out what the weaknesses of other products are or what they don't have. This can be an opportunity for us to be able to improve product quality.</span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                      <div class="btn-preview-document">
                          <div>
                              <a href="{{route('preview.comparison-matrix')}}"  class="btn-create-document" role="button">Preview </a>
                          </div>
                      </div>
                  </form>
                  @endforeach
                </div>

                <div id="leanCanvas" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createLean" method="POST" action="{{ url('/detail-project/lean-canvas/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Lean Canvas</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="lean_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/lean-canvas.png')}}" alt="SWOT">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is Lean Canvas ?</span><br>
                      <span class="document-description-body mt-1">Ash Maurya's one-page business plan method, adapted from Alexander Osterwalder's Business Model Canvas. Features a number of blocks to help you map out some key points that will help you turn your business idea into something more concrete.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is Lean Canvas important ?</span><br>
                      <span class="document-description-body">With lean canvas, we can focus on identifying problems and solutions. Lean canvas is specially designed for beginners who are just starting a business so that it can help them to map out ideas and focus on their goals to be achieved.</span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createLean">Create</button>
                    </div>
                      <div class="btn-preview-document">
                          <div>
                              <a href="{{route('preview.lean-canvas')}}"  class="btn-create-document" role="button">Preview </a>
                          </div>
                      </div>
                  </form>
                  @endforeach
                </div>

                <div id="projectStatement" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createSwot" method="POST" action="{{ url('/detail-project/project-statement/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Project Statement</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="project_statement_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/project-statement.png')}}" alt="SWOT">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is Project Statement</span><br>
                      <span class="document-description-body mt-1">Project statement or project scope statement is a short and simple description of a feature that is told from the user's point of view. User Story acts as an articulation of how a product will provide certain value to customers.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is Project Statement important ?</span><br>
                      <span class="document-description-body">
                        The product owner takes primary responsibility for writing user stories and organizing them on the product backlog. In reality, though, this is a shared responsibility among the entire cross-functional product team. The reasons they are written in plain language — free of any development jargon or technical detail — is that this allows anyone on either the business or the technical side of the team to contribute a user story for consideration. That team member (product manager, UX designer, etc.) only needs to have an understanding of the specific user-persona problem they are hoping to solve. They do not need to know how the development team will actually code that solution.
                    </span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                      <div class="btn-preview-document">
                          <div>
                              <a href="{{route('preview.project-statement')}}"  class="btn-create-document" role="button">Preview </a>
                          </div>
                      </div>
                  </form>
                  @endforeach
                </div>

                <div id="persona" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createPersona" method="POST" action="{{ url('/detail-project/user-persona/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Persona</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="persona_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/user-persona.jpeg')}}" alt="User Persona">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is User Persona ?</span><br>
                      <span class="document-description-body mt-1">User persona is a fictional character that can represent the type, needs, and desires of the ideal user.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is User Persona important ?</span><br>
                      <span class="document-description-body">
                        To build a product that matches user expectations, designers need to understand their users, know what they want so that the product built has a good user experience. Persona also helps to decide what features to develop.
                    </span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                      <div class="btn-preview-document">
                          <div>
                              <a href="{{route('preview.user-persona')}}"  class="btn-create-document" role="button">Preview </a>
                          </div>
                      </div>
                  </form>
                  @endforeach
                </div>

                <!-- <div id="journeyMap" class="tabcontent">
                   @foreach ($dataProject as $data)
                  <form id="createJourney" method="POST" action="{{ url('/detail-project/journey-map/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Journey Map</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="journey_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/journey-map.jpg')}}" alt="Journey Map">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">Description</span><br>
                      <span class="document-description-body mt-1">Customer journey map is a visual representation that describes all the experiences that consumers experience during their journey using products or services.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why Journey Map important ?</span><br>
                      <span class="document-description-body">
                         Customer journey map will be very helpful in understanding the user's context. This makes designers more aware of the big picture of the user's background and what they are looking for in the products the business has to offer.
                    </span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                  </form>
                  @endforeach
                </div>

                <div id="empathyMap" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createEmpathy" method="POST" action="{{ url('/detail-project/empathy/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your Empathy</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="empathy_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/empathy-mao.webp')}}" alt="Empathy Map">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">Description</span><br>
                      <span class="document-description-body mt-1">Empathy Map is a tool to identify target users so that business strategies and business values can be aligned with user wants and needs.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why Empathy Map important ?</span><br>
                      <span class="document-description-body">
                        Empathy maps can help clarify the results of user interviews or other research so that users' wants and needs can be understood. Empathy maps can also help the marketing division understand users.
                    </span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                  </form>
                  @endforeach
                </div> -->

                <div id="userStory" class="tabcontent">
                  @foreach ($dataProject as $data)
                  <form id="createSwot" method="POST" action="{{ url('/detail-project/userStory/create', $data->id) }}">
                    @csrf
                    <div class="mt-1">
                      <span class="modal-document-title">Name Your User Story</span>
                    </div>
                    <input class="modal-document-input mt-3 mb-4" type="text" name="story_name" placeholder="Make it an informative name">
                    <center>
                      <img class="tabcontent-img" src="{{asset('modalDocument/user-story-1.png')}}" alt="SWOT">
                    </center>
                    <div class="mt-4 mb-3" style="text-align: justify;">
                      <span class="document-description-title">What is User Story</span><br>
                      <span class="document-description-body mt-1">User story is a short and simple description of a feature that is told from the user's point of view. User Story acts as an articulation of how a product will provide certain value to customers.</span>
                    </div>
                    <div class="" style="text-align: justify;">
                      <span class="document-description-title">Why is User Story important ?</span><br>
                      <span class="document-description-body">
                        The product owner takes primary responsibility for writing user stories and organizing them on the product backlog. In reality, though, this is a shared responsibility among the entire cross-functional product team. The reasons they are written in plain language — free of any development jargon or technical detail — is that this allows anyone on either the business or the technical side of the team to contribute a user story for consideration. That team member (product manager, UX designer, etc.) only needs to have an understanding of the specific user-persona problem they are hoping to solve. They do not need to know how the development team will actually code that solution.
                    </span>
                    </div>
                    <div class="mt-3">
                      <button type="submit" value="submit" class="btn-create-document" for="createSwot">Create</button>
                    </div>
                      <div class="btn-preview-document">
                          <div>
                              <a href="{{route('preview.user-story')}}"  class="btn-create-document" role="button">Preview </a>
                          </div>
                      </div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL ADD NEW DOCUMENT -->
  <!-- MODAL EDIT NEW DOCUMENT -->
  @foreach ($dataSwot as $data)
  <div class="modal fade" id="EditModal-{{ $data->id_swot }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/swot', $data->id_swot) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="swot_name" name="swot_name" value="{{ $data->swot_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditLean-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/lean', $data->id_lean) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="lean_name" name="lean_name" value="{{ $data->lean_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataProjectStatement as $data)
  <div class="modal fade" id="EditPstatement-{{ $data->id_project_statement }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/pstatement', $data->id_project_statement) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="project_statement_name" name="project_statement_name" value="{{ $data->project_statement_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataPersona as $data)
  <div class="modal fade" id="EditPersona-{{ $data->id_persona }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/persona', $data->id_persona) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="persona_name" name="persona_name" value="{{ $data->persona_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataComparison as $data)
  <div class="modal fade" id="EditComparison-{{ $data->id_comparison }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/comparison', $data->id_comparison) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="comparison_name" name="comparison_name" value="{{ $data->comparison_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataStory as $data)
  <div class="modal fade" id="EditStory-{{ $data->id_story }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{url('/detail-project/story', $data->id_story) }}">
           @csrf
          <div class="modal-body">
            <input type="text" class="form-control" id="story_name" name="story_name" value="{{ $data->story_name }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-none" data-dismiss="modal">Close</button>
            <button type="submit" value="submit" class="btn-create">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($dataProject as $data)
  <!-- modal-EDIT-project -->
  <div class="modal fade" id="EditProject-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="  border-radius: 20px;">
        <div class="modal-header">
          <h5 class="modal-title modal-title-projec" id="exampleModalLabel">Update Project Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createProject" method="POST" action="{{ url('/project/update', $data->id) }}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Project Name</label>
              <input type="text" class="form-control" id="project-name" value="{{ $data->project_name }}" name="project_name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Project Description</label>
              <input class="form-control" id="description-text" value="{{ $data->project_desc }}" name="project_desc">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
          <button type="submit" value="submit" for="createProject" class="btn-create">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end-modal-EDIT-project -->
  @endforeach
  <!-- container-scroller -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('DataTable/datatables.min.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script type="text/javascript">
    $('#table-detail-element').DataTable({info: false, searching: false, paging: true});
    $('#table-element-swot').DataTable({info: false, searching: false, paging: true});
    $('#table-element-lean').DataTable({info: false, searching: false, paging: true});
    $('#table-element-projectstatement').DataTable({info: false, searching: false, paging: true});
    $('#table-element-persona').DataTable({info: false, searching: false, paging: true});
    $('#table-element-journeymap').DataTable({info: false, searching: false, paging: true});
    $('#table-element-empathymap').DataTable({info: false, searching: false, paging: true});
    $('#table-element-userstory').DataTable({info: false, searching: false, paging: true});
  </script>
  <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
     <script>
         $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.servideletebtn').click(function (e) {
                e.preventDefault();

                var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
                //alert(delete_id);
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this Data!"+delete_id,
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": delete_id,
                    };

                    $.ajax({
                        type: "DELETE",
                        url: "/detail-project/swot/destroy/"+delete_id,
                        data: data,
                        success: function(response) {
                            swal(response.status, {
                                  icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });
                  }
                });
            })
        })
    </script>
</body>
</html>
