
  <div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Sub Admin Users (Total Records: <?php echo $total_user;?>)
        </header>
        <div class="panel-body">
        <div class="adv-table">
            <a href="<?php echo $this->webroot.'admin/users/addsubadmin'; ?>" class="btn btn-alt btn-primary enable-tooltip" style="float:right">Add New</a>
           <?php echo $this->Form->create("Filter",array('class' => 'filter'));?> 
           <table>
		<tr>
		    
		        
		         <td>	
		          <div class="clearfix pull-left" style="display:block;" id="filterInput">
				&nbsp;<button title="" class="btn btn-alt btn-primary enable-tooltip" id="advanceSearch" type="button" data-original-title="Advance Search"><i class="fa fa-sun-o fa-lg"></i></button>
				<div class="btn-group btn-group-sm pull-left">
						<div class="input-group">
							 <input type="text" placeholder="Search by display name or username.." class="form-control col-md-6" value="" name="search" id="search_key">
								<span class="input-group-btn">
								<button class="btn btn-primary"  type="submit">Search</button>
							</span>
						</div>
				</div>
				</div>
		          </td>	
		</tr>
	</table>
        <?php echo $this->Form->end();?>        
        <table  class="display table table-bordered table-striped">
        <thead>
	<tr>
                <th><input type="checkbox" id="selectAll"></th>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo 'Display Name'; ?></th>
		<th><?php echo 'Username'; ?></th>
		<th><?php echo 'Email'; ?></th>
		<th><?php echo 'Department'; ?></th>
		<th><?php echo 'Add Date' ?></th>
		<th><?php echo 'Actions'; ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php foreach ($users as $user):
	    
	    ?>
	<tr class="gradeX">
                <td>&nbsp;</td>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>		
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
                <td><?php echo $user['User']['department']; ?>&nbsp;</td>
                <td><?php echo $user['User']['join_date']; ?>&nbsp;</td>                
                 <td class="text-center">
		<div class="btn-group btn-group-sm">
                    <a href="javascript:void(0);" onclick="getViewUser(<?php echo $user['User']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>
                    <a href="<?php echo $this->webroot;?>admin/users/editsubadmin"  class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                </div>
	</td>
		
	</tr>
<?php endforeach; ?>
        <tr>
            <td colspan="8">
                <div class="btn-group btn-group-sm">
                 <a title="" id="multiple_active" data-toggle="tooltip" class="btn btn-primary" href="javascript:void(0)" data-original-title="Active Selected"><i class="fa fa-circle-o"></i></a>
                 <a title="" id="multiple_inactive" data-toggle="tooltip" class="btn btn-primary" href="javascript:void(0)" data-original-title="Inactive Selected"><i class="fa fa-circle"></i></a>
                 <a title="" id="multiple_delete" data-toggle="tooltip" class="btn btn-primary" href="javascript:void(0)" data-original-title="Delete Selected"><i class="fa fa-times"></i></a>
               </div>
            </td>
        </tr>
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
 <!-- <div class="container">-->
<script>
    function getViewUser(userid){
	$.post('<?php echo($this->webroot)?>admin/escorts/view/'+userid,function(data){
        $("#myModal").modal("show");    
        $('#stack1_view').html(data);
	});
    }
</script>

  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sub AdminDetail</h4>
        </div>
          <div class="modal-body" id="modalbody">
          
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


