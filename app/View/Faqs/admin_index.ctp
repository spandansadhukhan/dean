<?php //pr($contents); exit; ?>
<?php //echo $this->element('admin_sidebar'); ?>
 <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.css" />
<!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Faqs
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
       <!-- <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th class="hidden-phone">Engine version</th>
            <th class="hidden-phone">CSS grade</th>
        </tr>-->
	<tr>
			<th>ID</th>
			<th>Type</th>
			<th>Title</th>
			<th class="actions">Actions</th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($faqs as $faq): ?>
	<tr class="gradeX">
		<td><?php echo h($faq['Faq']['id']); ?>&nbsp;</td>
                <td>
                    <?php 
                    if($faq['Faq']['type']=='G')
                    {
                        echo "General FAQ";
                    }
                    if($faq['Faq']['type']=='E')
                    {
                        echo "Escort FAQ";
                    }
                    if($faq['Faq']['type']=='C')
                    {
                        echo "Client FAQ";
                    }
                    if($faq['Faq']['type']=='A')
                    {
                        echo "Advertise FAQ";
                    }
                    ?>
                    
                </td>
		<td><?php echo h($faq['Faq']['title']);?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $faq['Faq']['id'])); ?> |
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faq['Faq']['id']), null, __('Are you sure you want to delete # %s?', $faq['Faq']['id'])); ?>

		</td>
	</tr>
	<?php endforeach; ?>
        </tbody>
        </table>

        </div>
        </div>
      </section>
    </div>
  </div>
</div>
<!--dynamic table-->
<?php if($faqs){ ?>
<script type="text/javascript" language="javascript" src="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="<?php echo $this->webroot;?>admin_styles/js/dynamic_table_init.js"></script>
<!--body wrapper end-->
<?php } ?>