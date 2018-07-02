<?php ?>
<!--<script type="text/javascript"  src="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo $this->webroot;?>admin_styles/js/dynamic_table_init.js"></script>-->
<script>
    function getViewcredit(cid){
	$.post('<?php echo($this->webroot)?>admin/credits/packageview/'+cid,function(data){
		   // alert(data);
		    $('#stack1_view').empty();
		    $('#stack1_view').html(data);
	});
    }
    
   
</script>

 <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.css" />
  <div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Users
        </header>
        <div class="panel-body">
        <div class="adv-table">
	<a href="<?php echo $this->webroot.'admin/credits/addpackage'; ?>" style="float:right">Add New</a>
	<table>
		<!--<tr>
		    <form action="" method="post" style="margin: 0px;">
		        <td style="width:30%;border:0px solid red;">	
		              <input type="text" name="data[User][title]" id="title" placeholder="Search By User name" value="<?php if(isset($stitle)&&($stitle!='')){echo $stitle;} ?>" style="float: left;width:100%;margin-right:10px;">
		         </td>
		         <td style="width:70%;border:0px solid red;">	
		             <input type="submit" value="Search" style="float: left;margin: 0px 0px 0px 12px;" class="">
		          </td>	
		      </form>
		</tr>-->
	</table>
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
	<tr>
	    <th><input type="checkbox" id="selectAll"></th>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo __('Number Of Credits'); ?></th>
		<th><?php echo __('Total Cost'); ?></th>
		<th><?php echo __('Discount Percent'); ?></th>
		<th><?php echo __('Applicable Cost'); ?></th>
		<th><?php echo __('Add Date'); ?></th>
		<th><?php echo __('Actions'); ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php foreach ($credits as $credit){
	    $cid = $credit['Credit']['id'];
	    if($credit['Credit']['is_discount']==1){
	    	$percentage = $credit['Credit']['cost'] - (($credit['Credit']['cost'] * $credit['Credit']['discount'])/100);
	     }
	    ?>
	<tr class="gradeX">
		<td><input type="checkbox" id="onecheck"></td>
		<td><?php echo h($credit['Credit']['id']); ?>&nbsp;</td>
		<td><?php echo h($credit['Credit']['credit_number']).' Credits'; ?>&nbsp;</td>
		<td><?php echo h($credit['Credit']['cost']).' AUD'; ?>&nbsp;</td>
		<td><?php echo h(($credit['Credit']['is_discount']==1)?$credit['Credit']['discount'].'%':'N/A'); ?>&nbsp;</td>		
		<td><?php echo h(($credit['Credit']['is_discount']==1)?$percentage:$credit['Credit']['cost']).' AUD' ; ?>&nbsp;</td>
		<td><?php echo date('d M, Y',strtotime($credit['Credit']['created_on'])); ?>&nbsp;</td>
		<td class="text-center">
		    <div class="btn-group btn-group-sm">	
					<a href="javascript:void(0);" data-toggle="modal" data-target="#stack1" onclick="getViewcredit(<?php echo $cid;?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>
					<a href="<?php echo $this->webroot.'admin/credits/edit/'.$cid;?>"  class="btn btn-primary enable-tooltip" data-original-title="EditCredits"><i class="fa fa-edit sidebar-nav-icon"></i></a>
					<!--<a href="javascript:void(0);" data-toggle="modal" data-target="#stack3" onclick="del(<?php echo $cid; ?>)" class="btn btn-danger enable-tooltip" data-original-title="Delete Record"><i class="fa fa-times"></i></a>
					<?php if($credit['Credit']['status']==1){ ?>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#stack4" onclick="Inactive(<?php echo $cid; ?>)" class="btn btn-success enable-tooltip" data-original-title="Inactive Record"><i class="fa fa-circle-o"></i></a>
					<?php } else if($credit['Credit']['status']==0){ ?>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#stack4" onclick="active(<?php echo $cid; ?>)" class="btn btn-warning enable-tooltip" data-original-title="Inactive Record"><i class="fa fa-circle-o"></i></a>
					<?php } ?>-->
					<!--<a href="javascript:void(0);" data-toggle="modal" data-target="#stack5" onclick="AddNotes(<?php echo $uid; ?>)" class="btn btn-default enable-tooltip" data-original-title="Add Notes"><i class="fa fa-info"></i></a>
					<a href="#" class="btn btn-info enable-tooltip" data-original-title="Manage Account"><i class="fa fa-sign-in"></i></a>-->
				
							</div>
						</td>
	</tr>
<?php } ?>
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
  
<div class="modal fade" id="stack1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Credit Detail</h4>
        </div>
        <div class="modal-body">
	    <table>
		<thead>
		    <tr>
			<th>Field Name</th>
			<th>Data</th>
		    </tr>
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


<!--<div class="modal fade" id="stack2" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title" id="modal_credit_add_title"></h4>
        </div>
        <div class="modal-body">
	    <?php echo $this->Form->create('User',array('action'=>'admin_add_credit'));?>
	    
	    <div class="form-group ">
			<label for="email" class="control-label col-lg-4">
			    Select Credit Package <span style="color:red;">*</span>
			</label>
                       <div class="col-lg-8">
			   <input name="data[User][id]" id="userId" type="hidden">
			    <?php  echo $this->Form->input('credit_package',array('label'=>false,'required'=>'required','class'=>'form-control','options'=>$credits,'empty'=>'--Select Credits--')); ?>              
                        </div>
            </div>
	    <div>&nbsp;</div>
	    <div class="form-group" style="padding-left:10%;">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
            </div>
            <?php echo $this->Form->end();	?>
	    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="stack5" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
	    <h4 class="modal-title" id="modal_addnotes"></h4>
        </div>
        <div class="modal-body">
	    <?php echo $this->Form->create('User',array('action'=>'admin_user_notes'));?>
	    
	    <div class="form-group ">
			<label for="email" class="control-label col-lg-4">
			   Enter Notes <span style="color:red;">*</span>
			</label>
                       <div class="col-lg-8">
			   <input name="data[User][id]" id="usernoteId" type="hidden">
			    <?php  echo $this->Form->input('notes',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Enter Notes','type'=>'textarea')); ?>              
                        </div>
            </div>
	    <div>&nbsp;</div>
	    <div class="form-group" style="padding-left:10%;">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
            </div>
            <?php echo $this->Form->end();	?>
	    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>-->
<!--</div>  -->


<script>
     
   /* function getAwaitAds(userid){
	// alert(userid);
	 $.ajax({
		type:'post',
		url:'get_await_ad.php',
		data:{userid:userid},
		success:function(data){
		    //alert(data);
		    $('#stack2_wait').empty();
		    $('#stack2_wait').html(data);
		}
	    });
    }
    
    
    function getRejectAds(userid){
	// alert(userid);
	 $.ajax({
		type:'post',
		url:'get_reject_ad.php',
		data:{userid:userid},
		success:function(data){
		    //alert(data);
		    $('#stack3_reject').empty();
		    $('#stack3_reject').html(data);
		}
	    });
    }
    
    function getExpiredAds(userid){
	// alert(userid);
	 $.ajax({
		type:'post',
		url:'get_expired_ad.php',
		data:{userid:userid},
		success:function(data){
		    //alert(data);
		    $('#stack4_expire').empty();
		    $('#stack4_expire').html(data);
		}
	    });
    }
    
    function getTotalbalance(userid){
	$.ajax({
		type:'post',
		url:'getTotalToken.php',
		data:{userid:userid},
		success:function(data){
		    //alert(data);
		    $('#stack5_totalToken').empty();
		    $('#stack5_totalToken').html(data);
		}
	    });
    }
    //function change_data(id,name,descr,img,mapimg,url){
   function change_data(id,name,descr,img,mapimg,url){
	    //console.log(id+'|'+name+'|'+desc+'|'+img+'|'+map+'|'+url);
	    alert(id);
	    alert(name);
	   // $('#stack2').modal('hide');
	    $('#title').html(name);
	    $('#description').html(descr);
	    $('#map').html('<img src="'+mapimg+'" style="height:100px;width:100px;">');
	    $('#image').html('<img src="<?php echo SITE_URL;?>'+img+'" style="height:100px;width:100px;">');
	    $('#url').html('<a href="'+url+'" target="_blank">'+url+'</a>');
	    $('#stack22').modal('show');
    }*/
function del(aa){
	var a=confirm("Are you sure, you want to delete this?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/credits/delete/"+aa;
      } 
}
    
function active(aa)
{
	var a=confirm("Are you sure, you want to active the Credit?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/credits/credit_status/"+aa;
      } 
}

function Inactive(aa)
{
	var a=confirm("Are you sure, you want to Inactive the Credit?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/credits/credit_status/"+aa;
      } 
}
</script>
