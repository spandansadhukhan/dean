
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Agency/Club/Parlour Membership Features
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('AgentMembership',array('class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('id',array('value'=>$featurs["AgentMembership"]["id"]));
				
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Upload Photos</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('uploadphotos',array('value'=>$allowed_featurs->uploadphotos,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Add Escort Profiles</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('add_escort_profile',array('value'=>$allowed_featurs->add_escort_profile,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Upload Videos</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('upload_video',array('value'=>$allowed_featurs->upload_video,'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                              <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Agency Profile</label>
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
                                        <label for="firstname" class="control-label col-lg-2">Customer Blacklist</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('customer_blacklist',array('checked'=>$allowed_featurs->customer_blacklist,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Direct Booking</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('direct_booking',array('checked'=>$allowed_featurs->direct_booking,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Priority Profile Listing</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('prioritylisting',array('checked'=>$allowed_featurs->prioritylisting,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Receive Reviews</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('receive_review',array('checked'=>$allowed_featurs->receive_review,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Set Happy Hour</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('set_happyhour',array('checked'=>$allowed_featurs->set_happyhour,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Create My Own Website</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('own_website',array('checked'=>$allowed_featurs->own_website,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Upcoming Events</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('upcomeing_event',array('checked'=>$allowed_featurs->upcomeing_event,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">On Site Email Messaging</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('messageing',array('checked'=>$allowed_featurs->messageing,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Manage My Online Shop</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('onlineshop',array('checked'=>$allowed_featurs->onlineshop,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Add On Services</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('add_onservice',array('checked'=>$allowed_featurs->add_onservice,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Banner Advertising</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('post_add',array('checked'=>$allowed_featurs->post_add,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Blog Feature</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('blog',array('checked'=>$allowed_featurs->blog,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                 <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Chat Feature</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('chat',array('checked'=>$allowed_featurs->chat,'label'=>false,'value'=>1,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Classifieds Ads</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('classified',array('checked'=>$allowed_featurs->classified,'value'=>1,'label'=>false,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Free Email Account</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('free_email',array('checked'=>$allowed_featurs->free_email,'value'=>1,'label'=>false,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Place Adult Job Ads</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('place_adult',array('checked'=>$allowed_featurs->place_adult,'value'=>1,'label'=>false,'type'=>'checkbox','class'=>'form-control')); ?>
                                        </div>
                                </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Google Maps Listing</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('google_map',array('checked'=>$allowed_featurs->google_map,'value'=>1,'label'=>false,'type'=>'checkbox','class'=>'form-control')); ?>
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

