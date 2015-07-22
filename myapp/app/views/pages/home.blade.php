@extends('layouts.default')

@section('herobanner')
			
   
            <div class="container full-width">
           
            <img id="backgroundimg" src="" class="bg">
           
            <div style="position:absolute;top:150px;width:100%;">
                        
            		<div class="row" >
           
					<div class="col-md-2"></div>
                    	
                    <div class="col-md-8">

                        <div id="main-search" class="row">
                            
                            <div class="col-md-12">
     
                                <h1 class="shadow-big text_white" >THE WEB'S MOST VISUAL GOLF GUIDE</h1>
                                <h2 class="shadow-big text_white" >FIND THE BEST COURSES, MEMBERSHIPS, GOLF BREAKS AND SPECIAL OFFERS.</h2>
                                             
                             </div>
                             
                        </div>
                        
                        <div id="main-search" class="row">
                        
                            <div class="col-md-12">
                            
                            
                                 <div id="main-search" style="margin-top:22px;">
                                       
                                        <form action="/golf-courses" method="post">
                                        <div class="col-md-9">
                                            <input type="text" value="" id="mainsearch_input" class="homesearch_input" autocorrect="off" name="search_val" placeholder="Where do you want to play?" />    
                                            <input type="hidden" value="" name="name" id="name" >            
                                            <input type="hidden" value="" name="country" id="country" >                       
                                            <input type="hidden" value="" name="region" id="region" >
                                            <input type="hidden" value="" name="town" id="town" >
                                            <input type="hidden" value="" name="postcode" id="postcode" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="submit" class="text_white homesearch_submit" value="Search"/>
                                        </div>
                                        </form>
                                     
                                </div>
                            
                            
                            </div>
                        
                        </div>
                    
                    
                    </div>
            
            		<div class="col-md-2"></div>
            
            		</div>
                    
                
                </div>

                <!-- pop box 
                <div id="main-pop-box" >

                    <a id="pop-url" href="">
                    
                    <img id="pop-img" src="" />
                    
                    </a>
                
                </div>
                pop box end -->
                
               
                

            </div> 
            
          
@stop

@section('content')    
            
			<div class="row">
                
                <div class="col-md-6" style="padding:5px;padding-top:10px;">
                
                	<a href="/golf-courses">
                
                        <img src="/images/home-courses.png"  style="width:100%;">
                    
                        <img class="absolute-center home-block-icon" src="/images/home-icon-courses.png" >
                        
                        <div id="hover">
    
                            <div class="link-text">
                                <h2>Golf Courses</h2>
                                <h3 class="desc">Visually Stunning</h3>
                            </div>
    
                        </div>
                    
                    </a>
		
                </div>
                
                
                <div class="col-md-6"  style="padding:5px;padding-top:10px;">
                
                	<a href="/golf-courses">
                
                        <img src="/images/home-golf-breaks.png"  style="width:100%;">
    
                        <img class="absolute-center home-block-icon" src="/images/home-icon-golf-breaks.png" >
    
                        <div id="hover">
        
                            <div class="link-text">
                                <h2>Golf Breaks</h2>
                                <h3 class="desc">Amazing Venues</h3>
                            </div>
    
                        </div>
                    
                    </a>

					

                </div>
                
               
            </div>
            
            
			<div class="row">
                
                <div class="col-md-6"  style="padding:5px;">
                
                	<a href="/golf-course-maps/united-kingdom">
                
                        <img src="/images/home-map.png"  style="width:100%;">
                    
                        <img class="absolute-center home-block-icon" src="/images/home-icon-map.png" >
                        
                       <div id="hover">
    
                            <div class="link-text">
                                <h2>Locate Golf Courses</h2>
                                <h3 class="desc">From round the World</h3>
                            </div>
    
                        </div>
                    
                    </a>

                </div>
                
                
                <div class="col-md-6"  style="padding:5px;">
                
                		<a href="#">
                
                        <img src="/images/home-reviews.png"  style="width:100%;">
    
                        <img class="absolute-center home-block-icon" src="/images/home-icon-reviews.png" >
                    
                       <div id="hover">
    
                            <div class="link-text">
                                <h2>Course Reviews</h2>
                                <h3 class="desc"></h3>
                            </div>
    
                        </div>
                    
                    </a>                    

                </div>
                
               
            </div>
            
            
            <div class="row">
            
                <div class="col-md-4" style="padding:5px;">
                	                
                    <a href="/golf-courses/troon-golf-courses">                
                                    
                	<img src="/images/home-troon.png"  style="width:100%;">
                
                	<img class="absolute-center home-block-troon"src="/images/home-icon-troon.png" >
                    
                       <div id="hover">
    
                            <div class="link-text">
                                <h2>TROON GOLF</h2>
                                <h3 class="desc"></h3>
                            </div>
    
                        </div>
                    
                    </a>               
                
                </div>
                
                <div class="col-md-4" style="padding:5px;">
                	                
                                    
                   <a href="/golf-courses/atlantic-golf-courses">    
  
                	<img src="/images/home-atlantic.png"  style="width:100%;">
                
                	<img class="absolute-center home-block-atlantic"  src="/images/home-icon-atlantic.png" >
                    
                       <div id="hover">
    
                            <div class="link-text">
                                <h2>ATLANTIC GOLF</h2>
                                <h3 class="desc"></h3>
                            </div>
    
                        </div>
                    
                    </a>               
                                    
                
                </div>
                
                 <div class="col-md-4" style="padding:5px;">
                 
                 <a href="/golf-courses/marriott-golf-courses">    
                	                
                	<img src="/images/home-marriott.png"  style="width:100%;">
                
                	<img class="absolute-center home-block-marriott" src="/images/home-icon-marriott.png" >
                    
                       <div id="hover">
    
                            <div class="link-text">
                                <h2>MARRIOTT GOLF</h2>
                                <h3 class="desc"></h3>
                            </div>
    
                        </div>
                    
                    </a>               
                                    
                
                </div>
            
            </div>


			<div class="row">
            
            
            <div class="col-md-12" style="padding:5px;"/>
            
            <img src="/images/home-bottom-banner.png" style="width:100%;">
            
            </div>
            
            </div>

	

@stop
