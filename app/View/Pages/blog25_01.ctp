<?php 
    //pr($allblogs); exit;
?>
<?php echo $this->element("banner");?>
                <section id="contentsection">
                <?php echo $this->element("carousel_slider");?>
                    <!-- <div id="wait-div" class="wait-div">
                        <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
                                    Please wait    ....</span> </span> </div>
                    </div> -->
                    <div class="col-left">
                    <div class="detail-heading" style="padding: 0 5px;"><h2 class="title">Blogs</h2></div>
                        <section id="wrapper">
                            <section id="middle" style="background: #fff;">
                                <section id="middle-inner">

                                    <section class="all-pins-do">
                                        <h2 class="title">The Directory Blog</h2>
                                        <div class="in-content">
                                            <section class="dt-content-blogs  clas-fhyt-fhty" style="width: 100%;">
                                                <?php 
                                                    foreach ($allblogs as $showblogs) {
                                                       
                                                ?>    

                                                <article class="post clearfix">
                                                    <span class="post-thumbnail pull-left rounded">
                                                        <?php if($showblogs['Blog']['image'] != ''){ ?>
                                                        <img alt="" src="<?php echo $this->webroot ?>blog_images/<?php echo $showblogs['Blog']['image']?>">
                                                        <?php }else{?>
                                                        <img alt="" src="<?php echo $this->webroot ?>noimage.png">
                                                        <?php }?>
                                                    </span>
                                                    <div class="entry-meta">
                                                                                    
                                                    </div>
                                                    <div class="entry-content">
                                                        <h2 class="entry-title"><a href="javascript:void(0);" style="outline: medium none;"><?php echo $showblogs['Blog']['name']?></a></h2>
                                                        
                                                        <span class="entry-date" style="border:none; Color:#000;">Posted on : <span style="color:#000"><?php $posted_date = strtotime($showblogs['Blog']['post_date']); 
                                                            echo date('Y-m-d', $posted_date);
                                                        ?></span></span><br/>
                                                         <p class="blog_description_div">
                                                            <?php $blog_content = strip_tags($showblogs['Blog']['contaent']);
                                                                   echo substr($blog_content, 0,100); 
                                                             ?>

                                                         </p>
                                                       <p>
                                                        <a class="btn btn-small btn-transparent" href="<?php echo $this->webroot ?>pages/blog_details/<?php echo base64_encode($showblogs['Blog']['id'])?>" style="outline: medium none;"><span>View detail</span></a>
                                                    </p>
                                                   
                                                    </div>
                                                    
                                                    <section class="clr"></section>
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
                                            <div class="post-pagination" style="float:left"><p><a style="outline: medium none;"> Prev</a><span class="current" style="margin: 0 5px 7px 0;">1</span><a style="outline: medium none;">  Next</a>
                                            </p>
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
                	.post .post-thumbnail.pull-left{max-height: 250px;overflow: hidden;height: auto;}
                	span.post-thumbnail.pull-left.rounded {  height: 250px;  overflow: hidden;}
                	
                </style>