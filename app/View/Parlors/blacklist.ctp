<section class="dashBoard mt-4">
    <div class="container">
        <div class="row">
            <?php echo $this->element('parlor_sidebar'); ?>
            <div class="col-lg-9">
                <div class="acntSetting p-1">
                    <h2 class="font-weight-normal">Manage customer blacklist</h2>
                </div>
                <div class="email mt-3 p-2">
                    <p>Add Customer to Blacklist</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="emailAddress mt-4">

                            <form id="msg_form" method="post" action="<?php echo $this->webroot ?>parlors/add_to_blacklist">
                                <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid'); ?>">        

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">To*:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="to_id[]" style="width:100%;" multiple="multiple" required>
                                            <option value="">Select Recipient</option>
                                            <?php
                                            foreach ($userotherlists as $showusers) {
                                                ?>
                                                <option value="<?php echo $showusers['User']['id'] ?>"><?php echo $showusers['User']['name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary btnPart">Add To Blacklist</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <h2 class="mt-3">Manage Blacklist</h2>
                <!--					<div class="form-group row">
                                                                <div class="col-lg-4">
                                                                        <input type="text" class="form-control text-field" placeholder="Name">
                                                                </div>
                                                                <div class="col-lg-4">
                                                                        <input type="text" class="form-control text-field" placeholder="Phone">
                                                                </div>
                                                                <div class="col-lg-2"><button type="button" class="btn btn-primary btnPart">Search</button></div>
                                                        </div>-->
                <table class="table table-hover">


                    <thead>
                        <tr>
                            <td>Sl No</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;

                        if (!empty($user2)) {
                            foreach ($user2 as $showuser) {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php if ($showuser['User']['profile_image'] != '') { ?>
                                            <img src="<?php echo $this->webroot ?>user_images/<?php echo $showuser['User']['profile_image']; ?>" width="50px" height="50px"/>
                                        <?php } else { ?>
                                            <img src="<?php echo $this->webroot ?>noimage.png" width="50px" height="50px"/>

                                        <?php } ?>
                                    </td>
                                    <td><?php echo $showuser['User']['name']; ?></td>
                                    <td><?php echo $showuser['User']['email']; ?></td>
                                    <td><a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-delete"></i></a></td>
                                </tr>
                                <?php
                                $count++;
                            }
                            ?>

                        <?php } else { ?>

                        <div class="no-record" id="nomsg_show" >No Blacklisted User In you List</div>
                        <?php
                    }
                    ?>
                    </tbody>




                </table>
            </div>
        </div>
    </div>
</section>

