<link rel="stylesheet" href="/resources/demos/style.css">
<div class="col-left mt-4">
            <section id="container" class="container">
                <section id="middle">
                    <section id="middle-inner">

                        <section class="all-pins-do">
                            <div class="my-account-inner row">
                    <div class="triangleBottomRight firstItem"></div>

                        <a style="display:none;" href="#;" class="website_activate"></a>
                        <?php echo $this->element('parlor_sidebar'); ?>
                        <div class="triangleBottomleft firstItem"></div>
                        
                        <div class="right-my-account col-lg-9">
                        <div class="right-my-account-blocks">
                        <div class="detail-heading">
                        <section class="title-left">
                        <div class="acntSetting p-1">
                                                    <h2 class="font-weight-normal">Set happy hours</h2>
                        </div>
                        </section>
                        <div class="clr"></div>
                        </div>



                        <div class="right-my-account-blocks-inner">
                        <div class="table-responsive for-msg">
                        <table class="table table-vcenter table-striped">
                        <thead>
                        <tr>
                            <th>Sl No.#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                                	<?php 
                                		$count = 1;
                                		
                                		if(!empty($membershipall)){
                                                foreach ($membershipall as $showmodel) { ?>
                                		<tr>
                                			<td><?php echo $count;?></td>
                                			<td><?php if($showmodel['User']['profile_image'] != ''){?> <img src="<?php echo $this->webroot?>user_images/<?php echo $showmodel['User']['profile_image']?>" height="100px" width="100px"/><?php }else{ ?>
                                			<img src="<?php echo $this->webroot?>noimage.png" height="100px" width="100px"/>	

                                			<?php } ?></td>
                                			<td><?php echo $showmodel['User']['name']; ?></td>
                                			<td><?php echo $showmodel['User']['email']; ?></td>
                                			
                                			<td>
                                                       <a href="<?php echo $this->webroot?>parlors/set_happy_hours/<?php echo base64_encode($showmodel['User']['id']); ?>" class="btn btn-primary">Set happy hours</a>
                                                            
                        </td>
                                		</tr>
                                				
                                	<?php		
                                			$count++;
                                		}
                                	}else{
                                	?>
                                		<tr>
                                                    <td colspan="5">
                                                        <section class="no-record"> You have not added any model.</section>
                                                    </td>
                                                </tr>
                                	<?php	
                                	}
                                	?>
                                	
                                </tbody>
                        </table>						
                       
                    <div class="clr"></div>


                </div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>
</div>

<div class="col-right">
<?php echo $this->element('user_banner');?>     
</div>
</section>
<div class="clr"></div>