@extends('layouts.maps')

@section('content')

<div class="row">
    <div class="col-md-12">                   
               <form onsubmit="showAddress(); return false" action="#">
               
               <label>Search Map</label>               
               <input type="text" name="address" id="address" placeholder="E.g. Country, County, City" 
               class="custom-dropdown__select custom-dropdown__select--white">
               
               <input name="" style="margin-right:30px;margin-top:2px;" type="submit" class="greenbut" value="Search">  
                            
               <input name="dir_all" type="checkbox" id="dir_all"  onClick="changeMarkersAllDir()" value="1" checked>
               <label for="dir_all">All Courses</label>
                            
               <input name="dir_championship" type="checkbox" id="dir_championship"  onClick="changeMarkersDir()" value="1">
               <label for="dir_all">Championship Courses</label>
               
               <input name="dir_destinations" type="checkbox" id="dir_destinations"  onClick="changeMarkersDir()" value="1">
               <label for="dir_all">Golf Breaks</label>
               
               <input name="dir_membership" type="checkbox" id="dir_membership" onClick="changeMarkersDir()" value="1">
               <label for="dir_all">Membership Available</label>
               
               <input type="checkbox" name="dir_specials" id="dir_specials"  onClick="changeMarkersSpecOffers()" value="1">
               <label for="dir_all">Special Offers</label>
            
               </form> 
	</div>                
</div>

<div class="row">
    <div class="col-md-12">  
		<div id="map" style="width: 100%; height: 672px"></div>
	</div>
</div>

    
@stop
