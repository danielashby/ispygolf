@extends('layouts.default')

@section('content')

			<div class="row">

  			 {{-- This comment will not be in the rendered HTML --}}
                	<h1 class="page-header">
                    Search Results
                    </h1>
                    
                    
                    <div class="col-md-8">

                           
                            <form action="/golfcourses" method="post">
                            <div class="col-md-9">
                                <input type="text" value="" id="mainsearch_input" autocorrect="off" name="place" placeholder="Where do you want to play?" />                
                                <input type="hidden" value="" name="country" id="country" >                       
                                <input type="hidden" value="" name="region" id="region" >
                                <input type="hidden" value="" name="town" id="town" >
                                <input type="hidden" value=""  name="name" id="name">
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="text_white" id="mainsearch_submit" value="Search"/>
                            </div>
                            </form>
                         
                    
                </div>
                    
                    
                <div class="col-md-12">
                

                    
                    
                    <div class="row">
                    
                    	<div class="col-md-2">

                        
                        {{ Form::open(array('action' => 'PagesController@courses','method'=>'get','id'=>'filter_options','name'=>'filter_options')) }}

                        
                        {{ Form::select('vorder', array(
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
                                        $venues_order) }}
                                        
                        {{ Form::close() }}
                        
                                   
                        
                        </div>
                    
                    </div>
                
							<div id="content">
                            
                            <div class="listing">
                            @foreach ($courses as $course)
                            
                            	
                            	
                            	
                                <div class="row">
                                                           
                                <div class="col-md-12">

                                <h3><a href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }}</a></h3>
                                	   <h1 ></h1> 
    
    
                                       <p>Course: {{$course->COURSE_NAME}}</p>
                                        

                                       <?php //	dd($course); ?>
                                	    <a href="/golfcourses/profile/{{$course->CLUB_URLID}}"><img src="{{$course->IMG_SEARCH2}}" /></a>

                                
                                </div>
                                
                                 </div>
                            
                            @endforeach
                            </div>
                          

                          {{ $courses->appends(Input::except('page'))->links() }}
                      
                          
                          </div>
                         
                   
                    
                </div>
                    


            </div> 
    
@stop
