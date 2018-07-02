  	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Private Gallery</h2>
					</div>
					      <div id="container" class="transitions-enabled centered clearfix">
					      		<div class="row mt-4">
                                <?php 
                                 if(!empty($userPhoto)){  
                                   foreach ($userPhoto as $showescortsdata) {  
                                ?>
                                	<div class="col-lg-3">
                                    <div class="pin_d box online-girl">
                                        <div class="pin_d_inner">
                                            
                                           
                                            <?php 
                                                if($showescortsdata['Photo']['img'] != ''){

                                                    $chk_ext = explode('.', $showescortsdata['Photo']['img']);
                                                    if($chk_ext[1] != 'mp4'){

                                            ?>
                                                 <img src="<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['Photo']['img'];?>" class="img-fluid imgPartssd"> 
                                            <?php
                                                }elseif($chk_ext[1] == 'mp4'){
                                            ?>
                                            <video width="100%" controls>
                                            <source src="<?php echo  $this->webroot; ?>user_images/<?php echo $showescortsdata['Photo']['img'];?>" type="video/mp4" height="300">
                                            </video>
                                            <?php        
                                                }
                                             } 

                                             ?>
                                           
                                            
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
					</div>
				</div>
			</div>
		</div>
	</section>
	