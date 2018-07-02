
<section class="dashBoard mt-4">
    <div class="container">
        <div class="row">
            <?php echo $this->element('user_sidebar'); ?>
            <div class="col-lg-9">
                <div class="acntSetting p-1">
                    <h2 class="font-weight-normal">My Favorites</h2>
                </div>

                <div class="row">
                    <div class="col-lg-12">


                        <ul class="nav nav-tabs mt-4 tabParts">
                            <li class="active"><a data-toggle="tab" href="#home" class="active">Favorite Escorts</a></li>
                            <li><a data-toggle="tab" href="#menu1" class="">Favorite Agencies</a></li>
                            <li><a data-toggle="tab" href="#menu2" class="">Favorite Parlours</a></li>
                            <li><a data-toggle="tab" href="#menu3" class="">Favorite Clubs</a></li>

                        </ul>
                        <div class="tab-content">

                            <div id="home" class="tab-pane in active">
                                <?php
                                if (!empty($loginuser)) {
                                    ?>
                                    <table class="table table-hover tableParts">
                                        <thead>
                                            <tr>
                                                <th>Sl No#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $count = 1;

                                            foreach ($loginuser as $showuser) {
                                                ?>


                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $showuser['User']['name']; ?></td>
                                                    <td><?php echo $showuser['User']['email']; ?></td>
                                                    <td>
                                                        <a href="<?php echo $this->Html->url('/'); ?>escort-details/<?php echo base64_encode($showuser['User']['id']); ?>"> 
        <?php if ($showuser['User']['profile_image'] != '') { ?> 
                                                                <img src="<?php echo $this->webroot; ?>user_images/<?php echo $showuser['User']['profile_image']; ?>" height="50px" width="50px"> 
                                                            <?php } else { ?>
                                                                <img src="<?php echo $this->webroot; ?>user_images/noimage.png" height="50px" width="50px"> 
                                                            <?php } ?>
                                                        </a>
                                                    </td>
                                                    <td>
        <?php echo $this->Form->postLink(__('Remove Favorite'), array('action' => 'deletefavorites', $showuser['Favorite']['id']), array("class" => "btn btn-danger"), __('Are you sure you want to delete?')); ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                            ?>

                                        </tbody>

                                    </table>

                                <?php } else { ?>
                                    <div id="menu3" class="tab-pane">
                                        <h3><p>You have not added any escort in your favorite list yet</p></h3>
                                    </div>
                                <?php } ?>


                            </div>

                            <div id="menu1" class="tab-pane">
                                <h3><p>You have not added any agency in your favorite list yet</p></h3>
                            </div>

                            <div id="menu2" class="tab-pane">
                                <h3><p>You have not added any parlour in your favorite list yet</p></h3>
                            </div> 

                            <div id="menu3" class="tab-pane">
                                <h3><p>You have not added any club in your favorite list yet</p></h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

