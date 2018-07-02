<?php
//pr($this->request->data);exit;
?>

<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Agency
                        </header>
                        <div class="panel-body">
                            

                                    <div class="form">
				<?php echo $this->Form->create('Agent',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm','onsubmit'=>'return valid()')); 
                                echo $this->Form->input('id');
                                ?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Agency Name')); ?>
                                        </div>
                                    </div>

<!--                                     <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Contact Person<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('contact_person',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Contact Person')); ?>
                                        </div>
                                    </div>-->
				
                                    
				    <!--<div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Gender <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('gender',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>array('M'=>'Male','F'=>'Female','T'=>'Trans'))); ?>
                                        </div>
                                    </div>-->

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Country <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <?php echo $this->Form->input('country_id',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <!--<div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">State <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('state_id',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'state','empty'=>'Select State')); ?>
                                        </div>
                                    </div>-->
				    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">City <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('city_id',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'city','empty'=>'Select City')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Phone No <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('phone_no',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Phone No')); ?>
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Email <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('email',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Email','type'=>'email')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Username <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('username',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Username')); ?>
                                        </div>
                                    </div>
<!--                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('password',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Password','type'=>'password','id'=>'pass')); ?>
                                        </div>
                                    </div>-->
<!--                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Confirm Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('confirm_pass',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Confirm Password','id'=>'confirm_pass','type'=>'password')); ?>
                                            <span id="error_pass" style=" display:none; color:#A22;">Confirm password does not match</span>    
                                        </div>
                                    </div>-->
                                
                               
                                
                                
                                
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Set Email Verification <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<label for="example-inline-radio1" class="radio-inline">
                                            <input type="radio" value="1" id="radio" name="data[User][is_email_verified]" checked>Verified. </label>
                                        <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" id="radio" name="data[User][is_email_verified]" >
					Not Verified. 
					</label>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Profile Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <label for="example-inline-radio1" class="radio-inline">
                                                <input type="radio" value="1"  name="data[User][is_active]" checked=""> Active.</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" name="data[User][is_active]">
                                            Inactive. 
					</label>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Newsletter Subscribe Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                        <label for="example-inline-radio1" class="radio-inline">
                                            <input type="radio" value="1" id="" name="data[User][is_newsletter]" checked=""> Subscribe.</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" id="" name="data[User][is_newsletter]" >Not Now
. 
					</label>    
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Upload Agency Logo</label>
                                        <div class="col-lg-10">
                                            <img id="preview" style=" height:150px; width:200px;" alt="" src="#">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                            <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                                <span class="fileupload-new">
                                                    <i class="fa fa-paper-clip"></i> Select image															</span>
						<span class="fileupload-exists">															</span>
                                                <input type="file" name="data[User][profile_image]" class="default" onchange="readURL(this)">
					</span>																		
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                <?php 
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
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    
<script type="text/javascript">
        
        $(document).ready(function(){
        $("#state").change(function(){
        $.post("<?php echo $this->webroot;?>admin/users/changecity/"+$(this).val(),function(data){
        $("#city").html(data);    
        })    
        })    
        })
        
        
    </script>