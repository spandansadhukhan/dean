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
                                                <?php echo $this->element('parlor_sidebar'); ?>
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
                                                                            <form action="<?php echo $this->webroot; ?>users/parlordashboard" method="post" enctype="multipart/form-data">
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
                                                            <a href="<?php echo $this->Html->url('/')?>users/editparlorprofile" class="r_butt edi_pro" style="text-align: center;width: 100px;"> Edit Your Profile </a>
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
                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="status_offline_hide">                	<input type="hidden" id="hideformid" name="hide" value="1">
                                                            </form>                  <div class="clr"></div>
                                                        </section>
                                                        <div class="clr"></div>
                                                        <div class="clr"></div>
                                                        <div class="statu">
                                                            <h3>Add Membership to Your Escort Profile </h3>
                                                            <div class="title-left" style="margin-top:9px"></div>
                                                            <a style="float:right; margin-top: 14px;" class="ver buttonGrey" href="#">CLICK HERE</a>
                                                            <br>	<br>
                                                            <div class="title-left" style="margin-top:0px">
                                                                Do you want to purchase membership for your Escorts ?
                                                            </div>
                                                            <div class="clr"></div>
                                                        </div>


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
                                                                <section id="membership_part" style="display:none">
                                                                    <div class="boxes-right">
                                                                        <section class="">
                                                                            <section class="">
                                                                                <section class="inner-set-no">
                                                                                    <div class="plans last-plan">
                                                                                        <style>
                                                                                            .plan .n-pead {
                                                                                                line-height: 34px;
                                                                                                padding: 0px 0px 0px 9px;
                                                                                                text-align: left;
                                                                                                text-transform: capitalize;
                                                                                                box-shadow: none;
                                                                                                margin-bottom: 2px;
                                                                                            }
                                                                                            .feature-header {
                                                                                                font-size: 14px;
                                                                                                position: relative;
                                                                                                float: left;
                                                                                                width: 165px;
                                                                                                overflow: hidden;
                                                                                                cursor:default;
                                                                                            }
                                                                                            .n-pead abbr {
                                                                                                float: right;
                                                                                                width: 120px;
                                                                                                font-size: 13px;
                                                                                            }
                                                                                            .plan .n-pead i {
                                                                                                float: right;
                                                                                                font-size: 20px;
                                                                                                text-align: left;
                                                                                                width: 30px;
                                                                                                color: #049A0E;
                                                                                                line-height: 34px;
                                                                                            }
                                                                                            .plans {
                                                                                                margin: 0px 1px;
                                                                                                width: 98%;
                                                                                            }

                                                                                            .n-pead {
                                                                                                float: left;
                                                                                                width: 47.5%;
                                                                                                margin-left: 8px;
                                                                                                background: #fff;
                                                                                                box-shadow: 0 0 5px #ccc;
                                                                                                font-family: "proxima_novalight";
                                                                                                font-weight:400;
                                                                                            }
                                                                                            .plan div {
                                                                                                padding:0;
                                                                                            }
                                                                                            .cross {
                                                                                                color:#F00 !important;
                                                                                            }
                                                                                        </style>
                                                                                        <div class="plan">
                                                                                            <div class="n-pead"><span class="feature-header">Upload Photos </span><abbr> <i class="fa fa-times cross"></i> 0 photos </abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead n-pead-n"><span class="feature-header">Upload Videos </span><abbr><i class="fa fa-times cross"></i> 0 videos </abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead"><span class="feature-header">Email Messaging </span> <abbr><i class="fa fa-times cross"></i>No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead"><span class="feature-header">Manage Shop </span> <abbr><i class="fa fa-times cross"></i>No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead"><span class="feature-header">Customer Blacklist </span> <abbr><i class="fa fa-times cross"></i>No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead"><span class="feature-header">Google Maps </span> <abbr><i class="fa fa-times cross"></i>No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead n-pead-n"><span class="feature-header">User Chat </span><abbr><i class="fa fa-times cross"></i>No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead"><span class="feature-header">Blog Feature </span><abbr><i class="fa fa-times cross"></i>0 Blogs </abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead n-pead-n"><span class="feature-header">Add Classifieds Ads </span><abbr><i class="fa fa-times cross"></i> No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead n-pead-n">
                                                                                                <span class="feature-header">Allowed Escorts </span>
                                                                                                <abbr><i class="fa fa-times"></i> 0  </abbr>
                                                                                                <div class="clr"></div>
                                                                                            </div>
                                                                                            <div class="n-pead n-pead-n"><span class="feature-header">Add Events </span><abbr><i class="fa fa-times cross"></i> No</abbr><div class="clr"></div></div>
                                                                                            <div class="n-pead n-pead-n"><span class="feature-header">Add Adult Jobs </span><abbr><i class="fa fa-times cross"></i> No</abbr><div class="clr"></div></div>
                                                                                        </div>
                                                                                        <div class="clr"></div>
                                                                                    </div>
                                                                                    <div class="clr"></div>
                                                                                </section>
                                                                                <div class="" style="text-align: center;"><a href="#" style="margin: 7px 0 0;" class="buttonGrey">Upgrade Membership Now</a></div>
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
                                                <!--
                                                <div class="right-my-account-blocks">
                                                    <div class="sec1" style="width: 720px;">
                                                        <div class="detail-heading">
                                                            <section class="title-left">
                                                                <h1 style="display:inline-block;">Site News </h1>
                                                            </section>
                                                            <div class="clr"></div>
                                                        </div>
                                                        <div class="right-my-account-blocks-inner">
                                                            <div class="col-md-4">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-xs-12">
                                                                                <ul id="demo4" style="overflow-y: hidden; height: 29px;">

                                                                                    <li class="news-item">No News Added Yet</li></ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel-footer"> <ul class="pagination pull-right" style="margin: 0px;"><li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li><li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li></ul><div class="clearfix"></div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sec1" style="width: 290px;">
                                                        <div class="detail-heading">
                                                            <section class="title-left">
                                                                <h1 style="display:inline-block;">Credits</h1>

                                                            </section>
                                                            <div class="clr"></div>
                                                        </div>
                                                        <div class="right-my-account-blocks-inner">
                                                            <span class="avai-cre">Available Credits</span>
                                                            <div class="destination">
                                                                <strong>0 Credits </strong>
                                                            </div>
                                                            <div class="destination-used">
                                                                <span style="float:left center;">Credit-In : 0</span><div class="clr"></div>
                                                                <span style="text-align: center;">Credit-Out  : 0 </span> <div class="clr"></div>
                                                            </div>
                                                            <a style="margin: 7px 0 0;" href="#" class="buttonGrey" data-type="iframe">Buy Credits</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;">Notifications <a href="#" class="buttonGrey" style="font-size: 14px; padding: 5px 15px;">View All Notifications</a> </h1>
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="sec1" style="width: 779px;">
                                                        <div class="detail-heading">
                                                            <section class="title-left">
                                                                <h1 style="display:inline-block;">Recent Escort Comments</h1>
                                                            </section>
                                                            <div class="clr"></div>
                                                        </div>
                                                        <div class="right-my-account-blocks-inner">
                                                            <div class="col-md-4">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <div class="row">
                                                                            <div class="col-xs-12">
                                                                                <ul id="demo1" style="overflow-y: hidden; height: 32px;">
                                                                                    <li class="no-record">No Comments Found</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel-footer"> <ul class="pagination pull-right" style="margin: 0px;"><li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li><li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li></ul><div class="clearfix"></div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;">Profile Statistics</h1>
                                                        </section>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div class="right-my-account-blocks-inner">
                                                        <div class="pr-s1">
                                                            <dl class="stats">
                                                                <dt>
                                                                    <i class="fa fa-trophy"></i>
                                                                    Profile Ranking  </dt>
                                                                <dd>13  </dd>
                                                                <dt>
                                                                    <i class="fa fa-star"></i>
                                                                    Favorites Count</dt>
                                                                <dd>0</dd>
                                                                <dt>
                                                                    <i class="fa fa-thumbs-o-up"></i>
                                                                    Votes</dt>
                                                                <dd>0</dd>
                                                                <dt>
                                                                    <i class="fa fa-eye"></i>
                                                                    Profile View </dt>
                                                                <dd>0</dd>
                                                                <dt>
                                                                    <i class="fa fa-users"></i>
                                                                    Total Escorts</dt>
                                                                <dd>0</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="pr-s2">

                                                            <div class="row-fluid">
                                                                <div class="span12">
                                                                    <div class="widget">
                                                                        <div class="widget-content">
                                                                            <div class="widget-content-inner">
                                                                                <div class="paper-ring"></div>
                                                                                <div class="row-fluid">
                                                                                    <div class="span8">
                                                                                        <h3 style="text-align:center">Profile Visitors (last 7 days)</h3>
                                                                                        <div class="chart" id="chart1" style="" data-highcharts-chart="0"><div class="highcharts-container" id="highcharts-0" style="position: relative; overflow: hidden; width: 375px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif; font-size: 12px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="375" height="400"><desc>Created with Highcharts 3.0.4</desc><defs><clipPath id="highcharts-1"><rect fill="none" x="0" y="0" width="312" height="288"></rect></clipPath></defs><rect rx="5" ry="5" fill="#FFFFFF" x="0" y="0" width="375" height="400"></rect><g class="highcharts-button" style="cursor:default;" title="Chart context menu" stroke-linecap="round" transform="translate(341,10)"><title>Chart context menu</title><rect rx="2" ry="2" fill="white" x="0.5" y="0.5" width="24" height="22" stroke="none" stroke-width="1"></rect><path fill="#E0E0E0" d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5" stroke="#666" stroke-width="3" zIndex="1"></path><text x="0" y="13" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:black;fill:black;" zIndex="1"></text></g><g class="highcharts-grid" zIndex="1"></g><g class="highcharts-grid" zIndex="1"><path fill="none" d="M 53 185.5 L 365 185.5" stroke="#C0C0C0" stroke-width="1" zIndex="1" opacity="1"></path></g><g class="highcharts-axis" zIndex="2"><path fill="none" d="M 130.5 329 L 130.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 169.5 329 L 169.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 208.5 329 L 208.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 247.5 329 L 247.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 286.5 329 L 286.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 325.5 329 L 325.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 364.5 329 L 364.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 91.5 329 L 91.5 334" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 53.5 329 L 53.5 334" stroke="#C0D0E0" stroke-width="1"></path><path fill="none" d="M 53 328.5 L 365 328.5" stroke="#C0D0E0" stroke-width="1" zIndex="7" visibility="visible"></path></g><g class="highcharts-axis" zIndex="2"><text x="28.046875" y="184.5" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:#4d759e;font-weight:bold;fill:#4d759e;" zIndex="7" text-anchor="middle" transform="translate(0,0) rotate(270 28.046875 184.5)" visibility="visible"><tspan x="28.046875">Total Visits</tspan></text></g><g class="highcharts-series-group" zIndex="3"><g class="highcharts-series" visibility="visible" zIndex="0.1" transform="translate(53,40) scale(1 1)" clip-path="url(#highcharts-1)"><path fill="none" d="M 19.5 144.5 L 58.5 144.5 L 97.5 144.5 L 136.5 144.5 L 175.5 144.5 L 214.5 144.5 L 253.5 144.5 L 292.5 144.5" stroke="#a91763" stroke-width="2" zIndex="1"></path></g><g class="highcharts-markers" visibility="visible" zIndex="0.1" transform="translate(53,40) scale(1 1)" clip-path="none"><path fill="#a91763" d="M 292 140.5 C 297.328 140.5 297.328 148.5 292 148.5 C 286.672 148.5 286.672 140.5 292 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 253 140.5 C 258.328 140.5 258.328 148.5 253 148.5 C 247.672 148.5 247.672 140.5 253 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 214 140.5 C 219.328 140.5 219.328 148.5 214 148.5 C 208.672 148.5 208.672 140.5 214 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 175 140.5 C 180.328 140.5 180.328 148.5 175 148.5 C 169.672 148.5 169.672 140.5 175 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 136 140.5 C 141.328 140.5 141.328 148.5 136 148.5 C 130.672 148.5 130.672 140.5 136 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 97 140.5 C 102.328 140.5 102.328 148.5 97 148.5 C 91.672 148.5 91.672 140.5 97 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 58 140.5 C 63.328 140.5 63.328 148.5 58 148.5 C 52.672 148.5 52.672 140.5 58 140.5 Z" visibility="inherit"></path><path fill="#a91763" d="M 19 140.5 C 24.328 140.5 24.328 148.5 19 148.5 C 13.672 148.5 13.672 140.5 19 140.5 Z" visibility="inherit"></path><path fill="none" d="M 9.5 144.5 L 19.5 144.5 L 58.5 144.5 L 97.5 144.5 L 136.5 144.5 L 175.5 144.5 L 214.5 144.5 L 253.5 144.5 L 292.5 144.5 L 302.5 144.5" class="highcharts-tracker" stroke-linejoin="round" visibility="visible" stroke-opacity="0.0001" stroke="rgb(192,192,192)" stroke-width="22" zIndex="2" style=""></path></g></g><text x="188" y="25" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:16px;color:#274b6d;fill:#274b6d;width:311px;" text-anchor="middle" class="highcharts-title" zIndex="4"><tspan x="188">My Weekly Visitors</tspan></text><g class="highcharts-legend" zIndex="7" transform="translate(138,356)"><rect rx="5" ry="5" fill="none" x="0.5" y="0.5" width="97" height="28" stroke="#909090" stroke-width="1" visibility="visible"></rect><g zIndex="1"><g><g class="highcharts-legend-item" zIndex="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" stroke="#a91763" stroke-width="2"></path><path fill="#a91763" d="M 8 7 C 13.328 7 13.328 15 8 15 C 2.6719999999999997 15 2.6719999999999997 7 8 7 Z"></path><text x="21" y="15" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;cursor:pointer;color:#274b6d;fill:#274b6d;" text-anchor="start" zIndex="2"><tspan x="21">User Visits</tspan></text></g></g></g></g><g class="highcharts-axis-labels" zIndex="7"><text x="72.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="72.5">Fri</tspan></text><text x="111.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="111.5">Sat</tspan></text><text x="150.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="150.5">Sun</tspan></text><text x="189.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="189.5">Mon</tspan></text><text x="228.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="228.5">Tue</tspan></text><text x="267.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="267.5">Wed</tspan></text><text x="306.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="306.5">Thu</tspan></text><text x="345.5" y="343" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:19px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="middle" opacity="1"><tspan x="345.5">Fri</tspan></text></g><g class="highcharts-axis-labels" zIndex="7"><text x="45" y="188" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:11px;width:104px;color:#666;cursor:default;line-height:14px;fill:#666;" text-anchor="end" opacity="1"><tspan x="45">0</tspan></text></g><g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;white-space:nowrap;" visibility="hidden" transform="translate(0,0)"><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="none" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></rect><rect rx="3" ry="3" fill="rgb(255,255,255)" x="0.5" y="0.5" width="16" height="16" fill-opacity="0.85"></rect><text x="8" y="21" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:12px;color:#333333;fill:#333333;" zIndex="1"></text></g><text x="365" y="395" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Verdana, Arial, Helvetica, sans-serif;font-size:9px;cursor:pointer;color:#909090;fill:#909090;" text-anchor="end" zIndex="8"><tspan x="365">Highcharts.com</tspan></text></svg></div></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clr"></div>
                                                        <div class="clr"></div>
                                                    </div>
                                                </div>
                                                -->
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
        </section>
    </div>
</section>
<div class="clr"></div>