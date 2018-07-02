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
</style>




<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;"> Please wait ....</span> </span> </div>
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1> My Profile </h1>
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
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                <?php echo $this->element('escort_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div class="profie-bl1">
                                                            <div class="profie-bl1-inner">
                                                                <h3>Personal Information<br><span>(Please describe basic information about yourself)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">

                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id'] ?>" >
                                                                                <input type="hidden" name="ftype" value="persionalinfo" >
                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl"> First Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
                                                                                                <input type="text" id="first_name" required="required" name="first_name" value="<?php echo $this->request->data['User']['first_name'] ?>" maxlength="100" class="gui-input">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-profile-block">
                                                                                    <label class="pl"> Last Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
                                                                                                <input type="text" id="last_name" required="required" name="last_name" value="<?php echo $this->request->data['User']['last_name'] ?>" maxlength="100" class="gui-input">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-profile-block" style="margin-bottom: 14px;">
                                                                                    <label class="pl">Gender: </label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section" style="margin: 0;">
                                                                                            <div class="option-group field">
                                                                                                <label class="option">
                                                                                                    <input type="radio" required="required" <?php echo $this->request->data['User']['gender'] != "M" ? '' : 'checked'; ?> name="gender" value="M">
                                                                                                    <span class="radio"></span> Male </label>
                                                                                                <label class="option">
                                                                                                    <input type="radio" required="required" <?php echo $this->request->data['User']['gender'] != "F" ? '' : 'checked'; ?> name="gender" value="F" >
                                                                                                    <span class="radio"></span> Female </label>
                                                                                                <label class="option">
                                                                                                    <input type="radio" required="required" <?php echo $this->request->data['User']['gender'] != "T" ? '' : 'checked'; ?> name="gender" value="T">
                                                                                                    <span class="radio"></span> Trans </label>
                                                                                            </div><!-- end .option-group section -->
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Ethnicity:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="ethnicity" class="inputtext " name="ethnicity_id" style="width:280px">
                                                                                                    <option value="">Select Ethnicity</option>
                                                                                                    <option value="7"> Indian </option>
                                                                                                    <option value="5"> White </option>
                                                                                                    <option value="4"> Mixed </option>
                                                                                                    <option value="2"> Black </option>
                                                                                                    <option value="1"> Asian </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                -->
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Date of Birth:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Date of Birth" value="<?php echo $this->request->data['User']['birthday'] ?>" class="gui-input datepicker" id="datepicker" name="birthday">
                                                                                                <label class="field-icon" for="dob"><i class="fa fa-calendar"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Country:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="country_id" id="country_id" required="required" style="width:280px">
                                                                                                    <option value=""> Select Country </option>
                                                                                                    <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                                                        <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">State:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">

                                                                                                <select name="state_id" id="state_id" required="required" onchange="getCityList(this.value)" style="width:280px">
                                                                                                    <option value=""> Select State </option>
                                                                                                    <?php foreach ($state as $stk => $stv) { ?>
                                                                                                        <?php if ($this->request->data['State']['id'] != $stk) { ?>
                                                                                                            <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                        <?php } else { ?>
                                                                                                            <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">City:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section" id="ctlt" >
                                                                                            <label class="field select">
                                                                                                <select name="city_id" id="city_id" style="width:280px">
                                                                                                    <option value=""> Select State To Get City List </option>
                                                                                                    <?php foreach ($city as $stk => $stv) { ?>
                                                                                                        <?php if ($this->request->data['City']['id'] != $stk) { ?>
                                                                                                            <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                        <?php } else { ?>
                                                                                                            <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">About you:</label><div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <textarea placeholder="About you" name="about" readonly="" id="disabledInput" class="gui-textarea"
                                                                                                          maxlength="1000" readonly><?php echo nl2br($user['User']['about']) ?></textarea>
                                                                                                <label class="field-icon" for="comment"><i class="fa fa-comments"></i></label>
                                                                                                <span class="about_you input-hint">
                                                                                                    For Edit :- <strong class="" style="cursor:pointer;"><a href="#myModal" data-toggle="modal" data-target="#myModal">Click here</a></strong>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--
                                                            <div class="profie-bl1-inner" style="border-top: 10px solid #fff; background:#f2f4fa;">
                                                                <h3>Language Proficiency<br><span>(Please select your language proficiency)</span></h3>
                                                                <div class="form-rates">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <div class="table-responsive for-msg">
                                                                                <input type="hidden" name="counter_value" id="counter_value" value="0">
                                                                                <table class="table table-vcenter table-striped" style=" color: #666;
                                                                                       font-size: 14px;">
                                                                                    <tbody id="charge_panel">
                                                                                    </tbody><thead>
                                                                                        <tr><th>Language</th>
                                                                                            <th>Proficiency</th>
                                                                                            <th>Actions</th>
                                                                                        </tr></thead>
                                                                                    <tbody><tr>
                                                                                            <td colspan="3" id="no_service_found" style="display:none;">No Language found!</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                <div class="form-profile">
                                                                                    <div class="smart-wrap">
                                                                                        <div class="smart-forms smart-container">
                                                                                            <div class="form-profile-block">
                                                                                                <label class="pl" style="width:80px;">Add Language:</label>
                                                                                                <div class="inputContainer">
                                                                                                    <div class="section">
                                                                                                        <label class="field select">
                                                                                                            <select id="services_drop_down" style="width:253px;" onchange="add_language_to_charge_panel(this.value)">
                                                                                                                <option value="">Select Language</option>
                                                                                                                <option id="1" value="1">Portugues</option>
                                                                                                                <option id="2" value="2">Italiano</option>
                                                                                                            </select>
                                                                                                            <i class="arrow double"></i>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            -->
                                                        </div>


                                                        <!--
                                                        <div class="profie-bl2">
                                                            <div class="profie-bl2-inner">
                                                                <h3>Professional Information<br><span>(Please describe your professional skills)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui2">          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Service Type: </label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="availability" class="inputtext " id="service_type" style="width:280px">
                                                                                                    <option value=""> Select Service Type </option>
                                                                                                    <option value="Incall"> Incall Only </option>
                                                                                                    <option value="Incall/Outcall"> Incall/Outcall </option>
                                                                                                    <option value="Outcall"> Outcall Only </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Social Escort :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="switch block">
                                                                                                <input type="checkbox" value="Yes" id="f2" name="social_escort">
                                                                                                <label data-off="No" data-on="Yes" for="f2"></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Porn Star :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="switch block">
                                                                                                <input type="checkbox" value="Yes" id="f1" name="pornstar">
                                                                                                <label data-off="No" data-on="Yes" for="f1"></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Experience :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="experience" class="inputtext " id="experience" style="width:280px">
                                                                                                    <option value=""> Select Experience </option>
                                                                                                    <option value="None">None</option>
                                                                                                    <option value="Some Experience">Some Experience</option>
                                                                                                    <option value="Very Experienced">Very Experienced</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Default 1 Hour Price :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section field">
                                                                                            <label class="field ">
                                                                                                <input type="hidden" name="time" value="1_Hour">
                                                                                                <input type="hidden" name="curency" value="EUR">
                                                                                                <input style="width:49%!important;" placeholder="Incall" type="text" name="price_in_call" id="_in_call" maxlength="6" class="gui-input" value="">
                                                                                                <input style="width:49%!important;" placeholder="Outcall" type="text" name="price_out_call" id="_out_call" maxlength="6" class="gui-input" value="">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="form-profile-block">
                                                                            <label class="pl">&nbsp;</label>
                                                                            <div class="inputContainer">
                                                                                <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        -->

                                                        <div class="profie-bl2" style="border-bottom: 18px solid #fff; margin-top:13px;">
                                                            <div class="profie-bl2-inner">
                                                                <h3>Contact Information<br><span>(Please provide your contact information)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id'] ?>" >
                                                                                <input type="hidden" name="ftype" value="contactinfo" >
                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Contact Number:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Contact Number" class="gui-input" value="<?php echo $this->request->data['User']['phone_no'] ?>" id="phone_no" name="phone_no">
                                                                                                <label class="field-icon" for="phone"><i class="fa fa-phone"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Contact Instruction:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="contact_instruction" name="contact_instruction">
                                                                                                    <option value="">Select One</option>
                                                                                                    <option value="4">SMS Only</option>
                                                                                                    <option value="5">whatsapp Only</option>
                                                                                                    <option value="9">Telephone</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                -->
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Website Url :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Website Url" class="gui-input" value="<?php echo $this->request->data['User']['website_url'] ?>" id="website_url" name="website_url">
                                                                                                <label class="field-icon" for="website"><i class="fa fa-globe"></i></label>
                                                                                                <span style="" class="input-hint"><strong>Hint:</strong>https://www.yourdomain.com</span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Skype ID :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Skype" class="gui-input" value="<?php echo $this->request->data['User']['skypeid'] ?>" id="skype_url" name="skypeid">
                                                                                                <label class="field-icon" for="website"><i class="fa fa-skype"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Facebook ID :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Facebook" class="gui-input" value="<?php echo $this->request->data['User']['facebook_url'] ?>" id="facebook_url" name="facebook_url">
                                                                                                <label class="field-icon" for="website"><i class="fa fa-facebook"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clr"></div>
                                                        <div class="profie-bl3">


                                                            <!--
                                                            <div class="profie-bl3-inner" style="margin-top:68px;">
                                                                <h3>Physical Information<br> <span>(Please describer you physical characteristics)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <br>
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui3">          <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Height:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="height" class="inputtext" id="height" style="width:280px">
                                                                                                    <option value=""> Select Height </option>
                                                                                                    <option value="150">
                                                                                                        4.92                              feet                              150                             cm </option>
                                                                                                    <option value="151">
                                                                                                        4.95                              feet                              151                             cm </option>
                                                                                                    <option value="152">
                                                                                                        4.99                              feet                              152                             cm </option>
                                                                                                    <option value="153">
                                                                                                        5.02                              feet                              153                             cm </option>
                                                                                                    <option value="154">
                                                                                                        5.05                              feet                              154                             cm </option>
                                                                                                    <option value="155">
                                                                                                        5.09                              feet                              155                             cm </option>
                                                                                                    <option value="156">
                                                                                                        5.12                              feet                              156                             cm </option>
                                                                                                    <option value="157">
                                                                                                        5.15                              feet                              157                             cm </option>
                                                                                                    <option value="158">
                                                                                                        5.18                              feet                              158                             cm </option>
                                                                                                    <option value="159">
                                                                                                        5.22                              feet                              159                             cm </option>
                                                                                                    <option value="160">
                                                                                                        5.25                              feet                              160                             cm </option>
                                                                                                    <option value="161">
                                                                                                        5.28                              feet                              161                             cm </option>
                                                                                                    <option value="162">
                                                                                                        5.31                              feet                              162                             cm </option>
                                                                                                    <option value="163">
                                                                                                        5.35                              feet                              163                             cm </option>
                                                                                                    <option value="164">
                                                                                                        5.38                              feet                              164                             cm </option>
                                                                                                    <option value="165">
                                                                                                        5.41                              feet                              165                             cm </option>
                                                                                                    <option value="166">
                                                                                                        5.45                              feet                              166                             cm </option>
                                                                                                    <option value="167">
                                                                                                        5.48                              feet                              167                             cm </option>
                                                                                                    <option value="168">
                                                                                                        5.51                              feet                              168                             cm </option>
                                                                                                    <option value="169">
                                                                                                        5.54                              feet                              169                             cm </option>
                                                                                                    <option value="170">
                                                                                                        5.58                              feet                              170                             cm </option>
                                                                                                    <option value="171">
                                                                                                        5.61                              feet                              171                             cm </option>
                                                                                                    <option value="172">
                                                                                                        5.64                              feet                              172                             cm </option>
                                                                                                    <option value="173">
                                                                                                        5.68                              feet                              173                             cm </option>
                                                                                                    <option value="174">
                                                                                                        5.71                              feet                              174                             cm </option>
                                                                                                    <option value="175">
                                                                                                        5.74                              feet                              175                             cm </option>
                                                                                                    <option value="176">
                                                                                                        5.77                              feet                              176                             cm </option>
                                                                                                    <option value="177">
                                                                                                        5.81                              feet                              177                             cm </option>
                                                                                                    <option value="178">
                                                                                                        5.84                              feet                              178                             cm </option>
                                                                                                    <option value="179">
                                                                                                        5.87                              feet                              179                             cm </option>
                                                                                                    <option value="180">
                                                                                                        5.91                              feet                              180                             cm </option>
                                                                                                    <option value="181">
                                                                                                        5.94                              feet                              181                             cm </option>
                                                                                                    <option value="182">
                                                                                                        5.97                              feet                              182                             cm </option>
                                                                                                    <option value="183">
                                                                                                        6                              feet                              183                             cm </option>
                                                                                                    <option value="184">
                                                                                                        6.04                              feet                              184                             cm </option>
                                                                                                    <option value="185">
                                                                                                        6.07                              feet                              185                             cm </option>
                                                                                                    <option value="186">
                                                                                                        6.1                              feet                              186                             cm </option>
                                                                                                    <option value="187">
                                                                                                        6.14                              feet                              187                             cm </option>
                                                                                                    <option value="188">
                                                                                                        6.17                              feet                              188                             cm </option>
                                                                                                    <option value="189">
                                                                                                        6.2                              feet                              189                             cm </option>
                                                                                                    <option value="190">
                                                                                                        6.23                              feet                              190                             cm </option>
                                                                                                    <option value="191">
                                                                                                        6.27                              feet                              191                             cm </option>
                                                                                                    <option value="192">
                                                                                                        6.3                              feet                              192                             cm </option>
                                                                                                    <option value="193">
                                                                                                        6.33                              feet                              193                             cm </option>
                                                                                                    <option value="194">
                                                                                                        6.36                              feet                              194                             cm </option>
                                                                                                    <option value="195">
                                                                                                        6.4                              feet                              195                             cm </option>
                                                                                                    <option value="196">
                                                                                                        6.43                              feet                              196                             cm </option>
                                                                                                    <option value="197">
                                                                                                        6.46                              feet                              197                             cm </option>
                                                                                                    <option value="198">
                                                                                                        6.5                              feet                              198                             cm </option>
                                                                                                    <option value="199">
                                                                                                        6.53                              feet                              199                             cm </option>
                                                                                                    <option value="200">
                                                                                                        6.56                              feet                              200                             cm </option>
                                                                                                    <option value="201">
                                                                                                        6.59                              feet                              201                             cm </option>
                                                                                                    <option value="202">
                                                                                                        6.63                              feet                              202                             cm </option>
                                                                                                    <option value="203">
                                                                                                        6.66                              feet                              203                             cm </option>
                                                                                                    <option value="204">
                                                                                                        6.69                              feet                              204                             cm </option>
                                                                                                    <option value="205">
                                                                                                        6.73                              feet                              205                             cm </option>
                                                                                                    <option value="206">
                                                                                                        6.76                              feet                              206                             cm </option>
                                                                                                    <option value="207">
                                                                                                        6.79                              feet                              207                             cm </option>
                                                                                                    <option value="208">
                                                                                                        6.82                              feet                              208                             cm </option>
                                                                                                    <option value="209">
                                                                                                        6.86                              feet                              209                             cm </option>
                                                                                                    <option value="210">
                                                                                                        6.89                              feet                              210                             cm </option>
                                                                                                    <option value="211">
                                                                                                        6.92                              feet                              211                             cm </option>
                                                                                                    <option value="212">
                                                                                                        6.96                              feet                              212                             cm </option>
                                                                                                    <option value="213">
                                                                                                        6.99                              feet                              213                             cm </option>
                                                                                                    <option value="214">
                                                                                                        7.02                              feet                              214                             cm </option>
                                                                                                    <option value="215">
                                                                                                        7.05                              feet                              215                             cm </option>
                                                                                                    <option value="216">
                                                                                                        7.09                              feet                              216                             cm </option>
                                                                                                    <option value="217">
                                                                                                        7.12                              feet                              217                             cm </option>
                                                                                                    <option value="218">
                                                                                                        7.15                              feet                              218                             cm </option>
                                                                                                    <option value="219">
                                                                                                        7.18                              feet                              219                             cm </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Weight:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="weight" class="inputtext " id="weight" style="width:280px">
                                                                                                    <option value="">Select Weight</option>
                                                                                                    <option value="80">
                                                                                                        80                              lbs                              36.4                             kg </option>
                                                                                                    <option value="81">
                                                                                                        81                              lbs                              36.8                             kg </option>
                                                                                                    <option value="82">
                                                                                                        82                              lbs                              37.3                             kg </option>
                                                                                                    <option value="83">
                                                                                                        83                              lbs                              37.7                             kg </option>
                                                                                                    <option value="84">
                                                                                                        84                              lbs                              38.2                             kg </option>
                                                                                                    <option value="85">
                                                                                                        85                              lbs                              38.6                             kg </option>
                                                                                                    <option value="86">
                                                                                                        86                              lbs                              39.1                             kg </option>
                                                                                                    <option value="87">
                                                                                                        87                              lbs                              39.5                             kg </option>
                                                                                                    <option value="88">
                                                                                                        88                              lbs                              40                             kg </option>
                                                                                                    <option value="89">
                                                                                                        89                              lbs                              40.5                             kg </option>
                                                                                                    <option value="90">
                                                                                                        90                              lbs                              40.9                             kg </option>
                                                                                                    <option value="91">
                                                                                                        91                              lbs                              41.4                             kg </option>
                                                                                                    <option value="92">
                                                                                                        92                              lbs                              41.8                             kg </option>
                                                                                                    <option value="93">
                                                                                                        93                              lbs                              42.3                             kg </option>
                                                                                                    <option value="94">
                                                                                                        94                              lbs                              42.7                             kg </option>
                                                                                                    <option value="95">
                                                                                                        95                              lbs                              43.2                             kg </option>
                                                                                                    <option value="96">
                                                                                                        96                              lbs                              43.6                             kg </option>
                                                                                                    <option value="97">
                                                                                                        97                              lbs                              44.1                             kg </option>
                                                                                                    <option value="98">
                                                                                                        98                              lbs                              44.5                             kg </option>
                                                                                                    <option value="99">
                                                                                                        99                              lbs                              45                             kg </option>
                                                                                                    <option value="100">
                                                                                                        100                              lbs                              45.5                             kg </option>
                                                                                                    <option value="101">
                                                                                                        101                              lbs                              45.9                             kg </option>
                                                                                                    <option value="102">
                                                                                                        102                              lbs                              46.4                             kg </option>
                                                                                                    <option value="103">
                                                                                                        103                              lbs                              46.8                             kg </option>
                                                                                                    <option value="104">
                                                                                                        104                              lbs                              47.3                             kg </option>
                                                                                                    <option value="105">
                                                                                                        105                              lbs                              47.7                             kg </option>
                                                                                                    <option value="106">
                                                                                                        106                              lbs                              48.2                             kg </option>
                                                                                                    <option value="107">
                                                                                                        107                              lbs                              48.6                             kg </option>
                                                                                                    <option value="108">
                                                                                                        108                              lbs                              49.1                             kg </option>
                                                                                                    <option value="109">
                                                                                                        109                              lbs                              49.5                             kg </option>
                                                                                                    <option value="110">
                                                                                                        110                              lbs                              50                             kg </option>
                                                                                                    <option value="111">
                                                                                                        111                              lbs                              50.5                             kg </option>
                                                                                                    <option value="112">
                                                                                                        112                              lbs                              50.9                             kg </option>
                                                                                                    <option value="113">
                                                                                                        113                              lbs                              51.4                             kg </option>
                                                                                                    <option value="114">
                                                                                                        114                              lbs                              51.8                             kg </option>
                                                                                                    <option value="115">
                                                                                                        115                              lbs                              52.3                             kg </option>
                                                                                                    <option value="116">
                                                                                                        116                              lbs                              52.7                             kg </option>
                                                                                                    <option value="117">
                                                                                                        117                              lbs                              53.2                             kg </option>
                                                                                                    <option value="118">
                                                                                                        118                              lbs                              53.6                             kg </option>
                                                                                                    <option value="119">
                                                                                                        119                              lbs                              54.1                             kg </option>
                                                                                                    <option value="120">
                                                                                                        120                              lbs                              54.5                             kg </option>
                                                                                                    <option value="121">
                                                                                                        121                              lbs                              55                             kg </option>
                                                                                                    <option value="122">
                                                                                                        122                              lbs                              55.5                             kg </option>
                                                                                                    <option value="123">
                                                                                                        123                              lbs                              55.9                             kg </option>
                                                                                                    <option value="124">
                                                                                                        124                              lbs                              56.4                             kg </option>
                                                                                                    <option value="125">
                                                                                                        125                              lbs                              56.8                             kg </option>
                                                                                                    <option value="126">
                                                                                                        126                              lbs                              57.3                             kg </option>
                                                                                                    <option value="127">
                                                                                                        127                              lbs                              57.7                             kg </option>
                                                                                                    <option value="128">
                                                                                                        128                              lbs                              58.2                             kg </option>
                                                                                                    <option value="129">
                                                                                                        129                              lbs                              58.6                             kg </option>
                                                                                                    <option value="130">
                                                                                                        130                              lbs                              59.1                             kg </option>
                                                                                                    <option value="131">
                                                                                                        131                              lbs                              59.5                             kg </option>
                                                                                                    <option value="132">
                                                                                                        132                              lbs                              60                             kg </option>
                                                                                                    <option value="133">
                                                                                                        133                              lbs                              60.5                             kg </option>
                                                                                                    <option value="134">
                                                                                                        134                              lbs                              60.9                             kg </option>
                                                                                                    <option value="135">
                                                                                                        135                              lbs                              61.4                             kg </option>
                                                                                                    <option value="136">
                                                                                                        136                              lbs                              61.8                             kg </option>
                                                                                                    <option value="137">
                                                                                                        137                              lbs                              62.3                             kg </option>
                                                                                                    <option value="138">
                                                                                                        138                              lbs                              62.7                             kg </option>
                                                                                                    <option value="139">
                                                                                                        139                              lbs                              63.2                             kg </option>
                                                                                                    <option value="140">
                                                                                                        140                              lbs                              63.6                             kg </option>
                                                                                                    <option value="141">
                                                                                                        141                              lbs                              64.1                             kg </option>
                                                                                                    <option value="142">
                                                                                                        142                              lbs                              64.5                             kg </option>
                                                                                                    <option value="143">
                                                                                                        143                              lbs                              65                             kg </option>
                                                                                                    <option value="144">
                                                                                                        144                              lbs                              65.5                             kg </option>
                                                                                                    <option value="145">
                                                                                                        145                              lbs                              65.9                             kg </option>
                                                                                                    <option value="146">
                                                                                                        146                              lbs                              66.4                             kg </option>
                                                                                                    <option value="147">
                                                                                                        147                              lbs                              66.8                             kg </option>
                                                                                                    <option value="148">
                                                                                                        148                              lbs                              67.3                             kg </option>
                                                                                                    <option value="149">
                                                                                                        149                              lbs                              67.7                             kg </option>
                                                                                                    <option value="150">
                                                                                                        150                              lbs                              68.2                             kg </option>
                                                                                                    <option value="151">
                                                                                                        151                              lbs                              68.6                             kg </option>
                                                                                                    <option value="152">
                                                                                                        152                              lbs                              69.1                             kg </option>
                                                                                                    <option value="153">
                                                                                                        153                              lbs                              69.5                             kg </option>
                                                                                                    <option value="154">
                                                                                                        154                              lbs                              70                             kg </option>
                                                                                                    <option value="155">
                                                                                                        155                              lbs                              70.5                             kg </option>
                                                                                                    <option value="156">
                                                                                                        156                              lbs                              70.9                             kg </option>
                                                                                                    <option value="157">
                                                                                                        157                              lbs                              71.4                             kg </option>
                                                                                                    <option value="158">
                                                                                                        158                              lbs                              71.8                             kg </option>
                                                                                                    <option value="159">
                                                                                                        159                              lbs                              72.3                             kg </option>
                                                                                                    <option value="160">
                                                                                                        160                              lbs                              72.7                             kg </option>
                                                                                                    <option value="161">
                                                                                                        161                              lbs                              73.2                             kg </option>
                                                                                                    <option value="162">
                                                                                                        162                              lbs                              73.6                             kg </option>
                                                                                                    <option value="163">
                                                                                                        163                              lbs                              74.1                             kg </option>
                                                                                                    <option value="164">
                                                                                                        164                              lbs                              74.5                             kg </option>
                                                                                                    <option value="165">
                                                                                                        165                              lbs                              75                             kg </option>
                                                                                                    <option value="166">
                                                                                                        166                              lbs                              75.5                             kg </option>
                                                                                                    <option value="167">
                                                                                                        167                              lbs                              75.9                             kg </option>
                                                                                                    <option value="168">
                                                                                                        168                              lbs                              76.4                             kg </option>
                                                                                                    <option value="169">
                                                                                                        169                              lbs                              76.8                             kg </option>
                                                                                                    <option value="170">
                                                                                                        170                              lbs                              77.3                             kg </option>
                                                                                                    <option value="171">
                                                                                                        171                              lbs                              77.7                             kg </option>
                                                                                                    <option value="172">
                                                                                                        172                              lbs                              78.2                             kg </option>
                                                                                                    <option value="173">
                                                                                                        173                              lbs                              78.6                             kg </option>
                                                                                                    <option value="174">
                                                                                                        174                              lbs                              79.1                             kg </option>
                                                                                                    <option value="175">
                                                                                                        175                              lbs                              79.5                             kg </option>
                                                                                                    <option value="176">
                                                                                                        176                              lbs                              80                             kg </option>
                                                                                                    <option value="177">
                                                                                                        177                              lbs                              80.5                             kg </option>
                                                                                                    <option value="178">
                                                                                                        178                              lbs                              80.9                             kg </option>
                                                                                                    <option value="179">
                                                                                                        179                              lbs                              81.4                             kg </option>
                                                                                                    <option value="180">
                                                                                                        180                              lbs                              81.8                             kg </option>
                                                                                                    <option value="181">
                                                                                                        181                              lbs                              82.3                             kg </option>
                                                                                                    <option value="182">
                                                                                                        182                              lbs                              82.7                             kg </option>
                                                                                                    <option value="183">
                                                                                                        183                              lbs                              83.2                             kg </option>
                                                                                                    <option value="184">
                                                                                                        184                              lbs                              83.6                             kg </option>
                                                                                                    <option value="185">
                                                                                                        185                              lbs                              84.1                             kg </option>
                                                                                                    <option value="186">
                                                                                                        186                              lbs                              84.5                             kg </option>
                                                                                                    <option value="187">
                                                                                                        187                              lbs                              85                             kg </option>
                                                                                                    <option value="188">
                                                                                                        188                              lbs                              85.5                             kg </option>
                                                                                                    <option value="189">
                                                                                                        189                              lbs                              85.9                             kg </option>
                                                                                                    <option value="190">
                                                                                                        190                              lbs                              86.4                             kg </option>
                                                                                                    <option value="191">
                                                                                                        191                              lbs                              86.8                             kg </option>
                                                                                                    <option value="192">
                                                                                                        192                              lbs                              87.3                             kg </option>
                                                                                                    <option value="193">
                                                                                                        193                              lbs                              87.7                             kg </option>
                                                                                                    <option value="194">
                                                                                                        194                              lbs                              88.2                             kg </option>
                                                                                                    <option value="195">
                                                                                                        195                              lbs                              88.6                             kg </option>
                                                                                                    <option value="196">
                                                                                                        196                              lbs                              89.1                             kg </option>
                                                                                                    <option value="197">
                                                                                                        197                              lbs                              89.5                             kg </option>
                                                                                                    <option value="198">
                                                                                                        198                              lbs                              90                             kg </option>
                                                                                                    <option value="199">
                                                                                                        199                              lbs                              90.5                             kg </option>
                                                                                                    <option value="200">
                                                                                                        200                              lbs                              90.9                             kg </option>
                                                                                                    <option value="201">
                                                                                                        201                              lbs                              91.4                             kg </option>
                                                                                                    <option value="202">
                                                                                                        202                              lbs                              91.8                             kg </option>
                                                                                                    <option value="203">
                                                                                                        203                              lbs                              92.3                             kg </option>
                                                                                                    <option value="204">
                                                                                                        204                              lbs                              92.7                             kg </option>
                                                                                                    <option value="205">
                                                                                                        205                              lbs                              93.2                             kg </option>
                                                                                                    <option value="206">
                                                                                                        206                              lbs                              93.6                             kg </option>
                                                                                                    <option value="207">
                                                                                                        207                              lbs                              94.1                             kg </option>
                                                                                                    <option value="208">
                                                                                                        208                              lbs                              94.5                             kg </option>
                                                                                                    <option value="209">
                                                                                                        209                              lbs                              95                             kg </option>
                                                                                                    <option value="210">
                                                                                                        210                              lbs                              95.5                             kg </option>
                                                                                                    <option value="211">
                                                                                                        211                              lbs                              95.9                             kg </option>
                                                                                                    <option value="212">
                                                                                                        212                              lbs                              96.4                             kg </option>
                                                                                                    <option value="213">
                                                                                                        213                              lbs                              96.8                             kg </option>
                                                                                                    <option value="214">
                                                                                                        214                              lbs                              97.3                             kg </option>
                                                                                                    <option value="215">
                                                                                                        215                              lbs                              97.7                             kg </option>
                                                                                                    <option value="216">
                                                                                                        216                              lbs                              98.2                             kg </option>
                                                                                                    <option value="217">
                                                                                                        217                              lbs                              98.6                             kg </option>
                                                                                                    <option value="218">
                                                                                                        218                              lbs                              99.1                             kg </option>
                                                                                                    <option value="219">
                                                                                                        219                              lbs                              99.5                             kg </option>
                                                                                                    <option value="220">
                                                                                                        220                              lbs                              100                             kg </option>
                                                                                                    <option value="221">
                                                                                                        221                              lbs                              100.5                             kg </option>
                                                                                                    <option value="222">
                                                                                                        222                              lbs                              100.9                             kg </option>
                                                                                                    <option value="223">
                                                                                                        223                              lbs                              101.4                             kg </option>
                                                                                                    <option value="224">
                                                                                                        224                              lbs                              101.8                             kg </option>
                                                                                                    <option value="225">
                                                                                                        225                              lbs                              102.3                             kg </option>
                                                                                                    <option value="226">
                                                                                                        226                              lbs                              102.7                             kg </option>
                                                                                                    <option value="227">
                                                                                                        227                              lbs                              103.2                             kg </option>
                                                                                                    <option value="228">
                                                                                                        228                              lbs                              103.6                             kg </option>
                                                                                                    <option value="229">
                                                                                                        229                              lbs                              104.1                             kg </option>
                                                                                                    <option value="230">
                                                                                                        230                              lbs                              104.5                             kg </option>
                                                                                                    <option value="231">
                                                                                                        231                              lbs                              105                             kg </option>
                                                                                                    <option value="232">
                                                                                                        232                              lbs                              105.5                             kg </option>
                                                                                                    <option value="233">
                                                                                                        233                              lbs                              105.9                             kg </option>
                                                                                                    <option value="234">
                                                                                                        234                              lbs                              106.4                             kg </option>
                                                                                                    <option value="235">
                                                                                                        235                              lbs                              106.8                             kg </option>
                                                                                                    <option value="236">
                                                                                                        236                              lbs                              107.3                             kg </option>
                                                                                                    <option value="237">
                                                                                                        237                              lbs                              107.7                             kg </option>
                                                                                                    <option value="238">
                                                                                                        238                              lbs                              108.2                             kg </option>
                                                                                                    <option value="239">
                                                                                                        239                              lbs                              108.6                             kg </option>
                                                                                                    <option value="240">
                                                                                                        240                              lbs                              109.1                             kg </option>
                                                                                                    <option value="241">
                                                                                                        241                              lbs                              109.5                             kg </option>
                                                                                                    <option value="242">
                                                                                                        242                              lbs                              110                             kg </option>
                                                                                                    <option value="243">
                                                                                                        243                              lbs                              110.5                             kg </option>
                                                                                                    <option value="244">
                                                                                                        244                              lbs                              110.9                             kg </option>
                                                                                                    <option value="245">
                                                                                                        245                              lbs                              111.4                             kg </option>
                                                                                                    <option value="246">
                                                                                                        246                              lbs                              111.8                             kg </option>
                                                                                                    <option value="247">
                                                                                                        247                              lbs                              112.3                             kg </option>
                                                                                                    <option value="248">
                                                                                                        248                              lbs                              112.7                             kg </option>
                                                                                                    <option value="249">
                                                                                                        249                              lbs                              113.2                             kg </option>
                                                                                                    <option value="250">
                                                                                                        250                              lbs                              113.6                             kg </option>
                                                                                                    <option value="251">
                                                                                                        251                              lbs                              114.1                             kg </option>
                                                                                                    <option value="252">
                                                                                                        252                              lbs                              114.5                             kg </option>
                                                                                                    <option value="253">
                                                                                                        253                              lbs                              115                             kg </option>
                                                                                                    <option value="254">
                                                                                                        254                              lbs                              115.5                             kg </option>
                                                                                                    <option value="255">
                                                                                                        255                              lbs                              115.9                             kg </option>
                                                                                                    <option value="256">
                                                                                                        256                              lbs                              116.4                             kg </option>
                                                                                                    <option value="257">
                                                                                                        257                              lbs                              116.8                             kg </option>
                                                                                                    <option value="258">
                                                                                                        258                              lbs                              117.3                             kg </option>
                                                                                                    <option value="259">
                                                                                                        259                              lbs                              117.7                             kg </option>
                                                                                                    <option value="260">
                                                                                                        260                              lbs                              118.2                             kg </option>
                                                                                                    <option value="261">
                                                                                                        261                              lbs                              118.6                             kg </option>
                                                                                                    <option value="262">
                                                                                                        262                              lbs                              119.1                             kg </option>
                                                                                                    <option value="263">
                                                                                                        263                              lbs                              119.5                             kg </option>
                                                                                                    <option value="264">
                                                                                                        264                              lbs                              120                             kg </option>
                                                                                                    <option value="265">
                                                                                                        265                              lbs                              120.5                             kg </option>
                                                                                                    <option value="266">
                                                                                                        266                              lbs                              120.9                             kg </option>
                                                                                                    <option value="267">
                                                                                                        267                              lbs                              121.4                             kg </option>
                                                                                                    <option value="268">
                                                                                                        268                              lbs                              121.8                             kg </option>
                                                                                                    <option value="269">
                                                                                                        269                              lbs                              122.3                             kg </option>
                                                                                                    <option value="270">
                                                                                                        270                              lbs                              122.7                             kg </option>
                                                                                                    <option value="271">
                                                                                                        271                              lbs                              123.2                             kg </option>
                                                                                                    <option value="272">
                                                                                                        272                              lbs                              123.6                             kg </option>
                                                                                                    <option value="273">
                                                                                                        273                              lbs                              124.1                             kg </option>
                                                                                                    <option value="274">
                                                                                                        274                              lbs                              124.5                             kg </option>
                                                                                                    <option value="275">
                                                                                                        275                              lbs                              125                             kg </option>
                                                                                                    <option value="276">
                                                                                                        276                              lbs                              125.5                             kg </option>
                                                                                                    <option value="277">
                                                                                                        277                              lbs                              125.9                             kg </option>
                                                                                                    <option value="278">
                                                                                                        278                              lbs                              126.4                             kg </option>
                                                                                                    <option value="279">
                                                                                                        279                              lbs                              126.8                             kg </option>
                                                                                                    <option value="280">
                                                                                                        280                              lbs                              127.3                             kg </option>
                                                                                                    <option value="281">
                                                                                                        281                              lbs                              127.7                             kg </option>
                                                                                                    <option value="282">
                                                                                                        282                              lbs                              128.2                             kg </option>
                                                                                                    <option value="283">
                                                                                                        283                              lbs                              128.6                             kg </option>
                                                                                                    <option value="284">
                                                                                                        284                              lbs                              129.1                             kg </option>
                                                                                                    <option value="285">
                                                                                                        285                              lbs                              129.5                             kg </option>
                                                                                                    <option value="286">
                                                                                                        286                              lbs                              130                             kg </option>
                                                                                                    <option value="287">
                                                                                                        287                              lbs                              130.5                             kg </option>
                                                                                                    <option value="288">
                                                                                                        288                              lbs                              130.9                             kg </option>
                                                                                                    <option value="289">
                                                                                                        289                              lbs                              131.4                             kg </option>
                                                                                                    <option value="290">
                                                                                                        290                              lbs                              131.8                             kg </option>
                                                                                                    <option value="291">
                                                                                                        291                              lbs                              132.3                             kg </option>
                                                                                                    <option value="292">
                                                                                                        292                              lbs                              132.7                             kg </option>
                                                                                                    <option value="293">
                                                                                                        293                              lbs                              133.2                             kg </option>
                                                                                                    <option value="294">
                                                                                                        294                              lbs                              133.6                             kg </option>
                                                                                                    <option value="295">
                                                                                                        295                              lbs                              134.1                             kg </option>
                                                                                                    <option value="296">
                                                                                                        296                              lbs                              134.5                             kg </option>
                                                                                                    <option value="297">
                                                                                                        297                              lbs                              135                             kg </option>
                                                                                                    <option value="298">
                                                                                                        298                              lbs                              135.5                             kg </option>
                                                                                                    <option value="299">
                                                                                                        299                              lbs                              135.9                             kg </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Body Type:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="body_type" class="inputtext " id="body_type" style="width:280px">
                                                                                                    <option value=""> Select Body Type </option>
                                                                                                    <option value="1">
                                                                                                        Athletic                              </option>
                                                                                                    <option value="3">
                                                                                                        BBW                              </option>
                                                                                                    <option value="4">
                                                                                                        Busty                              </option>
                                                                                                    <option value="6">
                                                                                                        Petite                              </option>
                                                                                                    <option value="8">
                                                                                                        Slim                              </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" id="hidden" value="Female" name="hidden">
                                                                                <div id="femaleFeild" style="">
                                                                                    <div class="form-profile-block">
                                                                                        <label class="pl">Bust:</label>
                                                                                        <div class="inputContainer">
                                                                                            <div class="section">
                                                                                                <label class="field select">
                                                                                                    <select id="bust" class="inputtext" name="bust" style="width:280px">
                                                                                                        <option value=""> Select Bust Size </option>
                                                                                                        <option value="Not Applicable"> Not Applicable </option>
                                                                                                        <option value="20">
                                                                                                            20                             cm </option>
                                                                                                        <option value="21">
                                                                                                            21                             cm </option>
                                                                                                        <option value="22">
                                                                                                            22                             cm </option>
                                                                                                        <option value="23">
                                                                                                            23                             cm </option>
                                                                                                        <option value="24">
                                                                                                            24                             cm </option>
                                                                                                        <option value="25">
                                                                                                            25                             cm </option>
                                                                                                        <option value="26">
                                                                                                            26                             cm </option>
                                                                                                        <option value="27">
                                                                                                            27                             cm </option>
                                                                                                        <option value="28">
                                                                                                            28                             cm </option>
                                                                                                        <option value="29">
                                                                                                            29                             cm </option>
                                                                                                        <option value="30">
                                                                                                            30                             cm </option>
                                                                                                        <option value="31">
                                                                                                            31                             cm </option>
                                                                                                        <option value="32">
                                                                                                            32                             cm </option>
                                                                                                        <option value="33">
                                                                                                            33                             cm </option>
                                                                                                        <option value="34">
                                                                                                            34                             cm </option>
                                                                                                        <option value="35">
                                                                                                            35                             cm </option>
                                                                                                        <option value="36">
                                                                                                            36                             cm </option>
                                                                                                        <option value="37">
                                                                                                            37                             cm </option>
                                                                                                        <option value="38">
                                                                                                            38                             cm </option>
                                                                                                        <option value="39">
                                                                                                            39                             cm </option>
                                                                                                        <option value="40">
                                                                                                            40                             cm </option>
                                                                                                        <option value="41">
                                                                                                            41                             cm </option>
                                                                                                        <option value="42">
                                                                                                            42                             cm </option>
                                                                                                        <option value="43">
                                                                                                            43                             cm </option>
                                                                                                        <option value="44">
                                                                                                            44                             cm </option>
                                                                                                        <option value="45">
                                                                                                            45                             cm </option>
                                                                                                        <option value="46">
                                                                                                            46                             cm </option>
                                                                                                        <option value="47">
                                                                                                            47                             cm </option>
                                                                                                        <option value="48">
                                                                                                            48                             cm </option>
                                                                                                        <option value="49">
                                                                                                            49                             cm </option>
                                                                                                    </select>
                                                                                                    <i class="arrow double"></i>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-profile-block">
                                                                                        <label class="pl">Cup Size:</label>
                                                                                        <div class="inputContainer">
                                                                                            <div class="section">
                                                                                                <label class="field select">
                                                                                                    <select name="cup_size" class="inputtext" id="cup_size" style="width:280px">
                                                                                                        <option value=""> Select Cup Size </option>
                                                                                                    </select>
                                                                                                    <i class="arrow double"></i>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Eye Color:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="eye_color_id" class="inputtext" id="eye_color_id" style="width:280px">
                                                                                                    <option value=""> Select Eye color </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Hair Color:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select name="hair_color_id" class="inputtext" id="hair_color_id" style="width:280px">
                                                                                                    <option value=""> Select Hair Color </option>
                                                                                                    <option value="1">
                                                                                                        Black                              </option>
                                                                                                    <option value="2">
                                                                                                        Brown                              </option>
                                                                                                    <option value="3">
                                                                                                        Blonde                              </option>
                                                                                                    <option value="5">
                                                                                                        Red                              </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="pinfo" id="pinfo" value="Save">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clr"></div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clr"></div>
                                                            -->
                                                            <!--
                                                            <div class="profie-bl4">
                                                                <div class="profie-bl4-inner" style="border-top: 10px solid #fff; background:#f2f4fa;">
                                                                    <h3>Locality<br> <span>(Please describe your Location)</span></h3>
                                                                    <div class="form-profile">
                                                                        <div class="smart-wrap">
                                                                            <div class="smart-forms smart-container">
                                                                                <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="edit_location">			<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                    <br>
                                                                                    <div class="form-profile">
                                                                                        <label class="pl">Address :</label>
                                                                                        <div class="inputContainer">
                                                                                            <div class="section">
                                                                                                <label class="field prepend-icon">
                                                                                                    <input type="text" placeholder="type get your location" class="gui-input" id="currentlocation" name="address" value="" autocomplete="off">
                                                                                                    <center><div id="mapCanvas" style="height: 250px; width: 100%; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 55px 49px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 132px; top: -188px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 132px; top: 68px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 388px; top: -188px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 388px; top: 68px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -124px; top: -188px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -124px; top: 68px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 644px; top: -188px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 644px; top: 68px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 132px; top: -188px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 132px; top: 68px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 388px; top: -188px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 388px; top: 68px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -124px; top: -188px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -124px; top: 68px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 644px; top: -188px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 644px; top: 68px;"></div></div></div><div style="width: 22px; height: 40px; overflow: hidden; position: absolute; left: 121px; top: 28px; z-index: 68;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; opacity: 1;"></div></div><div style="position: absolute; z-index: 0; transform: translateZ(0px); left: 0px; top: 0px;"><div style="overflow: hidden; width: 729px; height: 250px;"><img src="https://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i8060&amp;2i8124&amp;2e1&amp;3u6&amp;4m2&amp;1u729&amp;2u250&amp;5m5&amp;1e0&amp;5sen-GB&amp;6sus&amp;10b1&amp;12b1&amp;token=10834" style="width: 729px; height: 250px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="transform: translateZ(0px); position: absolute; left: 132px; top: -188px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i32!3i31!4i256!2m3!1e0!2sm!3i355026845!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=37983" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 388px; top: -188px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i33!3i31!4i256!2m3!1e0!2sm!3i355026845!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=95170" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 132px; top: 68px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i32!3i32!4i256!2m3!1e0!2sm!3i355026821!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=51297" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 388px; top: 68px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i33!3i32!4i256!2m3!1e0!2sm!3i355026821!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=108484" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -124px; top: -188px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i31!3i31!4i256!2m3!1e0!2sm!3i355026845!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=111867" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -124px; top: 68px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i31!3i32!4i256!2m3!1e0!2sm!3i355026821!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=125181" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 644px; top: -188px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i34!3i31!4i256!2m3!1e0!2sm!3i355026821!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=129650" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 644px; top: 68px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i6!2i34!3i32!4i256!2m3!1e0!2sm!3i355026821!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=34600" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Use two fingers to move the map</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 55px 49px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" style="width: 22px; height: 40px; overflow: hidden; position: absolute; opacity: 0.01; left: 121px; top: 28px; z-index: 68;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; opacity: 1;"><map name="gmimap0" id="gmimap0"><area href="javascript:void(0)" log="miw" coords="8,0,5,1,4,2,3,3,2,4,2,5,1,6,1,7,0,8,0,14,1,15,1,16,2,17,2,18,3,19,3,20,4,21,5,22,5,23,6,24,7,25,7,27,8,28,8,29,9,30,9,33,10,34,10,40,11,40,11,34,12,33,12,30,13,29,13,28,14,27,14,25,15,24,16,23,16,22,17,21,18,20,18,19,19,18,19,17,20,16,20,15,21,14,21,8,20,7,20,6,19,5,19,4,18,3,17,2,16,1,14,1,13,0,8,0" shape="poly" title="ReferSell" style="cursor: pointer;"></map></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=-1.252342,5.108643&amp;z=6&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 215px; top: 35px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data \A92016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data \A92016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data \A92016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@-1.2523417,5.1086426,6z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; width: 28px; height: 55px; background-color: rgb(255, 255, 255);"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; top: 0px; background-color: rgb(230, 230, 230);"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; min-width: 40px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></center>
                                                                                                    <div id="infoPanel">
                                                                                                        <input type="hidden" name="gps_latitude" id="lat" value="0">
                                                                                                        <input type="hidden" name="gps_longitude" id="lng" value="0">
                                                                                                        <div id="info"></div>
                                                                                                    </div>

                                                                                                    <label class="field-icon" for="currentlocation"><i class="fa fa-map-marker"></i></label>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-profile-block">
                                                                                        <label class="pl">&nbsp;</label>
                                                                                        <div class="inputContainer">
                                                                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                                        </div>
                                                                                    </div>  <div class="clr"></div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            -->
                                                        </div>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">About You</h4>
            </div>
            <div class="modal-body">
                <textarea name="about" id="about" rows="10" cols="100" style="width:98%;" ><?php echo $user['User']['about'] ?></textarea>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="saveAboutMe('<?php echo $this->Session->read('fuid') ?>');" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal End -->
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
            url: "<?php echo $this->Html->url('/'); ?>users/editEscortAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'editescortprofile')); ?>";
        });
    }
</script>