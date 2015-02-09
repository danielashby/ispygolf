@extends('layouts.default')
@section('content')
			<div class="row">

                <div class="col-md-2">
                </div>

                <div class="col-md-8">
                    <div id="main-search" class="row">
                        
                        <div class="col-md-12">
                    
                            <h1 class="shadow-big text_white" >THE WEB'S MOST VISUAL GOLF GUIDE</h1>
                            <h2 class="shadow-big text_white" >FIND THE BEST COURSES, MEMBERSHIPS, GOLF BREAKS AND SPECIAL OFFERS.</h2>
                            
                         </div>
                         
                    </div>
                    
                     <div id="main-search" class="row" style="margin-top:22px;">
                           
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
                    
                </div>
                    
                <div class="col-md-2">
                </div>  

            </div> 
@stop


@section('smallbox')

     <div id="main-pop-box" >
    
        <a id="pop-url" href="">
        
        <img id="pop-img" src="" />
        
        </a>
    
    </div>

@stop

