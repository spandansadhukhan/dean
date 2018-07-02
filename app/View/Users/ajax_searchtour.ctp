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
                                    	 <a href="<?php echo $this->Html->url('/');?>escort-details/<?php echo base64_encode($showescortsdata['User']['id']);?>"> 
                                        <div class="pin_d_inner">
                                            <div class="all-c-badge">
                                                <img src="<?php echo  $this->Html->url('/') ?>images/verified.png" title="Verified" alt="" />
                                                <img src="<?php echo  $this->Html->url('/') ?>images/video-ic.png" title="Videos" alt="" />
                                                <!-- <img src="<?php echo  $this->Html->url('/') ?>images/porn-star.png" title="Pornstar" alt="" /> -->
                                                <img src="<?php echo  $this->Html->url('/') ?>images/online.png" title="Online" alt="" />
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
                                                    <ul>
                                                        <li> <span class="t1">
                                                                Age                        :
                                                                34 yrs                        </span><span class="t2">
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
                                   
                                    } 
                                    else 
                                    {
                                      echo '<h2 style="color:#fff">No results found</h2>';  

                                    }
                                
                                ?>
                                </div>