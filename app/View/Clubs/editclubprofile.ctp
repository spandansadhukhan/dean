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
				<?php echo $this->element('club_sidebar'); ?>
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
						    <label for="staticEmail" class="col-lg-4 col-form-label">Club Name:</label>
						    <div class="col-lg-8">
                                                      <input type="text" placeholder="Club Name" class="form-control text-field" id="from" value="<?php echo $this->request->data['User']['org_name']?>" name="org_name"> 
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