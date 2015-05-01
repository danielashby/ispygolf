<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Blogger WPExplorer Theme
 * @since Blogger 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title>Golf News  iSpyGolf</title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    
<!-- Bootstrap core CSS -->
	<!-- load bootstrap from a cdn -->
	<link rel="stylesheet" href="/css/bootstrap.css">
    
    <!-- jquery autocomplete thems -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    
    <!-- the font -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
    
    
    <!-- ispygolf customs -->
    <link href="/css/ispygolf.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="/css/awesome-bootstrap-checkbox.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- The one and only JQ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
	<!-- bootstrap responsive s -->
	<script src="/js/bootstrap.min.js"></script>
    
    <!-- query ui -->
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    
    <!-- infinite scroll -->
	<script src="/js/jquery.infinitescroll.min.js"></script>
    
    <!-- Sticky Menu --> 
    <script src="/js/jquery.sticky.js"> </script>
    
    <!-- Simple Slider -->
    <script src="/js/bjqs.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	if( $('#filter_options').length )  
	{
		//Search Options Submit
		$("#filter_options").change(function() {
		   $("#searchheadform").submit();
		
		});
	};
    
	<!-- sticky nav bars -->

	$("#sticker").sticky({topSpacing:50});


});

</script>      
</head>

<body <?php body_class(); ?> style="background-image: url('/blog/wp-content/themes/wpex-blogger/images/bg-news-sized.jpg');background-repeat: no-repeat;background-position: top center;background-attachment: fixed;">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="/">
        		<img alt="Brand" style="height:30px;" src="/images/logo.png">
      		</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
               <li><a href="/golfcourses">GOLF COURSES</a></li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">COURSES
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/golfcourses?country=England">ENGLAND
                    <img class="pull-right" src="/images/flag_england_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Scotland">SCOTLAND
                    <img class="pull-right" src="/images/flag_scotland_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Wales">WALES
                    <img class="pull-right" src="/images/flag_wales_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Ireland">IRELAND
                    <img class="pull-right" src="/images/flag_ireland_small.png" /></a></li>
                    <li><a href="/golfcourses?country=France">FRANCE
                    <img class="pull-right" src="/images/flag_france_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Portugal">PORTUGAL
                    <img class="pull-right" src="/images/flag_portugal_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Spain">SPAIN
                    <img class="pull-right" src="/images/flag_spain_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Bulgaria">BULGARIA
                    <img class="pull-right" src="/images/flag_bulgaria_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Greece">GREECE
                    <img class="pull-right" src="/images/flag_greece.png" /></a></li>
                    <li><a href="/golfcourses?country=Egypt">EGYPT
                    <img class="pull-right" src="/images/flag_egypt.png" /></a></li>
                    <li><a href="/golfcourses?country=Morocco">MOROCCO
                    <img class="pull-right" src="/images/flag_morocco.png" /></a></li>
                    <li><a href="/golfcourses?country=South+Affrica">SOUTH AFRICA
                    <img class="pull-right" src="/images/flag_sa_small.png" /></a></li>
                    <li><a href="/golfcourses?country=UAE">UAE
                    <img class="pull-right" src="/images/flag_uae_small.png" /></a></li>
                    <li><a href="/golfcourses?country=Mauritius">MAURITIUS
                    <img class="pull-right" src="/images/flag_mauritius_small.png" /></a></li>                    
                  </ul>
               </li>
               <li><a href="/golfbreaks/">GOLF BREAKS</a></li>
               <li><a href="/golfmembership/">GOLF MEMBERSHIP</a></li>
               <li><a href="/golfdays/">GOLF DAYS</a></li>
               <li><a href="/offers/">OFFERS</a></li>
               <li><a class="grey" href="/news/">NEWS</a></li>
               <li><a class="grey" href="/maps/">MAP</a></li>
               <li><a class="grey" href="/blog/">BLOG</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div id="wrap" class="clr">

	   <div id="header-wrap" class="clr">
			<header id="header" class="site-header clr container" role="banner">
				
				
					<div id="logo" class="clr">
							<div class="site-text-logo clr">
					<a href="/news" title="iSpyGolf News" rel="News">Golf Club & Resort News</a>
									</div>
					</div><!-- #logo -->				
				<?php
				
				// Outputs the site logo
				// See functions/logo.php
				//wpex_logo();
				// Social links
				wpex_header_aside(); ?>
			</header>
		</div>
		
		<div id="main" class="site-main clr container">