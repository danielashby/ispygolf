@extends('layouts.default')


@section('searchbar')

					<div class="search-header full-width menu">
						
        				
                        <div class="container"> 
                            
                            <form action="/golfcourses" method="post" name="search-form" id="searchheadform">     
                           
                                <div class="row">
        
                                    <div class="col-md-6">
        
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$place}}" id="mainsearch_input" autocorrect="off" name="place" placeholder="COUNTRY, CITY OR VENUE NAME" />                
                                        <input type="hidden" value="{{$country}}" name="country" id="country" >                       
                                        <input type="hidden" value="{{$region}}" name="region" id="region" >
                                        <input type="hidden" value="{{$town}}" name="town" id="town" >
                                        <input type="hidden" value="{{$postcode}}" name="postcode" id="postcode" >
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onClick="document.forms['search-form'].submit();"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Go</button>
                                        </span>
                                    </div>
                                         
                                    </div>
                                    
                                    <div class="col-md-4">
                                  
            
                                        <div class="input-group">
                                            {{ Form::select('ob1', array(
                                                            'PHL' => 'Price - High to Low', 
                                                            'PLH' => 'Price - Low to High', 
                                                            'VAZ' => 'Venue - A to Z',  
                                                            'VZA' => 'Venue - Z to A'), 
                                                            $obo1,array('class'=>'form-control','id'=>'filter_options')) }}
                                                            
                                             {{ Form::hidden('place', $place) }}
                                        </div>
                                
                                    
                                
                                    </div>
                                    
                                    <div class="col-md-2">
                                    
                                    <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters">
 <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter Results 
</button>
                                    
                                    <!--<a class="btn btn-default" data-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="filters">More Filters...</a>-->
                                    </div>
                              
                                
                               
                                
                                </div>
        
                                <div class="row collapse" id="filters">
                                
                                    <div class="col-md-12 form-inline" >
                                    
                                        <div class="row largepad">
                                            <div class="col-md-12">
                                
                                                <div class="form-group" >
                                             
                                                 {{ Form::label('adv_filter_coursetype', 'Course Style'); }}
                                                 {{ Form::select('adv_filter_coursetype', array(
                                                                '' => 'Any', 
                                                                'L' => 'Links', 
                                                                'H' => 'Heathland',  
                                                                'T' => 'Parkland (traditional)', 
                                                                'M' => 'Parkland (modern)', 
                                                                'S' => 'Parkland (seaside)', 
                                                                'R' => 'Moorland', 
                                                                'W' => 'Downland', 
                                                                'I' => 'Hill Top', 
                                                                'C' => 'Cliff Top', 
                                                                'F' => 'Florida Style/Lake', 
                                                                'D' => 'Desert', 
                                                                'N' => 'Inland Links', 
                                                                'A' => 'Woodland', 
                                                                '0' => 'Other'), 
                                                                $adv_filter_coursetype,array('class'=>'form-control','id'=>'adv_filter_coursetype')) }}                   	                        
                                                </div>
                                                
                                                <div class="form-group" >
                                                {{ Form::label('adv_filter_coursedesigner', 'Course Designer'); }}
                                                {{ Form::text('adv_filter_coursedesigner', $adv_filter_coursedesigner,array('class'=>'form-control','id'=>'adv_filter_coursedesigner')); }}       
                                                </div>
                                                
                                                <div class="form-group" >
                                                 {{ Form::label('adv_filter_coursedif', 'Course Difficulty'); }}
                                                 {{ Form::select('adv_filter_coursedif', array(
                                                                '' => 'Any', 
                                                                'M' => 'Green', 
                                                                'N' => 'Red',  
                                                                'O' => 'Blue', 
                                                                'P' => 'Black'),
                                                                $adv_filter_coursedif,array('class'=>'form-control','id'=>'adv_filter_coursedif')) }}                   	
                                                                
                                                </div>
                                                
                                            </div>
                                    
                                        </div>
                                        
                                        <div class="row largepad">
                                            
                                            <div class="col-md-12">
                                                            
                                                <div class="form-group">
                                                 
                                                 <div class="checkbox">
                                                 {{ Form::checkbox('adv_filter_courseaccom',$adv_filter_courseaccom,array('class'=>'form-control','id'=>'adv_filter_courseaccom')) }}
                                                 
                                                 {{ Form::label('adv_filter_courseaccom', 'Accommodation On Site'); }}
                    							</div>
                                                
                                                </div>
                                                
                                                <div class="form-group">
                                                 <div class="checkbox">
                                                 
                                                 {{ Form::checkbox('adv_filter_coursechamp',$adv_filter_coursechamp,array('class'=>'form-control ','id'=>'adv_filter_coursechamp')) }}
                                                 {{ Form::label('adv_filter_coursechamp', 'Championship Course'); }}
                            					</div>
                                                </div>
                                                
                                                 <div class="form-group">
                                                 <div class="checkbox">
                                                 {{ Form::checkbox('adv_filter_coursemulti',$adv_filter_coursemulti,array('class'=>'form-control','id'=>'adv_filter_coursemulti')) }}
                                                 {{ Form::label('adv_filter_coursemulti', 'Multiple Courses'); }}
                            					</div>
                                                </div>
                                                
                                                <div class="form-group">
                                                 <div class="checkbox">
                                                 {{ Form::checkbox('adv_filter_coursebuggy',$adv_filter_coursebuggy,array('class'=>'form-control','id'=>'adv_filter_coursebuggy')) }}
                                                 {{ Form::label('adv_filter_coursebuggy', 'Buggy Hire'); }}
                                                 
                            					</div>
                                                </div>
                                                
                                                 <div class="form-group">
                                                 <div class="checkbox">
                                                 
                                                 {{ Form::checkbox('adv_filter_coursedriving',$adv_filter_coursedriving,array('class'=>'form-control','id'=>'adv_filter_coursedriving')) }}												 {{ Form::label('adv_filter_coursedriving', 'Driving Range'); }}
                                                 </div>
                            
                                                </div>
                        
                                            </div>
                                        </div>             
                                </div>
           
                            </div>
                            
                        </form>         
                            
                    </div>
                    
                    </div>

@stop

@section('content')

		<div class="row" >              	
                     
                    
                <div class="col-md-12">
                
                
                <div role="tabpanel">


                              <div class="tab-content" id="content">

                                   <div class="listing">
                                    @foreach ($courses as $course)    	
        
                                        <div class="row search-result">
                                                                   
                                            <div class="col-md-10 col-sm-12">
            
                                                   <?php //	dd($course); ?>
                                                    <a href="/golfcourses/profile/{{$course->CLUB_URLID}}"><img class="img-responsive search-mainimage" src="/clubimages/{{$course->IMG_IMAGE1}}" /></a>
            
        
                                            </div>
                                            
                                        <div class="col-md-2 col-sm-12" >
                                                    
        
                                                    
                                                    <div class="search-result-bx col-sm-2 col-md-12 " >
                                                    <p>GREEN FEES FROM</p>
                                                    <h2>£{{$course->COURSE_LOW_WEEK}}</h2>
                                                    </div>	
                                                    <div class="search-result-bx col-sm-2 col-md-12">
                                                    <p>GOLF DAYS FROM</p>
                                                    <h2>£TBC</h2>
                                                    </div>
                                                   @if (isset($course->CLUB_MEMBER))
                                                   <div class="search-result-bx largepad col-sm-2 col-md-12">
                                                   <p>AVAILABLE</p>
                                                   <h3>MEMBERSHIP</h3>
                                                   </div>                                         
                                                   @endif
                                                   @if (isset($course->SPECIAL_OFFER))
                                                       <div class="search-result-bx largepad col-sm-2 col-md-12">
                                                       <p>AVAILABLE</p>
                                                       <h3>SPECIAL OFFER</h3>
                                                       </div>
                                                    @endif
                                                    @if (isset($course->CARD_DESC))
                                                        <div class="search-result-bx largepad col-sm-2 col-md-12">
                                                        <p>AVAILABLE</p>
                                                        <h3>ISPY GOLF EXTRA</h3></div>
                                                    @endif
                                                    
                                            
                                            </div>
                                            
                                            
                                            <div class="col-md-6  col-sm-6 ">
                                        
                                                <h4><a class="dark-heading" href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }} @if (isset($course->COURSE_NAME)) ({{$course->COURSE_NAME}}) @endif </a></h4>
                                                <h4 class="small-lineheight" ><a class="light-heading href="/golfcourses/profile/{{$course->CLUB_URLID}}">{{$course->CLUB_COUNTY}}, {{$course->CLUB_COUNTRY}}  </a></h4>
                                                
                                            </div>
                                            
                                            
    
                                            
                                            <div class="col-md-4  col-sm-6 ">    
                                                                                   
                                                        
                                                        
                                                        @if (isset($course->PACKAGE_IMG))
                                                        <a href="/golfcourses/profile/{{$course->CLUB_URLID}}">
                                                        <h4 class="dark-heading">Golf Breaks Available</h4>
                                                        <h4 class="light-heading  small-lineheight">View Latest</h4>
                                                        
                                                        <div id="search-package-img">
                                                        <img src="/hotelimages/{{$course->PACKAGE_IMG}}" />
                                                        </div>
                                                        </a>
                                                        @endif                       
                            
                                                        
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
                    


            </div> 
    
@stop
