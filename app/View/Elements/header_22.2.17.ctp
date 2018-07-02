
<header>
    <section id="header-wrapper">
        <section class="inner-header">
            <section class="logo">
                <a href="<?php echo $this->Html->url('/');?>"><img src="<?php echo  $this->Html->url('/') ?>images/head_logo.png" alt=""></a>
            </section>
            <section class="change-location">
                <section class="change-location-right">
                    <section class="hoverBG">
                        <section class="change-location-rit">
                            <h5> New Zealand </h5>
                            <section class="chn-co2"><a href="javascript:void(0);" class="rselect-country">
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
                    <a class="active" href="<?php echo $this->Html->url('/')?>users/logout" class="register">Logout</a>
                    <a href="<?php echo $this->Html->url('/')?><?php echo $this->Session->read('fdashboard')?>">Dashboard</a>
                </section>
                <?php } else { ?>
                <section class="login-details">
                    <a href="javascript:void(0);" class="login sign_in_toggle">Login</a>
                    <a href="<?php echo $this->Html->url('/')?>users/signup">Register</a>
                </section>
                <?php } ?>
                

                <section class="lagn-part">
                   <!-- <script>
                        $(document).ready(function () {
                            $('.profile-element').on('click', function () {
                                $(this).toggleClass('activedj');
                            })
                        });
                    </script>-->
                    <ul>
                        <li class="active"><a title="English" href="javascript:void(0)"><img alt="english" src="<?php echo  $this->Html->url('/') ?>images/head_flag.png" height="25" width="38"></a></li>
                    </ul>
                    <section class="clr"></section>
                </section>
                <div class="csocis">
                    <ul>
                        <li><img src="<?php echo  $this->Html->url('/') ?>images/face.png" alt=""></li>
                        <li><img src="<?php echo  $this->Html->url('/') ?>images/gplus.png" alt=""></li>
                        <li><img src="<?php echo  $this->Html->url('/') ?>images/tweet.png" alt=""></li>
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
                <li> <a href="<?php echo $this->webroot?>clubs/">Clubs</a></li>
                <li> <a href="javascript:void(0)">Massage Parlours</a></li>
                <li> <a href="javascript:void(0)">Strippers</a>
                    <ul>
                        <li> <a href="javascript:void(0)">Independent Strippers</a></li>
                        <li> <a href="javascript:void(0)">Strip Clubs</a></li>
                        <li> <a href="javascript:void(0)">Stripper Agents</a></li>
                    </ul>  
                </li>

                <li> <a href="<?php echo $this->webroot ?>users/escorttours">Escorts Tours</a></li>
                <!-- <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>classified-ads">Classifieds</a></li> -->
                <li> <a href="<?php echo $this->webroot ?>pages/shop">Shop</a>
                    <ul>
                        <!-- <li> <a href="javascript:void(0)">Erotic Item</a></li>
                        <li> <a href="javascript:void(0)">Webcam Sessions</a></li>
                        <li> <a href="javascript:void(0)">Private Gallery</a></li>
                        <li> <a href="javascript:void(0)">Private Videos</a></li> -->

                        <?php 
                        if(!empty($categoryheaderList))
                        {
                        foreach($categoryheaderList as $categoryheaderListval)
                        {
                        ?>
                        <li> <a href="<?php echo $this->webroot ?>pages/shop_physical_item/<?php echo base64_encode($categoryheaderListval['ShopCategorie']['id']); ?>"><?php echo $categoryheaderListval['ShopCategorie']['name']; ?></a></li>
                        <?php } } ?>

                    </ul>
                </li>
                <li> <a href="<?php echo $this->Html->url('/');?>advertisement">Advertise</a></li>
            </ul>
            <section class="change-location">
                <section class="change-location-right">
                    <section class="hoverBG">
                        <section class="change-location-rit">
                            <h5> New Zealand </h5>
                            <section class="chn-co2"><a href="javascript:void(0);" class="rselect-country">
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

<!--<section class="second_banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
 

    <ul class="bxslider">
        <?php 
            foreach ($escortslider as $showescorts) {
                if($showescorts['User']['profile_image'] != ''){
                   $img_path = $this->webroot.'user_images/'.$showescorts['User']['profile_image'];
               }else{
                    $img_path = $this->webroot.'noimage.png';
               }
        ?>
        <li><a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showescorts['User']['id'])?>" target="_blank"><img src="<?php echo $img_path; ?>" target="_blank"></a></li>
       <?php } ?> 
        
    </ul>


</div>
		</div>
	</div>
</section>-->
<style>

/*#banner-part {width: 100%; height: 250px;overflow: hidden;}

  #banner-part img {width: 100%; height: 250px;overflow: hidden;}
.bx-viewport {height:225px!important;}*/
.bx-wrapper {margin-bottom: 0!important;}
.second_banner{width: 100%; overflow:hidden;}
    /*.bx-wrapper img { width:100%;}
    .bx-wrapper .bx-viewport {
        left: 0px!important;
        width: 93%!important;
        margin: 0 auto!important;
    }
    .bx-wrapper {margin-bottom:10px!important; }*/
    .bx-wrapper .bx-prev {left: 45px; background: url(images/controls.png) no-repeat 0 -32px;}
    .bx-wrapper .bx-next { right: 45px; background: url(images/controls.png) no-repeat -43px -32px;}
    .vie_escort li img{margin: 0 auto;}
</style>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
    // maxSlides: 4,
  });
});
$(document).ready(function(){
  $('.bxslider2').bxSlider({
    auto:true
    // maxSlides: 4,
  });
});
</script>