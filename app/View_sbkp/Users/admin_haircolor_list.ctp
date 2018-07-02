<?php //pr($haircolor_list);exit; ?>
<!--<div class="categories index">
	<h2><?php echo __('Hair color'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('is_active'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
			
	</tr>
	<?php foreach ($haircolors as $colors): ?>
	<tr>
		<td><?php echo h($colors['Haircolor']['id']); ?>&nbsp;</td>
		<td><?php echo h($colors['Haircolor']['color_name']); ?>&nbsp;</td>
                <td><?php if(isset($colors['Haircolor']['is_active']) && $colors['Haircolor']['is_active']==1){echo 'Yes';}else{echo 'No';} ?>&nbsp;</td>
		<td class="actions">
                    	<?php echo $this->Html->link(__('View'), array('action' => 'haircolor_view', $colors['Haircolor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'haircolor_edit', $colors['Haircolor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'haircolor_delete', $colors['Haircolor']['id']), null, __('Are you sure you want to delete # %s?', $colors['Haircolor']['id'])); ?>
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
            Hair Colors
        </header>
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('is_active'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($haircolor_list as $colors): ?>
	<tr class="gradeX">
		<td><?php echo h($colors['Haircolor']['id']); ?>&nbsp;</td>
		<td><?php echo h($colors['Haircolor']['color_name']); ?>&nbsp;</td>
                <td><?php if(isset($colors['Haircolor']['is_active']) && $colors['Haircolor']['is_active']==1){echo 'Yes';}else{echo 'No';} ?>&nbsp;</td>
		<td class="actions">
                    	<?php echo $this->Html->link(__('View'), array('action' => 'haircolor_view', $colors['Haircolor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'haircolor_edit', $colors['Haircolor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'haircolor_delete', $colors['Haircolor']['id']), null, __('Are you sure you want to delete # %s?', $colors['Haircolor']['id'])); ?>
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

