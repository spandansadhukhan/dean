
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Ethnicity
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Nationality',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); ?>
                                <?php echo $this->Form->input('id'); ?>
    
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Ethnicity Name<span style=" color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('color_name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
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
