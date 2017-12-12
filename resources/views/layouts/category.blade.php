<!DOCTYPE html> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="id" lang="id"> <html> <head> <!-- Basic --> <meta charset="utf-8"> <title>@yield('title')</title> <meta name="keywords" content="@yield('keywords')" /> <meta name="description" content="@yield('description')"> <meta name="author" content="@yield('penulis')"> <!-- Mobile Specific Metas --> <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> <!-- Bootstrap  --> <link rel="stylesheet" type="text/css" href="/stylesheets/bootstrap.css" > <!-- Theme Style --> <link rel="stylesheet" type="text/css" href="/stylesheets/style.css"> <!-- Responsive --> <link rel="stylesheet" type="text/css" href="/stylesheets/responsive.css"> <!-- Colors --> <link rel="stylesheet" type="text/css" href="/stylesheets/colors/color1.css" id="colors"> <!-- Animation Style --> <link rel="stylesheet" type="text/css" href="/stylesheets/animate.css"> <!-- Favicon and touch icons  --> <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48"> <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed"> <!--[if lt IE 9]> <script src="javascript/html5shiv.js"></script> <script src="javascript/respond.min.js"></script> <![endif]--> @stack('css') </head> <body class="header-sticky"> <div class="boxed"> @include('layouts.sliceFront.header') <div class="page-title full-color"> <div class="container"> <div class="row"> <div class="col-md-12"> <div class="page-title-heading"> <h2 class="title">@yield('judul')</h2> </div> <div class="breadcrumbs"> <ul> <li class="home"><a href="/">Beranda </a></li> @yield('breadcrumbs') </ul> </div> </div><!-- /.col-md-12 --> </div><!-- /.row --> </div><!-- /.container --> </div><!-- /page-title --> <!-- Blog posts --> <section class="main-content blog-posts"> <div class="container"> <div class="row"> <div class="post-wrap"> <div class="col-md-9"> <div class="blog-listing"> @yield('item') </div><!-- /blog-listing --> </div><!-- /col-md-9 --> <div class="col-md-3"> <div class="sidebar"> @include('layouts.sliceFront.sidebar') </div><!-- /col-md-9 --> </div><!-- /col-md-3 --> </div> </div> </div> </section> @include('layouts.sliceFront.footer') <!-- Javascript --> <script type="text/javascript" src="/javascript/jquery.min.js"></script> <script type="text/javascript" src="/javascript/bootstrap.min.js"></script> <script type="text/javascript" src="/javascript/jquery.easing.js"></script> <script type="text/javascript" src="/javascript/owl.carousel.js"></script> <script type="text/javascript" src="/javascript/jquery-waypoints.js"></script> <script type="text/javascript" src="/javascript/jquery.cookie.js"></script> <script type="text/javascript" src="/javascript/main.js"></script> @stack('js') <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. <script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-12345678-1']); _gaq.push(['_trackPageview']); (function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })(); </script> --> </div> </body> </html>