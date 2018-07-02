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
                            Agency/Club/Parlour Memberships
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('AgentMembership',array('class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('id');
				
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Name</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Weekly Price</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('weekly_price',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Monthly Price</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('monthly_price',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
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

