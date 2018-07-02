<script src="<?php echo $this->webroot; ?>js/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-timepicker.min.css" type="text/css" media="screen" />
<style>
    .city-title {
    background: none repeat scroll 0 0 #fbce37;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    color: #0f0f0f;
    padding: 5px 5px 5px;
    float: left;
}
.icon-remove {
    background: url("../../images/btn_remove_city.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    cursor: pointer;
    display: inline-block;
    height: 13px;
    margin: 0 0 0px 8px;
    width: 12px;
}
</style>
<script>
$(document).ready(function(){
    
$('.timepicker1').timepicker();

});
</script>

	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('club_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Set Happy Hours</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">My Happy Hours Rate</a></li>
					  <li><a data-toggle="tab" href="#menu1">Post Happy Hours</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					      <table class="table table-hover">
                                            			<tr>
                                                            <th>ID#</th>
                                            				<th>Service Type:</th>
                                            				<th>Happy Hour Type:</th>
                                            				<th>Happy Hour Amount:</th>
                                            				<th>Description:</th>
                                            				<th>Start Time:</th>
                                            				<th>End Time:</th>

                                                            <!-- <th>Option</th> -->
                                            			</tr>
                                                        <?php 
                                                               $cnt = 1;
                                                               //pr($allahppyhoursdata); exit;
                                                               foreach($allahppyhoursdata as $happyhourdata) {
                                                                    
                                                        ?>
                                            			<tr>
                                            				<td><?php echo $cnt; ?></td>
                                            				<td><?php echo $happyhourdata['Happyhour']['service_id']; ?></td>
                                            				<td><?php echo $this->requestAction('/escorts/dayname/'.$happyhourdata['Happyhour']['happy_hour_type']); ?></td>
                                            				<td><?php echo $happyhourdata['Happyhour']['happy_hour_rate']; ?></td>
                                            				<td><?php echo substr($happyhourdata['Happyhour']['description'],0,50); ?></td>
                                            				<td><?php echo date("h:i a",strtotime($happyhourdata['Happyhour']['start_time'])); ?></td>
                                            				<td><?php echo date("h:i a",strtotime($happyhourdata['Happyhour']['end_time'])); ?></td>
                                                           <!--  <td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletehappyhours', $happyhourdata['Happyhour']['id']), null, __('Are you sure you want to delete # %s?', $happyhourdata['Happyhour']['id'])); ?></td> -->
                                            			</tr>
                                                        <?php 
                                                            $cnt++;
                                                    } ?>
                                            		</table>
                                              <?php //echo $user_id?>
					  </div>
					  <div id="menu1" class="tab-pane fade">
					     <form name="set_happy_hours" method="POST" action="<?php echo $this->webroot ?>clubs/set_happy_hours/<?php echo base64_encode($user_id);?>">
                                                        
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    
					    <h3>Information</h3>
					    <div class="emailAddress mt-4">
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">Service Type*:</label>
                                                    <div class="col-lg-8">
                                                       
                                                            <select name="service_id" class="form-control" required>
																        <option value="">Select Service Type</option>
                                                                        <option value="30min_incall">30 Min Incall</option>
                                                                        <option value="30min_outcall">30 Min Outcall</option>
                                                                        <option value="1hr_incall">1 Hr Incall</option>
                                                                        <option value="1hr_outcall">1 Hr Outcall</option>
                                                                        <option value="2hr_incall">2 Hr Incall</option>
                                                                        <option value="2hr_outcall">2 Hr Outcall</option>
                                                                        <option value="3hr_incall">3 Hr Incall</option>
                                                                        <option value="3hr_outcall">3 Hr Outcall</option>
                                                                        <option value="addhr_incall">Add Hour Incall</option>
                                                                        <option value="addhr_outcall">Add Hour Outcall</option>
                                                                        <option value="night_incall">Night Incall</option>
                                                                        <option value="night_outcall">Night Outcall</option>
                                                                        <option value="1day_incall">1 Day Incall</option>
                                                                        <option value="1day_outcall">1 Day Outcall</option>
                                                                        <option value="2day_incall">2 Day Incall</option>
                                                                        <option value="2day_outcall">2 Day Outcall</option>
                                                                        <option value="weekend_incall">Weekend Incall</option>
                                                                        <option value="weekend_outcall">Weekend Outcall</option>
																</select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">Happy Hour Day:</label>
                                                    <div class="col-lg-8">
                                                        <select  id="happy_hour_type" class="form-control">
                                                                                    <option value="">Select Day</option>
                                                                                    <?php
                                                                                    foreach($days as $key=> $day)
                                                                                    {
                                                                                    ?>
                                                                                    <option value='<?php echo $key;?>' id="typeopt<?php echo $key;?>"><?php echo $day;?></option>
                                                                                    <?php }?>
    																  
										</select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                	<div class="col-lg-4"></div>
                                                	<div class="col-lg-8">
                                                		<div  class="form-profile-block">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="typeInput">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                                	</div>
                                                </div>
                                               
					
						
						
						<div class="emailAddress mt-4">
						
						  
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Happy Hour Start Time:</label>
						    <div class="col-lg-8">
                                                        <input  class="form-control text-field timepicker1" type="text" name="start_time">
<!--                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>-->
						    </div>
						  </div>
                                                    
                                                    
                                                    <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Happy Hour End Time:</label>
						    <div class="col-lg-8">
                                                        <input  class="form-control text-field input-small timepicker1" type="text" name="end_time">
<!--                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>-->
						    </div>
						  </div>
                                                    
                                                    <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Happy Hour Rate:</label>
						    <div class="col-lg-8">
                                                        <input type="text" name="happy_hour_rate" class="form-control text-field" required>
						    </div>
						  </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                    <label for="staticEmail" class="col-lg-4 col-form-label">Avalability:</label>
                                                    <div class="col-lg-8">
                                                        <select name="availibilty" class="form-control" required>
                                                                  <option value="">Select Availibilty</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                                </select>
                                                    </div>
                                                </div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Phone No*:</label>
						    <div class="col-lg-8">
                                                        <input class="form-control text-field" id="staticEmail" placeholder="Phone Instructions" type="text" name="phone_number" required="">
						    </div>
						  </div>
                                                    
                                                  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Description:</label>
						    <div class="col-lg-8">
                                                        <textarea rows="5" class="form-control" cols="150" name="description"></textarea>
						    </div>
						  </div>  
						    
						  
						  
					
                                                    <button type="submit" class="btn btn-primary">Submit</button>
					</div>
					 
                                                    </form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->

<script>
$(document).ready(function(){

    $("#happy_hour_type").click(function(){
    
        var txt= $("#happy_hour_type option:selected").text();
        var txtval= $("#happy_hour_type option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='happy_hour_type[]' value="+txtval+"><label for='service10' style='color:#000;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletetype("+txtval+")'></a></div>";
        $("#typeInput").append(html);
        $("#typeopt"+txtval).hide();
        $('#happy_hour_type option[value=""]').prop('selected');

    });

});
function deletetype(cat)
{
  $("#typeopt"+cat).show();

}
</script>
<style>
input[type="text"]
{
  height:35px !important;
}


</style>	