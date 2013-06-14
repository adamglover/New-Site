<?php include('perch/runtime.php'); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
    
    <meta charset="utf-8">
    <title>Southern Finnish Lapphund Society</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">  
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      
      /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }

    .logohead {
      background-color: white;
    }

      
      /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 30px;
    /*adjusts where the top of the carousel sits */
      margin-top: 50px;
      width: auto;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

  
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      width:auto; 
      height: auto;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 160px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }
    .navbar-form {
      margin-top: 5px;
    }
    
    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      
      .carousel img {
        width: auto;
      }
      .carousel {
        margin-top: -20px;
        margin-bottom: 0px;
      }
    
    @media (max-width: 767px) {

      .carousel img {
        width: auto;
      }
      .carousel {
        margin-top: -20px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 20px;
        margin-top: 50px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .carousel-inner {
        width: auto;
      }
    
    @media (max-width: 480px) {

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }

      .carousel-caption {
        width: 40%;
        padding: 0 15px;
        margin-top: 50px;
        margin-left: 40px;
      }
      .carousel-caption h1 {
        font-size: 20px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 12px;
        padding: 1px 8px;
      }
    }
    
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>
    
    <div id="fb-root"></div>
      <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      </script>
    
    <?php perch_layout('global.nav', array(
      'home'=> 'active',
    )); ?>
 
      <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
      <?php perch_content('homepage_slider'); ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
      
     <div class="container"> 
      <!-- Left Column-->
      <div class="row">
        <!--Welcome section-->
        <div class="span8">
          <?php perch_pages_breadcrumbs(); ?>
          <?php perch_content('homepage_intro'); ?>
          <div class="row">
            <!--Important Info-->
            <div class="span8">
              <div class="well">
              <h2>Important Information</h2>
              <p>Here is where we can put any information that is important for visiors to see</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget nibh tellus. Donec laoreet luctus diam eget elementum. Praesent eu urna dui.
                Mauris sit amet nisi nulla, nec eleifend tortor. Sed placerat vestibulum mauris, ut mollis libero sagittis nec. Praesent et mattis ipsum. Fusce enim leo,
                varius eu pellentesque eget, porttitor quis risus. Fusce rhoncus nunc eu odio sagittis bibendum. Morbi elementum erat vel arcu fermentum varius.
                Aliquam molestie lacinia leo in feugiat. Vestibulum non urna mi. Suspendisse varius metus a eros rutrum id tristique est semper.
                Integer consectetur tellus sit amet est iaculis sagittis. Maecenas vitae nulla nec enim pretium aliquet vel id nibh.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <!--Feature 1-->
            <div class="span2 offset1">
              <h3>Feature 1</h3>
              <img src="http://placehold.it/170x100">
            </div>
            <!--Feature 2-->
            <div class="span2">
              <h3>Feature 3</h3>
              <img src="http://placehold.it/170x100">
            </div>
            <!--Feature 3-->
            <div class='span2'>
              <h3>Feature 3</h3>
              <img src="http://placehold.it/170x100">
            </div>      
          </div>
          <div class="row">
            <!--Calendar-->
            <div class="span4">
              <h3>Calendar</h3>
              <img src="http://placehold.it/370x370">
            </div>
            <!--TBC-->
            <div class="span4">
              <h3>TBC</h3>
              <img src="http://placehold.it/370x370">
            </div>
              <?php perch_content('contact'); ?>
          </div>
        </div>
        <?php perch_layout('global.side'); ?>        
        </div>
      </div>
    </div> <!-- /container -->
    <footer>
      <!--Footer Nav-->
      <div class="container">
        <div class="row">
          <div class="offset2 span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards &amp; Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards &amp; Prizes</a></li>
              </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards &amp; Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards &amp; Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards &amp; Prizes</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    
  </body>
</html>
