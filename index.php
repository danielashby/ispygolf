<?php
session_start();
$_SESSION['selectedPromotions'] = null;
require_once('includes/db.php');
$db = new database();

/*
database schema:

id: int
headline: text
bodycopy: text
legal: text
offerimage: varchar(100)
northTerminal: boolean
southTerminal: boolean
beforeSecurity: boolean
afterSecurity: boolean
offerType: varchar(50)
offerSection: smallint
active: boolean
*/

/*
offer sections
1) Food & Drink 
2) Fashion 
3) Accessories 
4) Cosmetics 
5) Fragrances 
6) Electronics 
7) Entertainment 
8) Kids 
9) Car Parking
10) Car Rental
11) Money
12) Flight Deals
13) Lounges
14) Duty Free
*/
$terminal = '';
$category = '';
$jsOverride = '';
if(isset($_GET['terminal'])) {
	switch($db->escapeVar($_GET['terminal'])) {
	case 'north':		$terminal = " AND northterminal = 1"; $jsOverride .= "selectTerminal('north');"; break;
	case 'south':	$terminal = " AND southterminal = 1"; $jsOverride .= "selectTerminal('south');"; break;
	case 'both':		$terminal = " AND (northterminal = 1 OR southterminal = 1)"; $jsOverride .= "selectTerminal('both');"; break;
	}
}
if(isset($_GET['category'])) {
	$category = " AND offersection = {$db->escapeVar($_GET['category'])}";
	$jsOverride .= "selectOption({$db->escapeVar($_GET['category'])});";
}

$sql = "SELECT * FROM offers WHERE active = 1 AND offertype IN('headline', 'spotlight')";

$query = $db->doQuery($sql);
$rows = $db->getAffectedRows();
$errCode = $db->getErrorCode();

$headlineOffers = null;
$spotlightOffers = null;
$mainOffers = null;

if($rows > 0 && $errCode == 0) {
	$offers = $db->getResults($query);
	
	$headerCount = 0;
	$spotlightCount = 0;
	
	shuffle($offers);
	
	foreach($offers as $offer) {
		switch($offer['offertype']) {
		case 'headline':	$headlineMarkup .= <<<HEADLINEMARKUP
<div class="topdeal-holder" id="topdeal{$headerCount}">
	<div>
		<img src="http://localhost/gatwick_goodbuys/images/headline offers/{$offer['offerimage']}" alt="{$offer['bodycopy']}" />
		<!-- <img src="http://www.gatwickgoodbuys.com/images/headline offers/{$offer['offerimage']}" alt="{$offer['bodycopy']}" /> -->
		<p>{$offer['headline']}</p>
	</div>
</div>
HEADLINEMARKUP;
									$headerCount++;
									break;
		case 'spotlight':	$spotlightMarkup .= <<<SPOTLIGHTMARKUP
<div class="spotlight-holder" id="spotlight{$headerCount}">
	<img src="http://localhost/gatwick_goodbuys/images/spotlight offers/{$offer['offerimage']}" alt="{$offer['bodycopy']}" />
	<!-- <img src="http://www.gatwickgoodbuys.com/images/spotlight offers/{$offer['offerimage']}" alt="{$offer['bodycopy']}" /> -->
</div>
SPOTLIGHTMARKUP;
									$spotlightCount++;
									break;
		}
	}
} else {
	$headlineMarkup = '';
	$spotlightMarkup = '';
}

$sql = "SELECT * FROM offers WHERE active = 1 AND offertype = 'main'$terminal$category";
//var_dump($sql);
$query = $db->doQuery($sql);
$rows = $db->getAffectedRows();
$errCode = $db->getErrorCode();
//var_dump($rows, $errCode);
$headlineOffers = null;
$spotlightOffers = null;
$mainOffers = null;

if($rows > 0 && $errCode == 0) {
	$offers = $db->getResults($query);		
	
	$mainCount = 0;
	foreach($offers as $offer) {
		
		$offerInfo = "";
		
//		if (($offer['bodycopy'] == "")&&($offer['legal'] == ""))
//		{
//			$offerInfo = '<p class="sub-img"><img src="http://localhost/gatwick_goodbuys/'.$offer['offerimage2'].'" /></p>';
			//			$offerInfo = '<p class="main-body">'.$offer['bodycopy'].'</p>';
			//$offerInfo .= '<p class="main-legal">'.$offer['legal'].'</p>';	
//		}
//		else
//		{
			$offerInfo = '<p class="main-body">'.$offer['bodycopy'].'</p>';
			$offerInfo .= '<p class="main-legal">'.$offer['legal'].'</p>';			
//		}
		
		
		$security = 'afterSecurity';
		if($offer['beforesecurity'] == 1 && $offer['aftersecurity'] == 1) {
			$security = 'beforeAndAfterSecurity';
		} else if($offer['beforesecurity'] == 0 && $offer['aftersecurity'] == 0) {
			$security = 'nosecurity';
		} else {
			if($offer['beforesecurity'] == 1) {
				$security = 'beforeSecurity';
			}
		}
		$mainMarkupArray[$offer['id']] = <<<MAINMARKUP
<div class="main-holder {$security}" id="maindeal{$mainCount}">
	<img class="main-img" src="http://localhost/gatwick_goodbuys/images/offers/{$offer['offerimage']}" alt="{$offer['headline']}" />
	<!-- <img class="main-img" src="http://www.gatwickgoodbuys.com/images/offers/{$offer['offerimage']}" alt="{$offer['headline']}" /> -->
	<p class="main-headline">{$offer['headline']}</p>
	{$offerInfo}
	<img src="http://localhost/gatwick_goodbuys/images/sections/{$offer['offersection']}.png" class="offerSection" />
	<!-- <img src="http://www.gatwickgoodbuys.com/images/sections/{$offer['offersection']}.png" class="offerSection" /> -->
	<div class="clearfix">&nbsp;</div>
</div>
MAINMARKUP;
	}
	
	$mainMarkup = '<div id="showmoreTop" style="margin-bottom:20px;">
				   <img id="spinnerTop" src="images/spinner.gif" alt="loading..." style="display:none; float:right; margin-top:8px;" />
				   </div>
				   <div id="offers">';
	
	$count = 0;
	$limit = min(count($mainMarkupArray), 10) - 1;
	$selectedPromotions = null;
	$keys = array_keys($mainMarkupArray);
	shuffle($keys);
	foreach($keys as $key) {
		if($count <= $limit) {
			$mainMarkup .= $mainMarkupArray[$key];
			$selectedPromotions[] = $key;
			$count++;
		}
	}

		$mainMarkup .= '</div>
				<p class="offFooter">You can take advantage of our fantastic Gatwick Good Buy promotions throughout the Summer.</p>
				<p class="cc2"><a href="print.php?terminal=north" target="_blank">Print North Terminal offers</a> <a href="print.php?terminal=south" target="_blank">Print South Terminal offers</a></p>
				<br class="clear" />
				<div id="showmore">
                <p>Showing Records 1 to 10 of '.$rows.'</p>
				<img id="btnGetOffers" src="images/show-more-button.jpg" width="286" height="44" alt="show more Good Buys" onclick="getOffers();" />
				<img id="spinner" src="images/spinner.gif" alt="loading..." style="display:none; float:right; margin-top:8px;" />
				</div>';

	if(is_array($_SESSION['selectedPromotions'])) {
		$_SESSION['selectedPromotions'] = array_merge($_SESSION['selectedPromotions'], $selectedPromotions);
	} else {
		$_SESSION['selectedPromotions'] = $selectedPromotions;
	}

} else {
	$mainMarkup = '';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta property="og:title" content="Gatwick Good Buys"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://localhost/gatwick_goodbuys"/>
<!-- <meta property="og:url" content="http://www.gatwickgoodbuys.com"/> -->
<meta property="og:image" content="http://www.dnxclients.com/gatwick/621/edm/images/ggb_10.jpg"/>
<meta property="og:site_name" content="Gatwick Airport"/>
<meta property="og:description" content="Flying from Gatwick Airport? Check out Gatwick Good Buys today"/>
<link type="image/x-icon" href="favicon.ico" rel="SHORTCUT ICON">
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="apple-touch-icon" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon" sizes="72x72" href="images/touch-icon-ipad.png" />	
<link rel="apple-touch-icon" sizes="114x114" href="images/touch-icon-iphone4.png" />  


<title>Gatwick Good Buys</title>
<script src="js/modernizr-1.7.min.js" type="text/javascript"></script>

<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen" />

<?php 
$using_ie6 = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== FALSE);
$using_ie7 = (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') !== FALSE);

if ($using_ie6)
{
	echo '<link rel="stylesheet" type="text/css" href="css/ie6.css" />';
}
else if ($using_ie7)
{
	echo '<link rel="stylesheet" type="text/css" href="css/ie7.css" />';	
}
else
{
	echo '<script src="js/css3.mediaqueries.min.js" type="text/javascript"></script>';
	echo '<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />';
}
?>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" />



<!--[if lt IE 8 ]>
	<link rel="stylesheet" type="text/css" href="css/ie8.css" />
<![endif]-->


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('a[rel^="prettyPhoto"]').prettyPhoto({
		show_title: false,
		social_tools: false
	});
	
	<?php echo $jsOverride; ?>
});

var position = 1;
var spotlightCount = <?php echo $spotlightCount; ?>;
var resetOffers = false;
var dropdownStatus = 0;
var terminalDropdownStatus = 0;
var selectedSection = 0;
var selectedTerminal = 'both';
var animating = false;
var animatingTerminals = false;
var dropdownDuration = 750;

var jqb_vCurrent = 0;
var jqb_vTotal = 0;
var jqb_vDuration = 8000;
var jqb_intInterval = 0;
var jqb_vGo = 1;
var jqb_vIsPause = false;
var jqb_tmp = 20;
var jqb_title;
var jqb_imgW = 252;
var jqb_imgH = 337;

jQuery(document).ready(function() {	

	jqb_vTotal = jQuery(".spotlight-holder").children().size() -1;
	
	//alert (jqb_vTotal);
	
	jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
			
	//Horizontal
	jQuery("#offer-spotlight").find(".spotlight-holder").each(function(i) { 
		jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
		jQuery(this).animate({"left": jqb_tmp+"px"}, 2000);
	});
	
	
	
	jQuery("#spotlightPrev").click(function() {
		jqb_vGo = -1;
		jqb_fnChange();
	});
		
	jQuery("#spotlightNext").click(function() {
		jqb_vGo = 1;
		jqb_fnChange();
	});
});

function jqb_fnChange(){
	clearInterval(jqb_intInterval);
	jqb_intInterval = setInterval(jqb_fnLoop, jqb_vDuration);
	jqb_fnLoop();
}

function jqb_fnLoop(){
	if(jqb_vGo == 1){
		jqb_vCurrent == jqb_vTotal ? jqb_vCurrent = 0 : jqb_vCurrent++;
	} else {
		jqb_vCurrent == 0 ? jqb_vCurrent = jqb_vTotal : jqb_vCurrent--;
	}
	
			
	jQuery("#offer-spotlight").find(".spotlight-holder").each(function(i) { 
	
		//Horizontal Scrolling
		//jqb_tmp = ((i - 1)*jqb_imgW) - ((jqb_vCurrent -1)*jqb_imgW);
		//$('#spotlightScroller').animate({"left": jqb_tmp+"px"}, 500);
		
	
		
		
		//Fade In & Fade Out
		if(i == jqb_vCurrent){
			//$(".jqb_info").text($(this).attr("title"));
			jQuery(this).animate({  width: 'show' }, 2000);
		} else {
			jQuery(this).animate({  width: 'hide' }, 2000);
		}
		
		
	});


}



function toggleDropdown() {
	if(animating == false) {
		animating = true;
		if(dropdownStatus == 0) {
			$('.selectText').fadeIn(dropdownDuration, function() { animating = false; });
			dropdownStatus = 1;
		} else {
			$('.selectText').fadeOut(dropdownDuration, function() { animating = false; });
			dropdownStatus = 0;
		}
	}
}

function toggleTerminalDropdown() {
	if(animatingTerminals == false) {
		animatingTerminals = true;
		if(terminalDropdownStatus == 0) {
			$('.selectTerminalText').fadeIn(dropdownDuration, function() { animatingTerminals = false; });
			terminalDropdownStatus = 1;
		} else {
			$('.selectTerminalText').fadeOut(dropdownDuration, function() { animatingTerminals = false; });
			terminalDropdownStatus = 0;
		}
	}
}

function selectOption(selectedOption) {
	$('.selectedText').text($('#select' + selectedOption).text());
	if(selectedSection != selectedOption) {
		selectedSection = selectedOption;
		resetOffers = true;
	}
	getOffers();
}

function selectTerminal(terminal) {
	$('.selectedTerminalText').text($('#terminal_' + terminal).text());
	if(selectedTerminal != terminal) {
		selectedTerminal = terminal;
		resetOffers = true;
	}
	getOffers();
}

function getOffers() {
	//alert('fetching offers for terminal: ' + selectedTerminal + ' and section: ' + selectedSection);
	
	//resetOffers = true;
	
	$('#spinner').css('display', 'block');
	$('#btnGetOffers').attr('disabled', 'disabled');
	$('#spinnerTop').css('display', 'block');
	$('#btnGetOffersTop').attr('disabled', 'disabled');
	//var url = 'http://www.gatwickgoodbuys.com/fetchPromotions.php?terminal=' + selectedTerminal + '&section=' + selectedSection;
	var url = 'http://localhost/gatwick_goodbuys/fetchPromotions.php?terminal=' + selectedTerminal + '&section=' + selectedSection;
	if(resetOffers == true) {
		url += '&reset=true';
	}
	
	_gaq.push(['_trackEvent', 'request more offers', 'clicked', 'terminal=' + selectedTerminal + '&category=' + selectedSection]);
	$.get(url, function(response) {
		if(response == '') {
			alert('No more offers are available to display at this time. Please try again later as new offers are constantly being added.');
		} else {
			if(resetOffers == true) {
				$('#deals-holder').html(response);
			} else {
				$('#deals-holder').html(response);
				//$('#offers').html($('#offers').html() + response);
			}
		}
		$('#spinner').css('display', 'none');
		$('#btnGetOffers').attr('disabled', false);
		$('#spinnerTop').css('display', 'none');
		$('#btnGetOffersTop').attr('disabled', false);
		resetOffers = false; //any future offers will be appended unless the user tweaks their filters
	});
}

function validateSignup() {
	var name = $(' #txtName').val();
	var email = $(' #txtEmail').val();
	var regexEmail = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+\.)+[a-zA-Z0-9]{2,6}$/;
	
	if(name != '' && email.match(regexEmail) != null) {
		//$('.pp_inline #frmSignup').submit();
		return true;
	} else {
		alert('Please ensure that you have entered your name and email address correctly.');
		return false;
	}
}

$(function() {  
  $(".formBut").click(function() {  
	// validate and process form here  
	//alert('pants');
	
	var name = $(' #txtName').val();
	var email = $(' #txtEmail').val();
	var regexEmail = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+\.)+[a-zA-Z0-9]{2,6}$/;
	
	if(name != '' && email.match(regexEmail) != null) {
		//$('.pp_inline #frmSignup').submit();
		// return true;
	} else {
		alert('Please ensure that you have entered your name and email address correctly.');
		return false;
	}	
	
    var dataString = 'txtName='+ name + '&txtEmail=' + email;  
    //alert (dataString);return false;  
    $.ajax({  
      type: "POST",  
      url: "signup.php",  
      data: dataString,  
      success: function() {  
        $('#frmSignup2').html("<div id='message'></div>");  
        $('#message').html("<h3>Thank you for registering!</h3>")  
        .append("<p>We'll be in touch...</p>")  
        .hide()  
        .fadeIn(1500, function() {  
          $('#message');  
        });  
      }  
    });  
    return false;  	
  });  
});  
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24072769-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
	<div id="wrapper">
<!-- ----Header---- -->  	
		<div id="header">
			<div id="social"> 
            	<div class="ccMob">
				<a href="http://www.gatwickairport.com/" target="_new">
                <img style="float:left;" src="images/gatwick-logo-small.jpg" alt="London Gatwick Logo" />
                </a>                
                <img style="float:right;" src="images/ggb-logo-eesmall.jpg" alt="Gatwick Good Buys logo" />
                </div>
                <div class="cc2">
                <a href="http://www.gatwickairport.com/" target="_new">
                <img style="float:left;" src="images/gatwick-logo.jpg" width="255" height="58" alt="London Gatwick Logo" />
                </a>
                </div>
				<div id="social-icons" class="cc2">
		        <p class="cc3">Know anyone else that's travelling? Share this page:</p>
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e04c3285cfdf930"></script>
					<!-- AddThis Button END -->
				</div>                
			</div>

<!-- ----Top Deals---- -->		   
			<div id="top-deals" class="cc2">
				<div id="top-deals-left">
                	<div class="top-deals-details">
					<h1>Great Deals at the Airport!</h1>
		   			<p id="header-text">Airport shopping at Gatwick has never been better value.  Our fantastic Gatwick Good Buys promotions are 
                    running throughout the Summer months.  With everything from great value on-airport parking to the latest designer clothes 
                    and accessories, meal deals, gadgets and much more, you'll be sure to find whatever you need at prices you'll love.</p>
                    </div>
                    <div style="float:right;" class="ccTab"><img src="images/ggb-logo-esmall.jpg"  alt="Gatwick Good Buys logo" /></div>
                    <div style="clear:both" class="ccTab"></div>
		   			<?php echo $headlineMarkup; ?>
				</div>
				<div id="ggb-logo" class="cc3"><img src="images/ggb-logo.png" width="367" height="379" alt="Gatwick Good Buys logo" /></div>                
			</div> 
		</div>

<!-- ----Left Column---- -->		 
		<div id="leftcol">
			<div id="filter-buttons">
				<div id="dropdownWrapper">
					<div id="terminalSelect" onclick="toggleTerminalDropdown();">
						<div class="selectedTerminalText" onclick="toggleTerminalDropdown();"><span>Select offers by terminal</span></div>
						<div class="odd selectTerminalText" id="terminal_both" onclick="selectTerminal('both');"><span>Both Terminals</span></div>
						<div class="even selectTerminalText" id="terminal_north" onclick="selectTerminal('north');"><span>North Terminal</span></div>
						<div class="odd selectTerminalText" id="terminal_south" onclick="selectTerminal('south');"><span>South Terminal</span></div>
					</div>
					<div id="sectionSelect" onclick="toggleDropdown();">
						<div class="selectedText" onclick="toggleDropdown();"><span>Select offers by category</span></div>
						<div class="odd selectText" id="select0" onclick="selectOption(0);"><span>All Promotions</span></div>
						<div class="even selectText" id="select1" onclick="selectOption(1);"><span>Food &amp; Drink</span></div>
						<div class="odd selectText" id="select2" onclick="selectOption(2);"><span>Fashion</span></div>
						<div class="even selectText" id="select3" onclick="selectOption(3);"><span>Accessories</span></div>
						<div class="odd selectText" id="select4" onclick="selectOption(4);"><span>Cosmetics</span></div>
						<div class="even selectText" id="select5" onclick="selectOption(5);"><span>Fragrances</span></div>
						<div class="odd selectText" id="select6" onclick="selectOption(6);"><span>Electronics</span></div>
						<div class="even selectText" id="select7" onclick="selectOption(7);"><span>Entertainment</span></div>
						<div class="odd selectText" id="select8" onclick="selectOption(8);"><span>Kids</span></div>
						<div class="even selectText" id="select9" onclick="selectOption(9);"><span>Car Parking</span></div>
						<div class="odd selectText" id="select10" onclick="selectOption(10);"><span>Car Rental</span></div>
						<div class="even selectText" id="select11" onclick="selectOption(11);"><span>Currency</span></div>
						<div class="odd selectText" id="select12" onclick="selectOption(12);"><span>Travel Offers</span></div>
						<div class="even selectText" id="select13" onclick="selectOption(13);"><span>Lounges</span></div>
                        <div class="even selectText" id="select14" onclick="selectOption(14);"><span>World Duty Free</span></div>
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
			</div>
			<div id="deals-holder">

					<?php echo $mainMarkup; ?>
				
			</div>
			<div id="deals-end"></div>
			<div id="customs" class="cc2">
				<div id="customs-left"></div>
				<div id="customs-middle">
					<p>Understanding your shopping allowance - <a href="#orangeBox" rel="prettyPhoto" title="" onclick="_gaq.push(['_trackEvent', 'orange bar', 'clicked', 'understanding your shopping allowance']);">click here</a></p>
				</div>
				<div id="customs-right"></div>
			</div>
		</div>

<!-- ----Right Column---- -->		 
		<div id="rightcol">
			<div id="offer-spotlight" class="cc2"><img src="images/spotlight-prev.png" alt="previous offer" class="spotlightButton" id="spotlightPrev" /><div id="spotlightWrapper"><div id="spotlightScroller"><?php echo $spotlightMarkup; ?></div></div><img src="images/spotlight-next.png" alt="next offer" class="spotlightButton" id="spotlightNext" /></div>


			<div id="email-signup" class="cc3"><a href="register.html?iframe=true&width=375&height=300" rel="prettyPhoto" title="" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'register for updates']);"><img src="images/email-signup-bg.jpg" width="273" height="94" alt="sign up for exclusive offers" style="border:0px;" /></a></div>
			<div id="facebook" class="cc3"> <a href="http://www.facebook.com/GatwickAirport" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'facebook page']);"><img src="images/facebook-button.jpg" width="267" height="92" alt="like us on facebook" /></a></div>
			<!--<div id="emagazine"> <a href="//" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'airside magazine']);"><img src="images/emag-button.jpg" width="273" height="92" alt="download our e-magazine" /></a></div>-->
		
		
		
			<div id="button-emag" class="cc3">
<div id="button-north"><a href="http://www.issuu.com/gatwickairport/docs/airside_north_140711_ebook?showEmbed=true&amp;utm_source=Airside%2BNorth%2BTerm&amp;utm_medium=eBook&amp;utm_campaign=Gatwick%2BGood%2BBuys"><img src="images/btn_north.png" width="73" height="25" style="border:0px;"/></a></div>

<div id="button-south"><a href="http://www.issuu.com/gatwickairport/docs/airside_south_140711_ebook?showEmbed=true&amp;utm_source=Airside%2BSouth%2BTerm&amp;utm_medium=eBook&amp;utm_campaign=Gatwick%2BGood%2BBuys"><img src="images/btn_south.png" width="73" height="25" style="border:0px;"/></a></div>
</div>
		
		
			
			<div id="parking" class="cc3"> <a href="http://pfa.levexis.com/gatwick/tman.cgi/tmad=c&tmcampid=3&tmplaceref=2011_GatwickGoodbuysdotcom&tmloc=https:/parking.gatwickairport.com/Gatwick/Gatwick?utm_source=2011_GatwickGoodbuysdotcom&utm_medium=banner&utm_campaign=2011_GatwickGoodbuysdotcom" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'parking']);"><img src="images/parking-button.jpg" width="273" height="238" alt="official Gatwick parking - book now and save" /></a></div>
			<!--<div id="shopanddrop" class="cc3"> <a href="http://www.gatwickairport.com/shopping/shop-drop/" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'shop and drop']);"><img src="images/shop-drop-button.jpg" width="268" height="115" alt="shop and drop - find out more" /></a></div>-->
            <div id="shopanddrop" class="cc3"> <a href="http://www.gatwickeshop.com/?utm_source=Gatwick%2BGood%2BBuys%2Bwebsite&utm_medium=banner&utm_campaign=Gatwick%2BeShop" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'browse and reserve']);"><img src="images/eShop-Banners.jpg" width="268" height="115" alt="browse and reserve at gatwick" /></a></div>
            


			<!--<div id="emagazine"> <a href="//" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'airside magazine']);"><img src="images/emag-button.jpg" width="273" height="92" alt="download our e-magazine" /></a></div>-->
			<div id="parking" style="float:right;margin-right:20px;" class="ccTab"> <a href="http://pfa.levexis.com/gatwick/tman.cgi/tmad=c&tmcampid=3&tmplaceref=2011_GatwickGoodbuysdotcom&tmloc=https:/parking.gatwickairport.com/Gatwick/Gatwick?utm_source=2011_GatwickGoodbuysdotcom&utm_medium=banner&utm_campaign=2011_GatwickGoodbuysdotcom" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'parking']);"><img src="images/parking-button.jpg" width="273" height="238" alt="official Gatwick parking - book now and save" /></a></div>
			<!--<div id="shopanddrop" style="float:right;margin-right:20px;" class="ccTab"> <a href="http://www.gatwickairport.com/shopping/shop-drop/" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'shop and drop']);"><img src="images/shop-drop-button.jpg" width="268" height="115" alt="shop and drop - find out more" /></a></div>          -->
            <div id="shopanddrop" style="float:right;margin-right:20px;" class="ccTab"> <a href="http://www.gatwickeshop.com/?utm_source=Gatwick%2BGood%2BBuys%2Bwebsite&utm_medium=banner&utm_campaign=Gatwick%2BeShop" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'browse and reserve']);"><img src="images/eShop-Banners.jpg" width="268" height="115" alt="browse and reserve at Gatwick" /></a></div>            
            <div style="width:688px; float:left; clear:both;" class="ccTab"></div>
            <div id="email-signup" style="float:left;margin-left:20px;" class="ccTab"><a href="register.html?iframe=true&width=375&height=300" rel="prettyPhoto" title="" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'register for updates']);"><img src="images/email-signup-bg.jpg" width="273" height="94" alt="sign up for exclusive offers" style="border:0px;" /></a></div>
			<div id="facebook" style="float:right;margin-right:20px;" class="ccTab"> <a href="http://www.facebook.com/GatwickAirport" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'facebook page']);"><img src="images/facebook-button.jpg" width="267" height="92" alt="like us on facebook" /></a></div>			            
		
			<div id="parking" style="float:right;margin-right:13px;" class="ccMob"> <a href="http://pfa.levexis.com/gatwick/tman.cgi/tmad=c&tmcampid=3&tmplaceref=2011_GatwickGoodbuysdotcom&tmloc=https:/parking.gatwickairport.com/Gatwick/Gatwick?utm_source=2011_GatwickGoodbuysdotcom&utm_medium=banner&utm_campaign=2011_GatwickGoodbuysdotcom" target="_blank" onclick="_gaq.push(['_trackEvent', 'sidebar button', 'clicked', 'parking']);"><img src="images/parking-button.jpg" width="273" height="238" alt="official Gatwick parking - book now and save" /></a></div>			        
            <div id="email-signup" style="float:left;margin-left:20px;" class="ccMob">            
            <img src="images/email-signup-bg.jpg" width="273" height="94" alt="sign up for exclusive offers" style="border:0px;" />
            
            <div id="signup2">
                <form action="" name="frmSignup2" id="frmSignup2">
                    <div class="form-element" style="height:30px">
                        <label for="txtName">Name</label>
                        <input type="text" name="txtName" id="txtName">
                    </div>
        
                    <div class="form-element" style="height:30px">
                        <label for="txtEmail">Email Address</label>
                        <input type="text" name="txtEmail" id="txtEmail">
                    </div>
        
                    <div class="form-element" style="height:35px;">
                        <input type="checkbox" name="chkCanMail" id="chkCanMail" checked="checked" style="float:left; margin-left: 10px; width: 20px;">
                        <label for="chkCanMail" style="font-size:12px;float: left; text-align: left; width: 190px;line-height:normal;">I wish to receive further information from Gatwick Airport Limited</label>
                    </div>
                    
                    <div id="form-submit">
                        <button name="submit" value="" class="formBut" id="submit-button-small" type="submit" style="margin-left:40px;">
                    </button></div>
                </form>
            </div>            
                    
            </div>
		</div>

        <div id="social-icons" class="ccMob">
        
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
            <a class="addthis_button_preferred_1"></a>
            <a class="addthis_button_preferred_2"></a>
            <a class="addthis_button_preferred_3"></a>
            <a class="addthis_button_preferred_4"></a>
            <a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a>
            </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e04c3285cfdf930"></script>
            <!-- AddThis Button END -->
        </div>

<!-- ----Footer---- -->		 
		<div id="footer">
			<p class="cc2">
				<a target="_blank" href="http://www.gatwickairport.com/privacy/">Privacy policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a target="_blank" href="http://www.gatwickairport.com/terms/">Terms of use</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="terms.php" target="_blank">Terms and conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				&copy; London Gatwick Airport 2011&nbsp;&nbsp;|&nbsp;&nbsp;
				Visit <a target="_blank" href="http://www.gatwickairport.com/">gatwickairport.com</a>
			</p>
		</div>
	</div>
	
	<div id="orangeBoxWrapper" style="display:none">
		<div id="orangeBox" >
			<h2 class="allowance">Tax-Free Shopping</h2>
			<p class="allowance">Anyone travelling through the airport (including UK domestic flights) are entitled to buy selected goods such as fragrance, skincare, cosmetics, Champagne, wine, selected spirits, fashion accessories, shoes and clothes, sunglasses, gifts and souvenirs all at tax-free* equivalent prices.</p>
			<p class="allowance">If you are travelling within the EU there are no restrictions to the amount of goods you can buy. </p>
			<h2 class="allowance">Duty-Free Shopping</h2>
			<p class="allowance">If you are travelling to a non-EU country you may also be entitled to buy selected goods without incurring any customs duty.</p>
			<p class="allowance">Allowances and categories of products that can be purchased are governed by the destination country. For full details of individual countries’ allowances, please visit <a href="http://www.gatwickairport.com" target="_blank">www.gatwickairport.com</a></p>
			<p class="legal">*Tax-Free means the price before the addition of VAT. However, pricing policies for EU passengers do differ by retailer – please check with the actual retailer for their current policy.</a>
		</div>
	</div>

</body>

</html>