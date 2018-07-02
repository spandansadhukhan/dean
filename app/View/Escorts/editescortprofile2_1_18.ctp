<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", MaxDate: "-216m"});
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
                                        <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'ajaxform','id'=>'form-ui','accept-charset'=>'utf-8','method'=>'post')); ?>
                                            <input type="hidden" name="ftype" value="persionalinfo" >
                                            <?php echo $this->Form->input('id'); ?>
                                            <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Name:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'gui-input','maxlength'=>100,'div'=>FALSE)); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

<!--                                            <div class="form-profile-block">
                                                <label class="pl"> Last Name:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <?php echo $this->Form->input('last_name',array('label'=>false,'required'=>'required','class'=>'gui-input','maxlength'=>100,'div'=>FALSE)); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-profile-block" style="margin-bottom: 14px;">
                                                <label class="pl">Gender: </label>
                                                <div class="inputContainer">
                                                    <div class="section" style="margin: 0;">
                                                        <div class="option-group field">
                                                            <label class="option">
                                                                <input type="radio"  <?php echo $this->request->data['User']['gender'] != "M" ? '' : 'checked'; ?> name="gender" value="M">
                                                                <span class="radio"></span> Male </label>
                                                            <label class="option">
                                                                <input type="radio"  <?php echo $this->request->data['User']['gender'] != "F" ? '' : 'checked'; ?> name="gender" value="F" >
                                                                <span class="radio"></span> Female </label>
                                                            <label class="option">
                                                                <input type="radio"  <?php echo $this->request->data['User']['gender'] != "T" ? '' : 'checked'; ?> name="genderbi" value="T">
                                                                <span class="radio"></span> Trans </label>
                                                        </div><!-- end .option-group section -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Date of Birth:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                            <input type="text" placeholder="Date of Birth" value="<?php echo $this->request->data['User']['birthday'] ?>" class="gui-input datepicker" id="datepicker" name="birthday" style="background: #181818 none repeat scroll 0 0;">
                                                            <label class="field-icon" for="dob"><i class="fa fa-calendar"></i></label>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Height:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('height',array('options'=>$heights,'label'=>false,'required'=>'required','empty'=>'Choose Height','div'=>FALSE)); ?>
                                                           <i class="arrow double"></i>
 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Weight:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field">
                                                           <?php echo $this->Form->input('weight',array('type'=>'text','label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'id'=>'datepicker')); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Bust Size:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('bust_size',array('options'=>$busts,'label'=>false,"empty"=>"Choose Bust Size",'required'=>'required','width'=>'280px','div'=>FALSE)); ?>
                                                           <i class="arrow double"></i>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Cup Size:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('cup_size',array('options'=>$cups,"empty"=>"Choose Cup Size",'label'=>false,'required'=>'required','width'=>'280px','div'=>FALSE)); ?>
                                                           <i class="arrow double"></i>
 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl"> Availability:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('availability_id',array('label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
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
                                                           <?php echo $this->Form->input('haircolor_id',array('empty'=>'Choose Hair Color','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Eye Color:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('eyecolor_id',array('empty'=>'Choose Eye Color','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
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
                                                           <?php echo $this->Form->input('bodytype_id',array('empty'=>'Choose Body Type','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
<!--                                            <div class="form-profile-block">
                                                <label class="pl">Origin:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                           <?php echo $this->Form->input('origin_id',array('empty'=>'Select Origin','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="form-profile-block">
                                                <label class="pl">Category:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                            <select name="catlist" id="category_id">
                                                                <option value="">Choose Category</option>
                                                                <?php
                                                                foreach ($categories2 as $key=>$val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key ?>" id="catopt<?php echo $key; ?>" style="display:<?php echo array_key_exists($key, $select_catname)?'none':''; ?>"
                                                                        ><?php echo $val;?></option>
                                                                <?php }?>
                                                            </select>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                               <div  class="form-profile-block">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="serviceInput">
                                                                            <!--
                                                                            <div class="fleft city-title" id="service-li-id_10">
                                                                                <input style="opacity:0; position:absolute;" type="checkbox"  
                                                                                       checked="checked"  value="10" id="service10" 
                                                                                       name="services[]" onclick="removeService('10')" >
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    Erotik massage (EM)
                                                                                </label>
                                                                                <a class="icon-remove" onclick="removeService('10')"></a>
                                                                            </div>
                                                                            -->
                                                                            <?php if(!empty($select_catname)){ foreach($select_catname as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title" id="service-li-id_<?php echo $skdt?>">
                                                                                <input type="hidden" name="data[User][category_id][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deletecat(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Language:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                            <select id="language_id">
                                                                <option value="">Choose Language</option>
                                                                <?php
                                                                foreach ($languages as $key=> $language)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key;?>" id="langopt<?php echo $key;?>" style="display:<?php echo array_key_exists($key, $select_language)?'none':'';?>"><?php echo $language; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="form-profile-block">
                                                                    <div id="languagediv"  >
                                                                        <div class="option-group field" id="LanguageInput">
                                                                            <!--
                                                                            <div class="fleft city-title" id="service-li-id_10">
                                                                                <input style="opacity:0; position:absolute;" type="checkbox"  
                                                                                       checked="checked"  value="10" id="service10" 
                                                                                       name="services[]" onclick="removeService('10')" >
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    Erotik massage (EM)
                                                                                </label>
                                                                                <a class="icon-remove" onclick="removeService('10')"></a>
                                                                            </div>
                                                                            -->
                                                                            <?php if(!empty($select_language)){ foreach($select_language as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title">
                                                                                <input type="hidden" name="data[User][language][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deletelang(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                            <div class="clearfix"></div>
                                            <div class="form-profile-block">
                                                <label class="pl">Services:</label>
                                                <div class="inputContainer">
                                                    <div class="section" id="ctlt" >
                                                        <label class="field select">
                                                            <select id="service_id">
                                                                <option value="">Choose Services</option>
                                                                <?php
                                                                foreach($services as $key =>$serv)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" id="servopt<?php echo $key; ?>"
                                                                        style="display:<?php echo array_key_exists($key, $select_service)?'none':''?>"       
                                                                        ><?php echo $serv;?></option>
                                                                <?php }?>
                                                                
                                                            </select>
                                                            
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div  class="form-profile-block">
                                                                    <div id="languagediv"  >
                                                                        <div class="option-group field" id="ServiceInput">
                                                                            
                                                                            <?php if(!empty($select_service)){ foreach($select_service as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title">
                                                                                <input type="hidden" name="data[User][service_id][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deleteservice(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>
                                            <div class="clearfix"></div>
                                            <div class="form-profile-block">
                                                <label class="pl">Ethnicity:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                            <?php echo $this->Form->input('nationality_id',array('empty'=>'Choose  Nationality','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Country:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field select">
                                                            <?php echo $this->Form->input('country_id',array('options'=>$countries2,'default'=>!empty($this->request->data['User']['country_id'])?$this->request->data['User']['country_id']:'','empty'=>'Choose Country','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
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
                                                            <?php echo $this->Form->input('city_id',array('empty'=>'Choose Citiy','label'=>false,'required'=>'required','style'=>'width:280px','div'=>FALSE)); ?>
                                                            <i class="arrow double"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Showing Face:</label><div class="inputContainer">
                                                    <div class="section" style="margin: 0;">
                                                        <div class="option-group field">
                                                            <label class="option">
                                                            <?php echo $this->Form->input('is_show_face',array('label'=>false,'div'=>FALSE,'style'=>'opacity:1')); ?>

                                                            </label>    
                                                                
                                                               
                                                            
                                                        </div><!-- end .option-group section -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-profile-block">
                                                <label class="pl">About you:</label><div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field prepend-icon">
                                                           <?php echo $this->Form->input('about',array('type'=>'textarea',"readonly"=>TRUE,'maxlength'=>1000,'label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'style'=>'height:150px;')) ?>
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
                        
                    </div>
                    <div class="profie-bl2">
                        <div class="profie-bl2-inner">
                            <h3>Contact Information<br><span>(Please provide your contact information)</span></h3>
                            <div class="form-profile">
                                <div class="smart-wrap">
                                    <div class="smart-forms smart-container">
                                        <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                         <?php echo $this->Form->input('id'); ?>
                                            <input type="hidden" name="ftype" value="contactinfo" >
                                            <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                            <div class="form-profile-block">
                                                <label class="pl">Contact Number:</label>
                                                <div class="inputContainer">
                                                    <div class="section">
                                                        <label class="field prepend-icon">
                                                            <?php echo $this->Form->input('phone_no',array('type'=>'text','label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'placeholder'=>"Contact Number")); ?>
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
                                                            <?php echo $this->Form->input('website_url',array('type'=>'text','label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'placeholder'=>'Website Url')); ?>
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
                                                            <?php echo $this->Form->input('skypeid',array('type'=>'text','label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'placeholder'=>'Skype')); ?>
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
                                                            <?php echo $this->Form->input('facebook_url',array('type'=>'text','label'=>false,'required'=>'required','class'=>'gui-input','div'=>FALSE,'placeholder'=>'Facebook')); ?>
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
        <?php echo $this->element("user_banner")?>
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
                <textarea name="about" id="about" rows="10" cols="100" style="width:98%; color:#fff" maxlength="<?php echo $permissions->my_profile;?>" ><?php echo $this->request->data['User']['about'] ?></textarea>
                <p id="textarea_feedback"></p>
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
            url: "<?php echo $this->Html->url('/'); ?>escorts/editEscortAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Escorts', 'action' => 'editescortprofile')); ?>";
        });
    }
    
    $(document).ready(function($) {
    var text_max = parseInt(<?php echo $permissions->my_profile?>)-parseInt(<?php echo $count_charecter;?>);
    $("#textarea_feedback").html(text_max+" characters remaining");
     $('#about').keyup(function(event) {
        var text_length = $('#about').val().length;
        var text_max=parseInt(<?php echo $permissions->my_profile?>);
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
    $("#category_id").change(function(){
        var txt= $("#category_id option:selected").text();
        var txtval= $("#category_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][category_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletecat("+txtval+")'></a></div>";
        $("#serviceInput").append(html);
        $("#catopt"+txtval).hide();
        $('#category_id option[value=""]').prop('selected', true);

    });
        $("#language_id").change(function(){
        var txt= $("#language_id option:selected").text();
        var txtval= $("#language_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][language][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletelang("+txtval+")'></a></div>";
        $("#LanguageInput").append(html);
        $("#langopt"+txtval).hide();
        $('#language_id option[value=""]').prop('selected', true);

    });
        $("#service_id").change(function(){
        var txt= $("#service_id option:selected").text();
        var txtval= $("#service_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][service_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deleteservice("+txtval+")'></a></div>";
        $("#ServiceInput").append(html);
        $("#servopt"+txtval).hide();
        $('#service_id option[value=""]').prop('selected', true);

    });

}); //end if ready(fn)
    function deletecat(cat)
    {
      $("#catopt"+cat).show();

    }
    function deletelang(cat)
    {
        $("#langopt"+cat).show();
    }
    function deleteservice(cat)
    {
        $("#servopt"+cat).show();
    }
    
</script>