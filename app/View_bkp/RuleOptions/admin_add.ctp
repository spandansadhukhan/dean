<!--<div class="categories form">
<?php echo $this->Form->create('RuleOption'); ?>
	<fieldset>
		<legend><?php echo __('Add Rule Option'); ?></legend>
		
		<div style="font-size: 110%;  margin-bottom: -3px;">
		Rule
		</div>
		
		<select name="data[RuleOption][rule_id]" id="" style="font-size: 140% ;padding: 1%; width: 98%; margin-left: 9px; margin-bottom: 23px;">
		<?php
		foreach($rules as $rule)
		{
			
		?>
      <option value="<?php echo $rule['Rule']['id'];?>"><?php echo $rule['Rule']['name'];?></option>
      
      <?php
       }
      ?>
      </select>
		
	<?php
		echo $this->Form->input('option_name');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php // echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Rule Option
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('RuleOption',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); ?>
				    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Rule</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('rule_id',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$rules, 'empty'=>'-- Select Rule Name --')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Option Name</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('option_name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
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

