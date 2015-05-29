@extends('layouts.default')

@section('content')

      <div  class="row contentpage">
      
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
                
                
                <label>I am enquiring on behalf of a Society or Company</label>
                <div class="radio">
                            <label><input type="radio" name="socorcomp" id="socorcomp" value="Society" checked />Society</label>
                </div>
                <div class="radio">
                            <label><input type="radio" name="socorcomp"  id="socorcomp" value="Corporate" />Company</label>
                </div>
                
    			<div class="form-group">
                <label for="companyname">Society / Company Name</label>
                <input name="companyname" placeholder="Society / Company Name " class="form-control" type="text" id="companyname" size="30" maxlength="150" />
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
                
                <div class="col-md-6">
                <div class="form-group">
                     <label for"postcode">Postcode</label>
                    <input name="postcode" class="form-control" type="text" id="postcode" placeholder="Postcode"  size="30" maxlength="150" />               
                </div>
                </div></div>
                
                

                <h3> VENUE SELECTION</h3>
                VENUE
                <input name="venue" type="text" readonly size="30" maxlength="150">
                <h3>EVENT DETAILS</h3>
                EVENT DATE
                <input type="text" name="date" id="datepicker1" size="20" maxlength="150"/>
                NO. OF PLAYERS (APPROXIMATE)
                <input name="players" type="text" id="players" size="15" maxlength="150" />
                NO. OF HOLES TO BE PLAYED
                <input name="holes" type="text" id="holes" size="15" maxlength="150" />
                CATERING REQUIRED
                <input name="catering" type="checkbox" id="catering" value="Yes" />
                MEETING ROOM REQUIRED
                <input name="meetingroom" type="checkbox" id="meetingroom" value="Yes" />
                BUGGY HIRE REQUIRED
                <input name="buggyhire" type="checkbox" id="buggyhire" value="Yes" />
                ADDITIONAL COMMENTS
                <textarea name="comments" cols="30" rows="4" id="comments"></textarea>
                <input type="submit" value="Submit" class="teeBookBut" alt="Submit" onClick="return checkForm();">
                Please untick this box if you DO NOT want news of golf offers &amp; prizes by email
                <input name="offers" type="checkbox" value="1" >
                
            </form>
          
          </div>   
          
          <div class="col-md-4" >
          
          	<h2> Sidebar </h2>
            
            <hr>
            
            <p> This is going to be the sidebar </p>
          
          </div>
              

</div>


@stop 