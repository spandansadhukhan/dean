<?php

//echo "hello";exit;
//pr($users);
echo $this->Html->script('chosen.jquery', array('inline' => true));
echo $this->Html->css('bootstrap-chosen', array('inline' => true)); 

?>

<div class="wrapper">




    <div class="row gap_row_new">
        <div class="col-sm-9 col-lg-4">
            <a href="http://layout1.demoparlour.com/advdirectory/admin/credit/filter/NULL/NULL/NULL" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Total</strong><br>
                        <small><?php echo $total_user;?></small>
                    </h3>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-lg-4">
            <a href="http://layout1.demoparlour.com/advdirectory/admin/credit/filter/NULL/Active/NULL" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-check-square-o fa-1x"></i>
                    </div>
                    <h3 class="widget-content text-right text-success animation-pullDown">
                        <strong>Active</strong><br>
                        <small><?php echo $total_active_user;?></small>
                    </h3>
                </div>
            </a>
        </div>
        <div class="col-sm-9 col-lg-4">
            <a href="http://layout1.demoparlour.com/advdirectory/admin/credit/filter/NULL/Inactive/NULL" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-exclamation fa-1x"></i>
                    </div>
                    <h3 class="widget-content text-right text-warning animation-pullDown">
                        <strong>Inactive</strong><br>
                        <small><?php echo $total_inactive_user;?></small>
                    </h3>
                </div>
            </a>
        </div>

    </div>














    <div class="row gap_row">
        <div class="col-sm-12">

            <section class="panel">
                <header class="panel-heading">
                    All Users(Total Records: <?php echo $total_user;?>)
                </header>
           <?php echo $this->Form->create("Filter",array('class' => 'filter'));?>
           <?php echo $this->Form->input("advace_search_type",array('type'=>'hidden','value'=>0))?>
                <div class="table-options clearfix" style=" background-color:#fff">
                    <div class="clearfix pull-left" style="display:<?php if(isset($this->request->data['Filter']['advace_search_type']) and $this->request->data['Filter']['advace_search_type']==1){?>none; <?php }else{ ?>block;<?php } ?>" id="filterInput">
                        &nbsp;<button title="" class="btn btn-alt btn-primary gap_up enable-tooltip" id="advanceSearch" type="button" data-original-title="Advance Search"><i class="fa fa-sun-o fa-lg"></i></button>
                        <div class="btn-group btn-group-sm pull-left">
                            <div class="input-group">
                                                     <?php echo $this->Form->input("name",array('class'=>'form-control col-md-6','placeholder'=>'Search by display name or username..','label'=>false))?>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="search_single">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group btn-group-sm pull-right">
                        <a id="style-hover" class="btn btn-primary gap_up gap_up_down" title="" data-toggle="tooltip" href="<?php echo $this->webroot;?>admin/users/adduser" data-original-title="Add New User">Add New</a>
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
                                    <button class="btn btn-alt btn-sm btn-warning enable-tooltip" onclick="window.location.reload()" type="button" data-original-title="Reset Search" data-toggle="tooltip" data-placement="top" title="Reset Search"><i class="fa fa-repeat"></i></button>
                                </div>
                                <h2><strong>Advance </strong>Search</h2>
                            </div>

                            <div class="form-inline">
                                <div class="form-group">
                                    <label for="example-if-email" class=""> Total Search Key</label><br>
                                        <?php echo $this->Form->input("name",array('class'=>'form-control','placeholder'=>'Search by display name or username..','label'=>false,'div'=>false))?>

                                </div>
                                <div class="form-group">
                                    <label for="example-if-email"> Show Me</label>
                                    <br>
                                         <?php
                                            echo $this->Form->input("is_active",array('options'=>$user_status,'empty'=>'','class'=>'select-chosen','data-placeholder'=>'Choose a Type..','style'=>'width: 250px','selected'=>!empty($this->request->data['Filter']['is_active'])?$this->request->data['Filter']['is_active']:'','label'=>false,'div'=>false));
                                        
                                         ?>

                                </div>
                                <div class="form-group">
                                    <label for="example-if-email"> Sort By</label>
                                    <br>

                                        <?php
                                            echo $this->Form->input("direction",array('options'=>$directions,'empty'=>'','class'=>'select-chosen','data-placeholder'=>'Choose a Type..','style'=>'width: 250px','selected'=>!empty($this->request->data['Filter']['direction'])?$this->request->data['Filter']['direction']:'','label'=>false,'div'=>false));
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
                                <th><?php echo $this->Paginator->sort('id'); ?></th>

                                <th><?php echo 'Username'; ?></th>
                                <th><?php echo 'Email'; ?></th>
                                <th><?php echo 'Name'; ?></th>
                                <th><?php echo 'Status'; ?></th>
                                <th><?php echo 'Add Date' ?></th>
                                <th><?php echo 'Actions'; ?></th>

                            </tr>
                        </thead>
                        <tbody>
	<?php foreach ($users as $user):
	    
	    ?>
                            <tr class="gradeX">
                                <th><input type="checkbox" id="selectAll"></th>
                                <td><?php echo $user['User']['id']; ?>&nbsp;</td>



                                <td><?php echo $user['User']['username']; ?>&nbsp;</td>		
                                <td><?php echo $user['User']['email']; ?>&nbsp;</td> 
                                <td><?php echo $user['User']['name']; ?>&nbsp;</td>
                                <td><?php if($user['User']['is_active']==1) {echo 'Active';} else { echo 'Inactive';} ?>&nbsp;</td>
                                <td><?php echo $user['User']['join_date']; ?>&nbsp;</td>
                                <!--<td>
                                  Gender : <?php  if($user['User']['gender']=='M') {echo 'Male';} else {echo 'Female';}?><br>
                                  Email Verification : <?php  if($user['User']['is_email_verified']=='1') {echo 'Verified';} else {echo 'Not verified';}?><br>
                                  Newsletter : <?php  if($user['User']['subscribe_newsletter']=='1') {echo 'Subscribed';} else {echo 'Not subscribed';}?>
                                </td>-->   





<!--<td class="text-center">
<div class="btn-group btn-group-sm">
<a href="javascript:void(0);" onclick="getViewUser(<?php echo $user['User']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>

<a href="javascript:void(0);" onclick="getViewUser(<?php echo $user['User']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="AssignCredits"><i class="icon-eur"></i></a>

<a href="<?php echo $this->webroot;?>admin/agencies/delete/<?php echo $user['User']['id']; ?>" onclick="del(<?php echo $user['User']['id'];?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="Delete Record"><i class="fa fa-times" aria-hidden="true"></i></a>

<a href="" onclick="" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="Inactive Record"><i class="fa fa-circle-o" aria-hidden="true"></i></a>

<a href="javascript:void(0);" onclick="getViewUser(<?php echo $user['User']['id']; ?>)" class="btn btn-default enable-tooltip view-record btn btn-primary" data-original-title="Add Notes"><i class="fa fa-info" aria-hidden="true"></i></a>

<a href="javascript:void(0);" data-toggle="modal" data-target="#stack5" onclick="AddNotes(<?php echo $uid; ?>)" class="btn btn-default enable-tooltip" data-original-title="Add Notes"><i class="fa fa-info"></i></a>
<a href="#" class="btn btn-info enable-tooltip" data-original-title="Manage Account"><i class="fa fa-sign-in"></i></a>

</div>

</td>-->

                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">  

                                        <a href="javascript:void(0);" onclick="getViewUser(<?php echo $user['User']['id']; ?>)" class="btn btn-default enable-tooltip view-record" data-original-title="View Record"><i class="fa fa-search"></i></a>

                                        <a href="javascript:void(0);" onclick="" class="btn btn-default enable-tooltip view-record" data-original-title="AssignCredits"><i class="fa fa-eur"></i></a>

                                        <a href="javascript:void(0);" onclick="del(<?php echo $user['User']['id'];?>)" class="btn btn-danger enable-tooltip" data-original-title="Delete Record"><i class="fa fa-times"></i></a>

          <?php if($user['User']['is_active']==1){ ?>
                                        <a href="javascript:void(0);"  onclick="active(<?php echo $user['User']['id'];?>)" class="btn btn-success enable-tooltip" data-original-title="Inactive Record"><i class="fa fa-circle-o"></i></a>

          <?php } else if($user['User']['is_active']==0){ ?>
                                        <a href="javascript:void(0);" onclick="Inactive(<?php echo $user['User']['id'];?>)" class="btn btn-warning enable-tooltip" data-original-title="Inactive Record"><i class="fa fa-circle-o"></i></a>
          <?php } ?>

                                        <a href="javascript:void(0);" onclick="AddNotes(<?php echo $user['User']['id'];?>)" class="btn btn-default enable-tooltip" data-original-title="Add Notes"><i class="fa fa-info"></i></a>

                                        <a href="#" class="btn btn-info enable-tooltip" data-original-title="Manage Account"><i class="fa fa-sign-in"></i></a>
                                        <!--fa fa-life-bouy-->
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
    function getViewUser(userid) {
        //alert(userid);
        $.post('<?php echo($this->webroot)?>admin/users/userview/' + userid, function (data) {

            $("#myModal").modal("show");
            $('#stack1_view').empty();
            $('#stack1_view').html(data);

        });
    }

    function AddNotes(userid) {
        //alert(userid);
        //$.post('<?php echo($this->webroot)?>admin/users/usernote/'+userid,function(data){
        $("#hid_id").val(userid);
        $("#myModal1").modal("show");

        //$('#stack1_view').empty();
        //$('#stack1_view').html(data); 

        //});
    }
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
            location.href = "<?php echo $this->webroot?>admin/users/useractive/" + aa;
        }
    }

    function Inactive(aa) {

        var a = confirm("Are you sure, you want to active status?")
        if (a)
        {
            location.href = "<?php echo $this->webroot?>admin/users/useractive/" + aa;
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

