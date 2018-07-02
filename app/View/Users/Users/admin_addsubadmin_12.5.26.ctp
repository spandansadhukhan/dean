
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
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id']?>" >
                                                                                <input type="hidden" name="ftype" value="persionalinfo" >
                                                                                <div class="smart-forms smart-container">
                                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                </div>
                                                                                <section class="t1">
                                                                                    <label for="label">First Name: <span>*</span></label>
                                                                                    <input type="text" name="name" class="" value="Test User" style="margin:0;">
                                                                                    <input type="text" id="first_name" required="required" name="first_name" value="<?php echo $this->request->data['User']['first_name']?>" maxlength="100" class="">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1">
                                                                                    <label for="label">Last Name: <span>*</span></label>
                                                                                    <input type="text" id="last_name" required="required" name="last_name" value="<?php echo $this->request->data['User']['last_name']?>" maxlength="100" class="">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1">
                                                                                    <label for="label">User Name: <span>*</span></label>
                                                                                    <input type="text" id="username" readonly="readonly" name="username" value="<?php echo $this->request->data['User']['username']?>" maxlength="100" class="">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1">
                                                                                    <label for="label">Email Address: <span>*</span></label>
                                                                                    <input type="text" id="email" readonly="readonly" name="email" value="<?php echo $this->request->data['User']['email']?>" maxlength="100" class="">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1">
                                                                                    <label for="label">
                                                                                        Country <span>*</span></label>
                                                                                            <select name="country_id" id="country_id" required="required" class="form-control" style="width:280px">
                                                                                                    <option value=""> Select Country </option>
                                                                                                        <?php foreach ($countries as $cntk => $cntv) { ?>
                                                                                                    <option  value="<?php echo $cntk ?>" selected="selected" > <?php echo $cntv ?> </option>
                                                                                                        <?php } ?>
                                                                                                </select>
                                                                                </section>
                                                                                <!--
                                                                                <section class="form-group t1" id="region_div" style="display:none">
                                                                                    <label for="label">
                                                                                        Region</label>
                                                                                    <select name="state" class="form-control" id="region" onchange="getCity(this.value)">
                                                                                        <option value=" ">Seleziona Regione</option>
                                                                                        <option value="" selected="selected">
                                                                                            Caribbean													</option>
                                                                                    </select>
                                                                                </section>-->
                                                                                <section class="form-group">
                                                                                    <label class="col-md-2 control-label" for="example-text-input">
                                                                                        State<span>*</span></label>
                                                                                    <select name="state_id" id="state_id" class="form-control" required="required" onchange="getCityList(this.value)" style="width:280px">
                                                                                                <option value=""> Select State </option>
                                                                                                <?php foreach ($state as $stk => $stv) { ?>
                                                                                                   <?php if($this->request->data['State']['id'] != $stk){ ?>
                                                                                                    <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                   <?php } else { ?>
                                                                                                    <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                   <?php } ?>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                </section>
                                                                                <section class="form-group">
                                                                                    <label class="col-md-2 control-label" for="example-text-input">
                                                                                        City<span>*</span></label>
                                                                                    <select name="city_id" class="form-control" id="city_id" style="width:280px">
                                                                                                <option value=""> Select State To Get City List </option>
                                                                                                <?php foreach ($city as $stk => $stv) { ?>
                                                                                                   <?php if($this->request->data['City']['id'] != $stk){ ?>
                                                                                                    <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
                                                                                                   <?php } else { ?>
                                                                                                    <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
                                                                                                   <?php } ?>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                </section>


                                                                                <section class="t1">
                                                                                    <label for="label">Phone: <span>*</span></label>
                                                                                    <input type="text" id="phone_no" required="required" name="phone_no" value="<?php echo $this->request->data['User']['phone_no']?>" maxlength="100" class="">
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
                                                                                    <textarea class="form-control " name="about" placeholder="Abouts"></textarea>
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
                                                                            </form>          </div>
                                                                        <br>
                                                                        <div class="detail-heading" style="background: none;">
                                                                            <section class="title-left" style="width: 100%;">
                                                                                <h1 style="display:inline-block;font-size: 20px; width: 97%;">Change Password</h1>
                                                                            </section>
                                                                            <div class="clr"></div>
                                                                        </div>
                                                                        <div class="tom1  for-tour">

                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui1">       <div class="smart-forms">
                                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                    <br>   </div>
                                                                                <section class="t1 t1-t">
                                                                                    <label for="label">Current Password: <span>*</span></label>
                                                                                    <input type="password" value="" id="oldpassword" name="oldpassword" placeholder="Current Password">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1 t1-t">
                                                                                    <label for="label">New Password: <span>*</span></label>
                                                                                    <input type="password" value="" id="newpassword" name="newpassword" placeholder="New Password">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <section class="t1 t1-t">
                                                                                    <label for="label">Confirm Password: <span>*</span></label>
                                                                                    <input type="password" value="" id="cpassword" name="cpassword" placeholder="Confirm Password">
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <div class="clr"></div>

                                                                                <section class="t1 t1-t">
                                                                                    <label for="label" class="blank">&nbsp;</label>
                                                                                    <section class="tbut">
                                                                                        <input type="submit" value="Change Password" id="button" name="button" class="buttonGrey">
                                                                                    </section>
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                            </form><section class="clr"></section>
                                                                        </div>
                                                                        <br>
                                                                        <div class="detail-heading" style="background: none;">
                                                                            <section class="title-left" style="width: 100%;">
                                                                                <h1 style="display:inline-block;font-size: 20px; width: 97%;">Newsletter Setting</h1>
                                                                            </section>
                                                                            <div class="clr"></div>
                                                                        </div>
                                                                        <div class="tom1  for-tour">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui2">       <div class="smart-forms">
                                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                </div>
                                                                                <section class="t1 t1-t" style="width: auto; float:none;">
                                                                                    <label for="label" style="width: auto;"> Subscribe/Unsubcribe Newsletter: <span>*</span></label>
                                                                                    <div class="smart-wrap" style="float:left; width: 60%;">
                                                                                        <div class="smart-forms smart-container ">
                                                                                            <!-- end .form-header section -->
                                                                                            <div class="section" style="margin: 5px 0 0 0">
                                                                                                <div class="option-group field">
                                                                                                    <label class="option">
                                                                                                        <input type="radio" value="Yes" checked="" name="newsletter_subscription">
                                                                                                        <span class="radio"></span> Yes
                                                                                                    </label>

                                                                                                    <label class="option">
                                                                                                        <input type="radio" value="No" name="newsletter_subscription">
                                                                                                        <span class="radio"></span> No
                                                                                                    </label>
                                                                                                </div><!-- end .option-group section -->
                                                                                            </div><!-- end  section -->
                                                                                        </div><!-- end .smart-forms section -->
                                                                                    </div>
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                                <div class="clr"></div>
                                                                                <section class="t1 t1-t">
                                                                                    <label for="label" class="blank">&nbsp;</label>
                                                                                    <section class="tbut">
                                                                                        <input type="submit" value="Update Changes" id="button" name="button" class="buttonGrey">
                                                                                    </section>
                                                                                    <section class="clr"></section>
                                                                                </section>
                                                                            </form>
                                                                            <section class="clr"></section>
                                                                        </div>
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
