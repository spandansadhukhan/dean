<?php
//pr($users); exit;
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true));

?>
  <div class="wrapper">
    <div class="row">
				<div class="col-sm-9 col-lg-2">
							
                            <a href="<?php echo $this->webroot; ?>admin/eyecolors" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-info btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Eye Color</button>
                            </a>
                            
                 </div>
				<div class="col-sm-9 col-lg-2">
							
                            <a href="<?php echo $this->webroot; ?>admin/haircolors" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-info btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Hair Color</button>
                            </a>
                            
                 </div>
                 <div class="col-sm-9 col-lg-2">
							
                            <a href="<?php echo $this->webroot; ?>admin/nationalities" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-info btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Ethnicity</button>
                            </a>
                            
                 </div>
                 <div class="col-sm-9 col-lg-2">
							
                            <a href="<?php echo $this->webroot; ?>admin/body_types" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-info btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Body Types</button>
                            </a>
                            
                 </div>
<!--
                 <div class="col-sm-9 col-lg-2" >
							
                            <a href="http://layout9.demoparlour.com/advdirectory/admin/languages" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-info btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Language</button>
                            </a>
                            
                 </div>
-->
                 <div class="col-sm-9 col-lg-2">
							
                            <a href="<?php echo $this->webroot; ?>admin/cup_sizes" class=" widget-hover-effect1" style="text-decoration:none">
                                <button class="btn btn-sm btn-success btn-block" type="button" style="font-size:20px;margin-bottom:10px;">Cup Size</button>
                            </a>
                            
                 </div>
	</div>  
    <div class="row gap_row">
      <div class="col-sm-12">
          
        <section class="panel">
        <header class="panel-heading">
            Cup Size  (Total Records: <?php echo $total_cupsize; ?>)
        </header>
           <?php echo $this->Form->create("Filter",array('class' => 'filter'));?>
           <?php echo $this->Form->input("advace_search_type",array('type'=>'hidden','value'=>0))?>
            <div class="table-options clearfix" style=" background-color:#fff">
				<div class="clearfix pull-left" style="display:<?php if(isset($this->request->data['Filter']['advace_search_type']) and $this->request->data['Filter']['advace_search_type']==1){?>none; <?php }else{ ?>block;<?php } ?>" id="filterInput">
				&nbsp;<button title="" class="btn btn-alt btn-primary gap_up enable-tooltip" id="advanceSearch" type="button" data-original-title="Advance Search"><i class="fa fa-sun-o fa-lg"></i></button>
				<div class="btn-group btn-group-sm pull-left">
						<div class="input-group">
                                                     <?php echo $this->Form->input("name",array("type"=>"text",'class'=>'form-control col-md-6','placeholder'=>'Search by  name ...','label'=>false))?>
								<span class="input-group-btn">
								<button class="btn btn-primary" type="submit" name="search_single">Search</button>
							</span>
						</div>
				</div>
				</div>
                
                <div class="btn-group btn-group-sm pull-right">
					<a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" href="<?php echo $this->webroot;?>admin/cup_sizes/add" data-original-title="Add CupSize">Add New</a>
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
             <button class="btn btn-alt btn-sm btn-warning enable-tooltip" onclick="location.href='<?php echo $this->webroot;?>admin/cup_sizes'" type="button" data-original-title="Reset Search" data-toggle="tooltip" data-placement="top" title="Reset Search"><i class="fa fa-repeat"></i></button>
        </div>
       <h2><strong>Advance </strong>Search</h2>
   </div>
           
                               <div class="form-inline">
                                    <div class="form-group">
                                        <label for="example-if-email" class=""> Total Search Key</label><br>
                                        <?php echo $this->Form->input("name",array('type'=>"text",'class'=>'form-control','placeholder'=>'Search by  name...','label'=>false,'div'=>false))?>

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
		<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
		<th><?php echo $this->Paginator->sort('body_type','Body Type'); ?></th>
		<th><?php echo $this->Paginator->sort('is_active','Status'); ?></th>
		<th><?php echo $this->Paginator->sort('posttime','Add Date'); ?></th>
		<th><?php echo 'Actions'; ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php foreach ($cupSizes as $content):
	    
	    ?>
        <tr class="gradeX">
        <td><input type="checkbox" class="changestatus" value="<?php echo $content["CupSize"]["id"]; ?>"></td>
        <td><?php echo $content["CupSize"]["id"]; ?></td>
        <td><?php echo $content["CupSize"]["name"]; ?></td>
        <td><?php echo $content["CupSize"]["is_active"]?"Active":"Inactive"; ?></td>
        <td><?php echo date("Y-m-d",strtotime($content["CupSize"]["posttime"])); ?></td>
        <td class="text-center">
        <div class="btn-group btn-group-sm">
            <a href="javascript:void(0);" onclick="viewad(<?php echo $content['CupSize']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>
            <a href="<?php echo $this->webroot;?>admin/cup_sizes/edit/<?php echo $content['CupSize']['id']; ?>" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="edit Record"><i class="fa fa-pencil" aria-hidden="true"></i></a>                
           <a href="javascript:void(0)" onclick="del(<?php echo $content['CupSize']['id'];?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="View Record" onclick="bulk_delete()"><i class="fa fa-times" aria-hidden="true"></i></a>


 <?php 
        if($content["CupSize"]["is_active"]==0)
        {
        ?>
        <a href="<?php echo $this->webroot; ?>admin/cup_sizes/changestatus/<?php echo $content['CupSize']['id']; ?>/1" class="btn btn-default enable-tooltip view-record" data-original-title="Active" 
        style="background-color:#f7be64;border-color:#f7be64; display: inline-block;"><i class="fa fa-circle-o"></i></a>
        <?php }else{?>
       <a href="<?php echo $this->webroot; ?>admin/cup_sizes/changestatus/<?php echo $content['CupSize']['id']; ?>/0" class="btn btn-default enable-tooltip view-record" data-original-title="Inactive"
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
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" id="multiple_inactive" title="" data-original-title="Delete Selected" onclick="bulk_delete()"><i class="fa fa-times"></i></a>
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
	$.get('<?php echo($this->webroot)?>admin/cup_sizes/view/'+userid,function(data){

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

//$('.select-chosen').chosen();
});
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
<?php if(isset($this->request->data['Filter']['advace_search_type'])==1){?>
//$('.select-chosen').chosen();
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
        location.href="<?php echo $this->webroot?>admin/cup_sizes/delete/"+aa;
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
        $.post("<?php echo $this->webroot;?>admin/cup_sizes/bulk_active/",data,function(result){
        if(result.trim()==1)    
        {
         location.href="<?php echo $this->webroot; ?>admin/cup_sizes/index";
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

function bulk_delete()
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
        
        var a=confirm("Are you sure, you want to delete this Selected Item?")
        if (a)
        {
            var data={content_id:content_id};
            $.post("<?php echo $this->webroot;?>admin/cup_sizes/bulkdelete/",data,function(result){
            if(result.trim()==1)    
            {
             location.href="<?php echo $this->webroot; ?>admin/cup_sizes/index";
            }
            else
            {
             location.reload();
            }
            });
        } 
        
        
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
          <h4 class="modal-title">Cup Size </h4>
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
