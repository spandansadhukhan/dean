<?php 
$controller=($this->params->controller);
$action=$this->params->action;
?>
<!--<section id="banner-part">
    <ul class="bxslider2">
        <?php 
           foreach ($banners as $showbanners) {
                if($showbanners['Banner']['image'] != ''){
                   $img_path = $this->webroot.'images/'.$showbanners['Banner']['image'];
               }else{
                    $img_path = $this->webroot.'noimage.png';
               }
        ?>
        <li><img src="<?php echo $img_path; ?>" target="_blank"></li>
       <?php } ?> 
    </ul>
</section>-->
<iframe src="<?php echo $this->webroot.'users/slider' ?>" width="100%" height="328px" frameborder="0" marginheight="0" marginwidth="0"></iframe>
<ul class="side-menu">
    <li style="top: 100%;" > <a href="<?php echo $this->Html->url('/');?>onlineescorts">Online Escorts</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
    <!-- <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>latest-status">Latest Statuses</a></li> -->
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
        <ul>
            <li><a href="<?php echo $this->Html->url('/');?>general-faq">General FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>escort-faq">Escort FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>client-faq">Client FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>advertise-faq">Advertise FAQs</a></li>
        </ul>
    </li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>classified-ads">Classifieds</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Work Rooms</a></li>

</ul>
<section class="submenu">
    <div class="sb-toggle-left-inner"> <a class="menu-icon">
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
            <div class="navicon-line"></div>
        </a> </div>
<!--    <ul class="clear">
        <li class="<?php echo ($controller=='users' and $action=='escortlist')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>online-escorts">Online Escorts</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='escortreviews')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
         <li> <a href="<?php echo $this->Html->url('/');?>latest-status">Latest Statuses</a></li> 
        <li class="<?php echo ($controller=='pages' and $action=='happyhours')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='workrooms')?'activenew1':''; ?>"> <a href="<?php echo $this->webroot ?>pages/workrooms">Work Rooms</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='blog')?'activenew1':''; ?>"> <a href="<?php echo $this->webroot ?>pages/blog">Blogs</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
            <ul>
                 <li><a href="<?php echo $this->Html->url('/');?>allfaq">All FAQ</a></li> 
                <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>general-faq">ESCORT FAQs</a></li>
            </ul>
        </li>
        <li class=""> <a href="<?php echo $this->webroot ?>classified-ads">Classified Ads</a></li>
        
        <li class="<?php echo ($controller=='contacts' and $action=='index')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    </ul>-->
    <ul class="clear">
        <li class="<?php echo ($controller=='users' and $action=='escortlist')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>online-escorts">Online Escorts</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='escortreviews')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='happyhours')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='workrooms')?'activenew1':''; ?>"> <a href="<?php echo $this->webroot ?>pages/workrooms">Work Rooms</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='blog')?'activenew1':''; ?>"> <a href="<?php echo $this->webroot ?>pages/blog">Blogs</a></li>
        <li class="<?php echo ($controller=='pages' and $action=='classifiedads')?'activenew1':''; ?>"> <a href="<?php echo $this->webroot ?>classified-ads">Classified Ads</a></li>

        <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
            <ul>
                <li><a href="<?php echo $this->Html->url('/');?>general-faq">General FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>escort-faq">Escort FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>client-faq">Client FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>advertise-faq">Advertise FAQs</a></li>
            </ul>
        </li>
<!--        <li> <a href="<?php echo $this->webroot ?>classified-ads">Classified Ads</a></li>-->
        <li class="<?php echo ($controller=='contacts' and $action=='index')?'activenew1':''; ?>"> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    </ul>
    
    
    
</section>
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
