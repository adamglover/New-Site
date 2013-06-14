<?php include('../perch/runtime.php'); ?>

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
      /* move main content below header */

    .main{
      margin-top: 75px;
    
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
      'activities'=> 'active',
    )); ?>
      
     <div class="container main"> 
      <!-- Left Column-->
      <div class="row">
        <!--Welcome section-->
        <div class="span8">
          <!---->
        <div id="content">
          <?php 
            perch_pages_breadcrumbs(array(
              'hide-extensions'  => true
            )); 
          ?>
          <?php perch_content('GC Intro'); ?>
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#puppy" data-toggle="tab">Puppy Foundation</a></li>
                <li><a href="#bronze" data-toggle="tab">Bronze Awards</a></li>
                <li><a href="#silver" data-toggle="tab">Silver Awards</a></li>
                <li><a href="#gold" data-toggle="tab">Gold Awards</a></li>
            </ul>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="puppy">
                    <h2>Puppy Foundation</h2>
                    <p>The Puppy Foundation Award specialises in training owners to train their puppies. Depending on the individual club, enrolment can take place from the time your 
                      puppy is 8 weeks of age. There is no minimum training standard  required, as long as the puppy is under 12 months of age when the course is completed. 
                      All abilities are accepted!</p>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>New Addition</th>
                                <th>Kennel Name</th>
                                <th>Pet Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php perch_content('GC Puppy'); ?>
                        </tbody>  
                    </table>
                </div>
                <div class="tab-pane" id="bronze">
                    <h2>Bronze Awards</h2>
                    <p>The Bronze Award aims to produce a dog that will walk and behave in a controlled manner. It is a basic standard that all adult dogs can achieve with correct handling. 
                      Owners must show that they have means of picking up after their dog and that their dog is wearing a lead and collar with name and the address of the owner inscribed 
                      on the collar/disc to take part.</p>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>New Addition</th>
                                <th>Kennel Name</th>
                                <th>Pet Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php perch_content('GC Bronze'); ?>
                        </tbody>  
                    </table>
                </div>
                <div class="tab-pane" id="silver">
                    <h2>Silver Awards</h2>
                    <p>The Silver Award aims to build on the skills learned in the Bronze award whilst increasing the level of difficulty. It is a natural progression of practical dog 
                      training skills and introduces new concepts such as greeting a friend, vehicle control and a road walking exercise which are vital in everyday life situations.</p>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>New Addition</th>
                                <th>Kennel Name</th>
                                <th>Pet Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php perch_content('GC Silver'); ?>
                        </tbody>  
                    </table>
                </div>
                <div class="tab-pane" id="gold">
                    <h2>Gold Awards</h2>
                    <p>The Gold Award is the highest level of achievement within the Scheme awards. It builds upon the skills learnt in the Silver Award and develops more advance training 
                      skills of the dog and handler. The Gold Award introduces new concepts such as sending a dog to Bed, Relaxed Isolation, an Emergency Stop and Heelwork off the lead, 
                      all of which provide greater understanding and control.</p>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>New Addition</th>
                                <th>Kennel Name</th>
                                <th>Pet Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php perch_content('GC Gold'); ?>
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
         
         
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#tabs').tab();
            });
        </script>
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
  </body>
</html>
