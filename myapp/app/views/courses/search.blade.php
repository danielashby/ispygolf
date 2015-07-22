@extends('layouts.default')


@section('searchbar')

					<div class="search-header full-width">
						
        				
                        <div class="container"> 
                            
                            <form action="/golf-courses" method="post" name="search-form" id="searchheadform">     
                           
                                <div class="row">
        
        							
        
                                    <div class="col-md-8">
        
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$search_val}}" id="mainsearch_input" autocorrect="off" name="search_val" placeholder="COUNTRY, CITY OR CLUB NAME" />              
                                        {{ Form::hidden('name', $name,array('id'=>'name')) }}
                                         {{ Form::hidden('country', $country,array('id'=>'country')) }}
                                         {{ Form::hidden('region', $region,array('id'=>'region')) }}
                                         {{ Form::hidden('town', $town,array('id'=>'town')) }}
                                         {{ Form::hidden('postcode', $postcode,array('id'=>'postcode')) }}  
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" onClick="document.forms['search-form'].submit();"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> SEARCH</button>
                                            
                                        </span>
                                    </div>
                                         
                                    </div>
                                    
                                    <div class="col-md-2" style="padding-left:25px;">
                                  
            
                                        <div class="input-group">
                                            {{ Form::select('ob1', array(
                                                            'PHL' => 'Price - High to Low', 
                                                            'PLH' => 'Price - Low to High', 
                                                            'VAZ' => 'Venue - A to Z',  
                                                            'VZA' => 'Venue - Z to A'), 
                                                            $obo1,array('class'=>'form-control','id'=>'filter_options')) }}

                                             
                                             
                                             
                                        </div>
                                
                                    
                                
                                    </div>
                                    
                                    <div class="col-md-2">
                                    
                                    
                                    
                                    <button class="btn  btn-primary" type="button" data-toggle="collapse" data-target="#filters" aria-expanded="false" aria-controls="filters">
 <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter
</button>
                                    
                                    <!--<a class="btn btn-default" data-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="filters">More Filters...</a>-->
                                    </div>
                              
                                
                               
                                
                                </div>
        
                                <div class="row collapse" id="filters">
                                
                                    <div class="col-md-12 " >
                                    
                                        <div class="row largepad">
                                           
                                            <div class="col-md-4">
                                
                                                <div class="form-group " >
                                             
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
                                                
                                             </div>   
                                                
                                                
                                              <div class="col-md-4">  
                                                
                                                <div class="form-group" >
                                                {{ Form::label('adv_filter_coursedesigner', 'Course Designer'); }}
                                                {{ Form::text('adv_filter_coursedesigner', $adv_filter_coursedesigner,array('class'=>'form-control','id'=>'adv_filter_coursedesigner')); }}       
                                                </div>
                                                
                                             </div>
                                             
                                             <div class="col-md-4">
                                                
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
                                    
                                        </div>
                                        
                                        <div class="col-md-12">
                                        
                                        <div class="row">
                                            
                                            	<div class="col-md-8">
                                                            
                                              
                                                 

                                                 
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_courseaccom',1,$adv_filter_courseaccom,array('id'=>'adv_filter_courseaccom')) }}
                                                 Accommodation on site
                                                 </label>
                                                
                                                
                                                 
                                                <label class="checkbox-inline"> 
                                                {{ Form::checkbox('adv_filter_coursechamp',1,$adv_filter_coursechamp,array('id'=>'adv_filter_coursechamp')) }}
                                                Championship Course
                                                </label>
                                                 
                                                
    
                                                 
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_coursemulti',1,$adv_filter_coursemulti,array('id'=>'adv_filter_coursemulti')) }}
                                                 Multiple Courses
                                                 </label>
                                                 
     
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_coursebuggy',1,$adv_filter_coursebuggy,array('id'=>'adv_filter_coursebuggy')) }}
                                                 Buggy Hire
                                                 </label>
                                                 

                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_coursedriving',1,$adv_filter_coursedriving,array('id'=>'adv_filter_coursedriving')) }}	
                                                 Driving Range											 
                                                 </label>

                        
                                            </div>
                                            
                                            	
                                             <div class="col-md-4">
                                             
                                             	<button class="btn  btn-primary" type="reset">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Reset Filter
                                                </button>
                                             	
                                             
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

		<?php $mid_column=FALSE; ?>

		<div class="row" >              	
                     
                    
                <div class="col-md-12">
                
                
                <div role="tabpanel">


                              <div class="tab-content" id="content">

                                   <div class="listing">
                                   
                                    <?php 
									
									if($mid_column==TRUE)
									{
										$i=2;
									}
									else
									{
										$i=1; 
									}
									?>
                                    
                                   
                                    @foreach ($courses as $course)   
                                     	
                                        @if ($course->ONSTOP=="1")
                                        
                                        
                                        
                                        {{-- NON PAYING CLUB LISTING START --}}
                                        
                                        {{-- CHRIS -- THIS NEEDS TO BE SORTED AS THE INFINITE SCROLL AT THE END OF THE RECORDS CUTS THROUGH COLUMN AND STARTS A NEW 'listing' CONTAINER.. TO SORT. --}}
                                        
                                       <?php if($i==1){ ?>
                                         <div class="row search-result">
                                        <?php } ?>           
                                            <div class="col-md-6 col-sm-12 nopadding-sides">               
                                                                   
                                                    <div class="col-md-12 col-sm-12">
                    
                                                           
                                                            <a href="/golf-courses/{{$course->CLUB_URLID}}"><img class="img-responsive search-mainimage" src="/clubimages/{{$course->IMG_IMAGE1}}" /></a>
                    
                
                                                    </div>
                                                     
                                                    <div class="col-md-12  col-sm-12 ">

                                                        <h4><a class="dark-heading" href="/golf-courses/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }} @if (isset($course->COURSE_NAME)) ({{$course->COURSE_NAME}}) @endif </a></h4>
                                                        <h4 class="small-lineheight" ><a class="light-heading href="/golf-courses/{{$course->CLUB_URLID}}">{{$course->CLUB_COUNTY}}, {{$course->CLUB_COUNTRY}}  </a></h4>
                                                        
                                                    </div>
                                                    
                                                    <?php $mid_column = TRUE; ?>
                                                
                                            </div>
                                       <?php if($i==2){ ?>
                                         </div>
                                        <?php 
										$i=1; 
										}
										else
										{
                                        
										 $i = $i+1;
										}
										 ?>

                                         
                                         {{-- PAYING CLUB END --}}
                                         
                                         @endif
                                        
                                        @if ($course->ONSTOP=="0")
                                        
                                        {{-- PAYING CLUB LISTING START --}}
        
                                        <div class="row search-result">
                                                                   
                                            <div class="col-md-10 col-sm-12">
            
                                                   <?php //	dd($course); ?>
                                                    <a href="/golf-courses/{{$course->CLUB_URLID}}"><img class="img-responsive search-mainimage" src="/clubimages/{{$course->IMG_IMAGE1}}" /></a>
            
        
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
                                            
                                                    <h4><a class="dark-heading" href="/golf-courses/{{$course->CLUB_URLID}}">{{ $course->CLUB_ADD1 }} @if (isset($course->COURSE_NAME)) ({{$course->COURSE_NAME}}) @endif </a></h4>
                                                    <h4 class="small-lineheight" ><a class="light-heading href="/golf-courses/{{$course->CLUB_URLID}}">{{$course->CLUB_COUNTY}}, {{$course->CLUB_COUNTRY}}  </a></h4>
                                                    
                                                </div>
                                            
                                            
    
                                            
                                                <div class="col-md-4  col-sm-6 ">    
                                                                                       
                                                            
                                                            
                                                            @if (isset($course->PACKAGE_IMG))
                                                            <a href="/golf-courses/{{$course->CLUB_URLID}}">
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
                                         
                                         @endif
                                         
                                         {{-- PAYING CLUB END --}}
                                    
                                    @endforeach
                                    
                                    </div>
                                  
        
                                  {{ $courses->appends(Input::except('page'))->links() }}                              
                                
                                
                               

                              </div>
                            
                            

                      
                          
                        
                          
                          
                          </div>
                         
                   
                    
                </div>
                    


            </div> 
    
@stop
