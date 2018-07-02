<?php
//echo "<pre>";
//print_r($clissfieddata);exit;
?>
<?php echo $this->element("banner");?>

                <section id="contentsection">
                    <?php echo $this->element("carousel_slider");?>

                    <!-- <div id="wait-div" class="wait-div">
                        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                                    Please wait    ....</span> </span> </div>
                    </div> -->

                    <div class="col-left">
                        <section id="wrapper">
                            <section id="middle">
                                <section id="middle-inner">

                                    <section class="all-pins-do">
                                        <div class="detail-heading" style="padding: 0 5px;"><h2 class="title">Classified Ads</h2></div>
                                        <div class="in-content">
                                            <section class="dt-content-blogs  clas-fhyt-fhty" style="width: 570px;">
                                                <?php 
                                                    foreach ($clissfieddata as $key => $value) {
                                                        
                                                ?>   
                                                <article class="post clearfix">
                                                    <span class="post-thumbnail pull-left rounded">
                                                        <img alt="thedirectory" src="<?php echo $this->webroot ?>job_images/<?php echo $value['Classified']['image'];?>">
                                                    </span>
                                                   <!-- <div class="entry-meta">
                                                    <span class="entry-date" style="border:none">Location : United Kingdom,Bristol</span>

                                                    <span class="cat-links last"> in <a rel="category tag" title="View all posts in Events" href="#" style="outline: medium none;">Events</a></span>  
                                                    </div>-->
                                                    <div class="entry-content pull-left">
                                                        <h2 class="entry-title"><a href="javascript:void(0);" style="outline: medium none;"><?php echo $value['Classified']['name'];?></a></h2>
                                                        <span class="entry-date" style="border:none;color:#b225b5">Location : New Zealand,Orewa</span><br/>
                                                        <p class="blog_description_div"><?php echo substr($value['Classified']['description'],0,100);?></p> 
                                                    </div>
<!--                                                    <section class="entry-meta clearfix">
                                                        <a class="btn-transparent" href="javascript:void(0);" style="outline: medium none;"><span>View detail</span></a>
                                                   
                                                    </section>-->
                                                    <section class="clr"></section>
                                                </article>
                                                <?php } ?>
                                            </section>

                                           
                                            <section class="dt-content-blogs-right">
                                                <section class="dt-content-blogs-right-inner">
<!--                                                    <div class="widget widget-search">
                                                        <h3 class="widget-title">Quick Search</h3>
                                                        <form method="get" id="searchform">
                                                            <div class="field-text buttoned">
                                                                <input type="text" id="search_key" value="" name="keyword" placeholder="ENTER KEYWORD" hidefocus="true" style="outline: medium none;">
                                                                 <button type="button" onClick="javascript:makesearchurl();"><i class="fa fa-arrow-right"></i></button> 

                                                                <button type="button"><i class="fa fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>-->
                                                    <div class="widget widget-freshpost">
                                                        <!-- <h3 class="widget-title">Select Category</h3>
                                                        <ul class="side-postlist">
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Masseurs</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Bodyguards</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Cleaners</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Film Makers</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Medical & Counselling</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Photographers</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>1</strong><span>Strippers</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Video Editing</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Cleaners</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Kissograms</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Models Available</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Photoshoot Locations</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Support Networks</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>1</strong><span>Website Designers</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Computer Repairs</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Legal/Financial Services</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Models Wanted</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Receptionists</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Telecomms Services</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Costumes</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Make Up & Hairstylists</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Parties & Club Events</span></a></li>
                                                            <li><a href="javascript:void(0);" hidefocus="true" style="outline: medium none;"><strong>0</strong><span>Retailer</span></a></li>
                                                        </ul> -->

                                                         <h3>Category</h3>
           <div class="category_boxx">
            <?php
            foreach ($classify_cats as $classify_cat)
            {
            ?>
               <a href="<?php echo $this->webroot; ?>classified-ads/<?php echo base64_encode($classify_cat["id"]) ?>"><?php echo $classify_cat["name"] ?>(<?php echo $classify_cat["count"] ?>)</a>
               
            <?php } ?>    
           </div>
                                                    </div>
                                                </section>
                                            </section>
                                            <div class="clr"></div>
                                        </div>
                                        <section class="clearfix">
                                            <div class="post-pagination" style="float:left"><p><a style="outline: medium none;"> Prev</a><span class="current" style="margin: 0 5px 7px 0;">1</span><a style="outline: medium none;">  Next</a></p></div>                                                            <section class="clr"></section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </div>
                     <div class="col-right">
                     <?php echo $this->element('user_banner');?>    
                    </div>
                </section>
                <div class="clr"></div>