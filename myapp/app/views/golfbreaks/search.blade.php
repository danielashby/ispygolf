@extends('layouts.default')


@section('searchbar')

					<div class="search-header full-width">
						
        				
                        <div class="container"> 
                            
                            <form action="/golfbreaks" method="post" name="search-form" id="searchheadform">     
                           
                                <div class="row">
        
        							
        
                                    <div class="col-md-8">
        
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$search_val}}" id="mainsearch_input" autocorrect="off" name="search_val" placeholder="COUNTRY, CITY OR VENUE NAME" />              
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
                                                            'S51' => 'Standard - 5* to 1*',  
                                                            'S15' => 'Standard - 1* to 5*', 
                                                            'VAZ' => 'Venue - A to Z', 
                                                            'VZA' => 'Venue - Z to A',
                                                            'RAZ' => 'Region - A to Z', 
                                                            'RZA' => 'Region - Z to A'),
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

                                                 {{ Form::label('adv_filter_standard', 'Accommodation Standard'); }}
                                                 {{ Form::select('adv_filter_standard', array(
                                                                '' => 'Any', 
                                                                '5' => '5*', 
                                                                '4' => '4*',  
                                                                '3' => '3*', 
                                                                '2' => '2*',
                                                                '1' => '1*'), 
                                                                $adv_filter_standard,array('class'=>'form-control','id'=>'adv_filter_standard')) }}                   	                        
                                                </div>
                                                
                                             </div>   
                                                
                                                
                                              <div class="col-md-4">  
             
                                                <div class="form-group" >
                                                 {{ Form::label('adv_filter_catering', 'Catering Options'); }}
                                                 {{ Form::select('adv_filter_catering', array(
                                                                '' => 'Any', 
                                                                'A' => 'Accommodation Only', 
                                                                'B' => 'Bed &amp; Breakfast',  
                                                                'D' => 'Dinner, Bed &amp; Breakfast', 
                                                                'F' => 'Full Board',
                                                                'I' => 'All Inclusive',
                                                                'S' => 'Self Catering'), 
                                                                $adv_filter_catering,array('class'=>'form-control','id'=>'adv_filter_catering')) }}                   	                        
                                                 </div>
                                                
                                             </div>
                                             
                                             <div class="col-md-4">
                                                
                                              
                                              </div>
                                              
                                              
                                                
                                            </div>
                                    
                                        </div>
                                        
                                        <div class="col-md-12">
                                        
                                        <div class="row">
                                            
                                            	<div class="col-md-8">
                                                            
                                              
                                                 

                                                 
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_spa',1,$adv_filter_spa,array('id'=>'adv_filter_spa')) }}
                                                 Spa
                                                 </label>
                                                
                                                
                                                 
                                                <label class="checkbox-inline"> 
                                                {{ Form::checkbox('adv_filter_swimming',1,$adv_filter_swimming,array('id'=>'adv_filter_swimming')) }}
                                                Swimming
                                                </label>
                                                 
                                                
    
                                                 
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_gym',1,$adv_filter_gym,array('id'=>'adv_filter_gym')) }}
                                                 Gym
                                                 </label>
                                                 
     
                                                 <label class="checkbox-inline">
                                                 {{ Form::checkbox('adv_filter_tennis',1,$adv_filter_tennis,array('id'=>'adv_filter_tennis')) }}
                                                 Tennis
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


		<div class="row" >              	
                     
                    
                <div class="col-md-12">
                
                
                <div role="tabpanel">


                              <div class="tab-content" id="content">

                                   <div class="listing">
                                   
	                         
                                    @foreach ($venuepackages as $venuepackage)   
   
                                        {{-- PAYING CLUB LISTING START --}}
        
                                        <div class="row search-result">
                                                                   
                                            <div class="col-md-10 col-sm-12">
            
                                                   <?php //	dd($venuepackage); ?>
                                                   
                                                    <a href="/golfbreaks/profile/{{$venuepackage->HOTEL_URLID}}"><img class="img-responsive search-mainimage" src="/hotelimages/{{$venuepackage->IMG_IMAGE1}}" /></a>
            
        
                                            </div>
                                            
                                            <div class="col-md-2 col-sm-12" >
         
                                                        <div class="search-result-bx col-sm-2 col-md-12 " >
                                                        <p>PACKAGE PRICE</p>
                                                        <h2>£</h2>
                                                        </div>	
                                                        <div class="search-result-bx col-sm-2 col-md-12">
                                                        <p>TITLE</p>
                                                        <h2>£TBC</h2>
                                                        </div>
                  
                                                </div>
                                            
                                            
                                                <div class="col-md-6  col-sm-6 ">
                                            
                                                    <h4><a class="dark-heading" href="/golfbreaks/profile/{{$venuepackage->HOTEL_URLID}}">{{ $venuepackage->HOTEL_ADD1 }} </a></h4>
                                                    <h4 class="small-lineheight" ><a class="light-heading href="/golfbreaks/profile/{{$venuepackage->HOTEL_URLID}}">{{$venuepackage->HOTEL_COUNTY}}, {{$venuepackage->HOTEL_COUNTRY}}  </a></h4>
                                                    
                                                </div>
                                            
                                            
    
                                            
                                                <div class="col-md-4  col-sm-6 ">    
                                                                                       
                                                            
                                                            
                                                      
                                
                                                            
                                                </div>
                                        
                                        </div>

                                        <div class="row">
                                        
        
                                         
                                         </div>
                                         
                                    
                                    @endforeach
                                    
                                    </div>
                                  
        
                                  {{ $venuepackages->appends(Input::except('page'))->links() }}                              
                                
                              </div>
                            
                            

                      
                          
                        
                          
                          
                          </div>
                         
                   
                    
                </div>
                    


            </div> 
    
@stop
