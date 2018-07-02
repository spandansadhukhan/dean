
<script type="text/javascript">
$.ajaxSetup({ cache: true });
$.getScript('//connect.facebook.net/en_US/all.js', function(){
    FB.init({ appId: '1509350872727862'});  		
    $(".flogin").on("click", function(e){
        e.preventDefault();				
        FB.login(function(response){
                // FB Login Failed //
                if(!response || response.status !== 'connected') {
                        alert("Given account information are not authorised", "Facebook says");
                }else{
                    // FB Login Successfull //
                    FB.api('/me', {fields: 'id,name,email'}, function(fbdata){						
                            console.log(fbdata); //
                            var fb_user_id = fbdata.id;	
                            var fb_name = fbdata.name;
                            var fb_name_split = fb_name.split(' ');
                            var fb_first_name = fb_name_split[0];
                            var fb_last_name = fb_name_split[1];
                            var fb_email = fbdata.email;
                            var fb_username = fbdata.username;
                            $.post('<?php echo($this->webroot);?>users/autoLogin/'+fb_user_id,function(data){
                                    var newData = '';
                                    newData = data.split('@@@@');
                                    if(newData[0]=='Register'){
                                        //alert(fbdata);
                                            $("#UserFbUserId").val(fb_user_id);
                                            $("#UserFirstName").val(fb_first_name);
                                            $("#UserLastName").val(fb_last_name);                                                                                   $("#UserEmail").val(fb_email);
                                            $("#UserPassword").val(fb_user_id);
                                            $("#UserConPassword").val(fb_user_id);
                                            $('#SignUpFrm').submit();
                                            //$("#UserUsername").val(fb_username);
                                    } else if(newData[0]=='Login'){
                                            window.location.href="<?php echo($this->webroot)?>users/dashboard";
                                    }
                             });
                    })
                }
        }, {scope:"email"});
    });
});
</script>
<script type="text/javascript">
    
/*$(document).ready(function(){       
    $(".SignUp").click(function(){
       
        
    });    
});  */
   
function Checkvalidate(){
    var pass2=$("#UserConPassword").val();
    var pass1=$("#UserPassword").val();
    if(pass1!=pass2){
       alert('Passwords Don\'t Match'); 
       return false;
    }else{
       return true;
    }
}
function chkEmailexists(email){
	//alert('<?php echo($this->webroot);?>users/emailExists/'+email);
	$.post('<?php echo($this->webroot);?>users/emailExists/'+email, function(data){
		if(data!=''){
			//alert(data);
			$("#emailErr").html(data);
			//document.getElementById("UserEmail").setCustomValidity(data);
		} else {
			$("#emailErr").html('');
			//document.getElementById("UserEmail").setCustomValidity('');
		}
	});
}
</script>


<script>
$(document).ready(function(){       
    $(".signup").click(function(){
        $('#PersonalInfo').show();
        $('#RegType').hide();
        $('.signupStep').each(function(){
            $(this).removeClass("active");
	}); 
        $('.basicInfo').addClass('active');
        
        var SignupType=$(this).attr('id');
        //var SignUpFrmAction=$('#SignUpFrm').attr('action');
        $('#user_type').val(SignupType);
        //alert(SignUpFrmAction);
        //$('#SignUpFrm').attr('action', SignUpFrmAction+'/'+SignupType);
        
    });   
}); 
</script>
<div class="row">
        <div class="col-lg-12">
                <div class="maintitle">
                        <h3>Join Website Parlour <span>Now For Free!</span></h3>
                </div>

        </div>
        <div class="col-lg-12">
                 <div class="breadcrumb">
                        <a href="Javascript: void(0);" class="active signupStep">&nbsp;Membership Type &nbsp; &nbsp;</a>
                        <a href="Javascript: void(0);" class="signupStep basicInfo">&nbsp; &nbsp; Basic Information &nbsp;</a>
                        <a href="Javascript: void(0);" class="signupStep confirm">&nbsp; &nbsp; Confirmation &nbsp;</a>
                </div>
        </div>
        <div class="clearfix"></div>
        <div id="RegType">
        <div class="col-sm-4">
            <div class="member-box">
                <h3>Independent escort</h3>
                <ul class="mem-features">
                        <li>Free Account</li>
                        <li>Easy profile management</li>
                        <li>Fully targeted traffic</li>
                        <li>Enhanced members area</li>
                        <li>Online support</li>
                        <li>And much more</li>
                </ul>
                <h2 class="text-center"><a href="Javascript: void(0);" id="1" class="r_butt signup">SIGN UP NOW!</a></h2>
            </div>
        </div>
        <div class="col-sm-4">
                <div class="member-box">
                        <h3>Escort Agency</h3>
                        <ul class="mem-features mem-features2">
                                <li>Free Account</li>
                                <li>Easy profile management</li>
                                <li>Fully targeted traffic</li>
                                <li>Enhanced members area</li>
                                <li>Online support</li>
                                <li>And much more</li>
                        </ul>
                        <h2 class="text-center"><a href="Javascript: void(0);" id="2" class="r_butt signup">SIGN UP NOW!</a></h2>
                </div>
        </div>
        <div class="col-sm-4">
                <div class="member-box" style="border-right: 0">
                        <h3>Member</h3>
                        <ul class="mem-features mem-features3">
                                <li>Free Account</li>
                                <li>Easy profile management</li>
                                <li>Fully targeted traffic</li>
                                <li>Enhanced members area</li>
                                <li>Online support</li>
                                <li>And much more</li>
                        </ul>
                        <h2 class="text-center"><a href="Javascript: void(0);" id="3" class="r_butt signup">SIGN UP NOW!</a></h2>
                </div>
        </div>
        </div>
        <div id="PersonalInfo" style="display: none;">
            <div class="clearfix"></div>
            <form class="form-horizontal" id="SignUpFrm" method="post" action="<?php echo $this->webroot; ?>users/signup" onsubmit="Checkvalidate();">
                <input type="hidden" name="data[User][user_type]" id="user_type" value=""/>
                <div class="col-lg-12">
                        <h3 class="common-title">Personal Information:</h3>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-10 center-div">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Name: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Username" id="Username" required="required">
                            </div>
                    </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Gender: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <div class="checkbox">
                                    <input type="radio" name="data[User][gender]" value="M"/> Male <input type="radio" name="data[User][gender]" value="F"/> Female
                                </div>
                            </div>
                    </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Country: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="data[User][country_id]" required="required">
                                    <option value="">Select Country</option>
                                    <?php
                                    foreach($countries as $country){
                                    ?>
                                    <option value="<?php echo $country['Country']['id'];?>"><?php echo $country['Country']['name'];?></option>

                                    <?php
                                     }
                                    ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="" class="col-sm-2 control-label">State: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="data[User][state_id]" required="required">
                                    <option value="">Select State</option>
                                    <?php
                                    foreach($states as $stat){
                                    ?>
                                    <option value="<?php echo $stat['State']['id'];?>"><?php echo $stat['State']['name'];?></option>

                                    <?php
                                     }
                                    ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="" class="col-sm-2 control-label">City: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="data[User][city]" class="form-control" id="" required="required">
                            </div>
                    </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Telephone No: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="data[User][phone_no]" class="form-control" id="" required="required">
                            </div>
                    </div>
                    <!--<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Email address: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" onkeyup="chkEmailexists(this.value)" onblur="chkEmailexists(this.value)" class="form-control" name="data[User][email]" id="" required="required">
                                <div id="emailErr" style="color:red;"></div>
                            </div>
                    </div>-->
                </div>
                <div class="col-lg-12">
                        <h3 class="common-title">Login Information:</h3>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-10 center-div">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Email address: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" onkeyup="chkEmailexists(this.value)" onblur="chkEmailexists(this.value)" class="form-control" name="data[User][email]" id="" required="required">
                                <div id="emailErr" style="color:red;"></div>
                            </div>
                    </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Password: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="data[User][password]" id="UserPassword" required="required">
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Confirm Password: <span class="asterix">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="data[User][conpassword]" id="UserConPassword" required="required">
                            </div>
                    </div>
                    <!--<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Security Code: : <span class="asterix">*</span></label>
                            <div class="col-sm-3">
                                <div class="capcha-hold">
                                        <img src="images/captcha.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <p class="text-center"><a href="" style="padding: 8px 0; color:#454545; font-size:20px"><i class="fa fa-refresh"></i></a></p>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="">
                            </div>
                    </div>-->
                </div>
                <div class="col-lg-12">
                        <h3 class="common-title">Others Information:</h3>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-9 col-md-offset-3">
                        <p>
                            <input type="checkbox" required="required"> I have read and accepted <a href="">Terms</a> and <a href="">Privacy Policy</a>.
                    </p>
                        <p>
                            <input type="checkbox" name="data[User][subscribe_newsletter]" value="1"> Subscribe for Newsletters.
                    </p>
                    <p>
                        <input type="submit" value="JOIN NOW" class="r_butt">
                    </p>
                </div>
            </form>
        </div>
</div>



