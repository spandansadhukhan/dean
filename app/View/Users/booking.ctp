<?php 
  //pr($escortrates); exit;
?>
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>


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
                                                
                                                </style>
                                                <a style="display:none;" href="#" class="website_activate"></a>
                                                <?php echo $this->element('user_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading" >
                                                        <section class="title-left" style="width:100%;">
                                                            <h1  style="display:inline-block;width:97%;">Confirm Booking</h1>
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner for-setting">
                                                      
                                                        <div class="tom1 for-setting">
                                                            <form action="<?php echo $this->webroot ?>users/booking" method="post" accept-charset="utf-8" class="ajaxform">
                                                                <input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid'); ?>" >

                                                                <input type="hidden" name="escort_id" id="escort_id" value="<?php echo $escort_id; ?>" >
                                                                <div class="smart-forms smart-container">
                                                                    <!-- <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> 
                                                                    </div -->>
                                                                </div>
                                                                <section class="t1">
                                                                    <label for="label" style="color: #000 !important;">Booking Date: <span>*</span></label>
                                                                    <input type="text" id="first_name" required="required" name="booking_date" value="" maxlength="100" class="event_date">
                                                                    <section class="clr"></section>
                                                                </section>

                                                                <section class="t1">
                                                                    <label for="label" style="color: #000 !important;">Duration: <span>*</span></label>
                                                                    <input type="text" id="first_name" required="required" name="duration" value="" maxlength="100">
                                                                    <section class="clr"></section>
                                                                </section>

                                                    <section class="t1">
                                                        <label for="label" style="color: #000 !important;">Service Type: <span>*</span></label>
                                                       <!--  <input type="text" id="first_name" required="required" name="booking_amount" value=""> -->
                                                       <select name="booking_type" id="booking_amnt">
                                                            <!-- <option>Select Service</option>
                                                            <option value="<?php echo $escortrates['Rate']['30min_incall'];?>">30min Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['30min_outcall'];?>">30min Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['1hr_incall'];?>">1hr Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['1hr_outcall'];?>">1hr Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['2hr_incall'];?>">2hr Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['2hr_outcall'];?>">2hr Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['3hr_incall'];?>">3hr Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['3hr_outcall'];?>">3hr Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['addhr_incall'];?>">Add incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['addhr_outcall'];?>">Add outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['night_incall'];?>">Night Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['night_outcall'];?>">Night Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['1day_incall'];?>">One Day Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['1day_outcall'];?>">One Day Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['2day_incall'];?>">Two Day Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['2day_outcall'];?>">Two Day Outcall</option>
                                                            <option value="<?php echo $escortrates['Rate']['weekend_incall'];?>">Weekend Incall</option>
                                                            <option value="<?php echo $escortrates['Rate']['weekend_outcall'];?>">Weekend Outcall</option> -->
                                                                <option>Select Service</option>
                                                                <option value="30min_incall">30min Incall</option>
                                                                <option value="30min_outcall">30min Outcall</option>
                                                                <option value="1hr_incall">1hr Incall</option>
                                                                <option value="1hr_outcall">1hr Outcall</option>
                                                                <option value="2hr_incall">2hr Incall</option>
                                                                <option value="2hr_outcall">2hr Outcall</option>
                                                                <option value="3hr_incall">3hr Incall</option>
                                                                <option value="3hr_outcall">3hr Outcall</option>
                                                                <option value="addhr_incall">Add incall</option>
                                                                <option value="addhr_outcall">Add outcall</option>
                                                                <option value="night_incall">Night Incall</option>
                                                                <option value="night_outcall">Night Outcall</option>
                                                                <option value="1day_incall">One Day Incall</option>
                                                                <option value="1day_outcall">One Day Outcall</option>
                                                                <option value="2day_incall">Two Day Incall</option>
                                                                <option value="2day_outcall">Two Day Outcall</option>
                                                                <option value="weekend_incall">Weekend Incall</option>
                                                                <option value="weekend_outcall">Weekend Outcall</option>
                                                       </select>
                                                        <section class="clr"></section>
                                                    </section>

                                                                 <section class="t1">
                                                                    <label for="label" style="color: #000 !important;">Booking Amount: <span>*</span></label>
                                                                    <input type="text" id="booking_amount" required="required" name="booking_amount" value="" maxlength="100" readonly>
                                                                    <section class="clr"></section>
                                                                </section>

                                                                <section class="t1">
                                                                <label class="pl">&nbsp;</label>
                                                                <div class="inputContainer">
                                                                <input type="submit" class="buttonGrey" name="button" id="button" value="Confirm Booking">
                                                                </div>
                                                                </section>
                                                               
                                                              
                                                                <section class="clr"></section>
                                                            </form>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  

  $( function() {
    $(".event_date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
  } );

$("#booking_amnt").on('change', function () {
        var stId = $("#booking_amnt").val();
        var escort_id = $("#escort_id").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>users/rate_val/",
            data: {stId: stId,escort_id:escort_id}
        }).done(function (msg) {
            $('#booking_amount').val(msg);
        });

    });


  </script>