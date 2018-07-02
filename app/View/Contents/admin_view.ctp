<!--<div class="contents view">
<h2><?php echo __('Content'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($content['Content']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page Name'); ?></dt>
		<dd>
			<?php echo h($content['Content']['page_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page Heading'); ?></dt>
		<dd>
			<?php echo h($content['Content']['page_heading']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo (nl2br($content['Content']['content'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Content
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php //echo $this->Form->create('Content',array('class'=>'form-horizontal')); ?>
				<?php //echo $this->Form->input('id'); ?>
				<div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10">
						<?php echo h($content['Content']['id']); ?>
				            <?php //echo $this->Form->input('page_heading',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
					<div></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Page Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($content['Content']['page_name']); ?>
				            <?php //echo $this->Form->input('page_heading',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
				  <div></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Page Heading</strong></div>
                                        <div class="col-sm-10">
						<?php echo h($content['Content']['page_heading']); ?>
				            <?php //echo $this->Form->input('page_heading',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
					 <div></div>
                                    <div class="row">
					<div class="col-sm-2"><strong>Page Content</strong></div>
					<div class="col-sm-10">	<?php echo $content['Content']['content']; ?>
                                            <!--<textarea class="form-control ckeditor" id="editor1" rows="6" name="data[Content][content]" class="validate[required]"><?php echo $this->request->data['Content']['content']; ?></textarea>-->
                                        </div>
                                    </div>
				<?php //echo $this->Form->end(__('Submit')); ?>
                               <!-- </form> -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
