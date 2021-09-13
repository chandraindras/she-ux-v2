<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{('fontawesome-free-5.14.0-web/css/all.css')}}">
</head>
<body style="background-color: #ffffff;">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="identicalForm" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        WELCOME !
                    </span>
                    
                    
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="name">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input"  id="show_hide_password" data-validate="Password is required">
                        <input id="password" type="password" onkeyup="active()" id="pswrd_1" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        <div class="show-hide">
                            <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input" id="show_hide_password_2" data-validate="Password not match">
                        <input id="password-confirm" type="password" onkeyup="active_2()" id="pswrd_2" class="input100" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                        <div class="show-hide">
                            <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                     <div class="show">
                        SHOW</div>
                    <div class="container-login100-form-btn p-t-35">
                        <button class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>
                    <div class="flex-sb-m w-full p-t-40 p-b-43">
                        <span class="txt1">Already have an account ? 
                            <a href="{{ route('login') }}" class="txt3">
                                Sign In
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
        $("#show_hide_password_2 a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password_2 input').attr("type") == "text"){
                $('#show_hide_password_2 input').attr('type', 'password');
                $('#show_hide_password_2 i').addClass( "fa-eye-slash" );
                $('#show_hide_password_2 i').removeClass( "fa-eye" );
            }else if($('#show_hide_password_2 input').attr("type") == "password"){
                $('#show_hide_password_2 input').attr('type', 'text');
                $('#show_hide_password_2 i').removeClass( "fa-eye-slash" );
                $('#show_hide_password_2 i').addClass( "fa-eye" );
            }
        });
    });
    </script>
    <script type="text/javascript">
        const pswrd_1 = document.querySelector("#pswrd_1");
        const pswrd_2 = document.querySelector("#pswrd_2");
        const errorText = document.querySelector(".error-text");
        const showBtn = document.querySelector(".show");
        const btn = document.querySelector("button");
        btn.onclick = function(){
            if(pswrd_1.value != pswrd_2.value){
              errorText.style.display = "block";
              errorText.classList.remove("matched");
              errorText.textContent = "Error! Confirm Password Not Match";
              return false;
            }else{
              errorText.style.display = "block";
              errorText.classList.add("matched");
              errorText.textContent = "Nice! Confirm Password Matched";
              return false;
            }
        }
        function active_2(){
            if(pswrd_2.value != ""){
              showBtn.style.display = "block";
              showBtn.onclick = function(){
                if((pswrd_1.type == "password") && (pswrd_2.type == "password")){
                  pswrd_1.type = "text";
                  pswrd_2.type = "text";
                  this.textContent = "Hide";
                  this.classList.add("active");
                }else{
                  pswrd_1.type = "password";
                  pswrd_2.type = "password";
                  this.textContent = "Show";
                  this.classList.remove("active");
                }
              }
            }else{
              showBtn.style.display = "none";
            }
        }
    </script>
</body>
</html>


