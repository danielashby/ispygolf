<?php
	//Include ISPYGOLF DEFAULT HEADER/FOOTER LIBRARY
	include '../includes/test_isghtmllib.php';
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!doctype html>
<html lang=en>
<head>
<meta charset=utf-8>

<META NAME="SKYPE_TOOLBAR" CONTENT="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

<META NAME="KEYWORDS" CONTENT="iSpyGolf, Golf Courses, Golf Course Directory, Golf Courses near, Golf Courses in," />

<META NAME="DESCRIPTION" CONTENT="Discover the best golf courses, latest golf breaks, club memberships and special offers on the most advanced golf search website in the world." />

<meta name="google-site-verification" content="3TS7FxFHb3QnhkWJ0eFUrfRHUr4Ht1lknYFv-77NIDw" />

<link href="/css/test.css" rel="stylesheet" type="text/css" />
<link href="/blog/wp-content/themes/default/test.css" rel="stylesheet" type="text/css" />
<link href="/blog/wp-content/themes/default/style.css" rel="stylesheet" type="text/css" />

<script src="/scripts/jquery-latest.js" type="text/javascript"></script>

<!--[if IE 6]>
<link href="/css/testie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<?php
	  // This gets the standard WP scripts etc to include in header
	  wp_head();
?>

<script type="text/javascript">
$(document).ready(function() {

	$(".trigger").click(function(){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});	



});

</script>

</head>

<body>

<?php
	echo $isghtmllib->header_acct_network("blog");
	?>
	
	<div style="clear:both;"></div>
	
    <div style="width:966px;margin-top:1px;">
    	
        <a href="/blog/"><img src="/blog/wp-content/themes/default/images/blog-header-colour.jpg" /></a>
    
    </div>
    
    
    <?php
	unset($isghtmllib);
?>