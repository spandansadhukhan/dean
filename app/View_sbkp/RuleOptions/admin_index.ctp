<!--<div class="categories index">
	<h2><?php echo __('Ruleoption'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
         <th><?php echo $this->Paginator->sort('option name'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($rules as $option): ?>
	<tr>
		<td><?php echo h($option['RuleOption']['id']); ?>&nbsp;</td>
		<td><?php echo h($option['RuleOption']['option_name']);?></td>
		<td><?php echo h($option['RuleOption']['active']==1?'Active':'Inactive'); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $option['RuleOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $option['RuleOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $option['RuleOption']['id']), null, __('Are you sure you want to delete # %s?', $option['RuleOption']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>-->
<?php //echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Rule Options
        </header>
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('option name'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
       <?php foreach ($rules as $option): ?>
	<tr class="gradeX">
		<td><?php echo h($option['RuleOption']['id']); ?>&nbsp;</td>
		<td><?php echo h($option['RuleOption']['option_name']);?></td>
		<td><?php echo h($option['RuleOption']['active']==1?'Active':'Inactive'); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $option['RuleOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $option['RuleOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $option['RuleOption']['id']), null, __('Are you sure you want to delete # %s?', $option['RuleOption']['id'])); ?>
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
