@extends('layouts.default')

@section('content')

<div  class="row profile-main-banner">
                        
      <div class="col-md-12 profile-main-banner-images">
      
      		  <div id="profile-slider">
              
              	<ul class="bjqs">
                	
                     {{-- Only show if has images. i.e if not just /hotelimages/ --}}
                     
                     @foreach ($profimages as $profimage)   
                 	    
                        @if ($profimage!="/hotelimages/") <li> <img class="img-responsive"  src="{{ $profimage }}" /> </li> @endif 
					 
                     @endforeach
                     
                </ul>
              
              </div>
                                
              
                    
       </div>
       
                                  

                           
                         
    </div>
    
                    <div class="row menu"  style="z-index:500;">
                  
                   <a name="link_overview"></a>

                    <div class="col-md-12 profilemenu"> 
                        
                        <nav class="navbar profile-navbar navbar-default">
                             
                          <div class="container">
                              
                              <div class="hidden-title-conatiner"><h3 class="hidden-title">{{ $profdetail['PROF_HOTELNAME'] }} - {{ $profdetail['PROF_HOTEL_ADDRESS'] }}
                              </h3></div>
                                  
                               <div class="navbar-header profile-nav">
              
                                   <a class="navbar-brand selected noleftmargin" id="navoverview" href="#link_overview">ACCOMMODATION</a>
                                        @if ($profdetail['PROF_PACKAGES_VALID']==true) <a class="navbar-brand" id="navgolfbreaks" href="#lnk_golfbreaks">GOLF BREAKS</a> @endif
                    			<a class="navbar-brand noleftmargin" id="navoverview" href="#lnk_location">LOCATION</a>
              
                             </div>
                              
                          </div>
                            
                        </nav>
    
                    </div>
                    
                </div>
                
				<div class="row top-buffer">
	
                    <div class="col-md-8">
                        
                        <h2>{{ $profdetail['PROF_HOTELNAME'] }}</h2>
                        <P>{{ $profdetail['PROF_HOTEL_ADDRESS'] }}</P>
                        
                       
            
                        <p><i>{{ $profdetail['PROF_HOTEL_DESC'] }}</i></p>
                        
                    </div>
                                   
                       
                       
                   <div class="col-md-4 text-center">                   
                           
                     
                         <h2>FACILITIES</h2>
                         <ul style="padding-left:0px;list-style:none;font-size:18px;">
                         	{{ $profdetail['PROF_FACILITIES'] }}
                         </ul>
                         
                      
      
                       
                       
                   </div>
                    
               </div>
               
               
     @if($profdetail['PROF_PACKAGES_VALID']==true)
                                        	 
                                             
               <div class="row">
              
               
               <div class="col-md-12 text-center">
               	   
                   
                   	
                   <img src="/images/icon_golfbreaks.png" />
                   <a name="lnk_golfbreaks"></a>
                   <h2>GOLF BREAKS AVAILABLE</h2>
    
                   
                  
               
               </div>
               
               
               </div>                                             
                                                              
               @foreach ($venuepackages as $profpackage)   
               
               
              {{--  COURSE LISTING START --}}
              
               <?php $i=1; ?>

               
				<div class="row top-buffer">

					
                    <div class="col-md-12">				
				
                	<div class="col-md-12"  style="background-color:#ececec; padding-top:35px;padding-bottom:35px;" >	

                    <div class="col-md-6">
                        
                        <h2>{{ $profpackage->PACKAGE_NAME}}</h2>
                        
                        
                         <a name="lnk_green_fees"></a>
            
                        <p>{{ $profpackage->PACKAGE_DESCRIPTION }}</p>
                        
                        
                    </div>
                        
                        
                    <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>PRICE FROM</p>
                         <h2>£ {{ $profpackage->PACKAGE_PRICE}} {{ $profpackage->PACKAGE_APPLIES }}</h2>
                       </div>   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>PACKAGE</p>
                         <h2>{{ $profpackage->PACKAGE_HOTEL_CATER}} </h2>
                       </div>  
                           
                      
                       
                       
                   </div>
                       
                       
                   <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>NO. NIGHTS</p>
                         <h2>{{ $profpackage->PACKAGE_NIGHTS}}</h2>
                       </div>   
                           
                       <div class="col-sm-2 col-md-4">
                            <a class="btn btn-default profile-headline-bx-btn" href="#">ENQUIRE </a>
                       </div>  
                           
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>NO. ROUNDS</p>
                         <h2>{{ $profpackage->PACKAGE_INC_ROUNDS}}</h2>
                       </div>  
                           
                           
    
                       
                       
                   </div>
                   
                   
                   

                   
                   
                   </div>
                   
              
                   
                   
                   
                   
                   
                   </div>
                    
               </div>
               
               
               
               
				           
               @endforeach    
   
               
       @endif  
       
			<div class="row">
               
                   <div class="col-md-12  top-buffer-lg text-center">
                     
                       <img src="/images/icon_map.png" />
            
                       <h4>{{ $profdetail['PROF_HOTELNAME'] }}<br>
                           {{ $profdetail['PROF_HOTEL_ADD2'] }}<br>
                           {{ $profdetail['PROF_HOTEL_COUNTY'] }}<br>
                           {{ $profdetail['PROF_HOTEL_CITY'] }}<br>
                           {{ $profdetail['PROF_HOTEL_POSTCODE'] }}<br>
                           {{ $profdetail['PROF_HOTEL_COUNTRY'] }}</h4>
                   
                   </div>

               </div>    
               
               
			  <div class="row">
               
                   <div class="col-md-12  top-buffer-lg ">
                   
                   <a name="lnk_location"></a>
                        
					<script>
                      function initialize() {
                          
                        
						
                        var club_lat = {{ $profdetail['PROF_LAT'] }};
                        var club_lon = {{ $profdetail['PROF_LON'] }};
                        
                        var map_canvas = document.getElementById('map-canvas');
                        var map_options = {
                          center: new google.maps.LatLng(club_lat,club_lon),
                          zoom: 8,
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        var map = new google.maps.Map(map_canvas, map_options)
                        
                        var latLng = new google.maps.LatLng(club_lat,club_lon);
                        var marker = new google.maps.Marker({
                          position: latLng,
                          map: map,
                           labelContent: "{{ $profdetail['PROF_HOTELNAME'] }}",
                           labelAnchor: new google.maps.Point(club_lat,club_lon),
                           labelClass: "labels", // the CSS class for the label
                           labelStyle: {opacity: 0.75},
                           labelInBackground: true	 
                        });	
                        
                         //TODO - ADD IN CLUB DETAILS TO POPUP
                         var iw = new google.maps.InfoWindow({
                           content: "<strong>{{ $profdetail['PROF_HOTELNAME'] }}</strong>"
                         });
                         google.maps.event.addListener(marker, "click", function (e) { iw.open(map, marker); });	
                        
                         iw.open(map,marker);
                      }
                      google.maps.event.addDomListener(window, 'load', initialize);
                      
                      </script>
                                            
                                            
                                            <div id="map-canvas" style="height:350px;width:100%"></div>
                                       
                                       </div>
                    
                                   </div>             
                    
                                   
                                   <div class="col-md-12  top-buffer-lg">
                                   <!-- SPACING DIV -->
                                   </div>
                                   
                                   
                                        

                    
               
    
                    
@stop
