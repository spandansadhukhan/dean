<?php
//echo "hello";exit; 
//pr($orderdetails); exit;
?>
<script type="text/javascript"  src="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo $this->webroot;?>admin_styles/js/dynamic_table_init.js"></script>
<script>
    function getViewUser(userid){
	$.post('<?php echo($this->webroot)?>admin/users/view/'+userid,function(data){
		    //alert(data);
		    $('#stack1_view').empty();
		    $('#stack1_view').html(data);
	});
    }
    
   function AddCredit(id,name){
	//alert(id);
	//alert(name);
	$('#modal_credit_add_title').text('Assign Credits to '+name);
	$('#userId').val(id);
    }
    
    function AddNotes(id,name){
	//alert(id);
	//alert(name);
	$('#modal_addnotes').text('Notes For '+name);
	$('#usernoteId').val(id);
    }
</script>

 <!-- <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo $this->webroot;?>admin_styles/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $this->webroot;?>admin_styles/js/data-tables/DT_bootstrap.css" /> -->
  <div class="wrapper">
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Order Details #<?php echo $orderdetails[0]['OrderDetail']['order_id']; ?>
        </header>
        <div class="panel-body">
        <div class="adv-table">
	<!--<a href="<?php echo $this->webroot.'admin/users/add'; ?>" style="float:right">Add New</a>
	 <table>
		<tr>
		    <form action="" method="post" style="margin: 0px;">
		        <td style="width:30%;border:0px solid red;">	
		              <input type="text" name="data[User][title]" id="title" placeholder="Search By User name" value="<?php if(isset($stitle)&&($stitle!='')){echo $stitle;} ?>" style="float: left;width:100%;margin-right:10px;">
		         </td>
		         <td style="width:70%;border:0px solid red;">	
		             <input type="submit" value="Search" style="float: left;margin: 0px 0px 0px 12px;" class="">
		          </td>	
		      </form>
		</tr>
	</table> -->
        <!-- <table  class="display table table-bordered table-striped" id="dynamic-table"> -->
        <table  class="display table table-bordered table-striped" id="">
		<thead>
			<tr>
				<th><input type="checkbox" id="selectAll"></th>
				<th><?php echo 'Order Id'; ?></th>
				<th><?php echo 'User'; ?></th>
				<th><?php echo 'Order Qty'; ?></th>
				<th><?php echo 'Order Price'; ?></th>
				<th><?php echo 'Shipping Price'; ?></th>
				<th><?php echo 'Seller Amount'; ?></th>
				<th><?php echo 'Order Date'; ?></th>

			</tr>
		</thead>
        <tbody>
	<?php foreach ($orderdetails as $user):
	    // $uid = $user['User']['id'];
	    // $uname = $user['User']['username'];
	    ?>
	<tr class="gradeX">
		<td><input type="checkbox" id="onecheck"></td>
		<td><?php echo $user['OrderDetail']['order_id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['name']; ?>&nbsp;</td>
		<td><?php echo $user['OrderDetail']['amount']; ?>&nbsp;</td>
		<td><?php echo $user['Order']['total_amount']; ?>&nbsp;</td>
		<td><?php echo $user['OrderDetail']['shipping_cost']; ?>&nbsp;</td>
		<td><?php echo $user['Order']['total_amount']; ?>&nbsp;</td>
		<td><?php echo $user['OrderDetail']['order_date']; ?>&nbsp;</td>		
        
	</tr>
<?php 
	endforeach; ?>
        </tbody>
        </table>
		<a href="<?php echo $this->webroot ?>admin/users/orderlist" class="">Back</a>

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
          <h4 class="modal-title">Users Detail</h4>
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

<!--<div id="stack2" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Assign Credits to </h3>
  </div>
  <div class="modal-body">
    <table class="table">
	<tbody id="stack2_wait">
	   
	</tbody>
    </table>
    
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
    
  </div>
</div>-->
<div class="modal fade" id="stack2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
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
    
      <!-- Modal content-->
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
</div>
<!--</div>  -->

<!--<script type="text/javascript">
$(document).ready(function(){
    $('.view-record').click(function () {
        $('#viewModal').modal('show');
    }); 
    
    $('.facts_edit').click(function () {
        $('#FactModal').modal('show');
    }); 
    
    $('.about_edit').click(function () {
        $('#AboutMeModal').modal('show');
    }); 
    
    $('.profile_pic_edit').click(function () {
        $('#ProfPicModal').modal('show');
    });
    
    $('#editprodetails').click(function () {
        $('#ProfPicModal').modal('show');
    });
    
    $("#Profile_img").change(function(){
        readURL(this);
    });   
});  
</script>-->
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
        location.href="<?php echo $this->webroot?>admin/users/delete/"+aa;
      } 
}
    
/*function inactive(aa,title)
{ 
	$('#stack2').modal('hide');
	$('#rej_title').html(title);
	$('#cid').val(aa);
	$('#reject_comment').val('');
	$('#footer').html('<button type="submit" name="sendNotice" value="sendNotice" class="btn btn-primary">Send Notice</button><button type="button" onclick="del(\''+aa+'\')" class="btn btn-primary" name="reject_post">Delete</button>');
	$('#stack23').modal('show');
} 
*/
function active(aa)
{
	var a=confirm("Are you sure, you want to active the User?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/users/user_inactive/"+aa;
      } 
}

function Inactive(aa)
{
	var a=confirm("Are you sure, you want to Inactive the User?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/users/user_inactive/"+aa;
      } 
}
</script>
