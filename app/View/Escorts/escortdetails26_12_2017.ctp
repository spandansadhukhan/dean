<?php ?>
<?php echo $this->element("banner"); ?>
<section id="contentsection">
    <?php echo $this->element("carousel_slider"); ?>

    <!-- <div id="wait-div" class="wait-div">
      <div class="wait-divin"> <span style="background: url('<?php echo $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
        Please wait    ....</span> </span> </div>
    </div> -->

    <?php
//pr($users); exit;


    $total_rate = 0;
    foreach ($all_data as $value) {
        $total_rate = $total_rate + $value['rating'];
    }
    ?>
    <div class="col-left">


        <section id="wrapper" class="escorts_detail">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <?php
                        if (!empty($users)) {
                            //echo "<pre>";
                            // print_r($users);die;
                            ?>
                            <div class="in-content">
                                <div class="left" id="breadcrumbsdiv" style="margin-bottom: 10px;">
                                    <div class="left" id="breadcrumbstext">
                                        <span>
                                            <a href="<?php echo $this->Html->url('/'); ?>">
                                                <span itemprop="title">Home</span>
                                            </a>
                                        </span> \ 
                                        <span>
                                            <a href="javascript:void(0)">
                                                <span itemprop="title"><?php echo $users[0]['Country']['name'] ?></span>
                                            </a>
                                        </span> \ 
                                        <span>
                                            <a href="javascript:void(0)">
                                                <span itemprop="title"><?php echo $users[0]['City']['name'] ?></span>
                                            </a>
                                        </span> \
                                        <?php echo $users[0]['User']['name'] ?>
                                    </div>
                                    <div class="clearer"></div>
                                </div>

                                <div class="clr"></div>
                                <div class="profile-detail-m">
                                    <div class="detail-heading">
                                        <section class="title-left">
                                            <h1 style="display:inline-block;">
                                                <?php echo $users[0]['User']['name'] ?>
                                                <img src="<?php echo $this->webroot ?>images/vip.png" style="width: 40px;" title="Vip" alt="" />
                                            </h1>
                                        </section>
                                        <ul class="ids"> </ul>
                                        <div class="clr"></div>
                                    </div>
                                    <div class="left-images-part">
                                        <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                             z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                             data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                            <ul class="z-tabs-nav z-tabs-desktop">
                                                <li style="" class="z-tab z-first" data-link="bio">
                                                    <a class="z-link">
                                                        Images <span style="color: #bc27bd;">(<?php echo count($users[0]['UserImage']) ?>)</span>
                                                    </a>
                                                </li>
                                                <li style="" class="z-tab" data-link="rates">
                                                    <a class="z-link">
                                                        Videos <span style="color: #bc27bd;">(<?php echo count($users[0]['UserVideo']) ?>) </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="h-content2 z-container">
                                                <div class="z-content" style="height:auto;">
                                                    <ul id="laod_images">
                                                        <li style="margin-bottom: 10px;">
                                                            <a href="javascript:void(0);">
                                                                <img src="<?php echo $this->webroot; ?>user_images/<?php echo $users[0]['User']['profile_image'] ?>" alt="" />
                                                            </a>
                                                        </li>
                                                        <li>
                                                        </li>
                                                        <div class="clr"></div>
                                                    </ul>
                                                </div>
                                                <div class="z-content">
                                                    <img src="<?php echo $this->webroot; ?>images/no-video-0x0.jpg" alt="" />
                                                    <br />
                                                    <div class="clr"></div>
                                                </div>
                                            </div>
                                        </div>


                                        <h4>Private gallery</h4>
                                        <?php
                                        //echo $optionslogged[0]['User']['user_type'];
                                        if ($this->Session->read('fuid') && $optionslogged[0]['User']['user_type'] == 'U') {

                                            if ($optionslogged[0]['User']['is_paid'] == 1) {
                                                ?>
                                                <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                                     z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                                     data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                                    <ul class="z-tabs-nav z-tabs-desktop">
                                                        <li style="" class="z-tab z-first" data-link="bio">
                                                            <a class="z-link">
                                                                Images <span style="color: #bc27bd;">(<?php echo count($optionsprivatestuffs); ?>)</span>
                                                            </a>
                                                        </li>
                                                        <li style="" class="z-tab" data-link="rates">
                                                            <a class="z-link">
                                                                Videos <span style="color: #bc27bd;">(<?php echo count($users[0]['UserVideo']) ?>) </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="h-content2 z-container">
                                                        <div class="z-content" style="height:auto;">
                                                            <ul id="laod_images">
                                                                <?php
                                                                if (!empty($optionsprivatestuffs)) {
                                                                    foreach ($optionsprivatestuffs as $show_private_gal) {
                                                                        $test_var_test = explode('.', $show_private_gal['Photo']['img']);

                                                                        if ($test_var_test[1] != 'mp4') {
                                                                            ?>
                                                                            <li style="margin-bottom: 10px;">
                                                                                <a href="javascript:void(0);">
                                                                                    <img src="<?php echo $this->webroot; ?>user_images/<?php echo $show_private_gal['Photo']['img'] ?>" alt="" />
                                                                                </a>
                                                                            </li>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                                <li>
                                                                </li>
                                                                <div class="clr"></div>
                                                            </ul>
                                                        </div>
                                                        <div class="z-content">
                                                            <?php
                                                            if (!empty($optionsprivatestuffs)) {
                                                                foreach ($optionsprivatestuffs as $show_private_gal) {

                                                                    $test_var_test = explode('.', $show_private_gal['Photo']['img']);

                                                                    if ($test_var_test[1] == 'mp4') {
                                                                        ?>
                                                                        <video width="400" controls>
                                                                            <source src="<?php echo $this->webroot ?>user_images/<?php echo $show_private_gal['Photo']['img'] ?>" type="video/mp4">
                                                                            Your browser does not support HTML5 video.
                                                                        </video>
                        <?php
                    }
                }
            }
            ?>
                                                            <br />
                                                            <div class="clr"></div>
                                                        </div>
                                                    </div>
                                                </div>
            <?php } else {
            ?>
                                                <p> Please purchase membership from <a href="<?php echo $this->webroot ?>users/userdashboard">here</a> to view</p>        
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <!--  <P>  Please <a class="login sign_in_toggle" href="javascript:void(0);">Login</a> to view private gallery Section</P>-->
                                        <?php } ?>

                                    </div>




                                    <div class="right-detail-part details_right_section">
                                        <div class="profile-bio-stats">
                                            <dl>
                                                <dt style="padding-top: 0;">Ranking</dt>
                                                <dd>7</dd>
                                                <dt>Rating</dt>
                                                <dd style="font-size:27px !important"><?php echo (!empty($all_data) ? substr(($total_rate / count($all_data)), 0, 4) . "/5" : "N/A") ?></dd>
                                                <dt>Favorite</dt>
                                                <dd id="totalfav"><?php echo (!empty($users[0]['fav']) ? count($users[0]['fav']) : 0) ?></dd>
                                                <dt>Follow</dt>
                                                <dd id="totalfav"><?php echo (!empty($users[0]['fav']) ? count($users[0]['Follow']) : 0) ?></dd>
                                                <dt>Times Reported</dt>
                                                <dd class="last-item" style="border: none;" id="totalvotes">0</dd>
                                            </dl>
                                        </div>
                                        <div class="profile-bio-rt">
                                            <p style="min-height:200px;">
    <?php echo $users[0]['User']['about'] ?>
                                            </p>
                                            <div class="clr"></div>
                                            <br />
                                            <h4 style="font-size: 20px;font-family: proxima_novalight;">
                                                <div class="clr"></div>
                                                <div class="smart-forms smart-container">
                                                    <div class="notification spacer-t3 form-msg alert-success">
                                                        <a class="close-btn" onClick="close_div();" href="#">x</a>
                                                        <span id="voteStatus"></span>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="profile-bio-rt-button">
                                            <div class="post-share details_share">
                                                <a href="" class="fa fa-facebook-square"></a>
                                                <a href="" class="fa fa-twitter-square"></a>
                                                <a href="" class="fa fa-linkedin-square"></a>        	
                                            </div>
                                            <br/> <br/>
    <?php
    if ($check_membership > 0) {
        ?>
                                                <a href="<?php echo $this->webroot ?>escorts/escort_site/<?php echo base64_encode($users[0]['User']['id']); ?>" id="send_msg_btn" class="buttonGrey send_message" style="margin: 0 0 10px;" target="_blank">Visit Website</a>
                                            <?php } ?>
                                            <?php
                                            if ($users[0]['User']['template_id'] == 1) {
                                                ?>
                                            <!--  <a href="<?php echo $this->webroot ?>site1/index.php?id=<?php echo base64_encode($users[0]['User']['id']) ?>" id="send_msg_btn" data-tid="<?php echo $users[0]['User']['id'] ?>" class="buttonGrey send_message" style="margin: 0 0 10px;" >Visit Website</a> -->
                                                <?php
                                            }
                                            ?>

                                            <?php
                                            if ($users[0]['User']['template_id'] == 2) {
                                                ?>
                                                <!-- <a href="<?php echo $this->webroot ?>site2/index.php?id=<?php echo base64_encode($users[0]['User']['id']) ?>" id="send_msg_btn" data-tid="<?php echo $users[0]['User']['id'] ?>" class="buttonGrey send_message" style="margin: 0 0 10px;" >Visit Website</a> -->
                                                <?php
                                            }
                                            ?>


                                            <a href="javascript:void(0);" id="send_msg_btn" data-tid="<?php echo $users[0]['User']['id'] ?>" class="buttonGrey send_message chat_ico" style="margin: 0 0 10px;" onclick="sendMsgPopup()">Send Message</a>

    <?php
    if ($this->Session->read('fuid') != '' && $this->Session->read('fuid') != $users[0]['User']['id']) {
        ?>
                                                <a href="<?php echo $this->webroot ?>escorts/rateandreview/<?php echo base64_encode($users[0]['User']['id']) ?>"  class="buttonGrey send_message" style="margin: 0 0 10px;">Rate & Review</a>

                                            <?php } else { ?>
                                                <!--<a href="javascript:void(0);"  class="buttonGrey send_message" style="margin: 0 0 10px;" onclick="javascript:alert('Please Login to rate and review')">Rate & Review</a>-->
    <?php } ?>

                                            <?php
                                            //if($optionslogged[0]['User']['is_paid'] == 1){
                                            //if($optionslogged[0]['User']['is_paid'] == 1){
                                            //if($this->Session->read('fuid') != '' && $this->Session->read('fuid')!=$users[0]['User']['id'] && $optionslogged[0]['User']['is_paid'] == 1){
                                            if ($users[0]['User']['id'] != $this->Session->read('fuid')) {
                                                ?>
                                                <a href="javascript:void(0)" class="buttonGrey book_me chat_ico" onclick="booking_validation('You cant book this escort')">Book Me</a> 


                                                <a href="javascript:void(0);" class="chat-bt  chat_now chat_ico"  style="margin: 0 0 10px;" onclick="booking_validation('You cant chat this escort')">Chat Now</a>
                                            <?php } ?> 
                                            <div class="m-button new-s-bt">
    <?php
    if (!empty($optionslogged)) {
        if ($optionslogged[0]['User']['is_paid'] == 1) {
            $favFromID = array();
            foreach ($users[0]['fav'] as $value) {
                $favFromID[] = $value['from_id'];
            }
            ?>
                                                        <a href="javascript:void(0)" class="add_fav_btn" data-tid="<?php echo $users[0]['User']['id'] ?>" data-fid="<?php echo $this->Session->read("fuid") ?>" style="cursor:pointer;">
                                                        <?php if (in_array($this->Session->read("fuid"), $favFromID)) { ?>
                                                                <i class="fa fa-heart " style="color:red;"></i>
                                                                <span id="favspan">Added To Favorite</span>
                                                            <?php } else { ?>
                                                                <i class="fa fa-heart "></i>
                                                                <span id="favspan">Add To Favorite</span>
                                                            <?php } ?>
                                                        </a>
        <?php }
    } ?>                        
                                                <a href="javascript:void(0);" class="auto-wi alert_me_pop">
                                                    <i class="fa fa-bell "></i>Alert Me
                                                </a>
                                                <!--<a style="cursor:pointer" class="voteme" onClick="voteMe(this,'3');" href="#">
                                                  <i class="fa fa-thumbs-up "></i>
                                                  <span id="vote">Vote For Me</span>
                                                </a>-->
    <?php
    // $followFromID=array();
    // foreach ($users[0]['Follow'] as $value) {
    //   $followFromID[]=$value['follower_id'];
    // } 
    ?>
                                                <!-- <a style="cursor:pointer" class="voteme add_follow_btn" href="javascript:void(0);" data-tid="<?php echo $users[0]['User']['id'] ?>" data-fid="<?php echo $this->Session->read("fuid") ?>">
                                                <?php if (in_array($this->Session->read("fuid"), $followFromID)) { ?>
                                                        <i class="fa fa-thumbs-up" style="color:red;"></i>
                                                        <span id="vote">Following</span>
                                                <?php } else { ?>
                                                        <i class="fa fa-thumbs-up "></i>
                                                        <span id="vote">Follow Me</span>
                                                <?php } ?>
                                                </a> -->
                                                <a style="cursor:pointer" href="javascript:void(0);" class="reported_user_pop">
                                                    <i class="fa fa-flag"></i>
                                                    <span id="vote">Report a Fake</span>
                                                </a> 
                                            </div>
                                        </div>
                                        <div class="clr"></div>
    <?php
    if ($this->Session->read("fuid")) {
        ?>
                                            <div id="msg_frm_div" style="display:none">
                                                <h2>Send Message</h2>
                                                <form id="msg_form">
                                                    <div id="suc_msg"></div>
                                                    <input type="hidden" name="from_id" value="<?php echo $this->Session->read('fuid') ?>"/>
                                                    <input type="hidden" name="to_id" value="<?php echo $users[0]['User']['id'] ?>"/>
                                                    <input type="text" name="title" placeholder="Title" required/><br>
                                                    <textarea class="" name="message" placeholder="Message" required></textarea><br>
                                                    <input class="btn btn-primary" type="submit" value="SEND"/>
                                                </form>
                                            </div>
    <?php } ?>
                                        <div class="clr"></div>
                                        <div class="middle-tabs">
                                            <div id="demo-tabs"  class="marginBottom z-tabs-icons2 z-icons-dark  z-icons-large2 z-multiline hover medium z-shadows
                                                 z-tabs horizontal top top-left silver" data-role="z-tab" data-style="normal" data-orientation="horizontal"
                                                 data-theme="silver" data-options='{"orientation": "vertical", "style": "contained", "theme": "silver","defaultTab": "tab1", "shadows": true, "rounded": false, "size":"medium", "animation": {"effects": "slideV", "duration": 350, "type": "css", "easing": "easeOutQuint"}, "position": "top-compact"}'>
                                                <ul class="z-tabs-nav z-tabs-desktop">
                                                    <li style="" class="z-tab z-first" data-link="bio"><a class="z-link">
                                                            Profile Information                      </span></a></li>
                                                    <li style="" class="z-tab" data-link="rates"><a class="z-link">
                                                            Rates and Schedules                      </a></li>
                                                    <li style="" class="z-tab" data-link="tour"><a class="z-link">
                                                            Tours                      <span style="color: #bc27bd;">(
    <?php echo count($alloptionstours); ?>                      )</span></a></li>
                                                    <li style="" class="z-tab" data-link="review">
                                                        <a class="z-link">
                                                            Reviews<span style="color: #bc27bd;">(<?php echo (!empty($all_data) ? count($all_data) : 0) ?>)</span>
                                                        </a>
                                                    </li>
                                                    <li style="" class="z-tab" data-link="blog"><a class="z-link">
                                                            Blogs                      <span style="color: #bc27bd;">(
                                                                0                      )</span></a></li>
                                                    <li style="" class="z-tab" data-link="mw-wall"><a class="z-link">
                                                            My Wall                      <span style="color: #bc27bd;" id="totallikes">(
                                                                0                      )</span></a></li>
                                                    <li style="" class="z-tab" data-link="happy-hour"><a class="z-link">
                                                            Shop                      </a></li>
                                                    <li style="" class="z-tab" data-link="happy-hour"><a class="z-link">
                                                            Happy Hour                      </a></li>
                                                    <li style="" class="z-tab" data-link="location"><a class="z-link map">
                                                            Location                      </a></li>
                                                </ul>
                                                <div class="h-content2 z-container">
                                                    <div style="" class="z-content">
                                                        <div class="z-content-inner" id="col1">
                                                            <div class="pr-sed-new">
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Escort Type:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['EscortType']['name'] != "" ? $users[0]['EscortType']['name'] : "N/A") ?> (<?php echo ($users[0]['User']['gender'] == "F" ? "Female" : "Male"); ?>)</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl"> Age:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['User']['birthday'] != "0000-00-00") ? date_diff(date_create($users[0]['User']['birthday']), date_create('today'))->y : "N/A" ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Eye Color:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['Eyecolor']['color_name'] != "" ? $users[0]['Eyecolor']['color_name'] : "N/A") ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Experience:</section>
                                                                    <section class="agnr">Very Experienced</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl"> Height:</section>
                                                                    <section class="agnr"><?php echo $users[0]['User']['height'] . " ft" ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl"> Weight:</section>
                                                                    <section class="agnr"> <?php echo $users[0]['User']['weight'] . " kg" ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl"> Availability:</section>
                                                                    <section class="agnr">Incall</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Hair Color:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['Haircolor']['color_name'] != "" ? $users[0]['Haircolor']['color_name'] : "N/A") ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <!--<section class="escort-profledata">
                                                                  <section class="agnl">Social Escort:</section>
                                                                  <section class="agnr">Yes</section>
                                                                  <section class="clr"></section>
                                                                </section>-->
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Body Type:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['BodyType']['body_type'] != "" ? $users[0]['Haircolor']['color_name'] : "N/A") ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Ethnicity:</section>
                                                                    <section class="agnr"><?php //echo ($users[0]['BodyType']['body_type']!=""?$users[0]['Haircolor']['color_name']:"N/A")  ?>N/A</section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Bust Size:</section>
                                                                    <section class="agnr"><?php echo $users[0]['User']['bust_size'] . " cm" ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="escort-profledata">
                                                                    <section class="agnl">Origin:</section>
                                                                    <section class="agnr"><?php echo ($users[0]['Origin']['name'] != "" ? $users[0]['Origin']['name'] : "N/A") ?></section>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="clr"></section>
                                                            </div>
                                                            <div class="pr-sed-new">
                                                                <section class="enjoy-list">
                                                                    <h5>
                                                                        Languages                            </h5>
                                                                    <ul class="service-cost">
                                                                        <li> <span>
                                                                                Lower Intermediate                                </span> <a  title="Italiano"><i class="fa fa-check-square"></i>
                                                                                Italiano                                </a> </li>
                                                                        <section class="clr"></section>
                                                                    </ul>
                                                                    <section class="clr"></section>
                                                                </section>
                                                                <section class="enjoy-list">
                                                                    <h5>
                                                                        Categories                            </h5>
                                                                    <ul>
                                                                        <li> <a  title="Busty Escorts"><i class="fa fa-check-square"></i>
                                                                                Busty Escorts                                </a> </li>
                                                                        <li> <a  title="Mature Escorts"><i class="fa fa-check-square"></i>
                                                                                Mature Escorts                                </a> </li>
                                                                        <li> <a  title="Black Escorts"><i class="fa fa-check-square"></i>
                                                                                Black Escorts                                </a> </li>
                                                                        <section class="clr"></section>
                                                                    </ul>
                                                                    <section class="clr"></section>
                                                                </section>
                                                            </div>
                                                            <section class="clr"></section>
                                                        </div>
                                                    </div>
                                                    <div class="profile-blocks">
                                                        <div class="profile-blocks">
                                                            <h3>
                                                                Rates                        </h3>
                                                            <div class="table-responsive " style="font-size: 12px;">
                                                                <table class="table table-bordered table-striped" style=" font-size: 11px;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Rates</th>
                                                                            <th> 30min</th>
                                                                            <th> 1 Hour</th>
                                                                            <th> 2 Hour</th>
                                                                            <th> 3 Hour</th>
                                                                            <th> Add Hour</th>
                                                                            <th> Night</th>
                                                                            <th> 1 Day</th>
                                                                            <th> 2 Day</th>
                                                                            <th> Weekend</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="text-nowrap">Incall</th>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['30min_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['1hr_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['2hr_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['3hr_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['addhr_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['night_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['1day_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['2day_incall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['weekend_incall'] ?> EUR</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="text-nowrap">Outcall</th>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['30min_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['1hr_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['2hr_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['3hr_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['addhr_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['night_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['1day_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['2day_outcall'] ?> EUR</td>
                                                                            <td style="text-align:left;"><?php echo $users[0]['Rate'][0]['weekend_outcall'] ?> EUR</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!--<div class="profile-blocks no-mb">
                                                          <h3>
                                                            Availability                        </h3>
                                                          <div id='calendar'></div>
                                                          <div class="clr"></div>
                                                        </div>-->
                                                        <div class="clr"></div>
                                                    </div>
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col3">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-tour">
                                                                    <h3><?php echo $users[0]['User']['name'] ?> Tour</h3>
                                                                    <div class="table-responsive ">
                                                                        <!-- <table style=" font-size: 11px;" class="table table-bordered table-striped">
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="no-record">No tour added yet.</div>
                                                                                </td>
                                                                            </tr>
                                                                        </table> -->

                                                                        <table class="table table-vcenter table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID#</th>    
                                                                                    <th>Location</th>
                                                                                    <th>From Date</th>
                                                                                    <th>To Date</th>
                                                                                    <th>Phone</th>
                                                                                    <th>Phone instructions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
    <?php
    $cnt = 1;
    foreach ($alloptionstours as $happyhourdata) {
        ?>
                                                                                    <tr>
                                                                                        <td><?php echo $cnt; ?></td>
                                                                                        <td><?php echo $happyhourdata['State']['name']; ?></td>
                                                                                        <td><?php echo $happyhourdata['Escorttour']['tour_from']; ?></td>
                                                                                        <td><?php echo $happyhourdata['Escorttour']['tour_from']; ?></td>
                                                                                        <td><?php echo $happyhourdata['Escorttour']['phone']; ?></td>
                                                                                        <td><?php echo $happyhourdata['Escorttour']['phone_instruction']; ?></td>
                                                                                    </tr>         
        <?php
        $cnt++;
    }
    ?>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col4">
                                                            <div class="profile-blocks">
                                                                <div class="reviews_box2" style="floaT: none; width: 100%;">
                                                                    <!--<div class="m-button" style="float:right;">
                                                                      <a href="#"  class="write_review_pop auto-wifi">Write Review</a>
                                                                    </div>-->
                                                                    <div class="clr"></div>
                                                                    <h2><span><?php echo $users[0]['User']['name'] ?></span> Reviews</h2>

    <?php
    if (!empty($all_data)) {
        foreach ($all_data as $key => $value) {
            ?>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <img src="<?php echo $this->webroot; ?>user_images/<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>" width="50" height="50">
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input type="hidden" name="" value="<?php echo $value['rating'] ?>" class="rating-sm" data-step="0.5" data-size="xxs">
                                                                                    <h4><?php echo $value['review'] ?></h4>
                                                                                    <p><?php echo $value['date'] ?></p>
                                                                                </div>
                                                                            </div>
        <?php }
    } else {
        ?>
                                                                        <div class="no-record" style="width:650px">
                                                                            No Review Added On <?php echo $users[0]['User']['name'] ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <!--<div class="clr"></div>
                                                                <div class="clr"></div>-->
                                                            </div>
                                                        </div>
                                                        <!--<div class="profile-blocks">
                                                          <h3 class="m-button"> Profile Comments
                                                            <a style="float:right" class="auto-wi write_comment"  href="javascript:void(0)"> Write Comment</a>
                                                          </h3>
                                                          <div class="clr"></div>
                                                          <br />
                                                          <div id="rcontainer" class="commentlist" >
                                                            <div class="no-record" style="width:650px">
                                                              No one has posted comment on 
                                                            </div>
                                                          </div>
                                                          <div class="clr"></div>
                                                        </div>-->
                                                    </div>
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col3">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-blog">
                                                                    <h3>
                                                                        <?php echo $users[0]['User']['name'] ?>'s Blogs</h3>
                                                                    <div class="table-responsive ">
                                                                        <table style=" font-size: 11px;" class="table table-bordered table-striped">
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="no-record"> No blog added yet.</div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col4">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-mw-wall">
                                                                    <h3><?php echo $users[0]['User']['name'] ?>'s Status</h3>
                                                                    <div class="table-responsive ">
                                                                        <table style=" font-size: 11px;" class="table table-bordered table-striped">
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="no-record"> No status added yet.</div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- ===============================Shop========================================-->
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col4">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-mw-wall">
                                                                    <section style="margin-bottom: 2px;" class="title-part-main">
                                                                        <section class="title-left">
                                                                            <h1> Physical Items </h1>
                                                                        </section>
                                                                        <section class="title-right"> <a class="v_butt" href="#"> View All </a> </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="esshop-tab-page">
                                                                        <section class="no-record">No physical items found</section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <br>
                                                                    <section style="margin-bottom: 2px;" class="title-part-main">
                                                                        <section class="title-left">
                                                                            <h1> Webcam Session </h1>
                                                                        </section>
                                                                        <section class="title-right"> <a class="v_butt" href="#"> View All </a> </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="esshop-tab-page">
                                                                        <section class="no-record">No Webcam Session found</section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <br>
                                                                    <section style="margin-bottom: 2px;" class="title-part-main">
                                                                        <section class="title-left">
                                                                            <h1> Private Album </h1>
                                                                        </section>
                                                                        <section class="title-right"> <a class="v_butt" href="#"> View All </a> </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="esshop-tab-page">
                                                                        <section class="no-record">No Private Album found</section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <br>
                                                                    <section style="margin-bottom: 2px;" class="title-part-main">
                                                                        <section class="title-left">
                                                                            <h1> Private Video </h1>
                                                                        </section>
                                                                        <section class="title-right"> <a class="v_butt" href="#"> View All </a> </section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="esshop-tab-page">
                                                                        <section class="no-record">No Private Video found</section>
                                                                        <section class="clr"></section>
                                                                    </section>
                                                                    <section class="clr"></section>
                                                                    <section class="clr"></section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- ===============================Shop========================================-->

                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col4">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-mw-wall">
                                                                    <section class="no-record">
                                                                        <table clas="table happyhourday">
                                                                            <tr>
                                                                                <th>ID#</th>
                                                                                <th>Service Type:</th>
                                                                                <th>Happy Hour Type:</th>
                                                                                <th>Happy Hour Amount:</th>
                                                                                <th>Phone number:</th>
                                                                                <th>Description:</th>
                                                                            </tr>
                                                                            <?php
                                                                            $cnt = 1;
                                                                            foreach ($allahppyhoursdata as $happyhourdata) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $cnt; ?></td>
                                                                                    <td><?php echo $happyhourdata['Happyhour']['service_id']; ?><</td>
                                                                                    <td><?php echo $happyhourdata['Happyhour']['happy_hour_type']; ?></td>
                                                                                    <td><?php echo $happyhourdata['Happyhour']['happy_hour_rate']; ?></td>
                                                                                    <td><?php echo $happyhourdata['Happyhour']['phone_number']; ?></td>
                                                                                    <td><?php echo $happyhourdata['Happyhour']['description']; ?></td>
                                                                                </tr>
        <?php
        $cnt++;
    }
    ?>
                                                                        </table>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="position: relative; display: block;" class="z-content z-active">
                                                        <div class="z-content-inner" id="col4">
                                                            <div class="profile-blocks">
                                                                <div class="pbox-mw-wall">
                                                                    <div class="no-record">
                                                                        Map location not available                            </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                                <div class="clr"></div>
                            </div>
                        <?php } ?>
                    </section>
                </section>
            </section>
        </section>
    </div>

    <div class="col-right">
        <?php echo $this->element('user_banner'); ?>
    </div>
</section>
<!-- Message Modal -->
<div class="modal fade" id="myMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Message</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" id="send_msg_frm" role="form">
                    <div id="msg_frm"></div> 
                    <input type="hidden" name="to_id" value=""> 
                    <div class="form-group">
                        <label  class="col-sm-2 control-label" for="inputEmail3">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3" >Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="" name="message" placeholder="Message"/></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="clr"></div>

<script type="text/javascript">
    $(document).ready(function () {
//        $("body").on('click', '#send_msg_btn', function () {
//        is_expire=<?php echo $check_membership ?> ;
//        $userid='<?php echo $this->Session->read('fuid') ?>'; 
//        if($userid!='')
//        {
//            if(is_expire==0)
//            {
//                 $("#notify_msg").html("You can't message this Escorts");
//                 $("#chat_notify").modal("show");
//            }
//            else
//            {
//                $("#msg_frm_div").css("display", "block");
//            }
//        }
//         
//            //$(this).attr("disable", true);
//        });

        $("#msg_form").submit(function (e) {
            e.preventDefault();
            if ($("input[name='from_id']").val() != "") {
                var frm = $(this).serialize();
                $.ajax({
                    url: "<?php echo $this->webroot ?>pages/send_msg",
                    data: frm,
                    type: "POST",
                    success: function (resp) {
                        alert(resp);
                    }
                });
            } else {
                alert("Please login first");
            }
        });

        // $(".rating-sm").rating({
        //     "readonly": true
        // });
    });
    function booking_validation(msg)
    {
        is_expire =<?php echo $check_membership ?>;
        $userid = '<?php echo $this->Session->read('fuid') ?>';
        if ($userid != '')
        {
            if (is_expire == 0)
            {
                $("#notify_msg").html(msg);
                $("#chat_notify").modal("show");
            }
            else
            {
                location.href = '<?php echo $this->webroot ?>users/booking/<?php echo base64_encode($users[0]['User']['id']) ?>';

                            }
                        }


                    }

                    function sendMsgPopup()
                    {
                        is_expire =<?php echo $check_membership ?>;
                        $userid = '<?php echo $this->Session->read('fuid') ?>';
                        if ($userid != '')
                        {
                            if (is_expire == 0)
                            {
                                $("#notify_msg").html("You cant Send message this escort");
                                $("#chat_notify").modal("show");
                            }
                            else
                            {
                                $("#msg_frm_div").css("display", "block");

                            }
                        }
                    }


</script>