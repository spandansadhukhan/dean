<section class="dashBoard mt-4">
    <div class="container">
        <div class="row">
            <?php echo $this->element('parlor_sidebar'); ?>
            <div class="col-lg-9">
                <div class="acntSetting p-1">
                    <h2 class="font-weight-normal">Email Messages</h2>
                </div>
                <ul class="nav nav-tabs mt-4 tabParts">
                    <li class="active"><a data-toggle="tab" href="#home">Inbox</a></li>
                    <!--<li><a data-toggle="tab" href="#menu1">Outbox</a></li>-->
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



                        <table class="table table-vcenter">

                            <?php if (!empty($messagelist)) { ?>
                                <thead>
                                    <tr>
                                        <td>Sl No#</td>
                                        <td>Title</td>
                                        <td>Message</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($messagelist as $showuser) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $showuser['Message']['title']; ?></td>
                                            <td><?php echo $showuser['Message']['message']; ?></td>

                                                                                                        <td> &nbsp; &nbsp;
                                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletemessage', $showuser['Message']['id']), array("class" => "btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                                            </td>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                </tbody>

                            <?php } else { ?>

                                <div class="no-record" id="nomsg_show" >No Message Found In Your Inbox</div>
                                <?php
                            }
                            ?>


                        </table>

                    </div>
                    
                    <div id="menu2" class="tab-pane fade">
                        <form id="msg_form" method="post" action="<?php echo $this->webroot ?>parlors/send_msg">
                            <input type="hidden" name="from_id" value="<?php echo $this->Session->read('flogin'); ?>">

                            <div class="col-lg-12">
                                <div class="emailAddress mt-4">

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-lg-4 text-right col-form-label">To*:</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="to_id" required="">
                                                <option value="">Select Recipient</option>
                                                <?php
                                                foreach ($userlist as $showusers) {
                                                    ?>
                                                    <option value="<?php echo $showusers['User']['id'] ?>"><?php echo $showusers['User']['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-lg-4 text-right col-form-label">Subject*:</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="title" class="form-control text-field" id="staticEmail" placeholder="Title here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-lg-4 text-right col-form-label">Message*:</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="message" rows="5" id="comment" placeholder="Type here"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-lg-8"><button type="submit" class="btn btn-primary btnPart">Send</button></div>
                                    </div>          
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>