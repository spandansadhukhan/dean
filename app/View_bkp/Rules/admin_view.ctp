<!--<div class="categories view">
<h2><?php echo __('Rule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rule['Rule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rule Name'); ?></dt>
		<dd>
			<?php echo h($rule['Rule']['name']); ?>
			&nbsp;
		</dd>
		<?php
		//if($category['Category']['parent_id']!=0)
		//{
		?>
		
		<?php
		//}
		?>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($rule['Rule']['active']); ?>
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
                           View Rule
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
				   <div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10"><?php echo h($rule['Rule']['id']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Rule Name</strong></div>
                                        <div class="col-sm-10"><?php echo  h($rule['Rule']['name']); ?></div>
                                    </div>
				  	<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Active</strong></div>
                                        <div class="col-sm-10"><?php echo ($rule['Rule']['active']=='1'?'Active':'Inactive'); ?></div>
                                    </div>
				
				  <div class="clearfix"></div>
				
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
