
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bootstrap Blog - B4 Template by Bootstrap Temple</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Custom icon font-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/fontastic.css">
        <!-- Google fonts - Open Sans-->

        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/animate.css">
        <link rel="stylesheet" href="{{ asset('Frontend') }}/https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <!-- Fancybox-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('Frontend') }}/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('Frontend') }}/favicon.png">

    </head>
    <body>
        <header class="header">
            <!-- Main Navbar-->
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="search-area">
                    <div class="search-area-inner d-flex align-items-center justify-content-center">
                        <div class="close-btn"><i class="icon-close"></i></div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="search" name="search" id="search" placeholder="What are you looking for?">
                                        <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!-- Navbar Brand -->
                    <div class="navbar-header d-flex align-items-center justify-content-between">
                        <!-- Navbar Brand --><a href="index.html" class="navbar-brand">Bootstrap Blog</a>
                        <!-- Toggle Button-->
                        <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
                    </div>
                    <!-- Navbar Menu -->
                    <div id="navbarcollapse" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="index.html" class="nav-link active ">Home</a>
                            </li>
                            <li class="nav-item"><a href="blog.html" class="nav-link ">Blog</a>
                            </li>
                            <li class="nav-item"><a href="post.html" class="nav-link ">Post</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
                            </li>
                        </ul>
                        <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                        <ul class="langs navbar-text"><a href="#" class="active">Login</a><span>           </span><a href="#">Register</a></ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Hero Section-->
        <div class="owl-carousel hero_slider">
            <section style="background: url({{ asset('Frontend') }}/img/hero.jpg); background-size: cover; background-position: center center" class="hero wow animate__animated animate__fadeInTopLeft">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="bg-dark p-3">Bootstrap 4 Blog - A free template by Bootstrap Temple</h1><a href="#" class="hero-link">Discover More</a>
                        </div>
                    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
                </div>
            </section>
            <section style="background: url({{ asset('Frontend') }}/img/blog-2.jpg); background-size: cover; background-position: center center" class="hero wow animate__animated animate__zoomIn" data-wow-delay=".3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="bg-dark p-3">Bootstrap 4 Blog - A free template by Bootstrap Temple</h1><a href="#" class="hero-link">Discover More</a>
                        </div>
                    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
                </div>
            </section>
            <section style="background: url({{ asset('Frontend') }}/img/hero2.jpg); background-size: cover; background-position: center center" class="hero wow animate__animated animate__zoomIn" data-wow-delay=".3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="bg-dark p-3">Bootstrap 5 Blog - Anisur Rahaman Shahin Temple</h1><a href="#" class="hero-link">Discover More</a>
                        </div>
                    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
                </div>
            </section>
            <section style="background: url({{ asset('Frontend') }}/img/hero3.jpg); background-size: cover; background-position: center center" class="hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="bg-dark p-3" >A free template by Bootstrap Temple</h1><a href="#" class="hero-link">Discover More</a>
                        </div>
                    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
                </div>
            </section>
        </div>
        <!-- Intro Section-->
        <section class="intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="h3">About Us</h2>
                        <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-posts no-padding-top">
            <div class="container">
                <!-- Post-->
                <div class="row d-flex align-items-stretch">
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                                </header>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>John Doe</span></div></a>
                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="image col-lg-5"><img src="{{ asset('Frontend') }}/img/featured-pic-1.jpeg" alt="..."></div>
                </div>
                <!-- Post        -->
                <div class="row d-flex align-items-stretch">
                    <div class="image col-lg-5"><img src="{{ asset('Frontend') }}/img/featured-pic-2.jpeg" alt="..."></div>
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                                </header>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-2.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>John Doe</span></div></a>
                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Post                            -->
                <div class="row d-flex align-items-stretch">
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                                </header>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>John Doe</span></div></a>
                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="image col-lg-5"><img src="{{ asset('Frontend') }}/img/featured-pic-3.jpeg" alt="..."></div>
                </div>
            </div>
        </section>
        <!-- Divider Section-->
        <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Posts -->
        <section class="latest-posts">
            <div class="container">
                <header>
                    <h2>Latest from the blog</h2>
                    <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </header>
                <div class="row">
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="post.html"><img src="{{ asset('Frontend') }}/img/blog-1.jpg" alt="..." class="img-fluid"></a></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">20 May | 2016</div>
                                <div class="category"><a href="#">Business</a></div>
                            </div><a href="post.html">
                            <h3 class="h4">Ways to remember your important ideas</h3></a>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="post.html"><img src="{{ asset('Frontend') }}/img/blog-2.jpg" alt="..." class="img-fluid"></a></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">20 May | 2016</div>
                                <div class="category"><a href="#">Technology</a></div>
                            </div><a href="post.html">
                            <h3 class="h4">Diversity in Engineering: Effect on Questions</h3></a>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="post.html"><img src="{{ asset('Frontend') }}/img/blog-3.jpg" alt="..." class="img-fluid"></a></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">20 May | 2016</div>
                                <div class="category"><a href="#">Financial</a></div>
                            </div><a href="post.html">
                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter Section-->
        <section class="newsletter no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Subscribe to Newsletter</h2>
                        <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-holder">
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Type your email address">
                                    <button type="submit" class="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Section-->
        <section class="gallery no-padding">
            <div class="row">
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-1.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-2.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-3.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-4.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <h6 class="text-white">Bootstrap Blog</h6>
                        </div>
                        <div class="contact-details">
                            <p>53 Broadway, Broklyn, NY 11249</p>
                            <p>Phone: (020) 123 456 789</p>
                            <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
                            <ul class="social-menu">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="menus d-flex">
                            <ul class="list-unstyled">
                                <li> <a href="#">My Account</a></li>
                                <li> <a href="#">Add Listing</a></li>
                                <li> <a href="#">Pricing</a></li>
                                <li> <a href="#">Privacy &amp; Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li> <a href="#">Our Partners</a></li>
                                <li> <a href="#">FAQ</a></li>
                                <li> <a href="#">How It Works</a></li>
                                <li> <a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="latest-posts"><a href="#">
                            <div class="post d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                                <div class="title"><strong>Hotels for all budgets</strong><span class="date last-meta">October 26, 2016</span></div>
                            </div></a><a href="#">
                            <div class="post d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                                <div class="title"><strong>Great street atrs in London</strong><span class="date last-meta">October 26, 2016</span></div>
                            </div></a><a href="#">
                            <div class="post d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                                <div class="title"><strong>Best coffee shops in Sydney</strong><span class="date last-meta">October 26, 2016</span></div>
                            </div></a></div>
                    </div>
                </div>
            </div>
            <div class="copyrights">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; 2017. All rights reserved. Your great site.</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>
                                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- JavaScript files-->
        <script src="{{ asset('Frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('Frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('Frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('Frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('Frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/wow.min.js"></script>
        <script src="{{ asset('Frontend') }}/js/front.js"></script>
        <script src="{{ asset('Frontend') }}/js/custom.js"></script>
    </body>
</html>
