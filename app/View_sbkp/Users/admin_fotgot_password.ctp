<!--<section class="container">
<div class="login">
  <h1>Forgot Password</h1>
  <form id="UserAdminLoginForm" name="UserAdminLoginForm" action="<?php echo $this->webroot; ?>admin/users/fotgot_password" class="contact_form" method="post">
	<p><input type="text" name="data[User][email]" maxlength="100" id="UserEmailL" class="contact_text_box" placeholder="Enter your email" required="required" value=""/></p>
	<p>&nbsp;&nbsp;Your new password will be mailed to your email</p>
	<p class="submit"><input type="submit" name="commit" value="Submit"></p>
  </form>
</div>

<div class="login-help">
  <p>Go back to login? <a href="<?php echo $this->webroot; ?>admin/">Click here</a>.</p>
</div>
</section>-->
<?php $SITE_URL = Configure::read('SITE_URL'); ?>
<body class="login-body">

<div class="container">
   <form class="form-signin" name="UserAdminLoginForm" id="UserAdminLoginForm" action="<?php echo($this->webroot)?>admin/users/fotgot_password" method="post">
	<p>&nbsp;</p>
	 <center><h2><img src="<?php echo $this->webroot.'images/logo.png'?>" ></h2></center><p>&nbsp;</p>
	<div class="login-wrap">
		<input type="email" class="form-control"  placeholder="Email" name="data[User][email]" id="UserUsername" required/>
		<button class="btn btn-large btn-primary" type="submit">Submit</button>
		<p style="margin-top:10px"><a href="<?php echo($this->webroot)?>admin/users/index" id="forgot-password">Back To Login</a></p>
	</div>
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
</body>
