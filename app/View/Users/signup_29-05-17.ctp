<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <iframe src="<?php echo $this->webroot.'users/slider' ?>" width="100%" height="328px;" frameborder="0" marginheight="0" marginwidth="0"></iframe>
<section class="submenu">
    <div class="sb-toggle-left-inner"> <a class="menu-icon">
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
        </a> </div>
    <ul class="clear">
        <li> <a href="<?php echo $this->Html->url('/');?>online-escorts">Online Escorts</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
       <!--  <li> <a href="<?php echo $this->Html->url('/');?>latest-status">Latest Statuses</a></li> -->
        <li> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
        <li> <a href="<?php echo $this->webroot ?>pages/workrooms">Work Rooms</a></li>
        <li> <a href="<?php echo $this->webroot ?>pages/blog">Blogs</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
            <ul>
                <!-- <li><a href="<?php echo $this->Html->url('/');?>allfaq">All FAQ</a></li> -->
                <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>general-faq">ESCORT FAQs</a></li>
            </ul>
        </li>
<!--        <li> <a href="<?php echo $this->webroot ?>classified-ads">Classified Ads</a></li>-->
        <li> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    </ul>
</section>
<section id="contentsection">

    <div class="col-left">
        <script type="text/javascript">
         // $("#gender").hide();
    function show_hide(user_type){
            if(user_type == 'E' || user_type == 'S' || user_type == 'U'){
                $(".gender").show();
                if(user_type == 'S'){
                    $(".strp").show();
                }else{
                     $(".strp").hide();
                }
            }else{
                $(".gender").hide();
                $(".strp").hide();
            }
 }
            function getStateCityList(cid) {
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

            function getCityList(cid) {
                //alert(cid);
                $.ajax({
                    type: "POST",
                    url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfCountry/",
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
                        //url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
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

            function show_stripper_type()
            {
                $(".ts").show();

                  // $(".ts").slideDown("slow", function(){
                  // });
            }

        </script>
        <style>
            .t1 span {
                color: #ff0000;
            }
        </style>
        
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <div class="in-content">
                            <div class="for-escort" style="width:auto; float:none;background: none;" >
                            
                                <h2 class="title p-no-mar" style="margin: 0 0 0 0px;">Register Here</h2>
                                <div class="for-escort-inner" style="margin: 13px 0 0;width: 99%;">
                                    <div class="escort-register">
                                        <div class="clr"></div>
                                        <div class="register_con">
                                            <form action="" method="post" accept-charset="utf-8"  id="form-ui">
                                                <!-- <form id="form-ui" action="" method="post"> -->
                                                <!-- <h3 class="rheading"> Your Account Type : <font style="color:#b225b5;">Independent Escort / Private Girl </font></h3> -->
                                                <div class="clr"></div>
                                                <h3 class="rheading"> Personal Information </h3>
                                                <div class="smart-forms">
                                                    <div class="ajax_report notification spacer-t5 form-msg">
                                                        <a class="close-btn" onClick="close_div();" href="javascript:;">\D7</a>
                                                        <div class="ajax_message">Hello Message</div>
                                                    </div>
                                                </div>
                                                <br>
                                                <section class="tom1">
                                                    <section class="t1">
                                                        <label for="label"> <!-- User -->Member Type : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="user_type" id="user_type" required="required" class="form-control" onchange="show_hide(this.value)" size="1">
                                                                <option value=""> Select Member Type </option>
                                                                    <?php foreach ($utype as $ut) { ?>
                                                                    <option  value="<?php echo $ut['UserType']['type'] ?>"><?php echo $ut['UserType']['name'] ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>

                                                    <section class="ts strp" style="display:none;">
                                                        <label for="label"> Type : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="srtipper_type" id="" class="form-control" size="1">
                                                                <option value="">Select Stripper Type</option>
                                                                <option value="C">Club</option>
                                                                <option value="A">Agent</option>
                                                                 <option value="I">Independent</option>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>


                                                    <section>
                                                        <section class="t1">
                                                            <label for="label">Name : <span>*</span></label>
                                                            <input type="text" value="" id="first_name" required="required" name="first_name" maxlength="20" class="large">
                                                            <section class="clr"></section>
                                                        </section>
                                                    </section>

                                                    <!-- <section>
                                                        <section class="t1">
                                                            <label for="label">Last Name : <span>*</span></label>
                                                            <input type="text" value="" id="last_name" required="required" name="last_name" maxlength="20" class="large">
                                                            <section class="clr"></section>
                                                        </section>
                                                    </section>
 -->
                                                    <section class="t1 gender" style="display:none;">
                                                        <label for="label"> Gender : </label>
                                                        <section style="float:left; margin-bottom:10px; width: 80%;">
                                                            <div class="inputContainer">
                                                                <div>
                                                                    <div class="checkboxes">
                                                                        <div class="smart-forms smart-container">
                                                                            <div class="colm colm4">
                                                                                <div class="option-group field">
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" name="gender" value="M">
                                                                                        <span class="radio"></span> Male </label>
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" name="gender" value="F" >
                                                                                        <span class="radio"></span> Female </label>
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" name="gender" value="T">
                                                                                        <span class="radio"></span> Trans </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                    
                                                    <section class="t1">
                                                        <label for="label"> Country : <span>*</span></label>
                                                        <div class="selectStyle">
                                                           <!--  <select name="country_id" id="country_id" required="required" onchange="getStateList(this.value)" class="form-control" size="1"> -->
                                                            <select name="country_id" id="country_id" required="required"  class="form-control" size="1">
                                                                <option value=""> Select Country </option>
                                                                    <?php foreach ($countries2 as $cntk => $cntv) { ?>
                                                                        <option  value="<?php echo $cntk ?>" > <?php echo $cntv ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>

<!--                                                    <section class="t1">
                                                        <label for="label">Region : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="state_id" id="state_id"  onchange="getStateCityList(this.value)" class="form-control" size="1">
                                                                <option value=""> Select Region </option>
                                                                    <?php foreach ($state as $stk => $stv) { ?>
                                                                        <option  value="<?php echo $stk ?>" > <?php echo $stv ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>-->
                                                    <section class="t1">
                                                        <label for="label"> City : <span>*</span></label>
                                                        <div class="selectStyle" id="ctlt">
                                                            <select name="city_id" id="city_id"  class="form-control" size="1">
                                                                <option value="">Select City</option>
                                                                <?php
                                                                foreach($locationsarray as $location)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $location['Location']['id']?>"><?php echo $location['Location']['name']?></option>
                                                                <?php } ?>
                                                                
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Telephone No : </label>
                                                        <input type="text" value="" maxlength="20" required="required" class="large" id="phone" name="phone">
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Email Address : <span>*</span></label>
                                                        <div style=" float: left;position: relative;width: 470px;" class="euro-avai">
                                                            <input type="email" onblur="checkEmail(this.value)" required="required" value="" maxlength="50" class="large"
                                                                   id="email" name="email" style="width:100%;" >
                                                            <div style="display:none" id="wait-div-email">
                                                                <img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loding_small.gif"></div>
                                                            <div class="checkusername ured" id="urede"></div>
                                                            <div class="checkusername ugreen" id="ugreene"></div>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <br />
                                                <br />
                                                <h3 class="rheading"> Login Information </h3>
                                                <section class="tom1">
                                                    <section style="position:relative;" class="t1">
                                                        <label for="label"> Username : <span>*</span></label>
                                                        <div style=" float: left;position: relative;width: 470px;" class="euro-avai">
                                                            <input type="text" onblur="checkUsername(this.value)" required="required" value="" maxlength="20" class="large"
                                                                   id="username" name="username" style="width:100%;" >
                                                            <div style="display:none" id="wait-div-username">
                                                                <img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loding_small.gif"></div>
                                                            <div class="checkusername ured" id="ured"></div>
                                                            <div class="checkusername ugreen" id="ugreen"></div>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Password : <span>*</span></label>
                                                        <input type="password" value="" maxlength="50" class="large" required="required" id="password" name="password" >
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Confirm Password : <span>*</span></label>
                                                        <input type="password" value="" maxlength="50" class="large" required="required" id="cpassword" name="cpassword" >
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <br />
                                                <br />
                                                <h3 class="rheading"> Other Information </h3>
                                                <section class="tom1">

<!--                                                <section class="t1">
                                                    <label for="label"> Enter Security Code :<span>*</span></label>
                                                    <input type="text" placeholder="" class="large" name="captcha" id="captcha" style="float: left;margin: 0 10px 0 0;
                                                    width: auto;">
                                                   
                                                        
                                                   
                                                       
                                                  </section>-->

                                                    <section class="t1">
                                                        <label for="label" class="blank">&nbsp; </label>
                                                        <section class="tbut">
                                                            <div class="smart-forms smart-container">
                                                                <div class="colm colm4">
                                                                    <label class="field option block" style="width: auto;">
                                                                        <input type="checkbox" required="required" name="terms" value="1" >
                                                                        <span class="checkbox"></span> You must agree to our terms of service </a> </label>
                                                                </div>
                                                            </div>
                                                            <div class="smart-forms smart-container">
                                                                <div class="colm colm4">
                                                                    <label class="field option block" style="width: auto;">
                                                                        <input type="checkbox" name="is_newsletter" value="1">
                                                                        <span class="checkbox"></span> Subscribe for Newsletters </label>
                                                                </div>
                                                            </div>
                                                            <div class="smart-forms smart-container">
                                                                <div class="colm colm4">
                                                                    <label class="field option block" style="width: auto;">
                                                                        <div class="g-recaptcha" data-sitekey="6LcBtBsUAAAAAIJRtqR4na2iQCLk9rEVFsZEOaBI" style=" margin-top:5px"></div> 
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </section>
                                                    <div class="clr"></div>
                                                    <section class="t1">
                                                        <label for="label">&nbsp;</label>

                                                        <section class="tbut">
                                                            <input type="submit" value="Join Now" id="submit" name="submit" class="buttonGrey">
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                        </div>
                                        </form>
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
    </div>

    <div class="col-right">
        <?php echo $this->element('user_banner'); ?>
    </div>
</section>
<div class="clr"></div>




