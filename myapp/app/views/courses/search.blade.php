@extends('layouts.default')


@section('searchbar')

					<div class="search-header full-width">
						
        				
                        <div class="container"> 
						
                        <div class="row">
						
                        <form action="/golfcourses" method="post" name="search-form" id="searchheadform">                        
                        
                            <div class="col-md-9">
        
    
    
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" value="{{$place}}" id="mainsearch_input" autocorrect="off" name="place" placeholder="COUNTRY, CITY OR VENUE NAME" />                
                                <input type="hidden" value="{{$country}}" name="country" id="country" >                       
                                <input type="hidden" value="{{$region}}" name="region" id="region" >
                                <input type="hidden" value="{{$town}}" name="town" id="town" >
                                <input type="hidden" value="{{$postcode}}" name="postcode" id="postcode" >
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" onClick="document.forms['search-form'].submit();">Go!</button>
                                </span>
                            </div>
                                 
                            </div>
                            
                            <div class="col-md-3">
                          
    
                                <div class="input-group-lg">
                                    {{ Form::select('ob1', array(
                                                    'PHL' => 'Price - High to Low', 
                                                    'PLH' => 'Price - Low to High', 
                                                    'VAZ' => 'Venue - A to Z',  
                                                    'VZA' => 'Venue - Z to A'), 
                                                    $obo1,array('class'=>'form-control','id'=>'filter_options')) }}
                                                    
                                     {{ Form::hidden('place', $place) }}
                                </div>
                        
                            
                        
                        </div>
                        
                        </form>
                        
                        </div>
                        
                        </div>
                        
                        
          
                    
                    </div>

@stop

@section('content')

		<div class="row" >              	
                     
                    
                <div class="col-md-12">
                                  
							<div id="content">
                            
                            <div class="listing">
                            @foreach ($courses as $course)    	

                                <div class="row search-result">
                                                           
                                    <div class="col-md-10">
    
                                           <?php //	dd($course); ?>
                                            <a href="/golfcourses/profile/{{$course->CLUB_URLID}}"><img class="img-responsive" style="width:100%;" src="/clubimages/{{$course->IMG_IMAGE1}}" /></a>
    

                                    </div>
                                    
                                    <div class="col-md-2" >
                                    		

                                        	
                                            <div class="search-result-bx col-xs-2 col-md-12 " >
                                            <p>GREEN FEES FROM</p>
                                            <h2>£{{$course->COURSE_LOW_WEEK}}</h2>
                                            </div>	
                                            <div class="search-result-bx col-xs-2 col-md-12">
                                            <p>GOLF DAYS FROM</p>
                                            <h2>£TBC</h2>
                                            </div>
                                           @if (isset($course->CLUB_MEMBER))
                                           <div class="search-result-bx largepad col-xs-2 col-md-12">
                                           <p>AVAILABLE</p>
                                           <h3>MEMBERSHIP</h3>
                                           </div>                                         
                                           @endif
                                           @if (isset($course->SPECIAL_OFFER))
                                           	   <div class="search-result-bx largepad col-xs-2 col-md-12">
                                               <p>AVAILABLE</p>
                                               <h3>SPECIAL OFFER</h3>
                                               </div>
                                            @endif
                                            @if (isset($course->CARD_DESC))
                                            	<div class="search-result-bx largepad col-xs-2 col-md-12">
                                                <p>AVAILABLE</p>
                                                <h3>ISPY GOLF EXTRA</h3></div>
                                            @endif
                                            
                                    
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                
                                    	<h4><a href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }}, {{$course->CLUB_CITY}}. {{$course->CLUB_COUNTRY}} </a></h4>
										<h4><a href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{$course->COURSE_NAME}}</a></h4>
                                        
                                    </div>
                                    
                                    <div class="col-md-6">    
                                    		<div class="col-md-8">                                   
                                				
                                               	
                                               
                                                <h4>Golf Breaks Available</h4>
                                                
                                                <img src="/hotelimages/" />
                                           
        
                                                
                                           </div>
                                            <div class="col-md-4">
                                            
                                            
                                            </div>
                                    </div>
                                
                                </div>
                                
                                <div class="row">
                                

                                 
                                 </div>
                            
                            @endforeach
                            </div>
                          

                          {{ $courses->appends(Input::except('page'))->links() }}
                      
                          
                          </div>
                         
                   
                    
                </div>
                    


            </div> 
    
@stop
