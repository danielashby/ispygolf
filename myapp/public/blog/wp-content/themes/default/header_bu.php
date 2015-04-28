<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>ispygolf pro blog</title>

<link rel="stylesheet" href="/wp-content/themes/default/test.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php 
	  // This gets the standard WP scripts etc to include in header 
	  wp_head(); 
?>

  <div id="container">
  <div id="header">
    <div id="head_logo">
       <a href="http://www.ispygolf.com"><img src="http://www.ispygolf.com/images/logo_new.png" alt="iSpyGolf Logo"/></a>
    </div>
    
    <div id="head_right">
       <div id="head_links">
	      <span class="banhyperlink">
						<a href="http://www.ispygolf.com/isgnusers/main.php" rel="nofollow">Sign In</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a href="http://www.ispygolf.com/isgnusers/register.php" rel="nofollow">Sign Up</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a href="http://www.blog.ispygolf.com/" rel="nofollow">Pro Blog</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a href="http://www.ispygolf.com" rel="nofollow">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	      	<a href="http://www.youtube.com/user/ispygolf" target="_blank"><img src="http://www.ispygolf.com/images/symbols/youtube.jpg" alt="Youtube Channel"/></a>&nbsp;
		                <a href="http://www.facebook.com/pages/ispygolf/309554699600" target="_blank"><img src="http://www.ispygolf.com/images/symbols/facebook_smallsmall.jpg" alt="Facebook Page"/></a>&nbsp;
						<a href="http://twitter.com/ispygolfpro" target="_blank"><img src="http://www.ispygolf.com/images/symbols/twitter_smallsmall.jpg" alt="Twitter Page"/></a>
       </div>        
       <div id="head_form">
          <form style="display:inline;" action="http://lb.benchmarkemail.com//code/lbform" method="post" name="frmLB70853" accept-charset="UTF-8" onsubmit="return _checkSubmit70853();" >
          <table class="headerform">
             <tr>
               <td class="homepgtext_grey">
               The best offers &amp; latest deals sent straight to your inbox. Sign up<span class="homepgtext_white"> FREE</span>&nbsp;
               </td>
               <td>
               <input type="hidden" name="successurl" value="http://www.ispygolf.com/signup/thankyou.php" />
               <input type="hidden" name="errorurl" value="http://lb.benchmarkemail.com//Code/Error" />
               <input type="hidden" name="token" value="mFcQnoBFKMTukRdn2WLa%2BuoNbCMyivkXIwHd3x7rQqE%3D" />
               <input type="hidden" name="doubleoptin" value="" />                          
               <input class="homepgtext_grey_input" name="fldEmail" type="text" style='width:130px' maxlength="100" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Add email here':this.value;" value="Add email here" />
               </td>
               <td>
               <input type="image" src="http://www.ispygolf.com/images/golfshot_but.png" alt="Submit" />
               </td>
             </tr>
          </table>
          </form>    
	   </div>
    </div> 
    <div class="site_nav" style="background: url(http://www.ispygolf.com/images/ispyheadbg.jpg);background-repeat:repeat-x;height:52px;">
	   <ul>
	      <li class="greyheader"><a href="http://www.ispygolf.com/courses/">COURSES</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/destination/">DESTINATIONS</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/luxury/">LUXURY</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/society/">SOCIETY</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/corporate/">CORPORATE</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/membership/">MEMBERSHIP</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/proshop/">PRO SHOP</a></li>
		  <li class="greyheader"><a href="http://www.ispygolf.com/property/">PROPERTY</a></li>
		  <li class="greenheader"><a href="http://www.ispygolf.com/maps/isgmap.php">COURSE MAP</a></li>
		  <li class="greenheader"><a href="http://www.ispygolf.com/courses/search/offersearch.php" title="iSpyGolf Offers">OFFERS</a></li>
	   </ul>  
    </div> 
	<div id='new_breadcrumb'><ul></ul></div>
  </div>
  <div style="clear:both" > </div>



</head>
<body >
