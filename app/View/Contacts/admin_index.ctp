<?php
//pr($users); exit;
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 

?>
  <div class="wrapper">
      
      
      
      <div class="row gap_row_new">
        <div class="col-sm-9 col-lg-4">
            <a href=#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Total</strong><br>
                        <small><?php echo $total_contact;?></small>
                    </h3>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-lg-4">
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-check-square-o fa-1x"></i>
                    </div>
                    <h3 class="widget-content text-right text-success animation-pullDown">
                        <strong>Read</strong><br>
                        <small><?php echo $read_contact;?></small>
                    </h3>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-lg-4">
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-exclamation fa-1x"></i>
                    </div>
                    <h3 class="widget-content text-right text-warning animation-pullDown">
                        <strong>Unread</strong><br>
                        <small><?php echo $unread_contact;?></small>
                    </h3>
                </div>
            </a>
        </div>

    </div>
      
     
      
      
    <div class="row gap_row">
      <div class="col-sm-12">
          
        <section class="panel">
        <header class="panel-heading">
            All Site Inquires  (Total Records: <?php echo $total_contact; ?>)
        </header>
           <?php echo $this->Form->create("Filter",array('class' => 'filter'));?>
           <?php echo $this->Form->input("advace_search_type",array('type'=>'hidden','value'=>0))?>
            <div class="table-options clearfix" style=" background-color:#fff">
				<div class="clearfix pull-left" style="display:<?php if(isset($this->request->data['Filter']['advace_search_type']) and $this->request->data['Filter']['advace_search_type']==1){?>none; <?php }else{ ?>block;<?php } ?>" id="filterInput">
				&nbsp;<button title="" class="btn btn-alt btn-primary gap_up enable-tooltip" id="advanceSearch" type="button" data-original-title="Advance Search"><i class="fa fa-sun-o fa-lg"></i></button>
				<div class="btn-group btn-group-sm pull-left">
						<div class="input-group">
                                                     <?php echo $this->Form->input("name",array("type"=>"text",'class'=>'form-control col-md-6','placeholder'=>'Search by  name or subject...','label'=>false))?>
								<span class="input-group-btn">
								<button class="btn btn-primary" type="submit" name="search_single">Search</button>
							</span>
						</div>
				</div>
				</div>
                
<!--                <div class="btn-group btn-group-sm pull-right">
					<a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" href="<?php echo $this->webroot;?>admin/adpackages/add" data-original-title="Add New Package">Add New</a>
				</div>-->
                
				
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
             <button class="btn btn-alt btn-sm btn-warning enable-tooltip" onclick="location.href='<?php echo $this->webroot;?>admin/contacts'" type="button" data-original-title="Reset Search" data-toggle="tooltip" data-placement="top" title="Reset Search"><i class="fa fa-repeat"></i></button>
        </div>
       <h2><strong>Advance </strong>Search</h2>
   </div>
           
                               <div class="form-inline">
                                    <div class="form-group">
                                        <label for="example-if-email" class=""> Total Search Key</label><br>
                                        <?php echo $this->Form->input("name",array('type'=>"text",'class'=>'form-control','placeholder'=>'Search by  name or subject...','label'=>false,'div'=>false))?>

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
		<th><?php echo $this->Paginator->sort('name','Name'); ?></th>
		<th><?php echo $this->Paginator->sort('email','Email'); ?></th>
                <th><?php echo $this->Paginator->sort('phone','Phone'); ?></th>
		<th><?php echo $this->Paginator->sort('subject','Subject'); ?></th>
		<th><?php echo $this->Paginator->sort('posttime','Sent On'); ?></th>
		<th><?php echo 'Actions'; ?></th>
		
	</tr>
        </thead>
        <tbody>
	<?php foreach ($contacts as $content):
	    
	    ?>
        <tr class="gradeX">
            <td><input type="checkbox" class="changestatus" value="<?php echo $content["Contact"]["id"]; ?>"></td>
        <td><?php echo $content["Contact"]["id"]; ?></td>
        <td><?php echo $content["Contact"]["name"]; ?></td>
        <td><?php echo $content["Contact"]["email"]; ?></td>
        <td><?php echo $content["Contact"]["phone"]; ?></td>
        <td><?php echo $content["Contact"]["subject"]; ?></td>
        <td><?php echo date("Y-m-d",strtotime($content["Contact"]["posttime"])); ?></td>
        <td class="text-center">
        <div class="btn-group btn-group-sm">
            <a href="javascript:void(0);" onclick="viewad(<?php echo $content['Contact']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>
            <a href="javascript:void(0)" onclick="del(<?php echo $content['Contact']['id'];?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="View Record" onclick="bulk_delete()"><i class="fa fa-times" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" onclick="reply(<?php echo $content['Contact']['id'];?>);" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="Reply Record" style="background-color:#aad178;border-color:#7db831;color:#ffffff;"><i class="fa fa-reply" aria-hidden="true"></i></a>

 


        </div>
        </td>

        </tr>
        
<?php endforeach; ?>
        <tr>
            <td colspan="7">
                <div class="btn-group btn-group-sm">
                    
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
	$.get('<?php echo($this->webroot)?>admin/contacts/view/'+userid,function(data){
        $("#myModal").modal("show");   
        $('#stack1_view').html(data.html); 
        $("#readcontact").html(data.read_contact);
        $("#unreadcontact").html(data.unread_contact);
	},"json");
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
        location.href="<?php echo $this->webroot?>admin/contacts/delete/"+aa;
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
            $.post("<?php echo $this->webroot;?>admin/contacts/bulkdelete/",data,function(result){
            if(result.trim()==1)    
            {
             location.href="<?php echo $this->webroot; ?>admin/contacts/index";
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
  
function reply(id)
{
    $("#messae_id").attr("value",id);
    $("#replyModal").modal("show");
}
</script>



  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Inquiry Detail </h4>
        </div>
          <div class="modal-body">
      <table >
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
  
  <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Reply Message
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form" method="post" action="<?php echo $this->webroot; ?>admin/contacts/reply">
                    <input type="hidden" id="messae_id" name="messae_id">
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Message</label>
                     
                      <textarea class="form-control" name="message" required=""></textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            
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

<style type="text/css">
    .widget-simple {
        padding: 15px;
    }

    .themed-background {
        background-color: #1BBAE1;
    }

    .widget .widget-image, .widget .widget-icon {
        width: 64px;
        height: 64px;
    }
    .widget .widget-icon {
        display: inline-block;
        line-height: 64px;
        text-align: center;
        font-size: 28px;
        color: #FFF;
        border-radius: 32px;
    }

    .widget-simple .widget-image, .widget-simple .widget-icon {
        margin: 0px 15px;
    }

    .widget-simple .widget-image.pull-left, .widget-simple .widget-icon.pull-left {
        margin-left: 0px;
    }

    .themed-background-spring {
        background-color: #27AE60 !important;
    }

    .themed-background-autumn {
        background-color: #E67E22 !important;
    }

    .text-warning, .text-warning:hover, a.text-warning, a.text-warning:hover, a.text-warning:focus {
        color: #E67E22;
    }

    .text-success, .text-success:hover, a.text-success, a.text-success:hover, a.text-success:focus {
        color: #27AE60;
    }

    .widget-content .text-right .animation-pullDown {
        color: #1BBAE1;

    }


    a.widget {
        display: block;
        transition: all 0.2s ease-out 0s;
    }

    .widget {
        background-color: #FFF;
    }
    .block, .widget {
        margin-bottom: 20px;
    }

    .gap_row_new{
        width: 98%;
        margin: 0px auto;
        margin-left: 0;
        margin-right: 0;
        padding: 0;
    }
</style>

