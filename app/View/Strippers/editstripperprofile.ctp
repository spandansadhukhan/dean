  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", MaxDate: "-216m"});
    });
</script>
 <script type="text/javascript">
    function getCityList(cid) {
        //alert(cid);
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfState/",
            //dataType: "json",
            data: {cid: cid}
        }).done(function (msg) {
            //alert(msg);
            // ctlt
            $("#ctlt").html(msg);
        });
    }


    function checkUsername(username) {
        if (/^[a-zA-Z0-9]*$/.test(username) == false) {
            $("#ugreen").hide('');
            $("#ured").show('');
            $("#ured").text(' Invalid Username!');
            //$("#username").attr("placeholder", username).val("").focus().blur();
            //BootstrapDialog.alert('Username contains invalid characters. Only letters or numbers please');
            return false;
        }

        if (username) {
            //$('#wait-div-username').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkusername/",
                //dataType: "json",
                data: {username: username}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreen").hide('');
                    $("#ured").show('');
                    $("#ured").text('Username already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#username").attr("placeholder", username).val("").focus().blur();
                } else if (msg == 0) {
                    $("#ured").hide('');
                    $("#ugreen").show('');
                    $("#ugreen").text('Username available');
                }
            });
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function checkEmail(email) {
        if (!validateEmail(email)) {
            $("#ugreene").hide('');
            $("#urede").show('');
            $("#urede").text(' Invalid Email!');
            //BootstrapDialog.alert('Invalid Email');
            return false;
        }

        if (email) {
            $('#wait-div-email').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                //dataType: "json",
                data: {email: email}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreene").hide('');
                    $("#urede").show('');
                    $("#urede").text('Email already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#email").attr("placeholder", email).val("").focus().blur();
                } else if (msg == 0) {
                    $("#urede").hide('');
                    $("#ugreene").show('');
                    $("#ugreene").text('Email available');
                }
            });
        }
    }
</script>   
<style>
    .t1 span {
        color: #ff0000;
    }
</style>	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('stripper_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Profile</h2>
					</div>
					
					
					
					<div class="email mt-3 p-2">
						<p>Private Information</p>
					</div>
					<div class="emailAddress mt-4">
                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                            <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id'] ?>" >
                                            <input type="hidden" name="ftype" value="persionalinfo" >
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">First Name:</label>
						    <div class="col-lg-8">
                                                      <input type="text" id="first_name" required="required" name="first_name" value="<?php echo $this->request->data['User']['first_name'] ?>" maxlength="100" class="form-control text-field">  
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Last Name:</label>
						    <div class="col-lg-8">
						      <input type="text" id="last_name" required="required" name="last_name" value="<?php echo $this->request->data['User']['last_name'] ?>" maxlength="100" class="form-control text-field">
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Gender*:</label>
						    
						      <div class="col-lg-8">
							<p class="d-inline-block mr-4 mb-0 mt-2">
							    
                                                            <input type="radio" id="test111" required="required" <?php echo $this->request->data['User']['gender'] != "M" ? '' : 'checked'; ?> name="gender" value="M">
							    <label for="test111">Male</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    
                                                            <input type="radio" id="test112" required="required" <?php echo $this->request->data['User']['gender'] != "F" ? '' : 'checked'; ?> name="gender" value="F" >
							    <label for="test112">Female</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    
                                                            <input type="radio" id="test113" required="required" <?php echo $this->request->data['User']['gender'] != "T" ? '' : 'checked'; ?> name="gender" value="T">
							    <label for="test113">Trans</label>
							  </p>
                                                       </div>
						    
						  </div>
							</div>
						</div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Stripper Type*:</label>
						    
						      <div class="col-lg-8">
							<p class="d-inline-block mr-4 mb-0 mt-2">
							    
                                                            <input type="radio" id="test114" required="required" <?php echo $this->request->data['User']['srtipper_type'] != "C" ? '' : 'checked'; ?> name="srtipper_type" value="C">
							    <label for="test114">Club</label>
							  </p>
							  <p class="d-inline-block mr-4 mb-0 mt-2">
							    
                                                              <input type="radio" id="test115" required="required" <?php echo $this->request->data['User']['srtipper_type'] != "A" ? '' : 'checked'; ?> name="srtipper_type" value="A" >
							    <label for="test115">Agency</label>
							  </p>
							  
                                                       </div>
						    
						  </div>
							</div>
						</div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Date of Birth:</label>
						    <div class="col-lg-8">
						      <input type="text" placeholder="Date of Birth" value="<?php echo $this->request->data['User']['birthday'] ?>" class="form-control text-field datepicker" id="datepicker" name="birthday">
						    </div>
						  </div>
                                            
                                            
                                            
                                           
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Country:</label>
						    <div class="col-lg-8">
						      <select name="country_id" id="country_id" required="required" class="form-control">
                                                                                                    <option value=""> Select Country </option>
                                                                                                    <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                                                        <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                                                    <?php } ?>
                                                                                                </select>
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">State:</label>
						    <div class="col-lg-8">
                                                        <select name="state_id" id="state_id" required="required" onchange="getCityList(this.value)" class="form-control">
                                                                                                    <option value=""> Select State </option>
                                                                                                    <?php foreach ($state as $stk => $stv) { ?>
                                                                                                        <?php if ($this->request->data['State']['id'] != $stk) { ?>
                                                                                                            <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                        <?php } else { ?>
                                                                                                            <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </select>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">City:</label>
						    <div class="col-lg-8" id="ctlt">
                                                        <select name="city_id" id="city_id" class="form-control">
                                                                                                    <option value=""> Select State To Get City List </option>
                                                                                                    <?php foreach ($city as $stk => $stv) { ?>
                                                                                                        <?php if ($this->request->data['City']['id'] != $stk) { ?>
                                                                                                            <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                        <?php } else { ?>
                                                                                                            <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </select>
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">About Me:</label>
						    <div class="col-lg-8">
						      <textarea placeholder="About you" name="about" id="disabledInput" class="form-control text-field" maxlength="1000"><?php echo nl2br($user['User']['about']) ?></textarea>
						    </div>
						 </div>
                                            
                                            

						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Submit</button>
                                                    
						    </div>
						  </div>
                                            </form>
					</div>
                                    
                                    
                                        <div class="email mt-3 p-2">
						<p>Contact Information</p>
					</div>
                                    
					<div class="emailAddress mt-4">
                                            
                                           <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui"> 
                                               <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id'] ?>" >
                                                                                <input type="hidden" name="ftype" value="contactinfo" >
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Contact Number*:</label>
						    <div class="col-lg-8">
						      <input type="text" placeholder="Contact Number" class="form-control text-field" value="<?php echo $this->request->data['User']['phone_no'] ?>" id="phone_no" name="phone_no">
						    </div>
						  </div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Website Url*:</label>
						    <div class="col-lg-8">
						      
                                                        <input type="text" placeholder="Website Url" class="form-control text-field" value="<?php echo $this->request->data['User']['website_url'] ?>" id="website_url" name="website_url">
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Skype ID*:</label>
						    <div class="col-lg-8">
						      <input type="text" placeholder="Skype" class="form-control text-field" value="<?php echo $this->request->data['User']['skypeid'] ?>" id="skype_url" name="skypeid">
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Facebook ID*:</label>
						    <div class="col-lg-8">
						      <input type="text" placeholder="Facebook" class="form-control text-field" value="<?php echo $this->request->data['User']['facebook_url'] ?>" id="facebook_url" name="facebook_url">
						    </div>
                                            </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Submit</button>
                                                    
						    </div>
                                            </div>
                                            
                                           </form> 
                                        </div>
                                    
                                    
					
					
				</div>
			</div>
		</div>
	</section>
	
<style>
    .modal-backdrop.in {position: relative;}
</style>

<script>
    function saveAboutMe(id) {
        if ($("#about").val() == "") {
            alert("About You Cannot Empty!");
            $("#about").focus();
            return false;
        }
        var aboutData = $("#about").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>strippers/editStripperAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Strippers', 'action' => 'editStripperAbout')); ?>";
        });
    }
</script>	