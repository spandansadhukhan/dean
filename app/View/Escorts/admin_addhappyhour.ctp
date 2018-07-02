<?php
//pr($this->request->data);exit;
?>

<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Happy Hours
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Happyhour',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm')); 

                                    echo $this->Form->input('id');
                                ?>

                                
                                <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Escort Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            
					<?php echo $this->Form->input('escort_id',array("options"=>$escort,'label'=>false,'required'=>'required','class'=>'form-control','empty'=>'Select Escort')); ?>
                                        </div>
                                    </div>
                                
                                
                                
<!--                                <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Type<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            
					<?php echo $this->Form->input('service_id',array("options"=>$service_types,'label'=>false,'required'=>'required','class'=>'form-control','empty'=>'Select Service Type')); ?>
                                        </div>
                                    </div>-->
                                
                                
                                
                                
                                
                                
                                
                                
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Service Type <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            
					<?php echo $this->Form->input('service_id',array("options"=>$service_types,'label'=>false,'required'=>'required','class'=>'form-control','empty'=>'Select Service Type')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Happy Hour Day <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                         <?php
                                         ?>
					<?php echo $this->Form->input('happy_hour_type',array('selected'=>!empty($select_days)?$select_days:"",'label'=>false,'required'=>'required','class'=>'form-control','multiple'=>'multiple','options'=>$days)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Happy Hour Start Time <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <?php echo $this->Form->input('start_time',array('required'=>'required','label'=>false,'class'=>'form-control','placeholder'=>'Happy Hour Start Time')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Happy Hour End Time <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <?php echo $this->Form->input('end_time',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Happy Hour End Time')); ?>
                                        </div>
                                    </div>
				    
                                    
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Happy Hour Rate <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('happy_hour_rate',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'contact_no','placeholder'=>'Happy Hour Rate')); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Avalability</label>
                                        <div class="col-lg-10">
					    <?php echo $this->Form->input('availibilty',array('options'=>$availabilities,'label'=>false,'class'=>'form-control','default'=>!empty($this->request->data["Happyhour"]["availibilty"])?$this->request->data["Happyhour"]["availibilty"]:'')); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Phone Number <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                        
					<?php  echo $this->Form->input('phone_number',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Phone Number')); ?>              
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Description <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Description')); ?>              
                                        </div>
                                    </div>
				   

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            
                                        </div>
                                    </div>
                                <?php //echo $this->Form->end(__('Submit')); 
					echo $this->Form->end();
				?>
                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

<script>
function number()
{
   var contact=$('#contact_no').val();
   if(contact < 11 )
   {
    alert('Enter Maximum 10 numbers')
   }
}

function countrySelect(id){
    
    $.post('<?php echo($this->webroot)?>users/countrywisecity/'+id,function(data){
			//alert(data);
			$('#Subcat').html(data);
		});
}


function check(){
    var pass = $('#pass').val();
    var cpass = $('#cpass').val();
	if(pass != cpass){
		//alert('Select Gender ');
		$('#errorpass').show();
		$('#errorpass').html('Wrong Password');
		$('#cpass').focus();
		return false;
	    }
	    if($('input[name=gender]:checked').length == 0) {
		//alert('Select Gender ');
		$('#errorGender').show();
		$('#errorGender').html('Please select any one');
		$('input[name=gender]').focus();
		return false;
	    }
	    if($('input[name=is_email_verified]:checked').length == 0) {
		//alert('Click on Email verification ');
		$('#erroremailverify').show();
		$('#erroremailverify').html('Please select any one');
		$('input[name=is_email_verified]').focus();
		return false;
	    }
	    if($('input[name=is_active]:checked').length == 0) {
		//alert('Select status ');
		$('#errorIsActive').show();
		$('#errorIsActive').html('Please select status');
		$('input[name=is_active]').focus();
		return false;
	    }
	    if($('input[name=subscribe_newsletter]:checked').length == 0) {
		//alert('Select Newsletter subscription ');
		$('#errorSubscription').show();
		$('#errorSubscription').html('Please select status');
		$('input[name=subscribe_newsletter]').focus();
		return false;
	    }
		
	}
</script>
<style>
    #HappyhourStartTimeHour
    {
        float:left !important;
        width:30% !important;
    }
    #HappyhourStartTimeMin
    {
        float:left !important;
        width:30% !important;
    }
    #HappyhourStartTimeMeridian
    {
        float:left !important;
        width:30% !important;
    }
    #HappyhourEndTimeHour
    {
        float:left !important;
        width:30% !important;
    }
    #HappyhourEndTimeMin
    {
        float:left !important;
        width:30% !important;
    }
    #HappyhourEndTimeMeridian
    {
        float:left !important;
        width:30% !important;
    }
</style>    