@extends('layouts.default')

@section('content')

<div  class="row profile-main-banner">
                        
      <div class="col-md-9 profile-main-banner-images">
      
      		  <div id="profile-slider">
              
              	<ul class="bjqs">
                	
                     {{-- Only show if has images. i.e if not just /clubimages/ --}}
                     
                     @foreach ($profimages as $profimage)   
                 	    
                        @if ($profimage!="/clubimages/") <li> <img class="img-responsive"  src="{{ $profimage }}" /> </li> @endif 
					 
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

                    <div class="col-md-12 profilemenu"> 
                        
                        <nav class="navbar profile-navbar navbar-default">
                             
                          <div class="container">
                              
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
                            <a class="btn btn-default profile-headline-bx-btn" href="/enquiries?type=c&id={{ $profdetail['PROF_CLUBID'] }}">{{ $profdetail['PROF_CLUBID']}}ENQUIRE </a>
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
               
               
               
               
               <div class="row top-buffer-lg no-overflow">
               
               		
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive"  src="{{ $profdetail['PROF_PACKAGE_IMAGE'] }}"  alt="" />
                        
                         <div class="profile_overlayimg img-responsive" >
                         
                         	<img src="/images/golf_breaks_banner.png" />
                         
                         </div>

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;margin-left:-15px;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golfbreaks"></a>
                             <h5>STAY & PLAY GOLF BREAKS</h5>
                           
                          @if ($profdetail['PROF_HASPACKAGES']==true) 
                           
                             <h2>AVAILABLE</h2> 
                                

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
               
               
               

					
               
               
               <div class="row top-buffer-lg  no-overflow">
               
               		<div class="col-md-9">
                    
                    	<img  class="img-responsive" src="{{$profdetail['PROF_GOLFDAY_IMAGE']}}"  alt=""/>
                        
                         <div class="profile_overlayimg img-responsive" >
                         
                         	<img src="/images/golf_days_banner.png" />
                         
                         </div>

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#ececec;margin-left:-15px;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_golf_days"></a>
                             <h5>GOLF DAYS</h5>
                             
                             
                           @if ($profdetail['PROF_HASGOLFDAYS']==true)
                           
                             <h2>{{$profdetail['PROF_GOLFDAY_PRICE_FROM']}}</h2> 
     

                              <div class="col-md-12 col-sm-2 ">
                                 <p class="text-left"> 
                                    {{ $profdetail['PROF_CLUBNAME_UPPER'] }} WELCOMES SOCIETY AND CORPORTE GOLF DAYS. FOR MORE INFORMATION AND A QUOTATION CLICK BELOW.
                                 </p>
                                 
                              </div>
                          
                         
                         
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                             
                             @endif
                             
                              @if ($profdetail['PROF_HASGOLFDAYS']==false)
                              
                              	<h2>NOT AVAILABLE</h2> 
                              
                              @endif
                             
                    
                    	</div>
                    	
                    
                    </div>
               
               </div>
               
               
               <div class="row top-buffer-lg  no-overflow">
               
               		<div class="col-md-9">
                    
                    	<img class="img-responsive"  src="{{$profdetail['PROF_MEMBERSHIP_IMAGE']}}"  alt=""/>
                        
                        <div class="profile_overlayimg img-responsive" >
                         
                         	<img src="/images/membership_banner.png" />
                         
                         </div>

                    </div>
                    
                   <div class="col-md-3 vertical-fill" style="background-color:#ececec;margin-left:-15px;">
                    
                    	 <div class="col-md-12 col-sm-2  largepad text-center" >
                         <a name="lnk_membership"></a>
                             <h5>MEMBERSHIPS ARE CURRENTLY</h5>
                           
                             <h2>{{ $profdetail['PROF_MEMBERSHIP_AVAILABLE'] }}</h2> 
                              
						@if ($profdetail['PROF_HASMEMBERS'] == true)
 						  
                          <div class="col-md-12 col-sm-2 ">
                             <p class="text-left">
                               
                               FOR MORE INFORMATION, ON MEMBERSHIP AT {{ $profdetail['PROF_CLUBNAME_UPPER'] }} PLEASE ENQUIRE BELOW.
                               
                             </p>
                          </div>
                             <div class="col-md-12 text-right" style="margin-bottom">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>
                    	
                        @endif
                    	</div>
                    	
                    
                    </div>
               
               </div>
             
             {{--  COURSE LISTING START --}}
               
               
             @foreach ($courses as $course)                
               <div class="row">
              
               
               <div class="col-md-12  top-buffer-lg text-center">
               	   
                   
                   	
                   <img src="/images/icon_course.png" />
                   <a name="link_course_details"></a>
                   <h2>{{ $course->COURSE_NAME}}</h2>
                   
                    
                   
                   <h5><i>{{ $profdetail['PROF_CLUBNAME_UPPER'] }}</i></h5>
                   
                  
               
               </div>
               
               
               </div>

 
               
<div class="row top-buffer-lg  no-overflow">
               
               		<div class="col-md-9">
                    
                    	<img src="/clubimages/{{ $course->IMG_IMAGE1 }}"  alt=""/>

                    </div>
                    
                    <div class="col-md-3 vertical-fill" style="background-color:#cdde54;margin-left:-15px;">
                    
                         <div class="col-md-12 " >
                             
                             <h3> VISITORS WELCOME </h3>
                             
                             <p>
                                 <b>NO. HOLES </b>{{ $course->COURSE_NO_HOLES }}<br>
                                 <strong>YEAR OPEN </strong> {{ $course->COURSE_YEAR }}<br>
                                 <strong>DESIGNER</strong> {{ $course->COURSE_DESIGNER}}<br>
                                 <strong>STYLE</strong> {{ $course->COURSE_STYLE }}<br>
                                
                                 <strong>LENGTH (MAX)</strong> {{ $course->COURSE_YARDAGE_CHAMP }}<br>
                                 <strong>PAR</strong>  {{ $course->COURSE_PAR_MEN }}<br>
                                 <strong>SSS</strong> {{ $course->COURSE_SSS_MEN }}<br>
                                 <strong>ISPY DIFFICULTY RATING</strong><span class="prof-difficulty prof-difficulty{{$course->COURSE_IDR_CHAMP}}"></span><br>
                            
                             </p>
                             
                         </div>                 
                    </div>
               
               </div>
               
               
				<div class="row ">

					
                    <div class="col-md-12">				
				
                	<div class="col-md-12"  style="background-color:#ececec; padding-top:35px;padding-bottom:35px;" >	

                    <div class="col-md-6">
                        
                        <h3>{{ $course->COURSE_NAME}}</h3>
                        
                        
                         <a name="lnk_green_fees"></a>
            
                        <p>{{ $course->COURSE_DESC}}</p>
                        
                        <h3>Dress Code</h3>
                        <p>{{ $course->CLUB_COURSE_DRESS_DETAIL }}</p>
                        
                    </div>
                        
                        
                    <div class="col-md-3">                   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>LOW SEASON GREEN FROM</p>
                         <h2>{{ $profdetail['PROF_MONEY_SYMBOL']}}{{ $course->COURSE_LOW_WEEK}}</h2>
                       </div>   
                           
                       <div class="profile-headline-bx largepad col-sm-2 col-md-12">
                         <p>HIGH SEASON GREEN FROM</p>
                         <h2>{{ $profdetail['PROF_MONEY_SYMBOL']}}{{ $course->COURSE_HIGH_WEEK}}</h2>
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
                   
                   <h3>{{ $course->COURSE_NAME }}</h3>
                   
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
                                
                    {{ $course->COURSE_REVIEW }}
                    
                    </i></p>
               
               </div>
               
               </div>
               
               
               </div>
               
                @endforeach
               
               {{--  COURSE LISTING END --}}
               
               

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
                        
<script>
  function initialize() {
	  
	
	var club_lat = {{ $profdetail['PROF_LON'] }};
	var club_lon = {{ $profdetail['PROF_LAT'] }};
	
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
       labelContent: "{{ $profdetail['PROF_CLUBNAME'] }}",
       labelAnchor: new google.maps.Point(club_lat,club_lon),
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
