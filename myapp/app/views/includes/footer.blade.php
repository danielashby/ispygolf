
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    

<script type="text/javascript">

$(document).ready(function() {


	if( $('#homesearch_input').length )       
	{
		//HOME PAGE SEARCH AJAX

		$( "#homesearch_input" ).autocomplete({
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
				.append( "<span style='text-align:left;'><a>" + "<span class='item-icon'><img width='24' height='24' src='" + item.imgsrc + "' /></span>" + item.label+ "</a></span>" )
				.appendTo( ul );
		};
	
	};
	

	if( $('#filter_options').length )  
	{
		//Search Options Submit
		$("#filter_options").change(function() {
		   $(this).submit();
		
		});
	};
    

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