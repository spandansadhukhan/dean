<script type="text/javascript">
$(function() {
	// var start_date = $('input[name^=start_date]').val();
  $( "input[name^=event_date]" ).datepicker(
  {
	minDate: 0,
	changeMonth: true,
	changeYear: true,
	dateFormat: "yy/mm/dd" },
	{maxDate: '0'});
});
</script>
<script type="text/javascript">
var task		=	'Add';

$(document).ready(function() {
	$(document).on("click", ".z-tabs-nav li#tab2", function (event) {
		if(task == 'Add')
		{
			setTimeout(function(){ initialize(); }, 300);
		}
	});
});
function deleteAd(id)
{
	BootstrapDialog.confirm('Are you sure to delete this event?', function(result){
	if (result)
	{
		var siteurl="#";
		var posturl=siteurl+'manage-event/doTask/Delete/'+id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success_message)
		  {
				$("#add_"+id).hide('slow').remove();
				 $("#success").show('slow');
				 $("#success").html(data.success_message);
				$("#success").fadeOut('slow');
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	}
	});
	return false;

}

function activeInactive(task,id)
{
	BootstrapDialog.confirm('Are you sure to '+task+' this event?', function(result){
	if (result)
	{
		var siteurl="#";
		var posturl=siteurl+'manage-event/doTask/'+task+'/'+id;
		$.ajax({
		url: posturl,
		dataType: 'json',
		type: "GET",
		beforeSend: function(){
				 $('#wait-div').show();
				},
	  success: function(data){
	  $('#wait-div').hide();
		 if(data.success_message)
		  {
				$("#class_"+id).removeClass('fa fa-times').removeClass('fa fa-check-square');

				$("#success").show('slow');
				$("#success").html(data.success_message);
				$("#success").fadeOut('slow');
				if(task=='Active')
				{
					$("#status_"+id).attr('onclick',"activeInactive('Inactive',"+id+")");
					$("#status_"+id).attr('data-tool',"Inactive");
					$("#class_"+id).addClass('fa fa-times');
				}
				else
				{
					$("#status_"+id).attr('onclick',"activeInactive('Active',"+id+")");
					$("#status_"+id).attr('data-tool',"Active");
					$("#class_"+id).addClass('fa fa-check-square');
				}
		  }
	  },
	  error: function (data) {
		 alert("Server Error.");
		 return false;
	  }
	});

	}
	});
	return false;

}

</script>
    
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('club_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Mange Events</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li ><a data-toggle="tab" href="#home" class="text-uppercase active">Manage Events</a></li>
					  <li><a data-toggle="tab" href="#menu1" class="text-uppercase">Add Events</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
						    <thead>
						      <tr>
                                                            <th>Location</th>
                                                            <th>From Date</th>
                                                            <th>To Date</th>
                                                            <th>Phone Number</th>
                                                            <th>Option</th>
                                                            </tr>
						    </thead>
						    <tbody>
						      <tr id="no-record">
									   <td class="no-record" colspan="7">No Record Found</td>
									 </tr>
						      
						      
						    </tbody>
						  </table>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					    
					    <h2 class="color-gray mt-3">Add Event</h2>
                                            
                                            <form action="<?php echo $this->webroot?>clubs/add_event" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid');?>">
                                            
                                            
					    <div class="row form-group">
							<label class="col-lg-3 text-right">Event Title:<span>*</span></label>
							<div class="col-lg-9">
                                                            <input class="form-control text-field" type="text" name="name">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-lg-3 text-right">Event Description<span>*</span></label>
							<div class="col-lg-9">
								<textarea class="form-control" name="contaent"></textarea>
							</div>
						</div>
						
						<div class="row form-group">
							<label class="col-lg-3 text-right">Event Image<span>*</span></label>
							<div class="col-lg-9">
								<div class="custom-file-upload">
								    <!--<label for="file">File: </label>--> 
								    <input type="file" id="file" name="img" multiple />
								</div>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-lg-3 text-right">Event Venue<span>*</span></label>
							<div class="col-lg-9">
								<input class="form-control text-field" type="text" name="venue">
								<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25263534.825478062!2d157.29145040576293!3d-39.3805157065144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d2c200e17779687%3A0xb1d618e2756a4733!2sNew+Zealand!5e0!3m2!1sen!2sin!4v1513238141106" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen class="mt-3"></iframe>-->
							</div>
						</div>
						
						
						
						<div class="row form-group">
							<label class="col-lg-3 text-right">Event Date<span>*</span></label>
							<div class="col-lg-9">
                                                            <input class="form-control text-field" type="text" name="event_date">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-lg-3 text-right"></label>
							<div class="col-lg-9">
                                                            <button type="submit" class="btn btn-primary">Add Event</button>
							</div>
						</div>
                                        
                                            </form>
					  </div>
					  
					</div>
				</div>
			</div>
		</div>
	</section>
	