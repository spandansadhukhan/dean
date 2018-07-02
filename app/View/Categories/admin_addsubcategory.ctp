<!--<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Sub Category of'); ?>&nbsp;<?php echo($categoryname);?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('active');
		echo $this->Form->input('parent_id',array('value' => $id, 'type' => 'hidden'));
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
                            <?php echo __('Add Sub Category of'); ?>&nbsp;&nbsp;<font color="red"><?php echo($categoryname);?></font>
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Category',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('parent_id',array('value' => $id, 'type' => 'hidden'));
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Name</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Active</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('active',array('label'=>false)); ?>
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

