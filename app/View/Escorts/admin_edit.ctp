<?php
//pr($this->request->data);exit;
?>

<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Escort
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Escort',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm')); 

                echo $this->Form->input('id');
                ?>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Email Address <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          
					<?php echo $this->Form->input('email',array('label'=>false,'required'=>'required','class'=>'form-control','type'=>'email','placeholder'=>'Email Address')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Username <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <?php echo $this->Form->input('username',array('label'=>false,'class'=>'form-control','placeholder'=>'Username')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <?php echo $this->Form->input('password',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Password','id'=>'pass')); ?>
                                        </div>
                                    </div>
				    <!--<div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Confirm Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <?php echo $this->Form->input('cpassword',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Confirm Password','id'=>'cpass')); ?>
					    <span id="errorpass" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>-->
                                    
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Phone <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('phone',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'contact_no','placeholder'=>'Phone','onchange' => "javascript:number();")); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Zip Code</label>
                                        <div class="col-lg-10">
					    <?php echo $this->Form->input('zipcode',array('label'=>false,'class'=>'form-control','placeholder'=>'Zip Code')); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Country <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                        
					<?php  echo $this->Form->input('country_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$countries,'empty'=>'--Select Country--', 'onchange'=>'countrySelect(this.value)')); ?>              
                                        </div>
                                    </div>

				    <!--<div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">City <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          
					    <span id=Subcat>
						<select name="data[User][city_id]" id="cityId" class='form-control'>
						    <option value="" class="form-control">Select</option>
						</select>
					    </span>
                                        </div>
                                    </div>-->
                                    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Gender <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="data[Escort][gender]" value="M" <?php if($this->request->data['Escort']['gender']=='M') {?>checked<?php } ?>> Male
					    <input type="radio" name="data[Escort][gender]" value="F" <?php if($this->request->data['Escort']['gender']=='F') {?>checked<?php } ?>> Female
					    <span id="errorGender" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				   
				    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Set Email Verified <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="data[Escort][is_email_verified]" value="1" <?php if($this->request->data['Escort']['is_email_verified']=='1') {?>checked<?php } ?>> Yes verified
					    <input type="radio" name="data[Escort][is_email_verified]" value="0" <?php if($this->request->data['Escort']['is_email_verified']=='0') {?>checked<?php } ?>> Not Verified
					    <span id="erroremailverify" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="data[Escort][profile_status]" value="1" <?php if($this->request->data['Escort']['profile_status']=='1') {?>checked<?php } ?>> Active
					    <input type="radio" name="data[Escort][profile_status]" value="0" <?php if($this->request->data['Escort']['profile_status']=='0') {?>checked<?php } ?>> Inactive
					    <span id="errorIsActive" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                <label for="gender" class="control-label col-lg-2">Newsletter Subscription <span style="color:red;">*</span></label>
                                <div class="col-lg-10">
                                <input type="radio" name="data[Escort][subscribe_newsletter]" value="1" <?php if($this->request->data['Escort']['subscribe_newsletter']=='1') {?>checked<?php } ?>> Yes
                                <input type="radio" name="data[Escort][subscribe_newsletter]" value="0" <?php if($this->request->data['Escort']['subscribe_newsletter']=='0') {?>checked<?php } ?>> No
                                <span id="errorSubscription" style="color:red; margin-left:20%; display:none;">abc</span>
                                </div>
                                </div>

                                <div class="form-group ">
                                <label for="featured" class="control-label col-lg-2">Featured</label>
                                <div class="col-lg-10">
                                <input type="radio" name="data[Escort][is_featured]" value="1" <?php if($this->request->data['Escort']['is_featured']=='1') {?>checked<?php } ?>> Yes
                                <input type="radio" name="data[Escort][is_featured]" value="0" <?php if($this->request->data['Escort']['is_featured']=='0') {?>checked<?php } ?>> No
                               
                                </div>
                                </div>


                                <div class="form-group ">
                                <label for="featured" class="control-label col-lg-2">Escort of The Week</label>
                                <div class="col-lg-10">
                                <input type="radio" name="data[Escort][escort_of_week]" value="1" <?php if($this->request->data['Escort']['escort_of_week']=='1') {?>checked<?php } ?>> Yes
                                <input type="radio" name="data[Escort][escort_of_week]" value="0" <?php if($this->request->data['Escort']['escort_of_week']=='0') {?>checked<?php } ?>> No
                               
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
<script>
function number()
{
   var contact=$('#contact_no').val();
   if(contact<11)
   {
    alert('Enter Maximum 10 numbers')
   }
}
</script>