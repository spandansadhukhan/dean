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
                                                <a style="display:none;" href="#" class="website_activate"></a>
                                                <?php echo $this->element('user_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
                                            <div class="right-my-account">
                                                <div class="right-my-account-blocks">
                                                    <div class="detail-heading">
                                                        <section class="title-left">
                                                            <h1 style="display:inline-block;"> My Advance Directory Home</h1>
                                                            <h3> Last Logged in: <span>
                                                                    Login First Time                    </span></h3>
                                                        </section>
                                                        <div class="ver buttonGrey" style="font-size: 20px;cursor:default;"><i class="fa fa-times-circle "></i> Profile Not Active</div>
                                                        <!---->
                                                        <div class="clr"></div>
                                                    </div>
                                                    <style>
                                                        .profile-info ul li .s-left1 {width: 140px;}
                                                    </style>
                                                    <div class="right-my-account-blocks-inner" style="padding-bottom: 15px;">
                                                        <section class="profile-info" style=" width: 64%; float:left;">
                                                            <ul>
                                                                <li><span class="s-left1"> Name :</span><span class="s-right"> <?php echo $user['User']['first_name']." ".$user['User']['last_name'] ?> </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> My Favorites :</span><span class="s-right">
                                                                        0                      <section class="clr"></section>
                                                                    </span>   <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> User Name :</span><span class="s-right">
                                                                        <?php echo $user['User']['username'];?>                                                                  </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> My Followings  :</span><span class="s-right">
                                                                        0                                                                  </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> Email Address :</span><span class="s-right">
                                                                        <?php echo $user['User']['email'];?></span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> Total Reviews Posted:</span><span class="s-right">
                                                                        0                                                              </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <li><span class="s-left1"> Location :</span><span class="s-right">
                                                                        <?php echo $user['Country']['name']." , ".$user['City']['name'] ?>                     </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                            <!--    <li><span class="s-left1"> Total Comments :</span><span class="s-right">
                                                                                          0                                                                  </span>
                                                                  <section class="clr"></section>
                                                                </li>
                                                                -->
                                                                <li><span class="s-left1" style="height:32px;"> Account Status :</span><span class="s-right">
                                                                        Active                                                                  </span>
                                                                    <section class="clr"></section>
                                                                </li>
                                                                <section class="clr"></section>
                                                            </ul>
                                                            <section>
                                                                <a href="javascript:void(0)" class="r_butt" style="margin-top:33px; text-align: center;width: 100px;">Advertise With Us</a>
                                                                <a href="javascript:void(0)" class="r_butt" style="margin-top:66px; text-align: center;width: 100px;">Ad-on Services </a>
                                                            </section>
                                                        </section>
                                                        <div class="boxes-right" style="width: 32%; floaT: right;">
                                                            <section class="stat-boxes">
                                                                <section class="stat-boxes-inner">
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
                                                                            <form action="<?php echo $this->webroot; ?>users/userdashboard" method="post" enctype="multipart/form-data">
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
                                                                </section>   <div class="clr"></div>
                                                            </section>
                                                        </div>
                                                        <div id="avatar-chaneg" style="display:none;">
                                                            <ul><li class="selected"><a href="javascript:void(0)"><img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/man-icon.png" alt="" style="width: 100px;"></a></li>
                                                                <li><a href="javascript:void(0)"><img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/man-icon.png" alt="" style="width: 100px;"></a></li>
                                                                <li><a href="javascript:void(0)"><img src="http://layout9.demoparlour.com/advdirectory/assets/layout9/images/man-icon.png" alt="" style="width: 100px;"></a></li></ul>
                                                        </div>
                                                        <section class="clr"></section>
                                                        <br>
                                                        <div class="right-my-account-blocks">
                                                            <div class="sec1" style="width: 720px;">
                                                                <div class="detail-heading">
                                                                    <section class="title-left">
                                                                        <h1 style="display:inline-block;">Site News </h1>
                                                                    </section>
                                                                    <div class="clr"></div>
                                                                </div>
                                                                <div class="right-my-account-blocks-inner" style="padding-bottom: 0;">
                                                                    <div class="col-md-4">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-body" style="height: 113px;">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        <ul id="demo4" style="overflow-y: hidden; height: 29px;">
                                                                                            <li class="news-item">This is news title This is news title This is news title This is<a href="javascript:;" style="color:#ce7f2f" onclick="showmorenews(3)"> </a></li></ul>
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
                                                                    <span class="avai-cre">MyAvailable Credits</span>
                                                                    <div class="destination">
                                                                        <strong>0 Credits </strong>
                                                                    </div>
                                                                    <div class="destination-used">
                                                                        <span style="text-align: center;">Credit-In : 0 </span><br>
                                                                        <span style="text-align: center;">Credit-Out : 0 </span>
                                                                        <div class="clr"></div>
                                                                    </div>
                                                                    <a style="margin: 7px 0 0; display:block;" class="buttonGrey" data-type="iframe" href="#">Buy Credits</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-my-account-blocks">
                                                        <div class="sec1" style="width: 510px;">
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">My Recent Comments</h1>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <div class="right-my-account-blocks-inner">
                                                                <div class="col-md-4">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <ul id="demo1" style="overflow-y: hidden; height: 32px;"><div class="no-record">No Comment Found</div>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-footer"> 	<ul class="pagination pull-right" style="margin: 0px;"><li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li><li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li></ul><div class="clearfix"></div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sec1" style="width: 520px;">
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">My Recent Reviews </h1>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <div class="right-my-account-blocks-inner">
                                                                <div class="col-md-4">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <ul id="demo2" style="overflow-y: hidden; height: 32px;">
                                                                                        <div class="no-record">No Review Found</div></ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-footer">
                                                                            <ul class="pagination pull-right" style="margin: 0px;">
                                                                                <li><a href="#" class="prev"><i class="fa fa-angle-down"></i></a></li>
                                                                                <li><a href="#" class="next"><i class="fa fa-angle-up"></i></a></li>
                                                                            </ul><div class="clearfix">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clr"></div>
                                                </div>
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
