@extends('layouts.default')


@section('searchbar')

					<div class="search-header full-width">
						
        				
                        <div class="container"> 
						
                        <div class="row">
                        
                        <div class="col-md-9">
    
						      <form action="/golfcourses" method="post" name="search-form">

                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" value="{{$place}}" id="mainsearch_input" autocorrect="off" name="place" placeholder="COUNTRY, CITY OR VENUE NAME" />                
                                    <input type="hidden" value="" name="country" id="country" >                       
                                    <input type="hidden" value="" name="region" id="region" >
                                    <input type="hidden" value="" name="town" id="town" >
                                    <input type="hidden" value="" name="postcode" id="postcode" >
                                    <input type="hidden" value=""  name="name" id="name">
									<span class="input-group-btn">
                                    	<button type="button" class="btn btn-default" onClick="document.forms['search-form'].submit();">Go!</button>
                                    </span>
                                </div>
                                
                                </form>
                                
                                
 
                             
						</div>
                        
                        <div class="col-md-3">
                        
                        
     
                        
                        
                        
                        {{ Form::open(array('action' => 'PagesController@courses','method'=>'get','id'=>'filter_options','name'=>'filter_options')) }}
<div class="input-group-lg">
                        {{ Form::select('ob1', array(
                        				'PHL' => 'Price - High to Low', 
                        				'PLH' => 'Price - Low to High', 
                                        'VAZ' => 'Venue - A to Z',  
                                        'VZA' => 'Venue - Z to A', 
                                        'CAZ' => 'County - A to Z', 
                                        'CZA' => 'County - Z to A', 
                                        'SAZ' => 'Style - A to Z', 
                                        'SZA' => 'Style - Z to A', 
                                        'IHE' => 'IDR - Hard to Easy',  
                                        'IEH' => 'IDR - Easy to Hard'), 
                                        $obo1,array('class'=>'form-control')) }}
                        </div>
                        {{ Form::close() }}
                            
                        
                        </div>
                        
                        
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
                                                           
                                    <div class="col-md-9">
    
                                           <?php //	dd($course); ?>
                                            <a href="/golfcourses/profile/{{$course->CLUB_URLID}}"><img class="img-responsive" src="/clubimages/{{$course->IMG_IMAGE1}}" /></a>
    

                                    </div>
                                    
                                    <div class="col-md-3" >
                                    		

                                        	
                                            <div class="search-result-bx col-xs-2 col-md-12 " >
                                            <p>GREEN FEES FROM</p>
                                            <h2>£110</h2>
                                            </div>	
                                            <div class="search-result-bx col-xs-2 col-md-12">
                                            <p>GOLF DAYS FROM</p>
                                            <h2>£110</h2>
                                            </div>
                                            @if (isset($course->SPECIAL_OFFER))
                                           	   <div class="search-result-bx col-xs-2 col-md-12">
                                               <p>AVAILABLE</p>
                                               <h3>SPECIAL OFFER</h3>
                                               </div>
                                            @endif
                                            @if (isset($course->CARD_DESC))
                                            	<div class="search-result-bx col-xs-2 col-md-12">
                                                <p>AVAILABLE</p>
                                                <h3>ISPY GOLF EXTRA</h3></div>
                                            @endif
                                            
                                    
                                    </div>
                                    
                                    
                                    <div class="col-md-8">
                                
                                    	<h4><a href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }}, {{$course->CLUB_CITY}}. {{$course->CLUB_COUNTRY}} </a></h4>
										<h4>{{$course->COURSE_NAME}}</h4>
                                        
                                    </div>
                                    
                                    <div class="col-md-4">    
                                    		<div class="col-md-8">                                   
                                				<h4>Golf Breaks Available</h4>
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
