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
  <link rel="stylesheet" href="{{ asset('Dashboard/css/persona.css') }}">
  <link rel="stylesheet" href="{{ asset('Dashboard/css/tooltip-persona.css') }}">
  <link rel="stylesheet" href="{{ asset('bar/bars.css') }}">
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
      @foreach ($dataUserPersona as $persona)
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
                          <span class=""><a href="{{ url('/home') }}" style="text-decoration: none;" class="nav-title">Dashboard</a></span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          @foreach ($projectName as $project_name)
                            <span class="ml-1"><a href="{{ url('/detail-project', $project_name->id) }}" style="text-decoration: none;" class="nav-title">{{ $project_name->project_name }}</a></span>
                          <img class="ml-2 ml-1" src="{{asset('modalDocument/right.svg')}}">
                          <span class="nav-document-name ml-1">{{ $persona->persona_name }}</span>
                          <img class="ml-2" src="{{asset('modalDocument/right.svg')}}">
                          <img class="ml-2 mb-1" src="{{asset('modalDocument/export.svg')}}">
                          <a type="button" data-toggle="modal" data-target="#inviteMember-{{$project_name->id}}" class="color-primary"><img class="ml-2 example-css-selector-3" src="{{asset('modalDocument/add member.svg')}}"></a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-right: 3rem;">
                  <div class="col-xl-12">
                    <div class="row">
                      <input type="hidden" name="id_persona" id="postId" value="{{ $persona->id_persona }}">
                      <div class="col-xl-12 grid-margin stretch-card">
                        <div class="card" id="pname" style="height: 50px; background: #7E53C4;">
                          <div class="mt-2 ml-4 call-tooltip bottom" id="personaName" style="">
                           <span class="persona-name" style="color: #fff">{{ $persona->persona_name }}</span> 
                           <a type="button" class="color-edit ml-3" onclick="showInputName()" >
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <div class="tooltip" style="margin-left: 6rem; margin-top: 1rem; width: 400px; height: 420px; z-index: 1;">
                              <br>
                              <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                              <br>
                              <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                Describe this persona like a real person. One of the things that is needed is basic information. The analogy is the ID Card, on the ID Card is always displayed a photo and short demographics (name,occupation), so that it makes other people know who we are. With these demographics, we can classify or categorize our users to be grouped into smaller clusters so that the purpose of the user persona can be more detailed or narrowed to objectives.
                              </span>
                              <br><br>
                              <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                              <ul style="color: #fcfcfc;">
                                <li style="color: #fcfcfc;">Name => Can be written in groups (Ex: 2018 IT Hijab Student, UX Designer Maulidan Games) or individually (Ex: John Dae, Winter)</li>
                                <li style="color: #fcfcfc;">Avatar => A profile picture that describe persona in real life.</li>
                                <li style="color: #fcfcfc;">Demography => Write down the person's age in the range (Ex: 18-25), occupation, status (single or not), and current location.
                            </div>
                          </div>
                          <div class="mt-2 ml-4" id="inputPersonaName" style="">
                          <form method="POST" action="{{ url('/persona/edit-name', $persona->id_persona) }}">
                            @csrf
                            <input type="text" name="persona_name" style="position: relative;top: -5px;" class="form-edit" value="{{ $persona->persona_name }}">
                            <button type="submit" class="button-edit" style="height: 39px; position: relative; top: -4px; left: 1px;">
                              <i class="fas fa-check"></i>
                            </button>
                            <a style="position: relative;top: -15px; left: -50px;" type="button" class="color-edit ml-7" onclick="closeInputName()" >
                                <i class="fas fa-times"></i>
                            </a>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: -1rem; border: #7E53C4;">
                      <div class="col-xl-2 grid-margin stretch-card" style="max-width: 334.5px;">
                        <div class="card" style="border-left-color: #7E53C4; background: #fff;">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <form id="target" method="POST" action="{{ url('persona/edit-avatar', $persona->id_persona) }}" enctype="multipart/form-data">
                                  @csrf
                                <div class="card container-img">
                                  <img class="image"  src="{{asset('uploads/persona/' . $persona->avatar)}}" id="upfile1" style="cursor:pointer" style="width:300px; height:300px;object-fit:cover;">
                                  <div class="middle" style="margin-left: 5rem; ">
                                    <input  type="file" id="file1" value="Go" name="image" accept="image/*" capture/>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-lg-12">
                                <div class="card" style="background: #7E53C4; width: 275px; min-height: 70px;">
                                  <div class="card-body" id="quote">
                                    <img style="position: relative;top: -1.3rem; left: -1.3rem;" src="{{asset('modalDocument/quote-down.svg')}}" width="15" height="15">
                                    <a type="button" class="color-edit ml-3" style="position: relative;left: 180px; top: -25px;" onclick="showInputQuote()" >
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <div style="position: relative; top: -1.8rem;">                                      
                                        <span class="persona-quote" style="color: #fff;">{{ $persona->quote }}</span>
                                    </div>
                                    <img style="position: relative;left: -8rem;" src="{{asset('modalDocument/quote-up.svg')}}" width="15" height="15">
                                  </div>
                                  <div class="card-body" id="inputQuote">
                                    <div class="mt-2">
                                      <img style="position: relative;top: -1.3rem; left: -1.3rem;" src="{{asset('modalDocument/quote-down.svg')}}" width="15" height="15">
                                      <a style="position: relative;left: 130px; top: -18px;" type="button" class="color-edit ml-7" onclick="closeInputQuote()" >
                                          <i class="fas fa-times"></i>
                                      </a>
                                      <div style="position: relative; top: -1.8rem;"> 
                                        <form method="POST"action="{{ url('/persona/edit-quote', $persona->id_persona) }}">  
                                        @csrf                                   
                                        <center>
                                          <textarea name="quote" id="postQuote" class="input-style persona-quote" style="width: 210px; min-height: 70px;" placeholder="Quote of the day">{{ $persona->quote }}</textarea>
                                        </center>
                                      </div>
                                      <div>
                                        <center><button class="update-button" type="submit" value="submit">Update</button></center>
                                      </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-12">
                                <div class="card" style="background: #fff; width: 275px;">
                                  <div class="" id="demography">
                                    <a type="button" class="color-edit ml-3" style="position: relative;left: 230px; top:5px;" onclick="showInputDemography()" >
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <div style="margin-left: 6.45rem; margin-top: 0.5rem;">
                                      <span style="font-size: 16px;">Age : </span>
                                      <input class="input-demography" id="postAge" type="text" name="age" style="width: 50px;" value="{{ $persona->age }}">
                                      <span>y.o</span>
                                    </div>
                                    <div class="mt-2" style="margin-left: 2.8rem;">
                                      <span style="font-size: 16px;">Occupation : </span>
                                      <input class="input-demography" value="{{ $persona->work }}" id="postWork" value="UX Designer" type="text" name="work" style="width: 120px;">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.9rem;">
                                      <span style="font-size: 16px;">Status : </span>
                                      <input class="input-demography" value="{{ $persona->family }}" id="postStatus" value="Single" type="text" name="family" style="width: 120px;">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.1rem;">
                                      <span style="font-size: 16px;">Location : </span>
                                      <input class="input-demography" id="postLocation" value="{{ $persona->location }}" value="Surabaya" type="text" name="location" style="width: 120px;">
                                    </div>
                                  </div>
                                  <div class="" id="inputDemography">
                                    <a type="button" class="color-edit ml-3" style="position: relative;left: 230px; top:5px;" onclick="closeInputDemography()" >
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <form method="POST" action="{{ url('/persona/edit-demography', $persona->id_persona) }}">
                                      @csrf
                                    <div style="margin-left: 6.45rem; margin-top: 0.5rem;">
                                      <span style="font-size: 16px;">Age : </span>
                                      <input class="input-demography" id="postAge" type="text" name="age" style="width: 50px;" value="{{ $persona->age }}">
                                      <span>y.o</span>
                                    </div>
                                    <div class="mt-2" style="margin-left: 2.8rem;">
                                      <span style="font-size: 16px;">Occupation : </span>
                                      <input class="input-demography" value="{{ $persona->work }}" id="postWork" value="UX Designer" type="text" name="work" style="width: 120px;">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.9rem;">
                                      <span style="font-size: 16px;">Status : </span>
                                      <input class="input-demography" value="{{ $persona->family }}" id="postStatus" value="Single" type="text" name="family" style="width: 120px;">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.1rem;">
                                      <span style="font-size: 16px;">Location : </span>
                                      <input class="input-demography" id="postLocation" value="{{ $persona->location }}" value="Surabaya" type="text" name="location" style="width: 120px;">
                                    </div>
                                    <div class="mt-4">
                                      <center><button class="update-button" type="submit" value="submit">Update</button></center>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-12">
                                <div id="socialMedia" class="card" style="background: #fff; width: 275px; height: 150px;">
                                  <div class="mt-1 call-tooltip top">
                                    <center>
                                      <span class="social-media-title">Social Media</span>
                                      <a type="button" class="color-edit ml-2" onclick="showInputSocialMedia()" >
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                      </a>
                                    </center>
                                    <div class="tooltip" style="margin-left: 2rem; margin-top: -19rem; width: 320px; height: 300px; z-index: 1;">
                                      <br>
                                      <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                                      <br>
                                      <span class="mt-4" style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                        If we're going to market and sell our product, we should know how and where they get information everyday. In an effort to meet them where they are, you can use these insights to determine where your business should have an active presence.
                                      </span>
                                      <br><br>
                                      <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                                      <br>
                                      <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">When you do user research, ask them which social media they use the most or you can do an analysis based on their age / generation. Next, check the social media logos that have been provided.</span>
                                    </div>
                                  </div>
                                  <div class="mt-3 ml-2">
                                    @inject('mediaService', 'App\Services\SosialMediaCheck')
                                    <input type="checkbox" id="media1" name="media[]" value="instagram" style="display: none;" {{ $mediaService->isMediaTypeChecked($persona->media, 'instagram') ? 'checked' : '' }} /><label for="media1" ><img src="{{asset('modalDocument/Social Media/IG.svg')}}" width="50" height="50" /></label>
                                    <div style="position: relative; top: -1rem; left: 50px;">
                                      <input type="checkbox" id="media2" name="media[]" value="facebook" style="display: none;" {{ $mediaService->isMediaTypeChecked($persona->media, 'facebook') ? 'checked' : '' }}/><label for="media2"><img src="{{asset('modalDocument/Social Media/FB.svg')}}" width="50" height="50" /></label>
                                    </div>
                                    <div style="position: relative;top: -7.25rem; left: 100px;">
                                      <input type="checkbox" id="media3" name="media[]" value="whatsapp" style="display: none;" {{ $mediaService->isMediaTypeChecked($persona->media, 'whatsapp') ? 'checked' : '' }}/><label for="media3"><img src="{{asset('modalDocument/Social Media/WA.svg')}}" width="50" height="50" /></label>
                                    </div>
                                    <div style="position: relative;top: -8.25rem; left: 150px;">
                                      <input type="checkbox" id="media4"  name="media[]" value="twitter" style="display: none;" {{ $mediaService->isMediaTypeChecked($persona->media, 'twitter') ? 'checked' : '' }}/><label for="media4"><img src="{{asset('modalDocument/Social Media/TW.svg')}}" width="50" height="50" /></label>
                                    </div>
                                    <div  style="position: relative;top: -14.5rem; left: 200px;">
                                      <input type="checkbox" id="media5" name="media[]" value="line" style="display: none;" {{ $mediaService->isMediaTypeChecked($persona->media, 'line') ? 'checked' : '' }}/><label for="media5"><img src="{{asset('modalDocument/Social Media/Line.svg')}}" width="50" height="50" /></label>
                                    </div>
                                  </div>
                                </div>
                                <div id="inputSocialMedia" class="card" style="background: #fff; width: 275px; height: 150px;">
                                  <div class="mt-1">
                                    <center>
                                      <span class="social-media-title">Social Media</span>
                                      <a type="button" class="color-edit ml-2" onclick="closeInputSocialMedia()" >
                                        <i class="fas fa-times"></i>
                                      </a>
                                    </center>
                                  </div>
                                  <div class="mt-3 ml-2">
                                    <form method="POST" action="{{ url('/persona/edit-media', $persona->id_persona) }}">
                                      <input type="checkbox" id="media1" name="media[]" value="instagram" style="display: none;" /><label for="media1" ><img src="{{asset('modalDocument/Social Media/IG.svg')}}" width="50" height="50" /></label>
                                      <div style="position: relative; top: -1rem; left: 50px;">
                                        <input type="checkbox" id="media2" name="media[]" value="facebook" style="display: none;" /><label for="media2"><img src="{{asset('modalDocument/Social Media/FB.svg')}}" width="50" height="50" /></label>
                                      </div>
                                      <div style="position: relative;top: -7.25rem; left: 100px;">
                                        <input type="checkbox" id="media3" name="media[]" value="whatsapp" style="display: none;" /><label for="media3"><img src="{{asset('modalDocument/Social Media/WA.svg')}}" width="50" height="50" /></label>
                                      </div>
                                      <div style="position: relative;top: -8.25rem; left: 150px;">
                                        <input type="checkbox" id="media4"  name="media[]" value="twitter" style="display: none;" /><label for="media4"><img src="{{asset('modalDocument/Social Media/TW.svg')}}" width="50" height="50" /></label>
                                      </div>
                                      <div  style="position: relative;top: -14.5rem; left: 200px;">
                                        <input type="checkbox" id="media5" name="media[]" value="line" style="display: none;" /><label for="media5"><img src="{{asset('modalDocument/Social Media/Line.svg')}}" width="50" height="50" /></label>
                                      </div>
                                      <!-- <div style="position: relative;top: -170px;">
                                        <center><button class="update-button" type="submit" value="submit">Update</button></center>
                                      </div> -->
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-5 grid-margin stretch-card" style="max-width: 550px;">
                        <div class="card" style="background: #fff;">
                          <div class="card-body">
                            <div class="row">
                              <div class="card" style="background: #F1EDF5; width: 500px; height: 280px;">
                                <div id="bio">
                                  <div class="ml-3 mt-1 call-tooltip right">
                                    <span class="bio-title">BIO</span>
                                    <a type="button" class="color-edit ml-3" onclick="showInputBio()" >
                                      <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="tooltip" style="margin-left: -5rem; margin-top: -3rem; width: 400px; height: 270px; z-index: 1;">
                                     <br>
                                      <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                                      <br>
                                      <span class="mt-4" style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                        A biography can help you to see how your persona lives. This will make it easier for you to get to know more about who the potential users of your product are.
                                      </span>
                                      <br><br>
                                      <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                                      <br>
                                      <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">Write the bio in a short paragraph that describes the user journey. Give a little backstory to make the person relatable. What was their childhood like? Why did they choose their current job? How do they spend their free time? These tiny details could influence strategic choices down the road. Highlight factors of the user’s personal and professional life that make this user an ideal customer of your product.</span>
                                    </div>
                                  </div>
                                  <div class="ml-3">
                                    <span class="bio-textarea">{{ $persona->bio }}</span>
                                  </div>
                                </div>
                                <div id="inputBio">
                                  <div class="ml-3 mt-1">
                                    <span class="bio-title">BIO</span>
                                    <a style="position: relative;left: 400px;" type="button" class="color-edit ml-3" onclick="closeInputBio()" >
                                      <i class="fas fa-times"></i>
                                    </a>
                                  </div>
                                  <div class="ml-3">
                                    <form method="POST" action="{{ url('/persona/edit-bio', $persona->id_persona) }}">
                                      @csrf
                                      <textarea style="text-align: justify; " name="bio" id="postBio" class="mt-2 bio-textarea">{{ $persona->bio }}</textarea>
                                      <div style="margin-top: -1.5rem;">
                                        <center><button class="update-button" type="submit" value="submit">Update</button></center>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; height: 300px;">
                                <div id="barMotivation">
                                  <div class="ml-3 mt-1 call-tooltip top">
                                    <span class="bio-title">MOTIVATION</span>
                                    <a type="button" class="color-edit ml-3" onclick="showInputMotivation()" >
                                      <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="tooltip" style="margin-left: -3.5rem; margin-top: -16rem; width: 400px; height: 250px; z-index: 1;">
                                      <br>
                                      <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                                      <br>
                                      <span class="mt-4" style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                        Motivation helps you get inside the customer’s head and understand how they think. For example, would a customer be more likely to buy a product that improves their career or their personal life? It depends on which motivates them more.
                                      </span>
                                      <br><br>
                                      <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                                      <br>
                                      <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">What inspires your persona to take action? Is he motivated more by fear or growth? Achievement or social? Write down the percentage of each motivation that suits your persona. The percentage will be converting into a bar meter.</span>
                                    </div>
                                  </div>
                                  <div class="ml-3 mt-3">
                                    <div class='bar_group'>
                                      <div class="bar_group__bar thin c_blue" tooltip="true" unit="%" value="100" hidden=""></div>
                                      <div class="bar_group__bar thin c_blue" tooltip="true" label="Fear" show_values="true" unit="%" value="{{$persona->fear}}"></div>
                                      <div class="bar_group__bar thin c_blue" tooltip="true" label="Achievement" show_values="true" unit="%" value="{{$persona->achievement}}"></div>
                                      <div class="bar_group__bar thin c_blue" tooltip="true" label="Growth" show_values="true" unit="%" value="{{$persona->growth}}"></div>
                                      <div class="bar_group__bar thin c_blue" tooltip="true" label="Social" show_values="true" unit="%" value="{{$persona->social}}"></div>
                                    </div>
                                  </div>
                                </div>
                                <div id="inputMotivation">
                                  <div class="ml-3 mt-1">
                                    <span class="bio-title">MOTIVATION</span>
                                    <a style="position: relative;left: 320px;" type="button" class="color-edit ml-3" onclick="closeInputMotivation()" >
                                      <i class="fas fa-times"></i>
                                    </a>
                                    <div class="ml-1 mt-3">
                                      <form method="POST" action="{{url('/persona/edit-motivation', $persona->id_persona)}}">
                                        @csrf
                                      <div>
                                        <span class="motivation-label">Fear</span>
                                        <input class="ml-7 motivation-input allownumericwithdecimal" type="text"  name="fear"value="{{$persona->fear}}">
                                        <span style="font-size: 16px; font-weight: bold;">%</span>
                                      </div>
                                      <div class="mt-3">
                                        <span class="motivation-label">Achievement</span>
                                        <input name="achievement" class="ml-2 motivation-input allownumericwithdecimal" type="text" max-value="100" value="{{$persona->achievement}}">
                                        <span style="font-size: 16px; font-weight: bold;">%</span>
                                      </div>
                                      <div class="mt-3">
                                        <span class="motivation-label">Growth</span>
                                        <input name="growth" class="motivation-input allownumericwithdecimal" style="margin-left: 3.5rem;" type="text" value="{{$persona->growth}}">
                                        <span style="font-size: 16px; font-weight: bold;">%</span>
                                      </div>
                                      <div class="mt-3">
                                        <span class="motivation-label">Social</span>
                                        <input name="social" class="motivation-input allownumericwithdecimal" style="margin-left: 4.05rem;" type="text" value="{{$persona->social}}">
                                        <span style="font-size: 16px; font-weight: bold;">%</span>
                                      </div>
                                      <div class="mt-4">
                                        <span style="font-size: 14px; font-style: italic; color: #7E53C4; font-weight: bold;">NOTE - you only allowed filling the field with numbers or decimal. The result will be visualizating in meter bar</span>
                                      </div>
                                      <div>
                                        <center><button class="mt-4 update-button" type="submit" value="submit">Update</button></center>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="card" style="background: #fff; width: 500px; height: 120px;">
                                <div class="">
                                  <div class="ml-3 mt-1 ">
                                    <span class="bio-title">DEVICE USED</span>
                                    
                                  </div>
                                  <div class="ml-3 mt-3">
                                    @inject('somethingService', 'App\Services\SomethingService')
                                    <input style="display: none;" type="checkbox" id="computer" name="device[]" value="computer" {{ $somethingService->isDeviceTypeChecked($persona->device, 'computer') ? 'checked' : '' }}  /><label for="computer" ><img src="{{asset('modalDocument/device/computer.svg')}}"  /></label>

                                    <input type="checkbox" id="laptop" name="device[]" value="laptop" style="display: none;" {{ $somethingService->isDeviceTypeChecked($persona->device, 'laptop') ? 'checked' : '' }}  /><label for="laptop" ><img class="ml-5" src="{{asset('modalDocument/device/laptop.svg')}}" /></label>

                                    <input type="checkbox" id="mobile" name="device[]" value="mobile" style="display: none;" {{ $somethingService->isDeviceTypeChecked($persona->device, 'mobile') ? 'checked' : '' }} /><label for="mobile" ><img class="ml-5" src="{{asset('modalDocument/device/mobile.svg')}}"  /></label>

                                    <input type="checkbox" id="tablet" name="device[]" value="tablet" style="display: none;" {{ $somethingService->isDeviceTypeChecked($persona->device, 'tablet') ? 'checked' : '' }} /><label for="tablet" ><img class="ml-5" src="{{asset('modalDocument/device/tablet.svg')}}" width="50" height="50" /></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-5 grid-margin stretch-card" style="max-width: 550px;">
                        <div class="card" style="background: #fff;">
                          <div class="card-body">
                            <div class="row">
                              <div class="card" style="background: #fff; width: 500px; min-height: 280px;">
                                <div class="">
                                  <div class="ml-3 mt-1 call-tooltip left">
                                    <span class="bio-title">GOALS</span>
                                    <div class="tooltip" style="margin-left: -3.5rem; margin-top: -16rem; width: 400px; height: 290px; z-index: 1;">
                                      <br>
                                      <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                                      <br>
                                      <span class="mt-4" style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                        Goals can help us see what the real goals of the users are. By knowing the user's goals, we can create features that suit their needs and can keep customers satisfied.
                                      </span>
                                      <br><br>
                                      <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                                      <br>
                                      <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">Find what is your persona looking for in a product? Do they want something that is easy to use? A device or service that achieves a specific goal? (These questions are critical to product development.)
                                      For example, if you sell smartphones, the motivational persona included here could be something like "I want to look cool in front of my friends because I use the latest gadgets" or "I want to be more productive with the help of a sophisticated cell phone."
                                      </span>
                                    </div>
                                  </div>
                                  </div>
                                  
                                  <div class="ml-3">
                                    <form method="post" action="{{ url('/persona/add-goal', $persona->id_persona) }}">
                                    @csrf
                                      <input type="text" id="postGoal" name="goal" class="goal-input" placeholder="">
                                      <button type="submit" class="add_button_goal button-style-dynamic">
                                        <i class="fas fa-plus"></i>
                                      </button>
                                    </form>
                                    <div class="wrap-goal mt-3">
                                      <table>
                                        <tbody>
                                          @php
                                          $goal = explode('+', $persona->goal);
                                          @endphp 
                                          @foreach ($goal as $key => $arrayGoal)
                                          <tr>
                                            <td class="table-body input-style-3" width="345" height="40">- {{ $arrayGoal }}</td>
                                            <td width="60">
                                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditGoal-{{ $persona->id_persona }}" >
                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                              </a>
                                            </td>
                                            <td>
                                              <form method="POST" action="{{ url('/persona/destroy-goal/'. $key.'/'. $persona->id_persona) }}">
                                               @csrf
                                                <button type="submit" class="button-delete">
                                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                              </form>
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
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; min-height: 280px;">
                                <div class="ml-4">
                                  <div class="ml-3 mt-1 call-tooltip left">
                                    <span class="bio-title">FRUSTATIONS</span>
                                    <div class="tooltip" style="margin-left: -3.5rem; margin-top: -16rem; width: 400px; height: 290px; z-index: 1;">
                                      <br>
                                      <span style="text-align: justify-all; font-size: 16px;color: #E086D3; font-weight: bold;">Why is this important ? </span>
                                      <br>
                                      <span class="mt-4" style="text-align: justify;color: #fcfcfc; font-size: 14px;">
                                        Here we see what makes this user persona difficult in achieving his Goals. From these pain points, we can make the solutions needed so that they want to use or buy our products and services. Goals and pain points are like two inseparable sides of a coin.
                                      </span>
                                      <br><br>
                                      <span style="text-align: justify-all; color: #E086D3;font-size: 16px; font-weight: bold;">How to write it ? </span>
                                      <br>
                                      <span style="text-align: justify;color: #fcfcfc; font-size: 14px;">What is preventing your persona from achieving his or her goals? What concerns does she have? What are his frustrations with current solutions already available? This section is key when it comes to honing the features and services of your product.
                                      </span>
                                    </div>
                                  
                                  </div>
                                  <div class="ml-3">
                                    <form method="post" action="{{ url('/persona/add-frustation', $persona->id_persona) }}">
                                    @csrf
                                      <input type="text" id="postGoal" name="frustation" class="goal-input" placeholder="">
                                      <button type="submit" class="add_button_goal button-style-dynamic">
                                        <i class="fas fa-plus"></i>
                                      </button>
                                    </form>
                                    <div class="wrap-goal mt-3">
                                      <table>
                                        <tbody>
                                          @php
                                          $frustation = explode('+', $persona->frustation);
                                          @endphp 
                                          @foreach ($frustation as $key => $arrayFrustation)
                                          <tr>
                                            <td class="table-body input-style-3" width="345" height="40">- {{ $arrayFrustation }}</td>
                                            <td width="60">
                                              <a type="button" class="color-edit ml-3" data-toggle="modal" data-target="#EditFrustation-{{ $persona->id_persona }}" >
                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                              </a>
                                            </td>
                                            <td>
                                              <form method="POST" action="{{ url('/persona/destroy-frustation/'. $key.'/'. $persona->id_persona) }}">
                                               @csrf
                                                <button type="submit" class="button-delete">
                                                  <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                                </button>
                                              </form>
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
                            <div class="row">
                              <div class="card" style="background: #fff; width: 500px; min-height: 150px;">
                                <div id="barPersonality">
                                  <div class="ml-3">
                                    <span class="bio-title">PERSONALITY</span>
                                     <a type="button" class="color-edit ml-3" onclick="showInputPersonality()" >
                                      <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                    </a>
                                  </div>
                                  <div class="ml-3 mt-1">
                                    <input type="hidden" name="personality" value="$persona->personality">
                                    @php
                                      if($persona->personality == "infj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">INFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Committed</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Creative</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Determined</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Idealistic</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "intp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">INTP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Independent</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Theoretical</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Analytical</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Reserved</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "entp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ENTP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Enterprising</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Outspoken</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Challenging</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Resourceful</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "entj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ENTJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Logical</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Strategic</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Fair</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Straightforward</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "intj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">INFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Independent</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Visionary</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Original</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Global</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "infp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">INFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Compassionate</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Original</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Creative</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Empathetic</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "enfp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ENFP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Creative</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Versatile</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Perceptive</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Imaginative</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "enfj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ENFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Loyal</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Verbal</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Energetic</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Congenial</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "isfj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ISNFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Detailed</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Tradtional</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Service-minded</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Devoted</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "isfp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ISFP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Caring</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Adaptable</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Gentle</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Harmonious</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "esfp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ESFP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Enthusiastic</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Friendly</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Cooperative</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Tolerant</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "esfj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ESFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Thorough</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Responsible</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Detailed</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Traditional</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "istj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ISTJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Factual</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Practical</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Organized</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Stedfest</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "istp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ISTP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Logical</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Realistic</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Adventurous</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Self-determined</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "estp") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">ESTP</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">aActivity-oriented</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Versatile</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Pragmatic</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Outgoing</span></center></div>
                                      </div>
                                    @php
                                      }
                                      if($persona->personality == "estj") {
                                    @endphp
                                      <center>
                                        <span style="font-size: 20px; font-weight: bold; color: #231C2D;">INFJ</span>
                                      </center>
                                      <div class="mt-3">
                                        <div style="background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Logical</span></center></div>
                                        <div style="margin-left: 7rem; margin-top: 0.75rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Systematic</span></center></div>
                                        <div style="margin-left: 14rem; margin-top: -4.5rem; background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Organized</span></center></div>
                                        <div style="margin-left: 20rem; margin-top: 0.75rem;background: #F1EDF5; width: 140px; height: 30px; "><center><span style="position: relative; top: 5px; font-size: 16px; font-weight: bold; color: #7E53C4;">Conscientiousc</span></center></div>
                                      </div>
                                    @php
                                      }
                                    @endphp
                                  </div>
                                </div>
                                <div id="inputPersonality">
                                  <div class="ml-3">
                                    <span class="bio-title">PERSONALITY</span>
                                    <a style="position: relative;left: 320px;" type="button" class="color-edit ml-3" onclick="closeInputPersonality()" >
                                      <i class="fas fa-times"></i>
                                    </a>
                                  </div>
                                  <div class="mt-3 ml-3">
                                    <form method="POST" action="{{ url('/persona/edit-personality', $persona->id_persona) }}">
                                      @csrf
                                    <table>
                                      <tr >
                                        <td width="100px">
                                          <p>
                                            <input type="radio" id="infj" name="personality" value="infj">
                                            <label for="infj" style="font-size: 16px;font-weight: bold;">INTJ</label>
                                          </p>
                                        </td>
                                        <td width="100px">
                                          <p>
                                            <input type="radio" id="intp" name="personality" value="intp">
                                            <label for="intp" style="font-size: 16px;font-weight: bold;">INTP</label>
                                          </p>
                                        </td>
                                        <td width="100px">
                                          <p>
                                            <input type="radio" id="entj" name="personality" value="entj">
                                            <label for="entj" style="font-size: 16px;font-weight: bold;">ENTJ</label>
                                          </p>
                                        </td>
                                        <td width="100px">
                                          <p>
                                            <input type="radio" id="entp" name="personality" value="entp">
                                            <label for="entp" style="font-size: 16px;font-weight: bold;">ENTP</label>
                                          </p>
                                        </td>
                                        <td width="100px">
                                          <p>
                                            <input type="radio" id="infj" name="personality" value="infj">
                                            <label for="infj" style="font-size: 16px;font-weight: bold;">INFJ</label>
                                          </p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <p>
                                            <input type="radio" id="infp" name="personality" value="infp">
                                            <label for="infp" style="font-size: 16px;font-weight: bold;">INFP</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="enfj" name="personality" value="enfj">
                                            <label for="enfj" style="font-size: 16px;font-weight: bold;">ENFJ</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="enfp" name="personality" value="enfp">
                                            <label for="enfp" style="font-size: 16px;font-weight: bold;">ENFP</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="istj" name="personality" value="istj">
                                            <label for="istj" style="font-size: 16px;font-weight: bold;">ISTJ</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="isfj" name="personality" value="isfj">
                                            <label for="isfj" style="font-size: 16px;font-weight: bold;">ISFJ</label>
                                          </p>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <p>
                                            <input type="radio" id="estj" value="estj" name="personality">
                                            <label for="estj" style="font-size: 16px;font-weight: bold;">ESTJ</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="esfj" name="personality" value="esfj">
                                            <label for="esfj" style="font-size: 16px;font-weight: bold;">ESFJ</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="istp" name="personality" value="istp">
                                            <label for="istp" style="font-size: 16px;font-weight: bold;">ISTP</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" id="isfp" name="personality" value="isfp">
                                            <label for="isfp" style="font-size: 16px;font-weight: bold;">ISFP</label>
                                          </p>
                                        </td>
                                        <td>
                                          <p>
                                            <input type="radio" value="estp" id="estp" name="personality" >
                                            <label for="estp" style="font-size: 16px;font-weight: bold;">ESTP</label>
                                          </p>
                                        </td>
                                      </tr>
                                    </table>
                                    <div>
                                        <center><button class="mt-4 update-button" type="submit" value="submit">Update</button></center>
                                      </div>
                                  </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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
  <!-- MODAL EDIT GOAL -->
  @foreach ($dataUserPersona as $data)
  <div class="modal fade" id="EditGoal-{{ $data->id_persona }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Goal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $goal = explode('+', $data->goal);
        @endphp 
          <div class="modal-body">
            @foreach ($goal as $key => $arrayGoal) 
            <form method="POST" action="{{ url('/persona/edit-goal/'. $key.'/'. $data->id_persona) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                 <input type="text" name="goal" class="form-edit" value="{{ $arrayGoal }}">
                  <button type="submit" class="button-edit" style="height: 39px; position: relative; top: 0.3px; left: 1px;">
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
  <!-- MODAL EDIT FRUSTATION -->
  @foreach ($dataUserPersona as $data)
  <div class="modal fade" id="EditFrustation-{{ $data->id_persona }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Goal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
          $frustation = explode('+', $data->frustation);
        @endphp 
          <div class="modal-body">
            @foreach ($frustation as $key => $arrayFrustation) 
            <form method="POST" action="{{ url('/persona/edit-frustation/'. $key.'/'. $data->id_persona) }}">
              @csrf
              <ul style="list-style-type: circle">
                <li>
                 <input type="text" name="frustation" class="form-edit" value="{{ $arrayFrustation }}">
                  <button type="submit" class="button-edit" style="height: 39px; position: relative; top: 0.3px; left: 1px;">
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
  <!-- MODAL EDIT PERSONALITY -->
  @foreach ($dataUserPersona as $data)
  <div class="modal fade" id="EditPersonality-{{ $data->id_persona }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose Personality</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <div class="containers">
              <form class="form cf">
                <section class="plan cf">
                  <input type="radio" name="radio1" id="free" value="free"><label class="free-label four col" for="free">Free</label>
                  <input type="radio" name="radio1" id="basic" value="basic" checked><label class="basic-label four col" for="basic">Basic</label>
                  <input type="radio" name="radio1" id="premium" value="premium"><label class="premium-label four col" for="premium">Premium</label>
                </section> 
                <input class="submit" type="submit" value="Submit">   
              </form>
          </div>
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
  <script src="{{ asset('Dashboard/vendors/base/vendor.bundle.base.js') }}"></script>
 <script src="{{ asset('Dashboard/js/off-canvas.js') }}"></script>
  <script src="{{ asset('Dashboard/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('Dashboard/js/template.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('DataTable/datatables.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
  <script src="{{ asset('node_modules/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('node_modules/node_modules/shepherd.js/dist/js/shepherd.min.js') }}"></script>
  <script src="{{ asset('bar/bars.js') }}"></script>

    <script type="text/javascript">
      $("#inputMotivation").hide();
      $("#inputPersonality").hide();
      $("#inputPersonaName").hide();
      $("#inputDemography").hide();
      $("#inputQuote").hide();
      $("#inputBio").hide();
      $("#inputSocialMedia").hide();

      function showInputMotivation() {
         document.getElementById('inputMotivation').style.display = "block";
         $("#barMotivation").hide();
      }

      function closeInputMotivation() {
        document.getElementById('barMotivation').style.display = "block";
         $("#inputMotivation").hide();
      }

      function showInputPersonality() {
         document.getElementById('inputPersonality').style.display = "block";
         $("#barPersonality").hide();
      }

      function closeInputPersonality() {
        document.getElementById('barPersonality').style.display = "block";
         $("#inputPersonality").hide();
      }

      function showInputName() {
         document.getElementById('inputPersonaName').style.display = "block";
         $("#personaName").hide();
      }

      function closeInputName() {
        document.getElementById('personaName').style.display = "block";
         $("#inputPersonaName").hide();
      }

      function showInputDemography() {
         document.getElementById('inputDemography').style.display = "block";
         $("#demography").hide();
      }

      function closeInputDemography() {
        document.getElementById('demography').style.display = "block";
         $("#inputDemography").hide();
      }

      function showInputQuote() {
         document.getElementById('inputQuote').style.display = "block";
         $("#quote").hide();
      }

      function closeInputQuote() {
        document.getElementById('quote').style.display = "block";
         $("#inputQuote").hide();
      }

      function showInputBio() {
         document.getElementById('inputBio').style.display = "block";
         $("#bio").hide();
      }

      function closeInputBio() {
        document.getElementById('bio').style.display = "block";
         $("#inputBio").hide();
      }

      function showInputSocialMedia() {
         document.getElementById('inputSocialMedia').style.display = "block";
         $("#socialMedia").hide();
      }

      function closeInputSocialMedia() {
        document.getElementById('socialMedia').style.display = "block";
         $("#inputSocialMedia").hide();
      }
    </script>
    <script type="text/javascript">
      $(document).ready(function(e) {
                $(".showonhover").click(function(){
              $("#selectfile").trigger('click');
            });
            });


        var input = document.querySelector('input[type=file]'); // see Example 4

        input.onchange = function () {
          var file = input.files[0];

          drawOnCanvas(file);   // see Example 6
          displayAsImage(file); // see Example 7
        };

        function drawOnCanvas(file) {
          var reader = new FileReader();

          reader.onload = function (e) {
            var dataURL = e.target.result,
                c = document.querySelector('canvas'), // see Example 4
                ctx = c.getContext('2d'),
                img = new Image();

            img.onload = function() {
              c.width = img.width;
              c.height = img.height;
              ctx.drawImage(img, 0, 0);
            };

            img.src = dataURL;
          };

          reader.readAsDataURL(file);
        }

        function displayAsImage(file) {
          var imgURL = URL.createObjectURL(file),
              img = document.createElement('img');
          var reader = new FileReader();
          var filename = $("#file1").val();
          filename = filename.substring(filename.lastIndexOf('\\')+1);
          reader.onload = function(e) {
            debugger;      
            $('#upfile1').attr('src', e.target.result);
            $('#upfile1').hide();
            $('#upfile1').fadeIn(500);      
            $('.custom-file-label').text(filename);             
          }
          reader.readAsDataURL(input.files[0]);   
        }

        $("#upfile1").click(function () {
            $("#file1").trigger('click');
        });
        $("#upfile2").click(function () {
            $("#file2").trigger('click');
        });
        $("#upfile3").click(function () {
            $("#file3").trigger('click');
        });
    </script>

    <script type="text/javascript">
      $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
             $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
      });
    </script>

    <script type="text/javascript">
      $('#file1').change(function() {
        $('#target').submit();
        setTimeout(function () {
            location.reload(true);
        }, 1000);
      });
    </script>
</body>

</html>
