<!--<link href="<?php echo $this->webroot; ?>css/dropzone.css" rel="stylesheet">
<script src="<?php echo $this->webroot; ?>js/dropzone.js"></script>
<div class="users form">
	<fieldset>
		<legend><?php echo __('User Images'); ?></legend>
                <div class="image_upload_div" style="margin-top: 14px;margin-left: 25px;">
	            <form action="<?php echo $this->webroot; ?>admin/users/uploadUser/<?php echo $id;?>" class="dropzone">
                    </form>
                </div> 
	</fieldset>

</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<link href="<?php echo $this->webroot; ?>css/dropzone.css" rel="stylesheet">
<script src="<?php echo $this->webroot; ?>js/dropzone.js"></script>
  <div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            User Images
        </header>
        <div class="panel-body">
        <div class="adv-table">
	 <div class="image_upload_div" style="margin-top: 14px;margin-left: 25px;">
	     <form action="<?php echo $this->webroot; ?>admin/users/uploadUser/<?php echo $id;?>" class="dropzone"></form>
         </div> 
	<div class="clearfix">&nbsp;</div>
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
		<th><?php echo __('id'); ?></th>
		<th><?php echo __('image'); ?></th>
                
	</tr>
        </thead>
        <tbody>
	<?php //pr($images);exit;
	foreach ($images as $image): ?>
	<tr class="gradeX">
		<td><?php echo h($image['Multimageupload']['id']); ?>&nbsp;</td>
		<td>
		<?php
			$uploadFolder = "user_images";
			$uploadPath = WWW_ROOT . $uploadFolder;
			$imageName = $image['Multimageupload']['image_upload'];
			if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){ ?>
				
				<?php echo($this->Html->image('/user_images/'.$imageName, array('height' => '100','width' => '100')));?>
			<?php } ?>&nbsp;
		</td>
           
	</tr>
<?php endforeach; ?>

        </tbody>
        </table>
	<p><?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>	</p>
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>

        </div>
        </div>
      </section>
    </div>
  </div>
</div>
