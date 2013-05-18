<?php include('perch/runtime.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
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

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }

      
      /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 30px;
      margin-top: -10px;
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

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
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

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }
    }
    
    @media (max-width: 767px) {

      .carousel {
        margin-top: -20px;
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }
      
    }
    
    @media (max-width: 480px) {

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 155px;
      }
      .carousel img {
        height: 155px;
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
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active" ><a href="/index.html">Home</a></li>
              <!--About Us-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/why_join.html">Why Join</a></li>
                  <li><a href="/award_prizes.html">Awards & Prizes</a></li>
                  <li><a href="/meet_committee.html">Meet the Committee</a></li>
                  <li><a href="/rules_regulations.html">Rules & Regulations</a></li>
                  <li class="divider"></li>
                  <!--Our Publications-->
                  <li class="nav-header">Our Publications</li>
                  <li><a href="/newsletter.html">Newsletter</a></li>
                  <li><a href="/yearbook.html">Yearbook</a></li>
                  <li><a href="/calendar.html">Calendar</a></li>
                </ul>
              </li>
              <!--Events-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/champ_shows.html">Championship Shows</a></li>
                  <li><a href="/open_shows.html">Open Shows</a></li>
                  <li><a href="/social_events.html">Social Events</a></li>
                </ul>
              </li>
              <!--Finnish Lapphunds-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Finnish Lapphunds<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/meet_the_breed.html">Meet the Breed</a></li>
                  <li><a href="/breed_standard">Breed Standard</a></li>
                  <li><a href="/colours.html">Colours</a></li>
                  <li><a href="/health.html">Health</a></li>
                </ul>
              </li>
              <!--Activities-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/good_citizen.html">KC Good Citizen</a></li>
                  <li><a href="/showing.html">Showing</a></li>
                  <li><a href="/agility.html">Agility</a></li>
                  <li><a href="/other_ideas.html">Other ideas</a></li>
                </ul>
              </li>
              <!--Puppies & Breeders-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Puppies & Breeders<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/breeders.html">Finnish Lapphund Breeders</a></li>
                  <li><a href="/breeding_guidelines.html">Breeding Guidelines</a></li>
                  <li><a href="/new_puppy.html">For Your New Puppy</a></li>
                </ul>
              </li>
              <li><a href="/shop.html">Shop</a></li>
              <li><a href="/contact.html">Contact</a></li>
            </ul>
            <!--<!--Search
            <form class="navbar-form pull-right"> 
              <input type="text" class="span2">
              <button type="submit" class="btn">Search</button>
            </form>-->
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

  
      
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
          </div>
        </div>
        <div class="span4">
          <!--Next Event-->
          <div class="well">
            <h2>Next Event</h2>
            <p>This is about our next event</p>
            <p>Could be a walk, a seminar, the AGM, Fundays, anything that is orgnised by the club</p>
          </div>
          
          <?php
            perch_content_custom('News', array(
            'page'=>'/news/index.php',
            'template'=>'article.html',
            'sort'=>'date',
            'sort-order'=>'DESC',
            'count'=>1
            )); 
          ?>
          <div class="well"> 
            <!--News1--> 
            <h3>Most recent news</h3>
            <p>Bit of blurb about this news article saying something really interesting... with a <a href="#">link</a> to the full article</p>
              
            <hr>
            <!--News2-->
            <h3>Next Most recent news</h3>
            <p>Bit of blurb about this news article saying something really interesting... with a <a href="#">link</a> to the full article</p>
            
            <hr> 
            <!--News3-->
            <h3>More recent news</h3>
            <p>Bit of blurb about this news article saying something really interesting... with a <a href="#">link</a> to the full article</p>
          </div>
          <!--FB Like Box-->
          <div class="fb-like-box" data-href="https://www.facebook.com/SouthernFinnishLapphundSociety" data-width="370" data-show-faces="false" data-stream="true" data-header="true">
          </div>
                
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
              <li><a href="#">Awards & Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards & Prizes</a></li>
              </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards & Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards & Prizes</a></li>
            </ul>
          </div>
          <div class="span2">
            <ul class="nav nav-list">
              <li class="nav-header">About Us</li>
              <li><a href="#">Why Join</a></li>
              <li><a href="#">Awards & Prizes</a></li>
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
