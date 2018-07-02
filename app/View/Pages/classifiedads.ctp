<?php
//echo "<pre>";
//print_r($clissfieddata);exit;
?>

                <section id="contentsection" class="container">
                    <div class="col-left">
                        <section id="classified">
                            <section id="middle">
                                <section id="middle-inner">

                                    <section class="all-pins-do">
                                        <div class="directoryEscortHeading p-2 mb-4 mt-4">
					                        <h2 class="mb-0">Classified Ads</h2>
					                    </div>
                                        <div class="in-content">
                                        	<div class="row">
                                        		<div class="col-lg-8">
                                            		<section class="dt-content-blogs  clas-fhyt-fhty">
                                                <?php 
                                                    foreach ($clissfieddata as $key => $value) {
                                                        
                                                ?>   
                                                <article class="post clearfix row classifiedAds">
                                                    <div class="col-lg-4">
                                                    	<span class="post-thumbnail pull-left rounded">
                                                        <img alt="thedirectory" src="<?php echo $this->webroot ?>job_images/<?php echo $value['Classified']['image'];?>" class="img-fluid">
                                                    </span>
                                                    </div>
                                                   
                                                    <div class="col-lg-12">
                                                    	<div class="entry-content pull-left">
                                                        <h2 class="entry-title"><a href="javascript:void(0);" style="outline: medium none;"><?php echo $value['Classified']['name'];?></a></h2>
                                                        <span class="entry-date" style="border:none;color:#fdc925">Location : New Zealand,Orewa</span><br/>
                                                        <p class="blog_description_div"><?php echo substr($value['Classified']['description'],0,100);?></p> 
                                                    </div>
                                                    </div>
                                                </article>
                                                <?php } ?>
                                            </section>
												</div>
                                           		<div class="col-lg-4">
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
												</div>
                                            </div>
                                        </div>
                                        <section class="clearfix">
                                            <div class="post-pagination mt-4" style="float:left">
                                            	<ul class="pagination">
                                            	<li class="page-item"><a style="outline: medium none;" class="page-link"> Prev</a></li>
                                            	<li class="page-item"><a class="page-link" href="#">1</a></li>
                                            	<li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                            </div>
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