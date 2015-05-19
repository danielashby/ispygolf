@extends('layouts.default')

@section('content')

<div  class="row profile-main-banner">
                        
      <div class="col-md-9 profile-main-banner-images">
      
      		  <div id="profile-slider">
              
              	<ul class="bjqs">
                	
                     @foreach ($profimages as $profimage)   
                 	    @if ($profimage!="") <li> <img class="img-responsive"  src="{{ $profimage }}" /> </li> @endif 
					 @endforeach
                     
                </ul>
              
              </div>
                                
              
                    
       </div>
                           
       <div class="col-md-3 profile-main-banner-info">
                    		
          @if ($profdetail['PROF_HASLOGO']==true)                 
		  <div class="col-md-12 largepad profile-logo"> <img src="/clublogos/{{$profdetail['PROF_LOGO_IMG']}}" /></div>
          @endif   
          @if ($profdetail['PROF_HASLOGO']==false)                 
		  <div class="col-md-12 largepad profile-logo-none"></div>
          @endif     
                             
          <div class="col-md-8 profile-main-banner-bx largepad"><h2>{{ $profdetail['PROF_DIAL_CODE'] }} {{ $profdetail['PROF_TELNO'] }}</h2></div> <div class="col-md-4"> <img  class="img-responsive" align="center" src="/images/icon_telno.png" /> </div>
                            
          <div class="col-md-8 profile-main-banner-bx largepad"><h2><a href="mailto:{{ $profdetail['PROF_EMAIL'] }}">EMAIL DIRECT</a></h2></div><div class="col-md-4"> <a href="mailto:{{ $profdetail['PROF_EMAIL'] }}"><img  class="img-responsive" src="/images/icon_address.png" /></a> </div>
                
          @if($profdetail['PROF_WEBSITE']  !="")       
          <div class="col-md-8 profile-main-banner-bx profile-main-banner-bx-last largepad"><h2><a target="new" href="http://{{ $profdetail['PROF_WEBSITE'] }}">VISIT WEBSITE</a></h2></div> <div class="col-md-4"> <a  target="new" href="http://{{ $profdetail['PROF_WEBSITE'] }}" ><img  class="img-responsive" src="/images/icon_web.png" /> </a></div>
          @endif

       </div>
                         
    </div>
                    
                <div class="row menu"  style="z-index:500;">
                  
                   <a name="link_overview"></a>

                    <div class="col-md-12"> 
                        
                        <nav class="navbar profile-navbar navbar-default">
                             
                          <div class="container-fluid">
                              
                              <div class="hidden-title-conatiner"><h3 class="hidden-title">{{ $profdetail['PROF_CLUBNAME'] }} - {{ $profdetail['PROF_CLUB_ADDRESS'] }}
                              </h3></div>
                                  
                               <div class="navbar-header profile-nav">
              
                                   <a class="navbar-brand selected noleftmargin" id="navoverview" href="#link_overview">OVERVIEW</a>
                                   <a class="navbar-brand" id="navdetails" href="#link_course_details">COURSE DETAILS</a>
                                   <a class="navbar-brand" id="navgreenfees" href="#lnk_green_fees">GREEN FEES</a>
                                   <a class="navbar-brand" id="navgolfdays" href="#lnk_golf_days">GOLF DAYS</a>
                                   <a class="navbar-brand" id="navmembership" href="#lnk_membership">MEMBERSHP</a>
                                   <a class="navbar-brand" id="navgolfbreaks" href="#lnk_golfbreaks">GOLF BREAKS</a>
                                   <a class="navbar-brand" id="navreviews" href="#lnk_reviews">REVIEWS</a>
                                   <a class="navbar-brand" id="navlocation" href="#lnk_location">LOCATION</a>
              
                             </div>
                              
                          </div>
                            
                        </nav>
    
                    </div>
                    
                </div>
                    
                    
                <div class="row top-buffer">
	
                    <div class="col-md-6">
                        
                        <h2>{{ $profdetail['PROF_CLUBNAME'] }}</h2>
                        <P>{{ $profdetail['PROF_CLUB_ADDRESS'] }}</P>
                        
                       
            
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
                           
                       @if ($profdetail['PROF_CARD_DESC'] !="")      
                      
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
                   
               
               @if($profdetail['PROF_HASPACKAGES']==true)
                   
               <div class="row  top-buffer-lg">                             	 
                 
               @foreach ($profpackages as $profpackage)   
					           
				<div class="col-md-4">
                    
                   	 <div class="row">
                     
                     	 <div class="col-md-12">
                        
                       	 <img  class="img-responsive"  src="{{ $profpackage['PACKAGE_IMG'] }}"/>
                         
                         <div class="profile_overlayimg" >
                         
                         	<img src="/images/special_offer_banner.png" />
                         
                         </div>
                         
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
               
               @endif
               
               
               @if ($profdetail['PROF_HASVIDEO'] == true) 
               
               <div class="row">
               
               <div class="col-md-12  top-buffer-lg text-center">
               	 
                   <img src="/images/icon_video.png" />
                   
                   <h2>WATCH THE VIDEO</h2>
                   
                   <h3><i>{{ $profdetail['PROF_CLUBNAME_UPPER'] }}</i></h3>
               
               </div>
               
               
               </div>
               
               
               <div class="row top-buffer-lg">
               
                   <div class="col-md-12">
                   
                       <div class="embed-responsive embed-responsive-16by9">
                       

             
                            @if ($profdetail['PROF_VIDEO_VZAAR'] !="")     
							
                            	<iframe allowFullScreen allowTransparency="true" class="vzaar-video-player" frameborder="0" src="http://view.vzaar.com/{{ $profdetail['PROF_VIDEO_VZAAR'] }}/player" title="vzaar video player" type="text/html"></iframe>
                       		
                            @endif
                       
                       		@if ($profdetail['PROF_VIDEO_YOUTUBE'] !="")
                            
                           		 <iframe src="https://www.youtube.com/embed/{{ $profdetail['PROF_VIDEO_YOUTUBE'] }}"></iframe>
                       		
                       		@endif 
                            
                       </div>
                   
                   </div>
    
               </div>
               
               @endif
               
               
               <div class="row top-buffer-lg">
               
                   <div class="col-md-6 text-center">
                   
                       <img src="/images/icon_trophy.png" alt=""/>
                       
                       <h3>OPEN COMPETITIONS AT  {{ $profdetail['PROF_CLUBNAME_UPPER'] }}</h3>
                       <h5> <i>FOR FURTHER INFORMATION CALL {{ $profdetail['PROF_DIAL_CODE'] }} {{$profdetail['PROF_OPEN_TEL']}}</i> </h5>
                       <h5> <i>OR CONTACT <a href="mailto:{{$profdetail['PROF_OPEN_EMAIL']}}">{{$profdetail['PROF_OPEN_EMAIL']}}</a></i></h5>        
                       
                       {{$profdetail['PROF_OPENS_HTML']}}
     
                   </div>
                   
                   <div class="col-md-6 text-center">
    
                       <img src="/images/icon_facilities.png" width="99" height="100" alt=""/>
                       
                       <h3> THE FOLLOWING FACILITIES ARE AVAILABLE AT {{ $profdetail['PROF_CLUBNAME_UPPER'] }}</h3>
                       <h5> <ul class="profile_fac_list">{{ $profdetail['PROF_SERVICES_HTML'] }}</ul></h5>
                   
                   </div>

               </div>
               
               
               
               
               <div class="row top-buffer-lg">
               
               		
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive"  src="{{ $profdetail['PROF_PACKAGE_IMAGE'] }}"  alt="" />

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golfbreaks"></a>
                             <h5>STAY & PLAY GOLF BREAKS</h5>
                           
                          @if ($profdetail['PROF_HASPACKAGES']==true) 
                           
                             <h2>AVAILABLE</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                                 FOR ALL THE LATEST GOLF 
                                 BREAKS AT {{ $profdetail['PROF_CLUBNAME_UPPER'] }}
                                 PLEASE CLICK BELOW.
                             </p>
                             
                          </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                             
                             @endif
                             
                             @if ($profdetail['PROF_HASPACKAGES']==false) 
                             
                             	<h2>NOT AVAILABLE</h2> 
                             
                             @endif
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               
               

					
               
               @if ($profdetail['PROF_HASGOLFDAYS']==true)
               <div class="row top-buffer-lg">
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive" style="width:100%;" src="{{$profdetail['PROF_GOLFDAY_IMAGE']}}"  alt=""/>

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golf_days"></a>
                             <h5>GOLF DAYS FROM</h5>
                           
                             <h2>{{$profdetail['PROF_GOLFDAY_PRICE_FROM']}}</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left"> 
                                {{ $profdetail['PROF_CLUBNAME_UPPER'] }} WELCOMES SOCIETY AND CORPORTE GOLF DAYS. FOR MORE INFORMATION AND A QUOTATION CLICK BELOW.
                             </p>
                             
                          </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               @endif
               
               <div class="row top-buffer-lg">
               
               		<div class="col-md-9">
                    
                    	<img class="img-responsive" src="/images/membership.png"  alt=""/>

                    </div>
                    
                   <div class="col-md-3 vertical-fill" style="background-color:#ececec;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_membership"></a>
                             <h5>MEMBERSHIPS ARE CURRENTLY</h5>
                           
                             <h2>{{ $profdetail['PROF_MEMBERSHIP_AVAILABLE'] }}</h2> 
                               <hr class="feature-hr">  

 						  <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                               @if ($profdetail['PROF_HASMEMBERS'] == true)
                               FOR MORE INFORMATION, ON MEMBERSHIP AT {{ $profdetail['PROF_CLUBNAME_UPPER'] }} PLEASE ENQUIRE BELOW.
                               @endif
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
                   
                   <h2></h2>
                   
                   <h5><i></i></h5>
               
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
                        
                        <h3>{{ $profdetail['PROF_COURSENAME'] }}</h3>
                        
                        <a name="link_course_details"></a>
                         <a name="lnk_green_fees"></a>
            
                        <p>{{ $profdetail['PROF_COURSEDESC'] }}</p>
                        
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
                           
                       @if ($profdetail['PROF_CARD_DESC'] !="")      
                      
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
                   
                   <h3>{{ $profdetail['PROF_COURSENAME'] }}</h3>
                   
                   <h4><i>{{ $profdetail['PROF_CLUBNAME_UPPER'] }}</i></h4>
                   
                    <a class="btn btn-default ">  READ  </a>
               
               </div>
               
               
               </div>
               
               <div class="row">
               
               <div class="col-md-12">
               
               <div class="col-md-12  top-buffer-lg text-center" style="background-image: url(/images/golf_monthly_back.png); background-size: 100%; padding-top:35px;padding-bottom:35px;">
               	 
                   <img src="/images/icon_golfmonthly.png" />
                <a name="lnk_reviews"></a>
                	
                    <h3> <i>TOP 100 COURSES UK&I </i> </h3>
                
                    <p><i>
                                
                    {{ $profdetail['PROF_COURSEREVIEW'] }}
                    
                    </i></p>
               
               </div>
               
               </div>
               
               
               </div>
               
               
               

				<div class="row">
               
                   <div class="col-md-12  top-buffer-lg text-center">
                     
                       <img src="/images/icon_map.png" />
            
                       <h4>{{ $profdetail['PROF_CLUBNAME'] }}<br>
                           {{ $profdetail['PROF_CLUB_ADD2'] }}<br>
                           {{ $profdetail['PROF_CLUB_COUNTY'] }}<br>
                           {{ $profdetail['PROF_CLUB_CITY'] }}<br>
                           {{ $profdetail['PROF_CLUB_POSTCODE'] }}<br>
                           {{ $profdetail['PROF_CLUB_COUNTRY'] }}</h4>
                   
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
