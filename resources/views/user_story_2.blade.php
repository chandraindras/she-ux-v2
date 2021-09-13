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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/story.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
</head>

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
                          @foreach ($dataStory as $story)
                          <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          @foreach ($projectName as $project_name)
                            <span class="ml-1"><a href="{{ url('/detail-project', $project_name->id) }}" style="text-decoration: none;" class="nav-title">{{ $project_name->project_name }}</a></span>
                          <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                          <span class="nav-document-name ml-1">{{ $story->story_name }}</span>
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
                      <div>
                        <form method="POST" action="{{ url('/detail-project/userStory/add', $story->id_project) }}">
                          @csrf
                          <input type="hidden" name="id_project" value="{{ $story->id_project }}" hidden>
                          <input type="hidden" name="story_name" value="{{ $story->story_name }}" hidden>
                            <div>
                              <span class="input-title">As a
                                <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="'As a' is defined as a user that sharing their story. Usually 'as a' is written with the work of the user, for example, programmer, student, driver, seller, and so on.">
                                <i class="fas fa-question-circle"></i>
                              </button>
                              </span><br>
                              
                              <input type="text" class="input-add" tabindex="1" name="as_a" placeholder="ex : as a user" required>
                            </div>
                            <div class="i-want-position">
                              <span class="input-title">I want
                                <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="I want described as a feature or function that will be developed in the future. For example, 'I want to upload photos', 'I want to be able to assign different privacy levels to my photos'.">
                                <i class="fas fa-question-circle"></i>
                              </button>
                              </span><br>
                              <input type="text" class="input-add" tabindex="2" name="i_want" placeholder="ex : i want to upload photo" required>
                            </div>
                            <div class="so-that-position">
                              <span class="input-title">So That
                                <button class="tool ml-1 button-delete" style="text-align: justify;" data-tip="So that, are the results obtained after the requested function is executed. For example, 'I can share photos with others', 'I can make sure they are appropriate'.">
                                <i class="fas fa-question-circle"></i>
                              </button>
                              </span><br>
                              <input type="text" class="input-add" tabindex="3" name="so_that" placeholder="ex : so that i can share photo with others" required>
                            </div>
                            <div class="button-position">
                              <button type="submit">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                        </form>
                      </div>
                      <div class="mt-6">
                        <table class="table table-striped" id="table-userstory" width="1100px">
                          <thead>
                            <tr>
                              <th class="thead-table-document" width="300px">As A</th>
                              <th class="thead-table-document" width="300px">I Want</th>
                              <th class="thead-table-document" width="300px">So That</th>
                              <th class="thead-table-document"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($listData as $list)
                            <tr>
                              <input type="hidden" class="serdelete_val_id" value="{{$list->id_story}}">
                              <td class="td-font">{{ $list->as_a }}</td>
                              <td class="td-font">{{ $list->i_want }}</td>
                              <td class="td-font">{{ $list->so_that }}</td>
                              <td>
                                <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditModal-{{ $list->id_story }}" >
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                </a>
                                <a type="button" href="{{ url('/userStory/destroy', $list->id_story) }}" class="color-primary ml-3">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="col-md-3">
              <div class="side-bar">
                <center>
                  <img class="side-ilustrasi" src="{{asset('modalDocument/user-story.svg')}}" alt="Card image cap">
                </center>
                <div class="mt-3 ml-4 mr-4 side-color">
                  <span class="side-title">User Story</span><span class="side-explanation"> are descriptions of system requirements in natural language that can be easily understood by end users who do not have an IT background</span>
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

  <!-- MODAL EDIT STORY -->
  @foreach ($listData as $data)
  <div class="modal fade" id="EditModal-{{ $data->id_story }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Story</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="edit-form" action="{{ url('/detail-project/userStory/update', $data->id_story) }}">
              @csrf
              <div class="ml-3 input-edit">As a</div>
              <input type="text" class="ml-3 mt-2" style="width: 92%;border-radius: 5px; height: 35px; border-color: #4c12ab;" name="as_a" value="{{ $data->as_a }}">
              <div class="ml-3 mt-3 input-edit">I want</div>
              <input type="text" class="ml-3 mt-2" style="width: 92%;border-radius: 5px; height: 35px; border-color: #4c12ab;" name="i_want" value="{{ $data->i_want }}">
              <div class="ml-3 mt-3 input-edit">So that</div>
              <input type="text" class="ml-3 mt-2" style="width: 92%;border-radius: 5px; height: 35px; border-color: #4c12ab;" name="so_that" value="{{ $data->so_that }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal"><span style="position: relative;left: -10px; top: -4px; font-size: 18px;">Close</span> </button>
          <button type="submit" class="btn-primary-2"><span style="position: relative;top: -4px;">Update</span></button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  <!-- END MODAL EDIT STORY -->
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
      </div>
    </div>
  </div>
  @endforeach
  <script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
 <script src="{{ asset('Dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('Dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('Dashboard/js/template.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('DataTable/datatables.min.js') }}"></script>

</body>

</html>
