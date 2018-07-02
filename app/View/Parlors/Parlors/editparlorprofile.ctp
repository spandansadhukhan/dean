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
                                                <?php echo $this->element('parlor_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left" style="width: 100%;">
                                                            <h1 style="display:inline-block; width: 97%;"> My Profile</h1>
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div class="profie-bl1">
                                                            <div class="profie-bl1-inner">
                                                                <h3>Basic Information<br><span>(Please describe basic information about parlour)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_basic">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id']?>" >
                                                                                <input type="hidden" name="ftype" value="persionalinfo" >
                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Parlour Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
                                                                                                <input type="text" placeholder="Parlour Name" class="gui-input" id="from" value="<?php echo $this->request->data['User']['org_name']?>" name="org_name">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">About you:</label><div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <textarea placeholder="About you" name="about" readonly="" id="disabledInput" class="gui-textarea"
                                                                                                          maxlength="1000" readonly><?php echo nl2br($user['User']['about'])?></textarea>
                                                                                                <label class="field-icon" for="comment"><i class="fa fa-comments"></i></label>
                                                                                                <span class="about_you input-hint">
                                                                                                    For Edit :- <strong class="" style="cursor:pointer;"><a href="#myModal" data-toggle="modal" data-target="#myModal">Click here</a></strong>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Year opened:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
                                                                                                <input type="text" placeholder="Year opened" class="gui-input" id="from" value="" name="year_opened" maxlength="4">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                -->
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
                                                        <div class="profie-bl2" style="border-bottom: 18px solid #fff;">
                                                            <div class="profie-bl2-inner">
                                                                <h3>Contact Information <br> <span>(Please describe Parlour contact information)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">



                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id']?>" >
                                                                                <input type="hidden" name="ftype" value="contactinfo" >
                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Contact Number:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Contact Number" class="gui-input" value="<?php echo $this->request->data['User']['phone_no']?>" id="phone_no" name="phone_no">
                                                                                                <label class="field-icon" for="phone"><i class="fa fa-phone"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Website Url :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Website Url" class="gui-input" value="<?php echo $this->request->data['User']['website_url']?>" id="website_url" name="website_url">
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
                                                                                                <input type="text" placeholder="Skype" class="gui-input" value="<?php echo $this->request->data['User']['skypeid']?>" id="skype_url" name="skypeid">
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
                                                                                                <input type="text" placeholder="Facebook" class="gui-input" value="<?php echo $this->request->data['User']['facebook_url']?>" id="facebook_url" name="facebook_url">
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

                                                                            <!--
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_contact">		<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <input type="hidden" name="task" value="update_contact_info">
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl"> Contact Person Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Contact Person Name" class="gui-input" id="contact_person_name" name="contact_person_name" value="asasdvcdsvcd">
                                                                                                <label class="field-icon" for="contact_person_name"><i class="fa fa-user"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Contact Number:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Contact Number" class="gui-input" id="phone" name="phone" value="45354354353">
                                                                                                <label class="field-icon" for="password"><i class="fa fa-phone"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Reservation Phone:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="Reservation Phone" class="gui-input" id="reservation_phone" name="reservation_phone" value="">
                                                                                                <label class="field-icon" for="reservation_phone"><i class="fa fa-mobile"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Email Address: </label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="email" placeholder="Email Address" class="gui-input" id="email" name="email" value="subrata.nits@gmail.com" readonly="" disabled="" style="color: gray; cursor: not-allowed;">
                                                                                                <label class="field-icon" for="email"><i class="fa fa-envelope"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Preferred Contact:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="preferred_contact" class="inputtext" name="contact_instruction" style="width:280px">
                                                                                                    <option value="">select preferred contact</option>
                                                                                                    <option value="6">Whatsapp</option>
                                                                                                    <option value="7">Telephone</option>
                                                                                                    <option value="8">Email</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Website Url :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="url" placeholder="URL input" class="gui-input" id="website_url" name="website_url" value="">
                                                                                                <label class="field-icon" for="website_url"><i class="fa fa-globe"></i></label>
                                                                                                <span style="" class="input-hint"><strong>Hint:</strong> http://www.sitename.com</span>
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
                                                                            -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clr"></div>




                                                        <!--
                                                        <div class="profie-bl1" style="border-top: 10px solid #fff; background:#f2f4fa;">
                                                            <div class="profie-bl1-inner">
                                                                <h3>Services<br><span>(Please select your Services)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_service">							  <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <br>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Add Service:</label>
                                                                                    <div class="inputContainer" style="width: 70%;">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="service_list" class="choseBlock">
                                                                                                    <option value="">Select Service</option>
                                                                                                    <option data-name="Full Body Sensual Massage" data-value="s_1" value="1" id="s_1">Full Body Sensual Massage</option>
                                                                                                    <option data-name="Swedish massage" data-value="s_2" value="2" id="s_2">Swedish massage</option>
                                                                                                    <option data-name="Anal massage" data-value="s_3" value="3" id="s_3">Anal massage</option>
                                                                                                    <option data-name="Intimate massage" data-value="s_4" value="4" id="s_4">Intimate massage</option>
                                                                                                    <option data-name="Erotic massage" data-value="s_5" value="5" id="s_5">Erotic massage</option>
                                                                                                    <option data-name="Tantric massage" data-value="s_6" value="6" id="s_6">Tantric massage</option>
                                                                                                    <option data-name="Prostate Massage" data-value="s_7" value="7" id="s_7">Prostate Massage</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block block-containor">
                                                                                    <input name="is_form" value="Yes" type="hidden">
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="clr"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="profie-bl2" style="border-top: 10px solid #fff; background:#f2f4fa;">
                                                            <div class="profie-bl2-inner">
                                                                <h3>Categories<br><span>(Please select categories your parlour provides)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_category">							<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <br>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Add Category:</label>
                                                                                    <div class="inputContainer" style="width: 70%;">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="cat_list" class="choseBlock">
                                                                                                    <option value="">Please select categories your parlour provides</option>
                                                                                                    <option data-name="Anma" data-value="c_1" value="1" id="c_1">Anma</option>
                                                                                                    <option data-name="Aromatherapy" data-value="c_2" value="2" id="c_2">Aromatherapy</option>
                                                                                                    <option data-name="Aston Patterning" data-value="c_3" value="3" id="c_3">Aston Patterning</option>
                                                                                                    <option data-name="Ayurvedic Massage" data-value="c_4" value="4" id="c_4">Ayurvedic Massage</option>
                                                                                                    <option data-name="Biodynamic Massage" data-value="c_5" value="5" id="c_5">Biodynamic Massage</option>
                                                                                                    <option data-name="Chavutti Thirumal" data-value="c_6" value="6" id="c_6">Chavutti Thirumal</option>
                                                                                                    <option data-name="Hellerwork" data-value="c_7" value="7" id="c_7">Hellerwork</option>
                                                                                                    <option data-name="Indian Head Massage" data-value="c_8" value="8" id="c_8">Indian Head Massage</option>
                                                                                                    <option data-name="Kahuna" data-value="c_9" value="9" id="c_9">Kahuna</option>
                                                                                                    <option data-name="Lomi" data-value="c_10" value="10" id="c_10">Lomi</option>
                                                                                                    <option data-name="Manual Lymphatic Drainage" data-value="c_11" value="11" id="c_11">Manual Lymphatic Drainage</option>
                                                                                                    <option data-name="Remedial Massage" data-value="c_12" value="12" id="c_12">Remedial Massage</option>
                                                                                                    <option data-name="Thai Massage" data-value="c_13" value="13" id="c_13">Thai Massage</option>
                                                                                                    <option data-name="Asian Massage" data-value="c_14" value="14" id="c_14">Asian Massage</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block block-containor">
                                                                                    <input name="is_form" value="Yes" type="hidden">
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            <div class="clr">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clr"></div>
                                                        <div class="profie-bl4">
                                                            <div class="profie-bl4-inner">
                                                                <h3>Parlour Locality<br> <span>(Please describe your Parlour Location)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_location">			<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <br>
                                                                                <div class="form-profile">
                                                                                    <label class="pl">Address :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <input type="text" placeholder="type here to get your Parlour location" class="gui-input" id="currentlocation" name="address" value="36, Lee Road, Sreepally, Kolkata, West Bengal, India" autocomplete="off">
                                                                                                <center><div id="mapCanvas" style="height: 250px; width: 100%; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 153px; top: -14px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 153px; top: 242px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 409px; top: -14px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 409px; top: 242px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -103px; top: -14px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -103px; top: 242px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 665px; top: -14px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 665px; top: 242px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 153px; top: -14px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 153px; top: 242px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 409px; top: -14px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 409px; top: 242px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -103px; top: -14px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -103px; top: 242px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 665px; top: -14px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 665px; top: 242px;"></div></div></div><div style="width: 22px; height: 40px; overflow: hidden; position: absolute; left: 354px; top: 85px; z-index: 125;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; z-index: 0; transform: translateZ(0px); left: 0px; top: 0px;"><div style="overflow: hidden; width: 729px; height: 250px;"><img src="https://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i48487&amp;2i28430&amp;2e1&amp;3u8&amp;4m2&amp;1u729&amp;2u250&amp;5m5&amp;1e0&amp;5sen-GB&amp;6sus&amp;10b1&amp;12b1&amp;token=128989" style="width: 729px; height: 250px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="transform: translateZ(0px); position: absolute; left: 153px; top: -14px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i190!3i111!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=83919" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 153px; top: 242px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i190!3i112!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=119940" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 409px; top: -14px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i191!3i111!4i256!2m3!1e0!2sm!3i355027073!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=95777" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 409px; top: 242px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i191!3i112!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=37658" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -103px; top: -14px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i189!3i111!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=109475" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -103px; top: 242px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i189!3i112!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=14425" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 665px; top: -14px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i192!3i111!4i256!2m3!1e0!2sm!3i355027193!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=48582" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 665px; top: 242px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i192!3i112!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=12572" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Use two fingers to move the map</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" style="width: 22px; height: 40px; overflow: hidden; position: absolute; opacity: 0.01; left: 354px; top: 85px; z-index: 125;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area href="javascript:void(0)" log="miw" coords="8,0,5,1,4,2,3,3,2,4,2,5,1,6,1,7,0,8,0,14,1,15,1,16,2,17,2,18,3,19,3,20,4,21,5,22,5,23,6,24,7,25,7,27,8,28,8,29,9,30,9,33,10,34,10,40,11,40,11,34,12,33,12,30,13,29,13,28,14,27,14,25,15,24,16,23,16,22,17,21,18,20,18,19,19,18,19,17,20,16,20,15,21,14,21,8,20,7,20,6,19,5,19,4,18,3,17,2,16,1,14,1,13,0,8,0" shape="poly" title="ReferSell" style="cursor: pointer;"></map></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=22.53904,88.349414&amp;z=8&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 215px; top: 35px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data \A92016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data \A92016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data \A92016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@22.53904,88.3494141,8z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; width: 28px; height: 55px; background-color: rgb(255, 255, 255);"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; top: 0px; background-color: rgb(230, 230, 230);"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; min-width: 40px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></center>
                                                                                                <div id="infoPanel">
                                                                                                    <input type="hidden" name="gps_latitude" id="lat" value="22.53904">
                                                                                                    <input type="hidden" name="gps_longitude" id="lng" value="88.34941409999999">
                                                                                                    <div id="info"></div>
                                                                                                </div>

                                                                                                <label class="field-icon" for="currentlocation"><i class="fa fa-map-marker"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Country:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select class="" onchange="getRegion(this.value)" id="country" name="country_id" style="width:280px">
                                                                                                    <option value="">Select Country</option>
                                                                                                    <option value="25">Argentina </option>
                                                                                                    <option selected="selected" value="6">Australia </option>
                                                                                                    <option value="73">Austria </option>
                                                                                                    <option value="12">Bahamas </option>
                                                                                                    <option value="79">Bahrain </option>
                                                                                                    <option value="15">Bangladesh </option>
                                                                                                    <option value="22">Belgium </option>
                                                                                                    <option value="49">Bolivia </option>
                                                                                                    <option value="13">Brazil </option>
                                                                                                    <option value="14">Bulgaria </option>
                                                                                                    <option value="27">Cameroon </option>
                                                                                                    <option value="1">Canada </option>
                                                                                                    <option value="65">Chile </option>
                                                                                                    <option value="17">China </option>
                                                                                                    <option value="32">Costa Rica </option>
                                                                                                    <option value="87">Cyprus </option>
                                                                                                    <option value="62">Czech Republic </option>
                                                                                                    <option value="48">Denmark </option>
                                                                                                    <option value="34">Dominican Republic </option>
                                                                                                    <option value="64">Ecuador </option>
                                                                                                    <option value="82">Egypt </option>
                                                                                                    <option value="35">El Salvador </option>
                                                                                                    <option value="42">Finland </option>
                                                                                                    <option value="21">France </option>
                                                                                                    <option value="19">Germany </option>
                                                                                                    <option value="86">Greece </option>
                                                                                                    <option value="39">Guam </option>
                                                                                                    <option value="40">Guatemala </option>
                                                                                                    <option value="43">Hong Kong </option>
                                                                                                    <option value="24">Hungary </option>
                                                                                                    <option value="44">Iceland </option>
                                                                                                    <option value="7">India </option>
                                                                                                    <option value="46">Indonesia </option>
                                                                                                    <option value="18">Ireland </option>
                                                                                                    <option value="41">Israel </option>
                                                                                                    <option value="20">Italy </option>
                                                                                                    <option value="47">Jamaica </option>
                                                                                                    <option value="37">Japan </option>
                                                                                                    <option value="76">Jordan </option>
                                                                                                    <option value="26">Korea </option>
                                                                                                    <option value="80">Kuwait </option>
                                                                                                    <option value="83">Lebanon </option>
                                                                                                    <option value="51">Luxembourg </option>
                                                                                                    <option value="52">Malaysia </option>
                                                                                                    <option value="53">Malta </option>
                                                                                                    <option value="5">Mexico </option>
                                                                                                    <option value="56">Morocco </option>
                                                                                                    <option value="9">Netherlands </option>
                                                                                                    <option value="78">New Zealand </option>
                                                                                                    <option value="54">Nicaragua </option>
                                                                                                    <option value="58">Nigeria </option>
                                                                                                    <option value="59">Norway </option>
                                                                                                    <option value="60">Pakistan </option>
                                                                                                    <option value="61">Panama </option>
                                                                                                    <option value="50">Peru </option>
                                                                                                    <option value="31">Philippines </option>
                                                                                                    <option value="63">Poerto Rico </option>
                                                                                                    <option value="72">Poland </option>
                                                                                                    <option value="36">Portugal </option>
                                                                                                    <option value="81">Qatar </option>
                                                                                                    <option value="23">Romania </option>
                                                                                                    <option value="57">Russia </option>
                                                                                                    <option value="67">Singapore </option>
                                                                                                    <option value="28">South Africa </option>
                                                                                                    <option value="8">Spain </option>
                                                                                                    <option value="38">Sweden </option>
                                                                                                    <option value="16">Switzerland </option>
                                                                                                    <option value="68">Taiwan </option>
                                                                                                    <option value="84">Thailand </option>
                                                                                                    <option value="77">Turkey </option>
                                                                                                    <option value="69">Ukraine </option>
                                                                                                    <option value="4">United Arab Emirates </option>
                                                                                                    <option value="2">United Kingdom </option>
                                                                                                    <option value="3">United States </option>
                                                                                                    <option value="55">Uruguay </option>
                                                                                                    <option value="29">Venezuela </option>
                                                                                                    <option value="70">VietNam </option>
                                                                                                    <option value="71">Virgin Islands </option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block" id="region_div" style="display:none">
                                                                                    <label class="pl">State / County:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="region" name="region_id" onchange="getCity(this.value)" class="form-control" size="1" style="width:280px">
                                                                                                    <option value="">-Select Country First</option>
                                                                                                </select>
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">City:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <select id="city" class="" name="city_id" style="width:280px">
                                                                                                    <option value="6">
                                                                                                        Adelaide											  </option>
                                                                                                    <option value="78" selected="selected">
                                                                                                        Brisbane											  </option>
                                                                                                    <option value="97">
                                                                                                        Canberra											  </option>
                                                                                                    <option value="154">
                                                                                                        Darwin											  </option>
                                                                                                    <option value="268">
                                                                                                        Hobart											  </option>
                                                                                                    <option value="393">
                                                                                                        Melbourne											  </option>
                                                                                                    <option value="489">
                                                                                                        Perth											  </option>
                                                                                                    <option value="627">
                                                                                                        Sydney											  </option>
                                                                                                </select>

                                                                                                <i class="arrow double"></i>
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
          <textarea name="about" id="about" rows="10" cols="100" style="width:98%;" ><?php echo $user['User']['about']?></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveAboutMe('<?php echo $this->Session->read('fuid')?>');" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal End -->
<style>
	.modal-backdrop.in {position: relative;}
</style>

<script>
    function saveAboutMe(id){
        if ($("#about").val() == "") {
            alert("About You Cannot Empty!");
            $("#about").focus();
            return false;
        }
        var aboutData = $("#about").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/editParlorAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
                //$("#about").val(aboutData);
               //$("#myModal").modal('hide');
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'editparlorprofile')); ?>";
        });
    }
</script>