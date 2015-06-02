@extends('layouts.default')

@section('content')

      <div  class="row contentpage bottom-buffer-lg" >
      
      	  <div class="col-md-12">
      
                	<h2>MAKE AN ENQUIRY AT CLUB NAME - COURSE</h2>
                    <hr>
          
          </div>
          
          <div class="col-md-8" style="background-color:#FFFFFF;">
          
  
            
            
            
            <p>Completing this form allows you to request a  quote for your golf day from your chosen venue.  Simply complete  the following details and your request will be automatically submitted to your  chosen destination who will reply DIRECTLY to you by email.
            </p>
            
            
            <form name="membenq" method="post" action="thankspage" role="form">
            
                <input type="hidden" name="recipient" value="ispygolf" />
                <input type="hidden" name="club_id" value="to add club id" />
                
                
              
               
               <div class="row">
               
               	<div class="col-md-12">
               
                <label>I am enquiring on behalf of a Society or Company</label>
                
                </div>
                
                <div class="col-md-2">
                
                    <div class="radio">
                                <label><input type="radio" name="socorcomp" id="socorcomp" value="Society" checked />Society</label>
                    </div>
                
                </div>
                
                <div class="col-md-2">
                    <div class="radio">
                                <label><input type="radio" name="socorcomp"  id="socorcomp" value="Corporate" />Company</label>
                    </div>
                </div>
                
                </div>
                
                <div class="row">
                
                <div class="col-md-12">
                
    			<div class="form-group">
                <label for="companyname">Society / Company Name</label>
                <input name="companyname" placeholder="Society / Company Name " class="form-control" type="text" id="companyname" size="30" maxlength="150" />
                </div>
                </div>
                
                </div>
                
                <hr>
                
 
                <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input name="firstname" class="form-control" type="text" size="30" placeholder="First Name" maxlength="150" />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input name="lastname" class="form-control" type="text"  size="30" placeholder="Last Name" maxlength="150" />
                    </div>
                </div>
                
                </div>
                <div class="row">
                	<div class="col-md-6">
                        <div class="form-group">
                        <label for="telephone">Phone No</label>
                        <input name="telephone" class="form-control" type="text" placeholder="Phone No"  size="18" maxlength="150" />
                        </div>
                    </div>
                
                
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" class="form-control" placeholder="Email" type="text" size="30" maxlength="150" />
                    </div>
                    </div>
                </div>
                
                <div class="row">
                
                    <div class="col-md-6">
                    <div class="form-group">
                         <label for"postcode">Postcode</label>
                        <input name="postcode" class="form-control" type="text" id="postcode" placeholder="Postcode"  size="30" maxlength="150" />               
                    </div>
                    </div>
                
                </div>
                
           		<hr /> 
                
                <h3>EVENT DETAILS</h3>
                <div class="row">

                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Event Date</label>
                        <input type="text" class="form-control" name="date" id="datepicker" placeholder="Event Date"  size="20" maxlength="150"/>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="form-group">
                         <label for"players">No. Of Players</label>
                        <input name="players" class="form-control" type="text" id="players"  placeholder="No. Of Players" size="15" maxlength="150" />             
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="form-group">
                         <label for"players">No. Of Holes To Be Played</label>
                        <input name="holes" class="form-control" type="text" id="holes"  placeholder="No. Of Holes" size="15" maxlength="150" />             
                    </div>
                    </div>
                
                </div>
                
                <div class="row">
                
                    <div class="col-md-3">
                    
                        <div class="checkbox">
                               <label><input type="checkbox" name="catering" id="catering" value="Yes" />Catering Required</label>
                        </div>
                    
                    </div>
                    
                    <div class="col-md-3">
                        <div class="checkbox">
                               <label><input type="checkbox" name="meetingroom"  id="meetingroom" value="Yes" />Meeting Room Required</label>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="checkbox">
                               <label><input type="checkbox" name="buggyhire"  id="buggyhire" value="Yes" />Buggy Hire Required</label>
                        </div>
                    </div>                  

                </div>
                
                <div class="row">
                    
                    <div class="col-md-12">
                    <div class="form-group">
                         <label for"comments">Additional Comments</label>
                        <textarea name="comments" class="form-control" type="text" id="comments"  rows="4" placeholder="Additional Comments" ></textarea>            
                    </div>
                    </div>                
                         
                </div>
                
                
                <div class="row">
                
                <div class="col-md-10">
                
                                Please untick this box if you DO NOT want news of golf offers &amp; prizes by email
                
                
                	<input name="offers" type="checkbox" value="1" checked >
                </div>
                
                <div class="col=md-2 text-right r-padding-15 bottom-buffer">
                
                <input type="submit" value="Submit" class="btn btn-default" alt="Submit" onClick="return checkForm();">
                
                </div>
                
                </div>

                
            </form>
          
          </div>   
          
          <div class="col-md-4" >
          
          	<h2> Sidebar </h2>
            
            <hr>
            
            <p> This is going to be the sidebar </p>
          
          </div>
          
         
          
          
              

</div>


@stop 