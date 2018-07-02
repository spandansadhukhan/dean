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





<section id="contentsection">
<div id="wait-div" class="wait-div">
    <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> 
            <span style="margin-left:48px;">Please wait    ....</span> </span> </div>
</div>
<div class="col-left">
    <section id="wrapper">
        <section id="middle">
            <section id="middle-inner">
                <section class="all-pins-do">
                    <section id="searchResult" class="maintitle"> <h1>Add Videos</h1>
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
                                                    <section class="title-left">
                                                        <h1 style="display:inline-block;">My Videos</h1>
                                                    </section>
                                                    <div class="clr"></div>
                                                </div>
                                                <section class="content-inner-box">
                                                    <section class="dashborad">
                                                        <section class="title-part">
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Upload Videos from Youtube</h1>
                                                                </section>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="clr"></section>
                                                        </section>
                                                        <section class="content-box nre-span">
                                                            <section class="upc clear">
                                                                <form action="" method="post" accept-charset="utf-8" class="" id="form1" enctype="multipart/form-data">                  <section class="upc-tom1">
                                                                        <div id="uploader" style="max-width:900px;">
                                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="foema" enctype="multipart/form-data">						<input type="hidden" name="uid" value="<?php echo $user['Stripper']['id']?>" /> 
                                                                                <section class="tom1 smart-forms">
                                                                                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="javascript:;">�</a> <span class="ajax_message">Hello Message</span> </div>
                                                                                    <section class="t1 t1-t">
                                                                                        <label for="label" style=" width: 170px; margin-right: 10px;padding-top: 12px;color: #000!important;">Youtube Video URL:  <span>*</span></label>
                                                                                        <input type="text" id="title" class="inputtext" name="video" placeholder="e.g. http://www.youtube.com/watch?v=abcd" style=" width: 72% !important;">
                                                                                        <section class="clr"></section>
                                                                                    </section>
                                                                                    <section class="t1 t1-t">
                                                                                        <label for="label" style=" width: 170px; margin-right: 10px;padding-top: 12px;">&nbsp;</label>
                                                                                        <section class="tbut">
                                                                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Upload">
                                                                                        </section>
                                                                                        <section class="clr"></section>
                                                                                    </section>
                                                                                </section>
                                                                            </form>
                                                                        </div>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <br />

                                                                </form>                </section>
                                                            <div class="clear"></div>
                                                            
                                                            
                                                            <?php if(!empty($user['UserVideo'])){ ?>
                                                            <div class="detail-heading">
                                                                <section class="title-left">
                                                                    <h1 style="display:inline-block;">Manage Videos</h1>
                                                                </section>
                                                                <div class="all-count" id="totalVideo">
                                                                    Total Videos   <span id="countp"> <?php echo count($user['UserVideo']) ?></span>
                                                                </div>
                                                                <div class="clr"></div>
                                                            </div>
                                                            <section class="upc-mg-photos">
                                                                <section class="photo-list">
                                                                    <ul class="image-container">
                                                                        
                                                                    <?php foreach($user['UserVideo'] as $vid){ ?>
                                                                    <li id="image_<?php echo $vid['id']?>">
                                                                        <section class="thumb7"><section class="thumb-inner">
                                                                        <section class="del" title="Delete Photo"> 
                                                                <a href="javascript:void(0);" onClick="deleteVideo('<?php echo $vid['id']?>')">
                                                                                <i class="fa fa-trash-o"></i></a> 
                                                                        </section>
                                                     <iframe src="https://www.youtube.com/embed/<?php echo $vid['link']?>" width="230" height="140" 
                                                                                frameborder="0" allowfullscreen></iframe>
                                                                        </section> </section>
                                                                    </li>
                                                                    <?php } ?>                                                                       
                                                                    </ul>
                                                                    <section class="no-record"  style="display:none;"   id="nophoto">No Photo Uploaded Yet.</section>
                                                                </section>
                                                                <div class="clr"></div>
                                                                <section class="pagination">
                                                                </section>
                                                            </section>
                                                            <section class="clr"></section>
                                                            <?php } ?>
                                                            
                                                            
                                                            
                                                            
                                                        </section>
                                                        <section class="clr"></section>
                                                    </section>
                                                </section>
                                                <section class="clr"></section>
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


  


<script>
    function deleteVideo(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>Strippers/deletevideo/",
            //dataType: "json",
            data: {id: id}
        }).done(function (msg) {          
            $("#image_"+id).hide();
            window.location.href = "<?php echo Router::url(array('controller' => 'Strippers', 'action' => 'myvideo')); ?>";
        });
    }
</script>