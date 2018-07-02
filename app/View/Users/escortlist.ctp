<script type="text/javascript">
    function getCityList(cid) {
        //alert(cid);
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfState/",
            //dataType: "json",
            data: {cid: cid}
        }).done(function (msg) {
            //alert(msg);
            // ctlt
            $("#ctlt").html(msg);
        });
    }


    function checkUsername(username) {
        if (/^[a-zA-Z0-9]*$/.test(username) == false) {
            $("#ugreen").hide('');
            $("#ured").show('');
            $("#ured").text(' Invalid Username!');
            //$("#username").attr("placeholder", username).val("").focus().blur();
            //BootstrapDialog.alert('Username contains invalid characters. Only letters or numbers please');
            return false;
        }

        if (username) {
            //$('#wait-div-username').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkusername/",
                //dataType: "json",
                data: {username: username}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreen").hide('');
                    $("#ured").show('');
                    $("#ured").text('Username already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#username").attr("placeholder", username).val("").focus().blur();
                } else if (msg == 0) {
                    $("#ured").hide('');
                    $("#ugreen").show('');
                    $("#ugreen").text('Username available');
                }
            });
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function checkEmail(email) {
        if (!validateEmail(email)) {
            $("#ugreene").hide('');
            $("#urede").show('');
            $("#urede").text(' Invalid Email!');
            //BootstrapDialog.alert('Invalid Email');
            return false;
        }

        if (email) {
            $('#wait-div-email').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                //dataType: "json",
                data: {email: email}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreene").hide('');
                    $("#urede").show('');
                    $("#urede").text('Email already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#email").attr("placeholder", email).val("").focus().blur();
                } else if (msg == 0) {
                    $("#urede").hide('');
                    $("#ugreene").show('');
                    $("#ugreene").text('Email available');
                }
            });
        }
    }
</script>	
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="contLeftPart p-3 mb-3">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2>Escorts in <span class="d-block">New zealand</span></h2>
                            <div class="girlCount p-2">
                                <?php echo $total_escort; ?> Girls
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="<?php echo $this->Html->url('/') ?>images/10-2-new-zealand-flag-png-hd.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="cityHeading mt-2 p-2">Category:</div>
                    <ul class="list-unstyled cityListing">
                        <?php if ($category) {
                            foreach ($category as $cat) {
                                ?>
                                <li class="d-flex justify-content-between">
                                    <div class="cityname">
                                        <a class="cityname" href="<?php echo $this->Html->url('/'); ?>users/escortlist/<?php echo $type; ?>/<?php echo base64_encode($cat['Category']['id']); ?>"><?php echo $cat['Category']['name']; ?></a>
                                    </div>
                                    <div class="citycount">
        <?php echo $cat['Category']['count'] ?>
                                    </div>
                                </li>
                            <?php }
                        }
                        ?>

                    </ul>
                </div>

                <div class="contLeftPart p-3">
                    <div class="cityHeading mt-2 p-2">Emotional Aspects Related to Escorting</div>
                    <div class="escortFood mt-4 mb-4 text-center">
                        <img src="<?php echo $this->Html->url('/') ?>images/callGirl2.jpg" class="img-fluid">
                    </div>
                    <p class="text-left color-white mb-0">14-07-2018</p>
                    <p class="color-white mt-2 mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architect</p>			

                </div>
                <div class="cityHeading p-2">All Escort Lessions</div>
            </div>
            <div class="col-lg-6 ">
                <div class="middlePart">
                    <div class="directoryEscortHeading p-2 mb-4">
                        <h2 class="mb-0">The Directory Escorts</h2>
                    </div>
                    <div class="row">
                        <?php
                        if (!empty($list)) {
                            foreach ($list as $showescortsdata) {
                                ?>
                                <div class="col-lg-3 mb-2 px-1">
                                    <div class="bg-gray p-1 middleImage">
                                            <?php if ($showescortsdata['User']['profile_image'] != '') { ?>
                                            <div class="middleImagePart" style="background:url('<?php echo $this->webroot; ?>user_images/<?php echo $showescortsdata['User']['profile_image']; ?>') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($showescortsdata['User']['id']); ?>');">
                                                <?php } else { ?>
                                                <div class="middleImagePart" style="background:url('<?php echo $this->webroot; ?>noimage.png') no-repeat;" onclick="redirect_detaiils('<?php echo base64_encode($showescortsdata['User']['id']); ?>');">       

        <?php } ?>
                                                <ul class="middleList">
                                                    <li>
                                                        <span class="icon"><img src="<?php echo $this->Html->url('/') ?>images/icon1.png"></span>
                                                    </li>
                                                    <li>
                                                        <span class="icon"><img src="<?php echo $this->Html->url('/') ?>images/icon2.png"></span>
                                                    </li>
                                                    <li>
                                                        <span class="icon"><img src="<?php echo $this->Html->url('/') ?>images/icon3.png"></span>
                                                    </li>
                                                    <li>
                                                        <span class="icon"><img src="<?php echo $this->Html->url('/') ?>images/icon4.png"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-between girlName mt-2 mb-2">
                                                <h2 class="text-uppercase"><!--Patty--><?php echo $showescortsdata['User']['name']; ?></h2>
                                                <div class="flag"><img src="<?php echo $this->Html->url('/') ?>images/newzealandFlag.png"></div>
                                            </div>
                                            <div class="d-flex justify-content-between girlAge mt-2 mb-2">
                                                <?php
                                                $date = date('Y', strtotime($showescortsdata['User']['birthday']));
                                                $age = date('Y') - $date;
                                                ?>
                                                <p class="mb-0">Age: <?php echo $age; ?>years</p>
                                                <p class="mb-0">Oxford</p>
                                            </div>
                                            <div class="d-flex justify-content-between bottomRate mt-2 mb-2">
                                                <p class="mb-0">Rates from <?php
                                                    if (!empty($showescortsdata['Rate'][0]['30min_incall'])) {
                                                        echo '&#128;' . $showescortsdata['Rate'][0]['30min_incall'];
                                                    } else {
                                                        echo 'No rate';
                                                    }
                                                    ?></p>
                                                <p class="mb-0"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                </p>
                                            </div>
                                            <span class="t2<?php echo $showescortsdata['User']['id']; ?>" style="display:none;">
                                                    <?php
                                                    if ($this->Session->read('fuid')) {
                                                        ?>    
                                                    <a href="javascript:void(0);" onclick="add_to_fav('<?php echo $showescortsdata['User']['id']; ?>', '<?php echo $this->Session->read('fuid') ?>')">
        <?php } else { ?>
                                                        <a href="javascript:void(0);" class="pull-right" onclick="javascript:alert('Please Login to Add to Favorite!!');
                                                                            return false;">
        <?php } ?>    
                                                        <img src="<?php echo $this->Html->url('/') ?>images/thumbs_up.png" alt="" style="vertical-align:text-bottom;" title="4 Votes"  /></a>
                                            </span>
                                        </div>
                                    </div>


                                    <?php
                                }
                            } else {
                                echo '<h2 style="color:#fff">No results found</h2>';
                            }
                            ?>   



                        </div>
                    </div>   



                </div>


                <div class="col-lg-3">
                    <h2 class="text-center color-white text-uppercase font-22">Search</h2>

                        <?php $base_url = array('controller' => 'users', 'action' => 'escortlist/F'); ?>
<?php echo $this->Form->create("Filter", array('method' => 'post', 'url' => '/users/escortlist/F', "id" => 'SearchForm')); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Country</label>
                    <?php echo $this->Form->input("country_id", array('options' => $showcountry, 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <!--                    <div class="form-group">
                                            <label for="exampleInputEmail1">City/Region</label>
                    <?php echo $this->Form->input("city_id", array('options' => $locationsarray, 'empty' => 'Select Location', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
<?php echo $this->Form->input("nationality_id", array('options' => $nationalities, 'empty' => 'Ethnicity', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?> 	
                                        </div>-->


                    <div class="form-group">
                        <label for="exampleInputEmail1">City/Region</label>
                        <select name="data[User][state_id]" id="state_id" class="form-control selectField" required="required" onchange="getCityList(this.value)">
                            <option value=""> Select Location </option>
                            <?php foreach ($state as $stk => $stv) { ?>
                                <?php if ($this->request->data['State']['id'] != $stk) { ?>
                                    <option  value="<?php echo $stk ?>"> <?php echo $stv ?> </option>
    <?php } else { ?>
                                    <option  value="<?php echo $stk ?>" selected="selected" > <?php echo $stv ?> </option>
    <?php } ?>
<?php } ?>
                        </select>	
                    </div>





                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <select name="data[User][city_id]" id="ctlt" class="form-control selectField">
                            <option value=""> Select State To Get City List </option>
<?php foreach ($city as $stk => $stv) { ?>
                                <option  value="<?php echo $stk ?>" <?php if ($this->request->data['City']['id'] == $stk) {
        echo 'selected';
    } ?>> <?php echo $stv ?> </option>
<?php } ?>
                        </select>	
                    </div>








                    <div class="form-group">
                        <label for="exampleInputEmail1">Availability</label>
<?php echo $this->Form->input("availability_id", array('options' => $availabilities, 'empty' => 'Availability', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Age</label>
<?php echo $this->Form->input("age", array('options' => $agearr, 'empty' => 'Select Age', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Gender</label>
<?php echo $this->Form->input("gender", array('options' => $genders, 'empty' => 'Gender', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Verified</label>
<?php echo $this->Form->input("verifieds", array('options' => $verifieds, 'empty' => 'Verified', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Service</label>
<?php echo $this->Form->input("service_id", array('options' => $services, 'empty' => 'Service', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Showing Face</label>
<?php echo $this->Form->input("is_show_face", array('options' => $showing_face, 'empty' => 'Showing Face', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort By Height</label>
<?php echo $this->Form->input("height", array('options' => $heights, 'empty' => 'Height', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hair color</label>
<?php echo $this->Form->input("haircolor_id", array('options' => $haircolors, "empty" => "Hair Color", 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cup size</label>
<?php echo $this->Form->input("cup_size", array('options' => $cups, 'empty' => 'Size', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?> 	
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bust size</label>
<?php echo $this->Form->input("bust_size", array('options' => $busts, 'empty' => 'Bust', 'class' => 'form-control selectField', 'id' => 'sel1', 'label' => false)); ?>	
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-3">Search</button>

<?php echo $this->Form->end(); ?>


                    <div class="advertisePart text-center mb-2 mt-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/banner1.jpg" class="img-fluid">
				</div>
				<div class="advertisePart text-center mb-2">
					<img src="<?php echo  $this->Html->url('/') ?>images/banner2.jpg" class="img-fluid">
				</div>
                </div>
            </div>
        </div>
</section>
