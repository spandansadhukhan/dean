<?php // echo $this->element('admin_sidebar'); 
$sl_no=0;
?>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
           All Classified Category
        </header>
        <div class="table-options clearfix" style=" background-color:#fff">
				
				<div class="btn-group btn-group-sm pull-right">
					<a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" 
                                           href="<?php echo $this->webroot; ?>admin/classified_categories/add" data-original-title="Add New Classified Category">Add New</a>
				</div>
		</div    
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($classcategories as $category): ?>
	<tr class="gradeX">
		<td><?php echo h(++$sl_no); ?>&nbsp;</td>				
                <td><?php echo h($category['ClassifiedCategory']['name']); ?>&nbsp;</td>
		<td class="actions">
                    	<?php //echo $this->Html->link(__('View'), array('action' => 'view', $category['ClassifiedCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['ClassifiedCategory']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['ClassifiedCategory']['id']), null, __('Are you sure you want to delete # %s?', $category['ClassifiedCategory']['id'])); ?>
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
