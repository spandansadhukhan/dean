
<section id="contentsection">
    <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div>

    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <!-- Escort Left start ---->
                <script src="<?php echo $this->Html->url('/') ?>js/jquery.sieve.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        //$("li.sieve").sieve();
                        $("ul.sieve").sieve({itemSelector: ".searchable", textSelector: "span"});
                    });
                </script>
                <script type="text/javascript" src="<?php echo $this->Html->url('/') ?>js/cityscroll.js"></script>
                <script type="text/javascript" src="<?php echo $this->Html->url('/') ?>js/jquery.navgoco.js"></script>

                <!--
                        <script type="text/javascript" id="demo1-javascript">
                $(document).ready(function() {
                        // Initialize navgoco with default options
                        $("#acc-menu2").navgoco({
                                caretHtml: '',
                                accordion: false,
                                openClass: 'open',
                                save: true,
                                cookie: {
                                        name: 'navgoco',
                                        expires: false,
                                        path: '/'
                                },
                                slide: {
                                        duration: 400,
                                        easing: 'swing'
                                },
                                // Add Active class to clicked menu item
                                onClickAfter: function(e, submenu) {
                                        e.preventDefault();
                                        $('#acc-menu2').find('li').removeClass('active');
                                        var li =  $(this).parent();
                                        var lis = li.parents('li');
                                        li.addClass('active');
                                        lis.addClass('active');
                                },
                        });

                        $("#collapseAll").click(function(e) {
                                e.preventDefault();
                                $("#acc-menu2").navgoco('toggle', false);
                        });

                        $("#expandAll").click(function(e) {
                                e.preventDefault();
                                $("#demo1").navgoco('toggle', true);
                        });
                });
                </script>
                <script type="text/javascript" id="demo2-javascript">
                $(document).ready(function() {
                //	$("#acc-menu").navgoco({accordion: true});
                });
                </script>
                -->
                <section class="col-left-l">
                    <section class="side-1">
                        <h3>YOU ARE HERE :</h3>

                        <section class="curr-coun1">
                            <h4>United Kingdom		 (      49)</h4>
                        </section>
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
                            <div class="bigstrip">
                                <center><img alt="" src="<?php echo  $this->Html->url('/') ?>images/arrow2-new.png"></center>
                            </div>
                            <section class="clr"></section>
                        </section>
                        <section class="side-1">
                            <h3>Category :</h3>
                            <div id="cityList" class="leftbg scroll-wrapper">
                                <div class="scroll-up" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-down" style="opacity: 0;">&nbsp;</div>
                                <div class="scroll-block">
                                    <ul class="categoryfield">
                                       <?php 
                                            //pr($category); exit;
                                       //count($categorycount); exit;
                                           foreach ($category as $showescortcat) {
                                            $escortcount = $this->requestAction('/pages/countescort/'.$showescortcat['Category']['id']);
                                               
                                       ?>     
                                        <li>
                                            <a href="<?php echo $this->webroot?>pages/onlineescorts/<?php echo base64_encode($showescortcat['Category']['id']); ?>" ><?php echo $showescortcat['Category']['name']; ?>(<?php echo $escortcount; ?>)</a>
                                        </li>
                                        <?php 
                                            }
                                        ?>  
                                        <section class="clr"></section>
                                    </ul>
                                </div>
                            </div>
                            <div class="bigstrip">
                                <center><img alt="" src="<?php echo  $this->Html->url('/') ?>images/arrow2-new.png"></center>
                            </div>
                        </section>
                    </section>
                </section>
                <!-- Escort Left end ---->
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>
                                Choose Your Template</h1>
                                <!-- <section class="change-button"> 
                                    <a class="chan-btn change-city-button" href="javascript:">
                                        Choose City<i class="fa fa-arrow-circle-down"></i>
                                    </a>
                                    <div id="regions">
                                        
                                        <div class="city-li"> 
                                            <a href="<?php echo $this->Html->url('/');?>escort-details" title=" Escorts">
                                                <div class="city">
                                                    <div class="cityName">Edinburgh </div>
                                                    <div class="cityNumber">2</div>
                                                    <div class="clearer"></div>
                                                </div>
                                            </a> 
                                        </div>

                                    </div>
                                </section> -->
                            <!-- Here Escorts Filter will shown -->
                            <form action="javascript:void(0);" accept-charset="utf-8" id="advance_search_form" method="get" class="ajaxform">
                                <div class="filter-container" style=" color:#fff;">
                                    <ul class="select-wrapper fisedr" style="display:none;">
                                        <li>
                                            <span  class="allallspan">All</span>
                                            <ul class="select-options">
                                                <li class="bydate"><input type="radio" name="escorts_show" value="all" id="all" checked style="opacity:0"><label  for="all"> All Escorts</label></li>
                                                <li class="toprated"><input type="radio" name="escorts_show" value="today" id="today" style="opacity:0"><label for="today">Todays Escorts</label></li>
                                                <li class="toprated"><input type="radio" name="escorts_show" value="new" id="new" style="opacity:0"><label for="new">New Escorts</label></li>
                                                <li class="toprated"><input type="radio" name="escorts_show" value="tour" id="tour"  style="opacity:0"><label  for="tour">Travelling Escorts</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="select-wrapper" style=" color:#fff;display:none;">
                                        <li>
                                            <span style="color:#fff;" class="allallspan" id="alltimespan">All Time</span>
                                            <ul class="select-options">
                                                <li class="alltime"><input type="radio" name="escorts_show" value="all" id="all2" style="opacity:0"><label  for="all2">All Time</label></li>
                                                <li class="thismonth"><input type="radio" name="escorts_show" value="month" id="month" style="opacity:0"><label  for="month">This Month</label></li>
                                                <li class="thisyear"><input type="radio" name="escorts_show" value="year" id="year" style="opacity:0"><label  for="year">This Year</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="show-filter" style="display:none;"><a style="cursor:pointer;">Show Filters</a></div>
                                <div class="clr"></div>
                                <div id="show-filter-content" style="display:none;">
                                    <div class="filters">

                                        <div id="sorting-bar" class="filter no-left-border">
                                            <span class="title-sor">Sort By:</span>
                                            <div class="list sorting-div">
                                                <label><input type="checkbox" name="sort" value="random" class="r"> <span>Random</span><div class="clear"></div></label>
                                                <label><input type="checkbox" name="sort" value="Alphabetically" class="a"> <span class="grey">Alphabetically</span><div class="clear"></div></label>
                                                <label><input type="checkbox" name="sort" value="mv" class="MostViewed"> <span class="grey">Most Viewed</span><div class="clear"></div></label>
                                            </div>
                                            <!-- 	<a id="f_sorting">... More \BB</a> -->
                                        </div>
                                        <div id="filters_body">

                                            <div class="filter">
                                                <span class="title-sor grey">Categories</span>
                                                <div class="list">
                                                    <label><input type="checkbox" name="category_ids[]" value="1"  class="af_i_1"> <span title="TV/TS" class="grey lbl_incall">TV/TS </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="category_ids[]" value="2"  class="af_i_1"> <span title="Asian Escorts" class="grey lbl_incall">Asian Escorts </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="category_ids[]" value="3"  class="af_i_1"> <span title="Mature Escorts" class="grey lbl_incall">Mature Esc... </span><div class="clear"></div></label>
                                                </div>
                                                <a id="a_category" class="more change-category" onclick="changeCategory('category')">... More \BB</a>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Services</span>
                                                <div class="list">
                                                    <label><input type="checkbox" name="service_ids[]" value="1" class="af_i_1"> <span title="69 Position" class="grey lbl_incall">69 Position</span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="service_ids[]" value="2" class="af_i_1"> <span title="Strap on" class="grey lbl_incall">Strap on</span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="service_ids[]" value="3" class="af_i_1"> <span title="Masturbate" class="grey lbl_incall">Masturbate</span><div class="clear"></div></label>

                                                </div>
                                                <a id="a_service" class="more change-category" onclick="changeCategory('service')">... More \BB</a>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Availability</span>
                                                <div class="list">
                                                    <label><input type="checkbox" name="availability[]" value="Incall" class="af_i_1"> <span title="Incall" class="grey lbl_incall">Incall Only </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="availability[]" value="Outcall" class="af_i_2"> <span title="Outcall" class="grey lbl_incall">Outcall Only </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="availability[]" value="Incall/Outcall" class="af_o_1"> <span title="Incall outcall" class="grey lbl_outcall">Incall outcall </span><div class="clear"></div></label>
                                                </div>
                                                <!--		<a id="f_af" class="more">... More \BB</a> -->
                                            </div>
                                            <!--
                                            <div class="filter">
                                                <span class="title-sor grey">Language</span>

                                                <div class="list">
                                                    <label><input type="checkbox" name="language_ids[]" value="1" class="l_de"> <span class="grey" title="Portugues">Portugues</span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="language_ids[]" value="2" class="l_de"> <span class="grey" title="Italiano">Italiano</span><div class="clear"></div></label>
                                                </div>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Ethnicity</span>

                                                <div class="list">
                                                    <label><input type="checkbox" name="ethnicity_ids[]" value="1" class="e_1"> <span class="grey" title="Asian">Asian </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="ethnicity_ids[]" value="2" class="e_1"> <span class="grey" title="Black">Black </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="ethnicity_ids[]" value="4" class="e_1"> <span class="grey" title="Mixed">Mixed </span><div class="clear"></div></label>
                                                </div>
                                                <a id="a_ethnicity" class="more change-category" onclick="changeCategory('ethnicity')">... More \BB</a>
                                            </div>-->
                                            <div class="filter">
                                                <span class="title-sor grey">Age</span>

                                                <div class="list">
                                                    <label><input type="checkbox" name="age_range" value="18" class="a_18-20"> <span class="grey" title="18-20">18-22 </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="age_range" value="23" class="a_21-24"> <span class="grey" title="21-24">22-26 </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="age_range" value="27" class="a_25-29"> <span class="grey" title="25-29">26-30 </span><div class="clear"></div></label>
                                                </div>

                                                <a id="f_a" class="more change-category" onclick="changePhisical('age')">... More \BB</a>
                                            </div>

                                            <div class="filter">
                                                <span class="title-sor grey">Gender</span>

                                                <div class="list">
                                                    <input type="hidden" name="gender" value="">
                                                    <label><input type="checkbox" name="gender" value="Female"    class="cs_A"> <span class="grey" title="Female">Female </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="gender" value="Male"      class="cs_A"> <span class="grey" title="Male">Male </span><div class="clear"></div></label>
                                                    <label><input type="checkbox" name="gender" value="Trans"    class="cs_A"> <span class="grey" title="Trans">Trans </span><div class="clear"></div></label>
                                                </div>

                                                <a id="f_cs" class="more change-category" onclick="changePhisical('gender')">... More \BB</a>
                                            </div>


                                            <div class="filter no-right-border">
                                                <span class="title-sor ">Physical </span>

                                                <div class="list">
                                                    <ul id="other_list">



                                                        <li><span rel="Weight" class="grey normal change-category" onclick="changeCategory('haircolor')"><i class="fa fa-angle-right"></i>Hair Color </span></li>


                                                        <li><span rel="Eye color" class="grey normal change-category" onclick="changeCategory('eyecolor')"><i class="fa fa-angle-right"></i> Eye Color</span></li>


                                                        <li><span rel="Smoker" class="grey normal change-category" onclick="changePhisical('weight')"><i class="fa fa-angle-right"></i>Weight </span></li>


                                                        <li><span rel="Nationality" class="grey normal change-category" onclick="changePhisical('height')"><i class="fa fa-angle-right"></i>Height </span></li>

                                                    </ul>

                                                </div>
                                            </div>

                                            <div class="clear"></div>
                                            <div id="change-divcontent" style="display: none;background-color:#ffffff;margin-top:20px;">
                                                <div class="change-category close_div" style="float:right;cursor:pointer" ><i class="fa fa-times fa-fw"></i></div>
                                                <div class="category_content">

                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                        </div>


                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <section class="pin-wrapper">
                                    <section class="pin-wrapper-inner">
                                        <div class="sub-search" style="margin-top: -10px;display:none;">
                                            <div class="inner">
                                                <div id="mooniform-real-pics" class="mooniform-checker">
                                                    <span><input type="checkbox"  name="premium" id="real-pics" value="Yes"></span></div>
                                                <label class="lbl-inn an real-photos" for="real-pics">Premium  </label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-verified-contact" class="mooniform-checker"><span>
                                                        <input type="checkbox" name="verified"  id="verified-contact" value="Yes"></span></div>
                                                <label class="lbl-inn an verified-contact" for="verified-contact">Verified</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-with-video" class="mooniform-checker"><span class="mooniform-checked">
                                                        <input type="checkbox"  name="video" id="with-video" value="Yes"></span></div>
                                                <label class="lbl-inn an with-video" for="with-video">With Video</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-pornstar" class="mooniform-checker"><span>
                                                        <input type="checkbox" name="pornstar"  id="pornstar" value="Yes"></span></div>
                                                <label class="lbl-inn an pornstar" for="pornstar">Pornstar</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-online" class="mooniform-checker"><span>
                                                        <input type="checkbox" name="online"  id="online" value="Yes"></span></div>
                                                <label class="lbl-inn an online2" for="online">Online</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-pornstar" class="mooniform-checker"><span>
                                                        <input type="checkbox" name="social_escort"  id="social" value="Yes"></span></div>
                                                <label class="lbl-inn an social" for="social">Social Escorts</label>
                                            </div>
                                            <div class="clr"></div>
                                        </div>

                                        <div class="clr"></div>
                                    </section>
                                </section>
                            </form>
                            <!--these variables are used in filter js -->
                            <script>
                                var page_type = 'Online';
                                var page_type_value = '';
                                var Connection_error = 'Connection error';
                                var Hetro_couple = 'Hetro couple';
                                var Female_Couple = 'Female Couple';
                                var Male_Couple = 'Male Couple';
                                var Trans_Couple = 'Trans Couple';
                            </script>
                            <script src="<?php echo $this->Html->url('/') ?>js/filter.js"></script>
                            <!-- Here Escorts Filter End -->
                        </section>
                        <section id="content">
                            <div id="container" class="transitions-enabled centered clearfix">
                                <?php 
                                //print_r($escorts);

                                  if(!empty($webtemplates)){  
                                   foreach ($webtemplates as $showescortsdata) { 
                                ?>
                                <div class="pin_d box online-girl">
                                    <div class="pin_d_inner">
                                        <a href="<?php echo $this->webroot ?>escorts/createwebsite/<?php echo base64_encode($showescortsdata['WebsiteTemplate']['id']);?>"> 
                                           <?php 
                                                if($showescortsdata['WebsiteTemplate']['template'] != ''){
                                            ?>
                                            <img src="<?php echo  $this->webroot; ?>img/<?php echo $showescortsdata['WebsiteTemplate']['template'];?>"> 
                                            <?php } ?>
                                        </a>
                                        <div class="overlay-pic">
                                            <div class="overlay-pic-inner">
                                                <h3> <span style="float:left;">
                                                        <!-- Patty --> <?php echo $showescortsdata['WebsiteTemplate']['name']; ?>                     </span> 
                                                    <div class="clr"></div>
                                                </h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }

                                }else{
                                  echo 'No results found';  

                                } ?>
                            </div>
                            <div class="no-record"  style="display:none" >
                                No Online Escorts Found          </div>
                            <nav id="page-nav">
                                <a href="onlineescortsmore&page=2&amp;st=0&amp;"></a> </nav>
                            <section class="clr"></section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <script src="<?php echo $this->Html->url('/') ?>js/jquery.masonry.min.js"></script>
        <script src="<?php echo $this->Html->url('/') ?>js/jquery.infinitescroll.min.js"></script>
        <script>
                                var totalPage = '1';
                                var No_Escorts_found = 'No Escort Found';
                                var columnWidth = 20;
        </script>
        <script src="<?php echo $this->Html->url('/') ?>js/listing_page.js"></script>
    </div>

    <div class="col-right">
        <section id="banners">



            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<script type="text/javascript">
                                function add_to_fav(cid, uid) {
                                    //var user_id = <?php echo $this->Session->read('fuid')?>;
                                    //alert("<?php echo $this->webroot ?>pages/addtofavqq");


                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo $this->webroot ?>pages/addtofavqq",
                                        data: {cid: cid, uid: uid},
                                        success: function (msg) {
                                            if (msg == 1) {
                                                $(".t2cid").hide();
                                                alert('Added to your favorite List');
                                                return false;
                                            } else {
                                                alert('Already Added to your favorite List');
                                                return false;
                                            }
                                        }
                                    })
                                }
</script>
<div class="clr"></div>