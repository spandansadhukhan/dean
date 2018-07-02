<script src="<?php echo($this->webroot)?>ckeditor/ckeditor.js"></script>


<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Content

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('Content',array('class'=>'form-horizontal')); ?>
				<?php echo $this->Form->input('id'); ?>
				    <div class="form-group ">
					<label class="col-sm-2"><strong>Page Heading</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('page_heading',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
					<label class="col-sm-2"><strong>Page Content</strong></label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control ckeditor" id="editor1" rows="6" name="data[Content][content]" class="validate[required]"><?php echo $this->request->data['Content']['content']; ?></textarea>
                                        </div>
                                    </div>
                                <div class="form-group">
					<label class="col-sm-2"><strong>Page Meta Title</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('meta_title',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
					<label class="col-sm-2"><strong>Page Meta Keywords</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('meta_keywords',array("type"=>"textarea",'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
					<label class="col-sm-2"><strong>Page Meta Description</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('meta_descriptions',array("type"=>"textarea",'label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
				<?php echo $this->Form->end(__('Submit')); ?>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

