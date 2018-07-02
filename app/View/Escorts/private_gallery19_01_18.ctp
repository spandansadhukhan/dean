<?php 
   // pr($userPhoto); exit;
?>

<section id="contentsection">
    <div id="wait-div" class="wait-div">
       <!--  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div> -->
    </div>
    <div class="col-left">
        <section id="wrapper">
            <section id="middle">
                <!-- Escort Left start ---->
                <script src="<?php echo $this->Html->url('/') ?>js/jquery_003.js"></script>
                <script type="text/javascript">
                    function b64EncodeUnicode(str) {
                        return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
                        String.fromCharCode('0x' + p1);
                        }));
                    }

                    $(document).ready(function () {
                        //$("li.sieve").sieve();
                        $("ul.sieve").sieve({itemSelector: ".searchable", textSelector: "span"});


                        $('#location').on('change', function () {
                        var id = $(this).val(); // get selected value
                        
                        var url = 'http://thedirectory.nz/pages/onlineescorts/'+b64EncodeUnicode(id);
                        if (url) { 
                                window.location = url; // redirect
                            }
                        return false;
                        });
                    });
                </script>
                <script type="text/javascript" src="<?=$this->Html->url('/')?>js/cityscroll.js"></script>
                <script type="text/javascript" src="<?=$this->Html->url('/')?>js/jquery.htm"></script>
                <section class="col-left-l">
                    <?php echo $this->element('escort_sidebar'); ?>
                </section>
                <!-- Escort Left end ---->
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                            <h1>Private Gallery</h1>
                             
                            <!-- Here Escorts Filter will shown -->
                            <form style="display:none;" action="#" accept-charset="utf-8" id="advance_search_form" method="get" class="ajaxform">
                                <div class="filter-container" style=" color:#fff;">
                                    <ul class="select-wrapper fisedr">
                                        <li>
                                            <span class="allallspan">All</span>
                                            <ul class="select-options">
                                                <li class="bydate"><input name="escorts_show" value="all" id="all" checked="checked" style="opacity:0" type="radio"><label for="all"> All Escorts</label></li>
                                                <li class="toprated"><input name="escorts_show" value="today" id="today" style="opacity:0" type="radio"><label for="today">Todays Escorts</label></li>
                                                <li class="toprated"><input name="escorts_show" value="new" id="new" style="opacity:0" type="radio"><label for="new">New Escorts</label></li>
                                                <li class="toprated"><input name="escorts_show" value="tour" id="tour" style="opacity:0" type="radio"><label for="tour">Travelling Escorts</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="select-wrapper" style=" color:#fff;">
                                        <li>
                                            <span style="color:#fff;" class="allallspan" id="alltimespan">All Time</span>
                                            <ul class="select-options">
                                                <li class="alltime"><input name="escorts_show" value="all" id="all2" style="opacity:0" type="radio"><label for="all2">All Time</label></li>
                                                <li class="thismonth"><input name="escorts_show" value="month" id="month" style="opacity:0" type="radio"><label for="month">This Month</label></li>
                                                <li class="thisyear"><input name="escorts_show" value="year" id="year" style="opacity:0" type="radio"><label for="year">This Year</label></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="show-filter"><a style="cursor:pointer;">Show Filters</a></div>
                                <div class="clr"></div>
                                <div id="show-filter-content">
                                    <div class="filters">

                                        <div id="sorting-bar" class="filter no-left-border">
                                            <span class="title-sor">Sort By:</span>
                                            <div class="list sorting-div">
                                                <label><input name="sort" value="random" class="r" type="checkbox"> <span>Random</span><div class="clear"></div></label>
                                                <label><input name="sort" value="Alphabetically" class="a" type="checkbox"> <span class="grey">Alphabetically</span><div class="clear"></div></label>
                                                <label><input name="sort" value="mv" class="MostViewed" type="checkbox"> <span class="grey">Most Viewed</span><div class="clear"></div></label>
                                            </div>

                                        </div>
                                        <div id="filters_body">
                                            <div class="filter">
                                                <span class="title-sor grey">Categories</span>
                                                <div class="list">
                                                    <label><input name="category_ids[]" value="1" class="af_i_1" type="checkbox"> <span title="TV/TS" class="grey lbl_incall">TV/TS </span><div class="clear"></div></label>
                                                    <label><input name="category_ids[]" value="2" class="af_i_1" type="checkbox"> <span title="Asian Escorts" class="grey lbl_incall">Asian Escorts </span><div class="clear"></div></label>
                                                    <label><input name="category_ids[]" value="3" class="af_i_1" type="checkbox"> <span title="Mature Escorts" class="grey lbl_incall">Mature Esc... </span><div class="clear"></div></label>
                                                </div>
                                                <a id="a_category" class="more change-category" onclick="changeCategory('category')">... More »</a>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Services</span>
                                                <div class="list">
                                                    <label><input name="service_ids[]" value="1" class="af_i_1" type="checkbox"> <span title="69 Position" class="grey lbl_incall">69 Position</span><div class="clear"></div></label>
                                                    <label><input name="service_ids[]" value="2" class="af_i_1" type="checkbox"> <span title="Strap on" class="grey lbl_incall">Strap on</span><div class="clear"></div></label>
                                                    <label><input name="service_ids[]" value="3" class="af_i_1" type="checkbox"> <span title="Masturbate" class="grey lbl_incall">Masturbate</span><div class="clear"></div></label>

                                                </div>
                                                <a id="a_service" class="more change-category" onclick="changeCategory('service')">... More »</a>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Availability</span>
                                                <div class="list">
                                                    <label><input name="availability[]" value="Incall" class="af_i_1" type="checkbox"> <span title="Incall" class="grey lbl_incall">Incall Only </span><div class="clear"></div></label>
                                                    <label><input name="availability[]" value="Outcall" class="af_i_2" type="checkbox"> <span title="Outcall" class="grey lbl_incall">Outcall Only </span><div class="clear"></div></label>
                                                    <label><input name="availability[]" value="Incall/Outcall" class="af_o_1" type="checkbox"> <span title="Incall outcall" class="grey lbl_outcall">Incall outcall </span><div class="clear"></div></label>
                                                </div>
                                                <!--        <a id="f_af" class="more">... More »</a> -->
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Language</span>

                                                <div class="list">
                                                    <label><input name="language_ids[]" value="1" class="l_de" type="checkbox"> <span class="grey" title="Portugues">Portugues</span><div class="clear"></div></label>
                                                    <label><input name="language_ids[]" value="2" class="l_de" type="checkbox"> <span class="grey" title="Italiano">Italiano</span><div class="clear"></div></label>
                                                </div>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Ethnicity</span>

                                                <div class="list">
                                                    <label><input name="ethnicity_ids[]" value="1" class="e_1" type="checkbox"> <span class="grey" title="Asian">Asian </span><div class="clear"></div></label>
                                                    <label><input name="ethnicity_ids[]" value="2" class="e_1" type="checkbox"> <span class="grey" title="Black">Black </span><div class="clear"></div></label>
                                                    <label><input name="ethnicity_ids[]" value="4" class="e_1" type="checkbox"> <span class="grey" title="Mixed">Mixed </span><div class="clear"></div></label>
                                                </div>
                                                <a id="a_ethnicity" class="more change-category" onclick="changeCategory('ethnicity')">... More »</a>
                                            </div>
                                            <div class="filter">
                                                <span class="title-sor grey">Age</span>

                                                <div class="list">
                                                    <label><input name="age_range" value="18" class="a_18-20" type="checkbox"> <span class="grey" title="18-20">18-22 </span><div class="clear"></div></label>
                                                    <label><input name="age_range" value="23" class="a_21-24" type="checkbox"> <span class="grey" title="21-24">22-26 </span><div class="clear"></div></label>
                                                    <label><input name="age_range" value="27" class="a_25-29" type="checkbox"> <span class="grey" title="25-29">26-30 </span><div class="clear"></div></label>
                                                </div>

                                                <a id="f_a" class="more change-category" onclick="changePhisical('age')">... More »</a>
                                            </div>

                                            <div class="filter">
                                                <span class="title-sor grey">Gender</span>

                                                <div class="list">
                                                    <input name="gender" value="" type="hidden">
                                                    <label><input name="gender" value="Female" class="cs_A" type="checkbox"> <span class="grey" title="Female">Female </span><div class="clear"></div></label>
                                                    <label><input name="gender" value="Male" class="cs_A" type="checkbox"> <span class="grey" title="Male">Male </span><div class="clear"></div></label>
                                                    <label><input name="gender" value="Trans" class="cs_A" type="checkbox"> <span class="grey" title="Trans">Trans </span><div class="clear"></div></label>
                                                </div>
                                                <a id="f_cs" class="more change-category" onclick="changePhisical('gender')">... More »</a>
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
                                                <div class="change-category close_div" style="float:right;cursor:pointer"><i class="fa fa-times fa-fw"></i></div>
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
                                                    <span><input name="premium" id="real-pics" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an real-photos" for="real-pics">Premium  </label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-verified-contact" class="mooniform-checker"><span>
                                                        <input name="verified" id="verified-contact" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an verified-contact" for="verified-contact">Verified</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-with-video" class="mooniform-checker"><span class="mooniform-checked">
                                                        <input name="video" id="with-video" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an with-video" for="with-video">With Video</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-pornstar" class="mooniform-checker"><span>
                                                        <input name="pornstar" id="pornstar" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an pornstar" for="pornstar">Pornstar</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-online" class="mooniform-checker"><span>
                                                        <input name="online" id="online" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an online2" for="online">Online</label>
                                            </div>
                                            <div class="inner">
                                                <div id="mooniform-pornstar" class="mooniform-checker"><span>
                                                        <input name="social_escort" id="social" value="Yes" type="checkbox"></span></div>
                                                <label class="lbl-inn an social" for="social">Social Escorts</label>
                                            </div>
                                            <div class="clr"></div>
                                        </div>

                                        <div class="clr"></div>
                                    </section>
                                </section>
                            </form>
                            <!--these variables are used in filter js -->
                            <!--<script>
                                var page_type = '';
                                var page_type_value = '';
                                var Connection_error = 'Connection error';
                                var Hetro_couple = 'Hetro couple';
                                var Female_Couple = 'Female Couple';
                                var Male_Couple = 'Male Couple';
                                var Trans_Couple = 'Trans Couple';
                            </script>
                            <script src="<?=$this->Html->url('/')?>js/filter.js"></script>-->
                            <!-- Here Escorts Filter End -->
                        </section>
                        <section id="content">
                            <div style="position: relative;" id="container" class="gallery_box">
                                <!-- <div style="position: absolute; top: 0px; left: 0px;" class="pin_d box online-girl masonry-brick"> -->
                                <div id="container" class="transitions-enabled centered clearfix">
                                <?php 
                                //print_r($escorts); exit;

                                   if(!empty($userPhoto)){  
                                   foreach ($userPhoto as $showescortsdata) {  
                                ?>
                                    <div class="pin_d box online-girl">
                                        <div class="pin_d_inner">
                                            
                                           
                                            <?php 
                                                if($showescortsdata['Photo']['img'] != ''){

                                                    $chk_ext = explode('.', $showescortsdata['Photo']['img']);
                                                    if($chk_ext[1] != 'mp4'){

                                            ?>
                                                 <img src="<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['Photo']['img'];?>"> 
                                            <?php
                                                }elseif($chk_ext[1] == 'mp4'){
                                            ?>
                                            <video width="400" controls>
                                            <source src="<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['Photo']['img'];?>" type="video/mp4">
                                            </video>
                                            <?php        
                                                }
                                             } 

                                             ?>
                                           
                                            <!-- <div class="overlay-pic">
                                                <div class="overlay-pic-inner">
                                                    <h3> <span style="float:left;">
                                                            <?php echo $showescortsdata['User']['name']; ?>                     </span> <span style="float:right;"> <img alt="Escorts" src="<?php echo  $this->Html->url('/') ?>images/en-flag.png" width="30px" height="autoo"> </span>
                                                        <div class="clr"></div>
                                                    </h3>
                                                    <ul>
                                                        <li> <span class="t1">
                                                                Age                        :
                                                                34 yrs                        </span><span class="t2">
                                                                Waimate                        </span>
                                                            <div class="clr"></div>
                                                        </li>
                                                        <li> <span class="t3">
                                                                Rates                        :
                                                                From  <?php if(!empty($showescortsdata['Rate'][0]['30min_incall'])){echo '&#128;'.$showescortsdata['Rate'][0]['30min_incall'];}else{echo 'No rate';} ?>                        </span> 

                                                            <span class="t2<?php echo $showescortsdata['User']['id'];?>" style="display:none;">
                                                            <?php 
                                                                if($this->Session->read('fuid')){
                                                            ?>    
                                                                <a href="javascript:void(0);" onclick="add_to_fav('<?php echo $showescortsdata['User']['id'];?>', '<?php echo $this->Session->read('fuid')?>')">
                                                            <?php }else{ ?>
                                                                    <a href="javascript:void(0);" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                            return false;">
                                                            <?php }?>    
                                                                        <img src="<?php echo  $this->Html->url('/') ?>images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"  /></a>
                                                            </span>
                                                            <span id="showliked"></span>
                                                            <div class="clr"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                <?php 
                                    }

                                }else{
                                  echo '<h2 style="color:#fff">No results found</h2>';  

                                } ?>
                                </div>

                            <p><?php 

                            // echo $this->Paginator->counter(array(
                            // 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));

                            ?>    </p>
                            <div class="paging">
                            <?php
                            // echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                            // echo $this->Paginator->numbers(array('separator' => ''));
                            // echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                                <!--   </div> -->

                            </div>
                            <div class="no-record" style="display:none">
                                No Escort Found          </div>
                            <div id="more2" class="morebox" style="text-align:-moz-center;"> <a href="javascript:;" class="buttonGrey load-more-list" id="2"  style="display:none;">
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
        <script>
            var totalPage = '5';
            var No_Escorts_found = 'No more Escorts found to load here';
            var columnWidth = 20;
        </script>
        <script src="<?=$this->Html->url('/')?>js/listing_page.js"></script>--> 
    </div>

   <div class="col-right">
        <?php echo $this->element('right_panel'); ?>
    </div>
</section>
<div class="clr"></div>

<style>
	.pin_d.box.online-girl {height: 260px; overflow: hidden;}
</style>