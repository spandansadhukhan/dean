<?php echo $this->element('banner');?>
<section id="contentsection">
<?php  echo $this->element("carousel_slider");?>
    <div id="wait-div" class="wait-div">
        <div class="wait-divin">
            <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
            Please wait    ....</span> </span> </div>
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <div class="detail-heading" style="padding: 0 5px;">
                        <h2 class="title">Contact Us</h2>
                        </div>
                        <div class="clr"></div>
                        <section class="pin-wrapper">
                            <div class="in-content">
                                <section class="contact-left">
                                    <section class="section leave-a-message">
                                        <h2 class="bordered">If you have any query please fill the form below	</h2>
                                        <br />
                                        <section class="tom1">
                                            <form action="" method="post" accept-charset="utf-8" id="form-ui">					<div class="smart-forms smart-container">
                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">\D7</a> <span class="ajax_message"></span> </div>
                                                </div>
                                                <section>
                                                    <section class="t1">
                                                        <label for="label"> Name: <span>*</span></label>
                                                        <input type="text"  name="name" id="name" class="" required="required" maxlength="20" value="" placeholder="Name">
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <section class="t1">
                                                    <label for="label">Contact Number: </label>
                                                    <input type="text"  name="phone" id="phone" class="" required="required" maxlength="20" value="" placeholder="Contact Number">
                                                    <section class="clr"></section>
                                                </section>
                                                <section class="t1">
                                                    <label for="label">Email Address: <span>*</span></label>
                                                    <input type="email"  class="" name="email" id="textfield2" required="required" maxlength="40" value="" placeholder="Email Address">
                                                    <section class="clr"></section>
                                                </section>
                                                <section class="t1">
                                                    <label for="label">Subject: <span>*</span></label>
                                                    <div class="selectStyle">
                                                        <input type="text"  name="subject" id="phone" class="" required="required" maxlength="50" value="" placeholder="Subject">
                                                    </div>
                                                    <section class="clr"></section>
                                                </section>
                                                <section class="t1">
                                                    <label for="label">Message: <span>*</span></label>
                                                    <div class="selectStyle">
                                                        <textarea name="message" required="required" maxlength="400" placeholder="Message" ></textarea>
                                                    </div>
                                                    <section class="clr"></section>
                                                </section>
                                               
                                                <section class="t1">
                                                    <label for="label">&nbsp;</label>
                                                    <section class="tbut">
                                                        <input type="submit" class="buttonGrey" name="button" id="button" value="Send">
                                                    </section>
                                                    <section class="clr"></section>
                                                </section>
                                            </form>
                                        </section>
                                    </section>
                                </section>
                                <section class="contact-right">
                                    <div class="contact-box outer call">
                                        <div class="contact-box inner call">
                                            <div class="row">
                                                <div class="five columns-c">
                                                    <span class="sprite-site call"></span>
                                                </div>
                                                <div class="seven columns-c uppercase">
                                                    :
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            <div class="centered">
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">All inquiries</p>
                                                </div>
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">Free Phone</p>
                                                </div>
                                                <p class="size13">
                                                    <?php  echo $sitesetting["SiteSetting"]["free_phone"]; ?>
                                                </p>
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">International</p>
                                                </div>
                                                <p class="size13">
                                                    <?php  echo $sitesetting["SiteSetting"]["international_phone"]; ?>
                                                </p>
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">Emergency Contact</p>
                                                </div>
                                                <p class="size13">
                                                 <?php  echo $sitesetting["SiteSetting"]["emergency_phone"]; ?>
<br>
                                                    (Escorts Only)
                                                </p>
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">Office Hours</p>
                                                </div>
                                                <p class="size13">
                                                    <?php  echo $sitesetting["SiteSetting"]["office_hours"]; ?>
                                                </p>
                                                <div class="line-through">
                                                    <p class="line-through-text uppercase size13 theme-1">Mailing Address</p>
                                                </div>
                                                <p class="size13">
                                                    <?php  echo $sitesetting["SiteSetting"]["mailing_address"]; ?>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <section class="clr"></section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </div>
   <div class="col-right">
    <?php echo $this->element("user_banner");?>   
    </div>
</section>
<div class="clr"></div>