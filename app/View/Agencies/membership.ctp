
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="border-bottom pb-4">
						<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Upgrade Membership</h2>
					</div>
						<div class="emailAddress mt-5 pt-3">
                                                    <form action="" method="post" accept-charset="utf-8" class="" id="form1" enctype="multipart/form-data"> 
					<div class="form-group row">
					    <label for="staticEmail" class="col-lg-3 col-form-label">Choose Packages*</label>
					    <div class="col-lg-9 mt-2">
  
                                                <?php
                                                                        foreach ($plans as $plan)
                                                                        {
                                                                        ?>
                                                <p class="d-inline-block mr-4 mb-0">
                                                                            <input value="<?php echo $plan['AgentMembership']['id']; ?>" id="test<?php echo $plan['AgentMembership']['id']; ?>" name="data[Agentsubscribe][agent_membership_id]" type="radio" required="">
                                                                            <label for="test<?php echo $plan['AgentMembership']['id']; ?>"> <?php echo $plan['AgentMembership']['name']; ?></label></p>
                                                                        <?php }?>
                                                
					    </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="staticEmail" class="col-lg-3 col-form-label">Choose Mode*</label>
					    <div class="col-lg-9 mt-2">
					      <p class="d-inline-block mr-4 mb-0">
						    
                                                  <input value="weekly" id="testt" type="radio" name="data[Agentsubscribe][mode]" required="" onclick="showdiv('weekly')">
						    <label for="testt">Weekly</label>
						  </p>
						  <p class="d-inline-block mb-0">
						    
                                                    <input id="testy" value="monthly" type="radio" name="data[Agentsubscribe][mode]" required="" onclick="showdiv('monthly')">
						    <label for="testy">Monthly</label>
						  </p>
					    </div>
					  </div>
					  <div class="form-group row modediv" style=" margin-top:9px; display:none;" id="weekly_div">
					  	<label class="col-lg-3">
					  		No. of Weeks
					  	</label>
					  	<div class="col-lg-4">
					  		
                                                        <input type="text"  class="form-control text-field gui-input modetext" name="data[Agentsubscribe][no_of_weeks]"  id="weekly_text">
					  	</div>
					  </div>
                                           
                                          <div class="form-group row modediv" style=" margin-top:4px; display:none;" id="monthly_div">
					  	<label class="col-lg-3">
					  		No. of Months
					  	</label>
					  	<div class="col-lg-4">
					  		<input type="text"  class="form-control text-field gui-input modetext" name="data[Agentsubscribe][no_of_months]" id="monthly_text">
					  	</div>
					  </div>              
                                                        
                                                        
                                              
                                                        
                                                        <button type="submit" class="btn btn-primary">Submit Membership</button>
                                                    </form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<script>
    function showdiv(param)
                                                                   
    {
        $(".modediv").hide();
        $(".modetext").removeAttr("required");
       
        if(param=='weekly')
        {
            $("#weekly_div").show();
            $("#weekly_text").attr("required",true);
        }
        else
        {
            $("#monthly_div").show();
            $("#monthly_text").attr("required",true);
        }
    }
    function deletephoto(id) {

        if (confirm('Are you sure?')) {
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>escorts/deletephoto/",
                //dataType: "json",
                data: {id: id}
            }).done(function (msg) {         
                $("#image_"+id).hide();
                window.location.href = "<?php echo Router::url(array('controller' => 'escorts', 'action' => 'mypphoto')); ?>";
            });
        }
    }
   
   
   
</script>


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
</style>	