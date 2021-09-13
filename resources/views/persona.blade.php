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
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('Dashboard/images/favicon.png') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-5.14.0-web/css/all.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('node_modules/node_modules/shepherd.js/dist/css/shepherd.css') }}">
  <link href="{{asset('tiny-tour-master/dist/tour.min.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('tiny-tour-master/dist/tour.min.js')}}" rel="stylesheet" type="text/javascript"></script>
</head>

<body style="background: #f4f7fa;">
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
                          @foreach ($dataUserPersona as $persona)
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
                  <form method="POST" id="form1" action="{{ url('/detail-project/user-persona/update', $persona->id_persona) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="col-xl-12">
                    <div class="row">
                      <input type="hidden" name="id_persona" id="postId" value="{{ $persona->id_persona }}">
                      <div class="col-xl-12 grid-margin stretch-card">
                        <div class="card one" id="pname" style="height: 50px; background: #7E53C4;">
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
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-top: -1rem; border: #7E53C4;">
                      <div class="col-xl-2 grid-margin stretch-card" style="max-width: 334.5px;">
                        <div class="card" style="border-left-color: #7E53C4; background: #fff;">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card two">
                                  <input type="file" id="file1" name="image" accept="image/*" capture style="display:none" required="" />
                                  <img class=""  src="{{asset('modalDocument/avatar-persona.svg')}}" id="upfile1" style="cursor:pointer" style="width:300px; height:300px;object-fit:cover;">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-lg-12">
                                <div class="card" style="background: #7E53C4; width: 275px; min-height: 70px; max-height: 90px;">
                                  <div class="card-body">
                                    <div style="position: relative;top: -1.5rem; left: -1rem;">
                                      <textarea name="quote" id="postQuote" class="input-style persona-quote" style="width: 250px; height: 70px;" placeholder="Quote of the day"></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-12">
                                <div class="card" style="background: #fff; width: 285px;">
                                  <div class="three">
                                    <div style="margin-left: 6.45rem;">
                                      <span style="font-size: 16px;">Age : </span>
                                      <input class="input-demography" id="postAge" type="text" name="age" style="width: 50px;" value="18 - 20" required="">
                                      <span>y.o</span>
                                    </div>
                                    <div class="mt-2" style="margin-left: 2.8rem;">
                                      <span style="font-size: 16px;">Occupation : </span>
                                      <input class="input-demography" id="postWork" value="UX Designer" type="text" name="work" style="width: 120px;" required="">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.9rem;">
                                      <span style="font-size: 16px;">Status : </span>
                                      <input class="input-demography" id="postStatus" value="Single" type="text" name="family" style="width: 120px;" required="">
                                    </div>
                                    <div class="mt-2" style="margin-left: 4.1rem;">
                                      <span style="font-size: 16px;">Location : </span>
                                      <input class="input-demography" id="postLocation" value="Surabaya" type="text" name="location" style="width: 120px;" required="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col-lg-12">
                                <div class="card" style="background: #fff; width: 275px; height: 150px;">
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
                                    <input checked type="checkbox" id="media1" name="media[]" value="instagram" style="display: none;" /><label for="media1" ><img src="{{asset('modalDocument/Social Media/IG.svg')}}" width="50" height="50" /></label>
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
                                <div class="">
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
                                    <textarea style="text-align: justify; font-style: italic;" name="bio" id="postBio" class="mt-2 bio-textarea">Example : Chanyeol is a South Korean rapper, singer, songwriter, producer, actor and model. He is a member of the South Korean-Chinese boy group Exo, its sub-group Exo-K and sub-unit Exo-SC. He has composed a wide variety of songs. He felt frustrated in producing music because he could not find a reference song that suited his musical style. His expectation is to be able to find various music genres in the same application so that it can reduce the time.  </textarea>
                                      <span style="position: relative;top: -22px; font-size: 14px; font-style: italic; color: #7E53C4; font-weight: bold;">NOTE - The text above is only an example of the biography of one persona. You can delete it and replace it according to your persona.</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; height: 300px;">
                                <div class="">
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
                                    <div>
                                      <span class="motivation-label">Fear</span>
                                      <input class="ml-7 motivation-input allownumericwithdecimal" type="text" name="motivation" name="fear" value="93.3">
                                      <span style="font-size: 16px; font-weight: bold;">%</span>
                                    </div>
                                    <div class="mt-3">
                                      <span class="motivation-label">Achievement</span>
                                      <input name="achievement" class="ml-2 motivation-input allownumericwithdecimal" type="text" name="motivation">
                                      <span style="font-size: 16px; font-weight: bold;">%</span>
                                    </div>
                                    <div class="mt-3">
                                      <span class="motivation-label">Growth</span>
                                      <input name="growth" class="motivation-input allownumericwithdecimal" style="margin-left: 3.5rem;" type="text" name="motivation">
                                      <span style="font-size: 16px; font-weight: bold;">%</span>
                                    </div>
                                    <div class="mt-3">
                                      <span class="motivation-label">Power</span>
                                      <input name="power" class="motivation-input allownumericwithdecimal" style="margin-left: 4.15rem;" type="text" name="motivation">
                                      <span style="font-size: 16px; font-weight: bold;">%</span>
                                    </div>
                                    <div class="mt-3">
                                      <span class="motivation-label">Social</span>
                                      <input name="social" class="motivation-input allownumericwithdecimal" style="margin-left: 4.05rem;" type="text" name="motivation">
                                      <span style="font-size: 16px; font-weight: bold;">%</span>
                                    </div>
                                    <div class="mt-4">
                                      <span style="font-size: 14px; font-style: italic; color: #7E53C4; font-weight: bold;">NOTE - you only allowed filling the field with numbers or decimal. The result will be visualizating in meter bar</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; height: 120px;">
                                <div class="">
                                  <div class="ml-3 mt-1">
                                    <span class="bio-title">DEVICE USED</span>
                                  </div>
                                  <div class="ml-3 mt-3">
                                    <input checked type="checkbox" id="computer" name="device[]" value="computer" style="display: none;" /><label for="computer" ><img src="{{asset('modalDocument/device/computer.svg')}}"  /></label>
                                    <input type="checkbox" id="laptop" name="device[]" value="laptop" style="display: none;" /><label for="laptop" ><img class="ml-5" src="{{asset('modalDocument/device/laptop.svg')}}" /></label>
                                    <input type="checkbox" id="mobile" name="device[]" value="mobile" style="display: none;" /><label for="mobile" ><img class="ml-5" src="{{asset('modalDocument/device/mobile.svg')}}"  /></label>
                                    <input type="checkbox" id="tablet" name="device[]" value="tablet" style="display: none;" /><label for="tablet" ><img class="ml-5" src="{{asset('modalDocument/device/tablet.svg')}}" width="50" height="50" /></label>
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
                                <div class="four">
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
                                  <div class="ml-3">
                                    <input type="text" id="postGoal" tabindex="5" name="goal[]" class="goal-input" placeholder="" required="">
                                    <button type="button" class="add_button_goal button-style-dynamic">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                    <div class="wrap-goal">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; min-height: 280px;">
                                <div class="five">
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
                                    <input type="text" id="postFrustation" tabindex="5" name="frustation[]" class="goal-input" placeholder="" required="">
                                    <button type="button" class="add_button_frustation button-style-dynamic">
                                      <i class="fas fa-plus"></i>
                                    </button>
                                    <div class="wrap-frustation">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="card" style="background: #fff; width: 500px; min-height: 150px;">
                                <div class="">
                                  <div class="ml-3 mt-1">
                                    <span class="bio-title">PERSONALITY</span>
                                  </div>
                                  <div class="ml-3 mt-3">
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
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input style="margin-left: 81.5rem; margin-top: 1rem;" class="save-button" type="submit" name="Save">
                </div>
              </form>
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
          title: "Persona Name",
          description: "Start by choosing a name to humanize your persona.",
          position: "bottom"
        },
        {
          element: ".two",
          title: "Avatar",
          description: "Next, provide an image to make it easier to describe the persona",
          data: "Custom Data",
          position: "right"
        },
        {
          element: ".three",
          title: "Demography",
          description: "Next, give the basic information about the user.",
          position: "right"
        },
        {
          element: ".four",
          title: "Goal",
          description: "Then, write the goals that the users have that they feel good about.",
          position: "left"
        },
        {
          element: ".five",
          title: "Frustation",
          description: "Write anything that makes users sad or dissapointed.",
          position: "left"
        },
        
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
      function postForm() {
        document.getElementById('form1').submit();
        alert('Success Save Persona');
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
          // img.onload = function(e) {
          //   debugger;      
          //   $('#upfile1').attr('src', e.target.result);
          //   $('#upfile1').hide();
          //   $('#upfile1').fadeIn(500);      
          //   // $('.custom-file-label').text(filename);             
          // }
          // reader.readAsDataURL(input.files[0]);

          // img.onload = function() {
          //   URL.revokeObjectURL(imgURL);
          // };

          // img.src = imgURL;
          // document.body.appendChild(img);
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
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_goal'); //Add button selector
        var wrapper = $('.wrap-goal'); //Input field wrapper
        var fieldHTML = '<div><input type="text" id="postGoal" name="goal[]" class="goal-input"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
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
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button_frustation'); //Add button selector
        var wrapper = $('.wrap-frustation'); //Input field wrapper
        var fieldHTML = '<div><input type="text" id="postFrustation" name="frustation[]" class="goal-input"/><button class="remove_button button-remove"><i class="fas fa-times" style="color: #CF2727;"></i></button></div>'; //New input field html 
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
      $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
             $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
      });
    </script>
    <!-- <script type="text/javascript">
      $(document).ready(function(){
          var timer;
          var timeout = 5000;
          $('#postName, #file1, #postAge, #postWork, #postStatus, #postLocation, #postBio, #postGoal, #postFrustation').keyup(function(){
              if(timer) {
                clearTimeout(timer);
              }

              timer = setTimeout(saveData, timeout);
          });
      });

      function saveData() {
          var avatar = $('#file1').val();
          var quote = $('#postQuote').val();
          var persona_name = $('#postName').val();
          var age = $('#postAge').val();
          var work = $('#postWork').val();
          var family = $('#postStatus').val();
          var location = $('#postLocation').val();
          var bio = $('#postBio').val();
          var goal = $('#postGoal').val();
          var frustation = $('#postFrustation').val();
          var id_persona = $('#postId').val();

          $.ajax({
              url: '/detail-project/user-persona/update/'+id_persona,
              type: 'post',
              data: {avatar: avatar, persona_name: persona_name, quote: quote, age: age, work: work, family: family, location: location, bio: bio, goal: goal}
              success: function(response){

              }
          }); 
      }
    </script> -->
</body>

</html>
