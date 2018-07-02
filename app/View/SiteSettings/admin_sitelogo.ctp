<!--<div class="sitesettings form">
<?php echo $this->Form->create('SiteSetting',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Site Logo'); ?></legend>
                <input type="hidden" name="data[SiteSetting][hidsite_logo]" id="SiteSettingHidSiteLogo" value="<?php echo($this->request->data['SiteSetting']['site_logo']);?>"/>
	<?php
            
                $uploadFolder = "site_logo";
                $uploadPath = WWW_ROOT . $uploadFolder;
                $imageName = $this->request->data['SiteSetting']['site_logo'];
                if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){
                        echo($this->Html->image('/site_logo/'.$imageName, array('alt' => 'Site Logo', 'height'=> '100px', 'width'=> '200px')));
                }else{

                }
		echo $this->Form->input('id');
                echo $this->Form->input('site_logo',array('type'=>'file'));
	?>
                <font color="red">Please uploade image of .jpg, .jpeg, .png or .gif format.</font>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Site Logo
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); 
					echo $this->Form->input('id');
                			echo $this->Form->input('hidsite_logo', array('type' => 'hidden', 'value' => $this->request->data['SiteSetting']['site_logo']));
				?>
				   <div class="form-group ">
                                       
					<div class="col-lg-12" style="padding:20px;">
					<?php
						$uploadFolder = "site_logo";
						$uploadPath = WWW_ROOT . $uploadFolder;
						$imageName = $this->request->data['SiteSetting']['site_logo'];
						if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){
							echo($this->Html->image('/site_logo/'.$imageName, array('alt' => 'Site Logo', 'height'=> '100px', 'width'=> '200px')));
						}else{

						}
					?>
					</div>
                                        <div class="col-lg-12">
					<?php echo $this->Form->input('site_logo',array('type'=>'file','label'=>false)); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <div class="col-lg-12">
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
