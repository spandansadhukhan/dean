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
                    FB.api('/me', function(fbdata){						
                            console.log(fbdata); //
                            var fb_user_id = fbdata.id;						
                            var fb_first_name = fbdata.first_name;
                            var fb_last_name = fbdata.last_name;
                            var fb_email = fbdata.email;
                            var fb_username = fbdata.username;
                            $.post('<?php echo($this->webroot);?>users/autoLogin/'+fb_user_id,function(data){
                                    var newData = '';
                                    newData = data.split('@@@@');
                                    if(newData[0]=='Register'){
                                            /*$("#UserFbUserId").val(fb_user_id);
                                            $("#UserFirstName").val(fb_first_name);
                                            $("#UserLastName").val(fb_last_name);                                                                                   $("#UserEmail").val(fb_email);
                                            $("#UserPassword").val(fb_user_id);
                                            $("#UserConPassword").val(fb_user_id);
                                            $('#SignUpFrm').submit();*/
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


<div class="row">
    <div class="col-lg-12">
        <div class="maintitle">
                <h3><span>Login </span> to your account</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-6 center-div">
        <div class="log-holder">
            <form name="UserLoginForm" action="<?php echo $this->webroot; ?>users/login" method="post" >
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" name="data[User][email]" class="form-control" placeholder="Your email address" required="required">
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name="data[User][passwordl]" class="form-control" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="submit" class="r_butt pull-left" value="Login Now">
                    <a href="<?php echo $this->webroot; ?>users/forgotpassword" class="pull-right" style="margin: 12px 0">Forgot Password?</a>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="or"><p>or</p></div>
                <p class="text-center"> Not yet a member <a href="<?php echo $this->webroot;?>users/signup">SIGNUP NOW FOR FREE</a></p>
            </form>
        </div>
    </div>
</div>

<!--<div class="col-md-5 socials">
                            <ul>
                                <li><a href="Javascript: void(0);" class="flogin"><img src="<?php echo $this->webroot;?>images/fb.png" alt="" /></a></li>
                                    
                            </ul>
                    </div>-->