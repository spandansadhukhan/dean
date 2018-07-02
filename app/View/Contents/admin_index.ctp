<?php
//pr($users); exit;
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 

?>
  <div class="wrapper">
      <div class="row">
          <div class="row state-overview">
                        <div class="col-md-4 col-xs-12 col-sm-6">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"><?php echo $total_page ?></div>
                                    <div class="title">Total</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-6">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"><?php echo $active_page ?></div>
                                    <div class="title">Active</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-6">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"><?php echo $inactive_page; ?></div>
                                    <div class="title">Inactive</div>
                                </div>
                            </div>
                        </div>
                    </div>
      </div>
    <div class="row gap_row">
      <div class="col-sm-12">
          
        <section class="panel">
        <header class="panel-heading">
            Purchased Advertisement (Total Records: <?php echo $total_page; ?>)
        </header>
           <?php echo $this->Form->create("Filter",array('class' => 'filter'));?>
           <?php echo $this->Form->input("advace_search_type",array('type'=>'hidden','value'=>0))?>
            <div class="table-options clearfix" style=" background-color:#fff">
				<div class="clearfix pull-left" style="display:<?php if(isset($this->request->data['Filter']['advace_search_type']) and $this->request->data['Filter']['advace_search_type']==1){?>none; <?php }else{ ?>block;<?php } ?>" id="filterInput">
				&nbsp;<button title="" class="btn btn-alt btn-primary gap_up enable-tooltip" id="advanceSearch" type="button" data-original-title="Advance Search"><i class="fa fa-sun-o fa-lg"></i></button>
				<div class="btn-group btn-group-sm pull-left">
						<div class="input-group">
                                                     <?php echo $this->Form->input("page_heading",array("type"=>"text",'class'=>'form-control col-md-6','placeholder'=>'Search by page name ...','label'=>false))?>
								<span class="input-group-btn">
								<button class="btn btn-primary" type="submit" name="search_single">Search</button>
							</span>
						</div>
				</div>
				</div>
				
		</div>
         <?php echo $this->Form->end();?>
  
       <div style=" clear:both;"></div>     
       <?php echo $this->Form->create("Filter",array('class' => 'filter'));?>
      <?php echo $this->Form->input("advace_search_type",array('type'=>'hidden','value'=>1))?>

       <div style="display:<?php if(isset($this->request->data['Filter']['advace_search_type'])and $this->request->data['Filter']['advace_search_type']==1){?>block; <?php }else{ ?>none;<?php } ?>" class="col-md-12" id="adv_box">
       <div style="display:inline;">
       <div class="block full">
       <div class="block-title">
        <div class="block-options pull-right form-actions">
            <button class="btn btn-alt btn-sm btn-danger enable-tooltip" id="advanceSearch_close" type="button" data-original-title="Advance Search close"  data-toggle="tooltip" data-placement="top" title="Advance Search Close" onclick="advance_close();"><i class="fa fa-times"></i></button>
             <button class="btn btn-alt btn-sm btn-warning enable-tooltip" onclick="location.href='<?php echo $this->webroot;?>admin/contents'" type="button" data-original-title="Reset Search" data-toggle="tooltip" data-placement="top" title="Reset Search"><i class="fa fa-repeat"></i></button>
        </div>
       <h2><strong>Advance </strong>Search</h2>
   </div>
           
                               <div class="form-inline">
                                    <div class="form-group">
                                        <label for="example-if-email" class=""> Total Search Key</label><br>
                                        <?php echo $this->Form->input("page_heading",array('type'=>"text",'class'=>'form-control','placeholder'=>'Search by page name...','label'=>false,'div'=>false))?>

                                        </div>
                                         <div class="form-group">
                                         <label for="example-if-email"> Show Me</label>
                                         <br>
                                         <?php
                                            echo $this->Form->input("is_active",array('options'=>$ad_types,'class'=>'select-chosen','data-placeholder'=>'Choose a Type..','style'=>'width: 250px','selected'=>!empty($this->request->data['Filter']['is_active'])?$this->request->data['Filter']['is_active']:'','label'=>false,'div'=>false));
                                        
                                         ?>
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="example-if-email"> Sort By</label>
                                        <br>
                                        
                                        <?php
                                            echo $this->Form->input("direction",array('options'=>$directions,'empty'=>'All','class'=>'select-chosen','data-placeholder'=>'Choose a Type..','style'=>'width: 250px','selected'=>!empty($this->request->data['Filter']['direction'])?$this->request->data['Filter']['direction']:'','label'=>false,'div'=>false));
                                         ?>
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" style="margin-top:23px;" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                               
                            </div>
						</div>
				</div>     
         <?php echo $this->Form->end();?>    
       
            
            
        <div class="adv-table col-sm-12">
            
        <table  class="display table table-bordered table-striped">
        <thead>
	<tr>
                <th><input type="checkbox" id="selectAll"></th>
		<th><?php echo $this->Paginator->sort('id','Invoice Id'); ?></th>
		<th><?php echo $this->Paginator->sort('page_name','Page Name'); ?></th>
		<th><?php echo $this->Paginator->sort('page_heading','Heading'); ?></th>
		<th><?php echo $this->Paginator->sort('is_active','Status'); ?></th>
		<th><?php echo $this->Paginator->sort('add_date','Add Date'); ?></th>
		<th><?php echo 'Actions'; ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php foreach ($contents as $content):
	    
	    ?>
        <tr class="gradeX">
            <td><input type="checkbox" class="changestatus" value="<?php echo $content["Content"]["id"]; ?>"></td>
        <td><?php echo $content["Content"]["id"]; ?></td>
        <td><?php echo $content["Content"]["page_name"]; ?></td>
        <td><?php echo $content["Content"]["page_heading"]; ?></td>
        <td><?php echo $content["Content"]["is_active"]?"Active":"Inactive"; ?></td>
        <td><?php echo $content["Content"]["add_date"]; ?></td>
        <td class="text-center">
        <div class="btn-group btn-group-sm">
            <a href="javascript:void(0);" onclick="viewad(<?php echo $content['Content']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>
            <a href="<?php echo $this->webroot;?>admin/contents/edit/<?php echo $content['Content']['id']; ?>" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="edit Record"><i class="fa fa-pencil" aria-hidden="true"></i></a>                
                <?php 
        if($content["Content"]["is_active"]==0)
        {
        ?>
        <a href="<?php echo $this->webroot; ?>admin/contents/changestatus/<?php echo $content['Content']['id']; ?>/1" class="btn btn-default enable-tooltip view-record" data-original-title="Active" 
        style="background-color:#f7be64;border-color:#f7be64; display: inline-block;"><i class="fa fa-circle-o"></i></a>
        <?php }else{?>
       <a href="<?php echo $this->webroot; ?>admin/contents/changestatus/<?php echo $content['Content']['id']; ?>/0" class="btn btn-default enable-tooltip view-record" data-original-title="Inactive"
          style="background-color:#aad178;border-color:#7db831; display: inline-block;"
          ><i class="fa fa-circle-o"></i></a>

        <?php }?>


        </div>
        </td>

        </tr>
        
<?php endforeach; ?>
        <tr>
            <td colspan="7">
                <div class="btn-group btn-group-sm">
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" id="multiple_active" title="" data-original-title="Active Selected" onclick="bulk_active(1)"><i class="fa fa-circle-o"></i></a>
               <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" id="multiple_inactive" title="" data-original-title="Inactive Selected" onclick="bulk_active(0)"><i class="fa fa-circle"></i></a>
                                            
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
        
 
      </section>
      </div>    
    </div>
  </div>
</div>
 <!-- <div class="container">-->
<script>
function viewad(userid){
  //alert(userid);
	$.get('<?php echo($this->webroot)?>admin/contents/view/'+userid,function(data){

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
$("#selectAll").change(function(){
 if($(this).is(':checked'))
 {
   $(".changestatus").prop("checked",true)  ;
 }
 else
 {
        $(".changestatus").prop("checked",false)  ;

 }
 })    ;
    
    
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

function bulk_active(status)
{
    var content_id=[];
    var is_checked=0;    

    $(".changestatus").each(function(){
     if($(this).is(':checked'))
     {
         content_id.push($(this).val());
         is_checked=1;
     }    
        
    });
    if(is_checked)
    {
        var data={content_id:content_id,status:status};
        $.post("<?php echo $this->webroot;?>admin/contents/bulk_active/",data,function(result){
        if(result.trim()==1)    
        {
         location.href="<?php echo $this->webroot; ?>admin/contents/index";
        }
        else
        {
         location.reload();
        }
        });
    }
    else
    {
        alert("Please select atleast one checkbox");
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
          <h4 class="modal-title">CMS Page Detail </h4>
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
        
        .widget-simple{
            padding:15px !important;
        }
        .widget-icon.pull-left {
            margin-left:0px !important;
        }
        .widget-simple .widget-content {
            font-size: 17px;
            margin: 0px 0;
        }
        strong 
        {
            font-weight:600 !important;
        }
        #stack1_view td{
            width:20%;
        }
            
  </style>
