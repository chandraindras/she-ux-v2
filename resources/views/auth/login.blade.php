<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{('LoginRegist/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{('LoginRegist/css/main.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('fontawesome-free-5.14.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{('node_modules/node_modules/shepherd.js/dist/css/shepherd.css')}}">
</head>
<body style="background-color: #ffffff;">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-43 example-css-selector">
                        WELCOME !
                    </span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" id="show_hide_password" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                         <div class="show-hide">
                            <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="flex-sb-m w-full p-t-25 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="remember"">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn p-t-5">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    
                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <!-- <a href="{{ url('facebook') }}" class="login100-form-social-item flex-c-m bg1 m-r-5">
                           <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        </a> -->

                        <a href="{{ url('google') }}" class="login100-form-social-item flex-c-m bg3 m-r-5">
                            <i class="fab fa-google" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="flex-sb-m w-full p-t-25 p-b-43">
                        <span class="txt1">Don't have an account ? 
                            <a href="{{ route('register') }}" class="txt3">
                                Sign Up
                            </a>
                        </span>
                        
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('{{('LoginRegist/images/Group 43.png')}}');">
                </div>
            </div>
        </div>
    </div>
    
    

    
    
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{('LoginRegist/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{('LoginRegist/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{('LoginRegist/js/main.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{('node_modules/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{('node_modules/node_modules/shepherd.js/dist/js/shepherd.min.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/shepherd.js@5.0.1/dist/js/shepherd.js"></script> -->
    
    <!-- <script type="text/javascript">
        const tour = new Shepherd.Tour({
          defaultStepOptions: {
            classes: 'shepherd-theme-arrows',
            scrollTo: true
          }
        });

        tour.addStep({
          id: 'example-step',
          text: 'This step is attached to the bottom of the <code>.example-css-selector</code> element.',
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
        tour.start();
    </script> -->
    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
    </script>
</body>
</html>

