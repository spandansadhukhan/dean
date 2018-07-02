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
    .city-title {
    background: none repeat scroll 0 0 #fbce37;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    color: #0f0f0f;
    padding: 5px 5px 5px;
    float: left;
}
.icon-remove {
    background: url("../images/btn_remove_city.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    cursor: pointer;
    display: inline-block;
    height: 13px;
    margin: 0 0 0px 8px;
    width: 12px;
}
</style>
<style>
    .t1 span {
        color: #ff0000;
    }
</style>	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('user_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Profile</h2>
					</div>
					
					
					
					<div class="email mt-3 p-2">
						<p>Basic Information</p>
					</div>
					<div class="emailAddress mt-4">
                                            <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'ajaxform','id'=>'form-ui','accept-charset'=>'utf-8','method'=>'post')); ?>
                                            
                                            
                                            <input type="hidden" name="data[User][id]" value="<?php echo $this->request->data['User']['id'] ?>" >
                                            <input type="hidden" name="ftype" value="persionalinfo" >
                                            
                                            
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Full Name*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control text-field','maxlength'=>100,'div'=>FALSE)); ?>
						    </div>
						  </div>
						  
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">User Name*:</label>
						    <div class="col-lg-8">
						      <input type="text" id="username" name="data[User][username]" value="<?php echo $this->request->data['User']['username'] ?>" maxlength="100" class="form-control text-field">
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Email Id*:</label>
						    <div class="col-lg-8">
						      <input type="text" id="email" name="data[User][email]" value="<?php echo $this->request->data['User']['email'] ?>" maxlength="100" class="form-control text-field">
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Country*:</label>
						    <div class="col-lg-8">
                                                        <select class="form-control" name="data[User][country_id]" id="country_id" required="required">
                                                            <option value=""> Select Country </option>
                                                                        <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                            <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                        <?php } ?>
                                                        </select>
						      
						    </div>
						 </div>
                                            
                                            
                                            
                                           <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">State*:</label>
						    <div class="col-lg-8">
                                                        <select class="form-control" name="data[User][state_id]" id="state_id"  required="required" onchange="getCityList(this.value)">
                                                            <option value=""> Select Location </option>
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
						    <label for="staticEmail" class="col-lg-4 col-form-label">City*:</label>
						    
                                                        <div class="col-lg-8" id="ctlt" >
                                                        <select class="form-control" name="data[User][city_id]" id="city_id">
                                                            <option value=""> Select State To Get City List </option>
                                                        <?php foreach ($city as $stk => $stv) { ?>
                                                        <option  value="<?php echo $stk ?>" <?php if ($this->request->data['City']['id'] == $stk) { echo 'selected';}?>> <?php echo $stv ?> </option>
                                                        <?php } ?>
                                                        </select>
						      
						    </div>
						 </div>
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Phone:</label>
						    <div class="col-lg-8">
						      <input type="text" id="email" name="data[User][email]" value="<?php echo $this->request->data['User']['phone_no'] ?>" maxlength="100" class="form-control text-field">
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">About Me:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('about',array('type'=>'textarea','maxlength'=>1000,'label'=>false,'class'=>'form-control','div'=>FALSE,'style'=>'height:150px;')) ?>
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
						<p>Change Password</p>
					</div>
                                    
					<div class="emailAddress mt-4">
                                            
                                           <form action="<?php echo $this->webroot?>users/changepass" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui"> 
                                              <input type="hidden" name="data[User][id]" id="UserId" value="<?php echo($this->request->data['User']['id']);?>"/>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">New Password*:</label>
						    <div class="col-lg-8">
                                                        <input type="password" value="" id="oldpassword" name="data[User][password]" placeholder="New Password" class="form-control text-field" required>
						    </div>
						  </div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Confirm Password:*:</label>
						    <div class="col-lg-8">
						     <input type="password" value="" id="oldpassword" name="data[User][cpassword]" placeholder="Confirm Password" class="form-control text-field" required> 
						    </div>
						  </div>
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Change Password</button>
                                                    
						    </div>
                                            </div>
                                            
                                           </form> 
                                        </div>
                                    
                                    
					
					
				</div>
			</div>
		</div>
	</section>
	<?php
$remain_charecter=$permissions->my_profile-$count_charecter;
?>
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
            url: "<?php echo $this->Html->url('/'); ?>escorts/editEscortAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Escorts', 'action' => 'editescortprofile')); ?>";
        });
    }
    
    $(document).ready(function($) {
    var text_max = parseInt(<?php echo $permissions->my_profile?>)-parseInt(<?php echo $count_charecter;?>);
    $("#textarea_feedback").html(text_max+" characters remaining");
     $('#about').keyup(function(event) {
        var text_length = $('#about').val().length;
        var text_max=parseInt(<?php echo $permissions->my_profile?>);
        if(text_length==0)
        {
            $(this).attr('maxlength', text_max);
        }
            
        var text_remaining = text_max - text_length;
        if(text_remaining==0)
        {
        $('#textarea_feedback').html("");
        }
        else
        {
        $('#textarea_feedback').html(text_remaining + ' characters remaining');
       }
    }); 
    $("#category_id").change(function(){
        var txt= $("#category_id option:selected").text();
        var txtval= $("#category_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][category_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletecat("+txtval+")'></a></div>";
        $("#serviceInput1").append(html);
        $("#catopt"+txtval).hide();
        $('#category_id option[value=""]').prop('selected', true);

    });
        $("#language_id").change(function(){
        var txt= $("#language_id option:selected").text();
        var txtval= $("#language_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][language][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletelang("+txtval+")'></a></div>";
        $("#LanguageInput").append(html);
        $("#langopt"+txtval).hide();
        $('#language_id option[value=""]').prop('selected', true);

    });
        $("#service_id").change(function(){
        var txt= $("#service_id option:selected").text();
        var txtval= $("#service_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][service_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deleteservice("+txtval+")'></a></div>";
        $("#ServiceInput").append(html);
        $("#servopt"+txtval).hide();
        $('#service_id option[value=""]').prop('selected', true);

    });

}); //end if ready(fn)
    function deletecat(cat)
    {
      $("#catopt"+cat).show();

    }
    function deletelang(cat)
    {
        $("#langopt"+cat).show();
    }
    function deleteservice(cat)
    {
        $("#servopt"+cat).show();
    }
    
</script>	