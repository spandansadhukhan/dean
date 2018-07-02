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
        /*background:#61b3de;*/
        background:#f98d29;
        color: #fff;
        width: 30%;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        font-weight: bold;
    }
    .choose_file input[type="file"]{
        -webkit-appearance:none;
        position:absolute;
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
        <div class="wait-divin"> <span style="background: url('http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>

    <div class="col-left">

        <?php echo $this->Html->css('reset');?>
        <?php echo $this->Html->css('jquery-ui');?>
        <?php echo $this->Html->css('jquery.weekcalendar');?>
        <?php echo $this->Html->css('demo');?>

        <!--<link rel='stylesheet' type='text/css' href='http://layout9.demoparlour.com/advdirectory/assets/layout9/cal/reset.css' />
        <link rel='stylesheet' type='text/css' href='http://layout9.demoparlour.com/advdirectory/assets/layout9/cal/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='http://layout9.demoparlour.com/advdirectory/assets/layout9/cal/jquery.weekcalendar.css' />
        <link rel='stylesheet' type='text/css' href='http://layout9.demoparlour.com/advdirectory/assets/layout9/cal/demo.css' />-->
        <script type="text/javascript">
            var slug = 'patty';
            var id = '1';
            var totalimagesCount = '5';
            var totalcommentCount = '3';
            var msgtitle = 'Send Message To Patty';
            var alerttitle = 'Alert Patty';
            var fktitle = 'Report To Patty';
            var rwtitle = 'Write Review on Patty';
            var biotitle = 'More About Patty';
            var cmntitle = 'Write Comment on Patty';
            var bktitle = 'Book To Patty';
            var chatmember = 'Only customer can chat with escort.';
            var rmfavorite = 'Remove Favorite';
            var addfavorite = 'Add To Favorite';
            var servrerror = 'Server Error';
            var loginfirst = 'Please login first to use this feature';
            var favmembertype = 'Only customer can use this feature';
            var voted = 'You have already voted to this advertiser.';
            var edit = 'Edit';
            var calavailtitle = 'Are you sure, availabe this time?';
            var noimage = 'No More Images Found';
            var loadmore = 'Load More';
            var nomoreimages = 'No more images found to load here';
            var nomorecomment = 'No more images found to load here';
            var nocomment = 'No more comments to load here';
            var late = "51.5073509";
            var longitude = "-0.12775829999998223";
            var pagetype = 'Profile';
            function getEventData() {
                var year = new Date().getFullYear();
                var month = new Date().getMonth();
                var day = new Date().getDate();

                return {
                    events: [
                        {
                            "id": 32,
                            "start": new Date(year, month, day - 28, 00),
                            "end": new Date(year, month, day - 28, 04),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 31,
                            "start": new Date(year, month, day - 28, 00),
                            "end": new Date(year, month, day - 28, 01),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 30,
                            "start": new Date(year, month, day - 33, 01, 30),
                            "end": new Date(year, month, day - 33, 05),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 29,
                            "start": new Date(year, month, day - 35, 01, 30),
                            "end": new Date(year, month, day - 35, 05),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 28,
                            "start": new Date(year, month, day - 36, 05, 30),
                            "end": new Date(year, month, day - 36, 07),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 27,
                            "start": new Date(year, month, day - 36, 01),
                            "end": new Date(year, month, day - 36, 04),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 26,
                            "start": new Date(year, month, day - 36, 04, 30),
                            "end": new Date(year, month, day - 36, 07),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 25,
                            "start": new Date(year, month, day - 36, 00),
                            "end": new Date(year, month, day - 36, 03),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 23,
                            "start": new Date(year, month, day - 62, 02),
                            "end": new Date(year, month, day - 62, 03),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 22,
                            "start": new Date(year, month, day - 60, 03),
                            "end": new Date(year, month, day - 60, 04),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 21,
                            "start": new Date(year, month, day - 61, 05, 30),
                            "end": new Date(year, month, day - 61, 06, 30),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 20,
                            "start": new Date(year, month, day - 63, 05),
                            "end": new Date(year, month, day - 63, 06),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 8,
                            "start": new Date(year, month, day - 77, 00),
                            "end": new Date(year, month, day - 77, 01),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 7,
                            "start": new Date(year, month, day - 84, 05),
                            "end": new Date(year, month, day - 84, 05, 30),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 6,
                            "start": new Date(year, month, day - 126, 00),
                            "end": new Date(year, month, day - 126, 00),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 5,
                            "start": new Date(year, month, day - 119, 01),
                            "end": new Date(year, month, day - 119, 02),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 4,
                            "start": new Date(year, month, day - 119, 02),
                            "end": new Date(year, month, day - 119, 03),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 3,
                            "start": new Date(year, month, day - 119, 03, 30),
                            "end": new Date(year, month, day - 119, 04, 30),
                            "title": ""
                            , readOnly: true
                        }
                        , {
                            "id": 1,
                            "start": new Date(year, month, day - 219, 01),
                            "end": new Date(year, month, day - 219, 05, 30),
                            "title": ""
                            , readOnly: true
                        }

                    ]
                };
            }
        </script>


        <?php echo $this->Html->script('flowplayer-3.2.13.min'); ?>
        <?php echo $this->Html->script('jquery-ui.min'); ?>
        <?php echo $this->Html->script('jquery.weekcalendar'); ?>
        <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js"></script>
        <?php echo $this->Html->script('escortfront'); ?>
        <?php echo $this->Html->script('escortcalender'); ?>

        <!--<script type='text/javascript' src="http://layout9.demoparlour.com/advdirectory/assets/layout9/flowplayer/flowplayer-3.2.13.min.js"></script>
        <script type='text/javascript' src='http://layout9.demoparlour.com/advdirectory/assets/layout9/js/jquery-ui.min.js'></script>
        <script type='text/javascript' src='http://layout9.demoparlour.com/advdirectory/assets/layout9/cal/jquery.weekcalendar.js'></script>

        <script type='text/javascript' src="http://layout9.demoparlour.com/advdirectory/assets/layout9/js/custom/escortfront.js"></script>
        <script type='text/javascript' src="http://layout9.demoparlour.com/advdirectory/assets/layout9/js/custom/escortcalender.js"></script>-->
        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <div class="in-content">
                            <div class="left" id="breadcrumbsdiv">
                                <!--<div class="left" id="breadcrumbstext">
                                    <span><a href="<?php echo $this->Html->url('/');?>"><span itemprop="title"> Home </span></a></span> \
                                    <?php if($user['Country']['name'] != ""){ ?>
                                    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['Country']['name']?></span></a></span> \
                                    <?php } ?>
                                    <?php if($user['State']['name'] != ""){ ?>
                                    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['State']['name']?></span></a></span> \
                                    <?php } ?>
                                    <?php if($user['City']['name'] != ""){ ?>
                                    <span><a href="javascript:void(0)"><span itemprop="title"> <?php echo $user['City']['name']?></span></a></span> \
                                    <?php } ?>
                                    <a href="<?php echo $this->Html->url('/');?>users/userdashboard"><span itemprop="title"> <?php echo $user['User']['name'] ?> </span></a>
                                </div>-->
                                <?php echo $this->element('dashboardlink') ?>
                                <div class="clearer"></div>
                            </div>
                            <!--<div class="stepper"> <a title="Previous Escort in United Kingdom" href="javascript:void(0)">
                                    <div class="step_left stepclass"> <img width="8" height="14" alt="Previous Escort Girl In United Kingdom" src="<?= $this->Html->url('/') ?>images/stepper_left.png"> </div>
                                </a> <a title="Next Escort in United Kingdom" href="javascript:void(0)">
                                    <div class="step_right stepclass"> <img width="8" height="14" alt="Next Escort Girl In United Kingdom" src="<?= $this->Html->url('/') ?>images/stepper_right.png"> </div>
                                </a>
                                <div class="clr"></div>
                            </div>-->
                            <div class="clr"></div>
                            <div class="profile-detail-m">
                                <div class="detail-heading">
                                    <section class="title-left">
                                        <h1 style="display:inline-block;">
                                            <?php echo $user['User']['name'] ?>
                                            <!--
                                            <img src="<?= $this->Html->url('/') ?>images/porn-star.png" style="width: 40px;" title="Pornstar" alt="" />
                                            <img src="<?= $this->Html->url('/') ?>images/vip.png" style="width: 40px;" title="Vip" alt="" />
                                            <img src="<?= $this->Html->url('/') ?>images/verified.png" style="width: 40px;" title="Verified Escort" alt="" />
                                            -->
                                        </h1>
                                    </section>
                                    <ul class="ids">
                                    </ul>
                                    <div class="clr"></div>
                                </div>
                                <div class="left-images-part">
                                    <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                         z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                         data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                        <!--
                                        <ul class="z-tabs-nav z-tabs-desktop">
                                            <li style="" class="z-tab z-first" data-link="bio"><a class="z-link">
                                                    Images                    <span style="color: #bc27bd;">(2)</span></a></li>
                                            <li style="" class="z-tab" data-link="rates"><a class="z-link">
                                                    Videos                    <span style="color: #bc27bd;">(1) </span></a></li>
                                        </ul>
                                        -->
                                        <div class="h-content2 z-container">
                                            <div class="z-content" style="height:auto;">
                                                <ul id="laod_images">


                                                    <li style="margin-bottom: 10px;">
                                                    <div class="pro-area">
                                                        <div class="pro-image-area">
                                                                <?php if($user['User']['profile_image'] != "" ){ ?>
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
                                                                    <form action="<?php echo $this->webroot; ?>users/clubdashboard" method="post" enctype="multipart/form-data">
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
                                                                            <div class="choose_file" style="float:left" ><span>Upload profile image</span>
                                                                                <input id="uploadImage" type="file" accept="image/jpeg" name="image"/>
                                                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                                                            <!--<button type="submit" value="Crop & Save" class="btn btn-primary">Close</button>-->
                                                                            <div style="float: right"><input type="submit" value="Crop & Save" class="btn btn-primary"></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </li>

                                                    <div class="clr"></div>
                                                </ul>
                                            </div>
                                            <div class="z-content">
                                                <iframe style="display:block;width:100%;height:250px;" src="https://www.youtube.com/embed/0mQjcLj_u90" frameborder="0" allowfullscreen id="myFrame"></iframe>
                                                <br>
                                                <br />
                                                <div class="clr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-detail-part">
                                    <!--<div class="profile-bio-stats">
                                        <dl>
                                            <dt style="padding-top: 0;"> Ranking </dt> <dd> 1 </dd>
                                            <dt> Rating </dt> <dd style="font-size:27px !important"> N/A </dd>
                                            <dt> Favorite </dt><dd id="totalfav"> 3 </dd>
                                            <dt> Votes </dt><dd id="totalvotes"> 4 </dd>
                                            <dt> Times Reported </dt><dd class="last-item" style="border: none;" id="totalvotes"> 0 </dd>
                                        </dl>
                                    </div> -->
                                    <div class="profile-bio-rt">
                                        <p style="min-height:200px;"> <?php echo nl2br(substr($user['User']['about'], 0, 770))?>  </p>
                                        <div class="clr"></div>
                                        <br />
                                        <?php if($user['User']['mysite'] != "") { ?>
                                        <h4 style="font-size: 20px;font-family: proxima_novalight;">
                                            <a href=<?php echo $user['User']['mysite'] ?>" target="_blank" rel="nofollow" class="nounder">
                                                <i class="fa fa-share-square-o"></i> <?php echo $user['User']['mysite'] ?> </a><br>
                                            <span style="font-size: 13px;">Click Here To View My Website:</span></h4>
                                        <?php } else { ?>
                                        <h4 style="font-size: 20px;font-family: proxima_novalight;">
                                            <a href=javascript:void(0)" rel="nofollow" class="nounder">
                                                <i class="fa fa-share-square-o"></i> No site Specified </a></h4>
                                        <?php } ?>
                                        <div class="clr"></div>
                                        <div class="smart-forms smart-container">
                                            <div class="notification spacer-t3 form-msg alert-success"> <a class="close-btn" onClick="close_div();" href="javascript:void(0)">x</a> <span id="voteStatus"></span> </div>
                                        </div>
                                    </div>
                                    <div class="profile-bio-rt-button">
                                        <div class="post-share"> <a class="icon size-32x32 icons-facebook-square share-link facebook" style="cursor: pointer;">
                                                Share on Facebook                  </a> <a class="icon size-32x32 icons-twitter-square share-link twitter" style="cursor: pointer;"></a></a> <a class="icon size-32x32 icons-google-square share-link google" style="cursor: pointer;">
                                                Share on Google                  +</a> <a class="icon size-32x32 icons-linkedin-square share-link linkedin" style="cursor: pointer;">
                                                Share on LinkedIn                  </a> </div>
                                        <a href="javascript:void(0)" class="buttonGrey send_message" style="margin: 0 0 10px;" > Inbox </a>
                                        <a href="javascript:void(0)" class="buttonGrey book_me" > My Booking </a>
                                        <a href="javascript:void(0)" class="chat-bt active chat_now"  style="margin: 0 0 10px;"> Chat Room </a>
                                        <div class="m-button new-s-bt">
                                            <a onclick="addremoveFromFavorite(this, '1')" style="cursor:pointer;"><i class="fa fa-star"></i> My Favorite </a>
                                            <a href="javascript:void(0)" class="auto-wi alert_me_pop"><i class="fa fa-bell "></i> My Alert </a>
                                            <!-- <a style="cursor:pointer" class="voteme" onClick="voteMe(this, '1');" href="javascript:void(0)">
                                                <i class="fa fa-thumbs-up"></i><span id="vote"> My Votes </span></a> -->
                                            <a style="cursor:pointer" href="<?php echo $this->Html->url('/')?>users/editclubprofile" class="reported_user_pop">
                                                <i class="fa fa-flag"></i><span id="vote"> Edit Profile </span></a> </div>

                                    </div>
                                    <div class="clr"></div>
                                    <div class="middle-tabs">
                                        <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                             z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                             data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                            <!--<ul class="z-tabs-nav z-tabs-desktop">
                                                <li style="" class="z-tab z-first" data-link="bio">
                                                    <a class="z-link"> Edit Profile </span></a></li>
                                                <li style="" class="z-tab" data-link="rates"><a class="z-link"> My Rates and Schedules </a></li>
                                                <li style="" class="z-tab" data-link="tour"><a class="z-link"> My Tours <span style="color: #bc27bd;">(0)</span></a></li>
                                                <li style="" class="z-tab" data-link="review"><a class="z-link"> My Reviews <span style="color: #bc27bd;">(0)</span> </a> </li>
                                                <li style="" class="z-tab" data-link="review"><a class="z-link"> My Comment <span style="color: #bc27bd;">(0)</span> </a> </li>
                                                <li style="" class="z-tab" data-link="blog"><a class="z-link"> My Blog <span style="color: #bc27bd;">(0)</span></a></li>
                                                <li style="" class="z-tab" data-link="mw-wall"><a class="z-link"> My Wall <span style="color: #bc27bd;" id="totallikes">(0)</span></a></li>
                                                <li style="" class="z-tab" data-link="happy-hour"><a class="z-link"> Shop </a></li>
                                                <li style="" class="z-tab" data-link="happy-hour"><a class="z-link"> Happy Hour </a></li>
                                                <li style="" class="z-tab" data-link="location"><a class="z-link map"> Location </a></li>
                                            </ul>-->
                                            <div class="h-content2 z-container">
                                                <div style="" class="z-content">
                                                    <div class="z-content-inner" id="col1">
                                                        <div class="pr-sed-new">
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> Email Id :</section>
                                                                <section class="agnr"> <?php echo $user['User']['email'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> User Name :</section>
                                                                <section class="agnr"> <?php echo $user['User']['username'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> Name :</section>
                                                                <section class="agnr"> <?php echo $user['User']['name'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> Country :</section>
                                                                <section class="agnr"> <?php echo $user['Country']['name'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> State :</section>
                                                                <section class="agnr"> <?php echo $user['State']['name'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> City :</section>
                                                                <section class="agnr"> <?php echo $user['City']['name'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> Contact No :</section>
                                                                <section class="agnr"> <?php echo $user['User']['phone_no'] ?> </section>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="escort-profledata">
                                                                <section class="agnl"> Join Date :</section>
                                                                <section class="agnr"> <?php echo date("l, F d Y", strtotime($user['User']['join_date'])) ?> </section>
                                                                <section class="clr"></section>
                                                            </section>



                                                        </div>




                                                        <!--
                                                        <div class="pr-sed-new">
                                                            <section class="enjoy-list">
                                                                <h5>
                                                                    Languages                            </h5>
                                                                <ul class="service-cost">
                                                                    <li> <span>
                                                                            Advance                                </span> <a  title="Portugues"><i class="fa fa-check-square"></i>
                                                                            Portugues                                </a> </li>
                                                                    <section class="clr"></section>
                                                                </ul>
                                                                <section class="clr"></section>
                                                            </section>
                                                            <section class="enjoy-list">
                                                                <h5>
                                                                    Categories                            </h5>
                                                                <ul>
                                                                    <li> <a  title="Morenas"><i class="fa fa-check-square"></i>
                                                                            Morenas                                </a> </li>
                                                                    <li> <a  title="Black Escorts"><i class="fa fa-check-square"></i>
                                                                            Black Escorts                                </a> </li>
                                                                    <li> <a  title="Busty Escorts"><i class="fa fa-check-square"></i>
                                                                            Busty Escorts                                </a> </li>
                                                                    <li> <a  title="English Escorts"><i class="fa fa-check-square"></i>
                                                                            English Escorts                                </a> </li>
                                                                    <li> <a  title="High Class"><i class="fa fa-check-square"></i>
                                                                            High Class                                </a> </li>
                                                                    <li> <a  title="Latino Escorts"><i class="fa fa-check-square"></i>
                                                                            Latino Escorts                                </a> </li>
                                                                    <li> <a  title="Mature Escorts"><i class="fa fa-check-square"></i>
                                                                            Mature Escorts                                </a> </li>
                                                                    <li> <a  title="Brunette Escorts"><i class="fa fa-check-square"></i>
                                                                            Brunette Escorts                                </a> </li>
                                                                    <section class="clr"></section>
                                                                </ul>
                                                                <section class="clr"></section>
                                                            </section>
                                                        </div>
                                                        Hide -->
                                                        <section class="clr"></section>
                                                    </div>
                                                </div>
                                                <div class="profile-blocks">
                                                    <div class="profile-blocks">
                                                        <!--
                                                        <h3> Rates h3>
                                                        <div class="table-responsive " style="font-size: 12px;">
                                                            <table class="table table-bordered table-striped" style=" font-size: 11px;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Rates</th>
                                                                        <th> 1 Hour                                </th>
                                                                        <th> 30 Min                                </th>
                                                                        <th> 2 Hour                                </th>
                                                                        <th> 3 Hour                                </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="text-nowrap">Incall</th>
                                                                        <td style="text-align:left;">100 EUR</td>
                                                                        <td style="text-align:left;">10000 EUR</td>
                                                                        <td style="text-align:left;">10000 EUR</td>
                                                                        <td style="text-align:left;">500 EUR</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-nowrap">Outcall</th>
                                                                        <td style="text-align:left;">80 EUR</td>
                                                                        <td style="text-align:left;">10000 EUR</td>
                                                                        <td style="text-align:left;">10000 EUR</td>
                                                                        <td style="text-align:left;">700 EUR</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        -->
                                                    </div>
                                                    <!--
                                                    <div class="profile-blocks no-mb">
                                                        <h3>
                                                            Availability                        </h3>
                                                        <div id='calendar'></div>
                                                        <div class="clr"></div>
                                                    </div>
                                                    -->
                                                    <div class="clr"></div>
                                                </div>



                                                <!-- ===============================Shop========================================-->
                                                <!--
                                                <div style="position: relative; display: block;" class="z-content z-active">
                                                    <div class="z-content-inner" id="col4">
                                                        <div class="profile-blocks">
                                                            <div class="pbox-mw-wall">
                                                                <section style="margin-bottom: 2px;" class="title-part-main">
                                                                    <section class="title-left">
                                                                        <h1> Physical Items </h1>
                                                                    </section>
                                                                    <section class="title-right"> <a class="v_butt" href="javascript:void(0)"> View All </a> </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="esshop-tab-page">
                                                                    <section class="no-record">No physical items found</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <br>
                                                                <section style="margin-bottom: 2px;" class="title-part-main">
                                                                    <section class="title-left">
                                                                        <h1> Webcam Session </h1>
                                                                    </section>
                                                                    <section class="title-right"> <a class="v_butt" href="javascript:void(0)"> View All </a> </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="esshop-tab-page">
                                                                    <section class="no-record">No Webcam Session found</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <br>
                                                                <section style="margin-bottom: 2px;" class="title-part-main">
                                                                    <section class="title-left">
                                                                        <h1> Private Album </h1>
                                                                    </section>
                                                                    <section class="title-right"> <a class="v_butt" href="javascript:void(0)"> View All </a> </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="esshop-tab-page">
                                                                    <section class="no-record">No Private Album found</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <br>
                                                                <section style="margin-bottom: 2px;" class="title-part-main">
                                                                    <section class="title-left">
                                                                        <h1> Private Video </h1>
                                                                    </section>
                                                                    <section class="title-right"> <a class="v_butt" href="javascript:void(0)"> View All </a> </section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="esshop-tab-page">
                                                                    <section class="no-record">No Private Video found</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="clr"></section>
                                                                <section class="clr"></section>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 ===============================Shop========================================

                                                <div style="position: relative; display: block;" class="z-content z-active">
                                                    <div class="z-content-inner" id="col4">
                                                        <div class="profile-blocks">
                                                            <div class="pbox-mw-wall">
                                                                <div class="pr-sed-new">
                                                                    <section class="escort-profledata">
                                                                        <section class="agnl">
                                                                            Service Type                                  :</section>
                                                                        <section class="agnr">
                                                                            Outcall Only                                </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="escort-profledata">
                                                                        <section class="agnl">
                                                                            Timing                                  :</section>
                                                                        <section class="agnr">
                                                                            Everyday, 5 to 7                                </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="escort-profledata">
                                                                        <section class="agnl">
                                                                            Happy Hour Rate                                  :</section>
                                                                        <section class="agnr">
                                                                            500.00 USD @ Hr.                                </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="escort-profledata">
                                                                        <section class="agnl">
                                                                            Offer Contact Number                                  :</section>
                                                                        <section class="agnr">
                                                                            123456789                                </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="escort-profledata" style="width:100%">
                                                                        <section class="agnl"  style="width:120px">
                                                                            Offer Description                                  :</section>
                                                                        <section class="agnr" style="width:420px">
                                                                            Hiiii you can meet me daily in happy hours                                </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="clr"></section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="position: relative; display: block;" class="z-content z-active">
                                                    <div class="z-content-inner" id="col4">
                                                        <div class="profile-blocks">
                                                            <div class="pbox-mw-wall">
                                                                <div class="no-record"> Map location not available </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                -->

                                            </div>
                                        </div>
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
    </div>

    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>