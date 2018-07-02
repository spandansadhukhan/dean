<!--<div class="categories form">
<?php echo $this->Form->create('EmailTemplate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Email Template'); ?></legend>
                <?php
					echo $this->Form->input('id');
					echo $this->Form->input('subject');
					echo $this->Form->input('content',array('id'=>'editor1'));
				?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php // echo $this->element('admin_sidebar'); ?>
<!--
<script src="<?php echo $this->webroot?>admin_styles/vendors/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="<?php echo $this->webroot;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>ckfinder/ckfinder_v1.js"></script>
<script>
CKEDITOR.replace( 'editor1',

 {

 	//filebrowserBrowseUrl : './ckfinder/ckfinder.html',

 	//filebrowserImageBrowseUrl : './ckfinder/ckfinder.html?type=Images',

 	filebrowserFlashBrowseUrl : '<?php echo $this->webroot;?>/ckfinder/ckfinder.html?type=Flash',
 	filebrowserUploadUrl : '<?php echo $this->webroot;?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  	filebrowserImageUploadUrl: '<?php echo $this->webroot;?>/ckeditor/plugins/imgupload.php',
 	filebrowserFlashUploadUrl : '<?php echo $this->webroot;?>/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

 } 

 );
 </script>-->
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Edit Email Template
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('EmailTemplate',array('class'=>'form-horizontal')); ?>
				<?php echo $this->Form->input('id'); ?>
				    <div class="form-group ">
					<label class="col-sm-2"><strong>Subject</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('subject',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
					<label class="col-sm-2"><strong>Content</strong></label>
                                        <div class="col-sm-12">
						<?php echo $this->Form->input('content',array('label'=>false,'class'=>'form-control ckeditor','id'=>'editor1')); ?>
                                           <!-- <textarea class="form-control ckeditor" id="editor1" rows="6" name="data[Content][content]" class="validate[required]"><?php echo $this->request->data['Content']['content']; ?></textarea>-->
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
