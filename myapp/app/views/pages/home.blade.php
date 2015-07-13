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

                                <!-- pop box -->
                <div id="main-pop-box" >

                    <a id="pop-url" href="">
                    
                    <img id="pop-img" src="" />
                    
                    </a>
                
                </div>
                <!-- pop box end -->
                
               
                

            </div> 
            
          
@stop

@section('content')    
            
			<div class="row">
                
                <div class="col-md-6" style="padding:5px;padding-top:10px;">
                
                	<img src="/images/home-courses.png"  style="width:100%;">
                
                	<img class="absolute-center" src="/images/home-icon-courses.png" >

                </div>
                
                
                <div class="col-md-6"  style="padding:5px;padding-top:10px;">
                
					<img src="/images/home-golf-breaks.png"  style="width:100%;">

					<img class="absolute-center" src="/images/home-icon-golf-breaks.png" >

                </div>
                
               
            </div>
            
            
			<div class="row">
                
                <div class="col-md-6"  style="padding:5px;">
                
                	<img src="/images/home-map.png"  style="width:100%;">
                
                	<img class="absolute-center" src="/images/home-icon-map.png" >

                </div>
                
                
                <div class="col-md-6"  style="padding:5px;">
                
					<img src="/images/home-reviews.png"  style="width:100%;">

					<img class="absolute-center" src="/images/home-icon-reviews.png" >

                </div>
                
               
            </div>
            
            
            <div class="row">
            
                <div class="col-md-4" style="padding:5px;">
                	                
                	<img src="/images/home-troon.png"  style="width:100%;">
                
                	<img class="absolute-center" src="/images/home-icon-troon.png" >
                
                </div>
                
                <div class="col-md-4" style="padding:5px;">
                	                
                	<img src="/images/home-atlantic.png"  style="width:100%;">
                
                	<img class="absolute-center" src="/images/home-icon-atlantic.png" >
                
                </div>
                
                 <div class="col-md-4" style="padding:5px;">
                	                
                	<img src="/images/home-marriott.png"  style="width:100%;">
                
                	<img class="absolute-center" src="/images/home-icon-marriott.png" >
                
                </div>
            
            </div>


			<div class="row">
            
            
            <div class="col-md-12" style="padding:5px;"/>
            
            <img src="/images/home-bottom-banner.png" style="width:100%;">
            
            </div>
            
            </div>

	

@stop
