@extends('layouts.default')

@section('content')

			<div class="row">

                <div class="col-md-12">
                    
                    <div  class="row">
                        
                        <div class="col-md-12">
                    
                            <h1 >{{ $club->CLUB_ADD1 }}</h1>
                         
                         
                                                  
                         	@foreach ($club->courses as $course)
                            
                            
                            	
                                {{--<h3>{{$course->COURSE_NAME}}</h3>--}}
                                
                                <?php //var_dump($course); die; exit; ?>
                                <img src="/clubimages/{{$course->courseimages()->first()->IMG_IMAGE1}}" />
                                
                            
                            @endforeach
                         
                         
                         
                         
                           @foreach ($club->courses as $course)
                            
                            
                            	
                                {{--<h3>{{$course->COURSE_NAME}}</h3>--}}
                                
                                <?php //var_dump($course); die; exit; ?>
                                <img src="/clubimages/{{$course->courseimages()->first()->IMG_IMAGE1}}" />
                                
                            
                            @endforeach
                         
                         
                         
                         </div>
                         
                    </div>
                    
                </div>
                    


            </div> 
    
@stop