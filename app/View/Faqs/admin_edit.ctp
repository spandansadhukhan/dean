<?php ?>
<script src="<?php echo($this->webroot)?>ckeditor/ckeditor.js"></script>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Faq
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('Faq',array('class'=>'form-horizontal')); ?>
				<?php echo $this->Form->input('id'); ?>
                                <div class="form-group ">
					<label class="col-sm-2"><strong>Type of Faq</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('type',array('label'=>false,"options"=>$category,'default'=>!empty($this->request->data["Faq"]["type"])?$this->request->data["Faq"]["type"]:'','class'=>'form-control','required'=>true)); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
					<label class="col-sm-2"><strong>Title</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('title',array('label'=>false,'class'=>'form-control','required'=>true)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
					<label class="col-sm-2"><strong>Description</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'class'=>'form-control ckeditor','id'=>'editor1')); ?>
<!--                                            <textarea class="form-control ckeditor" id="editor1" rows="6" name="data[Content][content]" class="validate[required]" required=""><?php echo $this->request->data['Content']['content']; ?></textarea>-->
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

