<!--<div class="users view">
<h2><?php echo __('View User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Username'); ?></dt>
                <dd>
                        <?php echo h($user['User']['username']); ?>
                        &nbsp;
                </dd>
		<dt><?php echo __('Email'); ?></dt>
                <dd>
                        <?php echo h($user['User']['email']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Height'); ?></dt>
                <dd>
                        <?php echo h($user['User']['height']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Haircolor'); ?></dt>
                <dd>
                        <?php if(isset($user['User']['haircolor_id']) && $user['User']['haircolor_id']!=''){echo $user['Haircolor']['color_name'];}else{echo 'N/A';} ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Eyecolor'); ?></dt>
                <dd>
                        <?php if(isset($user['User']['eyecolor_id']) && $user['User']['eyecolor_id']!=''){echo $user['Eyecolor']['color_name'];}else{echo 'N/A';} ?>
                        &nbsp;
                </dd>
                
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($user['User']['city']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('State'); ?></dt>
                <dd>
                        <?php if(isset($user['User']['state_id']) && $user['User']['state_id']!=''){echo $user['State']['name'];}else{echo 'N/A';} ?>
                        &nbsp;
                </dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php if(isset($user['User']['country_id']) && $user['User']['country_id']!=''){echo $user['Country']['name'];}else{echo 'N/A';} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profile_image'); ?></dt>
		<dd>
		<?php
			$uploadFolder = "user_images";
			$uploadPath = WWW_ROOT . $uploadFolder;
			$imageName = $user['User']['profile_image'];
			
			if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){
				echo($this->Html->image('/user_images/'.$imageName, array('height' => '50','width' => '50')));
			} ?>
						&nbsp;
		</dd>
		<dt><?php echo __('Multiple_images'); ?></dt>
                <?php
                foreach($multimg as $mult)
                {
                ?>
		<dd>
		<?php
			$uploadFolder = "user_images";
			$uploadPath = WWW_ROOT . $uploadFolder;
			$imageName1 = $mult['Multimageupload']['image_upload'];
			//echo $uploadPath . '/' . $imageName1;
			$typeexp=explode('__',$imageName1);
			$img=$typeexp[1];
			if(file_exists($uploadPath . '/' . $img) && $img!=''){
				echo($this->Html->image('/user_images/'.$img, array('height' => '50','width' => '50')));
			} ?>
						&nbsp;
                </dd><br>
                <?php
                }
                ?>
                                        
		<dt><?php echo __('Join Date'); ?></dt>
		<dd>
			<?php echo h($user['User']['join_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h(($user['User']['is_active']==1)?'Yes':'No'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Admin'); ?></dt>
		<dd>
			<?php echo h(($user['User']['is_admin']==1)?'Yes':'No'); ?>
			&nbsp;
		</dd>
		
	</dl>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           View User
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
				   <div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['id']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>First Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['first_name']); ?></div>
                                    </div>
				  <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Last Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['last_name']); ?></div>
                                    </div>
					 <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Username</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['username']); ?></div>
                                    </div>
				 <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>Email</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['email']); ?></div>
                                    </div>
				  <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>Contact No</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['phone_no']); ?></div>
                                    </div>
				  <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>Gender</strong></div>
                                        <div class="col-sm-10"><?php if($user['User']['gender']=='M') {?>Male<?php } else {?>Female<?php } ?></div>
                                    </div>
				  <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>Height</strong></div>
                                        <div class="col-sm-10"> <?php echo h($user['User']['height']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Haircolor</strong></div>
                                        <div class="col-sm-10"><?php if(isset($user['User']['haircolor_id']) && $user['User']['haircolor_id']!=''){echo $user['Haircolor']['color_name'];}else{echo 'N/A';} ?></div>
                                    </div>
				  <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Eyecolor</strong></div>
                                        <div class="col-sm-10"> <?php if(isset($user['User']['eyecolor_id']) && $user['User']['eyecolor_id']!=''){echo $user['Eyecolor']['color_name'];}else{echo 'N/A';} ?></div>
                                    </div>
					 <div class="clearfix"></div>
					  <div class="row">
					<div class="col-sm-2"><strong>Body type</strong></div>
                                        <div class="col-sm-10"> <?php if(isset($user['User']['bodytype_id']) && $user['User']['bodytype_id']!=''){echo $user['BodyType']['body_type'];}else{echo 'N/A';} ?></div>
                                    </div>
					 <div class="clearfix"></div>
					  <div class="row">
					<div class="col-sm-2"><strong>Escort Type</strong></div>
                                        <div class="col-sm-10"> <?php if(isset($user['User']['escorttype_id']) && $user['User']['escorttype_id']!=''){echo $user['EscortType']['name'];}else{echo 'N/A';} ?></div>
                                    </div>
					 <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>City</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['city']); ?></div>
                                    </div>
				 <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>State</strong></div>
                                        <div class="col-sm-10"><?php if(isset($user['User']['state_id']) && $user['User']['state_id']!=''){echo $user['State']['name'];}else{echo 'N/A';} ?></div>
                                    </div>
				  <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Country</strong></div>
                                        <div class="col-sm-10"><?php if(isset($user['User']['country_id']) && $user['User']['country_id']!=''){echo $user['Country']['name'];}else{echo 'N/A';} ?></div>
                                    </div>
					 <div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Profile Image</strong></div>
                                        <div class="col-sm-10">
						<?php
							$uploadFolder = "user_images";

							$uploadPath = WWW_ROOT . $uploadFolder;
							$imageName = $user['User']['profile_image'];
			
							if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){
								echo($this->Html->image('/user_images/'.$imageName, array('height' => '50','width' => '50')));

							} ?>
					</div>
                                    </div>
				 <div class="clearfix"></div>
				<div class="row">
					<div class="col-sm-2"><strong>Multiple_images</strong></div>
                                        <div class="col-sm-10">
					<?php

							foreach($multimg as $mult)
							{
							?>
							<?php

								$uploadFolder = "user_images";
								$uploadPath = WWW_ROOT . $uploadFolder;
								$imageName1 = $mult['Multimageupload']['image_upload'];
								//echo $uploadPath . '/' . $imageName1;
								$typeexp=explode('__',$imageName1);
								$img=$typeexp[1];
								if(file_exists($uploadPath . '/' . $img) && $img!=''){
									echo($this->Html->image('/user_images/'.$img, array('height' => '50','width' => '50')));
								}
							}
						 ?>
					</div>
                                    </div>
				<div class="clearfix"></div>
				
				   <div class="row">
					<div class="col-sm-2"><strong>Join Date</strong></div>
                                        <div class="col-sm-10"><?php echo h($user['User']['join_date']); ?></div>
                                    </div>
				<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Is Active</strong></div>
                                        <div class="col-sm-10"><?php echo h(($user['User']['is_active']==1)?'Yes':'No'); ?></div>
                                    </div>
				 <div class="clearfix"></div>
				   <div class="row">
					<div class="col-sm-2"><strong>Is Admin</strong></div>
                                        <div class="col-sm-10"><?php echo h(($user['User']['is_admin']==1)?'Yes':'No'); ?></div>
                                    </div>
				<?php //echo $this->Form->end(__('Submit')); ?>
                               <!-- </form> -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
