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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/comparison-matrix.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip-comparison.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css') }}">
  <link href="{{asset('tiny-tour-master/dist/tour.min.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('tiny-tour-master/dist/tour.min.js')}}" rel="stylesheet" type="text/javascript"></script>
</head>
<style type="text/css">
  body{
    overflow: auto;
  }
      .table-content {
        padding: 20px;
      }
      .remove {
        color: #9F4949;
        position: relative;
        left: -5rem;
      }
      .remove:hover {
        cursor: pointer;
      }
      .form-control {
        width: 120px;
      }
      .table-position {
        position: absolute;
        top: 80px;
        left: 100px;
      }
      .th-style{
        width: 250px;
        height: 50px;
      }
    </style>
<body style="  background: #f4f7fa;">
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
                          
                          <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                            
                            <span class="ml-1"><a href="{{ url('/detail-project', $projectName['id']) }}" style="text-decoration: none;" class="nav-title">{{ $projectName['project_name'] }}</a></span>
                           
                          <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                          <span class="nav-document-name ml-1"><input class="component-name" type="text" name="comparison_name" value="{{ $dataComparison['comparison_name'] }}"></span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          <img class="ml-2 mb-1 example-css-selector-2" src="{{asset('modalDocument/export.svg')}}">
                          @foreach ($dataProject as $list) 
                          <a type="button" data-toggle="modal" data-target="#inviteMember-{{$list->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive table-content">
                    <form id="form2" action="{{ url('/tambahcomparison', $projectName['id'] ) }}" method="POST">
                      @csrf
                      <table class="demo-table" id="dynamicTable">
                        <thead>
                          <tr>
                            <input type="hidden" name="addmore[0][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                            <input type="hidden" name="addmore[0][comparison_name]" value="Comparison Matrix" class="form-control" />
                            <th class="call-tooltip bottom">
                              ASPECT
                              <i class="fas fa-question-circle"></i>
                              <div class="tooltip" style="width: 320px; height: 300px; z-index: 1;">
                                <br>
                                <ul>
                                  <li>
                                    <p><span style="font-weight: bold;">Competitors</span> are products or systems that have something in common with our products.</p>
                                  </li>
                                  <li>
                                    <p><span style="font-weight: bold;">Aspects</span> are everything that is used as a comparison between your product and competitors. Example: features, product flow, etc.</p>
                                  </li>
                                  <li>
                                    <p>How to do a competitor analysis?<br>1. Determine who your competitors are. <br>2. Decide what aspects will be compared.<br>3. Analyze each competitor whether they have the same features or not.</p>
                                  </li>
                                </ul>
                              </div>
                              <input type="text" style="border-style: none;" name="addmore[0][aspect]" value="Aspect" class="form-control" hidden />
                            </th>
                            <th>
                              <input type="text" class="one competitor" name="addmore[0][competitor1]"  placeholder="Competitor Name" required>
                            </th>
                            <th>
                              <input type="text" class="competitor" name="addmore[0][competitor2]"  placeholder="Competitor Name" required>
                            </th>
                            <th>
                              <input type="text" class="competitor" name="addmore[0][competitor3]"  placeholder="Competitor Name" required>
                            </th>
                            <!-- <th>
                              <input type="text" class="competitor" name="addmore[0][competitor4]"  placeholder="Competitor Name" id="competitor4Id" disabled>
                            </th>
                            <th>
                              <input type="text" class="competitor" name="addmore[0][competitor5]"  placeholder="Competitor Name" id="competitor5Id" disabled>
                            </th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <input type="hidden" name="addmore[1][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                            <input type="hidden" name="addmore[1][comparison_name]" value="Comparison Matrix" class="form-control" />
                            <td>
                              <input type="text" class="two mt-1 aspect" name="addmore[1][aspect]" placeholder="Aspect/Feature" required>
                            </td>
                            <td>
                              <select id="emoji" name="addmore[1][competitor1]" style="width: 100px; height: 50px;">
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                              </select>
                            </td>
                            <td>
                              <select id="emoji" name="addmore[1][competitor2]" style="width: 100px; height: 50px;">
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                              </select>
                              <!-- <div class="dropup">
                                <button type="button" class="" data-toggle="dropdown" style="border: none; background: none;">
                                  <img src="{{asset('modalDocument/choose-icon.svg')}}">
                                </button>
                                <div class="dropdown-menu" style="margin-left: -3.25rem; background-color: #795CC2; width: 50px; height: 56px;">
                                  <select class="select-store">
                                    <option value="/">Store Finder</option>
                                    <option value="/foo">foo</option>
                                    <option value="/beta">beta</option>
                                  </select>
                                </div>
                              </div> -->
                            </td>
                            <td>
                              <select id="emoji" class="three" name="addmore[1][competitor3]" style="width: 100px; height: 50px;">
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                              </select>
                            </td>
                          <!--   <td>
                              <select id="emoji" name="addmore[1][competitor4]" style="width: 100px; height: 50px;" id="element4Id" disabled>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                              </select>
                            </td>
                             <td>
                               <select id="emoji" name="addmore[1][competitor5]" style="width: 100px; height: 50px;" id="elementId" disabled>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                              </select>
                             </td> -->
                          </tr>
                        </tbody>
                      </table>
                      <button type="button" class="four btn btn-link add-row" name="add" id="add" style="margin-top: -1.5rem; margin-left: 2.5rem;"><img src="{{asset('modalDocument/add-row.svg')}}"></button>
                      <div class="mt-5 btn-save"><button for="form1" type="submit" class="save-style">Save</button></div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-3">
              <div class="side-bar">
                <center>
                  <img class="side-ilustrasi" style="margin-top: 21rem;" src="{{asset('modalDocument/comparison-matrix.svg')}}" alt="Card image cap">
                </center>
                <div class="mt-3 ml-4 mr-4 side-color">
                  <span class="side-title">Comparison Matrix</span><span class="side-explanation"> is a great tool to visualize business strategy building into 4 parts (strength, weakness, opportunity, and threat)</span>
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
   @foreach ($dataProject as $datas)
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
  <script type="text/javascript">
    window.tour = new Tour({
      padding: 0,
      nextText: 'More',
      doneText: 'Done',
      prevText: 'Less',
      tipClasses: 'tip-class active',
      steps: [
        {
          element: ".one",
          title: "First",
          description: "Write your competitor name",
          position: "right"
        },
        {
          element: ".two",
          title: "Two",
          description: "Define the aspect or feature that will be compared",
          position: "bottom"
        },
        {
          element: ".three",
          title: "Three",
          description: "Select the icon, check for yes and X for no",
          position: "bottom"
        },
        {
          element: ".four",
          title: "Four",
          description: "Click this button to add more new aspects",
          position: "right"
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
  </script>
 
  <script type="text/javascript">
   
    var i = 1;
       
    $("#add").click(function(){
   
        ++i;
        $("#dynamicTable").append('<tr><input type="hidden" name="addmore['+i+'][id_project]" value="{{ $projectName['id'] }}" class="form-control" /><input type="hidden" name="addmore['+i+'][comparison_name]" value="Comparison Matrix" class="form-control" /><td><span class="remove remove-row">x</span><input type="text" class="mt-1 aspect" name="addmore['+i+'][aspect]" placeholder="Aspect/Feature"></td><td><select id="emoji" name="addmore['+i+'][competitor1]" style="width: 100px; height: 50px;"><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor2]" style="width: 100px; height: 50px;"><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor3]" style="width: 100px; height: 50px;"><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td></tr>');
    });
   
    $(document).on('click', '.remove-row', function(){  
         $(this).parents('tr').remove();
    });  
   
  </script>
  <!-- <td><select id="emoji" name="addmore['+i+'][competitor4]" style="width: 100px; height: 50px;" disabled><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor5]" style="width: 100px; height: 50px;" disabled><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td> -->
</body>

</html>
