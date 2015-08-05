@extends('layouts.default')

@section('content')

      <div  class="row contentpage bottom-buffer-lg" >
      
      	  <div class="col-md-12">
      
                	<h2>Membership Enquiry</h2>
                    <hr>
          
          </div>
          
          <div class="col-md-8" style="background-color:#FFFFFF;">
          
  
            
            
            
            <p>Completing this form allows you to request further information on membership at <strong>{{$club->CLUB_ADD1}}</strong>.  Simply complete  the following details and your request will be automatically submitted to your  chosen destination who will reply DIRECTLY to you by email.
            </p>
            
            
            <form name="membenq" method="post" action="#" role="form" class="validatedForm">
            
                <input type="hidden" name="recipient" value="ispygolf" />
                <input type="hidden" name="club_id" value="to add club id" />
                
                
              
               
               <div class="row">
              
                
                <div class="col-md-2">
                
                    <div class="radio">
                                <label><input type="radio" name="memberopt" id="memberopt" value="7 Day" checked />7 Day</label>
                    </div>
                
                </div>
                
                <div class="col-md-2">
                    <div class="radio">
                                <label><input type="radio" name="memberopt"  id="memberopt" value="5 Day" />5 Day</label>
                    </div>
                </div>
                
                 <div class="col-md-2">
                    <div class="radio">
                                <label><input type="radio" name="memberopt"  id="memberopt" value="Junior" />Junior</label>
                    </div>
                </div>
                
                  <div class="col-md-2">
                    <div class="radio">
                                <label><input type="radio" name="memberopt"  id="memberopt" value="Corporate" />Corporate</label>
                    </div>
                </div>
                
                </div>
                
                
                <hr>
                
 
                <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">First Name *</label>
                        <input name="firstname" class="form-control validate[required]" type="text" size="30" placeholder="First Name" maxlength="150" />
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Last Name *</label>
                        <input name="lastname" class="form-control  validate[required]" type="text"  size="30" placeholder="Last Name" maxlength="150" />
                    </div>
                </div>
                
                </div>
                <div class="row">
                	<div class="col-md-6">
                        <div class="form-group">
                        <label for="telephone">Phone No *</label>
                        <input name="telephone" class="form-control  validate[required]" type="text" placeholder="Phone No"  size="18" maxlength="150" />
                        </div>
                    </div>
                
                
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input name="email" class="form-control   validate[required]" placeholder="Email" type="text" size="30" maxlength="150" />
                    </div>
                    </div>
                </div>
                
                <div class="row">
                
                    <div class="col-md-6">
                    <div class="form-group">
                         <label for"postcode">Postcode *</label>
                        <input name="postcode" class="form-control  validate[required]" type="text" id="postcode" placeholder="Postcode"  size="30" maxlength="150" />               
                    </div>
                    </div>
                
                </div>
                
           		<hr />                
                
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
                
                <input type="submit" value="SUBMIT" class="btn btn-default" alt="Submit" onClick="return checkForm();">
                
                </div>
                
                </div>

                
            </form>
          
          </div>   
          
          <div class="col-md-4" >
    
                @if($PROF_CLUB_OFFERS==true)
                
                <h2>Latest Special Offers</h2>
                <hr>
                
                <?php $i=0; ?> 
                
               @foreach ($profoffers as $profoffer)   
               
               <?php $i++; ?>
               
					           
				<div class="col-md-12 col-centered">
                    
                   	 <div class="row">
                     
                     	 <div class="col-md-12">
                        
                       	 <img  class="img-responsive"  src="/clubimages/{{$club->IMG_IMAGE2}}"/>
                         
                         <div class="profile_overlayimg" >
                         
                         	<img src="/images/special_offer_banner.png" />
                         
                         </div>
                         
                         </div>
                        
                     </div>
                     
                     <div class="row">
                        
                     <div class="col-md-12">
                        
                        <div class="col-md-12" style="background-color:#ececec;">
                       	 
                             <div class="col-md-12">
                                
                               <p>{{ $profoffer['SPECIAL_TEXT'] }}</p>
                                
                             </div>
                                
                                
                             <div class="col-md-12 text-right">
                                 <a class="btn btn-default profile-offers-bx-btn" href="#">DETAILS </a>
                             </div>

                     	  </div>
                     
                     </div>
                     
                     </div>
                        
                    
                 </div>
                 
                 
                 

                 @endforeach      
                 
                 @endif           
                
                
                
          </div>
          
         
          
          
              

</div>


@stop 