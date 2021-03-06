<?php include('..perch/runtime.php'); ?>
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
            <!--Search
            <form class="navbar-form pull-right"> 
              <input type="text" class="span2">
              <button type="submit" class="btn">Search</button>
            </form>-->
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
     <div class="container"> 
      <!-- Left Column-->
      <div class="row">
        <!--News list-->
        <div class="span8">
          <h1>News</h1>
         <?php perch_blog_recent_posts(10); ?>
        </div>

        <div class="span4">
          <!--Next Event-->
          <div class="well">
            <h2>Next Event</h2>
            <p>This is about our next event</p>
            <p>Could be a walk, a seminar, the AGM, Fundays, anything that is orgnised by the club</p>
          </div>
          
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
