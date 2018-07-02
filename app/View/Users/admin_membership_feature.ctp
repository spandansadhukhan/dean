<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Escort Features
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Membership',array('class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('id',array('value'=>$features["Membership"]["id"]));
				
				?>
                                    
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Upload Photos</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('uploadphotos',array('value'=>$allowed_featurs->uploadphotos,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Upload Videos</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('upload_video',array('value'=>!empty($allowed_featurs->upload_video)?$allowed_featurs->upload_video:'','label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">My Profile - Description</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('my_profile',array('value'=>$allowed_featurs->my_profile,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Contact Information</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('contact_info',array('value'=>$allowed_featurs->contact_info,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                              <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Homepage Premium Position</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('home_premium_pos',array('value'=>!empty($allowed_featurs->home_premium_pos)?$allowed_featurs->home_premium_pos:0,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">City/Region Premium Position</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('city_premium_pos',array('value'=>!empty($allowed_featurs->city_premium_pos)?$allowed_featurs->city_premium_pos:0,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Private Gallery Listing</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('private_gallery',array('checked'=>!empty($allowed_featurs->private_gallery)?$allowed_featurs->private_gallery:0,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Receive Reviews</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('receive_review',array('checked'=>$allowed_featurs->receive_review,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Manage Blacklist</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('customer_blacklist',array('checked'=>$allowed_featurs->customer_blacklist,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">On Tour Feature</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('tour_feature',array('checked'=>$allowed_featurs->tour_feature,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Receive Online Booking Requests</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('onlinebooking',array('checked'=>$allowed_featurs->onlinebooking,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Manage Schedule & Bookings</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('manage_schedule',array('checked'=>$allowed_featurs->manage_schedule,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Set Happy Hours</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('set_happyhour',array('checked'=>$allowed_featurs->set_happyhour,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Have your own Webpage</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('have_webpage',array('checked'=>$allowed_featurs->have_webpage,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Receive Credits for Private Gallery</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('receive_credit',array('checked'=>$allowed_featurs->receive_credit,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Your own The Directory Email Address</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('own_directory',array('checked'=>!empty($allowed_featurs->own_directory)?$allowed_featurs->own_directory:0,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">On Site Chat Feature</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('chat',array('checked'=>$allowed_featurs->chat,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                              
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Manage My Online Shop</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('manage_onlineshop',array('checked'=>$allowed_featurs->manage_onlineshop,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Banner Advertising</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('banner_advertising',array('checked'=>$allowed_featurs->banner_advertising,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Receive Profile comments</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('receive_comment',array('checked'=>$allowed_featurs->receive_comment,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Blog Feature</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('blog',array('checked'=>$allowed_featurs->blog,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Google Maps Listing</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('google_map',array('checked'=>$allowed_featurs->google_map,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                              
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                <?php //echo $this->Form->end(__('Submit')); 
					echo $this->Form->end();
				?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

