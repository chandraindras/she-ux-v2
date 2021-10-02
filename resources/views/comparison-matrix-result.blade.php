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
        /*position: relative;
        left: -5rem;*/
        margin-left: -1rem;
        margin-top: -2rem;
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
                          <a type="button" href="{{ route('cetak-lean-canvas', $dataComparison['id_project']) }}"><img class="ml-2 mb-1" src="{{asset('modalDocument/export.svg')}}"></a>
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
                    <form id="update_data" class="multiForms" action="{{ url('/updatecomparison', $projectName['id']) }}" method="POST">
                      @csrf
                      <!-- <input name="Col1" type="checkbox" checked="checked" /> -->
                      <!-- <button type="button" class="btn btn-link hide-column" data-column="#column-a" name="add" id="btnHide" style="margin-top: -1.5rem; margin-left: -1.5rem;"><img src="{{asset('modalDocument/add-row.svg')}}"></button> -->
                      <table class="demo-table table-hideable">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($listComparison as $key => $data)
                          @php
                            if ( $i == 1 ) {
                          @endphp
                        <thead>
                          <tr>
                            <input type="hidden" name="updatemore[{{ $key }}][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                            <input type="hidden" name="updatemore[{{ $key }}][comparison_name]" value="Comparison Matrix" class="form-control" />
                            <input type="hidden" name="updatemore[{{ $key }}][id_comparison]" value="{{$data->id_comparison}}">
                            <th class="call-tooltip bottom">
                              {{ $data->aspect }}
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
                            </th>
                            <th>
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor1]" placeholder="Competitor Name" value="{{ $data->competitor1 }}" required>
                            </th>
                            <th>
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor2]" placeholder="Competitor Name" value="{{ $data->competitor2 }}" required>
                            </th>
                            <th>
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor3]"  placeholder="Competitor Name" value="{{ $data->competitor3 }}" required>
                            </th>
                            <!-- <th id="column-a">
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor4]"  placeholder="Competitor Name" value="{{ $data->competitor4 }}" id="competitor4Id" disabled>
                            </th>
                            <th id="column-b">
                              <input type="text" class="competitor" name="updatemore[{{ $key }}][competitor5]"  placeholder="Competitor Name" value="{{ $data->competitor5 }}" id="competitor5Id" disabled>
                            </th> -->
                          </tr>
                        </thead>
                        @php
                            } else if ($i > 1) {
                              $j = 0;
                              $j = $j + 1;
                          @endphp
                        <tbody>
                          <tr>
                            <!-- <input type="hidden" name="updatemore[{{ $key }}][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                            <input type="hidden" name="updatemore[{{ $key }}][comparison_name]" value="Comparison Matrix" class="form-control" /> -->
                            <input type="hidden" name="updatemore[{{ $key }}][id_comparison]" value="{{$data->id_comparison}}">
                            <input type="hidden" class="serdelete_val_id" value="{{$data->id_comparison}}">
                            <td>
                              <a type="button" class="servideletebtn"><span class="remove">x</span></a><input type="text" class="mt-1 aspect" name="updatemore[{{ $key }}][aspect]" placeholder="Aspect/Feature" value="{{ $data->aspect }}" required>
                            </td>
                            <td>
                              <select id="emoji" name="updatemore[{{ $key }}][competitor1]">
                                @php
                                  if($data->competitor1 == "✔") {
                                @endphp
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                  } else{
                                @endphp
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                  }
                                @endphp
                              </select>
                            </td>
                            <td>
                              <select id="emoji" name="updatemore[{{ $key }}][competitor2]">
                                @php
                                  if($data->competitor2 == "✔") {
                                @endphp
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                  } else{
                                @endphp
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                  }
                                @endphp
                              </select>
                            </td>
                            <td>
                              <select id="emoji" name="updatemore[{{ $key }}][competitor3]">
                                @php
                                  if($data->competitor3 == "✔") {
                                @endphp
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                  } else{
                                @endphp
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                  }
                                @endphp
                              </select>
                            </td>
                            <!-- <td id="column-a">
                              <select id="emoji" name="updatemore[{{ $key }}][competitor4]" disabled>
                                @php
                                  if($data->competitor4 == "✔") {
                                @endphp
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                  } else{
                                @endphp
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                  }
                                @endphp
                              </select>
                            </td> -->
                            <!--  <td>
                               <select id="emoji" class="" name="updatemore[{{ $key }}][competitor5]" disabled>
                                @php
                                  if($data->competitor5 == "✔") {
                                @endphp
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                @php
                                  } else{
                                @endphp
                                <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                @php
                                  }
                                @endphp
                              </select>
                             </td> -->
                          </tr>
                        </tbody>
                        @php
                            }
                            $i = $i + 1;
                          @endphp
                          @endforeach
                      </table>
                    <!-- </form> -->
                      <!-- <form id="add_data" class="multiForms" action="{{ url('/tambahcomparison', $projectName['id']) }}" method="POST">
                        @csrf -->
                        <div>
                          <table class="demo-table-2 table-hideable" id="dynamicTable">
                          <tbody>
                            <tr>
                              <input type="hidden" name="addmore[0][id_project]" value="{{ $projectName['id'] }}" class="form-control" />
                              <input type="hidden" name="addmore[0][comparison_name]" value="Comparison Matrix" class="form-control" />
                              <td>
                                <input type="text" class="mt-1 aspect" name="addmore[0][aspect]" placeholder="Aspect/Feature">
                              </td>
                              <td>
                                <select id="emoji" name="addmore[0][competitor1]" style="width: 165px; height: 50px;">
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                </select>
                              </td>
                              <td>
                                <select id="emoji" name="addmore[0][competitor2]" style="width: 165px; height: 50px;">
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                </select>
                              </td>
                              <td>
                                <select id="emoji" name="addmore[0][competitor3]" style="width: 165px; height: 50px;">
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                </select>
                              </td>
                              <!-- <td>
                                <select id="emoji" name="addmore[0][competitor4]" style="width: 165px; height: 50px;" id="element4Id" disabled>
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                </select>
                              </td>
                               <td>
                                 <select id="emoji" name="addmore[0][competitor5]" style="width: 165px; height: 50px;" id="elementId" disabled>
                                  <option class="emoji-style" value="&#x2714;">&#x2714;</option>
                                  <option class="emoji-style" value="&#x274C;">&#x274C;</option>
                                </select>
                               </td> -->
                            </tr>
                          </tbody>
                          </table>
                          <button type="button" class="btn btn-link add-row" name="add" id="add" style="margin-top: -1.5rem; margin-left: 2.5rem;"><img src="{{asset('modalDocument/add-row.svg')}}"></button>
                        </div>
                        <div class="mt-3 btn-save"><button for="update_data" name="submit" type="submit" class="save-style">Update</button></div>
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
  <script src="Scripts/jquery-1.3.2.js" type="text/javascript"></script>

  <script type="text/javascript">

    var i = 0;

    $("#add").click(function(){

        ++i;
        $("#dynamicTable").append('<tr><input type="hidden" name="addmore['+i+'][id_project]" value="{{ $projectName['id'] }}" class="form-control" /><input type="hidden" name="addmore['+i+'][comparison_name]" value="Comparison Matrix" class="form-control" /><td><span class="remove remove-row">x</span><input type="text" class="mt-1 aspect" name="addmore['+i+'][aspect]" placeholder="Aspect/Feature"></td><td><select id="emoji" name="addmore['+i+'][competitor1]" ><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor2]" ><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor3]"><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td></tr>');
    });

    $(document).on('click', '.remove-row', function(){
         $(this).parents('tr').remove();
    });

  </script>

   <!-- <td><select id="emoji" name="addmore['+i+'][competitor4]" disabled><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><td><select id="emoji" name="addmore['+i+'][competitor5]" disabled><option class="emoji-style" value="&#x2714;">&#x2714;</option><option class="emoji-style" value="&#x274C;">&#x274C;</option></select></td><script type="text/javascript">
        $(document).on("click", "[data-column]", function () {
          var button = $(this),
          header = $(button.data("column")),
          table = header.closest("table"),
          index = header.index() + 1, // convert to CSS's 1-based indexing
          selector = "tbody tr td:nth-child(" + index + ")",
          column = table.find(selector).add(header);

          ('#column-b').toggleClass("hidden");
          column.toggleClass("hidden");
    });
  </script> -->

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
                  text: "Once deleted, you will not be able to recover this Data!",
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
                        url: "/comparison-destroy/"+delete_id,
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
