<!--<div class="users view">
<h2><?php echo __('View hair color'); ?></h2>
	<dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                        <?php echo h($colors['Haircolor']['id']); ?>
                        &nbsp;
                </dd>

                <dt><?php echo __('Color Name'); ?></dt>
                <dd>
                        <?php echo h($colors['Haircolor']['color_name']); ?>
                        &nbsp;
                </dd>
                <dt><?php echo __('Active'); ?></dt>
                <dd>
                        <?php echo h($colors['Haircolor']['is_active']==1?'Yes':'No'); ?>
                        &nbsp;
                </dd>


        </dl>
</div>-->
<?php // echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           View Hair Color
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
				   <div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10"><?php echo h($colors['Haircolor']['id']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Color Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($colors['Haircolor']['color_name']); ?></div>
                                    </div>
				
				<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Active</strong></div>
                                        <div class="col-sm-10"><?php echo h($colors['Haircolor']['is_active']==1?'Yes':'No'); ?></div>
                                    </div>
				 <div class="clearfix"></div>
				   
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
