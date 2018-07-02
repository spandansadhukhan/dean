<?php

//echo "hello";exit;
//pr($orders); exit;
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 

?>

<div class="wrapper">

    <div class="row gap_row">
        <div class="col-sm-12">

            <section class="panel">

                <div class="adv-table col-sm-12">

                    <table  class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                <th><?php echo 'Name'; ?></th>
                                <th><?php echo 'Price'; ?></th>
                                <th><?php echo 'Transaction ID#'; ?></th>
                                <th><?php echo 'Order Date'; ?></th>
                                 <th><?php echo 'Action'; ?></th>
                            </tr>
                        </thead>
                        <tbody>
	                <?php 

                    foreach ($orders as $user): ?>
                            <tr class="gradeX">
                                <td><?php echo $user['Order']['id']; ?>&nbsp;</td>
                                <td><?php echo $user['User']['name']; ?>&nbsp;</td>
                                <td>&#36; <?php echo $user['Order']['total_amount']; ?>&nbsp;</td>
                                <td><?php echo $user['Order']['transaction_id']; ?>&nbsp;</td>
                                <td><?php echo $user['Order']['payment_date']; ?>&nbsp;</td>

                                <td><?php //echo $this->Html->link(__('Edit'), array('action' => 'editOrder', $user['Order']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteOrder', $user['Order']['id']), null, __('Are you sure you want to delete # %s?', $user['Order']['id'])); ?>
            <?php echo $this->Html->link(__('Details'), array('action' => 'orderdetails', $user['Order']['id'])); ?> 

                                    <?php //echo $this->Html->link(__('Upload Image'), array('action' => 'uploadimage', $user['Order']['id'])); ?>


<!--                                    <a href="<?php echo $this->webroot;?>admin/listings/uploadimage/<?php echo $listing['Listing']['id'];?>"><img src="<?php echo $this->webroot;?>img/uploadimage.png" title="Upload Image"></a>-->
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User Details</h4>
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

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Note</h4>
            </div>
            <div class="modal-body">
                <form method="post" name="" action="<?php echo($this->webroot)?>admin/users/addnote">
                    <input type="hidden" name="hid_id" id="hid_id" value="">

                    Enter Notes:<textarea name="note" style="height: 150px; width: 100%;"></textarea>


                    <div class="form-group" style="margin-top: 9px; margin-left: 87px;">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-default" type="reset" style="margin-left: 11px;">Reset</button>
                        </div>
                    </div>

                </form>

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

