
<?php // echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
           Agency/Club/Parlour Memberships
        </header>
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('weekly_price'); ?></th>
            <th><?php echo $this->Paginator->sort('monthly_price'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($services as $service): ?>
	<tr class="gradeX">
		<td><?php echo h($service['AgentMembership']['id']); ?>&nbsp;</td>				
                <td><?php echo h($service['AgentMembership']['name']); ?>&nbsp;</td>
                <td><?php echo h($service['AgentMembership']['weekly_price']); ?>&nbsp;</td>
                <td><?php echo h($service['AgentMembership']['monthly_price']); ?>&nbsp;</td>
		<td class="actions">
                    	<?php //echo $this->Html->link(__('View'), array('action' => 'view', $service['AgentMembership']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $service['AgentMembership']['id'])); ?>
			<?php echo $this->Html->link(__('Features'), array('action' => 'features', $service['AgentMembership']['id'])); ?>
                            <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $service['Service']['id']), null, __('Are you sure you want to delete # %s?', $service['Service']['id'])); ?>
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
