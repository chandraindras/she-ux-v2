<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Preview - @yield('tab-title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="{{asset('preview/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('preview/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('preview/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('preview/css/styles.css')}}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('preview/images/favicon.png')}}">
</head>
<body>

<x-layouts.topbar></x-layouts.topbar>

@yield('content')

<!-- Projects -->
<div id="projects" class="cards-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-heading">Related Templates</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                <x-cards.feature-card title="Comparison Matrix" thumbnail="images/project-1.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>

                <x-cards.feature-card title="Lean Canvas" thumbnail="images/project-2.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>

                <x-cards.feature-card title="Project Statement" thumbnail="images/project-3.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>

                <x-cards.feature-card title="User Persona" thumbnail="images/project-4.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>

                <x-cards.feature-card title="User Story" thumbnail="images/project-5.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>

                <x-cards.feature-card title="Empathy Map" thumbnail="images/project-6.jpg">
                    Suffer should if waited common person little ans words are needed oh <a class="blue no-line" href="article.html">...Read more</a>
                </x-cards.feature-card>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-2 -->
<!-- end of projects -->

<!-- Footer -->
<div class="footer bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-col first">
                    <h6>About Website</h6>
                    <p class="p-small">He oppose at thrown desire of no. Announcing impression unaffected day his are unreserved indulgence. Him hard find read are you</p>
                </div> <!-- end of footer-col -->
                <div class="footer-col second">
                    <h6>Links</h6>
                    <ul class="list-unstyled li-space-lg p-small">
                        <li>Important: <a href="terms.html">Terms & Conditions</a>, <a href="privacy.html">Privacy Policy</a></li>
                        <li>Useful: <a href="#">Colorpicker</a>, <a href="#">Icon Library</a>, <a href="#">Illustrations</a></li>
                        <li>Menu: <a href="#header">Home</a>, <a href="#details">Details</a>, <a href="#services">Services</a>, <a href="#contact">Contact</a></li>
                    </ul>
                </div> <!-- end of footer-col -->
                <div class="footer-col third">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    <p class="p-small">We would love to hear from you <a href="mailto:contact@site.com"><strong>contact@site.com</strong></a></p>
                </div> <!-- end of footer-col -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->

<!-- Copyright -->
<div class="copyright bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © Electronic Engineering Polytechnic Institute of Surabaya and Rasyid Institue</p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->


<!-- Back To Top Button -->
<button onclick="topFunction()" id="myBtn">
    <img src="{{asset('preview/images/up-arrow.png')}}" alt="alternative">
</button>
<!-- end of back to top button -->

<!-- Scripts -->
<script src="{{asset('preview/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
<script src="{{asset('preview/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
<script src="{{asset('preview/js/purecounter.min.js')}}"></script> <!-- Purecounter counter for statistics numbers -->
<script src="{{asset('preview/js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>
