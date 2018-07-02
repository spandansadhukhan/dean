<?php ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Classified Ads
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Classified',array('class'=>'cmxform form-horizontal adminex-for','enctype'=>"multipart/form-data")); 
				echo $this->Form->input('id');
				echo $this->Form->input('hide_image',array("type"=>"hidden","value"=>!empty($this->request->data["Classified"]["image"])?$this->request->data["Classified"]["image"]:""));
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Category</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('category_id',array('label'=>false,
                                            'required'=>'required','class'=>'form-control',"options"=>$classified_categories,"empty"=>"Select Category","default"=>$this->request->data["Classified"]["category_id"])); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Name</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Description</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('description',array('label'=>false,'type'=>'textarea','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('image',array('label'=>false,'type'=>'file','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2"></label>
                                        <div class="col-lg-10">
                                            <img src="<?php echo $this->webroot; ?>job_images/<?php echo $this->request->data["Classified"]["image"]?>" style="height:80px; width:80px;">
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

