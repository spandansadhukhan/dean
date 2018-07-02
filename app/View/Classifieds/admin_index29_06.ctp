<?php

//echo "hello";exit;
//pr($users);
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 
$sl_no=0;

?>

<div class="wrapper">

    <div class="row gap_row">
        <div class="col-sm-12">

            <section class="panel">
                <div class="table-options clearfix" style=" background-color:#fff">
				
				<div class="btn-group btn-group-sm pull-right">
					<a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" 
                                           href="<?php echo $this->webroot; ?>admin/classifieds/add" data-original-title="Add New Classified Ads">Add New</a>
				</div>
		</div>
                <div class="adv-table col-sm-12">

                    <table  class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo 'Category'; ?></th>
                                <th><?php echo 'Title'; ?></th>
                                <th><?php echo 'User'; ?></th>
                                <th><?php echo 'Actions'; ?></th>

                            </tr>
                        </thead>
                        <tbody>
	                <?php 
                        foreach ($classifieds as $classified):
                        ++$sl_no;    
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $sl_no; ?>&nbsp;</td>
                                <td><?php echo $classified["ClassifiedCategory"]["name"]; ?>&nbsp;</td>
                                <td><?php echo $classified['Classified']['name']; ?>&nbsp;</td>
                                <td><?php echo $classified['User']['name']; ?>&nbsp;</td>
                                <td>
                                    <a href="<?php echo $this->webroot; ?>admin/classifieds/edit/<?php echo $classified['Classified']['id']; ?>">Edit</a>
                                    <a href="javascript:void(0)" onclick="view(<?php echo $classified['Classified']['id']; ?>)">View</a>
                                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteclassified', $classified['Classified']['id']), null, __('Are you sure you want to delete # %s?', $classified['Classified']['id'])); ?>

                                  <?php if($classified['Classified']['status']==1)
                                  {
                                  echo $this->Html->link(__('Deactive'), array('action' => 'activeclassified', $classified['Classified']['id'],0));
                                  }
                                  else {
                                  echo $this->Html->link(__('Active'), array('action' => 'activeclassified', $classified['Classified']['id'],1));
                                  }
                                ?>
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

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $("#advanceSearch").click(function () {
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

    function del(aa) {
        var a = confirm("Are you sure, you want to delete this?")
        if (a)
        {
            location.href = "<?php echo $this->webroot?>admin/users/userdelete/" + aa;
        }
    }

    function active(aa) {

        var a = confirm("Are you sure, you want to inactive status?")
        if (a)
        {
            location.href = "<?php echo $this->webroot?>admin/users/packageactive/" + aa;
        }
    }

    function Inactive(aa) {

        var a = confirm("Are you sure, you want to active status?")
        if (a)
        {
            location.href = "<?php echo $this->webroot?>admin/users/packageactive/" + aa;
        }
    }


</script>



<!-- Trigger the modal with a button -->

<!-- Modal -->


<div class="modal fade" id="classifiedmodal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Classified Details</h4>
            </div>
            <div class="modal-body" id="details">
                

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
<script>
    function view(id)
    {
        $.post("<?php echo $this->webroot;?>admin/classifieds/view/"+id,function(data){
        var html="<table style='width:100%;'><tr style='line-height:40px;'><td>Title:</td><td>"+data.name+"</td></tr><tr><td>Description:</td><td>"+data.description+"</td></tr><tr><td>Image:</td><td><img src='"+data.image+"' style='height:100px;width:100px;'></td></tr></table>"    ;
        $("#classifiedmodal").modal("show");
        $("#details").html(html);
        },"json");
    }
</script>

