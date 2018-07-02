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
						<h2 class="font-weight-normal">Club Jobs</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li ><a data-toggle="tab" href="#home" class="text-uppercase active">All Jobs</a></li>
					  <li><a data-toggle="tab" href="#menu1" class="text-uppercase">Add Jobs</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
								
							<?php if(!empty($joblist)){ ?>
							<thead>
												<tr>
												<td>Sl No#</td>
												<td>Job Image</td>
												<td>Job Title</td>
												<td>Action</td>
												</tr>
												</thead>
								<tbody>
											<?php
											$count = 1;	
											foreach ($joblist as $joblistshow) {
											?>
												<tr>
													<td><?php echo $count; ?></td>
													<td><img src="<?php echo $this->webroot ?>job_images/<?php echo $joblistshow['Job']['job_image']?>" height="50px" width="50px"></td>
													<td><?php echo $joblistshow['Job']['name']; ?></td>
													<td>
													<?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletejobs', $joblistshow['Job']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
													</td>
												</tr>
												<?php 
												$count++;
												} 
												?>
											</tbody>

							<?php }else{ ?>

							 <div class="no-record" id="nomsg_show" >No job posted</div>
							<?php					
											}
											?>

							
							</table>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					    
					    <h2 class="color-gray mt-3">Add Job</h2>
                                            <form id="msg_form" method="post" action="<?php echo $this->webroot?>clubs/job_add" enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid'); ?>">
					    <div class="row form-group">
							<label class="col-lg-3 text-right">Job Title:<span>*</span></label>
							<div class="col-lg-9">
                                                            <input class="form-control text-field" type="text" name="title">
							</div>
						</div>
						<div class="row form-group">
							<label class="col-lg-3 text-right">Job Description<span>*</span></label>
							<div class="col-lg-9">
								<textarea class="form-control" name="message"></textarea>
							</div>
						</div>
						
						<div class="row form-group">
							<label class="col-lg-3 text-right">Job Image<span>*</span></label>
							<div class="col-lg-9">
								<div class="custom-file-upload">
								    
								    <input type="file" id="file"  name="img" />
								</div>
							</div>
						</div>
						
						
						
						
						<div class="row form-group">
							<label class="col-lg-3 text-right"></label>
							<div class="col-lg-9">
								<button type="submit" class="btn btn-primary">Add Job</button>
							</div>
						</div>
                                            </form>   
					  </div>
					  
					</div>
				</div>
			</div>
		</div>
	</section>
	