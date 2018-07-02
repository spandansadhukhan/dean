
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Category
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Category',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Category Name<span style=" color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Category Description</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('description',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Meta Title</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('meta_title',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Meta Keywords</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('meta_keywords',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Meta Description</label>
                                        <div class="col-lg-10 col-sm-9">     
					<?php echo $this->Form->input('meta_descriptions',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
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

