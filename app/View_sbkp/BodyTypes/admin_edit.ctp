<!--<div class="categories form">
<?php echo $this->Form->create('Bodytype'); ?>
	<fieldset>
		<legend><?php echo __('Edit body type'); ?></legend>
	<?php
                echo $this->Form->input('id');
		echo $this->Form->input('body_type',array('required'=>'required'));
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Eye color
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('BodyType',array('class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('id');
				
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Body Type</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('body_type',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Active</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('is_active',array('label'=>false)); ?>
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
