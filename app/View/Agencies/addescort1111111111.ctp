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
                            <h1>
                                Rates &amp; Services          </h1>
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
                                                <div class="left-my-account-menu">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-home"></i> Dashboard </a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-user"></i> My Agency Profile</a><div class="clr"></div></li>
                                                        <li><a href="#" class="active"><i class="fa fa-plus-circle"></i> Add New Escort</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-sitemap"></i> Manage Profiles</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-file-photo-o"></i> Photo Gallery</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-video-camera"></i> Video Gallery</a></li>
                                                        <li><a href="#"><i class="fa fa-envelope"></i> Email Messages<sup class="unread unreadCount" id="unreadmsg">0</sup></a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-file-code-o"></i> Manage Blogs</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-bookmark"></i> Classified Ads</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-crosshairs"></i> Adult Jobs</a></li>
                                                        <li><a href="#"><i class="fa fa-calendar"></i> Manage Events</a></li>
                                                        <li><a href="#"><i class="fa fa-users"></i> Blacklist Customers</a></li>
                                                        <li><a href="#"><i class="fa fa-adn"></i> Ad-on Services</a></li> 

                                                        <li><a href="#"><i class="fa fa-bank"></i> Manage Shop  </a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i> My Orders</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-bar-chart-o"></i> Credit Transactions  </a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-gears"></i> Account Settings</a><div class="clr"></div></li>
                                                        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a><div class="clr"></div></li>
                                                    </ul>
                                                </div>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;">Add New Escort</h1>

                                                        </section>

                                                        <div class="clr"></div>
                                                    </div>
                                                    <link href="css/new-tab.css" rel="stylesheet" type="text/css">
                                                    <div class="right-my-account-blocks-inner">
                                                        <section class="f-section f-whiteSmoke f-border-top  f-bottom-100" id="section-autoplay">
                                                            <div class="f-content container autoplay">
                                                                <div id="tabbed-nav" data-options="{&quot;deeplinking&quot;: true, &quot;multiline&quot;: true,&quot;defaultTab&quot;: &quot;tab1&quot;,
                                                                     &quot;shadows&quot;: true, &quot;rounded&quot;: false, &quot;size&quot;:&quot;medium&quot;, &quot;animation&quot;: {&quot;effects&quot;: &quot;slideH&quot;, &quot;duration&quot;: 500,
                                                                     &quot;type&quot;: &quot;jquery&quot;, &quot;easing&quot;: &quot;easeOutQuint&quot;}, &quot;position&quot;: &quot;top-left&quot;}" class="marginBottom z-tabs-icons2  z-icons-large2 hover normal medium z-icons-dark z-shadows z-bordered z-multiline z-tabs horizontal top top-left silver" data-role="z-tabs" data-style="normal" data-orientation="horizontal" data-theme="silver"><ul class="z-tabs-nav z-tabs-mobile z-state-closed" style="display: none;">
                                                                        <li><a style="text-align: left;" class="z-link">
                                                                                <span class="z-title">Add New Escort
                                                                                </span><span class="z-arrow"></span></a></li></ul><i class="z-dropdown-arrow"></i><ul class="z-tabs-nav z-tabs-desktop z-hide-menu">
                                                                        <!--<li data-link="tab1" id="tab1" class="z-tab z-first z-active"><a class="z-link">Manage Models</a></li>-->
                                                                        <li data-link="tab2" id="tab2" class="z-tab z-last"><a class="z-link">Add New Escort
                                                                            </a></li>
                                                                    </ul>
                                                                    <div class="h-content2 z-container" style="">
                                                                        <!--<div class="z-content" style="position: relative; display: block; left: 0px; top: 0px;"><div class="z-content-inner">
                                                                                     <div class="table-responsive for-msg">
                                                                                                <table class="table table-vcenter table-striped">
                                                                                                <thead>
                                                                    
                                                                                                <tr><th>Image</th>
                                                                                                <th>Name</th>
                                                                                                <th>Age</th>
                                                                                                <th>Gender</th>
                                                                                                <th>Eye Color</th>
                                                                                                <th>Hair Color</th>
                                                                                                <th class="text-center">Option</th>
                                                                                                </tr></thead>
                                                                                                    <tbody>
                                                                                                                                                                    </tbody>
                                                                                                    <tfoot>
                                                                                                                                            <tr style=""><td colspan="6"><section class="no-record"> You have not added any model.</section></td></tr>
                                                                                                                                    </tfoot>
                                                                                                </table>
                                                                                            </div>
                                                                        </div></div>-->
                                                                        <div class="z-content z-active" style="display: none; position: absolute; left: 717px; top: 0px;"><div class="z-content-inner">
                                                                                <div class="profie-bl">
                                                                                    <div class="profie-bl4-inner">
                                                                                        <div class="form-profile">
                                                                                            <div class="smart-wrap">
                                                                                                <div class="smart-forms smart-container">
                                                                                                    <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="add-model">          <div class="ajax_report notification spacer-t5 form-msg"> 
                                                                                                            <a class="close-btn" onclick="close_div();" href="javascript:;">�</a> 
                                                                                                            <span class="ajax_message">Hello Message</span> 
                                                                                                        </div>
                                                                                                        <div class="notification alert-error spacer-t10">
                                                                                                            <p>Please upgrade your membrship to add models.</p>
                                                                                                            <a class="close-btn" onclick="close_div();" href="javascript:;">&times;</a>  
                                                                                                            <ul>
                                                                                                                <li><i class="fa fa-arrow-circle-right"></i>
                                                                                                                    <a href="#" class="ulink">Click Here</a>.
                                                                                                                </li>
                                                                                                            </ul>                                
                                                                                                        </div>
                                                                                                        <input type="hidden" name="model_id" value="">
                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Name:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field">
                                                                                                                        <input type="text" placeholder="Name" value="" class="gui-input" id="from" name="name" style="width:100%">
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Bio:</label><div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field prepend-icon">
                                                                                                                        <textarea placeholder="Tell something about model" name="introduction" id="introduction" class="gui-textarea" maxlength="1000"></textarea>
                                                                                                                        <label class="field-icon" for="introduction"><i class="fa fa-comments"></i></label>
                                                                                                                        <span class="input-hint">
                                                                                                                            <strong>Hint:</strong> Don't be negative or off topic! just be awesome...
                                                                                                                        </span>
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
                                                                                                                            <input type="radio" value="Male" name="gender">
                                                                                                                            <span class="radio"></span> Male                            </label>
                                                                                                                        <label class="option">
                                                                                                                            <input type="radio" value="Female" name="gender">
                                                                                                                            <span class="radio"></span> Female                            </label>
                                                                                                                        <label class="option">
                                                                                                                            <input type="radio" value="Trans" name="gender">
                                                                                                                            <span class="radio"></span> Trans                            </label>
                                                                                                                    </div><!-- end .option-group section -->
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Date of Birth:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field prepend-icon">
                                                                                                                        <input type="text" placeholder="Date of Birth" value="" class="gui-input datepicker hasDatepicker" id="dob" name="dob" readonly="" style="width:100%">
                                                                                                                        <label class="field-icon" for="dob"><i class="fa fa-calendar"></i></label>
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Ethnicity:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select id="ethnicity" class="inputtext " name="ethnicity_id" style="width:100%">
                                                                                                                            <option value="">Select Ethnicity</option>
                                                                                                                            <option value="7">
                                                                                                                                Indian						  </option>
                                                                                                                            <option value="5">
                                                                                                                                White						  </option>
                                                                                                                            <option value="4">
                                                                                                                                Mixed						  </option>
                                                                                                                            <option value="2">
                                                                                                                                Black						  </option>
                                                                                                                            <option value="1">
                                                                                                                                Asian						  </option>
                                                                                                                        </select>
                                                                                                                        <i class="arrow double"></i>
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Experience :</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select name="experience" class="inputtext " id="experience" style="width:100%">
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

                                                                                                        <div class="form-profile-block" style="margin-bottom: 14px;">
                                                                                                            <label class="pl">Language Known :</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section" style="margin: 0;">
                                                                                                                    <div class="option-group field">
                                                                                                                        <label class="option" style="width:32%;">
                                                                                                                            <input type="checkbox" value="1" name="languages[]">
                                                                                                                            <span class="checkbox"></span> Portugues						</label>
                                                                                                                        <label class="option" style="width:32%;">
                                                                                                                            <input type="checkbox" value="2" name="languages[]">
                                                                                                                            <span class="checkbox"></span> Italiano						</label>


                                                                                                                    </div><!-- end .option-group section -->

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Service Type: </label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select name="availability" class="inputtext " id="service_type" style="width:100%">
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
                                                                                                            <label class="pl">Height:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select name="height" class="inputtext" id="height" style="width:100%">
                                                                                                                            <option value=""> Select Height </option>
                                                                                                                            <option value="150">
                                                                                                                                4.92                              feet                              150                              cm</option>
                                                                                                                            <option value="151">
                                                                                                                                4.95                              feet                              151                              cm</option>
                                                                                                                            <option value="152">
                                                                                                                                7.18                              feet                              219                              cm</option>
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
                                                                                                                        <select name="weight" class="inputtext" id="weight" style="width:100%">
                                                                                                                            <option value="">Select Weight</option>
                                                                                                                            <option value="80">
                                                                                                                                80                              lbs                              36.4                             kg </option>
                                                                                                                            <option value="81">
      
                                                                                                                            <option value="98">
                                                                                                                                98                              lbs                              44.5                             kg </option>
                                                                                                                            <option value="99">
                                                                                                                                99                              lbs                              45                             kg </option>
                                                                                                                            <option value="100">
                                                                                                                                100                              lbs                              45.5                             kg </option>
                                                                                                               
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
                                                                                                                        <select name="body_type" class="inputtext " id="body_type" style="width:100%">
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
                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Bust Size:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select id="bust" class="inputtext" name="bust" style="width:100%">
                                                                                                                            <option value=""> Select Bust Size </option>
                                                                                                                            <option value="Not Applicable"> Not Applicable </option>
                                                                                                                            <option value="20">  20   cm</option>
                                                                                                                            
                                                                                                                        </select>
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
                                                                                                                        <select name="eye_color_id" class="inputtext" id="eye_color_id" style="width:100%">
                                                                                                                            <option value=""> Select Eye Color </option>
                                                                                                                            <option value="4">
                                                                                                                                Blue                              </option>
                                                                                                                            <option value="5">
                                                                                                                                Gray                              </option>
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
                                                                                                                        <select name="hair_color_id" class="inputtext" id="hair_color_id" style="width:100%">
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
                                                                                                            <label class="pl">Cup Size:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section">
                                                                                                                    <label class="field select">
                                                                                                                        <select name="cup_size" class="inputtext" id="cup_size" style="width:100%">
                                                                                                                            <option value=""> Select Cup Size </option>
                                                                                                                        </select>
                                                                                                                        <i class="arrow double"></i>
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">Escot Photo:</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <div class="section" style="margin:0;">
                                                                                                                    <label class="field prepend-icon file">
                                                                                                                        <span class="button"> Choose File </span>
                                                                                                                        <input type="file" class="gui-file" name="image" id="file1" onchange="document.getElementById('uploader1').value = this.value;">
                                                                                                                        <input type="text" class="gui-input" id="uploader1" placeholder="no file selected" readonly="" style="width: 100%!important;">
                                                                                                                        <label class="field-icon"><i class="fa fa-upload"></i></label>
                                                                                                                    </label>
                                                                                                                </div><!-- end  section -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-profile-block">
                                                                                                            <label class="pl">&nbsp;</label>
                                                                                                            <div class="inputContainer">
                                                                                                                <input type="submit" class="buttonGrey" name="button" id="button" value="Add Model" style=" width: auto !important;">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>          
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div></div>
                                                                        </div></div></div>
                                                            </div></section>
                                                        <script src="js/new-tab2.js"></script>
                                                        <script src="js/new.js"></script>
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
            url: "<?php echo $this->Html->url('/'); ?>users/editAgentAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
                //$("#about").val(aboutData);
               //$("#myModal").modal('hide');
                window.location.href = "<?php echo Router::url(array('controller' => 'Users', 'action' => 'editagentprofile')); ?>";
        });
    }
</script>