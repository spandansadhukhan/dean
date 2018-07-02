
<?php // echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
           Body Types
        </header>
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('body_type'); ?></th>
            <th><?php echo $this->Paginator->sort('is_active'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($bodytypes as $types): ?>
	<tr class="gradeX">
		<td><?php echo h($types['BodyType']['id']); ?>&nbsp;</td>
						
                <td><?php echo h($types['BodyType']['body_type']); ?>&nbsp;</td>

                <td><?php if(isset($types['BodyType']['is_active']) && $types['BodyType']['is_active']==1){echo 'Yes';}else{echo 'No';} ?>&nbsp;</td>
		<td class="actions">
                    	<?php echo $this->Html->link(__('View'), array('action' => 'view', $types['BodyType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $types['BodyType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $types['BodyType']['id']), null, __('Are you sure you want to delete # %s?', $types['BodyType']['id'])); ?>
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
