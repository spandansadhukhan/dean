<div class="row">
    <div class="col-lg-12">
        <div class="maintitle">
                <h3><span>Forgot Password </span></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-6 center-div">
        <div class="log-holder">
            <form name="UserLoginForm" action="<?php echo $this->webroot; ?>users/forgotpassword" method="post" >
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" name="data[User][email]" id="inputEmail3" placeholder="Enter your email" required="required">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="r_butt pull-left" value="Submit">
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <p>Your new password will be mailed to your email.</p>
            </form>
        </div>
    </div>
</div>
