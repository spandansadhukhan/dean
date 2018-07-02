<?php 
   //pr($escorttours); exit;
?>
<?php echo $this->element('banner');?>
<section id="contentsection" style="max-width:1280px;">
<?php echo $this->element('carousel_slider');?>
   <!--  <div id="wait-div" class="wait-div">
        <div class="wait-divin"> <span style="background: url('/team2/escort/images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                    Please wait    ....</span> </span> </div>
    </div> -->
   
         <?php $base_url = array('controller' => 'users', 'action' => 'escorttours');?>
         <?php echo $this->Form->create("Filter",array('method'=>'post',"id"=>'SearchForm'));?>
         <div class="searchbar">
            
		<ul>
			<li style="width:20%">
                                <?php echo $this->Form->input("name", array('placeholder'=>"Search By Name:",'div'=>false,'label' => false));?>                                                      
				<button class="search"><i class="fa fa-search"></i></button>
			</li>
			<li style="width:15%">
                        <?php echo $this->Form->input("country_id", array('options'=>$showcountry,'div'=>false,'label' => false));?>                                                      
			</li>
                        
			<li style="width:13%">				
                        <?php echo $this->Form->input("city_id", array('options'=>$locationsarray,'empty'=>'Select Location','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:13%">				
                        <?php echo $this->Form->input("nationality_id", array('options'=>$nationalities,'empty'=>'Nationality','div'=>false,'label' => false));?>                                                      
			</li>
                        
                        <li style="width:9%">
                            <?php echo $this->Form->input("age", array('options'=>$agearr,'empty'=>'Select Age','div'=>false,'label' => false));?>                                                      
                        </li>
			
			<li style="width:9%">
                            <?php echo $this->Form->input("gender", array('options'=>$genders,'empty'=>'Gender','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%">
                            <?php echo $this->Form->input("verifieds", array('options'=>$verifieds,'empty'=>'Verified','div'=>false,'label' => false));?>                                                      
			</li>

			
		</ul>
	</div>
        <div class="searchbar">
		<ul>
		       <li >	
                            <?php echo $this->Form->input("service_id", array('options'=>$services,'empty'=>'Service','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("availability_id", array('options'=>$availabilities,'empty'=>'Availability','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("is_show_face", array('options'=>$showing_face,'empty'=>'Showing Face','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:11%">	
                            <?php echo $this->Form->input("height", array('options'=>$heights,'empty'=>'Height','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%;">
                        <?php echo $this->Form->input("haircolor_id", array('options'=>$haircolors,"empty"=>"Hair Color",'div'=>false,'label' => false));?>                                                      
			</li>
                        
			<li style="width:9%;">				
                        <?php echo $this->Form->input("cup_size", array('options'=>$cups,'empty'=>'Size','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style="width:9%;">				
                        <?php echo $this->Form->input("bust_size", array('options'=>$busts,'empty'=>'Bust','div'=>false,'label' => false));?>                                                      
			</li>          
			<li style="width:8%">
                            <button type="submit" class="btn btn-default">Search</button>
			</li>
                        <li style="width:8%">
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo $this->webroot;?>users/escorttours'">Clear</button>
			</li>
		</ul>
	</div>
       <?php echo $this->Form->end();?>
        <div class="col-right" style="float:left;width:200px;margin-right:3px">
                <!--<section class="side-1 extra_search_section">
                                <h3>Escort of the Week</h3>

                                <div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
                                   <?php 
                                        foreach ($showescortofweek as $showshowescortofweek) {
                                           
                                   ?>
                                    <div class="scroll-block extra_search_scroll-block" style="text-align: center;padding: 15px 0; margin: 0 auto;">
                                        <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showshowescortofweek['User']['id']);?>" target="_blank"> 
                                        <img style="width: 175px; height:125px; text-align: center; margin: 0 auto;" src="<?php echo $this->webroot?>user_images/<?php echo $showshowescortofweek['User']['profile_image'];?>">
                                        </a> 
                                         
                                    </div>
                                    <?php }?>
                                </div>

                
                            </section>-->
                <?php
                if(!empty($category))
                {
                ?>
                <section class="side-1 extra_search_section">
                   <h3>Category</h3>
                   <div class="category_boxx">
                       <?php foreach($category as $cat){?>
                       <a href="<?php echo $this->Html->url('/');?>users/escorttours/<?php echo base64_encode($cat['Category']['id']);?>"><?php echo $cat['Category']['name'];?>(<?php echo $cat['Category']['count']?>)</a>
                       <?php }?>
                       
                   </div>
                </section>
                <?php }?>
                
                            
                           <!--<section class="side-1 extra_search_section">
                                <h3>Escort Online Escort</h3>

                                <div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
                                   
                                    <div class="scroll-block extra_search_scroll-block">
                                       <?php 
                                            foreach ($showonline as $showonlineescorts) {
                                               
                                       ?>
                                        <div class="first_part" style="text-align: center; margin: 0 auto; width: 49%; float: left; padding:5px 0;">
                                        <a href="<?php echo $this->webroot ?>escort-details/<?php echo base64_encode($showonlineescorts['User']['id']);?>" target="_blank">
                                            <img style="width: 87px; height:102px; text-align: center; margin: 0 auto;" src="<?php echo $this->webroot?>user_images/<?php echo $showonlineescorts['User']['profile_image'];?>"></a>
                                        </div>
                                       <?php } ?>
                                       </div>
                                    </div>
                             </section>-->

                           
                           <!--<section class="side-1 extra_search_section">
                                <h3>New Escort</h3>

                                <div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
                                   
                                    <div class="scroll-block extra_search_scroll-block">
                                      <?php 
                                        foreach ($shownewescorts as $shoenewescorts) {
                                            # code...
                                        }
                                      ?>  
                                       <div class="first_part" style="text-align: center; margin: 0 auto; width: 49%; float: left; padding:5px 0;">
                                       <a href="<?php echo $this->webroot ?>escort-details/<?php echo base64_encode($shoenewescorts['User']['id']);?>" target="_blank">
                                  <img style="width: 87px; height:102px; text-align: center; margin: 0 auto;" src="<?php echo $this->webroot?>user_images/<?php echo $shoenewescorts['User']['profile_image'];?>">
                                       </a>
                                        </div>
                                    
                                       
                                       </div>
                                         
                                          
                                         
                                    </div>
                                

                
                            </section>-->
                            
                            
            </div>

          <div style=" width:800px;" class="col-left">
                <section id="wrapper">
                    <section id="middle">
                        <section class="all-pins-do">
                            <section class="maintitle" id="searchResult">
                                <div class="full_title_form">
                                        <h1 class="brows_box" style="height: 30px;"> <span style="width: 60%; float:left;">Browse Escorts</span><form action="" method="POST">
                                                <input type="text" id="user_name" placeholder="Search by Name" style="float:right;" value="" name="user_name">
                                        <button><i class="fa fa-search"></i></button>
                                    </form></h1> 
                                     
                                </div>
                                
                                <div class="checkbox_search" style="width: auto; ">
                                    <ul>
                                         <form method="post" id="SearchCheck">
                                        <input type="hidden" value="0" name="offset" id="offset">
                                        <input type="hidden" value="" name="search_name" id="search_name">
                                        <li><input type="checkbox" name="category_id5" value="2" class="searcheck" onclick="ajaxSearch()"/> <span>Diamond</span></li>
<!--                                        <li><input type="checkbox" name="category_id6" value="3" class="searcheck" onclick="ajaxSearch()" /> <span>Gold</span></li>-->
                                        <li><input type="checkbox" name="category_id3" value="8" onclick="ajaxSearch()" /> <span>Non Asian</span></li>
                                        <li><input type="checkbox" name="category_id4" value="7" onclick="ajaxSearch()" /> <span>Asian</span></li>
<!--                                        <li><input type="checkbox" name="category_id7" value="23" class="searcheck" onclick="ajaxSearch()"/> <span>Verified</span></li>-->
                                        <li><input type="checkbox" name="category_id1" value="4" class="searcheck" onclick="ajaxSearch()"  /> <span>Private</span></li>
                                        <li><input type="checkbox" name="category_id2" value="5" class="searcheck" onclick="ajaxSearch()" /> <span>Agency</span></li>
                                        <li><input type="checkbox" name="category_id11" value="6" class="searcheck" onclick="ajaxSearch()" /> <span>Club</span></li>
                                        <li><input type="checkbox" name="category_id8" value="24" onclick="ajaxSearch()"/> <span>With Video</span></li>
                                        <li><input type="checkbox" name="category_id9" value="25" onclick="ajaxSearch()"/> <span>GFE</span></li>
                                        <li><input type="checkbox" name="category_id10" value="26" onclick="ajaxSearch()"/> <span>PSE</span></li>
                                        
                                    </form>

                                </ul>
                                </div>
                                <!-- Here Escorts Filter will shown -->
                                <form class="ajaxform" method="get" id="advance_search_form" accept-charset="utf-8" action="#" style="display:none;">
                                    <div style=" color:#fff;" class="filter-container">
                                        <ul class="select-wrapper fisedr">
                                            <li>
                                                <span class="allallspan">All</span>
                                                <ul class="select-options">
                                                    <li class="bydate"><input type="radio" style="opacity:0" checked="checked" id="all" value="all" name="escorts_show"><label for="all"> All Escorts</label></li>
                                                    <li class="toprated"><input type="radio" style="opacity:0" id="today" value="today" name="escorts_show"><label for="today">Todays Escorts</label></li>
                                                    <li class="toprated"><input type="radio" style="opacity:0" id="new" value="new" name="escorts_show"><label for="new">New Escorts</label></li>
                                                    <li class="toprated"><input type="radio" style="opacity:0" id="tour" value="tour" name="escorts_show"><label for="tour">Travelling Escorts</label></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul style=" color:#fff;" class="select-wrapper">
                                            <li>
                                                <span id="alltimespan" class="allallspan" style="color:#fff;">All Time</span>
                                                <ul class="select-options">
                                                    <li class="alltime"><input type="radio" style="opacity:0" id="all2" value="all" name="escorts_show"><label for="all2">All Time</label></li>
                                                    <li class="thismonth"><input type="radio" style="opacity:0" id="month" value="month" name="escorts_show"><label for="month">This Month</label></li>
                                                    <li class="thisyear"><input type="radio" style="opacity:0" id="year" value="year" name="escorts_show"><label for="year">This Year</label></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="show-filter"><a style="cursor:pointer;">Show Filters</a></div>
                                    <div class="clr"></div>
                                    <div id="show-filter-content">
                                        <div class="filters">

                                            <div class="filter no-left-border" id="sorting-bar">
                                                <span class="title-sor">Sort By:</span>
                                                <div class="list sorting-div">
                                                    <label><input type="checkbox" class="r" value="random" name="sort"> <span>Random</span><div class="clear"></div></label>
                                                    <label><input type="checkbox" class="a" value="Alphabetically" name="sort"> <span class="grey">Alphabetically</span><div class="clear"></div></label>
                                                    <label><input type="checkbox" class="MostViewed" value="mv" name="sort"> <span class="grey">Most Viewed</span><div class="clear"></div></label>
                                                </div>

                                            </div>
                                            <div id="filters_body">
                                                <div class="filter">
                                                    <span class="title-sor grey">Categories</span>
                                                    <div class="list">
                                                        <label><input type="checkbox" class="af_i_1" value="1" name="category_ids[]"> <span class="grey lbl_incall" title="TV/TS">TV/TS </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_i_1" value="2" name="category_ids[]"> <span class="grey lbl_incall" title="Asian Escorts">Asian Escorts </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_i_1" value="3" name="category_ids[]"> <span class="grey lbl_incall" title="Mature Escorts">Mature Esc... </span><div class="clear"></div></label>
                                                    </div>
                                                    <a onclick="changeCategory('category')" class="more change-category" id="a_category">... More »</a>
                                                </div>
                                                <div class="filter">
                                                    <span class="title-sor grey">Services</span>
                                                    <div class="list">
                                                        <label><input type="checkbox" class="af_i_1" value="1" name="service_ids[]"> <span class="grey lbl_incall" title="69 Position">69 Position</span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_i_1" value="2" name="service_ids[]"> <span class="grey lbl_incall" title="Strap on">Strap on</span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_i_1" value="3" name="service_ids[]"> <span class="grey lbl_incall" title="Masturbate">Masturbate</span><div class="clear"></div></label>

                                                    </div>
                                                    <a onclick="changeCategory('service')" class="more change-category" id="a_service">... More »</a>
                                                </div>
                                                <div class="filter">
                                                    <span class="title-sor grey">Availability</span>
                                                    <div class="list">
                                                        <label><input type="checkbox" class="af_i_1" value="Incall" name="availability[]"> <span class="grey lbl_incall" title="Incall">Incall Only </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_i_2" value="Outcall" name="availability[]"> <span class="grey lbl_incall" title="Outcall">Outcall Only </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="af_o_1" value="Incall/Outcall" name="availability[]"> <span class="grey lbl_outcall" title="Incall outcall">Incall outcall </span><div class="clear"></div></label>
                                                    </div>
                                                    <!--        <a id="f_af" class="more">... More »</a> -->
                                                </div>
                                                <div class="filter">
                                                    <span class="title-sor grey">Language</span>

                                                    <div class="list">
                                                        <label><input type="checkbox" class="l_de" value="1" name="language_ids[]"> <span title="Portugues" class="grey">Portugues</span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="l_de" value="2" name="language_ids[]"> <span title="Italiano" class="grey">Italiano</span><div class="clear"></div></label>
                                                    </div>
                                                </div>
                                                <div class="filter">
                                                    <span class="title-sor grey">Ethnicity</span>

                                                    <div class="list">
                                                        <label><input type="checkbox" class="e_1" value="1" name="ethnicity_ids[]"> <span title="Asian" class="grey">Asian </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="e_1" value="2" name="ethnicity_ids[]"> <span title="Black" class="grey">Black </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="e_1" value="4" name="ethnicity_ids[]"> <span title="Mixed" class="grey">Mixed </span><div class="clear"></div></label>
                                                    </div>
                                                    <a onclick="changeCategory('ethnicity')" class="more change-category" id="a_ethnicity">... More »</a>
                                                </div>
                                                <div class="filter">
                                                    <span class="title-sor grey">Age</span>

                                                    <div class="list">
                                                        <label><input type="checkbox" class="a_18-20" value="18" name="age_range"> <span title="18-20" class="grey">18-22 </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="a_21-24" value="23" name="age_range"> <span title="21-24" class="grey">22-26 </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="a_25-29" value="27" name="age_range"> <span title="25-29" class="grey">26-30 </span><div class="clear"></div></label>
                                                    </div>

                                                    <a onclick="changePhisical('age')" class="more change-category" id="f_a">... More »</a>
                                                </div>

                                                <div class="filter">
                                                    <span class="title-sor grey">Gender</span>

                                                    <div class="list">
                                                        <input type="hidden" value="" name="gender">
                                                        <label><input type="checkbox" class="cs_A" value="Female" name="gender"> <span title="Female" class="grey">Female </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="cs_A" value="Male" name="gender"> <span title="Male" class="grey">Male </span><div class="clear"></div></label>
                                                        <label><input type="checkbox" class="cs_A" value="Trans" name="gender"> <span title="Trans" class="grey">Trans </span><div class="clear"></div></label>
                                                    </div>
                                                    <a onclick="changePhisical('gender')" class="more change-category" id="f_cs">... More »</a>
                                                </div>
                                                <div class="filter no-right-border">
                                                    <span class="title-sor ">Physical </span>
                                                    <div class="list">
                                                        <ul id="other_list">
                                                            <li><span onclick="changeCategory('haircolor')" class="grey normal change-category" rel="Weight"><i class="fa fa-angle-right"></i>Hair Color </span></li>
                                                            <li><span onclick="changeCategory('eyecolor')" class="grey normal change-category" rel="Eye color"><i class="fa fa-angle-right"></i> Eye Color</span></li>
                                                            <li><span onclick="changePhisical('weight')" class="grey normal change-category" rel="Smoker"><i class="fa fa-angle-right"></i>Weight </span></li>
                                                            <li><span onclick="changePhisical('height')" class="grey normal change-category" rel="Nationality"><i class="fa fa-angle-right"></i>Height </span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div style="display: none;background-color:#ffffff;margin-top:20px;" id="change-divcontent">
                                                    <div style="float:right;cursor:pointer" class="change-category close_div"><i class="fa fa-times fa-fw"></i></div>
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
                                            <div style="margin-top: -10px;display:none;" class="sub-search">
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-real-pics">
                                                        <span><input type="checkbox" value="Yes" id="real-pics" name="premium"></span></div>
                                                    <label for="real-pics" class="lbl-inn an real-photos">Premium  </label>
                                                </div>
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-verified-contact"><span>
                                                            <input type="checkbox" value="Yes" id="verified-contact" name="verified"></span></div>
                                                    <label for="verified-contact" class="lbl-inn an verified-contact">Verified</label>
                                                </div>
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-with-video"><span class="mooniform-checked">
                                                            <input type="checkbox" value="Yes" id="with-video" name="video"></span></div>
                                                    <label for="with-video" class="lbl-inn an with-video">With Video</label>
                                                </div>
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-pornstar"><span>
                                                            <input type="checkbox" value="Yes" id="pornstar" name="pornstar"></span></div>
                                                    <label for="pornstar" class="lbl-inn an pornstar">Pornstar</label>
                                                </div>
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-online"><span>
                                                            <input type="checkbox" value="Yes" id="online" name="online"></span></div>
                                                    <label for="online" class="lbl-inn an online2">Online</label>
                                                </div>
                                                <div class="inner">
                                                    <div class="mooniform-checker" id="mooniform-pornstar"><span>
                                                            <input type="checkbox" value="Yes" id="social" name="social_escort"></span></div>
                                                    <label for="social" class="lbl-inn an social">Social Escorts</label>
                                                </div>
                                                <div class="clr"></div>
                                            </div>

                                            <div class="clr"></div>
                                        </section>
                                    </section>
                                </form>
                            </section>
                            <section id="content">
                                    <?php  if(!empty($escorttours)){?>
                                    <div class="transitions-enabled centered clearfix" id="container">
                                        <div id="display_result"> 
                                            <?php
                                             foreach($escorttours as $lists){
                                                    $date =  date('Y',strtotime($lists['User']['birthday']));
                                                    $age=date('Y')-$date;   
                                            ?>
                                            <?php
                                            if(!empty($lists['User']['profile_image']))
                                            {
                                            ?>
                                            <div style="cursor:pointer;margin:15px 2px; width:24.15%;  
                                                 background: url('<?php echo $this->webroot; ?>user_images/<?php echo $lists['User']['profile_image']; ?>'); "
                                                 onclick="redirect_detaiils('<?php echo base64_encode($lists['User']['id']);?>')"
                                                 class="pin_d box online-girl">
                                            <?php }else{?>
                                            <div style="cursor:pointer;margin:15px 2px; width:24.15%;  background: url('<?php echo $this->webroot;?>noimage.png'); " class="pin_d box online-girl"
                                            onclick="redirect_detaiils('<?php echo base64_encode($lists['User']['id']);?>')"

                                            >
                                            <?php }?>   
                                                <div class="pin_d_inner">
                                                    <a href="<?php echo $this->webroot; ?>escort-details/<?php echo base64_encode($lists['User']['id']); ?>"> 
                                                        <div class="all-c-badge">
                                                            <img alt="" title="Verified" src="<?php echo $this->webroot; ?>images/verified.png">
                                                            <img alt="" title="Videos" src="<?php echo $this->webroot; ?>images/video-ic.png">
                                                            <img alt="" title="Online" src="<?php echo $this->webroot; ?>images/online.png">
                                                        </div> 
                                                    </a>     
                                                    <div class="overlay-pic">
                                                        <div class="country_box">
                                                            <img width="30px" height="autoo" src="<?php echo $this->webroot; ?>images/en-flag.png" alt="Escorts">
                                                            <span><?php echo $this->requestAction("/users/location/".$lists["User"]["city_id"]); ?></span>
                                                        </div>
                                                        <div class="overlay-pic-inner">
                                                            <h3> <span style="float:left;"><?php echo $lists["User"]["name"]; ?></span> <span style="float:right;"></span>
                                                                <div class="clr"></div>
                                                            </h3>
                                                            <ul>
                                                                <li> 
                                                                    <span class="t1">Age : <?php echo $age; ?> yrs </span><span class="t2"></span>
                                                                    <div class="clr"></div>
                                                                </li>
                                                                <li> <span class="t3"> Rates : <?php if(!empty($lists['Rate'][0]['30min_incall'])){echo '&#128;'.$lists['Rate'][0]['30min_incall'];}else{echo 'No rate';} ?>  </span> 
                                                                <span style="display:none;" class="t231">
                                                                    <img title="4 Votes" style="vertical-align:text-bottom;" alt="" src="<?php echo $this->webroot; ?>images/thumbs_up.png">
                                                                    </span>
                                                                    <span id="showliked"></span>
                                                                    <div class="clr"></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                             <?php }?>
                                        </div>
                                        <div class="paging" id="pagination" style=" margin-left:15px; text-align:left;">
                                        <?php
                                        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                        echo $this->Paginator->numbers(array('separator' => ''));
                                        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                        ?>
                                        </div> 
                                    </div> 
                                    <?php }else{ ?>
<!--                                <div  class="no-record">-->
                                        <h1>No Escort Found</h1>          
<!--                                </div>-->
                                    <?php }?>
                                <div style="text-align:-moz-center;" class="morebox" id="more2"> <a style="display:none;" id="2" class="buttonGrey load-more-list" href="javascript:;"> Load More Escorts </a> </div>
                                <nav id="page-nav"> <a href="#"></a> </nav>
                                <section class="clr">
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </div>

        <div class="col-right" style="width:200px;">
            <section class="side-1 extra_search_section">
                            <h3>Escort of the day</h3>
                            <div class="pin_d box online-girl escort-of-day" style="margin:0;height:350px;width:99%; background: url('/newver/user_images/profile_img_53.jpg'); margin-bottom:20px">
                                   <div class="pin_d_inner">
                                    <a href="/newver/escort-details/NTM="> 
                                    <div class="all-c-badge">

                                        <img src="<?php echo $this->webroot; ?>images/verified.png" title="Verified" alt="">
                                        <img src="<?php echo $this->webroot; ?>images/video-ic.png" title="Videos" alt="">
                                        <img src="<?php echo $this->webroot; ?>images/online.png" title="Online" alt="">
                                    
                                    </div> 
                                    </a>   
                                    <div class="overlay-pic">
                                        <div class="country_box">
                                            <img alt="Escorts" src="<?php echo $this->webroot; ?>images/en-flag.png" width="30px" height="autoo">
                                            <span>Waimate</span>
                                        </div>
                                        <div class="overlay-pic-inner">
                                            <h3> <span style="float:left;">
                                                    <!-- Patty --> test                     </span> <span style="float:right;"> </span>
                                                <div class="clr"></div>
                                            </h3>
                                                                                                <ul>
                                                <li> <span class="t1">
                                                        Age                        :
                                                        27 yrs                        </span><span class="t2">
                                                        </span>
                                                    <div class="clr"></div>
                                                </li>
                                                <li> <span class="t3">
                                                        Rates                        :
                                                        From  No rate                        </span> 

                                                    <span class="t253" style="display:none;">
                                                                                                                        <a href="javascript:void(0);" class="pull-right" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                    return false;">
                                                        
                                                                <img src="/newver/images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"></a>
                                                    </span>
                                                    <span id="showliked"></span>
                                                    <div class="clr"></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <h3>Featured Escorts</h3>

                            <!--<div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
                               
                                <div class="scroll-block extra_search_scroll-block">
                                 <?php 
                                    foreach ($showfeature as $showfeatured) {
                                     
                                 ?>  
                                <div class="first_part" style="text-align: center; margin: 0 auto; width: 49%; float: left; padding:5px 0;">
                                <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showfeatured['User']['id']);?>" target="_blank">    
                                <img style="width: 87px; height:102px; text-align: center; margin: 0 auto;" src="<?php echo $this->webroot?>user_images/<?php echo $showfeatured['User']['profile_image'];?>">
                                </a>
                                </div>
                                <?php } ?>
                                   </div>
                                 
                                </div>-->
                                <ul class="feature_box">
                                    <?php 
                                    foreach ($showfeature as $showfeatured) {
                                     
                                    ?>  
                                    <li><a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showfeatured['User']['id']);?>" target="_blank"><img  src="<?php echo $this->webroot?>user_images/<?php echo $showfeatured['User']['profile_image'];?>" style=" height:100px; width:100px;"></a></li>
                                    <?php }
                                    ?>
                                </ul>
                                <br/>
                                <?php
    if(!empty($all_adds))
    {
    ?>
            <section id="banners" style="background: rgba(0, 0, 0, 0) none repeat scroll 0 0;width:100%;box-sizing: border-box;">
    <?php
    foreach ($all_adds as $ad)
    {
    ?>
        <a class="banner200x333 promo" href="#" style="background: #ff6099 url('<?php echo $this->webroot;?>advertisement/<?php echo $ad['Advertisement']['image']?>') no-repeat scroll 0 0;width:100%;background-size: cover;">
            
        </a>
    <?php } ?>    
    </section>
    <?php } ?>
                        
                        </section>
        </div>  
   
   

   
</section>
<script>
$(document).ready(function(){
$("#user_name").keyup(function(){
$("#search_name").attr("value",$(this).val());
ajaxSearch();
});    
});    
function ajaxSearch()
{
    $.post("<?php echo $this->Html->url('/'); ?>users/ajax_searchtour", $("#SearchCheck, #SearchForm").serialize(), function(msg){
    $("#display_result").html(msg);
    var offset=$("#offset").val();
    offset=offset+4;
    $("#offset").attr("value",offset);
    $("#page_counter").hide();
    $("#pagination").hide();
    
    });

}




</script>
<script>
function redirect_detaiils(id)
{
    location.href='<?php echo $this->Html->url('/');?>escort-details/'+id;
}    
</script> 

<style>
 .checkbox_search ul li {
    padding: 0 4px;
}
.escort-of-day ul, .escort-of-day h3 {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
}
.escort-of-day ul li {
    border: 0 none;
}
.escort-of-day h3 {
    line-height: 20px;
    padding-left: 0;
}   
</style>    
