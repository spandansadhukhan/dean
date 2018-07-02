<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", maxDate: "-216m"});
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
    section.t1 label {
    color: #000!important;
}
section.form-group label {
    color: #000!important;
}

section.form-group label span {
	color: red!important;
}
</style>
<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <div class="clr"></div>
                            <section id="middle">
                                <section id="middle-inner">
                                    <section class="all-pins-do">
                                        <div class="my-account-inner"><div class="sb-toggle-right navbar-right">
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                                <div class="navicon-line"></div>
                                            </div>
                                            <div class="left-my-account-menu-m">
                                                <div class="triangleBottomRight firstItem"></div>
                                                <style>
                                                    .unreadCount {
                                                        background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                                        border-radius: 50%;
                                                        color: #620c29;
                                                        display: inline-block;
                                                        font-family: arial;
                                                        font-size: 12px;
                                                        font-weight: bold;
                                                        height: 20px;
                                                        line-height: 20px;
                                                        text-align: center;
                                                        width: 20px;
                                                        vertical-align:sub;
                                                    }
                                                </style>
                                                <a style="display:none;" href="#" class="website_activate"></a>
                                                <?php echo $this->element('user_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading" >
                                                        <section class="title-left" style="width:100%;">
                                                            <h1  style="display:inline-block;width:97%;">Account Setting</h1>
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner for-setting">
                                                        <div class="detail-heading" style="background: none;">
                                                            <section class="title-left" style="width:100%;">
                                                                <h1 style="display:inline-block;font-size: 20px; width:97%;">Change Your Basic Settings </h1>
                                                            </section>
                                                            <div class="clr"></div>
                                                        </div>
                                                        <div class="tom1 for-setting">
                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                                <input type="hidden" name="data[User][id]" value="<?php echo $this->request->data['User']['id'] ?>" >
                                                                <input type="hidden" name="ftype" value="persionalinfo" >
                                                                <div class="smart-forms smart-container">
                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                </div>
                                                                <section class="t1">
                                                                    <label for="label">First Name: <span>*</span></label>
                                                                    <input type="text" id="first_name" required="required" name="data[User][first_name]" value="<?php echo $this->request->data['User']['first_name'] ?>" maxlength="100" class="">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="t1">
                                                                    <label for="label">Last Name: <span>*</span></label>
                                                                    <input type="text" id="last_name" required="required" name="data[User][last_name]" value="<?php echo $this->request->data['User']['last_name'] ?>" maxlength="100" class="">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="t1">
                                                                    <label for="label">User Name: <span>*</span></label>
                                                                    <input type="text" id="username"  name="data[User][username]" value="<?php echo $this->request->data['User']['username'] ?>" maxlength="100" class="">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="t1">
                                                                    <label for="label">Email Address: <span>*</span></label>
                                                                    <input type="text" id="email" readonly="readonly" name="data[User][email]" value="<?php echo $this->request->data['User']['email'] ?>" maxlength="100" class="">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="t1">
                                                                    <label for="label">
                                                                        Country <span>*</span></label>
                                                                    <select name="data[User][country_id]" id="country_id" required="required" class="form-control" style="width:280px">
                                                                        <option value=""> Select Country </option>
                                                                        <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                            <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </section>
                                                                
                                                                <section class="form-group">
                                                                    <label style="padding-left:0;" class="col-md-2 control-label" for="example-text-input">
                                                                        Location<span>*</span></label>
                                                                    <select name="data[User][state_id]" id="state_id" class="form-control" required="required" onchange="getCityList(this.value)" style="width:280px">
                                                                        <option value=""> Select Location </option>
                                                                        <?php foreach ($state as $stk => $stv) { ?>
                                                                            <?php if ($this->request->data['State']['id'] != $stk) { ?>
                                                                                <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                            <?php } else { ?>
                                                                                <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </section>
                                    <section class="form-group">
                                        <label style="padding-left:0;" class="col-md-2 control-label" for="example-text-input">
                                            City<span>*</span></label>
                                            <div class="section" id="ctlt" >
                                                <label class="field select">
                                                    <select name="data[User][city_id]" id="city_id" style="width:280px">
                                                        <option value=""> Select State To Get City List </option>
                                                        <?php foreach ($city as $stk => $stv) { ?>
                                                        <option  value="<?php echo $stk ?>" <?php if ($this->request->data['City']['id'] == $stk) { echo 'selected';}?>> <?php echo $stv ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                    <i class="arrow double"></i>
                                                </label>
                                            </div>
                                            
                                            
                                              <label style="display: none;" for="label">Phone: <span>*</span></label>
                                        <input style="display: none;"  type="text" id="phone_no" required="required" name="data[User][phone_no]" value="<?php echo $this->request->data['User']['phone_no'] ?>" maxlength="100" class="">
                                        <section class="clr"></section>
                                        
                                        
                                    </section>

                                                                <section class="t1">
                                                                    <label for="label">Phone: <span>*</span></label>
                                                                    <input type="text" id="phone_no" required="required" name="[User][phone_no]" value="<?php echo $this->request->data['User']['phone_no'] ?>" maxlength="100" class="">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <!--
                                                                <section class="t1">
                                                                    <label for="label">Zip Code: </label>
                                                                    <input type="text" name="zip" class="" value="" style="margin:0;" placeholder="Zip Code">
                                                                    <section class="clr"></section>
                                                                </section>
                                                                -->
                                                                <section class="t1">
                                                                    <label for="label">About: <span>*</span></label>
                                                                    <textarea class="form-control " name="data[User][about]" placeholder="Abouts"><?php echo $this->request->data['User']['about'] ?></textarea>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="t1 t1-t">
                                                                    <label for="label" class="blank">&nbsp;</label>
                                                                    <section class="tbut">
                                                                        <input type="submit" value="Change Settings" id="button" name="button" class="buttonGrey">
                                                                    </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="clr"></section>
                                                            </form>
                                                        </div>
                                                        <br>
                                                        <div class="detail-heading" style="background: none;">
                                                        <section class="title-left">
                                                        <h1 style="display:inline-block;font-size: 20px;">Change Password</h1>

                                                        </section> 

                                                        <div class="clr"></div>
                            </div>
                            <div class="tom1  for-tour">

                            <form action="<?php echo $this->webroot?>users/changepass" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui1">       <div class="smart-forms">

                                <input type="hidden" name="data[User][id]" id="UserId" value="<?php echo($this->request->data['User']['id']);?>"/>
                        <!-- <input type="hidden" name="data[User][hidprofile_img]" value="<?php echo $this->request->data['User']['profile_img'] ?>">
                        <input type="hidden" name="data[User][hidcover_img]" value="<?php echo $this->request->data['User']['cover_img'] ?>">
                        <input type="hidden" name="data[User][id]" value="<?php echo $this->Session->read('userid') ?>">
                        <input type="hidden" name="data[User][fb_user_id]" value="<?php echo $this->request->data['User']['fb_user_id'] ?>">
                        <input type="hidden" name="data[User][is_active]" value="<?php echo $this->request->data['User']['is_active'] ?>">
                            <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">×</a> <span class="ajax_message">Hello Message</span> </div> -->                
                            <br>   </div>
                            <section class="t1 t1-t">
                            <label for="label">New Password: <span>*</span></label>
                            <input type="password" value="" id="oldpassword" name="data[User][password]" placeholder="New Password" required>
                            <section class="clr"></section>
                            </section>
                            <section class="t1 t1-t">
                            <label for="label">Confirm Password: <span>*</span></label>
                            <input type="password" value="" id="newpassword" name="data[User][cpassword]" placeholder="Confirm Password" required>
                            <section class="clr"></section>
                            </section>
                            
                            <div class="clr"></div>
              
                            <section class="t1 t1-t">
                            <label for="label" class="blank">&nbsp;</label>
                            <section class="tbut">
                            <input type="submit" value="Change Password" id="button" class="buttonGrey">
                            </section>
                            <section class="clr"></section>
                            </section>
              </form><section class="clr"></section>
                                    </div>
                                    <br />
                                                              
                                                        <br>
                                                        <div class="clr"></div>
                                                    </div>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                        <div class="clr"></div>
                    </section>
                </section>
            </section>
        </section>
    </div>
    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>
