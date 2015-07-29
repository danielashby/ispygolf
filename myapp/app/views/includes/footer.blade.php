
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    

<script type="text/javascript">


var titleDisplayed = false;     


$(document).ready(function() {


	/* AJAX QUERIES */

	//HOME PAGE SEARCH AJAX
	if( $('#mainsearch_input').length )       
	{
		

		$( "#mainsearch_input" ).autocomplete({
		  source: "/ajax/coursesearch",
		  minLength: 0,
		  select: function( event, ui ) {
			
			 $("#country").val("");
			 $("#region").val("");
			 $("#town").val("");
			 $("#postcode").val("");
			 $("#name").val("");
			 
			 $("#"+ui.item.type).val(ui.item.value);
			 this.value =  ui.item.value;
			 return false;
		  },
		  change: function (event, ui) {
            if (ui.item === null) {
                $(this).val('');
                $('#name').val('');
            }
        }
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "ui-autocomplete-item", item )
				.append( "<span style='width:100%;text-align:left;'><a>" + "<span><img src='/images/icon-small-"+item.imgsrc+".png'></span>&nbsp;" + item.label+ "</a></span>" )
				.appendTo( ul );
		};
	
	};
	
	//GOLF BREAKS SEARCH AJAX
	if( $('#golfbreakssearch_input').length )       
	{
		

		$( "#golfbreakssearch_input" ).autocomplete({
		  source: "/ajax/golfbreakssearch",
		  minLength: 0,
		  select: function( event, ui ) {
			
			 $("#country").val("");
			 $("#region").val("");
			 $("#town").val("");
			 $("#postcode").val("");
			 $("#name").val("");
			 
			 $("#"+ui.item.type).val(ui.item.value);
			 this.value =  ui.item.value;
			 return false;
		  },
		  change: function (event, ui) {
            if (ui.item === null) {
                $(this).val('');
                $('#name').val('');
            }
        }
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "ui-autocomplete-item", item )
				.append( "<span style='width:100%;text-align:left;'><a>" + "<span><img src='/images/icon-small-"+item.imgsrc+".png'></span>&nbsp;" + item.label+ "</a></span>" )
				.appendTo( ul );
		};
	
	};
	
	
	if( $('#datepicker').length )       
	{
		
		$('#datepicker').datepicker({orientation : "bottom",autoclose:"true",todayHighlight:"true"})

	};
	
	
	if( $('.validatedForm').length )       
	{
		
		$('.validatedForm').validationEngine('attach');

	};
	
	
	

	if( $('#filter_options').length )  
	{
		//Search Options Submit
		$("#filter_options").change(function() {
		   $("#searchheadform").submit();
		
		});
	};
    
	if( $('.listing').length )  
	{ 
	$('.listing').infinitescroll({
		navSelector  : ".pagination",            
		nextSelector : ".pagination li:last a:last",    
		itemSelector : "#content .listing",
		
		loading: {
			msgText  : "<em></em>",
			msg: null
		},
		bufferPx: 500
	 });
	}


	<!-- sticky nav bars -->

	<!-- $("#sticker").sticky({topSpacing:50}); -->
    if( $('.menu').length )  
	{ 
        
$('.menu').addClass('original').clone().insertAfter('.navbar').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();



scrollIntervalID = setInterval(stickIt, 10);


	$('.navbar-brand').click(
	function(){
		
			var clickedid = $(this).attr('id');
					   
			$('.navbar-header a').each(
			function(){
			
				$(this).removeClass('selected');		
			});
			
			$(this).addClass('selected');

	});
	


function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop()+50 >= (orgElementTop)) {
   
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    
	if(titleDisplayed==false)
	{
    	$('.hidden-title-conatiner').show();
		titleDisplayed = true;
	}
	
	//GET SELECTED FROM ORIGINAL MENU AND TRASNFER TO STICKY CLONE :)
	var selectedid = "";
	
	$('.profile-nav a').each(
	function(){

		if($(this).hasClass('selected'))
		{
			selectedid = $(this).attr('id')
		}
		
	});
	
    $('.cloned').css('left',leftOrgElement+'px'+10).css('top',0).css('width','100%').show();
	
    $('.original').css('visibility','hidden');
	
	$('.cloned '+selectedid).addClass('selected');
	
	
  } else {
    
    $('.cloned').hide();
    $('.original').css('visibility','visible');
	
	
	$('.hidden-title-conatiner').hide();
	titleDisplayed = false;
      
      
  }
}        
        
	}
        
        
	
	
	$('#profile-slider').bjqs({
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	

	$('#profile-course-1-slider').bjqs({
		'height' : 341,
		'width' : 848,
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	
	

	$('#profile-course-2-slider').bjqs({
		'height' : 341,
		'width' : 848,
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	

	$('#profile-course-3-slider').bjqs({
		'height' : 341,
		'width' : 848,
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	

	$('#profile-course-4-slider').bjqs({
		'height' : 341,
		'width' : 848,
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	

	$('#profile-course-5-slider').bjqs({
		'height' : 341,
		'width' : 848,
		'responsive' : true,
		animtype : 'fade', // accepts 'fade' or 'slide'
		animduration : 450, // how fast the animation are
		animspeed : 4000, // the delay between each slide
		automatic : true, // automatic
		showcontrols : true,
		showmarkers: false
	});
	
	<!-- smooth scrolling --> 
	
	  $('a[href*=lnk_]:not([href=#]),a[href*=link_]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 200
        }, 1000);
        return false;
      }
    }
  });


	if( $('#main-search').length )  
	{	
	
	


	
	// Start Background Image Swap on homepage
	function startSlider() {
		
		
		var back_image1 = "images/home-mach-dunes.jpg";
		var back_image2 = "images/home-praia.jpg";
		
		var pop_image1 = "/images/pop-mach-dunes.png";
		var pop_image2 = "/images/pop-praia-del-rey.png"
		
		var pop_url1 = "/golfcourses/profile/Machrihanish-Dunes";
		var pop_url2 = "/destination/search/search.php?name=Praia%20D%27El%20Rey";
		
		//Setup initial displayed images
		$("#backgroundimg").attr('src',back_image1).fadeIn(600);
		$("#pop-img").attr('src',pop_image1).fadeIn(600);	
		$("#pop-img").attr('href',pop_url1);

        var nextBackground = 1;
		
		sliderBegin = setInterval(function() {
			
			if(nextBackground == 1) {
				
				$("#backgroundimg").fadeOut(400,function (){
					$("#backgroundimg").attr('src',back_image2).fadeIn(600);
					});
					
				$("#pop-img").fadeOut(400,function (){
					$("#pop-img").attr('src',pop_image2).fadeIn(600);
					});					
					
			    $("#pop-url").attr('href',pop_url2);
					
				nextBackground ++;
			
			}
			else if(nextBackground == 2) {

				$("#backgroundimg").fadeOut(400, function(){
					$("#backgroundimg").attr('src',back_image1).fadeIn(600);
					});

					
				$("#pop-img").fadeOut(400,function (){
					$("#pop-img").attr('src',pop_image1).fadeIn(600);
					});					
					
			    $("#pop-url").attr('href',pop_url1);

				//reset to beginning 	
				nextBackground =1;
				
			}
			
		}, 8000);
	}		
	
	startSlider();
	
	};


});

</script>