<?php
//pr($users); exit;
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 

?>
  <div class="wrapper">
    <div class="row gap_row">
      <div class="col-sm-12">
          
        <section class="panel">
        <header class="panel-heading">
            Happy Hours
        </header>
            <div class="table-options clearfix" style=" background-color:#fff">
				
                <div class="btn-group btn-group-sm pull-right">
                        <a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" href="<?php echo $this->webroot;?>admin/escorts/addhappyhour" data-original-title="Add Happy hour">Add New</a>
                </div>
            </div>
  
       <div style=" clear:both;"></div>          
        <div class="adv-table col-sm-12">
            
        <table  class="display table table-bordered table-striped">
        <thead>
	<tr>
		<th>SL No</th>
                <th>Escort</th>
                <th>Start Time</th>
		<th>End Time</th>
		<th>Avalability</th>
		<th><?php echo 'Actions'; ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php
        $count=0;
        foreach ($happy_hours as $happy_hour):
	$count++;    
        ?>
        <tr class="gradeX">
       
        <td><?php echo $count; ?>&nbsp;</td>
        <td><?php echo $happy_hour["User"]["name"]; ?>&nbsp;</td>
        <td><?php echo date("h:i a",strtotime($happy_hour["Happyhour"]["start_time"])); ?>&nbsp;</td>
        <td><?php echo date("h:i a",strtotime($happy_hour["Happyhour"]["end_time"])); ?>&nbsp;</td>
        <td><?php echo $happy_hour["Happyhour"]["availibilty"]==1?'Yes':'No'; ?>&nbsp;</td>
       



        <td class="text-center">
        <div class="btn-group btn-group-sm">
        <a href="javascript::void(0)" onclick="del(<?php echo $happy_hour['Happyhour']['id'];?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="View Record"><i class="fa fa-times" aria-hidden="true"></i></a>

        <a href="<?php echo $this->webroot;?>admin/escorts/edithappyhour/<?php echo $happy_hour['Happyhour']['id']; ?>" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="edit Record"><i class="fa fa-pencil" aria-hidden="true"></i></a>

        </div>
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
        
 
      </section>
      </div>    
    </div>
  </div>
</div>
 <!-- <div class="container">-->
<script>
function getViewUser(userid){
  //alert(userid);
	$.post('<?php echo($this->webroot)?>admin/escorts/view/'+userid,function(data){

        $("#myModal").modal("show");   
         $('#stack1_view').empty();
        $('#stack1_view').html(data); 
       
	});
    }
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
$("#advanceSearch").click(function(){
$("#filterInput").hide();
$("#adv_box").show();
$('.select-chosen').chosen();
});
<?php if(isset($this->request->data['Filter']['advace_search_type'])==1){?>
$('.select-chosen').chosen();
<?php } ?>        
});

function advance_close()
{
 $("#adv_box").hide();
 $("#filterInput").show();
}

function del(aa){
  var a=confirm("Are you sure, you want to delete this?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/users/delete/"+aa;
      } 
}
  

</script>



  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Escort Detail</h4>
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

  <style>
      .block{
        margin-bottom:20px;   
      }
      .block {
    background-color: #ffffff;
    border: 1px solid #dbe1e8;
    margin: 0 0 10px;
    padding: 20px 15px 1px;
    }
    .block.full {
    padding: 20px 15px;
}
.block-title,.block-top
{
 margin:-20px -15px 20px;
}
.block-title{
 background-color:#f9fafc;
 border-bottom:1px solid #eaedf1;
 min-height:40px;
 
}
.block-options
{
  line-height:37px;   
  margin:0 6px;
  min-height:40px;
}
.block-title h2
{
 padding-left:15px;
 padding-right:15px;
 padding-top:7px;
 display: inline-block;
 font-size:16px;
 font-weight:normal;
 line-height:1.4;
 margin:0
}
.borderOneblue{
        border:1px dashed #286090;
    }
    .cursor{
        cursor: pointer;
    }
    .col-center-block {
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        text-align: center;
        font-size:20px;
    }
    .col-center-block1 {
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1%;
        text-align: center;
        font-size:20px;
    }
    
    /*Kallol css*/
    
    .table-options {
		    width: 98%;
    margin: 0 auto;
	}
	.table-options > .pull-left {
		 padding: 10px 0;
	}
	.gap_up  {
		margin-bottom:5px;
		
	}
	.gap_up_down {
		margin-top: 5px;
	}
	.adv-table {
		padding:0;
	}
	.gap_row {
		width: 98%;
		margin: 0 auto;
		background: #fff;
		padding: 10px 0;
	}
	#adv_box {
		padding:0;
	}
  </style>
  <script>
   function deleterec($id)   
   {
       var r = confirm("Are you want to remove this?");
        if (r == true) 
        {
            
        } 
    }     
  </script>    




