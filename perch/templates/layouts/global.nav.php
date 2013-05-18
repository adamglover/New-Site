<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="logohead">
        <div class="container">
          <!--site logo-->
          <h1 style="float:left;">LOGO HERE</h1>
          <!--search bar-->
          <form class="pull-right">
            <input type="text" class="search-query" placeholder="Search">
          </form>
        </div>
      </div>
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="<?php perch_layout_var('home'); ?>" ><a href="/">Home</a></li>
              <!--About Us-->
              <li class="dropdown">
                <a href="#" class="<?php perch_layout_var('about_us'); ?> dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/why_join.html">Why Join</a></li>
                  <li><a href="/award_prizes.html">Awards &amp; Prizes</a></li>
                  <li><a href="/meet_committee.html">Meet the Committee</a></li>
                  <li><a href="/rules_regulations.html">Rules &amp; Regulations</a></li>
                  <li class="divider"></li>
                  <!--Our Publications-->
                  <li class="nav-header">Our Publications</li>
                  <li><a href="/newsletter.html">Newsletter</a></li>
                  <li><a href="/yearbook.html">Yearbook</a></li>
                  <li><a href="/calendar.html">Calendar</a></li>
                </ul>
              </li>
              <!--Events-->
              <li class="<?php perch_layout_var('events'); ?> dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <!--Society Events-->
                  <li class="nav-header">Society Events</li>
                  <li><a href="/events/calendar">Events Calendar</a></li>
                  <li><a href="/events/walks">Walks</a></li>
                  <li><a href="/funday.html">Funday</a></li>
                  <li><a href="/agm.html">AGM</a></li>
                  <li><a href="/sfls_show.html">SFLS Open Show</a></li>
                  <li><a href="/floty.html">Finnish Lapphund of the Year</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Other Events</li>
                  <li><a href="/champ_shows.html">Championship Shows</a></li>
                  <li><a href="/open_shows.html">Open Shows</a></li>
                </ul>
              </li>
              <!--Finnish Lapphunds-->
              <li class="<?php perch_layout_var('finnish_lapphunds'); ?> dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Finnish Lapphunds<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/meet_the_breed.html">Meet the Breed</a></li>
                  <li><a href="/breed_standard">Breed Standard</a></li>
                  <li><a href="/colours.html">Colours</a></li>
                  <li><a href="/health.html">Health</a></li>
                </ul>
              </li>
              <!--Activities-->
              <li class="<?php perch_layout_var('activities'); ?> dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/activities/good_citizen">KC Good Citizen</a></li>
                  <li><a href="/showing.html">Showing</a></li>
                  <li><a href="/agility.html">Agility</a></li>
                  <li><a href="/other_ideas.html">Other ideas</a></li>
                </ul>
              </li>
              <!--Puppies & Breeders-->
              <li class="<?php perch_layout_var('puppies_breeders'); ?> dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Puppies &amp; Breeders<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/breeders.html">Finnish Lapphund Breeders</a></li>
                  <li><a href="/breeding_guidelines.html">Breeding Guidelines</a></li>
                  <li><a href="/new_puppy.html">For Your New Puppy</a></li>
                </ul>
              </li>
              <li class="<?php perch_layout_var('gallery'); ?>"><a href="/gallery.html">Gallery</a></li>
              <li class="<?php perch_layout_var('shop'); ?>"><a href="/shop.html">Shop</a></li>
              <li class="<?php perch_layout_var('contact'); ?>"><a href="#contact">Contact</a></li>
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