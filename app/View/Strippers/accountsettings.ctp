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
    
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('stripper_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Account Settings</h2>
					</div>
					<div class="email mt-3 p-2">
						<p>Your Email</p>
					</div>
					<div class="emailAddress mt-4">
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Email Address*:</label>
						    <div class="col-lg-8">
						      <input type="email" class="form-control text-field" id="staticEmail" value="nits.kallol@gmail.com" name="email">
						    </div>
						  </div>
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
<!--						    <div class="col-lg-8">
						      <button type="button" class="btn btn-primary btnPart">Submit</button>
						    </div>-->
						  </div>
					</div>
					
					<div class="email mt-3 p-2">
						<p>Private Information (Only for admin purpose)</p>
					</div>
					<div class="emailAddress mt-4">
                                            <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="private-info">
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Name*:</label>
						    <div class="col-lg-8">
						      <input type="text" name="actual_name" class="form-control text-field" id="staticEmail">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">DOB*:</label>
						    <div class="col-lg-8">
                                                        <input type="text" class="form-control text-field" id="staticEmail" id="actual_date" name="actual_date" placeholder="You must be 18 years or older to advertise on this site">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Email*:</label>
						    <div class="col-lg-8">
						      <input type="email" name="actual_email" class="form-control text-field" id="actual_email">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Telephone No.*:</label>
						    <div class="col-lg-8">
						      <input type="text" name="actual_number" class="form-control text-field" id="staticEmail">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Verification Status*:</label>
						    <div class="col-lg-8">
						      <button type="button" class="btn btn-primary btnPart1">Verified</button> <span class="yourProf">Your profile is verified</span>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Submit</button>
						    </div>
						  </div>
                                            </form>
					</div>
					<div class="email mt-3 p-2">
						<p>Change Password</p>
					</div>
					<div class="emailAddress mt-4">
                                            <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
						<div class="row">
							<div class="col-lg-6">
								 <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Current Password*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Current Password" name="password_old" type="password">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Confirm Password*:</label>
						    <div class="col-lg-8">
						      <input class="form-control text-field" id="staticEmail" placeholder="Re-type Password" type="password" name="password2">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Change Password</button>
						    </div>
						  </div>
							</div>
							<div class="col-lg-6">
								 <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">New Password*:</label>
						    <div class="col-lg-8">
						      <input class="form-control text-field" id="staticEmail" placeholder="New Password" type="password" name="password">
						    </div>
						  </div>
							</div>
						</div>
						 
                                            </form>  
					</div>
                                    
                                    
                                    
                                    
				</div>
			</div>
		</div>
	</section>
	
	