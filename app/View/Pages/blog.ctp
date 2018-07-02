<?php 
    //pr($allblogs); exit;
?>
                <section id="contentsection" class="container">
                    <div class="col-left">
                    <div class="directoryEscortHeading p-2 mb-4 mt-4">
                        <h2 class="mb-0">Blog</h2>
                    </div>
                        <section id="blogPart">
                            <section id="middle" style="background: #fff;" class="middle-parts">
                                <section id="middle-inner">

                                    <section class="all-pins-do">
                                        <div class="in-content">
                                            <section class="dt-content-blogs  clas-fhyt-fhty" style="width: 100%;">
                                                <?php 
                                                    foreach ($allblogs as $showblogs) {
                                                       
                                                ?>    

                                                <article class="post clearfix">
                                                	<div class="row">
                                                    <div class="col-lg-4">
                                                    	<span class="post-thumbnail pull-left rounded">
                                                        <?php if($showblogs['Blog']['image'] != ''){ ?>
                                                        <img alt="" src="<?php echo $this->webroot ?>blog_images/<?php echo $showblogs['Blog']['image']?>" class="img-fluid">
                                                        <?php }else{?>
                                                        <img alt="" src="<?php echo $this->webroot ?>noimage.png" class="img-fluid">
                                                        <?php }?>
                                                    </span>
                                                    </div>
                                                    <div class="col-lg-8">
                                                    	<div class="entry-content">
                                                        <h2 class="entry-title blog-heading"><a href="javascript:void(0);" style="outline: medium none;"><?php echo $showblogs['Blog']['name']?></a></h2>
                                                        
                                                        <span class="entry-date" style="border:none; Color:#000;">Posted on : <span style="color:#000"><?php $posted_date = strtotime($showblogs['Blog']['post_date']); 
                                                            echo date('Y-m-d', $posted_date);
                                                        ?></span></span><br/>
                                                         <p class="blog_description_div">
                                                            <?php $blog_content = strip_tags($showblogs['Blog']['contaent']);
                                                                   echo substr($blog_content, 0,100); 
                                                             ?>

                                                         </p>
                                                       <p>
                                                        <a class="btn btn-small btn-primary" href="<?php echo $this->webroot ?>pages/blog_details/<?php echo base64_encode($showblogs['Blog']['id'])?>" style="outline: medium none;"><span>View detail</span></a>
                                                    </p>
                                                   
                                                    </div>
                                                    </div>
                                                </article>
                                                <?php } ?>
												<!-- <article class="post clearfix">
                                                    <span class="post-thumbnail pull-left rounded">
                                                        <img alt="" src="http://107.170.152.166/team2/escort/images/o_1a3gpn5sr2je13u4fmk18a9oc2a1447133392-400x575.jpg">
                                                    </span>
                                                    <div class="entry-meta">
                                                                                    
                                                    </div>
                                                    <div class="entry-content">
                                                        <h2 class="entry-title"><a href="javascript:void(0);" style="outline: medium none;">Grade A Strippers</a></h2>
                                                        <span class="entry-date" style="border:none;color:#b225b5">Location : New Zealand,Orewa</span><br/>
                                                        <span class="entry-date" style="border:none;color:#000;">Posted on : <span style="color:#000">29.08.1988</span></span><br/>
                                                        <p class="blog_description_div">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    </div>
                                                    <section class="entry-meta clearfix">
                                                        <a class="btn btn-small btn-transparent" href="#" style="outline: medium none;"><span>View detail</span></a>
                                                    
                                                    </section>
                                                    <section class="clr"></section>
                                                </article>
                                                
                                                <article class="post clearfix">
                                                    <span class="post-thumbnail pull-left rounded">
                                                        <img alt="" src="http://107.170.152.166/team2/escort/images/o_1a3gpn5sr2je13u4fmk18a9oc2a1447133392-400x575.jpg">
                                                    </span>
                                                    <div class="entry-meta">
                                                                                    
                                                    </div>
                                                    <div class="entry-content">
                                                        <h2 class="entry-title"><a href="javascript:void(0);" style="outline: medium none;">Grade A Strippers</a></h2>
                                                        <span class="entry-date" style="border:none;color:#b225b5">Location : New Zealand,Orewa</span><br/>
                                                        <span class="entry-date" style="border:none; color:#000">Posted on : <span style="color:#000">29.08.1988</span></span><br/>
                                                        <p class="blog_description_div">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    </div>
                                                    <section class="entry-meta clearfix">
                                                        <a class="btn btn-small btn-transparent" href="#" style="outline: medium none;"><span>View detail</span></a>
                                                    
                                                    </section>
                                                    <section class="clr"></section>
                                                </article> -->
                                              
                                            </section>

                                           
                                         
                                            <div class="clr"></div>
                                        </div>
                                        <section class="clearfix">
                                            <div class="post-pagination mt-3">
                                            <ul class="pagination">
                                            	<li class="page-item"><a style="outline: medium none;" class="page-link"> Prev</a></li>
                                            	<li class="page-item"><a class="page-link" href="#">1</a></li>
                                            	<li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </div>
                                        <section class="clr"></section>
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </div>
                     <div class="col-right">
                         <?php echo $this->element("user_banner");?>
                    </div>
                </section>
                <div class="clr"></div>
                <style>
                	.entry-content p {color:#3e3e3e;}
                	.dt-content-blogs a { color: #3e3e3e;}
                	.post{padding: 20px 0; border-bottom: 1px solid #e1dfdb;}
                </style>