<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
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
                                                <?php echo $this->element('agent_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;"> My Profile</h1>

                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div class="profie-bl1">
                                                            <div class="profie-bl1-inner">
                                                                <h3>Agency Information<br><span>(Please describe basic information about yourself)</span></h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                                <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'ajaxform','id'=>'form-ui','accept-charset'=>'utf-8','method'=>'post')); ?>
                                                                                <?php echo $this->Form->input('id'); ?>
                                                                            
                                                                                 <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <!--
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">User Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
                                                                                                <input type="text" placeholder="Username" readonly="" value="agencyind2017" class="gui-input" id="from" name="username">
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                -->


                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Agency Name:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field">
<!--                                                                                                <input type="text" placeholder="Agent Name" value="<?php echo $this->request->data['User']['org_name']?>" class="gui-input" id="from" name="org_name">-->
                                                                                                    <?php echo $this->Form->input('org_name',array('class'=>'gui-input','placeholder'=>'Agent Name','div'=>false,'label'=>false,'required'=>'required')); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Country:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                
                                                                                                <?php echo $this->Form->input('country_id',array('options'=>$countries_new,'style'=>'280px','empty'=>'Select Country','div'=>false,'label'=>false,'required'=>'required')); ?>

                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Location:</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field select">
                                                                                                <?php echo $this->Form->input('city_id',array('style'=>'280px','empty'=>'Select City','div'=>false,'label'=>false,'required'=>'required')); ?>
                                                                                                
                                                                                                <i class="arrow double"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                             
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">About you:</label><div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                
                                                                                                <?php echo $this->Form->input('about',array('type'=>'textarea','placeholder'=>'About you','div'=>false,'label'=>false,"id"=>"disabledInput","class"=>"gui-textarea","readonly"=>true)); ?>
                                                                                                <label class="field-icon" for="comment"><i class="fa fa-comments"></i></label>
                                                                                                <span class="about_you input-hint">
                                                                                                    For Edit :- <strong class="" style="cursor:pointer;"><a onclick="javascript:$('#myModal').modal('show')">Click here</a></strong>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">&nbsp;</label>
                                                                                    <div class="inputContainer">
                                                                                        <input type="submit" class="buttonGrey" name="submit" id="button" value="Save">
                                                                                    </div>
                                                                                </div>

                                                                                    <?php echo $this->Form->end();?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--
                                                                <div class="form-profile" style="border-top: 5px solid #fff;margin: 5px -11px;padding: 0 10px;">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">
                                                                            <br>
                                                                            <div class="form-profile-block">
                                                                                <div class="clear"></div>
                                                                                <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="save_category_form">								<div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                    <div>
                                                                                        <div class="form-profile-block">
                                                                                            <label class="pl">Default Rates:</label><div class="inputContainer">
                                                                                                <div class="section">
                                                                                                    <label class="field prepend-icon">
                                                                                                        <textarea placeholder="Default Agency Rates" name="rate" id="rate" class="gui-textarea"></textarea>
                                                                                                        <label class="field-icon" for="comment"><i class="fa fa-comments"></i></label>
                                                                                                        <span class="input-hint">
                                                                                                            <strong>Hint:</strong> Please enter default pricing for your services...
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
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="clr"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                -->
                                                            </div>
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
                                                                                                <select name="service_type" class="inputtext " id="service_type" style="width:280px;">
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
                                                                                    <label class="pl">Agency Logo :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon file" style="margin-top: 5px;">
                                                                                                <span class="button"> Choose File </span>
                                                                                                <input type="file" id="file1" class="gui-file" name="banner_image" onchange="document.getElementById('uploader1').value = this.value;">
                                                                                                <input type="text" style="width: 100%!important;" readonly="" placeholder="no file selected" id="uploader1" class="gui-input">
                                                                                                <label class="field-icon"><i class="fa fa-upload"></i></label>
                                                                                            </label><br><span style="color:#000">(Recommended size:150px x 200px.)</span>
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
                                                        -->
                                                        <div class="profie-bl2" style="border-bottom: 18px solid #fff; border-top: 5px solid #fff;">
                                                            <div class="profie-bl2-inner">
                                                                <h3>Contact Information</h3>
                                                                <div class="form-profile">
                                                                    <div class="smart-wrap">
                                                                        <div class="smart-forms smart-container">

                                                                                <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'ajaxform','id'=>'form-ui','accept-charset'=>'utf-8','method'=>'post')); ?>
                                                                                <?php echo $this->Form->input('id'); ?>

                                                                                <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Phone Number: <span style="color:red;"> * </span>
                                                                                    </label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <?php echo $this->Form->input('phone_no',array('div'=>false,'label'=>false,'placeholder'=>"Phone Number",'class'=>'gui-input','required'=>'required')); ?>                                                                                                
                                                                                                (Place area code first then number)
                                                                                                <label class="field-icon" for="phone"><i class="fa fa-phone"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Mobile Number: <span style="color:red;"> * </span></label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <?php echo $this->Form->input('mobile_no',array('div'=>false,'label'=>false,'placeholder'=>"Mobile Number",'class'=>'gui-input','required'=>'required')); ?>                                                                                                
                                                                                                
                                                                                                <label class="field-icon" for="phone"><i class="fa fa-phone"></i></label>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="form-profile-block">
                                                                                    <label class="pl">Email: <span style="color:red;"> * </span></label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                                <?php echo $this->Form->input('email',array('readonly'=>'true','div'=>false,'label'=>false,'placeholder'=>"Email",'class'=>'gui-input','required'=>'required')); ?>                                                                                                
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
                                                                                <div class="form-profile-block" style="display:<?php echo !$permissions->own_website?'none':'' ?>">
                                                                                    <label class="pl">Website Url :</label>
                                                                                    <div class="inputContainer">
                                                                                        <div class="section">
                                                                                            <label class="field prepend-icon">
                                                                                               <?php echo $this->Form->input('website_url',array('div'=>false,'label'=>false,'placeholder'=>"Website Url",'class'=>'gui-input')); ?>                                                                                                

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
                                                                                               <?php echo $this->Form->input('skypeid',array('div'=>false,'label'=>false,'placeholder'=>"Skype",'class'=>'gui-input','required'=>'required')); ?>                                                                                                
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
                                                                                               <?php echo $this->Form->input('facebook_url',array('div'=>false,'label'=>false,'placeholder'=>"Facebook",'class'=>'gui-input','required'=>'required')); ?>                                                                                                
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
                                                                             <?php echo $this->Form->end();?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clr"></div>

                                                        <!--
                                                        <div class="profie-bl4">
                                                            <div class="profie-bl4-inner" style="border-top: 10px solid #fff; background:#f2f4fa;">
                                                                <h3>Locality<br> <span>(Please describe your Location)</span></h3>
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
                                                                                                <input type="text" placeholder="type get your location" class="gui-input" id="currentlocation" name="address" value="" autocomplete="off">
                                                                                                <center><div id="mapCanvas" style="height: 250px; width: 100%; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 152px; top: -9px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 152px; top: 247px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 408px; top: -9px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 408px; top: 247px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -104px; top: -9px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -104px; top: 247px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 664px; top: -9px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 664px; top: 247px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 152px; top: -9px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 152px; top: 247px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 408px; top: -9px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 408px; top: 247px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -104px; top: -9px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -104px; top: 247px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 664px; top: -9px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 664px; top: 247px;"></div></div></div><div style="width: 22px; height: 40px; overflow: hidden; position: absolute; left: 354px; top: 85px; z-index: 125;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; z-index: 0; transform: translateZ(0px); left: 0px; top: 0px;"><div style="overflow: hidden; width: 729px; height: 250px;"><img src="https://maps.googleapis.com/maps/api/js/StaticMapService.GetMapImage?1m2&amp;1i48488&amp;2i28425&amp;2e1&amp;3u8&amp;4m2&amp;1u729&amp;2u250&amp;5m5&amp;1e0&amp;5sen-GB&amp;6sus&amp;10b1&amp;12b1&amp;token=46740" style="width: 729px; height: 250px;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="transform: translateZ(0px); position: absolute; left: 152px; top: -9px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i190!3i111!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=83919" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 152px; top: 247px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i190!3i112!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=119940" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 408px; top: -9px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i191!3i111!4i256!2m3!1e0!2sm!3i355027073!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=95777" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 408px; top: 247px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i191!3i112!4i256!2m3!1e0!2sm!3i355027063!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=37658" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -104px; top: -9px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i189!3i111!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=109475" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -104px; top: 247px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i189!3i112!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=14425" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 664px; top: -9px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i192!3i111!4i256!2m3!1e0!2sm!3i355027193!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=48582" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 664px; top: 247px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i8!2i192!3i112!4i256!2m3!1e0!2sm!3i355027169!3m9!2sen-GB!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=12572" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Use two fingers to move the map</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" style="width: 22px; height: 40px; overflow: hidden; position: absolute; opacity: 0.01; left: 354px; top: 85px; z-index: 125;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png" draggable="false" usemap="#gmimap0" style="position: absolute; left: 0px; top: 0px; width: 22px; height: 40px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area href="javascript:void(0)" log="miw" coords="8,0,5,1,4,2,3,3,2,4,2,5,1,6,1,7,0,8,0,14,1,15,1,16,2,17,2,18,3,19,3,20,4,21,5,22,5,23,6,24,7,25,7,27,8,28,8,29,9,30,9,33,10,34,10,40,11,40,11,34,12,33,12,30,13,29,13,28,14,27,14,25,15,24,16,23,16,22,17,21,18,20,18,19,19,18,19,17,20,16,20,15,21,14,21,8,20,7,20,6,19,5,19,4,18,3,17,2,16,1,14,1,13,0,8,0" shape="poly" title="ReferSell" style="cursor: pointer;"></map></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=22.563837,88.356131&amp;z=8&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 215px; top: 35px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data \A92016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data \A92016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data \A92016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@22.5638368,88.356131,8z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; width: 28px; height: 55px; background-color: rgb(255, 255, 255);"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; top: 0px; background-color: rgb(230, 230, 230);"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; min-width: 40px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></center>
                                                                                                <div id="infoPanel">
                                                                                                    <input type="hidden" name="gps_latitude" id="lat" value="22.5638368">
                                                                                                    <input type="hidden" name="gps_longitude" id="lng" value="88.356131">
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
       <?php echo $this->element("user_banner");?>
    </div>
</section>
<div class="clr"></div>
<?php
$remain_charecter=$permissions->my_profile-$count_charecter;
?>

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
                <textarea name="about" id="about" rows="10" cols="100" style="width:98%;"  maxlength="<?php echo $permissions->my_profile;?>" ><?php echo $user['User']['about']?></textarea>
                <p id="textarea_feedback"></p>
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
    function saveAboutMe(id) {
        if ($("#about").val() == "") {
            alert("About You Cannot Empty!");
            $("#about").focus();
            return false;
        }else{
            
        }
        
        
        
        
        
        var aboutData = $("#about").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>agencies/editAgentAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'agencies', 'action' => 'editagentprofile')); ?>";
        });
    }
        $(document).ready(function($) {
    var text_max = parseInt(<?php echo $permissions->my_profile?>)-parseInt(<?php echo $count_charecter;?>);
    $("#textarea_feedback").html(text_max+" characters remaining");
     $('#about').keyup(function(event) {
        var text_length = $('#about').val().length;
        text_max=parseInt(<?php echo $permissions->my_profile?>);
        if(text_length==0)
        {
            $(this).attr('maxlength', text_max);
        }
            
        var text_remaining = text_max - text_length;
        if(text_remaining==0)
        {
        $('#textarea_feedback').html("");
        }
        else
        {
        $('#textarea_feedback').html(text_remaining + ' characters remaining');
       }
    }); 
}); //end if ready(fn)

</script>


<script>

    function copy() {
        if ($("#AddressCheckBox").is(":checked")) {
            var OrganizationName = $("#phone_no").val();

            $("#mobile_no").val(OrganizationName);

        }
    }

</script>