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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/style3.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip2.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/css/lean-canvas.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css') }}">
  <link href="{{asset('tiny-tour-master/dist/tour.min.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('tiny-tour-master/dist/tour.min.js')}}" rel="stylesheet" type="text/javascript"></script>
</head>

<body style="  background: #f4f7fa;">
  @include('sweetalert::alert')
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mt-3">
            <div class="col-md-12 mt-6 grid-margin stretch-card">
              <div class="card card-swot" style="margin-left: 1.5rem;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-nav">
                      <div class="wrapper-nav stretch-nav">
                        <div class="ml-3" style="margin-top: 15px;">
                          @foreach ($dataLean as $lean)
                          <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                          <img class="ml-2 left-icon" src="{{asset('modalDocument/right.svg')}}">
                            @foreach ($projectName as $project_name)
                            <span class="ml-1"><a href="{{ url('/detail-project', $project_name->id) }}" style="text-decoration: none;" class="nav-title">{{ $project_name->project_name }}</a></span>
                          <img class="ml-2 ml-1 left-icon" src="{{asset('modalDocument/right.svg')}}">
                          <span class="nav-document-name ml-1">{{ $lean->lean_name }}</span>
                          <img class="ml-2 left-icon" src="{{asset('modalDocument/right.svg')}}">
                          <img class="ml-2 mb-1 three" src="{{asset('modalDocument/export.svg')}}">
                          <a type="button" data-toggle="modal" data-target="#inviteMember-{{$project_name->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left: -1rem;" >
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="col-lg-2 grid-margin stretch-card">
                      <div class="card" style="background-color: #6535B4;  min-height: 20.5rem; border-radius: 10px 10px 0px 0px;">
                        <div class="ml-4 mt-4 call-tooltip bottom">
                            <span class="title step" id="step3" data-tip="Write down the top problem that the user wanted to solve or was having. Only 3 problems with the highest priority are listed. Problems can be found with the 5W + 1H method.">PROBLEM</span>
                            <!-- <div class="call-tooltip bottom">
                                  <p> Bottom </p> -->
                                  <div class="tooltip" style="width: 340px; height: 250px; z-index: 1;">
                                    <br>
                                      <span style="text-align: justify-all; font-size: 14px;">Write down the top problem that the user wanted to solve or was having. Only 3 problems with the highest priority are listed. Problems can be found with the 5W + 1H method.</span>
                                    <br><br>
                                    <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                                    <ul class="mt-1">
                                      <li>Difficult to find transportation</li>
                                      <li>Never know who the drier is and if it's safe</li>
                                      <li>Many transportation don't accept e-money</li>
                                    </ul>
                                  </div>
                          <img class="img-position" src="{{asset('modalDocument/Lean Canvas/problem.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">List your top 1 - 3 problems</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-problem', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="problem" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $problem = explode('+', $data->problem);
                                  @endphp
                                  @foreach ($problem as $key => $arrayProblem)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayProblem }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditProblem-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-problem/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2">
                      <div class="card" style="background-color: #E46F39;  min-height: 20rem; border-radius: 10px;">
                        <div class="ml-4 mt-4 call-tooltip bottom" >
                          <span class="title step" id="step4" data-tip="">SOLUTION</span>                          
                          <div class="tooltip" style="width: 320px; height: 300px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;"><!-- <i class="fas fa-hand-point-right"></i>  -->Solutions are answers to predefined problems. If the mentioned problems are 2, then the solution must also be 2. The problem and solution must have the same number.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Guaranteed pick up through an app tracking your location</li>
                              <li>Never know who the drier is and if it's safe</li>
                              <li>Pay a dair praice from the app, automatically</li>
                            </ul>
                          </div>
                          <img class="img-position" src="{{asset('modalDocument/Lean Canvas/solution.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">List your top 1 - 3 solutions</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-solution', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="solution" placeholder="type here">
                            <button type="submit" class="icon "><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $solution = explode('+', $data->solution);
                                  @endphp
                                  @foreach ($solution as $key => $arraySolution)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arraySolution }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditSolution-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-solution/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2">
                      <div class="card" style="background-color: #4FA672;  min-height: 20.5rem; border-radius: 10px 10px 0px 0px;">
                        <div class="ml-4 mt-4 call-tooltip bottom">
                          <span class="title step two" id="step5" data-tip="">UNIQUE VALUE PREPOSITION</span>
                          <div class="tooltip" style="width: 340px; height: 200px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;"><!-- <i class="fas fa-hand-point-right"></i>  -->The values that will be conveyed through the product. This value is the reason why users must use your product. Value is usually in just one catchy word.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Simplicity</li>
                              <li>Safety</li>
                              <li>Trust</li>
                            </ul>
                          </div>
                          <img class="img-position img-value" src="{{asset('modalDocument/Lean Canvas/value.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">Single, clear, compelling message that states why you are different and worth paying attention</span>
                        </div>
                        <div class="ml-4 mt-3 container-form one">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-value-preposition', $lean->id_lean) }}">
                            @csrf
                            <input type="text" class="" id="input" name="unique_value" placeholder="type here">
                            <button type="submit" class="icon "><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $uvp = explode('+', $data->unique_value);
                                  @endphp
                                  @foreach ($uvp as $key => $arrayValue)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayValue }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditUvp-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-uvp/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2">
                      <div class="card" style="background-color: #7EC239; border-radius: 10px;  min-height: 20rem;">
                        <div class="ml-4 mt-4 call-tooltip bottom">
                          <span class="title step" data-tip="">UNFAIR ADVANTAGE</span>
                          <div class="tooltip" style="width: 340px; height: 200px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;"><!-- <i class="fas fa-hand-point-right"></i>  -->Unfair Advantage is everything that competitors cannot replicate. This could be inside information, dream team, getting expert support, existing customers, using their own framework etc.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>100k drivers already active</li>
                              <li>Already collaborate with some company</li>
                            </ul>
                          </div>
                          <img class="img-position img-unfair" src="{{asset('modalDocument/Lean Canvas/channel.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">Something that can not easily be bougth or copied</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/unfair-advantage', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="unfair_advantage" placeholder="type here">
                            <button type="submit" class="icon "><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $advantage = explode('+', $data->unfair_advantage);
                                  @endphp
                                  @foreach ($advantage as $key => $arrayAdvantage)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayAdvantage }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditUnfairAdvantage-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-unfair-advantage/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2">
                      <div class="card" style="background-color: #2A7CAA;  min-height: 20.5rem; border-radius: 10px 10px 0px 0px;">
                        <div class="ml-4 mt-4 call-tooltip bottom">
                          <span class="title step" id="step1">CUSTOMER</span>
                          <br><span class="title" >SEGEMENT</span>
                          <div class="tooltip" style="width: 300px; height: 260px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;"><!-- <i class="fas fa-hand-point-right"></i>  -->Customer Segment is the target user to be targeted. Usually, the target is a group of people who have the same demographics as students, accountants, teachers, etc.</span>
                            <br><br>
                            <span style="font-weight: bold;">How to Write Customer Segment -></span> <span> Nationality: Occupation (Age range)</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Indonesia : Employee (24 - 50 yo)</li>
                              <li>Australian : Tourist (18 - 50 yo)</li>
                            </ul>
                          </div>
                          <img class="img-position img-user" src="{{asset('modalDocument/Lean Canvas/user.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">List your target customer or user</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-customer', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="customer_segment" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $customerSegment = explode('+', $data->customer_segment);
                                  @endphp
                                  @foreach ($customerSegment as $key => $arrayCustomerSegment)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayCustomerSegment }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditCustomerSegment-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-customer/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left: -1rem;">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="col-lg-2 grid-margin stretch-card" style="margin-top: -2rem;">
                      <div class="card" style="background-color: #6535B4;  min-height: 20.5rem; border-radius: 0px 0px 10px 10px;">
                        <div class="ml-4 mt-6 call-tooltip top">
                          <span class=" title step" id="step4" data-tip="">EXISTING ALTERNATIVE</span>
                          <div class="tooltip" style="width: 300px; height: 200px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;">Existing Alternative is a solution that is currently available, it can be an existing application or an existing manual method (books, etc.)</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Gojek</li>
                              <li>Grab</li>
                            </ul>
                          </div>
                          <br><span class="sub-title" style="position: relative; top: 0.5rem;">List how these problems are solved today</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-existing', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="existing_alternative" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $alternative = explode('+', $data->existing_alternative);
                                  @endphp
                                  @foreach ($alternative as $key => $arrayExistingAlternative)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayExistingAlternative }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditExistingAlternatives-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-existing/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2" style="margin-top: -1rem;">
                      <div class="card" style="background-color: #F9A01A; min-height: 20rem; border-radius: 10px;">
                        <div class="ml-4 mt-4 call-tooltip top">
                          <span class="title step" >KEY METRICS</span>
                          <div class="tooltip" style="width: 300px; height: 250px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;">Metrics are used to monitor performance or can be referred to as parameters of the success of a product. Parameters are usually in the form of activities aimed at helping business development.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Time from hail to pickup</li>
                              <li>Price paid</li>
                              <li>Rating received</li>
                            </ul>
                          </div>
                          <img class="img-position img-key-metric" src="{{asset('modalDocument/Lean Canvas/key metric.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">List the key numbers that tell you how your business is doing</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-key-metric', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="key_metric" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $keyMetric = explode('+', $data->key_metric);
                                  @endphp
                                  @foreach ($keyMetric as $key => $arrayKeyMetric)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayKeyMetric }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditKeyMetric-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-key-metric/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2" style="margin-top: -2rem;">
                      <div class="card" style="background-color: #4FA672;  min-height: 20.5rem; border-radius: 0px 0px 10px 10px;">
                        <div class="ml-4 mt-6 call-tooltip top">
                          <span class="title step">HIGH LEVEL CONCEPT</span>
                          <div class="tooltip" style="width: 300px; height: 200px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;">High level concept is a simple way of defining a product by comparing other products. Another product is better to have almost the same level of similarity to the product to be made.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Cheaper and safer taxi</li>
                            </ul>
                          </div>
                          <br><span class="sub-title" style="position: relative; top: 0.5rem;">List your X for Y analogy</span><br><span class="sub-title" style="position: relative; top: 0.5rem;"> e.g YouTube = Flickr for videos</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-high-level-concept', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="high_level_concept" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $hlc = explode('+', $data->high_level_concept);
                                  @endphp
                                  @foreach ($hlc as $key => $arrayHLC)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayHLC }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditHlc-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-hlc/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2" style="margin-top: -1rem;">
                      <div class="card" style="background-color: #00B9A9; border-radius: 10px; min-height: 20rem;">
                        <div class="ml-4 mt-4 call-tooltip top">
                          <span class="title step" id="step5">CHANNELS</span>
                          <div class="tooltip" style="width: 300px; height: 240px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;">Channels are any means chosen to promote products to customers. Better to focus on the easiest way and can be realized in the near future.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Outdoor adverts</li>
                              <li>Referral - invite friends and get discount</li>
                              <li>Expo</li>
                            </ul>
                          </div>
                          <img class="img-position img-channel" src="{{asset('modalDocument/Lean Canvas/unfair advantage.svg')}}" alt="Card image cap">
                          <br><span class="sub-title">List your path to customers (inbound or outbound)</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-channel', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="channel" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $channel = explode('+', $data->channel);
                                  @endphp
                                  @foreach ($channel as $key => $arrayChannel)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayChannel }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditChannel-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-channel/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card ml-2" style="margin-top: -2rem;">
                      <div class="card" style="background-color: #2A7CAA; min-height: 20rem; border-radius: 0px 0px 10px 10px;">
                        <div class="ml-4 mt-6 call-tooltip top">
                          <span class="title step" id="step2" >EARLY ADOPTER</span>
                          <div class="tooltip" style="width: 300px; height: 200px; z-index: 1;">
                            <br>
                            <span style="text-align: justify-all; font-size: 14px;">Early adopters are a group of people who will try a product for the first time. Early adopters are obtained from 'Customer Segments' which have been defined and made more specific.</span>
                            <br><br>
                            <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                            <ul class="mt-1">
                              <li>Employee at Maulidan Games</li>
                              <li>Employee at EEPIS</li>
                            </ul>
                          </div>
                          <br><span class="sub-title" style="position: relative; top: 0.5rem;">List the chareacteristic of your ideal type of customers</span>
                        </div>
                        <div class="ml-4 mt-3 container-form">
                          <form method="post" action="{{ url('/detail-project/lean-canvas/add-early-adopter', $lean->id_lean) }}">
                            @csrf
                            <input type="text" id="input" name="early_adopter" placeholder="type here">
                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                          </form>
                        </div>
                        <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $earlyAdopter = explode('+', $data->early_adopter);
                                  @endphp
                                  @foreach ($earlyAdopter as $key => $arrayEarlyAdopter)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayEarlyAdopter }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditEarlyAdopter-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-early-adopter/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left: -1rem; margin-top: -1rem;">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card" style="background-color: #B944BC;border-radius: 10px; min-height: 15rem;">
                          <div class="ml-4 mt-4 call-tooltip right">
                            <span class="title step" id="step7">COST STRUCTURE</span>
                            <div class="tooltip" style="width: 300px; height: 200px; z-index: 1;">
                              <br>
                              <span style="text-align: justify-all; font-size: 14px;">Costs incurred during the application development process. These costs include all expenses required for research, staff salaries, purchasing inventory tools, and so on.</span>
                              <br><br>
                              <span style="font-weight: bold; font-size: 16px;">Example </span>
                              <ul class="mt-1">
                                <li>Employee Salary</li>
                                <li>Hosting</li>
                              </ul>
                            </div>
                            <img class="img-position img-cost" src="{{asset('modalDocument/Lean Canvas/cost.svg')}}" >
                            <br><span class="sub-title">List your fix and variable costs</span>
                          </div>
                          <div class="ml-4 mt-3 container-form">
                            <form method="post" action="{{ url('/detail-project/lean-canvas/add-cost', $lean->id_lean) }}">
                              @csrf
                              <input type="text" id="input-cost-revenue" name="cost_structure" placeholder="type here">
                              <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                            </form>
                          </div>
                          <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $costStructure = explode('+', $data->cost_structure);
                                  @endphp
                                  @foreach ($costStructure as $key => $arrayCostStructure)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayCostStructure }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditCostStructure-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-cost/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                        </div>
                      </div>
                      <div class="col-lg-6 ml-2 grid-margin stretch-card">
                        <div class="card" style="background-color: #BC4444;border-radius: 10px; min-height: 15rem;">
                          <div class="ml-4 mt-4 call-tooltip right">
                            <span class="title step" id="step6">REVENUE STREAM</span>
                            <div class="tooltip" style="width: 300px; height: 200px; z-index: 1;">
                              <br>
                              <span style="text-align: justify-all; font-size: 14px;">Revenue is any means used to earn revenue from the application. The most common example is subscribing.</span>
                              <br><br>
                              <span style="font-weight: bold; font-size: 16px;">Example </span><span style="font-style: italic;">(Case study driver online)</span>
                              <ul class="mt-1">
                                <li>Additional costs around 1000 - 2000 rupiah each time you make a payment.</li>
                              </ul>
                            </div>
                            <img class="img-position img-cost" src="{{asset('modalDocument/Lean Canvas/revenue.svg')}}" alt="Card image cap">
                            <br><span class="sub-title">List your sources of revenue</span>
                          </div>
                          <div class="ml-4 mt-3 container-form">
                            <form method="post" action="{{ url('/detail-project/lean-canvas/add-revenue', $lean->id_lean) }}">
                              @csrf
                              <input type="text" id="input-cost-revenue" name="revenue_stream" placeholder="type here">
                              <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                            </form>
                          </div>
                          <div class="">
                            <div class="table ml-2" >
                              <table>
                                @foreach ($dataLean as $data)
                                <tbody>
                                  @php
                                      $revenueStream = explode('+', $data->revenue_stream);
                                  @endphp
                                  @foreach ($revenueStream as $key => $arrayRevenueStream)
                                  <tr>
                                    <td class="table-body" width="250px" style="text-align: justify;">{{ $arrayRevenueStream }}</td>
                                    <td>
                                      <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditRevenueStream-{{ $data->id_lean }}" >
                                          <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </td>
                                    <td width="50px">
                                      <form method="POST" action="{{ url('/lean/destroy-revenue/'. $key.'/'. $data->id_lean) }}">
                                       @csrf
                                        <button type="submit" class="button-delete">
                                          <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endforeach
                              </table>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>  
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL EDIT PROBLEM -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditProblem-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Problem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $problem = explode('+', $data->problem);
        @endphp
          <div class="modal-body"> 
            @foreach ($problem as $key => $arrayProblem)
            <form method="POST" action="{{ url('/lean/edit-problem/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="problem" name="problem" value="{{ $arrayProblem }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- MODAL EDIT EXISTING ALTERNATIVES -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditExistingAlternatives-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Existing Alternatives</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $existing = explode('+', $data->existing_alternative);
        @endphp
          <div class="modal-body"> 
            @foreach ($existing as $key => $arrayExisting)
            <form method="POST" action="{{ url('/lean/edit-existing/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="existing_alternative" value="{{ $arrayExisting }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- MODAL EDIT SOLUTION -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditSolution-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Solution</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $solution = explode('+', $data->solution);
        @endphp
          <div class="modal-body"> 
            @foreach ($solution as $key => $arraySolution)
            <form method="POST" action="{{ url('/lean/edit-solution/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" name="solution" value="{{ $arraySolution }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT KEY METRIC -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditKeyMetric-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Key Metric</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $keyMetric = explode('+', $data->key_metric);
        @endphp
          <div class="modal-body"> 
            @foreach ($keyMetric as $key => $arrayKeyMetric)
            <form method="POST" action="{{ url('/lean/edit-key-metric/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="key_metric" value="{{ $arrayKeyMetric }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT UVP -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditUvp-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Unique Value Preposition</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $uvp = explode('+', $data->unique_value);
        @endphp
          <div class="modal-body"> 
            @foreach ($uvp as $key => $arrayUvp)
            <form method="POST" action="{{ url('/lean/edit-uvp/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="unique_value" value="{{ $arrayUvp }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT HLC-->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditHlc-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update High Level Concept</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $hlc = explode('+', $data->high_level_concept);
        @endphp
          <div class="modal-body"> 
            @foreach ($hlc as $key => $arrayHlc)
            <form method="POST" action="{{ url('/lean/edit-hlc/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="high_level_concept" value="{{ $arrayHlc }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT UNFAIR ADVANTAGES -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditUnfairAdvantage-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Unfair Advantage</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $advantage = explode('+', $data->unfair_advantage);
        @endphp
          <div class="modal-body"> 
            @foreach ($advantage as $key => $arrayAdvantage)
            <form method="POST" action="{{ url('/lean/edit-unfair-advantage/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="unfair_advantage" value="{{ $arrayAdvantage }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT CHANNEL-->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditChannel-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Channel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $channel = explode('+', $data->channel);
        @endphp
          <div class="modal-body"> 
            @foreach ($channel as $key => $arrayChannel)
            <form method="POST" action="{{ url('/lean/edit-channel/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="channel" value="{{ $arrayChannel }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT CUSTOMER SEGMENT -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditCustomerSegment-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Customer Segment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $customer = explode('+', $data->customer_segment);
        @endphp
          <div class="modal-body"> 
            @foreach ($customer as $key => $arrayCustomer)
            <form method="POST" action="{{ url('/lean/edit-customer-segment/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="customer_segment" value="{{ $arrayCustomer }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT EARLY ADOPTER -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditEarlyAdopter-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Early Adopter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $earlyAdopter = explode('+', $data->early_adopter);
        @endphp
          <div class="modal-body"> 
            @foreach ($earlyAdopter as $key => $arrayEarlyAdopter)
            <form method="POST" action="{{ url('/lean/edit-early-adopter/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="early_adopter" value="{{ $arrayEarlyAdopter }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT COST STRUCTURE -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditCostStructure-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Cost Structure</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $cost = explode('+', $data->cost_structure);
        @endphp
          <div class="modal-body"> 
            @foreach ($cost as $key => $arrayCost)
            <form method="POST" action="{{ url('/lean/edit-cost/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="cost_structure" value="{{ $arrayCost }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- MODAL EDIT REVENUE STREAM -->
  @foreach ($dataLean as $data)
  <div class="modal fade" id="EditRevenueStream-{{ $data->id_lean }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Revenue Stream</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $revenue = explode('+', $data->revenue_stream);
        @endphp
          <div class="modal-body"> 
            @foreach ($revenue as $key => $arrayRevenue)
            <form method="POST" action="{{ url('/lean/edit-revenue/'. $key.'/'. $data->id_lean) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                  <input type="text" class="form-edit" id="swot_name" name="revenue_stream" value="{{ $arrayRevenue }}">
                  <button type="submit" class="button-edit">
                    <i class="fas fa-check"></i>
                  </button>
                </li>
              </ul>
            </form>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  @endforeach

  @foreach ($projectName as $datas)
  <!-- modal-INVITE-member -->
  <div class="modal fade cd-example-modal-lg" id="inviteMember-{{$datas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 ml-auto">
              <img src="{{ asset('Dashboard/images/ilustrasi/invitemember.svg') }}" style="padding-left: 2rem;" alt="logo"/>
            </div>
            <div class="col-lg-6 ml-auto">
              <span class="font-invite-member" style="position: relative; top: 2rem;">
                <center>Invite Member</center>                
              </span>
              <span class="font-sub-invite" style=""><center>Make sure that your member email has been registered in the application</center></span>
              <form method="POST" id="inviteMember" action="{{ url('/invite/member', $datas->id) }}"style="position: relative; padding-top: 4rem;">
                @csrf
                <center><input type="text" class="input-invite-member" placeholder="Email" name="email"></center>
                <input type="hidden" name="role" value="0">
                <div class="btn-invite-position">
                 <center><button type="submit" value="submit" class="btn-invite-member " for="inviteMember">Send Invitation</button></center> 
                </div>
              </form>
            </div>
          </div>
        </div>
<!--         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  @endforeach
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
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script src="{{ asset('node_modules/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('node_modules/node_modules/shepherd.js/dist/js/shepherd.min.js') }}"></script>
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
          title: "Add New Data",
          description: "Field this input field and press enter to save data.",
          position: "bottom"
        },
        {
          element: ".two",
          title: "Tooltip",
          description: "Hover over the headings to get more explanation about the section.",
          data: "Custom Data",
          position: "left"
        }
        // {
        //   element: ".three",
        //   title: "Export",
        //   description: "Click this icon to export your element into pdf, png, or xml",
        //   position: "right"
        // },
        // {
        //   element: ".four",
        //   title: "Invite",
        //   description: "Make your work easy by inviting your team to the project",
        //   position: "right"
        // }
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
  <!-- <script type="text/javascript">
        const tour = new Shepherd.Tour({
          defaultStepOptions: {
            classes: 'shepherd-theme-arrows',
            scrollTo: true
          }
        });

        tour.addStep({
          id: 'example-step',
          text: 'Write your data in this field and press enter to save.',
          attachTo: {
            element: '.example-css-selector',
            on: 'bottom'
          },
          classes: 'example-step-extra-class',
          buttons: [
            {
              text: 'Next',
              action: tour.next
            }
          ]
        });

        tour.addStep({
          id: 'example-step2',
          text: 'Hover over the headings for each section to get an explanation and sample data.',
          attachTo: {
            element: '.example-css-selector-2',
            on: 'bottom'
          },
          classes: 'example-step-extra-class',
          buttons: [
            {
              text: 'Next',
              action: tour.next
            }
          ]
        });

        tour.addStep({
          id: 'example-step3',
          text: 'Click this icon if you want to get data in pdf, png, or xml form',
          attachTo: {
            element: '.example-css-selector-3',
            on: 'bottom'
          },
          classes: 'example-step-extra-class',
          buttons: [
            {
              text: 'Next',
              action: tour.next
            }
          ]
        });

        tour.addStep({
          id: 'example-step4',
          text: 'Invite your team to help finish your work. You can collaborate together.',
          attachTo: {
            element: '.example-css-selector-4',
            on: 'bottom'
          },
          classes: 'example-step-extra-class',
          buttons: [
            {
              text: 'Next',
              action: tour.next
            }
          ]
        });
        tour.start();
    </script> -->
  <script type="text/javascript">
    $('.step').change(function() {
        var next_step = $(this).next('.step');
        var all_next_steps = $(this).nextAll('.step');
        // If the element *has* a value
        if ($(this).val()) {
            next_step.attr('disabled', false);
        }
        // If the element doesn't have a value
        else {
            // Clear the value of all next steps and disable
            all_next_steps.val('');
            all_next_steps.attr('disabled', true);
        }
    });

    $('.step').keydown(function(event) {
        // If they pressed tab AND the input has a (valid) value
        if ($(this).val() && event.keyCode == 9) {
            $(this).next('.step').attr('disabled', false);
        }
    });
  </script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip().tooltip('show');   
    });
  </script>
</body>

</html>
