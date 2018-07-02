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
        <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> 
                <span style="margin-left:48px;">Please wait    ....</span> </span></div>
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>Rates &amp; Services</h1>
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
                                                <?php echo $this->element('parlor_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;"> Rates &amp; Services</h1>
                                                            &nbsp;
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div class="profie-bl4">
                                                            <div class="profie-bl4-inner">
                                                                <h3>Please Enter Rates: <small>(Rates in <span class="div1">AUD</span> )

                                                                        <div style="float: right;width: 15%;">
                                                                            <select id="site_currency" name="site_currency" class="form-control" 
                                                                                    size="1" onchange="getvalue(this.value)">
                                                                                <option selected="selected" value="EUR">AUD</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="clr"></div>
                                                                    </small></h3><small>
                                                                    <div class="form-rates">
                                                                        <form method="post" accept-charset="utf-8" class="ajaxform" id="edit_rates">	
                                                                            <input type="hidden" name="uid" value="<?php echo $user['Parlor']['id']?>" />
                                                                            <div class="smart-forms smart-container">
                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="javascript:;"></a> <span class="ajax_message">Hello Message</span> </div>
                                                                            </div>
                                                                            <div class="table-responsive for-msg">
                                                                                <table class="table table-vcenter table-striped">
                                                                                    <tbody class="smart-wrap">
                                                                                    </tbody><thead>
                                                                                        <tr><th style="width:120px;">Rates</th> 
                                                                                            <th>Incall</th>
                                                                                            <th>Outcall</th>
                                                                                        </tr></thead>
                                                                                    <tbody><tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">30 Min</td>
                                                                                            <td><<input type="number" name="30min_incall" id="30min_incall" maxlength="6" value="<?php echo $user['Rate']['30min_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="30min_outcall" id="30min_outcall" maxlength="6" value="<?php echo $user['Rate']['30min_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">1 Hour</td>
                                                                                            <td><input type="number" name="1hr_incall" id="1hr_incall" maxlength="6" value="<?php echo $user['Rate']['1hr_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="1hr_outcall" id="1hr_outcall" maxlength="6" value="<?php echo $user['Rate']['1hr_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">2 Hour</td>
                                                                                            <td><input type="number" name="2hr_incall" id="2hr_incall" maxlength="6" value="<?php echo $user['Rate']['2hr_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="2hr_outcall" id="2hr_outcall" maxlength="6" value="<?php echo $user['Rate']['2hr_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">3 Hour</td>
                                                                                            <td><input type="number" name="3hr_incall" id="3hr_incall" maxlength="6" value="<?php echo $user['Rate']['3hr_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="3hr_outcall" id="3hr_outcall" maxlength="6" value="<?php echo $user['Rate']['3hr_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">Additional Hours</td>
                                                                                            <td><input type="number" name="addhr_incall" id="addhr_incall" maxlength="6" value="<?php echo $user['Rate']['addhr_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="addhr_outcall" id="addhr_outcall" maxlength="6" value="<?php echo $user['Rate']['addhr_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">Overnight</td>
                                                                                            <td><input type="number" name="night_incall" id="night_incall" maxlength="6" value="<?php echo $user['Rate']['night_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="night_outcall" id="night_outcall" maxlength="6" value="<?php echo $user['Rate']['night_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">1 Day</td>
                                                                                            <td><input type="number" name="1day_incall" id="1day_incall" maxlength="6" value="<?php echo $user['Rate']['1day_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="1day_outcall" id="1day_outcall" maxlength="6" value="<?php echo $user['Rate']['1day_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">2 Day</td>
                                                                                            <td><input type="number" name="2day_incall" id="2day_incall" maxlength="6" value="<?php echo $user['Rate']['2day_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="2day_outcall" id="2day_outcall" maxlength="6" value="<?php echo $user['Rate']['2day_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                        <tr class="smart-forms smart-container">
                                                                                            <td style="width: 120px; color:#3e3e3e">Weekend</td>
                                                                                            <td><input type="number" name="weekend_incall" id="weekend_incall" maxlength="6" value="<?php echo $user['Rate']['weekend_incall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <td><input type="number" name="weekend_outcall" id="weekend_outcall" maxlength="6" value="<?php echo $user['Rate']['weekend_outcall'] ?>" class="gui-input" min="0.01" step="0.01"></td>
                                                                                            <!--<td style="display: none;visibility: hidden;"><input type="hidden" name="rates[30_Min][currency]" id="30_Min_currency" value="Aud" class="currency gui-input" readonly=""></td>-->
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="inputContainer">
                                                                                <input type="submit" value="Save" id="button" name="button" 
                                                                                       class="buttonGrey">
                                                                            </div>
                                                                        </form>								
                                                                    </div>
                                                                </small></div><small>
                                                            </small></div><small>
                                                            <div class="clr"></div>
                                                        </small></div><small>
                                                        <div class="clr"></div>
                                                    </small></div><small>
                                                    <div class="clr"></div>
                                                </small></div>
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