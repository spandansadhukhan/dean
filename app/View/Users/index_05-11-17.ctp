<?php ?>
<section id="banner-part">
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
<?php /*
            if(!empty($escortslider)){
                foreach ($escortslider as $showslider) {
                    # code...
        ?>
        <li><img src="<?php echo  $this->webroot ?>user_images/<?php echo $showslider['User']['profile_image'];?>"></li>
        <?php }} */?>
</section>
<!-- <section id="banner-part"> 

    <ul class="bxslider">
        <li><img src="<?php echo  $this->Html->url('/') ?>images/banner1.jpg"></li>
        <li><img src="<?php echo  $this->Html->url('/') ?>images/banner1.jpg"></li>
        <li><img src="<?php echo  $this->Html->url('/') ?>images/banner1.jpg"></li>
    </ul>

</section> -->

<ul class="side-menu">
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>onlineescorts">Online Escorts</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
    <!-- <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>latest-status">Latest Statuses</a></li> -->
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
        <ul>
            <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>all-faq">All FAQ</a> </li>
            <li style="top: 100%;"> <a href="<?php echo $this->Html->url('/');?>general-faq">General FAQs</a> </li>
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
    <ul class="clear">
        <li> <a href="<?php echo $this->Html->url('/');?>online-escorts">Online Escorts</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>escort-reviews">Escort Reviews</a></li>
       <!--  <li> <a href="<?php echo $this->Html->url('/');?>latest-status">Latest Statuses</a></li> -->
        <li> <a href="<?php echo $this->Html->url('/');?>happy-hours">Happy Hours</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQ</a>
            <ul>
                <!-- <li><a href="<?php echo $this->Html->url('/');?>allfaq">All FAQ</a></li> -->
                <li> <a href="<?php echo $this->Html->url('/');?>faq">FAQs</a></li>
                <li><a href="<?php echo $this->Html->url('/');?>general-faq">General FAQs</a></li>
            </ul>
        </li>
        <li> <a href="<?php echo $this->webroot ?>pages/blog">Blogs</a></li>
        <li> <a href="<?php echo $this->webroot ?>classified-ads">Classified Ads</a></li>
        <li> <a href="<?php echo $this->webroot ?>pages/workrooms">Work Rooms</a></li>
        <li> <a href="<?php echo $this->Html->url('/');?>contacts">Contact Us</a></li>
    </ul>
</section>

<section id="contentsection">
	<div id="carousel-example-generic" class="carousel slide add_slider" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add.png" alt="" />
	    </div>
	    <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-2.png" alt="" />
	    </div>
        <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-3.png" alt="" />
	    </div>
        <div class="item">
	      <img src="<?php echo  $this->Html->url('/') ?>images/add-4.png" alt="" />
	    </div>
	  </div>
	</div>
         <?php $base_url = array('controller' => 'users', 'action' => 'index');?>
         <?php echo $this->Form->create("Filter",array('method'=>'post','url'=>$base_url,"id"=>'SearchForm'));?>
         <div class="searchbar">
            
		<ul>
			<li style="width:20%">
<!--				<input type="text" placeholder="Search By Name:"/>-->
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

			
		</ul>
	</div>
        <div class="searchbar">
            
		<ul>
		       <li >	
                            <?php echo $this->Form->input("service_id", array('options'=>$services,'empty'=>'Service','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:13%">	
                            <?php echo $this->Form->input("availability_id", array('options'=>$availabilities,'empty'=>'Availability','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:13%">	
                            <?php echo $this->Form->input("is_show_face", array('options'=>$showing_face,'empty'=>'Showing Face','div'=>false,'label' => false));?>                                                      
			</li>
                        <li style=" width:7%">	
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
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo $this->webroot;?>'">Clear</button>
			</li>
		</ul>
	</div>
       <?php echo $this->Form->end();?>

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
               <!-- <section class="col-left-l">
                    <section class="side-1 extra_search_section">
                        <h3>Location :</h3>

                        <div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
                           
                            <div class="scroll-block extra_search_scroll-block">
                                
                                 <div class="form-group search_first">
								    <label for="exampleSelect1"><section class="curr-coun1"><h4>Escorts In</h4></section></label>
								    <select class="form-control" id="location">
                                         <option>Select Location</option>  
                                      <?php 
                                            foreach ($locationsarray as $showlocaton) {
                                      ?>        
                                     
                                        <option value="<?php echo $showlocaton['Location']['id'] ?>"><?php echo $showlocaton['Location']['name'] ?></option>


                                      <?php              
                                            }
                                      ?>  
								    </select>
								  </div>
								  
								   <div class="form-group search_first">
								    <label for="exampleSelect1"><section class="curr-coun1"><h4>Sub Area</h4></section></label>
								    <select class="form-control" id="exampleSelect1">
                                      <option>Select SubUrbs</option>  
								      <?php 
                                            foreach ($surubsarrays as $showsuburbs) {
                                      ?>
                                      
                                        <option value="<?php echo $showsuburbs['Suburb']['id']; ?>"><?php echo $showsuburbs['Suburb']['name']; ?></option>


                                      <?php       
                                            }
                                      ?>
								    </select>
								  
								
                            </div>
                        </div>
                        
                        <section class="side-1 new_cat_side">
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
                                            <a href="<?php echo $this->webroot?>pages/onlineescorts/<?php echo base64_encode($showescortcat['Category']['id']); ?>" ><?php echo $showescortcat['Category']['name']; ?></a>
                                        </li>
                                        <?php 
                                            }
                                        ?>  
                                        <section class="clr"></section>
                                    </ul>
                                </div>
                            </div>
                            <div class="bigstrip"><center><img alt="" src="<?=$this->Html->url('/')?>images/arrow2-new.png"></center></div>
                             <section id="banners" class="in_banner_id">
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
                </section>            
                            
                            
                            
                        </section>
                        
                       
           
           
      
        
        
                    </section>
                </section>-->
                <!-- Escort Left end ---->
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <section id="searchResult" class="maintitle">
                        	<div class="full_title_form">
                            <h1 style="height: 30px;" class="brows_box"> <span style="width: 60%; float:left;">Browse Escorts</span><form method="POST" action="<?php echo $this->webroot?>users/index">
	                                <input type="text" name="user_name" value="<?php if(isset($this->request->data['user_name']))echo $this->request->data['user_name'];?>" style="float:right;" placeholder="Search by Name">
	                                <button><i class="fa fa-search"></i></button>
	                            </form></h1> 
	                             
                            </div>
                            
                            <div class="checkbox_search">
                            	<ul>
                                    <form method="post" id="SearchCheck">
                                        <input type="hidden" value="0" name="offset" id="offset">
                                        <li><input type="checkbox" name="membership_id[]" value="3" class="searcheck" onclick="ajaxSearch()"/> <span>DIAMOND</span></li>
                                        <li><input type="checkbox" name="membership_id[]" value="2" class="searcheck" onclick="ajaxSearch()" /> <span>GOLD</span></li>
                                        <li><input type="checkbox" name="is_active" value="1" class="searcheck" onclick="ajaxSearch()"/> <span>Verified</span></li>
                                        <li><input type="checkbox" name="category_id1" value="4" class="searcheck" onclick="ajaxSearch()"  /> <span>Private</span></li>
                                        <li><input type="checkbox" name="category_id2" value="5" class="searcheck" onclick="ajaxSearch()" /> <span>Agency Club</span></li>
                                        <li><input type="checkbox" name="video" value="1" onclick="ajaxSearch()"/> <span>With Video</span></li>
                                        <li><input type="checkbox" /> <span>GFE</span></li>
                                        <li><input type="checkbox" /> <span>PSE</span></li>
                                        <li><input type="checkbox" name="category_id3" value="8" onclick="ajaxSearch()" /> <span>Non Asian</span></li>
                                        <li><input type="checkbox" name="category_id4" value="7" onclick="ajaxSearch()" /> <span>Asian</span></li>
                                    </form>

                            </ul>
                            </div>
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
                                                <!--		<a id="f_af" class="more">... More »</a> -->
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
                           
                                <!-- <div style="position: absolute; top: 0px; left: 0px;" class="pin_d box online-girl masonry-brick"> -->
                                <div id="container" class="transitions-enabled centered clearfix">
                                    <div id="display_result">    
                                        <?php 
                                      //pr($escorts); exit;

                                          if(!empty($escorts)){  
                                           foreach ($escorts as $showescortsdata) { 
                                            if($showescortsdata['User']['profile_image'] != ''){
                                        ?>
                                    <div class="pin_d box online-girl" style="background: url('<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['User']['profile_image'];?>')">
                                    
                                    <?php } 
                                    else { ?>
                                    <div class="pin_d box online-girl" style="background: url('<?php echo  $this->webroot; ?>noimage.png')">
                                    <?php } ?>
                                        <div class="pin_d_inner">
                                            <a href="<?php echo $this->Html->url('/');?>escort-details/<?php echo base64_encode($showescortsdata['User']['id']);?>"> 
                                            <div class="all-c-badge">

                                                <img src="<?php echo  $this->Html->url('/') ?>images/verified.png" title="Verified" alt="" />
                                                <img src="<?php echo  $this->Html->url('/') ?>images/video-ic.png" title="Videos" alt="" />
                                                <img src="<?php echo  $this->Html->url('/') ?>images/online.png" title="Online" alt=""  />
                                            
                                            </div> 
                                            </a>     
                                          
                                           
                                            
                                            
                                            <div class="overlay-pic">
                                            	<div class="country_box">
                                            		<img alt="Escorts" src="<?php echo  $this->Html->url('/') ?>images/en-flag.png" width="30px" height="autoo">
                                            		<span>Waimate</span>
                                            	</div>
                                                <div class="overlay-pic-inner">
                                                    <h3> <span style="float:left;">
                                                            <!-- Patty --> <?php echo $showescortsdata['User']['name']; ?>                     </span> <span style="float:right;"> </span>
                                                        <div class="clr"></div>
                                                    </h3>
                                                    <?php  
                                                    $date =  date('Y',strtotime($showescortsdata['User']['birthday']));
                                                    $age=date('Y')-$date;
                                                    ?>
                                                    <ul>
                                                        <li> <span class="t1">
                                                                Age                        :
                                                                <?php echo $age; ?> yrs                        </span><span class="t2">
                                                                </span>
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
                                                                    <a href="javascript:void(0);" class="pull-right" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                            return false;">
                                                            <?php }?>    
                                                                        <img src="<?php echo  $this->Html->url('/') ?>images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"  /></a>
                                                            </span>
                                                            <span id="showliked"></span>
                                                            <div class="clr"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    		
                                <?php 
                                    }

                                }else{
                                  echo '<h2 style="color:#fff">No results found</h2>';  

                                } ?>
                                </div>
                       </div>         
      

                            <p id="page_counter"><?php echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>    </p>
                            <div class="paging" id="pagination">
                            <?php
                            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                            echo $this->Paginator->numbers(array('separator' => ''));
                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                                <!--   </div> -->

                            </div>
                            <div class="no-record" style="display:none">
                                No Escort Found          </div>
                            <div id="more2" class="morebox" style="text-align:-moz-center;"> <a href="javascript:;" class="buttonGrey load-more-list" id="2"  style="display:none;">
                                    Load More Escorts            </a> </div>
                            <nav id="page-nav"> <a href="#"></a> </nav>
                            <section class="clr">
                                
                            </section>
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

		<section class="side-1 extra_search_section">
           <h3>Category</h3>
           <div class="category_boxx">
           <?php //print_r($category);?>
           <!--<a href="<?php echo $this->Html->url('/');?>escort-details/<?php echo base64_encode($showescortsdata['User']['id']);?>">-->
           <?php if($category_wise_escorts){foreach(
                   
                   $category_wise_escorts as $cat){
                   //pr($cat) ;exit;
               
               
               ?>
               <a href="<?php echo $this->webroot;?>users/index/<?php echo base64_encode($cat['id']);?>"><?php echo $cat['name'];?>(<?php echo $cat['count'];?>)</a>
           <?php }} ?>
<!--               <script>
                function assignCat(Cat)
            {
                $("#category").attr("value",Cat);
                $("#SearchForm").submit();
            }
                </script>-->
				<!--<a href="">TV/TS (4)</a>
				<a href="">Asian Escorts (8)</a>
				<a href="">Mature Escorts (11)</a>
				<a href="">Latino Escorts (14)</a>
				<a href="">High Class (20)</a>
				<a href="">Fetish Escorts (11)</a>
				<a href="">English Escorts (9)</a>
				<a href="">Busty Escorts (9)</a>
				<a href="">Brunette Escorts (5)</a>
				<a href="">Mistress/Dominatrix (9)</a>
				<a href="">Black Escorts (8)</a>
				<a href="">MTF Transgender Escorts (0)</a>-->
           </div>
        </section>z<br/>
		<section class="side-1 extra_search_section">
                        <h3>Featured Escort</h3>

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
								<li><a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showfeatured['User']['id']);?>" target="_blank"><img  src="<?php echo $this->webroot?>user_images/<?php echo $showfeatured['User']['profile_image'];?>"></a></li>
								<?php }
								?>
							</ul>
                    </section>
                    
                    
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
</section>
<div class="clr"></div>
<script>
function ajaxSearch()
{
    $.post("<?php echo $this->Html->url('/'); ?>users/ajax_search", $("#SearchCheck").serialize(), function(msg){
    $("#display_result").html(msg);
    var offset=$("#offset").val();
    offset=offset+4;
    $("#offset").attr("value",offset);
    $("#page_counter").hide();
    $("#pagination").hide();
    
    });

}




</script>
<style>
    .checkbox_search ul li{
         padding:0 4px !important;
    }
</style>
