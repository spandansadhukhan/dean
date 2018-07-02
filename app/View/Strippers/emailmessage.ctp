<script>
    var task = '';
    if (task == 'Yes')
        var showTab = 'tab3';
    else
        var showTab = 'tab1';
    jQuery(document).ready(function ($) {
        /* jQuery activation and setting options for the tabs including defaultTab*/
        jQuery("#nav-tabzoo").zozoTabs({
            theme: "silver",
            position: "top-left",
            defaultTab: showTab

        });
    });
</script>
<script type="text/javascript">
    function checkUncheckAllInbox(task)
    {
        if (task == 'check')
            $(".inboxcheckbox").attr('checked', 'checked');
        else if (task == 'uncheck')
            $(".inboxcheckbox").removeAttr('checked', 'checked');
    }
</script>
<script type="text/javascript">
    function checkUncheckAllOutbox(task)
    {
        if (task == 'check')
            $(".outboxcheckbox").attr('checked', 'checked');
        else if (task == 'uncheck')
            $(".outboxcheckbox").removeAttr('checked', 'checked');
    }
</script>
<script type="text/javascript">
    function doTask(task)
    {
        $('#input_hidden_fields').html('');
        $('#input_hidden_fields').html('<input type="hidden" name="task" value="' + task + '"/>');
        var len = $("[class='inboxcheckbox']:checked").length;
        if (len > 0)
        {
            $('#myformmessage').submit();
            $(".inboxcheckbox").removeAttr('checked', 'checked');
        }
        else
            BootstrapDialog.alert('Please select message');
    }
    function showdiv(id)
    {
        $("#show_" + id).toggle('slow');
        $.get("messages/read?msg_id=" + id, function (data) {

            $("#unreadmsg").text(data.unrd_msg);
            $(".row_" + id).addClass('read');
            $(".row_" + id).removeClass('unread');
        });
    }
    function closeDiv(divId)
    {
        if (divId != null) {
            jQuery('#show_' + divId).slideUp('slow');
        }

    }
</script>
<script type="text/javascript">
    function doTaskOutbox(task)
    {
        $('#input_hidden_fieldsoutbox').html('');
        $('#input_hidden_fieldsoutbox').html('<input type="hidden" name="task" value="' + task + '"/>');

        var lenoutbox = $("[class='outboxcheckbox']:checked").length;
        if (lenoutbox > 0) {
            $('#myformmessageoutbox').submit();
            $(".outboxcheckbox").removeAttr('checked', 'checked');
        }
        else
            BootstrapDialog.alert('Please select message');

    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#myformmessage").submit(function (event) {
            var posturl = $(this).attr('action');
            $(this).ajaxSubmit({
                url: posturl,
                dataType: 'json',
                beforeSend: function () {
                    //$("input[type=submit]").attr("disabled", "disabled");
                    $('#wait-div').show();
                },
                success: function (response) {
                    $("input[type=submit]").removeAttr("disabled");
                    $('#wait-div').hide();
                    if (response.success)
                    {
                        $("#unreadmsg").text(response.unrd_msg);
                        if (response.task == 'delete')
                        {
                            var inbox_size = $("#countp").text();

                            $.each(response.ids, function (key, value) {
                                $("#row_" + value).fadeOut(300);

                                $("#countp").text(inbox_size - 1);
                                if (inbox_size - 1 == 0)
                                    $("#nomsg_show").slideDown(800);
                            });
                        }
                        else if (response.task == 'read')
                        {

                            $.each(response.ids, function (key, value) {
                                $(".row_" + value).addClass('read');
                                $(".row_" + value).removeClass('unread');
                            });
                        }
                        else if (response.task == 'unread')
                        {

                            $.each(response.ids, function (key, value) {
                                $(".row_" + value).addClass('unread');
                                $(".row_" + value).removeClass('read');
                            });
                        }

                        if (response.resetform)
                            $(".formclass").resetForm();
                    }
                    else
                    {

                    }
                },
                error: function (response) {
                    alert('Connection error')
                }
            });
            return false;
        });



        $("#myformmessageoutbox").submit(function (event) {
            var posturl = $(this).attr('action');
            $(this).ajaxSubmit({
                url: posturl,
                dataType: 'json',
                beforeSend: function () {
                    //$("input[type=submit]").attr("disabled", "disabled");
                    $('#wait-div').show();
                },
                success: function (response) {
                    $("input[type=submit]").removeAttr("disabled");
                    $('#wait-div').hide();
                    if (response.success)
                    {
                        if (response.task == 'delete')
                        {
                            var outbox_size = $("#countout").text();

                            $.each(response.ids, function (key, value) {
                                $("#row_" + value).fadeOut(300);

                                $("#countout").text(outbox_size - 1);
                                if (outbox_size - 1 == 0)
                                    $("#nooutmsg_show").slideDown(800);
                            });
                        }
                        else if (response.task == 'read')
                        {
                            $.each(response.ids, function (key, value) {
                                $(".row_" + value).addClass('read');
                                $(".row_" + value).removeClass('unread');
                            });
                        }
                        else if (response.task == 'unread')
                        {
                            $.each(response.ids, function (key, value) {
                                $(".row_" + value).addClass('unread');
                                $(".row_" + value).removeClass('read');
                            });
                        }

                        if (response.resetform)
                            $(".formclass").resetForm();
                    }
                    else
                    {

                    }
                },
                error: function (response) {
                    alert('Connection error')
                }
            });
            return false;
        });

        return false;
    });

    function showSelected(member_id)
    {
        $("#selected_" + member_id).attr('selected', 'selected');
    }
</script>
<style>
    .unread {
        background: none repeat scroll 0 0 #FDF6CA;
    }
    .read {
        background: none repeat scroll 0 0 #F9F9F9;
    }
</style>
<section class="dashBoard mt-4">
    <div class="container">
        <div class="row">
<?php echo $this->element('stripper_sidebar'); ?>
            <div class="col-lg-9">
                <div class="acntSetting p-1">
                    <h2 class="font-weight-normal">Email Messages</h2>
                </div>
                <ul class="nav nav-tabs mt-4 tabParts">
                    <li class="active"><a data-toggle="tab" href="#home">Inbox</a></li>
                    <li><a data-toggle="tab" href="#menu1">Outbox</a></li>
                    <li><a data-toggle="tab" href="#menu2">Compose</a></li>
                </ul>
                <div class="tab-content tabberPart">
                    <div id="home" class="tab-pane in active">
                        <div class="selectField">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Select: All|None</p>
                                </div>
                                <div class="col-lg-6 float-right">
                                    <button type="button" class="btn btn-primary btnPart2 mr-2 ml-4">Delete</button>
                                    <button type="button" class="btn btn-primary btnPart2 mr-2">Mark Read</button>
                                    <button type="button" class="btn btn-primary btnPart2">Mark Unread</button>
                                </div>
                            </div>
                        </div>



<?php
if (!empty($messagelist)) {
    $count = 1;
    foreach ($messagelist as $showuser) {
        ?>
                                <div class="messagepart mt-3 pb-3">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="checkbox mt-2">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="profileImage"><img src="images/brown_man.png"></div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <h2><?php echo $showuser['Message']['title']; ?></h2>
                                                    <p><?php echo $showuser['Message']['message']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <a class="btn btn-primary btnPart" href="<?php echo $this->Html->url('/'); ?>escorts/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>"><i class="fa fa-eye"></i></a>							
                                            <button type="button" class="btn btn-primary btnPart"><i class="fa fa-reply" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
    <?php }
} else { ?>

                            <div class="messagepart mt-3 pb-3">

                                No Messages Found..
                            </div>

<?php } ?>

                    </div>
                    <div id="menu1" class="tab-pane fade">

                        <div class="selectField">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Select: All|None</p>
                                </div>
                                <div class="col-lg-6 float-right">
                                    <button type="button" class="btn btn-primary btnPart2 mr-2 ml-4">Delete</button>
                                    <button type="button" class="btn btn-primary btnPart2 mr-2">Mark Read</button>
                                    <button type="button" class="btn btn-primary btnPart2">Mark Unread</button>
                                </div>
                            </div>
                        </div>



<?php
if (!empty($messagelist)) {
    $count = 1;
    foreach ($messagelist as $showuser) {
        ?>
                                <div class="messagepart mt-3 pb-3">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="checkbox mt-2">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="profileImage"><img src="images/brown_man.png"></div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <h2><?php echo $showuser['Message']['title']; ?></h2>
                                                    <p><?php echo $showuser['Message']['message']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <a class="btn btn-primary btnPart" href="<?php echo $this->Html->url('/'); ?>escorts/messagedetails/<?php echo base64_encode($showuser['Message']['id']); ?>"><i class="fa fa-eye"></i></a>							
                                            <button type="button" class="btn btn-primary btnPart"><i class="fa fa-reply" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>

                            <div class="messagepart mt-3 pb-3">

                                No Messages Found..
                            </div>

<?php } ?>

                    </div>

                    <div id="menu2" class="tab-pane fade">
                        <div class="tom1  for-msg">
                            <form action="#" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">									  
                                <section class="t1 t1-t">
                                    <label for="label">To: <span>*</span></label>
                                    <select name="to_member_id" class="form-control selectField">
                                        <option value="">Select Recipient</option>
                                    </select>
                                    <section class="clr">
                                    </section>

<!--										  <section class="t1 t1-t">
                                                                                                <label for="label">From: <span>*</span></label>
                                                                                                <input type="hidden" value="nits.karunadri@gmail.com" name="from_email">
                                                                                                <input type="text" class="form-control text-field" value="kar123" name="username" readonly="readonly">
                                                                                                <section class="clr"></section>
                                                                                  </section>-->

                                    <section class="t1 t1-t">
                                        <label for="label">Subject: <span>*</span></label>
                                        <input type="text" value="" name="subject" class="form-control text-field">
                                        <section class="clr"></section>
                                    </section>

                                    <section class="t1 t1-t">
                                        <label for="label">Message: <span>*</span></label>
                                        <textarea name="message" class="form-control text-field" id="message" placeholder="Type your message..."></textarea>
                                        <section class="clr"></section>
                                    </section>

                                    <section class="t1 t1-t">
                                        <label for="label" class="blank">&nbsp;</label>
                                        <section class="tbut">
                                            <input type="submit" value="Send" id="button" name="button" class="buttonGrey">
                                        </section>
                                        <section class="clr"></section>
                                    </section>
                            </form>                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

