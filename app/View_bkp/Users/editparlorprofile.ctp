<section id="contentsection">

    <div class="col-left">
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
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <div class="in-content">
                            <div class="for-escort" style="width:auto; float:none;background: none;" >
                                <h2 class="title p-no-mar" > Edit User Profile </h2>



                                <div class="left-images-part">
                                    <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                         z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                         data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                        <!--
                                        <ul class="z-tabs-nav z-tabs-desktop">
                                            <li style="" class="z-tab z-first" data-link="bio"><a class="z-link">
                                                    Images                    <span style="color: #bc27bd;">(2)</span></a></li>
                                            <li style="" class="z-tab" data-link="rates"><a class="z-link">
                                                    Videos                    <span style="color: #bc27bd;">(1) </span></a></li>
                                        </ul>
                                        -->
                                        <div class="h-content2 z-container">
                                            <div class="z-content" style="height:auto;">
                                                <ul id="laod_images">


                                                    <li style="margin-bottom: 10px;">
                                                    <div class="pro-area">
                                                        <div class="pro-image-area">
                                                                <?php if($user['User']['profile_image'] != "" ){ ?>
                                                                <img class="img-box" id="avatar-edit-img" data-src="default.jpg" data-holder-rendered="true"
                                                                     src="<?php echo $this->Html->url('/'); ?>user_images/<?php echo $user['User']['profile_image'] ?>"
                                                                     style="width: 100%; height: auto;"/>
                                                                <?php } else { ?>
                                                                <img class="img-circle" id="avatar-edit-img" height="128" data-src="default.jpg"
                                                                     data-holder-rendered="true" style="width: 100%; height: auto;"
                                                                     src="<?php echo $this->Html->url('/'); ?>images/noimage.png"/>
                                                                <?php } ?>
                                                                 <!--<a href="" class="edit-image"><i class="fa fa-edit"></i> Edit Image</a>-->

                                                        </div>

                                                        <div class="modal fade" id="userProfileImage" style="" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content" id="addrEditModal">
                                                                    <form action="<?php echo $this->webroot; ?>users/userdashboard" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h5 class="modal-title"> Change Profile Image </h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <img id="uploadPreview" style="display:none;"/>
                                                                            <!-- image uploading form -->

                                                                            <input type="hidden" name="formtype" value="imgProfile"/>
                                                                            <input type="hidden" name="id" value="<?php echo $user['User']['id'] ?>" />
                                                                            <!-- hidden inputs -->
                                                                            <input type="hidden" id="x" name="x" />
                                                                            <input type="hidden" id="y" name="y" />
                                                                            <input type="hidden" id="w" name="w" />
                                                                            <input type="hidden" id="h" name="h" />

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="choose_file" style="float:left" ><span>Upload profile image</span>
                                                                                <input id="uploadImage" type="file" accept="image/jpeg" name="image"/>
                                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                                                            <!--<button type="submit" value="Crop & Save" class="btn btn-primary">Close</button>-->
                                                                            <div style="float: right"><input type="submit" value="Crop & Save" class="btn btn-primary"></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </li>

                                                    <div class="clr"></div>
                                                </ul>
                                            </div>
                                            <div class="z-content">
                                                <iframe style="display:block;width:100%;height:250px;" src="https://www.youtube.com/embed/0mQjcLj_u90" frameborder="0" allowfullscreen id="myFrame"></iframe>
                                                <br>
                                                <br />
                                                <div class="clr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="for-escort-inner" style="margin: 13px 0 0;width: 655px;">
                                    <div class="escort-register">
                                        <div class="clr"></div>
                                        <div class="register_con">
                                            <form action="" method="post" accept-charset="utf-8"  id="form-ui">
                                                <!-- <form id="form-ui" action="" method="post"> -->
                                                <h3 class="rheading"> Your Account Type : <font style="color:#b225b5;"> User as Agent </font></h3>
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
                                                    <!--
                                                    <section class="t1">
                                                        <label for="label"> User Type : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="user_type" id="user_type" readonly="readonly" required="required" class="form-control" size="1">
                                                                <option value=""> Select User Type </option>
                                                                    <?php foreach ($utype as $ut) { ?>
                                                                    <option  value="<?php echo $ut['UserType']['type'] ?>" ><?php echo $ut['UserType']['name'] ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>
                                                    -->
                                                    <section>
                                                        <section class="t1">
                                                            <label for="label"> First Name : <span>*</span></label>
                                                            <input type="text" id="first_name" required="required" name="first_name" value="<?php echo $this->request->data['User']['first_name']?>" maxlength="100" class="large">
                                                            <section class="clr"></section>
                                                        </section>
                                                    </section>

                                                    <section>
                                                        <section class="t1">
                                                            <label for="label"> Last Name : <span>*</span></label>
                                                            <input type="text" id="last_name" required="required" name="last_name" value="<?php echo $this->request->data['User']['last_name']?>" maxlength="100" class="large">
                                                            <section class="clr"></section>
                                                        </section>
                                                    </section>
                                                    <!--
                                                    <section style="display: block;" class="t1 gender">
                                                        <label for="label"> Gender : <span>*</span></label>
                                                        <section style="float:left; margin-bottom:10px; width: 80%;">
                                                            <div class="inputContainer">
                                                                <div>
                                                                    <div class="checkboxes">
                                                                        <div class="smart-forms smart-container">
                                                                            <div class="colm colm4">
                                                                                <div class="option-group field">
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" required="required" checked="<?php echo $this->request->data['User']['gender'] == "M" ? '' : 'checked'; ?>" name="gender" value="M">
                                                                                        <span class="radio"></span> Male </label>
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" required="required" checked="<?php echo $this->request->data['User']['gender'] == "F" ? '' : 'checked'; ?>" name="gender" value="F" >
                                                                                        <span class="radio"></span> Female </label>
                                                                                    <label class="option" style="width: 160px;">
                                                                                        <input type="radio" required="required" checked="<?php echo $this->request->data['User']['gender'] == "T" ? '' : 'checked'; ?>" name="gender" value="T">
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
                                                    -->



                                                    <section class="t1">
                                                        <label for="label"> Country : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="country_id" id="country_id" required="required" class="form-control" size="1">
                                                                <option value=""> Select Country </option>
                                                                    <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>

                                                    <section class="t1">
                                                        <label for="label"> State : <span>*</span></label>
                                                        <div class="selectStyle">
                                                            <select name="state_id" id="state_id" required="required" onchange="getCityList(this.value)" class="form-control" size="1">
                                                                <option value=""> Select State </option>
                                                                <?php foreach ($state as $stk => $stv) { ?>
                                                                   <?php if($this->request->data['State']['id'] != $stk){ ?>
                                                                    <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                   <?php } else { ?>
                                                                    <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                   <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>


                                                    <section class="t1">
                                                        <label for="label"> City : <span>*</span></label>
                                                        <div class="selectStyle" id="ctlt">
                                                            <select name="city_id" id="city_id" class="form-control" size="1">
                                                                <option value=""> Select State To Get City List </option>

                                                                <?php foreach ($city as $stk => $stv) { ?>
                                                                   <?php if($this->request->data['City']['id'] != $stk){ ?>
                                                                    <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                   <?php } else { ?>
                                                                    <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                   <?php } ?>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Telephone No : </label>
                                                        <input type="text" value="<?php echo $this->request->data['User']['phone_no']?>" maxlength="20" required="required" class="large" id="phone_no" name="phone_no">
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Email Address : <span>*</span></label>
                                                        <div style=" float: left;position: relative;width: 470px;" class="euro-avai">
                                                            <input type="email" readonly="readonly" value="<?php echo $this->request->data['User']['email']?>" maxlength="50" class="large" id="email" name="email" style="width:100%;" >
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
                                                            <input type="text" readonly="readonly" value="<?php echo $this->request->data['User']['username']?>" maxlength="20" class="large"
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
                                                        <input type="password" value="" maxlength="50" class="large" id="password" name="password" >
                                                        <section class="clr"></section>
                                                    </section>
                                                    <section class="t1">
                                                        <label for="label"> Confirm Password : <span>*</span></label>
                                                        <input type="password" value="" maxlength="50" class="large" id="cpassword" name="cpassword" >
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <br />
                                                <br />
                                                <!--<h3 class="rheading"> Other Information </h3>-->
                                                <section class="tom1">

                                                <!--<section class="t1">
                                                    <label for="label"> Enter Security Code :<span>*</span></label>
                                                    <input type="text" placeholder="" class="large" name="captcha" id="captcha" style="float: left;margin: 0 10px 0 0;
                                                    width: auto;">
                                                    <span id="security_code_refresh_img" style="display: inline-block;">
                                                        <img src="http://layout9.demoparlour.com/advdirectory/assets/captcha/1465914476.57.jpg" width="150"
                                                        height="40" style="border:0;" alt=" " /></span>
                                                        <a onclick="security_code_refresh(150, 40);" class="captcha-refresh"><i class="fa fa-refresh fa-lg"></i></a>
                                                  </section>-->
                                                    <!--
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
                                                        </section>
                                                    </section>
                                                    -->
                                                    <div class="clr"></div>
                                                    <section class="t1">
                                                        <label for="label">&nbsp;</label>
                                                        <section class="tbut">
                                                            <input type="submit" value="Edit Now" id="submit" name="submit" class="buttonGrey">
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
        <section id="banners">
            <a class="banner200x333 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="http://layout9.demoparlour.com/advdirectory/advertisement-banner"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>