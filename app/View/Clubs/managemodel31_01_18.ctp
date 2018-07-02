<?php
//pr($membershipall); exit;
?>
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
$( ".datepicker" ).datepicker({

	changeMonth: true,
	changeYear: true,
	yearRange: minyear+':'+maxyear,
	dateFormat: "yy-mm-dd"
});
});


</script>
<style>
.form-profile-block .inputContainer {
    width: 85% !important;
}

.ui-timepicker-div .ui-widget-header, .ui-datepicker .ui-datepicker-header {
    background: none repeat scroll 0 0 #E13683;
}
.ui-datepicker:before {
    border-color: rgba(255, 255, 255, 0) rgba(255, 255, 255, 0) #E13683;
}

</style>
<section id="wrapper">
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
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('club_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Manage Models</h1>

          </section>

          <div class="clr"></div>
          </div>

        <link href="http://107.170.152.166/team2/escort/css/new-tab.css" rel="stylesheet" type="text/css" />
          <div class="right-my-account-blocks-inner">

            <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
   <div class="f-content container autoplay">

                <div id="tabbed-nav" data-options='{"deeplinking": true, "multiline": true,"defaultTab": "tab1",
				"shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideH", "duration": 500,
				"type": "jquery", "easing": "easeOutQuint"}, "position": "top-left"}' class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
				z-tabs horizontal top top-left silver" data-role="z-tabs" data-style="normal" data-orientation="horizontal"
				data-theme="silver" >

				<ul class="z-tabs-nav z-tabs-mobile" style="display: none;">
				<li><a style="text-align: left;" class="z-link">
                <span class="z-title">Inbox</span><span class="z-arrow"></span></a></li></ul>
                <i class="z-dropdown-arrow"></i>
                <ul class="z-tabs-nav z-tabs-desktop">
					<li data-link="tab1" id="tab1" class="z-tab"><a class="z-link">Manage Models</a></li>
					<li data-link="tab2" id="tab2" class="z-tab"><a class="z-link">Add Model</a></li>
				</ul>

<div class="h-content2 z-container" style="min-height: 442px;">
    <div class="z-content"><div class="z-content-inner">
                 <div class="table-responsive for-msg">
                            <table class="table table-vcenter table-striped">
                            <thead>
	                            <th>Sl No.</th>	
	                            <th>Image</th>
	                            <th>Name</th>
                                    <th>Email</th>
	                            <th>Age</th>
<!--	                            <th>Gender</th>
	                            <th>Eye Color</th>
	                            <th>Hair Color</th>-->
	                            <th class="text-center">Option</th>
                            </thead>
                                <tbody>
                                	<?php 
                                		$count = 1;
                                		
                                		if(!empty($membershipall)){
                                                foreach ($membershipall as $showmodel) { ?>
                                		<tr>
                                			<td><?php echo $count;?></td>
                                			<td><?php if($showmodel['User']['profile_image'] != ''){?> <img src="<?php echo $this->webroot?>user_images/<?php echo $showmodel['User']['profile_image']?>" height="50px" width="50px"/><?php }else{ ?>
                                			<img src="<?php echo $this->webroot?>noimage.png" height="50px" width="50px"/>	

                                			<?php } ?></td>
                                			<td><?php echo $showmodel['User']['name']; ?></td>
                                			<td><?php echo $showmodel['User']['email']; ?></td>
                                			<td><?php 
                                						$age = date('Y-m-d') - $showmodel['User']['birthday']; 

                                						echo $age;
                                		         ?></td>
<!--                                			<td><?php echo $showmodel['User']['gender']; ?></td>
                                			<td><?php echo $showmodel['Eyecolor']['color_name']; ?></td>
                                			<td><?php echo $showmodel['Haircolor']['color_name']; ?></td>-->
                                			<td>
                                                            <div style="width:208px; text-align:center;">
                                                                <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showmodel['User']['id']); ?>" class="btn btn-primary" target="_blank">View</a>
                                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletemodel', $showmodel['User']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                                                            </div>
                                                            
                        </td>
                                		</tr>
                                				
                                	<?php		
                                			$count++;
                                		}
                                	}else{
                                	?>
                                		<tr style=""><td colspan="6"><section class="no-record"> You have not added any model.</section></td></tr>
                                	<?php	
                                	}
                                	?>
                                	
                                </tbody>
                                <!-- <tfoot>
									<tr style=""><td colspan="6"><section class="no-record"> You have not added any model.</section></td></tr>
								</tfoot> -->
                            </table>
                        </div>
    </div></div>
    <div class="z-content"><div class="z-content-inner">

	<div class="profie-bl">
          <div class="profie-bl4-inner">

          <div class="form-profile">
          <div class="smart-wrap">
    	<div class="smart-forms smart-container">

             <form action="<?php echo $this->webroot ?>clubs/addescort" method="post" accept-charset="utf-8" class="ajaxform" id="add-model" enctype="multipart/form-data">     	

          <div class="form-profile-block">
          <label class="pl">Name:</label>
          <div class="inputContainer">
			<div class="section">
				<label class="field">
					<input type="text" placeholder="Working Name" value="" class="gui-input" id="from" name="data[User][name]" style="width:100%" required>
				</label>
			</div>
          </div>
          </div>

          <div class="form-profile-block">
          <label class="pl">Bio:</label><div class="inputContainer">
			<div class="section">
				<label class="field prepend-icon">
                                    <textarea placeholder="Escort Description" name="data[User][about]" id="introduction" class="gui-textarea" maxLength="1000" required=""></textarea>
					<label class="field-icon" for="introduction"><i class="fa fa-comments"></i></label>
					<span class="input-hint">
						<strong>Hint:</strong> Don't be negative or off topic! just be awesome...
					</span>
				</label>
				</div>
		  </div>
          </div>

          <div class="form-profile-block" style="margin-bottom: 14px;">
          <label class="pl">Gender: </label>
          <div class="inputContainer">
          <div class="section" style="margin: 0;">

                    	<div class="option-group field">

                            <label class="option">
                                <input type="radio"  value="M" name="data[User][gender]">
                                <span class="radio"></span> Male                            </label>

                            <label class="option">
                                <input type="radio"  value="F" name="data[User][gender]" checked="">
                                <span class="radio"></span> Female                            </label>
                            <label class="option">
                                <input type="radio"  value="T"  name="data[User][gender]">
                                <span class="radio"></span> Trans                            </label>

                        </div><!-- end .option-group section -->
                    </div>
          </div>
          </div>

<!--          <div class="form-profile-block">
          <label class="pl">Date of Birth:</label>
          <div class="inputContainer">
			<div class="section">
				<label class="field prepend-icon">
					<input type="text" placeholder="Date of Birth" value="" class="gui-input datepicker" id="dob" name="data[User][birthday]" readonly style="width:100%;background: #181818 none repeat scroll 0 0; color:#34495e;">
					<label class="field-icon" for="dob"><i class="fa fa-calendar"></i></label>
				</label>
			</div>
          </div>
          </div>-->
          <div class="form-profile-block">
          <label class="pl">Email:</label>
          <div class="inputContainer">
			<div class="section">
				<label class="field">
                                    <input type="text" placeholder="Age" value="" class="gui-input" id="from" name="data[User][age]" style="width:100%" required>
				</label>
			</div>
          </div>
          </div>
           <div class="form-profile-block">
          <label class="pl">Email:</label>
          <div class="inputContainer">
			<div class="section">
				<label class="field">
					<input type="email" placeholder="Email" value="" class="gui-input" id="from" name="data[User][email]" style="width:100%" required>
				</label>
			</div>
          </div>
          </div>
                 
         <div class="form-profile-block">
          <label class="pl">Password:</label>
          <div class="inputContainer">
			<div class="section">
				<label class="field">
                                    <input type="password" placeholder="Password" value="" class="gui-input" id="from" name="data[User][password]" style="width:100%" required>
				</label>
			</div>
          </div>
          </div>      
                 
          <div class="form-profile-block">
          <label class="pl">Ethnicity:</label>
          <div class="inputContainer">
          <div class="section">
            <label class="field select">
                <select id="ethnicity" class="inputtext " name="data[User][nationality_id]" style="width:100%" required="">
                     <option value="">Select Ethnicity</option>
                     <?php
                     foreach ($nationalities as $key =>$value )
                     {
                     ?>
                     <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                     <?php } ?>

                    </select>
                    <i class="arrow double"></i>
            </label>
	</div>
          </div>
          </div>

          <div class="form-profile-block">
          <label class="pl">Experience :</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="data[User][note]" class="inputtext " id="experience" style="width:100%">
                              <option value=""> Select Experience </option>
                              <option value="None" >New/Just Starting</option>
                              <option value="Some Experience" >Some Experience</option>
                              <option value="Very Experienced" >Very Experienced</option>
                            </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>

<!--          <div class="form-profile-block"  style="margin-bottom: 14px;">
          <label class="pl">Language Known :</label>
          <div class="inputContainer">
			<div class="section" style="margin: 0;">
				<div class="option-group field">
																<label class="option" style="width:32%;" >
							<input type="checkbox" value="1" name="languages[]" >
							<span class="checkbox"></span> Portugues						</label>
											<label class="option" style="width:32%;" >
							<input type="checkbox" value="2" name="languages[]" >
							<span class="checkbox"></span> Italiano						</label>
					

				</div> end .option-group section 

			</div>
          </div>
          </div>-->
          <div class="form-profile-block">
          <label class="pl">Service Type: </label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field">
                                <select name="data[User][availability_id]" class="inputtext " multiple="" style="width:100%;height:70px;" required="">
                                    <option value="">Select Service Type</option>    
                                    <?php
                                    foreach ($availabilities as $key =>$value)
                                    {
                                    ?>
                                    <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                    <?php }?>
                            </select>
<!--                                <i class="arrow double"></i>-->
                            </label>
              <div class="clearfix"></div>
                        </div>
          </div>
          </div>       
          <div class="form-profile-block">
          <label class="pl">Service: </label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field">
                                <select name="data[User][service_id]" class="inputtext " multiple="" style="width:100%;height:70px;" required="">
                                    <option value="">Select Service</option>    
                                    <?php
                                    foreach ($services as $key =>$value)
                                    {
                                    ?>
                                    <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                    <?php }?>
                            </select>
<!--                                <i class="arrow double"></i>-->
                            </label>
              <div class="clearfix"></div>
                        </div>
          </div>
          </div>

          <div class="form-profile-block">
          <label class="pl">Height:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="data[User][height]" class="inputtext"  id="height" style="width:100%" required="">
                                <option value=""> Select Height </option>
                                <?php
                                foreach ($heights as $key =>$height)
                                {
                                ?>
                                <option value="<?php echo $key ?>"><?php echo $height; ?></option>
                                <?php }?>
								                            
                              </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>

          <div class="form-profile-block">
          <label class="pl">Weight:</label>
          <div class="inputContainer">
          <div class="section">
          <label class="field">
		<input placeholder="Weight" value=""  name="data[User][weight]" style="width:100%" required="" type="text">
          </label>                  
          </div>
          </div>
          </div>
          <div class="form-profile-block">
          <label class="pl">Body Type:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="data[User][bodytype_id]" class="inputtext " id="body_type" style="width:100%" required="">
                                <option value=""> Select Body Type </option>
                                <?php
                                foreach ($bodytypes as $key=>$bodytype)
                                {
                                ?>
                                <option value="<?php echo $key ?>"><?php echo $bodytype; ?></option>
                                <?php }?>
                                                            
                             </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>
          <div class="form-profile-block">
          <label class="pl">Bust Size:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select id="bust" class="inputtext" name="data[User][bust_size]" style="width:100%" required="">
                                    <option value=""> Select Bust Size </option>
                                    <?php
                                    foreach($busts as $bust)
                                    {
                                    ?>
                                    <option value="<?php echo $bust?>"><?php echo $bust; ?></option>
                                    <?php } ?>
                             </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>
          <div class="form-profile-block">
          <label class="pl">Eye Color:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="data[User][eyecolor_id]" class="inputtext" id="eye_color_id" style="width:100%" required="">
                                <option value=""> Select Eye Color </option> 
                                <?php
                                foreach ($eyecolors as $key=>$eyecolor)
                                {
                                ?>
                                <option value="<?php echo $key?>"><?php echo $eyecolor?></option>
                                <?php }?>
                                </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>
          <div class="form-profile-block">
          <label class="pl">Hair Color:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="data[User][haircolor_id]" class="inputtext" id="hair_color_id" style="width:100%" required="">
                                <option value=""> Select Hair Color </option>
                                <?php
                                foreach ($haircolors as $key=> $haircolor)
                                {
                                ?>
                                <option value="<?php echo $key?>"><?php echo $haircolor?></option>
                                <?php }?>
                               </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>
<!--          <div class="form-profile-block">
          <label class="pl">Cup Size:</label>
          <div class="inputContainer">
          <div class="section">
                            <label class="field select">
                                <select name="cup_size" class="inputtext" id="cup_size" style="width:100%">
                              		<option value=""> Select Cup Size </option>
                              		<option value="30B">30B</option>
                              		<option value="30A">30A</option>
                              		<option value="30C">30C</option>
                              		<option value="30D">30D</option>
                              		<option value="34A">34A</option>
                              		<option value="34B">34B</option>
                              		<option value="34C">34C</option>
                              		<option value="34D">34D</option>
                              		<option value="35A">35A</option>
                               </select>
                                <i class="arrow double"></i>
                            </label>
                        </div>
          </div>
          </div>-->

<!--			<div class="form-profile-block">
				<label class="pl">Model Photo:</label>
					<div class="inputContainer">
						<div class="section" style="margin:0;">
							<label class="field prepend-icon file">
							 <span class="button"> Choose File </span> 
							<input type="file" name="profile_img">
							
							</label>
						</div> end  section 

					</div>
			</div>-->
                        <section class="fileUpload buttonGrey">
                        <span>Add Escort Photos</span>
                        <input type="file" name="data[User][profile_img]" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="upload" />
                    </section>

                    <section>
                        <img id="blah" alt="" style=" border: 1px " width="100" height="100" />
                    </section>

          <div class="form-profile-block">
          <label class="pl">&nbsp;</label>
          <div class="inputContainer">
          <input type="submit" class="buttonGrey" name="button" id="button" value="Add Escort" style=" width: auto !important;">
                    </div>
          </div>

          </form>          
      </div>
  </div>
          </div>
          </div>

    </div></div>

</div></div>


           </div>
</section>

         <script src="http://107.170.152.166/team2/escort/js/new-tab2.js"></script>

                  <script src="http://107.170.152.166/team2/escort/js/new.js"></script>
                <div class="clr"></div>
                </div>
</div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">

 </div>-->
</section>
</section>
</section>
</div>

<div class="col-right">
<?php echo $this->element('user_banner');?>     
</div>
</section>
<div class="clr"></div>
<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .table-striped thead th { color:#000;}
    .table-striped  td { color:#000;}
</style>