
<?php // echo $this->element('admin_sidebar'); ?>
<div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
           Manage Blacklist
        </header>
        <div class="panel-body">
        <div class="adv-table">
	
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('blocked_to'); ?></th>
            <th><?php echo $this->Paginator->sort('blocked_by'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        </thead>
        <tbody>
	<?php foreach ($users as $user): ?>
	<tr class="gradeX">
		<td><?php echo h($user['Blacklist']['id']); ?>&nbsp;</td>				
                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                <td><?php echo h($user['Fromuser']['name']); ?>&nbsp;</td>
		<td class="actions">
                    <a href="javascript:void(0)" class="btn btn-default enable-tooltip view-record"data-original-title="View Record" onclick="viewdata(<?php  echo $user['Blacklist']['id'] ?>)"><i class="fa fa-search"></i></a>
                    <a href="javascript:void(0)" onclick="del(<?php echo $user['Blacklist']['id'];?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="View Record"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php //echo $this->Html->link(__('View'), array('class'=>'btn btn-default enable-tooltip view-record','action' => 'viewblacklist', $user['Blacklist']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['Blacklist']['id'])); ?>
                        <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'deleteblacklist', $user['Blacklist']['id']), null, __('Are you sure you want to delete # %s?', $user['Blacklist']['id'])); ?>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Blacklist</h4>
        </div>
          <div class="modal-body">
      <table>
    <thead>
        
    </thead>
    <tbody id="stack1_view">
        
    </tbody>
      </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
    function viewdata(id)
    {
        $.get("<?php echo $this->webroot;?>admin/escorts/viewblacklist/"+id,function(data){
        $("#stack1_view").html(data);
        $("#myModal").modal("show");
        });
    }
    function del(id)
    {
        var tt=confirm("Are you sure you want to delete?");
        if(tt)
        {
            location.href='<?php echo $this->webroot; ?>admin/escorts/deleteblack/'+id;
        }
        
        
        
    }
</script>    

