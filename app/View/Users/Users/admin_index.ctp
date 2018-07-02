<?php ?>
<!--<section class="container">
<div class="login">
  <h1>Login to Admin Panel</h1>
  <form id="UserAdminLoginForm" name="UserAdminLoginForm" action="<?php echo $this->webroot; ?>admin/users/login" class="contact_form" method="post">
	<p><input type="text" name="data[User][usernamel]" maxlength="50" id="UserUsernameL" class="contact_text_box" placeholder="Enter your username" required="required" value=""/></p>
	<p><input type="password" name="data[User][passwordl]" maxlength="50" id="UserPasswordL" class="contact_text_box" placeholder="Enter your password" required="required" value=""/></p>
	<!-- <p class="remember_me">
	  <label>
		<input type="checkbox" name="remember_me" id="remember_me">Remember me
	  </label>
	</p> -->
	<!--<p class="submit"><input type="submit" name="commit" value="Login"></p>
  </form>
</div>

<div class="login-help" style="color:#000;text-shadow:none;">
  <p>Forgot your password? <a href="<?php echo $this->webroot; ?>admin/users/fotgot_password" style="color:blue">Click here to reset it</a>.</p>
</div>
</section>
<style>
body
{
background:#ddd !important;
}
</style>-->
<?php $SITE_URL = Configure::read('SITE_URL'); ?>
<body class="login-body">

<div class="container">
<form class="form-signin" name="UserAdminLoginForm" id="UserAdminLoginForm" action="<?php echo($this->webroot)?>admin/users/login" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Sign In</h1>
            <img src="<?php echo($this->webroot)?>images/logo.png" width="130" height="50" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" name="data[User][usernamel]" required  autofocus>
            <input type="password" class="form-control" placeholder="Password"  name="data[User][passwordl]" required>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <!--<a data-toggle="modal" href="#myModal"> Forgot Password?</a>-->
		    <a href="<?php echo $this->webroot; ?>admin/users/fotgot_password" style="color:blue">Forgot your password?</a>

                </span>
            </label>

        </div>

       <!------------Modal -------------->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
		    <form name="UserForgotPassForm" id="UserForgotPassForm" action="<?php echo($this->webroot)?>admin/users/forgot_password" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hiddetextn="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="email" name="email1" id="email1" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" >
			<div id="error" style="color:red;display:none;"></div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button" name="passchange" id="passchange">Submit</button>
                    </div>
		    </form>
                </div>
            </div>
        </div>
       <!------------Modal -------------->

    </form>
</div>

<script src="<?php echo($this->webroot)?>admin_styles/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/bootstrap.min.js"></script>
<script src="<?php echo($this->webroot)?>admin_styles/js/modernizr.min.js"></script>
<style>
	.form-signin input[type="text"], .form-signin input[type="email"], .form-signin input[type="password"] {
    margin-bottom: 15px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    border: 1px solid #eaeaec;
    background: #eaeaec;
    box-shadow: none;
    font-size: 12px;
</style>
<script>
	
	$(document).ready(function(){ 
	     $("#passchange").click(function(event){
                event.preventDefault();  
		var email = $('#email1').val();
		var email1 = validateEmail(email);
		alert(email);
		//alert(pass2);
		if(email != ''){
		    if(email1){
			$('#error').hide();
                        document.UserForgotPassForm.submit();
		    }
		    else if(email != email1){
			$('#error').show();
			$('#error').html('Please enter the valid email Address ..');
		    }
		}else{
			$('#error').show();
			$('#error').html('Please enter the email Address ..');
                        
		}
	    });
	    
	    function validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	    }
	    
		setTimeout(function() {
			$('.message').fadeOut('slow');
		}, 2000);
		setTimeout(function() {
			$('.success').fadeOut('slow');
		}, 2000);
	});
</script>
</body>
</html>
