<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add User
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm','onsubmit'=>'return check()')); ?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <!--<input class=" form-control" id="firstname" name="firstname" type="text" />-->
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                                        </div>
                                    </div>
				
                                    <!--<div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-2">Lastname</label>
                                        <div class="col-lg-10">
                                           <?php //echo $this->Form->input('last_name',array('required'=>'required','class'=>'form-control','label'=>false)); ?>
                                        </div>
                                    </div>-->
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Email Address <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php echo $this->Form->input('email',array('label'=>false,'required'=>'required','class'=>'form-control','type'=>'email','placeholder'=>'Email Address')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Username <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <!--<input class="form-control " id="username" name="username" type="text" />-->
					    <?php echo $this->Form->input('username',array('label'=>false,'class'=>'form-control','placeholder'=>'Username')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                           <!-- <input class="form-control " id="password" name="password" type="password" />-->
					<?php echo $this->Form->input('password',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Password','id'=>'pass')); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Confirm Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                           <!-- <input class="form-control " id="password" name="password" type="password" />-->
					<?php echo $this->Form->input('cpassword',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Confirm Password','id'=>'cpass')); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Phone <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('phone_no',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'contact_no','placeholder'=>'Phone','onchange' => "javascript:number();")); ?>
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
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php  echo $this->Form->input('country_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$countries,'empty'=>'--Select Country--', 'onchange'=>'countrySelect(this.value)')); ?>              
                                        </div>
                                    </div>

				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">City <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php // echo $this->Form->input('city_id',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
					    <span id=Subcat>
						<select name="data[User][city_id]" id="cityId" class='form-control'>
						    <option value="" class="form-control">Select</option>
						</select>
					    </span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Gender <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="gender" value="M"> Male
					    <input type="radio" name="gender" value="F"> Female
					    <span id="errorGender" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				    <?php 
					//$options = array('M'=>'Male','F'=>'Female');
					//echo $this->Form->input('gender',array('label'=>false,'required'=>'required','options'=>$options,'type'=>'radio')); ?>
				    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Set Email Verified <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="is_email_verified" value="Y"> Yes verified
					    <input type="radio" name="is_email_verified" value="N"> Not Verified
					    <span id="erroremailverify" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="is_active" value="1"> Active
					    <input type="radio" name="is_active" value="0"> Inactive
					    <span id="errorIsActive" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="gender" class="control-label col-lg-2">Newsletter Subscription <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <input type="radio" name="subscribe_newsletter" value="1"> Yes
					    <input type="radio" name="subscribe_newsletter" value="0"> No
					     <span id="errorSubscription" style="color:red; margin-left:20%; display:none;">abc</span>
                                        </div>
                                    </div>
				    <!-- <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">State</label>
                                        <div class="col-lg-10">
                                         
					<?php // echo $this->Form->input('state_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$states,'empty'=>'--Select State--')); ?>
               
                                        </div>
                                    </div>-->
				    <!--
			   	    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Height</label>
                                        <div class="col-lg-10">
                                          
					<?php // echo $this->Form->input('height',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Hair Color</label>
                                        <div class="col-lg-10">
                                          
					<?php // echo $this->Form->input('haircolor_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$haircolors,'empty'=>'--Select Hair Color--')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Eye Color</label>
                                        <div class="col-lg-10">
                                         
					<?php // echo $this->Form->input('eyecolor_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$eyecolors,'empty'=>'--Select Eye Color--')); ?>
               
                                        </div>
                                    </div>

                                  

                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Body Type</label>
                                        <div class="col-lg-10">
                                          
					<?php // echo $this->Form->input('bodytype_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$bodytypes,'empty'=>'--Select Body Type--')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Escort Type</label>
                                        <div class="col-lg-10">
                                         
				    <?php // echo $this->Form->input('escorttype_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$escorttypes,'empty'=>'--Select Escort Type--')); ?>
               
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Social Escort</label>
                                        <div class="col-lg-10">
					<?php 
					//$options = array('Y'=>'Yes','N'=>'No');
					//echo $this->Form->input('social_escort',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$options,'empty'=>'--Select--')); 
					?>
                                        </div>
                                    </div>
					-->
				    
				 <!--  <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Profile Image</label>
                                        <div class="col-lg-10">
                                       
					<?php // echo $this->Form->input('profile_image',array('type'=>'file','label'=>false,'class'=>'form-control')); ?>
               
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="agree" class="control-label col-lg-2 col-sm-3">Status</label>
                                        <div class="col-lg-10 col-sm-9">
                                           
					<?php //echo $this->Form->input('is_active',array('label'=>false)); ?>
		
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Is Admin</label>
                                        <div class="col-lg-10 col-sm-9">
                                         
					<?php //echo $this->Form->input('is_admin',array('label'=>false)); ?>
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                <?php //echo $this->Form->end(__('Submit')); 
					echo $this->Form->end();
				?>
                            </div>
                                    </div>
                                <!--</form>-->
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
		alert('Select Gender ');
		$('#errorGender').show();
		$('#errorGender').html('Please select any one');
		$('input[name=gender]').focus();
		return false;
	    }
	    if($('input[name=is_email_verified]:checked').length == 0) {
		alert('Click on Email verification ');
		$('#erroremailverify').show();
		$('#erroremailverify').html('Please select any one');
		$('input[name=is_email_verified]').focus();
		return false;
	    }
	    if($('input[name=is_active]:checked').length == 0) {
		alert('Select status ');
		$('#errorIsActive').show();
		$('#errorIsActive').html('Please select status');
		$('input[name=is_active]').focus();
		return false;
	    }
	    if($('input[name=subscribe_newsletter]:checked').length == 0) {
		alert('Select Newsletter subscription ');
		$('#errorSubscription').show();
		$('#errorSubscription').html('Please select status');
		$('input[name=subscribe_newsletter]').focus();
		return false;
	    }
		
	}
</script>