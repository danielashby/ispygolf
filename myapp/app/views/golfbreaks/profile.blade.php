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
    
                   
                   
                   <div class="row menu"  style="z-index:500;margin-left:15px;margin-right:15px;">
                  
                    <nav class="navbar profile-navbar navbar-default">
                            <div style="background-color:#222;">
                            
                                <div class="container">
                            
                                   <div class="hidden-title-conatiner">
                                     
                                    <a class="hidden-logo" href="/">
                                       <img alt="Brand" id="logo" style="height:30px;" src="/images/logo.png">
                                    </a>
                                    
                                    <h3 class="hidden-title text_white">{{ $profdetail['PROF_HOTELNAME'] }} <span class="profile-title-lower">{{$profdetail['PROF_HOTEL_CITY']}}, {{$profdetail['PROF_HOTEL_COUNTRY']}}</span></h3>
                                
                                    </div>            
                    
                                </div>
                                
                        </div>
                    
                        <div class="row" style="background-color:#99999F;">
                        
                          		<div class="container">
                            
                            	<div class="row">
                                
                            	<div class="col-md-12">
                    
                               <div class="navbar-header profile-nav" style="width:100%;">
              
                                   <a class="navbar-brand selected noleftmargin" id="navoverview" href="#link_overview">ACCOMMODATION</a>
                                        @if ($profdetail['PROF_PACKAGES_VALID']==true) <a class="navbar-brand" id="navgolfbreaks" href="#lnk_golfbreaks">GOLF BREAKS</a> @endif
                    				<a class="navbar-brand noleftmargin" id="navoverview" href="#lnk_location">LOCATION</a>
                                   
                                   <div class="hidden-title-conatiner" style="float:right;margin-right:28px;">
                                   <a class="btn btn-default profile-headline-bx-btn" style="margin-top:8px;" href="/enquiries?type=c&id={{ $profdetail['PROF_HOTELID'] }}">ENQUIRE </a>
                                   </div>
              
                                </div>   
                                
                                </div>
                                
                                </div>
                                
                                </div>
                                
                             
                           
                        
                        </div>
                        
                    </nav>
                               
                </div>
                   
                   
                   
                   
                 
          <!--       
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
                
                
             -->   
                
                
                
                
                
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
                   <h3>Latest Golf Breaks available <strong>direct</strong> from {{ $profdetail['PROF_HOTELNAME'] }}</h3>
    
                   
                  
               
               </div>
               
               
               </div>                                             
                                                              
               @foreach ($venuepackages as $profpackage)   
               
               
              {{--  COURSE LISTING START --}}
              
               <?php $i=1; ?>

               
				<div class="row top-buffer">

					
                    <div class="col-md-12">				
				
                	<div class="col-md-12"  style="background-color:#ececec; padding-top:35px;padding-bottom:35px;" >	

                    <div class="col-md-6">
                        
                        <div class="row">
                        
                        	<div class="col-md-9">
                            
                                <h2>{{ $profpackage->PACKAGE_NAME}}</h2>

                            </div>
                            
                            <div class="col-md-3" style="text-align:right;">
                            	<a class="btn btn-default" style="margin-top:20px;" href="#">ENQUIRE </a>
                            </div>
                        
                        </div>
                        
                        <div class="row">               
                          
                          	<div class="col-md-12">
                            
                            <hr style="border-color:#666;">
                            
                            <h3><span class="text_grey">Price </span>{{ $profpackage->PACKAGE_PRICE}} {{ $profpackage->PACKAGE_APPLIES }}</h3>
                            <h3><span class="text_grey">Nights </span>{{ $profpackage->PACKAGE_NIGHTS}} <span class="text_grey">Rounds</span> {{ $profpackage->PACKAGE_INC_ROUNDS}}</h3>
                            <h3>{{ $profpackage->PACKAGE_HOTEL_CATER}} </h3>
                            
                            <hr style="border-color:#666;">

                            <p>{{ $profpackage->PACKAGE_DESCRIPTION }}</p>
                            
                            <hr style="border-color:#666;">
                            
                            <h3><strong>AVAILABLE DATES</strong></h3>
                            <h3>From {{ $profpackage->PACKAGE_VALID_FR}} </h3> 
                            <h3>Until {{ $profpackage->PACKAGE_VALID_FR}} </h3>

							<hr style="border-color:#666;">
                            
                            <h3><strong>TERMS & CONDITIONS</strong></h3>
							<h3>TERMS (TBC)</h3>

                            </div>
                          
                          </div>
 
                    </div>
                        
     
                   <div class="col-md-6">                   

                       <h2 style="margin-bottom:30px;"><span class="text_grey" >Golf Courses Included</span></h2>
    
                       @foreach ($profpackage->COURSES as $course)   
                       
                       <a href="/golf-courses/{{$course['CLUB_URL']}}">
                       <img  class="img-responsive"  src="/clubimages/{{$course['COURSE_IMAGE']}}">
                       <h3 style="margin-top:10px;margin-bottom:30px;">{{$course['CLUB_NAME']}}<br>
                       	   <span class="text_grey">{{$course['COURSE_NAME']}}</span></h3>
                       </a>
                       
                       @endforeach
                           
                       
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
