
<header>
    <section id="header-wrapper">
        <section class="inner-header">
            <section class="logo">
                <a href="<?php echo $this->Html->url('/');?>"><img src="<?php echo  $this->Html->url('/') ?>images/logo.png" alt=""></a>
            </section>
            <section class="change-location">
                <section class="change-location-right">
                    <section class="hoverBG">
                        <section class="change-location-rit">
                            <h5> New Zealand </h5>
                            <section class="chn-co2"><a href="javascript:void(0);" class="select-country">
                                <i class="fa fa-map-marker"></i>Change Country</a>
                            </section>
                            <h4><img src="<?php echo  $this->Html->url('/') ?>images/girl-icon.png" alt="">49<span>Girls</span></h4>
                        </section>
                    </section>
                </section>
            </section>
            <section class="head-left">

                <?php if( $this->Session->read('flogin') == "yes" ){ ?>
                <section class="login-details">
                    <a href="<?php echo $this->Html->url('/')?>users/logout" class="register">Logout</a>
                    <a href="<?php echo $this->Html->url('/')?>users/<?php echo $this->Session->read('fdashboard')?>" class="register">Dashboard</a>
                </section>
                <?php } else { ?>
                <section class="login-details">
                    <a href="javascript:void(0);" class="login sign_in_toggle">Login</a>
                    <a href="<?php echo $this->Html->url('/')?>users/signup" class="register">Register</a>
                </section>
                <?php } ?>

                <section class="lagn-part">
                    <script>
                        $(document).ready(function () {
                            $('.profile-element').on('click', function () {
                                $(this).toggleClass('activedj');
                            })
                        });
                    </script>
                    <ul>
                        <li class="active"><a title="English" href="javascript:void(0)"><img alt="english" src="<?php echo  $this->Html->url('/') ?>images/en-flag.png" height="25" width="38"></a></li>
                    </ul>
                    <section class="clr"></section>
                </section>
                <div class="csocis">
                    <ul>
                        <li><a href="javascript:void(0)" target="_blank" class="fa fa-facebook"></a></li>
                        <li><a href="javascript:void(0)" target="_blank" class="fa fa-twitter"></a></li>
                    </ul>
                </div>
                <section class="clr"></section>
            </section>
            <div class="clr"></div>
        </section>
    </section>
</header>
<section id="header-mc">
    <section id="header-wrapper">
        <section id="m-menu">
            <div class="sb-toggle-left navbar-left">
                <div class="navicon-line"></div>
                <div class="navicon-line"></div>
                <div class="navicon-line"></div>
            </div>
            <!-- /.sb-control-left -->

            <ul>
                <li> <a href="<?php echo  $this->Html->url('/')?>">Home</a></li>
                <li> <a href="javascript:void(0)">Escorts</a>
                    <ul>
                        <li> <a href="javascript:void(0)">Female</a></li>
                        <li> <a href="javascript:void(0)">Male</a></li>
                        <li> <a href="javascript:void(0)">Trans</a></li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)">Agencies</a></li>
                <li> <a href="javascript:void(0)">Adult Clubs</a>
                    <ul>
                        <li> <a href="javascript:void(0)">Massage Parlour</a></li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)">Escorts Tours</a></li>
                <li> <a href="javascript:void(0)">Blogs</a></li>
                <li> <a href="javascript:void(0)">Shop</a>
                    <ul>
                        <li> <a href="javascript:void(0)">Erotic Item</a></li>
                        <li> <a href="javascript:void(0)">Webcam Sessions</a></li>
                        <li> <a href="javascript:void(0)">Private Gallery</a></li>
                        <li> <a href="javascript:void(0)">Private Videos</a></li>
                    </ul>
                </li>
                <li> <a href="<?php echo $this->Html->url('/');?>pages/advertisement">Advertise</a></li>
            </ul>
            <section class="change-location">
                <section class="change-location-right">
                    <section class="hoverBG">
                        <section class="change-location-rit">
                            <h5> New Zealand </h5>
                            <section class="chn-co2"><a href="javascript:void(0);" class="select-country">
                            <i class="fa fa-map-marker"></i>Change Country</a></section>
                            <h4><img src="<?php echo  $this->Html->url('/') ?>images/girl-icon.png" alt="">49<span>Girls</span></h4>
                        </section>
                    </section>
                </section>
            </section>
            <section class="clr"></section>
        </section>
        <div class="clr"></div>
        <section class="clr"></section>
    </section>
</section>
<section id="banner-part"> <img src="<?php echo  $this->Html->url('/') ?>images/banner1.jpg"> </section>
<ul class="side-menu">
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>pages/onlineescorts">Online Escorts</a></li>
    <li style="top: 100%;"> <a href="javascript:void(0)">Escort Reviews</a></li>
    <li style="top: 100%;"> <a href="javascript:void(0)">Latest Statuses</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
        <ul>
            <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>all-faq">All FAQ</a> </li>
            <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>general-faq">General FAQs</a> </li>
        </ul>
    </li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>classified-ads">Classifieds</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
</ul>
<section class="submenu">
    <div class="sb-toggle-left-inner"> <a class="menu-icon">
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
        </a> </div>
    <ul class="clear">
        <li> <a href="<?php echo $this->Html->url('/');?>pages/onlineescorts">Online Escorts</a></li>
        <li> <a href="javascript:void(0)">Escort Reviews</a></li>
        <li> <a href="javascript:void(0)">Latest Statuses</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>pages/faq">FAQ</a>
            <ul>
                <li><a href="<?php echo $this->Html->url('/');?>pages/allfaq">All FAQ</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>pages/generalfaq">General FAQs</a></li>
            </ul>
        </li>
        <li><a href="<?php echo $this->Html->url('/');?>classified-ads">Classifieds</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>pages/happyhours">Happy Hours</a></li>
    </ul>
</section>