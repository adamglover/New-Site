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

        /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }

    .logohead {
      background-color: white;
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
      'home'=> 'active',
    )); ?>
      
     <div class="container main"> 
      <!-- Left Column-->
      <div class="row">
        <!--News list-->
        <div class="span8">
          <h1>News Archive</h1>
		    <?php 
		        // CHANGE MODE DEPENDING ON WHAT OPTIONS ARE PASSED IN ON THE QUERYSTRING
		        
		        // Default mode
		        $mode = 'date';
		        $date_from  = date('Y-01-01 00:00:00');
		        $date_to    = date('Y-12-31 23:59:59');
		        
		        
		        // Category?
		        if (perch_get('cat')) {
		            $mode = 'category';
		            $categorySlug = perch_get('cat');
		            $categoryTitle = perch_blog_category($categorySlug, true);
		            echo '<h1>Archive of: '.$categoryTitle.'</h1>';
		        }
		        
		        // Tag?
		        if (perch_get('tag')) {
		            $mode = 'tag';
		            $tagSlug = perch_get('tag');
		        }
		        
		        // Year?
		        if (perch_get('year')) {
		            $mode = 'date';
		            $year = intval(perch_get('year'));
		            $date_from  = $year.'-01-01 00:00:00';
		            $date_to    = $year.'-12-31 23:59:59';
		            
		            
		            // Month and Year?
		            if (perch_get('month')) {
		                $month = intval(perch_get('month'));
		                $date_from  = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-01 00:00:00';
		                $date_to    = $year.'-'.str_pad($month, 2, '0', STR_PAD_LEFT).'-31 23:59:59';
		            }
		        }
		        
		        
		        // NOW WE KNOW WHAT MODE, LET'S DO THE PERCH STUFF
		        
		        
		        switch($mode) 
		        {
		            case 'category':
		                $opts = array(
		                    'category'=>rtrim($categorySlug, '/')
		                    );
		                break;
		                
		            case 'tag':
		                $opts = array(
		                    'tag'=>rtrim($tagSlug, '/')
		                    );
		                break;
		                
		            case 'date':
		                $opts = array(
		                    'filter'=>'postDateTime',
		                    'match'=>'eqbetween',
		                    'value'=>$date_from.','.$date_to
		                    );
		                break;
		                
		            
		            
		        }
		        
		        // show 10 items per page
		        $opts['count'] = 10;
		        
		        // order by date, newest to oldest
		        $opts['sort'] = 'postDateTime';
		        $opts['sort-order'] = 'DESC';
		        
		        $opts['template'] = 'post_in_list.html';
		        
		        perch_blog_custom($opts);
		    ?>
	    </div>
	    
		<div class="span4">
          	<!--Next Event-->
          	<div class="well">
            	<h2>Next Event</h2>
            	<p>This is about our next event</p>
            	<p>Could be a walk, a seminar, the AGM, Fundays, anything that is orgnised by the club</p>
          	</div>
			<div class="well">

				<h2>Archive</h2>
		    	<!-- The following functions are different ways to display archives. You can use any or all of these. 
		    
		    	All of these functions can take a parameter of a template to overwrite the default template, for example:
		    
		    	perch_blog_categories('my_template.html');
		    
		    	--> 
		    	<!--  By category listing -->
		    	<?php perch_blog_categories(); ?>
		    	<!--  By tag -->
		    	<?php perch_blog_tags(); ?>
		    	<!--  By year and then month - can take parameters for two templates. The first displays the years and the second the months see the default templates for examples -->
		    	<?php perch_blog_date_archive_months(); ?>
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

  </body>
</html>