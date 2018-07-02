<!--<div class="contents form">
<?php 
echo $this->Html->script('ckeditor/ckeditor'); 
echo $this->Form->create('Content'); ?>
	<fieldset>
		<legend><?php echo __('Edit Content'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('page_heading');
		//echo $this->Form->input('content');
		//echo $this->Form->textarea('content');
	?>
   
   <textarea name="data[Content][content]" id="Contentcontent" style="width:350px; height:200px;" class="validate[required]" ><?php echo $this->request->data['Content']['content']; ?></textarea>
             <script type="text/javascript">
		CKEDITOR.replace( 'Contentcontent',
		{
		width: "95%"
		});
	 </script>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
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
