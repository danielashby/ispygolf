// JavaScript Document

		var map;
		var geocoder;
		var markerCluster;
		var total_clubs;
		var infowindow = new google.maps.InfoWindow();
		var path = new google.maps.MVCArray;
		var center;
		var latLng;
		var marker;
		var cluster_opt;
	   
		var markers = [];
		  
		longitudes = new Array();
		lattitudes = new Array();
		bubhtml = new Array(); 
		  
		dir_courses = new Array();
		dir_destinations = new Array();
		dir_championship = new Array();
		dir_cororate = new Array();
		dir_society = new Array();
		dir_membership = new Array();
		dir_luxury = new Array();
		dir_offer = new Array();
		dir_soc_offer = new Array();
		dir_stay_offer = new Array();
		dir_member_offer = new Array();
		dir_corp_offer = new Array();


		function initialize() {

			center = new google.maps.LatLng(53.87844,-1.647949);
	
			geocoder = new google.maps.Geocoder();
	
			 var i = 0;
			 
			 $.ajax({
						url: '/js/markersv2.xml',
						type: 'GET', 
						dataType: 'xml',
						async:   false,
						success: function(xml){
														
								  $(xml).find("marker").each(function () {
								  
								  lattitudes[i] =  $(this).find("lat").text(); 
								  longitudes[i] =  $(this).find("lng").text(); 
								  bubhtml[i] = $(this).find("html").text(); 
								  
								  dir_courses[i] = $(this).find("dir_courses").text(); 
								  dir_destinations[i] = $(this).find("dir_destinations").text(); 
								  dir_championship[i] = $(this).find("dir_championship").text(); 
								  dir_cororate[i] = $(this).find("dir_cororate").text(); 
								  dir_society[i] = $(this).find("dir_society").text(); 
								  dir_membership[i] = $(this).find("dir_membership").text(); 
								  dir_luxury[i] = $(this).find("dir_luxury").text(); 
								  
								  dir_offer[i] = $(this).find("dir_offer").text(); 
								  
								  dir_soc_offer[i] = $(this).find("dir_soc_offer").text(); 
								  dir_stay_offer[i] = $(this).find("dir_stay_offer").text(); 
								  dir_member_offer[i] = $(this).find("dir_member_offer").text(); 
								  dir_corp_offer[i] = $(this).find("dir_corp_offer").text(); 	
								  
								  i++;
							  
							  
				
							  });
						}  
						
			  }); 
		   
		    total_clubs = i;	
					   
		    cluster_opt = 'Y';
			
			
			map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 3,
			  center: center,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			});
		   		
			changeOverlays();
	  
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	

	  function showAddress() {
		  var address = document.getElementById('address').value;
		  geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
			  map.setCenter(results[0].geometry.location);
			  map.setZoom(10);
			  var marker = new google.maps.Marker({
				  map: map,
				  position: results[0].geometry.location
			  });
			} else {
			  alert('Postcode does not exist!');
			}
		  });
		  return false;
	  
	  }

	
	  function changeMarkersSpecOffers()
	  {
			/* var sel_championship = document.getElementById("dir_championship").checked;		
			var sel_destinations = document.getElementById("dir_destinations").checked;	
			var sel_membership  = document.getElementById("dir_membership").checked;			
			var sel_all = document.getElementById("dir_all").checked;	
			var sel_specials = document.getElementById("dir_specials").checked;	
			
			document.getElementById("dir_all").checked = false;
			document.getElementById("dir_championship").checked = false;
			document.getElementById("dir_destinations").checked = false;
			document.getElementById("dir_membership").checked = false;
			document.getElementById("dir_specials").checked = true;

			changeOverlays(); */
			
	  }
	  
	  function changeMarkersAllDir()
	  {
			var sel_championship = document.getElementById("dir_championship").checked;		
			var sel_destinations = document.getElementById("dir_destinations").checked;	
			var sel_membership  = document.getElementById("dir_membership").checked;			
			var sel_all = document.getElementById("dir_all").checked;	
			
			
			document.getElementById("dir_all").checked = true;
			document.getElementById("dir_championship").checked = false;
			document.getElementById("dir_destinations").checked = false;
			document.getElementById("dir_membership").checked = false;
			document.getElementById("dir_specials").checked =false;

			changeOverlays();
			
	  }
	  
	  function changeMarkersDir()
	  {
			var sel_championship = document.getElementById("dir_championship").checked;		
			var sel_destinations = document.getElementById("dir_destinations").checked;	
			var sel_membership  = document.getElementById("dir_membership").checked;			
			var sel_all = document.getElementById("dir_all").checked;

			
			if(sel_championship==1 || sel_membership==1 || sel_society==1 || sel_corporate==1 || sel_luxury==1
			   || sel_destinations==1 || sel_championship==1)
			{
				document.getElementById("dir_all").checked = false;
				document.getElementById("dir_specials").checked =false;
			}
			else
			{
				document.getElementById("dir_all").checked = true;
			}

			changeOverlays();
			
	  }
	  

	  
	  function changeOverlays()
	  {
		  

		  
		if (markerCluster) {
          markerCluster.clearMarkers();
        }
		   
           for (var i = 0; i < total_clubs; ++i) 
		   {
		   		markers.pop();
		   }
			
			//New v2 set to all courses as no options given any more
			var sel_all = true;
			var sel_specials = false;
			
			//var sel_championship = document.getElementById("dir_championship").checked;		
			//var sel_destinations = document.getElementById("dir_destinations").checked;		
			//var sel_membership  = document.getElementById("dir_membership").checked;			
			//var sel_all = document.getElementById("dir_all").checked;
			//var sel_specials = document.getElementById("dir_specials").checked;
		   

		   
		   for (var i = 0; i < total_clubs; ++i) 
		   {     		   						
				var valid=false;
				
				if(sel_all==0)
				{
					if(sel_championship==1 && dir_championship[i]==1) valid = true;
					if(sel_destinations==1 && dir_destinations[i]==1) valid = true;
					if(sel_membership==1 && dir_membership[i]==1) valid = true;
				}
				else
				{
					valid=true;
				}
				
				if(sel_specials==1)
				{
					if(dir_offer[i]==1 || dir_stay_offer[i]==1 || dir_member_offer[i]==1 )
					{
						valid=true;
					}
					else
					{
						valid=false;
					}
					
				}
				  	 				 
				if(valid==false){continue;}
				
				



				latLng = new google.maps.LatLng(lattitudes[i],longitudes[i]); 
						
				if(cluster_opt=="Y")
				{
				  marker = new google.maps.Marker({
					position: latLng,
					icon: '/images/map-course-icon.png' // Optional Marker Icon to use
				  });		
				}
				else
				{
				  marker = new google.maps.Marker({
					position: latLng,
					map: map,
					icon: 'images/map-course-icon.png' // Optional Marker Icon to use
				  });
				}
				
				//marker.bindInfoWindowHtml(bubhtml[i]);  
				makeInfoWindowEvent(map, infowindow, bubhtml[i], marker);
		
				markers.push(marker);
		   
		   
		   
		   }
		   if(cluster_opt=="Y") {markerCluster = new MarkerClusterer(map, markers);};
		  
		   
		   	  function makeInfoWindowEvent(map, infowindow, contentString, marker) {
		  google.maps.event.addListener(marker, 'click', function() {
			
			
			if (infowindow) {
				infowindow.close();
			}
			infowindow.setContent(contentString);
			infowindow.open(map, marker);
		  
		  });
		  }	

				
	  }