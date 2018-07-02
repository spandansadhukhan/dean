<section id="contentsection">
	
    <div id="wait-div" class="wait-div">
        
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <div class="clr"></div>
                            <section id="middle">
                            	
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="my-account-inner"><div class="sb-toggle-right navbar-right">
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                            </div>
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
                                            	<section>
										           <h1>Set happy hour</h1>
										        </section>
                                            	<div class="right-div">
                                                    <form name="set_happy_hours" method="POST" action="<?php echo $this->webroot ?>escorts/set_happy_hours">
                                                        <input type="hidden" name="escort_id" value="<?php echo $this->Session->read('fuid') ?>">
                                            		<!-- <table width="60%" class="servicetype"> -->
                                                    <table class="table servicetype">
                                            			<tr>
                                            				<td class="escortservice">Service Type:</td>
                                            				<td>
                                            					<select name="service_id" required>
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
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td class="escortservice">Happy Hour Day:</td>
                                            				<td>
                                            					 <select  id="happy_hour_type">
                                                                                    <option value="">Select Day</option>
                                                                                    <?php
                                                                                    foreach($days as $key=> $day)
                                                                                    {
                                                                                    ?>
                                                                                    <option value='<?php echo $key;?>' id="typeopt<?php echo $key;?>"><?php echo $day;?></option>
                                                                                    <?php }?>
    																  
										</select> 
                                            				</td>
                                            			</tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <div  class="form-profile-block">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="typeInput">
                                                                            
                                                                                                                                                        
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                            				<td class="escortservice">Happy Hour Start Time:</td>
                                            				<td>
                                            					<div class="input-group bootstrap-timepicker timepicker">
                                                                                <input  class="form-control timepicker1" type="text" name="start_time"><span class="input-group-addon">
                                                                                <i class="glyphicon glyphicon-time"></i></span>
                                                                                </div> 
                                            				</td>
                                            			</tr>
                                                                <tr>
                                            				<td class="escortservice">Happy Hour End Time:</td>
                                            				<td>
                                            					<div class="input-group bootstrap-timepicker timepicker">
                                                                                <input  class="form-control input-small timepicker1" type="text" name="end_time"><span class="input-group-addon">
                                                                                <i class="glyphicon glyphicon-time"></i></span>
                                                                                </div> 
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td class="escortservice">Happy Hour Rate:</td>
                                            				<td>
                                            					<input type="text" name="happy_hour_rate" class="textbox" required>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td class="escortservice">Avalability:</td>
                                            				<td>
                                            					<select name="availibilty" required>
                                                                  <option value="">Select Availibilty</option>
                                                                  <option value="1">Yes</option>
                                                                  <option value="0">No</option>
                                                                </select> 
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td class="escortservice">Phone Number:</td>
                                            				<td>
                                            					<input type="text" name="phone_number" class="textbox" required>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td class="escortservice">Description:</td>
                                            				<td>
                                            					<textarea rows="5" cols="150" name="description"></textarea>
                                            				</td>
                                            			</tr>
                                            			
                                            			<tr>
                                            				<td class="escortservice"></td>
                                            				<td>
                                            					<button type="submit" class="submit-button" name="submit"> Submit </button>
                                            				</td>
                                            			</tr>
                                            		</table>
                                                    </form>

                                                    <h3>My happy Hours rate</h3>
                                            		<!-- <table width="100%" class="happyhourday"> -->
                                                    <table class="table happyhourday">
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
                                            	</div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <div class="clr"></div>
                    </section>
                </section>
            </section>
        </section>
    </div>
    <div class="col-right">
     <?php echo $this->element('user_banner');?>   
    </div>
</section>
<div class="clr"></div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo $this->webroot; ?>js/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-timepicker.min.css" type="text/css" media="screen" />
<script>
$(document).ready(function(){
$('.timepicker1').timepicker();
    $("#happy_hour_type").change(function(){
        var txt= $("#happy_hour_type option:selected").text();
        var txtval= $("#happy_hour_type option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='happy_hour_type[]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletetype("+txtval+")'></a></div>";
        $("#typeInput").append(html);
        $("#typeopt"+txtval).hide();
        $('#happy_hour_type option[value=""]').prop('selected', true);

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