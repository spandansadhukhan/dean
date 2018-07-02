
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Faq
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('Faq',array('class'=>'form-horizontal')); ?>
				    <div class="form-group ">
					<label class="col-sm-2"><strong>Faq Title</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('title',array('label'=>false,'class'=>'form-control','div'=>false)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
					<label class="col-sm-2"><strong>Faq Description</strong></label>
                                        <div class="col-sm-12">
<!--                                            <textarea class="form-control ckeditor" id="editor1" rows="6" name="data[Content][content]" class="validate[required]"><?php echo $this->request->data['Content']['content']; ?></textarea>-->
                                            <?php echo $this->Form->input('description',array('div'=>false,'type'=>'textarea','label'=>false,'class'=>'form-control ckeditor','id'=>'editor1','required'=>true)); ?>

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
<?php //echo $this->Html->script('ckeditor/ckeditor'); ?>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/ckeditor/ckeditor.js"></script>
