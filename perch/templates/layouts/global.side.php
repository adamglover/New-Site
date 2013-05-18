<div class="span4">
          <!--Next Event-->
          <?php 
            $opts = array(
              'page'=>'/events/event-details.php',
              'template'=>'_next_event.html',
              'sort'=>'event_date',
              'sort-order'=>'DESC',
              'count'=> 1
            );
            perch_content_custom('Event Details', $opts); 
          ?>
          
         <div class="well"> 
          <h2>Latest News</h2>
          <?php 

          $opts = array(
            'sort'=>'postDateTime',
            'sort-order'=>'DESC',
            'count'=>'3',
            'template'=>'blog/homepage_post_in_list.html'
            );
          perch_blog_custom($opts); ?>

          </div>
          <!--FB Like Box-->
          <div class="fb-like-box" data-href="https://www.facebook.com/SouthernFinnishLapphundSociety" data-width="370" data-show-faces="false" data-stream="true" data-header="true">
          </div>