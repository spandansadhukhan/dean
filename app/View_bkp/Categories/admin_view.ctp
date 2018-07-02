<!--<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<?php
		if($category['Category']['parent_id']!=0)
		{
		?>
		<dt><?php echo __('Parent Category'); ?></dt>
		<dd>
			<?php echo h($categoryname); ?>
			&nbsp;
		</dd>
		<?php
		}
		?>
                <?php
		if($category['Category']['parent_id']==0)
		{
		?>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
                    <?php
                    if(isset($category['Category']['image']) and !empty($category['Category']['image']))
                    {
                    ?>
                    <img alt="" src="<?php echo $this->webroot;?>img/cat_img/<?php echo $category['Category']['image'];?>" style=" height:80px; width:80px;">
                    <?php
                    }
                    else{
                    ?>
                   <img alt="" src="<?php echo $this->webroot;?>noimage.png" style=" height:80px; width:80px;">

                   <?php } ?>
		</dd>
		<?php
		}
		?>
                
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($category['Category']['active']); ?>
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
                           View Category
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
				   <div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10"><?php echo h($category['Category']['id']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Category Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($category['Category']['name']); ?></div>
                                    </div>
				  <div class="clearfix"></div>
				   <?php
					if($category['Category']['parent_id']!=0)
					{
				   ?>
				    <div class="row">
					<div class="col-sm-2"><strong>Parent Category</strong></div>
                                        <div class="col-sm-10"><?php echo h($categoryname); ?></div>
                                    </div>
					 <div class="clearfix"></div>
					<?php } ?>
				    <?php
					if($category['Category']['parent_id']==0)
					{
				    ?>				
				    <div class="row">
					<div class="col-sm-2"><strong>Image</strong></div>
                                        <div class="col-sm-10">
					 <?php
					    if(isset($category['Category']['image']) and !empty($category['Category']['image']))
					    {
					    ?>
					    <img alt="" src="<?php echo $this->webroot;?>img/cat_img/<?php echo $category['Category']['image'];?>" style=" height:80px; width:80px;">
					    <?php
					    }
					    else{
					    ?>
					   <img alt="" src="<?php echo $this->webroot;?>noimage.png" style=" height:80px; width:80px;">

					 <?php } ?>	
					</div>
                                    </div>
				 <?php } ?>
				 <div class="clearfix"></div>
				<div class="row">
					<div class="col-sm-2"><strong>Is Active</strong></div>
                                        <div class="col-sm-10"><?php echo h($category['Category']['active']); ?></div>
                                    </div>
				  <div class="clearfix"></div>
				
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
