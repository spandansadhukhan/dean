<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<link rel="stylesheet" href="http://107.170.152.166/team2/escort/css/datepicker.css"/>
<script src="http://107.170.152.166/team2/escort/js/datepicker.js"></script>
<script type="text/javascript">
var currentyear = '2016';
var maxyear = currentyear-18;
var minyear = currentyear-60;
$(function() {
	 var dob = $('input[name^=actual_date]').val();
  $( "input[name^=actual_date]" ).datepicker(
  {
	maxDate: 0,
	changeMonth: true,
	changeYear: true,
    yearRange: minyear+':'+maxyear,
	dateFormat: "yy-mm-dd" },
  {maxDate: '0'});
  if(dob=='0000-00-00')
	{
		$("input[name^=actual_date]").attr("value",'');
	}
	else
	{
		var currentDate = dob;
		$("input[name^=actual_date]").datepicker("setDate",currentDate);
	}
});
</script>
<style>
.ui-timepicker-div .ui-widget-header, .ui-datepicker .ui-datepicker-header {
    background: none repeat scroll 0 0 #E13683;
}
.ui-datepicker:before {
    border-color: rgba(255, 255, 255, 0) rgba(255, 255, 255, 0) #E13683;
}
</style>
<script type="text/javascript">
function add_city(city_id) 
{
	var checked = $('#city_'+city_id+':checked').val();
	//alert(checked);
	var city_nam = $(".city_1 option:selected").text();
	if(city_id!='')
	{
		$('#citydiv').show('');
		$('#rm_'+city_id).hide('');
		$('#citydiv').append('<div class="fleft city-title" id="city-li-id_'+city_id+'"><input style="opacity:0;" type="checkbox" checked="checked" value="'+city_id+'" id="city_'+city_id+'" name="ban_country[]" ><label for="city_'+city_id+'" style="color:#FEFFFF;"> '+city_nam+' </label><a class="icon-remove" onclick="removeCity('+city_id+')"></a> </div>');
	}
}
function removeCity(city_id) 
{
   $('#city-li-id_'+city_id).remove();
   $('#rm_'+city_id).show('');
}
</script>
<script>
		function changeAccountStatus(type) 
		{
			var posturl=siteurl+'change-account-setting/'+type;
			$.ajax({
				url: posturl,
				dataType: 'json',
				type: "GET",
				beforeSend: function(){
					$('#wait-div').show();
					},
				success: function(data){
				$('#wait-div').hide();
					if(data.success)
					  { 
						 if(data.task=='close')
						  {
							  $('#close-account-div').hide('');
								$('#close-account-div-no').show('');
								
						  }
						  else
						  {
							 $('#close-account-div').show('');
							$('#close-account-div-no').hide('');
						  }
					  }
					},
				error: function (data) {
				alert("Server Error.");
				return false;
				}
			});
		}
</script>
<!-- For Account Close Div -------->
<script type="text/javascript">
function showDiv()
{	
  $('#close_res').slideDown('slow');
}
function hideDiv(divid)
{
  $('#close_res').slideUp('slow');
}
</script>
<script type="text/javascript">
function showDivClose()
{	
  $('#close').slideDown('slow');
}
function hideDivClose(divid)
{
  $('#close').slideUp('slow');
}
</script>
<section id="wrapper">
<section id="middle">
<section id="middle-inner">

 <section class="all-pins-do">
<div class="my-account-inner">
<div class="sb-toggle-right navbar-right">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div><!-- /.sb-control-right -->
 <div class="left-my-account-menu-m">
                                                <div class="triangleBottomRight firstItem"></div>
                                                <style>
                                                    .unreadCount {
                                                        background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                                        border-radius: 50%;
                                                        color: #620c29;
                                                        display: inline-block;
                                                        font-family: arial;
                                                        font-size: 12px;
                                                        font-weight: bold;
                                                        height: 20px;
                                                        line-height: 20px;
                                                        text-align: center;
                                                        width: 20px;
                                                        vertical-align:sub;
                                                    }
                                                </style>
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                    <?php echo $this->element('escort_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Account Setting</h1>
            
          </section>
                
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner for-setting">
 
          <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Your Email</h1>
            
          </section>
                 
          <div class="clr"></div>
          </div>
          <div class="tom1 for-setting">
              <section class="t1">
                <label for="label">Email Address: <span>*</span></label>
                <input type="text" required name="email" class="" value="nits.kallol@gmail.com" readonly style="margin:0;" > 
                                <section class="clr"></section>
              </section>
	<section class="clr"></section>
                                    </div>
                                    <br />
                                    
                                    
                                    
                                    			<div class="detail-heading" style="background: none;">
			<section class="title-left">
				<h1 style="display:inline-block;font-size: 20px;">Private Information (only for admin purpose)</h1>
			 </section>
			 <div class="clr"></div>
			</div>
			
			<div class="tom1 for-setting">
				   <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="private-info">				
				        <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="#">�</a> <span class="ajax_message">Hello Message</span> </div>                
           <br>   </div>
				<section class="t1">
					<label for="label">Real Name: <span>*</span></label>
					<input type="text" placeholder="Real Name" name="actual_name" class="" value="" style="margin:0;" > 
                    <section class="clr"></section>
				</section>
					<section class="clr"></section>
				<section class="t1">
					<label for="label">Real Dob: <span>*</span></label>
					  <input type="text" placeholder="Real Date of Birth" value="" class="gui-input" id="actual_date" name="actual_date" readonly>
                    <section class="clr"></section>
				</section>
				
				<section class="t1">
					<label for="label">Real Email: <span>*</span></label>
					<input type="text" placeholder="Real Email" name="actual_email" class="" value="" style="margin:0;" > 
                    <section class="clr"></section>
				</section>
				
				<section class="t1">
					<label for="label">Real Telephone No.: <span>*</span></label>
					<input type="text" placeholder="Real Telephone No." name="actual_number" class="" value="" style="margin:0;" > 
                    <section class="clr"></section>
				</section>
				
				<section class="t1">
					<label for="label">Verification status <span>*</span></label>
																	<a class="skil-green" target="_blank" href="#">Unverified  </a>
									<span style="color:red;">Your Profile is not verified,Because you have Not Applied. <a target="_blank" href="#"><b>Click here for verify</b></a> </span>
																  <section class="clr"></section>
				</section>
				
					<section class="clr"></section>
				<section class="t1 t1-t">
						<label for="label" class="blank">&nbsp;</label>
					<section class="tbut">
						<input type="submit" value="Submit" id="submit" name="submit" class="buttonGrey">
					</section>
                    <section class="clr"></section>
				</section>
           </form>            </div><br />

                                    
                                    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Change Password</h1>
	</section>

          <div class="clr"></div>
          </div>
        <div class="tom1  for-tour">
                                 
               <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">       <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="#">�</a> <span class="ajax_message">Hello Message</span> </div>                
           <br>   </div>
                 <section class="t1 t1-t">
                <label for="label">Current Password: <span>*</span></label>
                <input type="password" value="" id="oldpassword" name="password_old" placeholder="Current Password">
                                <section class="clr"></section>
              </section>
                <section class="t1 t1-t">
                <label for="label">New Password: <span>*</span></label>
                <input type="password" value="" id="newpassword" name="password" placeholder="New Password">
                                <section class="clr"></section>
              </section>
                <section class="t1 t1-t">
                <label for="label">Confirm Password: <span>*</span></label>
                <input type="password" value="" id="cpassword" name="password2" placeholder="Confirm Password">
                                <section class="clr"></section>
              </section>
           <div class="clr"></div>
              
              <section class="t1 t1-t">
                 <label for="label" class="blank">&nbsp;</label>
               <section class="tbut">
            <input type="submit" value="Change Password" id="button" name="button" class="buttonGrey">
          </section>
                                <section class="clr"></section>
              </section>
              </form><section class="clr"></section>
                                    </div>
                                    <br />
               
                               
                          
                                    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Newsletter Setting</h1>
            
          </section>
            
          <div class="clr"></div>
          </div>
                                    <div class="tom1  for-tour">
          <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui2">       <div class="smart-forms">
          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="#">�</a> <span class="ajax_message">Hello Message</span> </div>                
              </div>
                  
              <section class="t1 t1-t" style="width: auto; float:none;">
                <label for="label" style="width: auto;"> Subscribe/Unsubcribe Newsletter: <span>*</span></label>
             <div class="smart-wrap" style="float:left; width: 60%;">
    	<div class="smart-forms smart-container ">
        
        	<!-- end .form-header section -->
   	          <div class="section" style="margin: 5px 0 0 0">
                    
                    	<div class="option-group field">
                        
                            <label class="option">
                                <input type="radio" value="Yes" checked  name="newsletter_subscription">
                                <span class="radio"></span> Subscribe        
                            </label>
                            
                            <label class="option">
                                <input type="radio" value="No"  name="newsletter_subscription">
                                <span class="radio"></span> Unsubscribe                  
                            </label>
               
                        
                        </div><!-- end .option-group section -->
                        
                    </div><!-- end  section -->                     
   
        </div><!-- end .smart-forms section -->
    </div>
                                <section class="clr"></section>
              </section>
              <div class="clr"></div>
              
	          
              <section class="t1 t1-t">
                 <label for="label" class="blank">&nbsp;</label>
               <section class="tbut">
            <input type="submit" value="Update Changes" id="button" name="button" class="buttonGrey">
          </section>
                                <section class="clr"></section>
              </section>
              </form>              
              <section class="clr"></section>
                                    </div>
                         
				<div class="detail-heading" style="background: none;">
					<section class="title-left">
							<h1 style="display:inline-block;font-size: 20px;">Profile Status</h1>
					</section>
					<div class="clr"></div>
				</div>
				
				<div class="tom1 for-tour">
				<div class="clr"></div>
						<section class="t1 t1-t" style="width: auto; float:none;">
							<label for="label"> Account Status <span></span></label>
								<div class="smart-wrap" style="float:left;">
									<div class="smart-forms smart-container ">
										<div class="section">
										<div id="close-account-div" style="display:block;">
											<a class="skil-green" href="#">Activated </a>
											<span style="color:green;">Your profile is Activated ,searchable and listed on our website <button class="buttonGrey" style="font-size: 12px;" onclick="changeAccountStatus('close')">CLICK HERE TO DEACTIVATE  </button></span>
											 </div>
											 <div id="close-account-div-no" style="display:none;">
												 <a class="skil-green" href="#">Inactivated </a>
											<span style="color:red;">Your profile is Inactivated , not searchable and not listed on our website <button class="buttonGrey" style="font-size: 12px;" onclick="changeAccountStatus('open')">Click here to Activate  </button></span>
											</div>
										</div>
									</div>
								</div>
								<section class="clr"></section>
						</section>
					 <section class="clr"></section>
				</div>
				<hr>        

				<div class="tom1 for-tour">
				<div class="clr"></div>
            	<section class="t1 t1-t" style="width: auto; float:none;">
					<label for="label">Profile Banned Status <span></span></label>
						<div class="smart-wrap" style="float:left; width: 50%;">
							<div class="smart-forms smart-container ">
								<div class="section">
								
																		 <a class="skil-green" href="#">Not Banned </a>
									<span style="color:green;">Your profile is not banned and listed on our website </span>
																	</div>
							</div>
						</div>
						<section class="clr"></section>
				</section>
			 <section class="clr"></section>
	</div>
<hr>                                 
				<div class="tom1 for-tour">
				<div class="clr"></div>
            	<section class="t1 t1-t" style="width: auto; float:none;">
					<label for="label"> Verification Status <span></span></label>
						<div class="smart-wrap" style="float:left; width: 50%;">
							<div class="smart-forms smart-container ">
								<div class="section">
																	<a class="skil-green" target="_blank" href="#">Unverified  </a>
									<span style="color:red;">Your Profile is not verified,Because you have Not Applied.  </span>
																</div>
							</div>
						</div>
						<section class="clr"></section>
				</section>
				<div class="clr"></div>
              
             <section class="clr"></section>
	</div>
                                 
                                 
                                     
                                      <hr>
                                      <hr>
                                      <br />
                                    
                                    <div class="detail-heading" style="background: none;">
    <section class="title-left">
            <h1 style="display:inline-block;font-size: 20px;">Delete Your Account</h1>

            
          </section>
            
          <div class="clr"></div>
          </div>
                                    <div class="tom1  for-tour">
<!--
                                    <p style="margin-lefT: 10px;" class="p-no-mar">(Please Specify Reason To Delete Your Account)</p>
-->
                                   <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui3">									 <div class="smart-forms">
									  <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="#">�</a> <span class="ajax_message">Hello Message</span> </div>                
									 </div>
								  
								  <section class="t1 t1-t" style="width: auto; float:none;">
									<label for="label" style="width: auto;"> Do you want to Permanently Delete Your Account:: <span>*</span></label>
								 <div class="smart-wrap" style="float:left; width: 50%;">
							<div class="smart-forms smart-container ">
							
								<!-- end .form-header section -->
							
										<div class="section" style="margin: 5px 0 0 0">
										
											<div class="option-group field">
											
												<label class="option">
													<input type="radio" onClick="showDiv()" value="Yes"  name="account_delete_by_member">
													<span class="radio"></span> Yes        
												</label>
												
												<label class="option">
													<input type="radio" value="No" onClick="hideDiv()" checked  name="account_delete_by_member">
													<span class="radio"></span> No                  
												</label>
								   
											
											</div><!-- end .option-group section -->
											
										</div><!-- end  section -->                     
					   
							</div><!-- end .smart-forms section -->
						</div>
													<section class="clr"></section>
								  </section>
								  
									  <section class="t1-t" id="close_res" style="display:none;">
								   
									  <label>Specify Reason:</label>
									  <div class="inputContainer">
							  <div class="section">
										
												<textarea  placeholder="Delete reason message" size="50px" name="delete_reason_message" id="comment" class="gui-textarea"></textarea>
												</span>   
									
										</div>
										</div>
										</section>
						   
								  <div class="clr"></div>
								  
								  <section class="t1 t1-t">
									<label for="label" class="blank">&nbsp;</label>
								   <section class="tbut">
								<input type="submit" value="Save" id="button" name="button" class="buttonGrey">
							  </section>
								<section class="clr"></section>
								  </section>
					</form>              <section class="clr"></section>
                                    </div>
              </div><br />
                             
                        
                <div class="clr"></div>
                </div>
</div>

 <div class="clr"></div>
</div>
 <div class="clr"></div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>
</div>

<div class="col-right">
        <?php echo $this->element("user_banner");?>
    </div>
</section>
<div class="clr"></div>