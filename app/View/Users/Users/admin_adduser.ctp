<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div>
                            Add User
                        </div>

                             <div class="form-group" style="float:right; margin-top:-27px; margin-right:2px;">
                                       
                                            <a href="<?php echo $this->webroot;?>admin/users/userindex"><button class="btn btn-primary" >Back</button></a>
                                            <a href=""><button class="btn btn-default" >Need help?</button></a>
                                       
                                    </div>
                        </header>
                        <div class="panel-body">
                            
                            <div class="form">
				<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm','onsubmit'=>'return valid()')); ?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Email Address<span style="color:red;">*</span></label>
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
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('password',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Password','type'=>'password','id'=>'pass')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Confirm Password <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('confirm_pass',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Confirm Password','id'=>'confirm_pass','type'=>'password')); ?>
                                            <span id="error_pass" style=" display:none; color:#A22;">Confirm password does not match</span>    
                                        </div>
                                    </div>

                                     <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Phone<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('phone_no',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Phone No')); ?>
                                        </div>
                                    </div>

                                     <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Zip Code<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('zipcode',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Zip Code')); ?>
                                        </div>
                                    </div>
			

                                    <!--<div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Country <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					    <?php echo $this->Form->input('country_id',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>-->


				    <div class="form-group">
                                        <label for="password1" class="control-label col-lg-2">City <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('city_id',array('label'=>false,'required'=>'required','class'=>'form-control','id'=>'city','empty'=>'Select City')); ?>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Gender<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <label for="example-inline-radio1" class="radio-inline">
                                            <input type="radio" value="M"  name="data[User][gender]">Male </label>
                                        <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="F"  name="data[User][gender]">Female
                    </label>
                                        </div>
                                    </div>

                                
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Set Email Verified<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<label for="example-inline-radio1" class="radio-inline">
                                            <input type="radio" value="1"  name="data[User][is_email_verified]">Yes Verified</label>
                                        <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0"  name="data[User][is_email_verified]" >No Verified
					</label>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <label for="example-inline-radio1" class="radio-inline">
                                                <input type="radio" value="1"  name="data[User][is_active]">Active</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" name="data[User][is_active]">
                                            Inactive
					</label>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Newsletter Subscription<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                        <label for="example-inline-radio1" class="radio-inline">
                                            <input type="radio" value="1" id="" name="data[User][is_newsletter]">Yes</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" id="" name="data[User][is_newsletter]" >No
. 
					</label>    
                                        </div>
                                    </div>
                                     <!--<div class="form-group ">
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
                                    </div>-->
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        </div>
                                    </div>
                                <?php 
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

        
        <script type="text/javascript">
        function valid()
        {
            pass=$("#pass").val();
            confirm_pass=$("#confirm_pass").val();
            if(confirm_pass!=pass)
            {
               $("#error_pass").show();
               return false;
            }
            
        }
        $(document).ready(function(){
        $("#state").change(function(){
        $.post("<?php echo $this->webroot;?>admin/users/changecity/"+$(this).val(),function(data){
        $("#city").html(data);    
        })    
        })    
        })
        
        
    </script>
     <style>
        .btn-file > input {
        cursor: pointer;
        direction: ltr;
        font-size: 23px;
        margin: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform: translate(-300px, 0px) scale(4);
        } 
        input[type="file"] {
        padding-top: 7px;
        }
        .btn-primary.btn-alt {
        background-color: #ffffff;
        color: #1bbae1;
        }
        .btn-primary:hover
        {
        background-color: #1bbae1;
        border-color: #1593b3;
        color: #ffffff;
        }
       
        </style>  
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
    
    