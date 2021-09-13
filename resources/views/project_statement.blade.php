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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css') }}">
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
                      <form method="POST" action="{{ url('/detail-project/project-statement/update', $projectStatement->id_project_statement) }}">
                        @csrf
                        <table class="ml-4 table table-bordered">
                           <tr>
                            <td width="250px" class="title-background">
                              Project Name
                              <!-- <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) : 
                              1. Legal regulations are immature and may change later
                              2. There is people that has not been adaptive to change">
                                <i class="fas fa-question-circle"></i>
                              </button> -->
                            </td>
                            <td colspan="3" class="td-input">
                              <input type="text" name="project_name" value="{{ $projectStatement->project_statement_name }}"class="td-project-name input-style" disabled>
                            </td>
                           </tr>
                           <tr>
                            <td  class="title-background">
                              Project Sponsor
                             <!--  <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) : 
                              1. Legal regulations are immature and may change later
                              2. There is people that has not been adaptive to change">
                                <i class="fas fa-question-circle"></i>
                              </button> -->
                            </td>
                            <td class="td-input">
                              <input type="text" tabindex="1" name="project_sponsor" class="input-style" placeholder="type here">
                            </td>
                            <td width="250px" class="title-background">
                              Project Manager
                              <!-- <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) : 
                              1. Legal regulations are immature and may change later
                              2. There is people that has not been adaptive to change">
                                <i class="fas fa-question-circle"></i>
                              </button> -->
                            </td>
                            <td class="td-input">
                              <input type="text" tabindex="2" name="project_manager" class="input-style" placeholder="type here">
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background">
                              Date of Project Approval
                             <!--  <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) : 
                              1. Legal regulations are immature and may change later
                              2. There is people that has not been adaptive to change">
                                <i class="fas fa-question-circle"></i>
                              </button> -->
                            </td>
                            <td class="td-input">
                              <div id="date_approval" class="input-group input-daterange">
                                <input name="date_approval" tabindex="3" class="input-style" value="2020-08-04">
                              </div>
                            </td>
                            <td class="title-background">
                              Last Revisian Date
                              <!-- <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="Threat is external factors over which you have no control and could adversely affect the product. Example (Case study : Driver Online) : 
                              1. Legal regulations are immature and may change later
                              2. There is people that has not been adaptive to change">
                                <i class="fas fa-question-circle"></i>
                              </button> -->
                            </td>
                            <td class="td-input">
                              <div id="last_revisian" class="input-group input-daterange">
                                <input name="last_revisian" tabindex="4" class="input-style" value="2020-08-04">
                              </div>
                            </td>
                           </tr>
                           <tr>
                            <td class="title-background" height="120px">
                              Scope Description
                              <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="List out what is within the scope of your project, and what is out of scope. This will help establish boundaries for the project to exist. For example, 'IN SCOPE : Timesheets feature, access via desktop', 'OUT OF SCOPE : Access via mobile ang tablet, new project addition by manager'">
                                <i class="fas fa-question-circle"></i>
                              </button>
                            </td>
                            <td colspan="3" class="td-input">
                              <input type="text" tabindex="5" name="scope[]" class="input-style-dynamic" placeholder="">
                              <button type="button" class="add_button button-style-dynamic">
                                <i class="fas fa-plus"></i>
                              </button>
                              <div class="wrap-scope">
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
                              <input type="text" tabindex="6" name="deliverable[]" class="input-style-dynamic" placeholder="">
                              <button type="button" class="add_deliverable button-style-dynamic">
                                <i class="fas fa-plus"></i>
                              </button>
                              <div class="wrap-deliverable">
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
                              <input type="text" tabindex="7" name="criteria[]" class="input-style-dynamic" placeholder="">
                              <button type="button" class="add_criteria button-style-dynamic">
                                <i class="fas fa-plus"></i>
                              </button>
                              <div class="wrap-criteria">
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
                              <input type="text" tabindex="8" name="constraint[]" class="input-style-dynamic" placeholder="">
                              <button type="button" class="add_constraint button-style-dynamic">
                                <i class="fas fa-plus"></i>
                              </button>
                              <div class="wrap-constraint">
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
                              <input type="text" tabindex="9" name="asumption[]" class="input-style-dynamic" placeholder="">
                              <button type="button" class="add_asumption button-style-dynamic">
                                <i class="fas fa-plus"></i>
                              </button>
                              <div class="wrap-asumption">
                              </div> 
                            </td>
                           </tr>
                        </table>
                        <button class="mt-5 button-save" type="submit" value="submit">Save</button>
                      </form>
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
                <div class="mt-2 ml-4 mr-4 side-color">
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
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script src="{{ asset('node_modules/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('node_modules/node_modules/shepherd.js/dist/js/shepherd.min.js') }}"></script>
<!--   <script type="text/javascript">
        const tour = new Shepherd.Tour({
          defaultStepOptions: {
            classes: 'shepherd-theme-arrows',
            scrollTo: true
          }
        });

        tour.addStep({
          id: 'example-step',
          text: 'Use this button to add new data input.',
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
          text: 'To export a SWOT component, click on this icon.',
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
          text: 'You can invite other members who are registered with SheUX.',
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
          text: 'When you find it difficult to understand a term, just click on this icon.',
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

  <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.wrap-scope'); //Input field wrapper
        var fieldHTML = '<div><input type="text" name="scope[]" class="input-style-dynamic" placeholder="add one here"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addMoreDeliverable = $('.add_deliverable'); //Add button selector
        var wrapperDeliverable = $('.wrap-deliverable'); //Input field wrapper
        var fieldDeliverable = '<div><input type="text" name="deliverable[]" class="input-style-dynamic" placeholder="add one here"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addMoreDeliverable).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapperDeliverable).append(fieldDeliverable); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapperDeliverable).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addMoreCriteria = $('.add_criteria'); //Add button selector
        var wrapperCriteria = $('.wrap-criteria'); //Input field wrapper
        var fieldCriteria = '<div><input type="text" name="criteria[]" class="input-style-dynamic" placeholder="add one here"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addMoreCriteria).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapperCriteria).append(fieldCriteria); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapperCriteria).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addMoreAsumption = $('.add_asumption'); //Add button selector
        var wrapperAsumption = $('.wrap-asumption'); //Input field wrapper
        var fieldAsumption = '<div><input type="text" name="asumption[]" class="input-style-dynamic" placeholder="add one here"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addMoreAsumption).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapperAsumption).append(fieldAsumption); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapperAsumption).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 5; //Input fields increment limitation
        var addMoreConstraint = $('.add_constraint'); //Add button selector
        var wrapperConstraint = $('.wrap-constraint'); //Input field wrapper
        var fieldConstraint = '<div><input type="text" name="constraint[]" class="input-style-dynamic" placeholder="add one here"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addMoreConstraint).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapperConstraint).append(fieldConstraint); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapperConstraint).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
</body>

</html>
