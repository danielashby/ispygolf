
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    

<script type="text/javascript">


                        


$(document).ready(function() {


	if( $('#mainsearch_input').length )       
	{
		//HOME PAGE SEARCH AJAX

		$( "#mainsearch_input" ).autocomplete({
		  source: "/ajax/coursesearch",
		  minLength: 0,
		  select: function( event, ui ) {
			
			 $("#country").val("");
			 $("#region").val("");
			 $("#town").val("");
			 $("#name").val("");
			 
			 $("#"+ui.item.type).val(ui.item.value);
			 this.value =  ui.item.value;
			 return false;
		  }
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "ui-autocomplete-item", item )
				.append( "<span style='text-align:left;'><a>" + "<span class='glyphicon glyphicon-med glyphicon-"+item.imgsrc+"' aria-hidden='true'> </span>&nbsp;" + item.label+ "</a></span>" )
				.appendTo( ul );
		};
	
	};
	

	if( $('#filter_options').length )  
	{
		//Search Options Submit
		$("#filter_options").change(function() {
		   $("#searchheadform").submit();
		
		});
	};
    
	$('.listing').infinitescroll({
		navSelector  : ".pagination",            
		nextSelector : ".pagination li:last a:last",    
		itemSelector : "#content .listing",
		
		loading: {
			msgText  : "<em>Loading More Results...</em>",
			msg: null
		},
		bufferPx: 80
	 });


	<!-- sticky nav bars -->

	$("#sticker").sticky({topSpacing:50});
	
	
	$('#profile-slider').bjqs({
		'height' : 325,
		'width' : 808,
		'responsive' : true,
animtype : 'fade', // accepts 'fade' or 'slide'
animduration : 450, // how fast the animation are
animspeed : 4000, // the delay between each slide
automatic : true, // automatic
showcontrols : false,
showmarkers: false
	});
	
	
	<!-- smooth scrolling --> 
	
	  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 150
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
		
		var pop_url1 = "/destination/search/search.php?name=Machrihanish%20Dunes";
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