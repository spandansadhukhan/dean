<!--<div class="users view">
<h2><?php echo __('View eye color'); ?></h2>
	<dl>
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                    <?php echo h($colors['Eyecolor']['id']); ?>
                    &nbsp;
            </dd>

            <dt><?php echo __('Color Name'); ?></dt>
            <dd>
                    <?php echo h($colors['Eyecolor']['color_name']); ?>
                    &nbsp;
            </dd>
            <dt><?php echo __('Active'); ?></dt>
            <dd>
                    <?php echo h($colors['Eyecolor']['is_active']==1?'Yes':'No'); ?>
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
                           View Escort Type
                            
                        </header>
                        <div class="panel-body">
                            <div class="form">
				   <div class="row">
					<div class="col-sm-2"><strong>Id</strong></div>
                                        <div class="col-sm-10"><?php echo h($types['EscortType']['id']); ?> </div>
                                    </div>
					<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Name</strong></div>
                                        <div class="col-sm-10"><?php echo h($types['EscortType']['name']); ?></div>
                                    </div>
				
				<div class="clearfix"></div>
				    <div class="row">
					<div class="col-sm-2"><strong>Active</strong></div>
                                        <div class="col-sm-10"><?php echo h($types['EscortType']['is_active']==1?'Yes':'No'); ?></div>
                                    </div>
				 <div class="clearfix"></div>
				   
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
