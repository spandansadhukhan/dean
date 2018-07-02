



<section class="dashBoard mt-4">
    <div class="container">
        <div class="row">
            <?php echo $this->element('club_sidebar'); ?>
            <div class="col-lg-9">
                <div class="acntSetting p-1">
                    <h2 class="font-weight-normal">Manage customer blacklist</h2>
                </div>
                <div class="email mt-3 p-2">
                    <p>Add Customer to Blacklist</p>
                </div>

                <form action="<?php echo $this->webroot ?>clubs/add_to_blacklist" method="post" accept-charset="utf-8" class="ajaxform" id="add-model" enctype="multipart/form-data"> 
                    <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid'); ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="emailAddress mt-4">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Customer List:</label>
                                    <div class="col-lg-8">
                                        <select name="to_id" class="form-control" id="eye_color_id" required>
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
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Phone*:</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="phone" class="form-control text-field" id="staticEmail" placeholder="Phone">
                                    </div>
                                </div>

                                <!--						  <div class="form-group row">
                                                                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Image*:</label>
                                                                                    <div class="col-lg-8">
                                                                                      <input type="file">
                                                                                    </div>
                                                                                  </div>-->
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary btnPart">Add To Blacklist</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="emailAddress mt-4">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Email*:</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="email" class="form-control text-field" id="staticEmail" placeholder="">
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 text-right col-form-label">Your Comments*:</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-hover">

                    
                        <thead>
                            <tr>
                                <td>Sl No#</td>
                                <!--<td>Image</td>-->
                                <td>Name</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($user2)) { ?>
                            <?php
                            $count = 1;

                            //pr($user2); exit;
                            foreach ($getalldata as $showuser) {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
<!--                                    <td><?php if ($showuser['User']['profile_image'] != '') { ?>
                                            <img src="<?php echo $this->webroot ?>user_images/<?php echo $showuser['User']['profile_image']; ?>" width="50px" height="50px"/>
                                        <?php } else { ?>
                                            <img src="<?php echo $this->webroot ?>noimage.png" width="50px" height="50px"/>

                                        <?php } ?>
                                    </td>-->
                                    <td><?php echo $showuser['User']['name']; ?></td>
                                    <td><?php echo $showuser['User']['email']; ?></td>
        
                                    <td>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deleteblacklist', $getalldata[0]['Blacklist']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete?')); ?></td>

                                </tr>
                                <?php
                                $count++;
                            }
                            }else { ?>

                                <tr><td colspan="4"><div class="no-record" id="nomsg_show" >No Blacklisted User In you List</div></td></tr>
                        <?php
                    }
                    ?>
                           
                        </tbody>

                     


                </table>
            </div>
        </div>
    </div>
</section>

