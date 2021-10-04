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
    <link rel="stylesheet" href="{{ asset('Dashboard/css/swot.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip.css') }}">
<!--   <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip2.css') }}"> -->
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css') }}">
</head>

<body style="  background: #f4f7fa;">
<div class="container-scroller">
    <div class="container-fluid">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mt-3">
                    <div class="col-md-9 mt-6 grid-margin stretch-card">
                        <div class="card card-swot" style="margin-left: 1.5rem;">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-nav">
                                        <div class="wrapper-nav stretch-nav">
                                            <div class="ml-3" style="margin-top: 15px;">
                                                @foreach ($dataSwot as $swot)
                                                    <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                                                    <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                                                    @foreach ($projectName as $project_name)
                                                        <span class="ml-1"><a href="{{ url('/detail-project', $project_name->id) }}" style="text-decoration: none;" class="nav-title">{{ $project_name->project_name }}</a></span>
                                                        <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                                                        <span class="nav-document-name ml-1">{{ $swot->swot_name }}</span>
                                                        <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                                                        <a type="button" href="{{ route('cetak-swot', $swot['id_swot']) }}"><img class="ml-2 mb-1" src="{{asset('modalDocument/export.svg')}}"></a>
                                                        <a type="button" data-toggle="modal" data-target="#inviteMember-{{$project_name->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="width: 95%; height: 60%;">
                                <div class="col-md-6 strength">
                                    <img class="swot-icon" src="{{asset('modalDocument/strength.svg')}}" alt="Card image cap">
                                    <span class="swot-title">Strength</span>
                                    <button class="tool question-position button-delete example-css-selector-4" style="text-align:justify;" data-tip="Strength is everything that can make you superior to other products. Example (Case study : driver online) : 1. The number of driver is large 2. Easily accessible in every area 3. Provides many services such as purchasing daily necessities, food" tabindex="2">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <div class="container-form">
                                        <form method="post" action="{{ url('/detail-project/swot/add-strength', $swot->id_swot) }}">
                                            @csrf
                                            <div class="">
                                                <input type="text" id="input" name="strength" placeholder="type here and press enter or click plus button">
                                                <button type="submit" class="one icon example-css-selector"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table ml-6" style="margin-top: 2rem;">
                                        <table>
                                            @foreach ($dataSwot as $data)
                                                <tbody>
                                                @php
                                                    $strength = explode('+', $data->strength);
                                                @endphp
                                                @foreach ($strength as $key => $arrayStrength)
                                                    <tr>
                                                        <td class="table-body" width="325">- {{ $arrayStrength }}</td>
                                                        <td>
                                                            <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditModal-{{ $data->id_swot }}" >
                                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ url('/swot/destroy-strength/'. $key.'/'. $data->id_swot) }}">
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
                                <div class="col-md-6 weakness">
                                    <img class="swot-icon" src="{{asset('modalDocument/weak.svg')}}" alt="Card image cap">
                                    <span class="swot-title">Weakness</span>
                                    <button class="tool question-position button-delete example-css-selector-4" style="text-align: justify;" data-tip="Weakness is Everything that is the limitation of your product. Example (case study : Driver Online) : 1. The company has a very high dependence on drivers
                      2. Business processes cannot run without adequate internet access" tabindex="2">
                                        <div class="two"><i class="fas fa-question-circle"></i></div>
                                    </button>
                                    <div class="container-form">
                                        <form method="post" action="{{ url('/detail-project/swot/add-weakness', $swot->id_swot) }}">
                                            @csrf
                                            <input type="text" id="input" name="weakness" placeholder="type here and press enter or click plus button">
                                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                                        </form>
                                    </div>
                                    <div class="table ml-6" style="margin-top: 2rem;">
                                        <table>
                                            @foreach ($dataSwot as $data)
                                                <tbody>
                                                @php
                                                    $weakness = explode('+', $data->weakness);
                                                @endphp
                                                @foreach ($weakness as $key => $arrayWeakness)
                                                    <tr>
                                                        <td class="table-body" width="325">- {{ $arrayWeakness }}</td>
                                                        <td>
                                                            <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditWeakness-{{ $data->id_swot }}" >
                                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ url('/swot/destroy-weakness/'. $key.'/'. $data->id_swot) }}">
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
                            <div class="row" style="width: 95%; height: 60%;">
                                <div class="col-md-6 opportunity">
                                    <img class="swot-icon" src="{{asset('modalDocument/target.svg')}}" alt="Card image cap">
                                    <span class="swot-title">Opportunity</span>
                                    <button class="tool question-position button-delete" style="text-align: justify;" data-tip="Opportunity is external factors in your business environment that are likely to contribute to business success. Example (Case study : Driver Online) :
                      1. Can penetrate into other business sectors
                      2. Easy to get partners
                      3. Market access for millenials is wide open" tabindex="3">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <div class="container-form">
                                        <form method="post" action="{{ url('/detail-project/swot/add-opportunity', $swot->id_swot) }}">
                                            @csrf
                                            <input type="text" id="input" name="opportunity" placeholder="type here and press enter or click plus button">
                                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                                        </form>
                                    </div>
                                    <div class="table ml-6" style="margin-top: 2rem;">
                                        <table>
                                            @foreach ($dataSwot as $data)
                                                <tbody>
                                                @php
                                                    $opportunity = explode('+', $data->opportunity);
                                                @endphp
                                                @foreach ($opportunity as $key => $arrayOpportunity)
                                                    <tr>
                                                        <td class="table-body" width="325">- {{ $arrayOpportunity }}</td>
                                                        <td>
                                                            <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditOpportunity-{{ $data->id_swot }}" >
                                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ url('/swot/destroy-opportunity/'. $key.'/'. $data->id_swot) }}">
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
                                <div class="col-md-6 threat">
                                    <img class="swot-icon" src="{{asset('modalDocument/warning.svg')}}" alt="Card image cap">
                                    <span class="swot-title">Threat</span>
                                    <button class="tool question-position button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) :
                      1. Legal regulations are immature and may change later
                      2. There is people that has not been adaptive to change">
                                        <i class="fas fa-question-circle"></i>
                                    </button>
                                    <div class="container-form">
                                        <form method="post" action="{{ url('/detail-project/swot/add-threat', $swot->id_swot) }}">
                                            @csrf
                                            <input type="text" id="input" name="threat" placeholder="type here and press enter or click plus button">
                                            <button type="submit" class="icon"><i class="fas fa-plus"></i></button>
                                        </form>
                                    </div>
                                    <div class="table ml-6" style="margin-top: 2rem;">
                                        <table>
                                            @foreach ($dataSwot as $data)
                                                <tbody>
                                                @php
                                                    $threat = explode('+', $data->threat);
                                                @endphp
                                                @foreach ($threat as $key => $arrayThreat)
                                                    <tr>
                                                        <td class="table-body" width="325">- {{ $arrayThreat }}</td>
                                                        <td>
                                                            <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditThreat-{{ $data->id_swot }}" >
                                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <form method="POST" action="{{ url('/swot/destroy-threat/'. $key.'/'. $data->id_swot) }}">
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
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        <div class="side-bar">
                            <center>
                                <img class="side-ilustrasi" src="{{asset('modalDocument/swot-ilustrasi.svg')}}" alt="Card image cap">
                            </center>
                            <div class="mt-3 ml-4 mr-4 side-color">
                                <span class="side-title">SWOT</span><span class="side-explanation"> is a great tool to visualize business strategy building into 4 parts (strength, weakness, opportunity, and threat)</span>
                            </div>
                            <div class="mt-2 ml-4">
                                <span><a href="#">Learn More</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL EDIT STRENGTH -->
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
                @php
                    $strength = explode('+', $data->strength);
                @endphp
                <div class="modal-body">
                    @foreach ($strength as $key => $arrayStrength)
                        <form method="POST" action="{{ url('/swot/edit-strength/'. $key.'/'. $data->id_swot) }}">
                            @csrf
                            <ul style="list-style-type: circle">
                                <li>
                                    <input type="text" class="form-edit" id="swot_name" name="strength" value="{{ $arrayStrength }}">
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
<!-- END MODAL EDIT NEW DOCUMENT -->
<!-- MODAL EDIT STRENGTH -->
@foreach ($dataSwot as $data)
    <div class="modal fade" id="EditWeakness-{{ $data->id_swot }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Weakness</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    $weakness = explode('+', $data->weakness);
                @endphp
                <div class="modal-body">
                    @foreach ($weakness as $key => $arrayWeakness)
                        <form method="POST" action="{{ url('/swot/edit-weakness/'. $key.'/'. $data->id_swot) }}">
                            @csrf
                            <ul style="list-style-type: circle">
                                <li>
                                    <input type="text" class="form-edit" id="swot_name" name="weakness" value="{{ $arrayWeakness }}">
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
<!-- END MODAL EDIT NEW DOCUMENT -->
<!-- MODAL EDIT THREAT -->
@foreach ($dataSwot as $data)
    <div class="modal fade" id="EditThreat-{{ $data->id_swot }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Threat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    $threat = explode('+', $data->threat);
                @endphp
                <div class="modal-body">
                    @foreach ($threat as $key => $arrayThreat)
                        <form method="POST" action="{{ url('/swot/edit-threat/'. $key.'/'. $data->id_swot) }}">
                            @csrf
                            <ul style="list-style-type: circle">
                                <li>
                                    <input type="text" class="form-edit" id="swot_name" name="threat" value="{{ $arrayThreat }}">
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
<!-- END MODAL EDIT NEW DOCUMENT -->
<!-- MODAL EDIT THREAT -->
@foreach ($dataSwot as $data)
    <div class="modal fade" id="EditOpportunity-{{ $data->id_swot }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Opportunity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                    $opportunity = explode('+', $data->opportunity);
                @endphp
                <div class="modal-body">
                    @foreach ($opportunity as $key => $arrayOpportunity)
                        <form method="POST" action="{{ url('/swot/edit-opportunity/'. $key.'/'. $data->id_swot) }}">
                            @csrf
                            <ul style="list-style-type: circle">
                                <li>
                                    <input type="text" class="form-edit" id="swot_name" name="opportunity" value="{{ $arrayOpportunity }}">
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
<script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('Dashboard/js/off-canvas.js') }}"></script>
<script src="{{ asset('Dashboard/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('Dashboard/js/template.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>
</html>
