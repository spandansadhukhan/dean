<section id="contentsection">
<div id="wait-div" class="wait-div">
  <!-- <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div> -->
</div>

<div class="col-left">
<section id="wrapper">
  <section id="middle">
    <section id="middle-inner">
      <section class="all-pins-do">
        <h2 class="title">
          Escort Status        </h2>
        <div class="clr"></div>
        <section class="pin-wrapper">
          <div class="in-content">
            <ul class="review-list" id="review-list">
              <?php foreach ($allreviews as $showallreviews) { ?>
              <div class="escort-status">
              <ul>
                  <li>
                  <div class="reviews_image">
                  <p><?php echo $showallreviews['Reviewuser']['name']; ?></p> 
                    <a href="<?php echo $this->webroot ?>escort-details/<?php echo base64_encode($showallreviews['Review']['profile_id']);?>"> 
                      <?php if($showallreviews['Reviewuser']['profile_image'] != ''){ ?>
                    <img src="<?php echo $this->webroot?>user_images/<?php echo $showallreviews['Reviewuser']['profile_image']?>"> 
                    <?php }else{ ?>
                     <img src="<?php echo $this->webroot?>noimage.png"> 
                    <?php } ?>
                    </a> 
                  </div>
                  <div class="reviews_profile">
                    <div class="count-like">Like: <span id="likecount_24">0</span></div>
                    <br>
                    <div class="m-button new-s-bt" style="width:100px;margin-right:10px;"> 
                      <?php 
                        if($this->Session->read('fuid')){
                      ?>
                      <a style="cursor:pointer" onclick="likeMyProfile('<?php echo $this->Session->read('fuid'); ?>','<?php echo $showallreviews['Review']['profile_id'];?>')" href="#" class="likemystatus" id="likemystatus_24">
                    <i class="fa fa-thumbs-up"></i><span class=" votedcolor"> Like </span>
                    </a> 
                    <?php }else{ ?>
                      <a style="cursor:pointer" onclick="alert('Please login to Like!');" href="#" class="likemystatus">
                        <i class="fa fa-thumbs-up"></i><span class=" votedcolor"> Like </span>
                    </a>
                    <?php }?>
                    </div>
                    <div class="clr"></div>


                    <!-- Escort Details LInk-->
                    <a href="<?php echo $this->webroot ?>escort-details/<?php echo base64_encode($showallreviews['Review']['profile_id']);?>" class="view-wall">View My Wall</a> 
                  </div>
                  <div class="sta-es-right">
                  <div class="rev_name"> 
                      <a href="<?php echo $this->webroot ?>escort-details/<?php echo base64_encode($showallreviews['Review']['profile_id']);?>"><?php echo $showallreviews['User']['name']; ?></a> 
                  </div>
                  <div class="rev-by">Posted Time :<?php $rawdate = strtotime($showallreviews['Review']['review_date']); 
                  echo date('j F, Y,', $rawdate);?> </div>
                  <div class="clr"></div>
                  <br>
                  <!-- <img src="http://107.170.152.166/team2/escort/images/predlagam-rabota-za-kompanyonki-v-london-350x350.jpeg"> -->
                  <p><?php echo $showallreviews['Review']['review']; ?></p>
                  </div>
                  <section class="clr"></section>
                  </li>
              </ul>
              </div>
              <?php } ?>              

          </ul>
            <!-- <section class="pagi pgn01 grey"> 
                <center>
                <div id="more2" class="morebox" style="display:none;"> 
                  <a style="cursor:pointer" class="more buttonGrey" id="2">Load more status</a>
                </div>
              </center>
              
            </section> 
            <div class="clr"></div>-->
          </div>
          <section class="clr"></section>
        </section>
      </section>
    </section>
  </section>
</section>
<script type="text/javascript">
var more_url = 'escort-status/load-more-status/';
var no_record = 'No more Status found to load here';
</script> 
<script src="http://107.170.152.166/team2/escort/js/escortfront.js"></script>
</div>

<div class="col-right">
      <section id="banners">
          
   
   
                <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x333 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
                    <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x200 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
                    <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
        <a class="banner200x100 promo" href="#"> <span class="advertiseText">Advertise<br />
    Here</span> <span class="targetText">Get targeted traffic<br>
    to your website</span>
    <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
    </a>
          </section>
</div>
</section>
<div class="clr"></div>
<script type="text/javascript">
function likeMyProfile(senderid,userid){
    $.ajax({
    type: "post",
    url: "<?php echo $this->webroot ?>pages/likeescortprofile",
    data: {senderid:senderid,userid:userid},
    success: function(msg) { 
    //$('#state_name').html(msg); 
    alert('Liked');
    }
    });

}
</script>