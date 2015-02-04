@extends('layouts.default')

@section('content')

			<div class="row">

  			 {{-- This comment will not be in the rendered HTML --}}

                <div class="col-md-12">
                
                	<h1 class="page-header">
                    Search Results
                    </h1>
                    
                    
                    <div class="row">
                    
                    	<div class="col-md-2">

                        
                        {{ Form::open(array('action' => 'PagesController@courses','method'=>'get','id'=>'filter_options','name'=>'filter_options')) }}
                        {{ Form::select('vpp', array(
                        				'20' => '20 Per Page', 
                                        '30' => '30 Per Page',
                                        '40' => '40 Per Page',
                                        '50' => '50 Per Page',
                                        '60' => '60 Per Page'),
                                         $venues_per_page) }}
                        
                        {{ Form::select('vorder', array(
                        				'PHL' => 'Price (High to Low)', 
                        				'PLH' => 'Price (Low to High)', 
                                        'VAZ' => 'Venue (A to Z)',  
                                        'VZA' => 'Venue (Z to A)', 
                                        'CAZ' => 'County (A to Z)', 
                                        'CZA' => 'County (Z to A)', 
                                        'SAZ' => 'Style (A to Z)', 
                                        'SZA' => 'Style (Z to A)', 
                                        'VAZ' => 'IDR (Hard to Easy)',  
                                        'VZA' => 'IDR (Easy to Hard)'),  
                                        $venues_order) }}
                                        
                        {{ Form::submit('Re-Order') }}
                        {{ Form::close() }}
                        
                                   
                        
                        </div>
                    
                    </div>
                
                    <div  class="row">
                            
                            @foreach ($courses as $course)
                            
                            	
                            	
                            	
                                <div class="row">
                                                           
                                <div class="col-md-12">

                                <h3><a href="/golfcourses/profile/{{$course->club->CLUB_URLID}}">{{ $course->club->CLUB_ADD1 }}</a></h3>
                                	   <h1 ></h1> 
    
    
                                       <p>Course: {{$course->COURSE_NAME}}</p>
                                        
                                        @foreach ($course->courseimages()->get() as $courseimage)
                                       <?php //	dd($course); ?>
                                       IMG_SEARCH2: ({{$courseimage->IMG_SEARCH2}})
                                	    <img src="{{$courseimage->IMG_SEARCH2}}" />
                                        @endforeach
                                    	

                                
                                </div>
                                
                                 </div>
                            
                            @endforeach
                            

                            
                            
                            {{ $courses->links(); }}
                         
                         
                    </div>
                    
                </div>
                    


            </div> 
    
@stop
