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
    <link href="../assets/css/layerslider.css"rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
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
      
      .ls-s-1 {
        border-radius: 100px;
        -moz- border-radius: 100px;
        -webkit- border-radius: 100px;
        font-weight: normal;
      }
      
      .plus,
      .plus2 {
        text-align: center;
        width: 50px;
        height: 50px; 
        font-size: 50px;
        line-height: 50px;
        background: #eee;
      }

      .plus {
        color: #3b173d;
      }

      .plus2 {
        color: #1e73be;
      }

      .text,
      .text2 {
        font-size: 26px; 
      }

      .text {
        color: #eee;
      }

      .text2 {
        color: #1e73be;
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

  <body class="normal">

    <?php perch_layout('global.nav', array(
      'home'=> 'active',
    )); ?>
    
      <!-- Slider
    ================================================== -->
    <div id="layerslider-container-fw">  
      <div id="layerslider" style="width: 1550px; height: 500px; margin: 0px auto; ">

        <div class="ls-layer" style="slidedirection: right; ">

          <img src="../assets/img/sflswinner2011-1.jpg" class="ls-bg" alt="Slide background">

          <h5 class="ls-s-1 text" style=" top:317px; left: 105px; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000;"> you can add the slider elements into a centered container in full width mode </h5>

        </div>

        <div class="ls-layer" style="slidedirection: right;  ">

          <img src="http://kreaturamedia.com/wp-content/uploads/2013/04/bg6a.jpg" class="ls-bg" alt="Slide background">

          <h5 class="ls-s-1 plus2" style=" top:40px; left: 40px; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 6000;"> + </h5>

          <h5 class="ls-s-1 text2" style=" top:47px; left: 105px; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 6000;"> full width slider can be also responsive under a value of width </h5>

        </div>

        <div class="ls-layer" style="slidedirection: right;  ">

          <img src="http://kreaturamedia.com/wp-content/uploads/2013/04/guitars.jpg" class="ls-bg" alt="Slide background">

        </div>

      </div>
            
    </div>
    <!-- /slider -->

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

    <!-- Slider JS
    ==================================================== -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery.sticky.js"></script>
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
    <script src="../assets/js/layerslider/jQuery/jquery.js"></script>
    <script src="../assets/js/layerslider/jQuery/jquery-easing-1.3.js"></script>
    <script src="../assets/js/layerslider/jQuery/jquery-transit-modified.js"></script>
    <script src="../assets/js/layerslider/js/layerslider.transitions.js"></script>
    <script src="../assets/js/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#layerslider').layerSlider({
          skinsPath : '../assets/js/layerslider/skins/',
          skin : 'fullwidth',
          hoverPrevNext : false,
          responsive : true,
          sublayerContainer : 960,
          navButtons : false,
          navStartStop : false
        });
      });   
    </script>
    <script>
      $(document).ready(function(){
        $("#sticky").sticky({topSpacing:0});
      });
    </script>
    
  </body>
</html>
