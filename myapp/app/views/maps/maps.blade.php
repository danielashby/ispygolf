@extends('layouts.maps')

@section('map-search-row')

<div class="search-header full-width">

    <div class="container">
    
        <form onsubmit="showAddress(); return false" action="#">
        
            
            <div class="row">
 
                    <div class="col-md-12">         
        
                         <div class="input-group">
                            <input type="text" class="form-control"  id="address" autocorrect="off" name="address" placeholder="COUNTRY, CITY OR VENUE NAME" />              
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" onClick="document.forms['search-form'].submit();"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> SEARCH</button>
                                
                            </span>
                        </div>
        
        
                    </div>   

            </div> 
            
        
        </form>  
    
    </div>

</div>

@section('map-container')

@stop

<div id="map" style="width: 100%; height:100%;left:0;top:1;position:absolute;"></div>


    
@stop
