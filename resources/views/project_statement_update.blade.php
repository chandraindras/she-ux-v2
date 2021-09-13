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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/project-statement.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip.css') }}">
</head>

<body style="background: #f4f7fa;">
  @include('sweetalert::alert')
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
                          @foreach ($dataProjectStatement as $projectStatement)
                          <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          @foreach ($projectName as $project_name)
                            <span class="ml-1"><a href="{{ url('/detail-project', $project_name->id) }}" style="text-decoration: none;" class="nav-title">{{ $project_name->project_name }}</a></span>
                          <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                          <span class="nav-document-name ml-1">{{ $projectStatement->project_statement_name }}</span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          <img class="ml-2 mb-1" src="{{asset('modalDocument/export.svg')}}">
                          <a type="button" data-toggle="modal" data-target="#inviteMember-{{$project_name->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-11 grid-margin stretch-card">
                    <div class="card">
                      @if(session()->has('success'))
                              <div class="alert alert-success alert-position">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <img class="ml-4" src="{{asset('modalDocument/success.svg')}}">
                                    <span class="ml-2 alert-style" style="position: relative;top: 8px;">
                                      {{ session()->get('success') }}
                                    </span>
                              </div>
                        @endif
                      <form method="POST" action="{{ url('/project-statement/edit', $projectStatement->id_project_statement) }}" id="form-1">
                        @csrf
                        <table class="ml-4 table table-bordered">
                           <tr>
                            <td width="250px" class="title-background">Project Name</td>
                            <td colspan="3" class="td-input">
                              <input type="text" tabindex="1" name="project_name" value="{{ $projectStatement->project_statement_name }}"class="td-project-name input-style-2">
                            </td>
                           </tr>
                           <tr>
                            <td  class="title-background">Project Sponsor</td>
                            <td class="td-input">
                              <input type="text" tabindex="2" name="project_sponsor" class="input-style-2" value="{{ $projectStatement->project_sponsor }}">
                            </td>
                            <td width="250px" class="title-background">Project Manager</td>
                            <td class="td-input">
                              <input type="text" tabindex="3" name="project_manager" class="input-style-2" value="{{ $projectStatement->project_manager }}">
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background">Date of Project Approval</td>
                            <td class="td-input">
                              <div id="date_approval" class="input-group input-daterange">
                                <input name="date_approval" tabindex="4" class="input-style-2" value="{{ $projectStatement->date_approval }}">
                              </div>
                            </td>
                            <td class="title-background">Last Revisian Date</td>
                            <td class="td-input">
                              <div id="last_revisian" class="input-group input-daterange">
                                <input name="last_revisian" tabindex="5" class="input-style-2" value="{{ $projectStatement->date_revisian }}">
                              </div>
                            </td>
                           </tr>
                        </form>
                           <tr>
                            <td class="title-background" height="120px">
                              Scope Description
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="List out what is within the scope of your project, and what is out of scope. This will help establish boundaries for the project to exist. For example, 'IN SCOPE : Timesheets feature, access via desktop', 'OUT OF SCOPE : Access via mobile ang tablet, new project addition by manager'">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td colspan="3" class="td-input">
                              <div id="listScope">
                                <a type="button" onclick="showEditScope()" class="add_button mt-1 button-add-position">
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a>
                                <div style="margin-top: -1rem;" class="wrap-edit-scope">
                                  <div class="wrap-scope">
                                    @php
                                        $scope = explode('+', $projectStatement->scope);
                                    @endphp 
                                    @foreach ($scope as $key => $arrayScope)
                                      <ul>
                                        <li class="input-style-3">{{ $arrayScope }}</li>
                                      </ul> 
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                              <div id="editScope">
                                @foreach ($dataProjectStatement as $projectStatement) 
                                  @php 
                                    $scope = explode('+', $projectStatement->scope); 
                                  @endphp 
                                  <a type="button" class="remove_button button-remove" onclick="closeEditScope()">
                                    <i class="fas fa-times exit-position" style="color: #262323;"></i>
                                  </a> 
                                  @foreach ($scope as $key => $arrayScope) 
                                  <form method="POST" action="{{ url('/project-statement/edit-scope/'. $key.'/'. $projectStatement->id_project_statement) }}"> 
                                    @csrf
                                    <ul >
                                      </li>
                                        <input type="text" class="input-style-edit" name="scope" value="{{ $arrayScope }}"> 
                                        <button type="submit" class="button-edit"> 
                                          <i class="fas fa-check"></i>
                                        </button>
                                      </li>
                                    </ul>
                                  </form> 
                                  @endforeach 
                                @endforeach 
                              </div>
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background" height="120px">
                              Project Deliverable
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Deliverable is list product or output that your team members need to produce in order to meet business objectives. For example, 'A customer facing IVR system', 'Hosted application & help desk services">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td colspan="3" class="td-input">
                              <div id="listDeliverable">
                                <a type="button" onclick="showEditDeliverable()" class="add_button_deliverable button-add-position">
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a>
                                <div style="margin-top: -1rem;" class="wrap-edit-deliverable">
                                  <div class="wrap-deliverable">                                  
                                    @php
                                        $deliverable = explode('+', $projectStatement->deliverable);
                                    @endphp 
                                    @foreach ($deliverable as $key => $arrayDeliverable)
                                      <ul>
                                        <li class="input-style-3">{{ $arrayDeliverable }}</li>
                                      </ul> 
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                              <div id="editDeliverable">
                                @foreach ($dataProjectStatement as $projectStatement) 
                                  @php 
                                    $deliverable = explode('+', $projectStatement->deliverable); 
                                  @endphp 
                                  <a type="button" class="remove_button button-remove" onclick="closeEditDeliverable()">
                                    <i class="fas fa-times exit-position" style="color: #262323;"></i>
                                  </a> 
                                  @foreach ($deliverable as $key => $arrayDeliverable) 
                                    <form method="POST" action="{{ url('/project-statement/edit-deliverable/'. $key.'/'. $projectStatement->id_project_statement) }}"> 
                                      @csrf 
                                      <ul >
                                        <li>
                                          <input type="text" class="input-style-edit" name="deliverable" value="{{ $arrayDeliverable }}"> 
                                          <button type="submit" class="button-edit"> 
                                            <i class="fas fa-check"></i> 
                                          </button>
                                        </li>
                                      </ul> 
                                    </form> 
                                  @endforeach 
                                @endforeach 
                              </div>
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background" height="120px">
                              Acceptance Criteria
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Defines the criteria that must be met in order for the project to be considered complete and accepted by management or stakeholder. For example, 'This project will be accepted when the stakeholder say Ok and past the black box testing'">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td colspan="3" class="td-input">
                              <div id="listCriteria">
                                <a type="button" onclick="showEditCriteria()" class="add_button_criteria button-add-position">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a> 
                                <div style="margin-top: -1rem;" class="wrap-edit-criteria">
                                  <div class="wrap-criteria">                                 
                                    @php
                                        $criteria = explode('+', $projectStatement->acceptance);
                                    @endphp 
                                    @foreach ($criteria as $key => $arrayCriteria)
                                      <ul>
                                        <li class="input-style-3">{{ $arrayCriteria }}</li>
                                      </ul> 
                                    @endforeach
                                  </div>
                                </div> 
                              </div> 
                              <div id="editCriteria">
                                @foreach ($dataProjectStatement as $projectStatement) 
                                @php 
                                $criteria = explode('+', $projectStatement->acceptance); 
                                @endphp 

                                <a type="button" onclick="closeEditCriteria()" class="remove_button button-remove">
                                  <i class="fas fa-times exit-position" style="color: #262323;"></i>
                                </a> 
                                @foreach ($criteria as $key => $arrayCriteria) 
                                  <form method="POST" action="{{ url('/project-statement/edit-criteria/'. $key.'/'. $projectStatement->id_project_statement) }}"> 
                                    @csrf 
                                    <ul >
                                      <li>
                                        <input type="text" class="input-style-edit" name="criteria" value="{{ $arrayCriteria }}"> 
                                        <button type="submit" class="button-edit"> 
                                          <i class="fas fa-check"></i> 
                                        </button>
                                      </li>
                                    </ul> 
                                  </form> 
                                @endforeach 
                              @endforeach 
                            </div>
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background" height="120px">
                              Constraint
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Constraints are what make managing projects such a puzzle to solve. The top three constraints to managing any project are typically time, money and scope. They are interconnected, meaning that if you pull one lever on ‘scope’, another lever on ‘money’ or ‘time’ will also move.">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td colspan="3" class="td-input">
                              <div id="listConstraint">
                                <a type="button" onclick="showEditConstraint()" class="add_button_constraint button-add-position">
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a>
                                <div style="margin-top: -1rem;" class="wrap-edit-constraint">
                                  <div class="wrap-constraint">                                 
                                    @php
                                        $constraint = explode('+', $projectStatement->constraint);
                                    @endphp 
                                    @foreach ($constraint as $key => $arrayConstraint)
                                      <ul>
                                        <li class="input-style-3">{{ $arrayConstraint }}</li>
                                      </ul> 
                                    @endforeach
                                  </div>
                                </div> 
                              </div>
                              <div id="editConstraint">
                                @foreach ($dataProjectStatement as $projectStatement) 
                                  @php 
                                    $constraint = explode('+', $projectStatement->constraint); 
                                  @endphp 
                                  <a type="button" onclick="closeEditConstraint()" class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></a> 
                                  @foreach ($constraint as $key => $arrayConstraint) 
                                    <form method="POST" action="{{ url('/project-statement/edit-constraint/'. $key.'/'. $projectStatement->id_project_statement) }}"> 
                                      @csrf 
                                      <ul >
                                        <li>
                                          <input type="text" class="input-style-edit" name="constraint" value="{{ $arrayConstraint }}"> 
                                          <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button>
                                        </li>
                                      </ul> 
                                    </form> 
                                  @endforeach 
                                @endforeach 
                              </div>
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background" height="120px">
                              Asumption
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Assumptions are the factors that affect the project which usually revolve around the things that end up being the constraints, including time, money, and scope. For example,'current IT staff will remain in place throughout duration of project', 'he front-end development team will be available during this project time period'">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td class="td-input" colspan="3">
                              <div id="listAsumption">
                                <a type="button" onclick="showEditAsumption()" class="add_button_asumption button-add-position">
                                  <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a>
                                <div style="margin-top: -1rem;" class="wrap-edit-asumption">
                                  <div class="wrap-asumption">
                                    @php
                                        $asumption = explode('+', $projectStatement->assumption);
                                    @endphp 
                                    @foreach ($asumption as $key => $arrayAsumption)
                                      <ul>
                                        <li class="input-style-3">{{ $arrayAsumption }}</li>
                                      </ul> 
                                    @endforeach
                                  </div>                              
                                </div>
                              </div>
                              <div id="editAsumption">
                                @foreach ($dataProjectStatement as $projectStatement) 
                                @php 
                                  $asumption = explode('+', $projectStatement->assumption); 
                                @endphp 
                                <a type="button" onclick="closeEditAsumption()" class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></a> 
                                @foreach ($asumption as $key => $arrayAsumption) 
                                  <form method="POST" action="{{ url('/project-statement/edit-asumption/'. $key.'/'. $projectStatement->id_project_statement) }}"> 
                                    @csrf 
                                    <ul>
                                      <li>
                                        <input type="text" class="input-style-edit" name="asumption" value="{{ $arrayAsumption }}"> 
                                        <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button>
                                      </li>
                                    </ul> 
                                  </form> 
                                @endforeach 
                              @endforeach 
                            </div>
                            </td>
                           </tr>
                        </table>
                        <button class="mt-5 button-save" for="form-1" type="submit" value="submit">Update</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="col-md-3">
              <div class="side-bar">
                <center>
                  <img class="side-ilustrasi" style="margin-top: 20rem;" src="{{asset('modalDocument/project-statement.svg')}}" alt="Card image cap">
                </center>
                <div class="mt-3 ml-4 mr-4 side-color">
                  <span class="side-title">Project Statement</span><span class="side-explanation"> Provides the documented basis for making all project decisions and is used to direct the project effort and communicate the project scope to the project team and other project stakeholders</span>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('DataTable/datatables.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
      $("#editScope").hide();
      $("#editDeliverable").hide();
      $("#editCriteria").hide();
      $("#editConstraint").hide();
      $("#editAsumption").hide();

      function showEditScope() {
         document.getElementById('editScope').style.display = "block";
         $("#listScope").hide();
      }

      function closeEditScope() {
        document.getElementById('listScope').style.display = "block";
         $("#editScope").hide();
      }

      function showEditDeliverable() {
         document.getElementById('editDeliverable').style.display = "block";
         $("#listDeliverable").hide();
      }

      function closeEditDeliverable() {
        document.getElementById('listDeliverable').style.display = "block";
         $("#editDeliverable").hide();
      }

      function showEditCriteria() {
         document.getElementById('editCriteria').style.display = "block";
         $("#listCriteria").hide();
      }

      function closeEditCriteria() {
        document.getElementById('listCriteria').style.display = "block";
         $("#editCriteria").hide();
      }

      function showEditConstraint() {
         document.getElementById('editConstraint').style.display = "block";
         $("#listConstraint").hide();
      }

      function closeEditConstraint() {
        document.getElementById('listConstraint').style.display = "block";
         $("#editConstraint").hide();
      }

      function showEditAsumption() {
         document.getElementById('editAsumption').style.display = "block";
         $("#listAsumption").hide();
      }

      function closeEditAsumption() {
        document.getElementById('listAsumption').style.display = "block";
         $("#editAsumption").hide();
      }

  </script>
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip().tooltip('show');   
    });
  </script>

  <script type="text/javascript">
    $('input,select').on('keypress', function (e) {
        if (e.which == 13) {
            e.preventDefault();
            var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
            console.log($next.length);
            if (!$next.length) {
                $next = $('[tabIndex=1]');
            }
            $next.focus();
        }
    });  
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
        $('#date_approval').datepicker({
          format: "yyyy/mm/dd",
          autoclose: true
        })
      })
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#last_revisian').datepicker({
          format: "yyyy/mm/dd",
          autoclose: true
        })
      })
    </script>

  <!-- <script type="text/javascript">
    $(document).ready(function(){
        var addButton = $('.add_button');
        var wrapper = $('.wrap-edit-scope');
        var wrapperBefore = $('.wrap-scope');
        var fieldHTML = '<div>@foreach ($dataProjectStatement as $projectStatement) @php $scope = explode('+', $projectStatement->scope); @endphp <button class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></button> @foreach ($scope as $key => $arrayScope) <form method="POST" action="{{ url('/project-statement/edit-scope/'. $key.'/'. $projectStatement->id_project_statement) }}"> @csrf <ul ></li><input type="text" class="input-style-edit" name="scope" value="{{ $arrayScope }}"> <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button></li></ul> </form> @endforeach @endforeach </div>';
        var x = 1; 

        $(addButton).click(function(){
            $(wrapperBefore).remove(); 
            $(wrapper).append(fieldHTML);
        });
        
        
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            $(wrapper).append(wrapperBefore);
        });
    });
    </script> -->
<!-- 
    <script type="text/javascript">
    $(document).ready(function(){
        var addButtonDeliverable = $('.add_button_deliverable');
        var wrapperDeliverable = $('.wrap-edit-deliverable');
        var wrapperBeforeDeliverable = $('.wrap-deliverable');
        var fieldEditDeliverable = '<div>@foreach ($dataProjectStatement as $projectStatement) @php $deliverable = explode('+', $projectStatement->deliverable); @endphp <button class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #CF2727;"></i></button> @foreach ($deliverable as $key => $arrayDeliverable) <form method="POST" action="{{ url('/project-statement/edit-deliverable/'. $key.'/'. $projectStatement->id_project_statement) }}"> @csrf <ul ></li><input type="text" class="input-style-edit" name="deliverable" value="{{ $arrayDeliverable }}"> <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button></li></ul> </form> @endforeach @endforeach </div>';
       
        $(addButtonDeliverable).click(function(){
            $(wrapperBeforeDeliverable).remove(); 
            $(wrapperDeliverable).append(fieldEditDeliverable);
        });
        
        
        $(wrapperDeliverable).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            $(wrapperDeliverable).append(wrapperBeforeDeliverable);
        });
    });
    </script> -->

    <!-- <script type="text/javascript">
    $(document).ready(function(){
        var addButtonCriteria = $('.add_button_criteria');
        var wrapperCriteria = $('.wrap-edit-criteria');
        var wrapperBeforeCriteria = $('.wrap-criteria');
        var fieldEditCriteria = '<div>@foreach ($dataProjectStatement as $projectStatement) @php $criteria = explode('+', $projectStatement->acceptance); @endphp <button class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></button> @foreach ($criteria as $key => $arrayCriteria) <form method="POST" action="{{ url('/project-statement/edit-criteria/'. $key.'/'. $projectStatement->id_project_statement) }}"> @csrf <ul ></li><input type="text" class="input-style-edit" name="criteria" value="{{ $arrayCriteria }}"> <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button></li></ul> </form> @endforeach @endforeach </div>';
        
        $(addButtonCriteria).click(function(){
            $(wrapperBeforeCriteria).remove(); 
            $(wrapperCriteria).append(fieldEditCriteria);
        });
        
        
        $(wrapperCriteria).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            $(wrapperCriteria).append(wrapperBeforeCriteria);
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var addButtonConstraint = $('.add_button_constraint');
        var wrapperConstraint = $('.wrap-edit-constraint');
        var wrapperBeforeConstraint = $('.wrap-constraint');
        var fieldEditConstraint = '<div>@foreach ($dataProjectStatement as $projectStatement) @php $constraint = explode('+', $projectStatement->constraint); @endphp <button class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></button> @foreach ($constraint as $key => $arrayConstraint) <form method="POST" action="{{ url('/project-statement/edit-constraint/'. $key.'/'. $projectStatement->id_project_statement) }}"> @csrf <ul ></li><input type="text" class="input-style-edit" name="constraint" value="{{ $arrayConstraint }}"> <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button></li></ul> </form> @endforeach @endforeach </div>';
        
        $(addButtonConstraint).click(function(){
            $(wrapperBeforeConstraint).remove(); 
            $(wrapperConstraint).append(fieldEditConstraint);
        });
        
        
        $(wrapperConstraint).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            $(wrapperConstraint).append(wrapperBeforeConstraint);
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var addButtonAsumption = $('.add_button_asumption');
        var wrapperAsumption = $('.wrap-edit-asumption');
        var wrapperBeforeAssumption = $('.wrap-asumption');
        var fieldEditAsumption = '<div>@foreach ($dataProjectStatement as $projectStatement) @php $asumption = explode('+', $projectStatement->assumption); @endphp <button class="remove_button button-remove"><i class="fas fa-times exit-position" style="color: #262323;"></i></button> @foreach ($asumption as $key => $arrayAsumption) <form method="POST" action="{{ url('/project-statement/edit-asumption/'. $key.'/'. $projectStatement->id_project_statement) }}"> @csrf <ul ></li><input type="text" class="input-style-edit" name="asumption" value="{{ $arrayAsumption }}"> <button type="submit" class="button-edit"> <i class="fas fa-check"></i> </button></li></ul> </form> @endforeach @endforeach </div>';
        
        $(addButtonAsumption).click(function(){
            $(wrapperBeforeAssumption).remove(); 
            $(wrapperAsumption).append(fieldEditAsumption);
        });
        
        
        $(wrapperAsumption).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); 
            $(wrapperAsumption).append(wrapperBeforeAssumption);
        });
    });
    </script> -->
</body>

</html>
