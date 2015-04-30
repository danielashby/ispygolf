@extends('layouts.default')

@section('content')

<div  class="row profile-main-banner">
                        
      <div class="col-md-9 profile-main-banner-images">
      
      		  <div id="profile-slider">
              
              	<ul class="bjqs">
                	
                     @foreach ($profimages as $profimage)   
                 	    @if ($profimage!="") <li> <img class="img-responsive"  src="/clubimages/{{ $profimage }}" /> </li> @endif 
					 @endforeach
                     
                </ul>
              
              </div>
                                
              
                    
       </div>
                           
       <div class="col-md-3 profile-main-banner-info">
                    		
		  <div class="col-md-12 largepad profile-logo"> <img src="/images/testlogo.jpg" /></div>
                                
          <div class="col-md-8 profile-main-banner-bx largepad"><h2>{{ $profdetail['PROF_TELNO'] }}</h2></div> <div class="col-md-4"> <img  class="img-responsive" align="center" src="/images/icon_telno.png" /> </div>
                            
          <div class="col-md-8 profile-main-banner-bx largepad"><h2><a href="mailto:{{ $profdetail['PROF_EMAIL'] }}">EMAIL DIRECT</a></h2></div><div class="col-md-4"> <a href="mailto:{{ $profdetail['PROF_EMAIL'] }}"><img  class="img-responsive" src="/images/icon_address.png" /></a> </div>
                            
          <div class="col-md-8 profile-main-banner-bx profile-main-banner-bx-last largepad"><h2><a target="new" href="{{ $profdetail['PROF_WEBSITE'] }}">VISIT WEBSITE</a></h2></div> <div class="col-md-4"> <a  target="new" href="{{ $profdetail['PROF_WEBSITE'] }}" ><img  class="img-responsive" src="/images/icon_web.png" /> </a></div>

       </div>
                         
    </div>
                    
                    
                <div class="row menu"  style="z-index:500;">
                  
                   <a name="link_overview"></a>

                    <div class="col-md-12"> 
                        
                        <nav class="navbar profile-navbar navbar-default">
                             
                          <div class="container-fluid">
                              
                              <div class="hidden-title-conatiner"><h3 class="hidden-title">{{ $profdetail['PROF_CLUBNAME'] }}</h3></div>
                                  
                               <div class="navbar-header">
              
                                   <a class="navbar-brand selected noleftmargin" href="#link_overview">OVERVIEW</a>
                                   <a class="navbar-brand" href="#link_course_details">COURSE DETAILS</a>
                                   <a class="navbar-brand" href="#lnk_green_fees">GREEN FEES</a>
                                   <a class="navbar-brand" href="#lnk_golf_days">GOLF DAYS</a>
                                   <a class="navbar-brand" href="#lnk_membership">MEMBERSHP</a>
                                   <a class="navbar-brand" href="#lnk_golfbreaks">GOLF BREAKS</a>
                                   <a class="navbar-brand" href="#lnk_reviews">REVIEWS</a>
                                   <a class="navbar-brand" href="#lnk_location">LOCATION</a>
              
                             </div>
                              
                          </div>
                            
                        </nav>
    
                    </div>
                    
                </div>
                    
                    
                <div class="row top-buffer">
	
                    <div class="col-md-6">
                        
                        <h3>{{ $profdetail['PROF_CLUBNAME'] }}</h3>
                        
                       
            
                        <p><i>{{ $profdetail['PROF_CLUBDESC'] }}</i></p>
                        
                    </div>
                        
                        
                    <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>LOW SEASON GREEN FROM</p>
                         <h2>{{ $profdetail['PROF_COURSE_GF_LOW_WEEK']}}</h2>
                       </div>   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>HIGH SEASON GREEN FROM</p>
                         <h2>{{ $profdetail['PROF_COURSE_GF_HIGH_WEEK']}}</h2>
                       </div>  
                           
                       @if ($profdetail['CARD_DESC'] !="")      
                      
                      {{-- ISPY EXTRA OFFERS --}}
                      
                      <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                        <p>AVAILABLE</p>
                        <h2>ISPY EXTRA</h2>                      
                       </div>  
                       
                       @endif
                       
                       {{-- ISPY EXTRA OFFERS END --}}
                       
                       
                   </div>
                       
                       
                   <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>BEST RATES</p>
                         <h2>GOLF DAYS</h2>
                       </div>   
                           
                       <div class="col-sm-2 col-md-4">
                            <a class="btn btn-default profile-headline-bx-btn" href="#">ENQUIRE </a>
                       </div>  
                           
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>BOOK ONLINE</p>
                         <h2>TEE TIMES</h2>
                       </div>  
                           
                           
                       <div class="col-sm-2 col-md-4">
                            <a class="btn btn-default profile-headline-bx-btn" href="#"> BOOK  </a>
                       </div>  
    
                       
                       
                   </div>
                    
               </div>
                   
                   
               <div class="row  top-buffer-lg">
                   
               	 
                 
               @foreach ($profpackages as $profpackage)   
					 
                 
				<div class="col-md-4">
                    
                   	 <div class="row">
                     
                     	 <div class="col-md-12">
                        
                       	 <img  class="img-responsive"  src="/hotelimages/{{ $profpackage['PACKAGE_IMG'] }}"/>
                         
                         </div>
                        
                     </div>
                     
                     <div class="row">
                        
                     <div class="col-md-12">
                        
                        <div class="col-md-12" style="background-color:#ececec;">
                       	 
                             <div class="col-md-12">
                                
                               <p>{{ $profpackage['PACKAGE_DESCRIPTION'] }}</p>
                                
                             </div>
                                
                                
                             <div class="col-md-12 text-right">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>

                     	  </div>
                     
                     </div>
                     
                     </div>
                        
                    
                 </div>
                 

                 @endforeach
                                                      
                    
                     
                    
                                	 
                   	
                   
                   
               </div>
               
               
               <div class="row">
               
               <div class="col-md-12  top-buffer-lg text-center">
               	 
                   <img src="/images/icon_video.png" />
                   
                   <h2>WATCH THE VIDEO</h2>
                   
                   <h3><i>GLENEAGLES</i></h3>
               
               </div>
               
               
               </div>
               
               
               <div class="row top-buffer-lg">
               
                   <div class="col-md-12">
                   
                       <div class="embed-responsive embed-responsive-16by9">
                       
                            <iframe src="https://www.youtube.com/embed/V_f4pqtQOFQ"></iframe>
                       
                       </div>
                   
                   </div>
    
               </div>
               
               
               <div class="row top-buffer-lg">
               
                   <div class="col-md-6 text-center">
                   
                       <img src="/images/icon_trophy.png" alt=""/>
                       
                       <h3>2015 OPEN COMPETETIONS AT GLENEAGLES</h3>
                       <h5> <i>FOR FURTHER INFORMATION CALL 0845 303 8367</i> </h5>
                       
                       <h3><strong>MENS OPEN</strong> - 25/07/2015</h3>
                       <h3><strong>WOMENS OPEN</strong> - 26/07/2015</h3>
                       <h3><strong>JNIORS OPEN</strong> - 28/07/2015</h3>
     
                   </div>
                   
                   <div class="col-md-6 text-center">
    
                       <img src="/images/icon_facilities.png" width="99" height="100" alt=""/>
                       
                       <h3> THE FOLLOWING FACILITIES ARE AVAILABLE AT </h3>
                       <h5> <i>GLENEAGLES GOLF & COUNTRY CLUB</i> </h5>
                   
                   </div>

               </div>
               
               <div class="row top-buffer-lg">
               
               		
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive"  src="/images/golf_breaks.png"  alt="" />

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golfbreaks"></a>
                             <h5>STAY & PLAY GOLF BREAKS</h5>
                           
                             <h2>AVAILABLE</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                                 FOR ALL THE LATEST GOLF 
                                 BREAKS AT GLENEAGLES GOLF 
                                 & COUNTRY CLUB PLEASE 
                                 CLICK BELOW.
                             </p>
                             
                          </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               <div class="row top-buffer-lg">
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive" src="/images/golf_days.png"  alt=""/>

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golf_days"></a>
                             <h5>GOLF DAYS FROM</h5>
                           
                             <h2>£110.00</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                                GLENEAGLES GOLF & COUNTRY 
                                CLUB WELCOMES SOCIETY AND 
                                CORPORTE GOLF DAYS. FOR 
                                MORE INFORMATION AND A 
                                QUOTATION CLICK BELOW.
                             </p>
                             
                          </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               <div class="row top-buffer-lg">
               
               		<div class="col-md-9">
                    
                    	<img class="img-responsive" src="/images/membership.png"  alt=""/>

                    </div>
                    
                   <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_membership"></a>
                             <h5>MEMBERSHIPS ARE CURRENTLY</h5>
                           
                             <h2>AVAILABLE</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                               FOR MORE INFORMATION, ON
                                MEMBERSHIP AT GLENEAGLES 
                                GOLF & COUNTRY CLUB PLEASE
                                ENQUIRE BELOW.
                             </p>
                          </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               <div class="row">
               
               <div class="col-md-12  top-buffer-lg text-center">
               	 
                   <img src="/images/icon_course.png" />
                   
                   <h2>THE KINGS COURSE</h2>
                   
                   <h5><i>GLENEAGLES</i></h5>
               
               </div>
               
               
               </div>
               
               
<div class="row top-buffer-lg">
               
               		<div class="col-md-9">
                    
                    	<img src="/images/course_image.png"  alt=""/>

                    </div>
                    
                    <div class="col-md-3">
                    
                         <div class="col-md-12 vertical-fill" style="background-color:#cdde54;">
                             
                             <h3> VISITORS WELCOME </h3>
                             
                             <p>
                                 <strong>NO. HOLES </strong>18 <br>
                                 <strong>YEAR OPEN </strong>1919<br>
                                 <strong>DESIGNER</strong> JAMES BRAID<br>
                                 STYLE MOORLAND<br>
                                
                                 <strong>LENGTH (MAX)</strong> 6,767<br>
                                 <strong>PAR</strong> 72<br>
                                 <strong>SSS</strong> 74<br>
                                 <strong>ISPY DIFFICULTY RATING</strong><br>
                                 <strong>DRESS CODE</strong><br>
                             </p>
                             
                         </div>                 
                    </div>
               
               </div>
               
               
				<div class="row ">

					
                    <div class="col-md-12">				
				
                	<div class="col-md-12"  style="background-color:#ececec; padding-top:35px;padding-bottom:35px;" >	

                    <div class="col-md-6">
                        
                        <h3>THE KING'S COURSE</h3>
                        
                        <a name="link_course_details"></a>
                         <a name="lnk_green_fees"></a>
            
                        <p>The King's Course, opened in 1919, is a masterpiece of design, which 
                            has tested the aristocracy of golf, both professional and amateur.
                            James Braid's plan for the King's Course was to test even the best 
                            players' shot-making skills over the eighteen holes. Selecting the 
                            right club for each approach shot is the secret on the King's. It is 
                            certainly one of the most beautiful and exhilarating places to play 
                            golf in the world, with the springy moorland turf underfoot, the 
                            sweeping views from the tees all around, the rock-faced mountains 
                            to the north, the green hills to the south, and the peaks of the 
                            Trossachs and Ben Vorlich on the western horizon.</p>
                        
                    </div>
                        
                        
                    <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>LOW SEASON GREEN FROM</p>
                         <h2>£110.00</h2>
                       </div>   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>HIGH SEASON GREEN FROM</p>
                         <h2>£140.00</h2>
                       </div>  
                           
                      <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                        <p>AVAILABLE</p>
                        <h2>ISPY EXTRA</h2>                      
                       </div>  
                       
                       
                   </div>
                       
                       
                   <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>BEST RATES</p>
                         <h2>GOLF DAYS</h2>
                       </div>   
                           
                       <div class="col-sm-2 col-md-4">
                            <a class="btn btn-default profile-headline-bx-btn" href="#">ENQUIRE </a>
                       </div>  
                           
                           
                       <div class="profile-headline-bx  largepad col-sm-2 col-md-8">
                         <p>BOOK ONLINE</p>
                         <h2>TEE TIMES</h2>
                       </div>  
                           
                           
                       <div class="col-sm-2 col-md-4">
                            <a class="btn btn-default profile-headline-bx-btn" href="#">BOOK </a>
                       </div>  
    
                       
                       
                   </div>
                   
                   
                   </div>
                   
                   </div>
                    
               </div>
               
               
               <div class="row">
               
               <div class="col-md-12  top-buffer-lg text-center">
               	 
                   <img src="/images/icon_course.png" />
                   
                   <h2>OUR REVIEW</h2>
                   
                   <h3>THE KINGS COURSE</h3>
                   
                   <h4><i>GLEANEAGLES</i></h4>
                   
                    <a class="btn btn-default ">  READ  </a>
               
               </div>
               
               
               </div>
               
               <div class="row">
               
               <div class="col-md-12">
               
               <div class="col-md-12  top-buffer-lg text-center" style="background-image: url(/images/golf_monthly_back.png); background-size: 100%; padding-top:35px;padding-bottom:35px;">
               	 
                   <img src="/images/icon_golfmonthly.png" />
                <a name="lnk_reviews"></a>
                   <h3>TOP 100 COURSES UK&amp;I</h3>
                   
                    <h3><i>NO 36</i></h3>
                    
                    <p><i>"A MASTERPIECE OF MAVERICK ROUTING BY JAMES BRAID OVER SUBLIME SCOTTISH MOORLAND"; 
"STILL A GOOD PLACE TO PLAY GOLF SET IN FABULOUS SCENERY"; 
"SCOTLAND'S ICONIC INLAND MASTERPIECE"; "A GOLF COURSE FIT FOR A KING."</i></p>
               
               </div>
               
               </div>
               
               
               </div>
               

				<div class="row">
               
                   <div class="col-md-12  top-buffer-lg text-center">
                     
                       <img src="/images/icon_map.png" />
                       
                       <h4>GLENEAGLES<br>
                            GOLF CLUB LANE<br>
                            AUCHTERADER<br>
                            PERTHSHIRE<br>
                            SCOTLAND<br>
                            PY2 3HT</h4>
                   
                   </div>

               </div>    
               
               
			  <div class="row">
               
                   <div class="col-md-12  top-buffer-lg ">
                   
                   <a name="lnk_location"></a>
                        
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
  function initialize() {
	  
	  
	var map_canvas = document.getElementById('map-canvas');
	var map_options = {
	  center: new google.maps.LatLng('{{ $profdetail['PROF_LAT'] }}','{{ $profdetail['PROF_LON'] }}'),
	  zoom: 8,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(map_canvas, map_options)
	
	
    var latLng = new google.maps.LatLng('{{ $profdetail['PROF_LAT'] }}','{{ $profdetail['PROF_LON'] }}');
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
       labelContent: "{{ $profdetail['PROF_CLUBNAME'] }}",
       labelAnchor: new google.maps.Point(22, 0),
       labelClass: "labels", // the CSS class for the label
       labelStyle: {opacity: 0.75},
	   labelInBackground: true	 
    });	
	
	 //TODO - ADD IN CLUB DETAILS TO POPUP
     var iw = new google.maps.InfoWindow({
       content: "<strong>{{ $profdetail['PROF_CLUBNAME'] }}</strong>"
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
