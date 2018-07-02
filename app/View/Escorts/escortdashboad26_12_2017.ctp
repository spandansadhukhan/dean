<?php
// pr($user); exit;
?>
<style>
    .modal-backdrop.fade.in {position: relative;}
    .containerss{ position: absolute; top: 2%; left: 3%; right: 0; bottom: 0; }
    .action{ width: 100px; height: 30px; margin: 10px 0; }
    .cropped>img{ margin-right: 10px; }
    .wrap{
        width: 700px;
        margin: 10px auto;
        padding: 10px 15px;
        background: white;
        border: 2px solid #DBDBDB;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
        overflow: hidden;

    }
    img#uploadPreview{
        border: 0;
        border-radius: 3px;
        -webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
        margin-bottom: 30px;
        overflow: hidden;
        max-width: 100%;
        max-height: 100%
    }
    input[type="submit"]{
        border-radius: 10px;
        /*background-color: #61B3DE;*/
        border: 0;
        color: white;
        font-weight: bold;
        padding: 6px 15px 5px;
        cursor: pointer;
    }
    .choose_file{
        position:relative;
        display:inline-block;
        /*border-radius:8px;*/
        border:0 none;
        padding: 5px 6px 5px 8px;
        font: normal 14px Myriad Pro, Verdana, Geneva, sans-serif;
        margin-top: 2px;
        background:#61b3de;
        /*background:#f98d29;*/
        color: #fff;
        width: 30%;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        font-weight: bold;
    }
    .choose_file input[type="file"]{
        -webkit-appearance:none;

        top:0; left:0;
        opacity:0;
    }

</style>

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<?php
echo $this->Html->script('script');
?>
<?php
echo $this->Html->css('imgareaselect-animated');
?>
<?php
echo $this->Html->script('jquery.imgareaselect.pack');
?>

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
                                                <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                                <?php
echo $this->element('escort_sidebar');
?>
                                               <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <div class="smart-forms">
                                                        </div>
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;"> <!-- My Advance Directory Home -->
                                                             The Directory Home    
                                                            </h1>
                                                            <h3> Last Logged in: <span></section>
                                                        <div class="ver buttonGrey" style="font-size: 20px;cursor: default;"><?php
echo $user['User']['is_approved'] != 1 ? '<i class="fa fa-times-circle"></i> Approval Pending' : '<i class="fa fa-check-circle""></i> Approved';
?></div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div id="profilePic">
                                                            <div class="pro-pic">
                                                                <div class="pro-image-area">
                                                                    <?php
if ($user['User']['profile_image'] != "") {
?>
                                                                       <img class="img-box" id="avatar-edit-img" data-src="default.jpg" data-holder-rendered="true"
                                                                             src="<?php
    echo $this->Html->url('/');
?>user_images/<?php
    echo $user['User']['profile_image'];
?>"
                                                                             style="width: 100%; height: auto;"/>
                                                                         <?php
} else {
?>
                                                                       <img class="img-circle" id="avatar-edit-img" height="128" data-src="default.jpg"
                                                                             data-holder-rendered="true" style="width: 100%; height: auto;"
                                                                             src="<?php
    echo $this->Html->url('/');
?>images/noimage.png"/>
                                                                         <?php
}
?>
                                                                    
                                                                    <a style=" color:#fff" href="javascript:void(0)" data-toggle="modal" data-target="#userProfileImage">
                                                                        <!--<i class="fa fa-edit"></i>--><div style="width: 100%; height:25px; padding-top:8px; background: rgba(249,141,41,0.7);"
                                                                                                              class="text-center"><i class="fa fa-edit"></i>&nbsp;Upload Image</div> </a>
                                                                </div>
                                                                <div class="modal fade" id="userProfileImage" style="" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content" id="addrEditModal">
                                                                            <form action="<?php
echo $this->webroot;
?>escorts/escortdashboard" method="post" enctype="multipart/form-data">
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
                                                                                    <input type="hidden" name="id" value="<?php
echo $user['User']['id'];
?>" />
                                                                                    <!-- hidden inputs -->
                                                                                    <input type="hidden" id="x" name="x" />
                                                                                    <input type="hidden" id="y" name="y" />
                                                                                    <input type="hidden" id="w" name="w" />
                                                                                    <input type="hidden" id="h" name="h" />
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <div class="choose_file" style="float:left;"><b style="margin-left: 10px;position: absolute;margin-top: 5px;">Upload profile image</b>
                                                                                        <input id="uploadImage" type="file" accept="image/jpeg" name="image"/>
                                                                                    </div>                                                                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                                                                    <!--<button type="submit" value="Crop & Save" class="btn btn-primary">Close</button>-->
                                                                                    <div style="float: right"><input type="submit" value="  Save" class="btn btn-primary"></div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <section class="profile-info">
                                                            <a href="<?php
echo $this->webroot;
?>escorts/editescortprofile" class="r_butt edi_pro" style="text-align: center;width: 100px;"> Edit Your Profile </a>
                                                            <!-- <a href="javascript:void(0)" class="r_butt" style="margin-top:33px; text-align: center;width: 100px;">Advertise With Us</a>
                                                            <a href="javascript:void(0)" class="r_butt" style="margin-top:66px; text-align: center;width: 100px;">Ad-on Services </a> -->
                                                            <ul>
                                                                <li><span class="s-left1"> Name :</span><span class="s-right"> <?php
echo $user['User']['first_name'] . " " . $user['User']['last_name'];
?> </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> Location :</span><span class="s-right"> <?php
echo $user['Country']['name'] . " , " . $user['City']['name'];
?> </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1">Total Escorts Added :</span><span class="s-right">
                                                                        No Profile Added Yet                      </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1">Membership Status :</span><span class="s-right">
                                                                        Free
                                                                    </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1">Account Status :</span><span class="s-right">Not Approved (Your profile not publish and listed on Advance Directory )</span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                            </ul>
                                                            <div class="statu">
                                                                <h3>Online Status:</h3>

                                                                <div class="onoffswitch">
                                                                    <input type="checkbox" name="onstatus" class="onoffswitch-checkbox" onchange="showOffline()" id="myonoffswitch">

                                                                    <label class="onoffswitch-label" for="myonoffswitch">
                                                                        <span class="onoffswitch-inner"></span>
                                                                        <span class="onoffswitch-switch"></span>
                                                                    </label>
                                                                    
                                                                </div>

                                                                     <span style="float:right;margin-right: 18px;margin-top:8px;"><?php
if ($user['User']['membership_id'] == '2') {
?>
                                                                    <a href="<?php
    echo $this->webroot;
?>escorts/websitetemplate">Create Your Website</a>
                                                                     <?php
}
?></span>  

                                                                <div class="clr"></div>
                                                            </div>
                        <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="status_offline">                  
                        <div class="smart-forms">
                        <div class="ajax_report notification spacer-t5 form-msg"> 
                            <a class="close-btn" onclick="close_div();" href="#">\D7</a> 
                            <span class="ajax_message">Hello Message</span> </div>
                        </div>
                        <input type="hidden" name="userid" value="141">
                        <input type="hidden" name="status" id="onlinestatus" value="available">
                        </form>
                        <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="status_offline_hide">                
                        <input type="hidden" id="hideformid" name="hide" value="1">
                        </form>                  <div class="clr"></div>
                                                        </section>
                                                        <div class="clr"></div>
                                                        <div class="clr"></div>
                                                        <!--
                                                        <div class="statu">
                                                            <h3>Add Membership to Your Escort Profile </h3>
                                                            <div class="title-left" style="margin-top:9px"></div>
                                                            <a style="float:right; margin-top: 14px;" class="ver buttonGrey" href="#">CLICK HERE</a>
                                                            <br>    <br>
                                                            <div class="title-left" style="margin-top:0px">
                                                                Do you want to purchase membership for your Escorts ?
                                                            </div>
                                                            <div class="clr"></div>
                                                        </div>
                                                        -->


                                                        <script>
                                                            function showMember(){
                                                                $("#membership_part").css("display","block");
                                                                $("#memberShowHide").html('<div class="hide_sec" id="show_membership"><button id="hide_member" onclick="hideMember();" ><i class="fa fa-arrow-circle-up"></i> Hide</button></div>');
                                                                $("#membership_feature").hide();
                                                            }
                                                            function hideMember(){
                                                                $("#membership_part").css("display","none");
                                                                $("#memberShowHide").html('<div class="hide_sec" id="show_membership"><button id="hide_member" onclick="showMember();" ><i class="fa fa-arrow-circle-down"></i> Show</button></div>');
                                                                $("#membership_feature").show();
                                                            }
                                                        </script>

                                                        <section class="my-profile-part stst-dsr2">
                                                            <section class="manage-shop shopfull2">
                                                                <section class="manage-title"><i style="color: #fff; padding-left:10px;" class="fa fa-life-ring"></i>
                                                                    <h1>Your Current Membership Features</h1>
                                                                    <div id="memberShowHide">
                                                                        <div class="hide_sec" id="show_membership"><button id="show_member" onclick="showMember();" ><i class="fa fa-arrow-circle-down"></i> Show</button></div>
                                                                    </div>
                                                                    <div class="pr-s1" id="membership_feature">
          <dl class="stats">

<dt>
    Homepage Premium Position </dt>
    <dd>
                   <?php echo $permissions->home_premium_pos?>           </dd>
    
    <dt>
        City/Region Premium Position 
    </dt>
    <dd><?php echo $permissions->city_premium_pos?></dd>

        <dt>
    Upload Photos  </dt>
    <dd><?php echo $permissions->uploadphotos?></dd>
<dt>
    Upload Videos</dt>
    <dd><?php echo $permissions->uploadphotos?></dd>

<dt>
    My Profile - Description</dt>
    <dd><?php echo $permissions->my_profile?></dd>
    <dt>
    Private Gallery Listing </dt>
    <dd><?php echo !empty($permissions->private_gallery)?"Yes":"No";?></dd>

    <dt>
    Receive Reviews </dt>
    <dd><?php echo $permissions->receive_review?"Yes":"No"?></dd>

    <dt>
    Manage Blacklist </dt>
    <dd><?php echo $permissions->customer_blacklist?"Yes":"No"?></dd>

    <dt>
    On Tour Feature </dt>
    <dd><?php echo $permissions->tour_feature?"Yes":"No"?></dd>

    <dt>
    Receive Online Booking Requests </dt>
    <dd><?php echo $permissions->onlinebooking?"Yes":"No"?></dd>
    
    <dt>
    Manage Schedule & Bookings </dt>
    <dd><?php echo $permissions->manage_schedule?"Yes":"No"?></dd>
    <dt>
    Set Happy Hours </dt>
    <dd><?php echo $permissions->set_happyhour?"Yes":"No"?></dd>
    <dt>
    Contact Information </dt>
    <dd><?php echo $permissions->contact_info==-1?"All Available":"No"?></dd>
    <dt>
    Have your own Webpage </dt>
    <dd><?php echo $permissions->have_webpage?"Yes":"No"?></dd>
    <dt>
    Receive Credits for Private Gallery </dt>
    <dd><?php echo $permissions->receive_credit?"Yes":"No"?></dd>
    <dt>
    Your own The Directory Email Address </dt>
    <dd><?php echo $permissions->own_directory?"Yes":"No"?></dd>
    <dt>
    On Site Chat Feature </dt>
    <dd><?php echo $permissions->chat?"Yes":"No"?></dd>
    <dt>
    Manage My Online Shop </dt>
    <dd><?php echo $permissions->manage_onlineshop?"Yes":"No"?></dd>
    <dt>
    Banner Advertising </dt>
    <dd><?php echo $permissions->banner_advertising?"Yes":"No"?></dd>
    <dt>
    Receive Profile comments </dt>
    <dd><?php echo $permissions->receive_comment?"Yes":"No"?></dd>
    <dt>
    Blog Feature </dt>
    <dd><?php echo $permissions->blog?'Yes':"No"?></dd>
    <dt>
    Google Maps Listing </dt>
    <dd><?php echo $permissions->google_map?'Yes':'No'?></dd>


                    </dl>
          </div>    
                                                                </section>
                                                                
                                                                <section id="membership_part" style="display:none;">
                                                                    <div class="boxes-right">
                                                                        <section class="">
                                                                            <section class="">
                                                                                <section class="inner-set">
                                                                                    <div class="no-record">Your Current Membership  Plan is <?php
echo $membership['Membership']['name'];
?>.</div>
                                                                                </section>

                                                               <form action="<?php
echo $this->webroot;
?>escorts/membershippayment" method="POST">
                                                               <input type="hidden" name="data[Escort][user_id]" value="<?php
echo $this->Session->read('fuid');
?>">
                                                               <div class="" style="text-align: center;">
                                                               <?php
if (!empty($membershipall)) {
    foreach ($membershipall as $membership) {
?>
                                                                <input type="radio" name="data[Escort][membership_id]" value="<?php
        echo $membership['Membership']['id'];
?>" <?php
        if ($user['User']['membership_id'] == $membership['Membership']['id']) {
?> checked <?php
        }
?>><?php
        echo $membership['Membership']['name'];
?>
                                                               <?php
    }
}
?>
                                                              </div>
                                                                           
                                                               <div class="" style="text-align: center;">
                                                                  
                                                               <!--<a href="#" style="margin: 7px 0 0;" class="buttonGrey">Upgrade Membership Now</a>-->
                                                               <input type="submit" name="submit" value="Upgrade Membership Now" class="buttonGrey">
                                                               </div>
                                                                </form>
                                                                            </section>   <div class="clr"></div>
                                                                        </section>

                                                                    </div>

                                                                </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <!-- Credit detail -->


                                                        <script>
                                                            function showToken(){
                                                                $("#token_part").css("display","block");
                                                                $("#tokenPart").html('<div class="hide_sec" id="show_token"><button id="show_token" onclick="hideToken();" ><i class="fa fa-arrow-circle-up"></i> Hide </button> </div>');
                                                            }
                                                            function hideToken(){
                                                                $("#token_part").css("display","none");
                                                                $("#tokenPart").html('<div class="hide_sec" id="show_token"><button id="show_token" onclick="showToken();" ><i class="fa fa-arrow-circle-down"></i> Show </button> </div>');
                                                            }
                                                        </script>


                                                        <section class="my-profile-part stst-dsr">
                                                            <section class="manage-shop shopfull2">
                                                                <section class="manage-title"><i style="color: #FFF; padding-left:10px;" class="fa fa-money"></i>
                                                                    <h1>My Credits </h1>
                                                                    <h5>Manage all your Credits/h5>
                                                                    <div id="tokenPart">
                                                                        <div class="hide_sec" id="show_token"><button id="show_token" onclick="showToken();"><i class="fa fa-arrow-circle-down"></i> Show </button> </div>
                                                                    </div>
                                                                </section>
                                                                <section id="token_part" style="display:none">
                                                                    <section class="manage-couting clear">
                                                                    <section class="mc1"> <cite>Total Purchased </cite> 
                                                                    <span><?php
echo $user['User']['credit_number'];
?></span> Credits 
                                                                    </section>

                                                                    <section class="mc1"> <cite>MemberShip Plan </cite> 
                                                                    <span>
                                                                          <?php
if (!empty($membershipall)) {
    foreach ($membershipall as $membership) {
        if ($user['User']['membership_id'] == $membership['Membership']['id']) {
            echo $membership['Membership']['name'];
        }
    }
}
?>  
                                                                    </span>
                                                                    </section>
                            <!-- <section class="mc1"> <cite>Total Rewarded </cite> <span>
                            0.00                        Credits                        </span> </section>
                            <section class="mc1"> <cite>Total Earned </cite> <span>
                            0.00                        Credits                        </span> </section>
                            <section class="mc1"> <cite>Total Used </cite> <span>
                            0.00                        Credits                        </span> </section> -->
                                                                        
                                                                        <div class="clr"></div>
                                                                    </section>
                                                                    <!-- <section class="manage-button"> <a href="javascript:;" onclick="redeem_request()"><i class="fa fa-database"></i> Redeem Credits  </a> <a href="#"><i class="fa fa-money"></i>
                                                                            Credits Transactions</a> </section> -->
                                                                </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <!-- credit detail End -->
                                                        <!-- Shop detail -->

                                                        <script>
                                                            function showShop(){
                                                                $("#shop_part").css("display","block");
                                                                $("#shopPart").html('<div class="hide_sec" id="show_shop"><button id="show_shop" onclick="hideShop();" ><i class="fa fa-arrow-circle-up"></i> Hide </button> </div>');
                                                            }
                                                            function hideShop(){
                                                                $("#shop_part").css("display","none");
                                                                $("#shopPart").html('<div class="hide_sec" id="show_shop"><button id="show_shop" onclick="showShop();" ><i class="fa fa-arrow-circle-down"></i> Show </button> </div>');
                                                            }
                                                        </script>

                                                        <section class="my-profile-part stst-dsr2">
                                                            <section class="manage-shop shopfull2">
                                                                <section>
                                                                    <h1>My Profile Statistics</h1>
                                                                </section>
                                                                <div class="right-my-account-blocks-inner">
          <div class="pr-s1">
          <dl class="stats">

<dt>
    <i class="fa fa-life-saver"></i>
    Profile Rating </dt>
    <dd>
                    N/A            </dd>
    
    <dt>
        <i class="fa fa-users"></i>
        Profile Views 
    </dt>
    <dd>5</dd>

        <dt>
    <i class="fa fa-eye"></i>
    Profile Ranking  </dt>
    <dd>46 (#48)</dd>
<dt>
    <i class="fa fa-star"></i>
    Favorites Count</dt>
    <dd>0</dd>

<dt>
    <i class="fa fa-thumbs-o-up"></i>
    Votes</dt>
    <dd>0</dd>
    <dt>
    <i class="fa fa-share"></i>
    Person Following </dt>
    <dd>0</dd>

    <dt>
    <i class="fa fa-image"></i>
    Total Photo Uploaded </dt>
    <dd>4</dd>

    <dt>
    <i class="fa fa-video-camera"></i>
    Total Video Uploaded </dt>
    <dd>0</dd>

    <dt>
    <i class="fa fa-file-code-o"></i>
    Total Blog Posted </dt>
    <dd>0</dd>

    <dt>
    <i class="fa fa-quote-right"></i>
    Total Received Reviews </dt>
    <dd>0</dd>
    
    <dt>
    <i class="fa fa-comment"></i>
    Total Received Comments </dt>
    <dd>0</dd>



                    </dl>
          </div>
           <div class="pr-s2">
                   <!-- Start Dashboard Statistic -->
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-content">
                    <div class="widget-content-inner">
                      <div class="paper-ring"></div>
                      <div class="row-fluid">
                        <div class="span8">
                          <h3 style="text-align:center">Profile Visitors (last 7 days)</h3>
                          <p></p>
                          <div class="chart" id="chart1" style="min-height:300px;min-width:100%;">
                              <div class="chart" id="chart1" style="min-height:300px;min-width:100%;" data-highcharts-chart="0"><div class="highcharts-container" id="highcharts-0" style="position: relative; overflow: hidden; width: 358px; height: 300px; text-align: left; line-height: normal; z-index: 0; font-family: &quot;Lucida Grande&quot;,&quot;Lucida Sans Unicode&quot;,Verdana,Arial,Helvetica,sans-serif; font-size: 12px; left: 0px; top: 0.233337px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="375" height="300"><desc>Created with Highcharts 3.0.4</desc><defs><clipPath id="highcharts-1"><rect fill="none" x="0" y="0" width="311" height="192"/></clipPath><linearGradient x1="0" y1="0" x2="0" y2="1" id="highcharts-4"><stop offset="0" stop-color="#FFF" stop-opacity="1"/><stop offset="1" stop-color="#ACF" stop-opacity="1"/></linearGradient></defs><rect rx="5" ry="5" fill="#FFFFFF" x="0" y="0" width="375" height="300"/><g class="highcharts-button" style="cursor:default;" title="Chart context menu" stroke-linecap="round" transform="translate(341,10)"><title>Chart context menu</title><rect rx="2" ry="2" fill="white" x="0.5" y="0.5" width="24" height="22" stroke="none" stroke-width="1"/><path fill="#E0E0E0" d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5" stroke="#666" stroke-width="3" zIndex="1"/><text x="0" y="13" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:black;fill:black;" zIndex="1"/></g><g class="highcharts-grid" zIndex="1"/><g class="highcharts-grid" zIndex="1"><path fill="none" d="M 54 137.5 L 365 137.5" stroke="#C0C0C0" stroke-width="1" zIndex="1" opacity="1"/></g><g class="highcharts-axis" zIndex="2"><path fill="none" d="M 131.5 233 L 131.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 170.5 233 L 170.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 209.5 233 L 209.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 247.5 233 L 247.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 286.5 233 L 286.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 325.5 233 L 325.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 364.5 233 L 364.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 92.5 233 L 92.5 238" stroke="#C0D0E0" stroke-width="1" opacity="1"/><path fill="none" d="M 54.5 233 L 54.5 238" stroke="#C0D0E0" stroke-width="1"/><path fill="none" d="M 54 232.5 L 365 232.5" stroke="#C0D0E0" stroke-width="1" zIndex="7" visibility="visible"/></g><g class="highcharts-axis" zIndex="2"><text x="26" y="136.5" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:#4d759e;font-weight:bold;fill:#4d759e;" zIndex="7" text-anchor="middle" transform="translate(0,0) rotate(270 26 136.5)" visibility="visible"><tspan x="26">Total Visits</tspan></text></g><g class="highcharts-series-group" zIndex="3"><g class="highcharts-series" visibility="visible" zIndex="0.1" transform="translate(54,40) scale(1 1)" clip-path="url(#highcharts-1)"><path fill="none" d="M 19.4375 96.5 L 58.3125 96.5 L 97.1875 96.5 L 136.0625 96.5 L 174.9375 96.5 L 213.8125 96.5 L 252.6875 96.5 L 291.5625 96.5" stroke="#a91763" stroke-width="2" zIndex="1"/></g><g class="highcharts-markers" visibility="visible" zIndex="0.1" transform="translate(54,40) scale(1 1)" clip-path="none"><path fill="#a91763" d="M 291.5625 92.5 C 296.8905 92.5 296.8905 100.5 291.5625 100.5 C 286.2345 100.5 286.2345 92.5 291.5625 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 252.6875 92.5 C 258.0155 92.5 258.0155 100.5 252.6875 100.5 C 247.3595 100.5 247.3595 92.5 252.6875 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 213.8125 92.5 C 219.1405 92.5 219.1405 100.5 213.8125 100.5 C 208.4845 100.5 208.4845 92.5 213.8125 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 174.9375 92.5 C 180.2655 92.5 180.2655 100.5 174.9375 100.5 C 169.6095 100.5 169.6095 92.5 174.9375 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 136.0625 92.5 C 141.3905 92.5 141.3905 100.5 136.0625 100.5 C 130.7345 100.5 130.7345 92.5 136.0625 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 97.1875 92.5 C 102.5155 92.5 102.5155 100.5 97.1875 100.5 C 91.8595 100.5 91.8595 92.5 97.1875 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 58.3125 92.5 C 63.6405 92.5 63.6405 100.5 58.3125 100.5 C 52.9845 100.5 52.9845 92.5 58.3125 92.5 Z" stroke-width="1"/><path fill="#a91763" d="M 19.4375 92.5 C 24.7655 92.5 24.7655 100.5 19.4375 100.5 C 14.1095 100.5 14.1095 92.5 19.4375 92.5 Z" stroke-width="1"/><path fill="none" d="M 9.4375 96.5 L 19.4375 96.5 L 58.3125 96.5 L 97.1875 96.5 L 136.0625 96.5 L 174.9375 96.5 L 213.8125 96.5 L 252.6875 96.5 L 291.5625 96.5 L 301.5625 96.5" class="highcharts-tracker" stroke-linejoin="round" visibility="visible" stroke-opacity="0.0001" stroke="rgb(192,192,192)" stroke-width="22" zIndex="2" style=""/></g></g><text x="188" y="25" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:16px;color:#274b6d;fill:#274b6d;width:311px;" text-anchor="middle" class="highcharts-title" zIndex="4"><tspan x="188">My Weekly Visitors</tspan></text><g class="highcharts-legend" zIndex="7" transform="translate(138,258)"><rect rx="5" ry="5" fill="none" x="0.5" y="0.5" width="99" height="26" stroke="#909090" stroke-width="1" visibility="visible"/><g zIndex="1"><g><g class="highcharts-legend-item" zIndex="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" stroke="#a91763" stroke-width="2"/><path fill="#a91763" d="M 8 7 C 13.328 7 13.328 15 8 15 C 2.6719999999999997 15 2.6719999999999997 7 8 7 Z"/><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">User Visits</tspan></text></g></g></g></g><g class="highcharts-axis-labels" zIndex="7"><text x="73.4375" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="73.4375">Wed</tspan></text><text x="112.3125" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="112.3125">Thu</tspan></text><text x="151.1875" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="151.1875">Fri</tspan></text><text x="190.0625" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="190.0625">Sat</tspan></text><text x="228.9375" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="228.9375">Sun</tspan></text><text x="267.8125" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="267.8125">Mon</tspan></text><text x="306.6875" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="306.6875">Tue</tspan></text><text x="345.5625" y="247" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="345.5625">Wed</tspan></text></g><g class="highcharts-axis-labels" zIndex="7"><text x="46" y="141" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:104px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="end" opacity="1"><tspan x="46">0</tspan></text></g><g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;white-space:nowrap;" visibility="hidden" transform="translate(83,106)" opacity="0"><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="96" height="46" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"/><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="96" height="46" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"/><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="96" height="46" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"/><rect rx="3" ry="3" fill="rgb(255,255,255)" x="0.5" y="0.5" width="96" height="46" fill-opacity="0.85" stroke="#a91763" stroke-width="1" anchorX="97.9258497180308" anchorY="31"/><text x="8" y="21" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:#333333;fill:#333333;" zIndex="1"><tspan style="font-size: 10px" x="8">Sat</tspan><tspan style="fill:#a91763" x="8" dy="16">User Visits</tspan><tspan dx="0">: </tspan><tspan style="font-weight:bold" dx="0">0</tspan></text></g><text x="365" y="295" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:9px;cursor:pointer;color:#909090;fill:#909090;" text-anchor="end" zIndex="8"><tspan x="365">Highcharts.com</tspan></text></svg></div></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Start Dashboard Statistic -->
   <!--<img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/graph.png" alt="" />-->
  
           </div>
           <div class="clr"></div>
          
            <div class="right-my-account-blocks" style="padding-top: 15px;">

          <div class="right-my-account-blocks-inner">
     <!--   <div class="z1">
           <h1>Recent Comments</h1>
           <div class="escort-status">
            <ul>

            <div class="no-record">No Comments Found</div>
            <div class="read_all"><a href="#">Read All Comments</a></div>
            </ul>
            </div>
           </div> -->
          
           <div class="z2" style="flex:none; width: 100%;">
         <h1>Recent Reviews</h1>

     <!--<div class="stepper">
                      <a href="#" title="">
                                <div class="step_left stepclass">
                                    <img width="8" height="14" src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/stepper_left.png" alt="Previous Escort Girl in London">
                                </div>
                            </a>
                   <a href="#" title="Next Escort Girl in London">
                                <div class="step_right stepclass">
                                    <img width="8" height="14" src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/stepper_right.png" alt="Next Escort Girl London">
                                </div>
                            </a>   <div class="clr"></div>
       </div>-->

                    <!--<div class="no-record">No Reviews Found</div>-->

                    <?php
foreach ($reviewall as $showallreviews) {
?>
                   <div class="test-reviews">
                        <!--<h2></h2>

                         <img src="<?php
    echo $this->webroot;
?>images/star_button.jpg">
                        <div class="review-part">
                          <div class="text-part">
                            <div class="left-part" style="float:left; width: 50%;">
                                <p>Meeting Country:
                                    <span>Belgium</span>
                                </p>
                            </div>
                            <div class="right-part" style="float:right; width: 50%;">
                                <p>Meeting Length:
                                    <span>1 Hour</span>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                          <div class="clear"></div>
                          <div class="text-part">
                            <div class="left-part" style="float:left; width: 50%;">
                                <p>Meeting City:<br>
                                    Antwerpen
                                </p>
                            </div>
                            <div class="right-part" style="float:right; width: 50%;">
                                <p>Cost:<br>
                                    120
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        </div> -->
                        <div class="super-time">
                            <h2>REVIEW
                            <span><?php
    echo $showallreviews['Review']['review'];
?></span></h2>
                            <p>Reviewed By:<i><?php
    echo $showallreviews['Reviewuser']['name'];
?></i>
                            <span><i><?php
    $raw_date = strtotime($showallreviews['Review']['review_date']);
    echo date("F j, Y", $raw_date);
?></i></span></p>
                        </div>
                        <div class="read_all"><a href="javascript:void(0);">Read All Reviews</a></div>
                    </div>

                    <?php
}
?>
                  </div>


                <div class="clr"></div>
                </div>

</div>
                <div class="clr"></div>
                </div>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <!-- Shop detail End-->
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
       <?php //echo $this->element('right_panel'); 
?>
      <?php
echo $this->element('user_banner');
?>
   </div>
</section>
<div class="clr"></div>