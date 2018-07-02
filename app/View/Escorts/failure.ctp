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
    <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                Please wait    ....</span> </span> </div>
</div>
<div class="col-left">
<section id="wrapper">
<section id="middle">
<section id="middle-inner">
<section class="all-pins-do">
    <section id="searchResult" class="maintitle"><h1>Payment Failure</h1>
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
                                    <section class="title-left" style="float: none;">
                                        <h1 style="display:inline-block; float: left;">Failure</h1>
                                    </section>
                                    <div class="clr"></div>
                                </div>
                                <div class="right-my-account-blocks-inner">
                                   Sorry You Transaction is Unsuccessful

                                    
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
    <div class="clr" ></div>
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