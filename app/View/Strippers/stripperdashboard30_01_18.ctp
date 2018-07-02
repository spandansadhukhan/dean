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
<?php echo $this->Html->script('script'); ?>
<?php echo $this->Html->css('imgareaselect-animated'); ?>
<?php echo $this->Html->script('jquery.imgareaselect.pack'); ?>

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
                                                <?php echo $this->element('stripper_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <div class="smart-forms">
                                                        </div>
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;"> My Advance Directory Home</h1>
                                                            <h3> Last Logged in: <span>
                                                                    1 Hours 28 Minutes                    ago                                        </span></h3>
                                                        </section>
                                                        <div class="ver buttonGrey" style="font-size: 20px;cursor: default;"><?php echo $user['User']['is_approved'] != 1 ? '<i class="fa fa-times-circle"></i> Approval Pending' : '<i class="fa fa-check-circle""></i> Approved' ; ?></div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div id="profilePic">
                                                            <div class="pro-pic">
                                                                <div class="pro-image-area">
                                                                    <?php if ($user['User']['profile_image'] != "") { ?>
                                                                        <img class="img-box" id="avatar-edit-img" data-src="default.jpg" data-holder-rendered="true"
                                                                             src="<?php echo $this->Html->url('/'); ?>user_images/<?php echo $user['User']['profile_image'] ?>"
                                                                             style="width: 100%; height: auto;"/>
                                                                         <?php } else { ?>
                                                                        <img class="img-circle" id="avatar-edit-img" height="128" data-src="default.jpg"
                                                                             data-holder-rendered="true" style="width: 100%; height: auto;"
                                                                             src="<?php echo $this->Html->url('/'); ?>images/noimage.png"/>
                                                                         <?php } ?>
                                                                     <!--<a href="" class="edit-image"><i class="fa fa-edit"></i> Edit Image</a>-->
                                                                    <a style=" color:#fff" href="javascript:void(0)" data-toggle="modal" data-target="#userProfileImage">
                                                                        <!--<i class="fa fa-edit"></i>--><div style="width: 100%; height:25px; padding-top:8px; background: rgba(249,141,41,0.7);"
                                                                                                              class="text-center"><i class="fa fa-edit"></i>&nbsp;Upload Image</div> </a>
                                                                </div>
                                                                <div class="modal fade" id="userProfileImage" style="" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content" id="addrEditModal">
                                                                            <form action="<?php echo $this->webroot; ?>strippers/stripperdashboard" method="post" enctype="multipart/form-data">
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
                                                            <a href="<?php echo $this->Html->url('/')?>strippers/editStripperprofile" class="r_butt edi_pro" style="text-align: center;width: 100px;"> Edit Your Profile </a>
                                                            <a href="javascript:void(0)" class="r_butt" style="margin-top:33px; text-align: center;width: 100px;">Advertise With Us</a>
                                                            <a href="javascript:void(0)" class="r_butt" style="margin-top:66px; text-align: center;width: 100px;">Ad-on Services </a>
                                                            <ul>
                                                                <li><span class="s-left1"> Name :</span><span class="s-right"> <?php echo $user['User']['first_name']." ".$user['User']['last_name'] ?> </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> Location :</span><span class="s-right"> <?php echo $user['Country']['name']." , ".$user['City']['name'] ?> </span>
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
                                                                <div class="clr"></div>
                                                            </div>
                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="status_offline">                  <div class="smart-forms">
                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div>
                                                                </div>
                                                                <input type="hidden" name="userid" value="141">
                                                                <input type="hidden" name="status" id="onlinestatus" value="available">
                                                            </form>
                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="status_offline_hide">                 <input type="hidden" id="hideformid" name="hide" value="1">
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
                                                            }
                                                            function hideMember(){
                                                                $("#membership_part").css("display","none");
                                                                $("#memberShowHide").html('<div class="hide_sec" id="show_membership"><button id="hide_member" onclick="showMember();" ><i class="fa fa-arrow-circle-down"></i> Show</button></div>');
                                                            }
                                                        </script>

                                                        <section class="my-profile-part stst-dsr2">
                                                            <section class="manage-shop shopfull2">
                                                                <section class="manage-title"><i style="color: #fff; padding-left:10px;" class="fa fa-life-ring"></i>
                                                                    <h1>Your Current Membership Features</h1>
                                                                    <h5>Get VIP Membership</h5>
                                                                    <div id="memberShowHide">
                                                                        <div class="hide_sec" id="show_membership"><button id="show_member" onclick="showMember();" ><i class="fa fa-arrow-circle-down"></i> Show</button></div>
                                                                    </div>
                                                                </section>
                                                                <section id="membership_part" style="display:none;">
                                                                    <div class="boxes-right">
                                                                        <section class="">
                                                                            <section class="">
                                                                                <section class="inner-set">
                                                                                    <div class="no-record">Current Plan Validity Has Been Expired.</div>
                                                                                </section>
                                                                                <div class="" style="text-align: center;"><a href="#" style="margin: 7px 0 0;" class="buttonGrey">Upgrade Membership Now</a></div>
                                                                            </section>   <div class="clr"></div>
                                                                        </section>

                                                                    </div>

                                                                </section>
                                                                <section class="clr"></section>
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
                                                                    <h1>My                      Credits </h1>
                                                                    <h5>Manage all your                      Credits                    </h5>
                                                                    <div id="tokenPart">
                                                                        <div class="hide_sec" id="show_token"><button id="show_token" onclick="showToken();"><i class="fa fa-arrow-circle-down"></i> Show </button> </div>
                                                                    </div>
                                                                </section>
                                                                <section id="token_part" style="display:none">
                                                                    <section class="manage-couting clear">
                                                                        <section class="mc1"> <cite>Total Purchased </cite> <span>
                                                                                0.00                        Credits                        </span> </section>
                                                                        <section class="mc1"> <cite>Total Rewarded </cite> <span>
                                                                                0.00                        Credits                        </span> </section>
                                                                        <section class="mc1"> <cite>Total Earned </cite> <span>
                                                                                0.00                        Credits                        </span> </section>
                                                                        <section class="mc1"> <cite>Total Used </cite> <span>
                                                                                0.00                        Credits                        </span> </section>
                                                                        <section class="mc1"> <cite>Total Redeem </cite> <span>
                                                                                0.00                        Credits                        </span> </section>
                                                                        <section class="mc1"> <cite>Available Balance </cite> <span>
                                                                                0.00                       Credits                        </span> </section>
                                                                        <div class="clr"></div>
                                                                    </section>
                                                                    <section class="manage-button"> <a href="javascript:;" onclick="redeem_request()"><i class="fa fa-database"></i> Redeem Credits  </a> <a href="#"><i class="fa fa-money"></i>
                                                                            Credits Transactions</a> </section>
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
                                                                <section class="manage-title"><i style="color: #FFF; padding-left:10px;" class="fa fa-bank"></i>
                                                                    <h1>My Shop Statistics</h1>
                                                                    <h5>Manage all your shop</h5>
                                                                    <div id="shopPart">
                                                                        <div class="hide_sec" id="show_shop"><button id="show_shop" onclick="showShop();"><i class="fa fa-arrow-circle-down"></i> Show </button> </div>
                                                                    </div>
                                                                </section>
                                                                <section id="shop_part" style="display:none">
                                                                    <section class="manage-couting clear">
                                                                        <section class="mc1"> <cite>Physical Items</cite> <span>
                                                                                0                        </span> </section>
                                                                        <section class="mc1"> <cite>Web Cam Session</cite> <span>
                                                                                0                        </span> </section>
                                                                        <section class="mc1"> <cite>Private  Album</cite> <span>
                                                                                0                        </span> </section>
                                                                        <section class="mc1"> <cite>Private Videos</cite> <span>
                                                                                0                        </span> </section>
                                                                        <section style="width:363px;" class="mc1"> <cite>New Orders</cite> <span>
                                                                                No new order</span> </section>
                                                                        <section style="width:363px;" class="mc1"> <cite>Total Order Amount</cite> <span>
                                                                                0                       Credits                        </span> </section>
                                                                        <div class="clr"></div>
                                                                    </section>
                                                                    <section class="manage-button"> <a href="#"><i class="fa fa-bank"></i> Manage Shop</a> <a href="#"><i class="fa fa-sitemap"></i> My Sold Items</a> </section>
                                                                </section>
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
     <?php echo $this->element('user_banner'); ?>   
    </div>
</section>
<div class="clr"></div>