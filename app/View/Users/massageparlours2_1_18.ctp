<?php 
   //pr($allclubs);exit;
?>
<?php echo $this->element('banner');?>
<section id="contentsection">
    <?php  echo $this->element("carousel_slider");?>
   <!-- <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>-->
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <!-- Escort Left start ---->
                <script src="<?=$this->Html->url('/')?>js/jquery_003.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        //$("li.sieve").sieve();
                        $("ul.sieve").sieve({itemSelector: ".searchable", textSelector: "span"});
                    });
                </script>
                <script type="text/javascript" src="<?=$this->Html->url('/')?>js/cityscroll.js"></script>
                <script type="text/javascript" src="<?=$this->Html->url('/')?>js/jquery.htm"></script>
                <section class="col-left-l">
                   <!-- <section class="side-1">
                        <h3>YOU ARE HERE :</h3>
                        <section class="curr-coun1"><h4>United Kingdom (49)</h4></section>
                        <section class="side-1">
                            <h3>Cities :</h3>
                            <div id="cityList1" class="leftbg scroll-wrapper1">
                                <div class="scroll-up" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-down" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-block">
                                    <ul class="categoryfield">
                                        <li><a href="javascript:void(0)"><span>Auckland</span> (2)</a></li>
                                        <li><a href="javascript:void(0)"><span>Henderson</span> (4)</a></li>
                                        <li><a href="javascript:void(0)"><span>Manurewa</span> (2)</a></li>
                                        <li><a href="javascript:void(0)"><span>Orewa</span> (2)</a></li>
                                        <li><a href="javascript:void(0)"><span>Panmure</span> (3)</a></li>
                                        <li><a href="javascript:void(0)"><span>Papatoetoe</span> (1)</a></li>
                                        <li><a href="javascript:void(0)"><span>Royal Oak</span> (2)</a></li>
                                        <li><a href="javascript:void(0)"><span>Takanini</span> (1)</a></li>
                                        <li><a href="javascript:void(0)"><span>Kaikoura</span> (4)</a></li>
                                        <li><a href="javascript:void(0)"><span>Lyttelton</span> (4)</a></li>
                                        <li><a href="javascript:void(0)"><span>Temuka</span> (1)</a></li>
                                        <li><a href="javascript:void(0)"><span>Dannevirke</span> (9)</a></li>
                                        <li><a href="javascript:void(0)"><span>Foxton</span> (2)</a></li>
                                        <li><a href="javascript:void(0)"><span>Taumarunui</span> (12)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bigstrip"><center><img alt="" src="<?=$this->Html->url('/')?>images/arrow2-new.png"></center></div>
                            <section class="clr"></section>
                        </section>
                        <section class="side-1">
                            <h3>Category :</h3>
                            <div id="cityList" class="leftbg scroll-wrapper">
                                <div class="scroll-up" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-down" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-block">
                                    <ul class="categoryfield">
                                        <li><a href="#">TV/TS (5)</a></li>
                                        <li><a href="#">Asian Escorts (10)</a></li>
                                        <li><a href="#">Mature Escorts (14)</a></li>
                                        <li><a href="#">Latino Escorts (15)</a></li>
                                        <li><a href="#">High Class (22)</a></li>
                                        <li><a href="#">Fetish Escorts (12)</a></li>
                                        <li><a href="#">English Escorts (10)</a></li>
                                        <li><a href="#">Busty Escorts (10)</a></li>
                                        <li><a href="#">Brunette Escorts (7)</a></li>
                                        <li><a href="#">Mistress/Dominatrix (10)</a></li>
                                        <li><a href="#">Black Escorts (9)</a></li>
                                        <li><a href="#">Morenas (5)</a></li>
                                        <li><a href="#">Russian Escorts (0)</a></li>
                                        <section class="clr"></section>
                                    </ul>
                                </div>
                            </div>
                            <div class="bigstrip"><center><img alt="" src="<?=$this->Html->url('/')?>images/arrow2-new.png"></center></div>
                        </section>
                    </section>-->
                    
                    <?php //echo $this->element('leftcategory_panel'); ?>
                </section>
                <!-- Escort Left end ---->
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>Massage Parlours</h1>
                            
                          
                        </section>
                        <section id="content" style="width:100%">
                            
                            <div style="position: relative;" id="container" class=""><?php 
                                if(!empty($escorttours)){
                                    foreach ($escorttours as $showclubs) {
                            ?>
                            
                                <div style="" class="pin_d box online-girl">
                                    <div class="pin_d_inner" style="background: url('<?php echo $this->webroot?>user_images/<?php echo $showclubs['User']['profile_image']?>')">
                                      
                                        
                                        <div class="overlay-pic">
                                            <div class="overlay-pic-inner">
                                                <h3> <span style="float:left;"><?php echo $showclubs['User']['first_name'].$showclubs['User']['last_name']?> </span> <!--<span style="float:right;"> <img alt="Escorts" src="<?php echo  $this->Html->url('/') ?>images/en-flag.png" width="30px" height="autoo"> </span>-->
                                                    <div class="clr"></div>
                                                </h3>
                                                <ul>
                                                    <li> 
                                                        <span class="t1">
                                                            Location :<?php echo $showclubs['Country']['name']?>
                                                        </span>
                                                        <span class="t2">
                                                            <?php echo $showclubs['City']['name']?>                      
                                                        </span>
                                                    <div class="clr"></div>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <?php 
                        } 
                            
                            
                        }else{ ?>
                            <div class="no-record" style="display:none">
                                No Escort Found          
                            </div>
                            
                            <?php } ?>
                            </div>
                            <div id="more2" class="morebox" style="text-align:-moz-center;"> <a href="javascript:;" class="buttonGrey load-more-list" id="2" style="display:none;">
                                    Load More Escorts            </a> </div>
                            <nav id="page-nav"> <a href="#"></a> </nav>
                            <section class="clr"></section>
                        </section>
                    </section>
                </section>
                <section class="clr"></section>
            </section>
        </section>
        <!--<script src="<?=$this->Html->url('/')?>js/jquery_004.js"></script>
        <script src="<?=$this->Html->url('/')?>js/jquery_005.js"></script>
        
        <script src="<?=$this->Html->url('/')?>js/listing_page.js"></script> -->

    </div>

    <div class="col-right">
        <!--<section id="banners">
            <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br>
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br>
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br>
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>-->
        <?php echo $this->element('user_banner'); ?>
    </div>
</section>
<div class="clr"></div>