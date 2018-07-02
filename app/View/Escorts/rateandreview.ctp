<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> -->
<?php
    // echo "<pre>";
    // print_r($all_data);die;
?>
<section id="contentsection">
    <div id="wait-div" class="wait-div">
      <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
        Please wait    ....</span> </span> </div>
    </div>

    <div class="col-left">
        <script type="text/javascript">
            function readReview(id){
            	BootstrapDialog.show({
            	type : BootstrapDialog.TYPE_PRIMARY,
            	title: 'Review Details',
            	message: $('<div></div>').load('#/'+id),
            	onshow: function(dialogRef){}
            	});
            }
        </script>



        <section id="wrapper">
            <section id="middle">
                <section id="middle-inner">
                    <section class="all-pins-do">
                        <div class="my-account-inner">
                            <div class="sb-toggle-right navbar-right">
                            	<div class="navicon-line"></div>
                            	<div class="navicon-line"></div>
                            	<div class="navicon-line"></div>
                        	</div>
                            <div class="left-my-account-menu-m">
                                <div class="triangleBottomRight firstItem"></div>
                                    <style>
                                    .unreadCount {
                                    background: linear-gradient(to bottom, #fdf6ca 0%, #fdf6ca 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
                                    border-radius: 50%;
                                    color: #620c29;
                                    display: inline-block;
                                    font-family: arial;
                                    font-size: 12px;
                                    font-weight: bold;
                                    height: 20px;
                                    line-height: 20px;
                                    text-align: center;
                                    width: 20px;
                                    vertical-align:sub;
                                    }
                                    </style>
                                    <a style="display:none;" href="javascript:;" class="website_activate"></a>
                                    <?php echo $this->element('escort_sidebar'); ?>
                                <div class="triangleBottomleft firstItem"></div>
                            </div>
                            <div class="right-my-account">
                                <div class="right-my-account-blocks">
                                    <div class="detail-heading">
                                        <section class="title-left">
                                            <h1 style="display:inline-block;">My Reviews</h1>
                                        </section>
                                        <div class="clr"></div>
                                    </div>
                                           
                                    <div class="right-my-account-blocks-inner">
                                        <div class="smart-forms smart-container">
                                            <div  class="tab-pane active" role="tabpanel">
                                                <form method="post" accept-charset="utf-8" class="ajaxform" id="rating_frm">
                                                    <input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid');  ?>" >
                                                    <input type="hidden" name="profile_id" value="<?php echo base64_decode($this->params['pass'][0]); ?>">
                                                    <!-- <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div> -->
                                                    <div class="form-profile-block">
                                                        <label class="pl">Review:</label>
                                                        <div class="inputContainer">
                                                            <div class="section">
                                                                <label class="field">
                                                                    <input id="rating" type="hidden" class="rating rating-loading" value="" data-min="0" data-max="5" data-step="0.5" data-size="xs" name="rating"/>

                                                                    <textarea class="form-control" required="required" name="review" value="" placeholder="review" style="width: 506px; height: 124px;"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="form-profile-block">
                                                        <label class="pl">&nbsp;</label>
                                                        <div class="inputContainer">
                                                            <a class="buttonGrey" href="<?php echo $this->webroot ?>escort-details/<?php echo $this->params['pass'][0] ?>">Back</a>

                                                            <input type="submit" class="buttonGrey" name="button" id="button" value="Save">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- <span id="gggggggg"></span> -->
                                        <div class="clr"></div>
                                    </div>

                                    <div class="container">
                                        <div class="col-md-12" id="review_div">
                                            <?php foreach ($all_data as $key => $value) { ?>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="<?php echo $this->webroot; ?>user_images/<?php echo $value['image'] ?>" alt="<?php echo $value['name'] ?>" width="50" height="50">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="hidden" name="" value="<?php echo $value['rating'] ?>" class="rating-sm" data-size="xxs">
                                                        <h4><?php echo $value['review'] ?></h4>
                                                        <p><?php echo $value['date'] ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </section>
                </section>
            </section>
        </section>
    </div>

    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x100 promo" href="javascript:void(0);"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>


<script>
    $(document).ready(function(){
        $('#rating').rating();
        
        $(".rating-sm").rating({
            "readonly":true
        });

        $("#rating_frm").submit(function(e){
            e.preventDefault();
            var frm = $(this).serialize();
            $.ajax({
                url:"<?php echo $this->webroot ?>users/newreview",
                data:frm,
                type:"POST",
                success:function(resp){
                    data = $.parseJSON(resp);
                    if(data.status==1){
                        html="";
                        html+='<div class="row review_div_div" style="background-color:#FAFFBD">';
                            html+='<div class="col-md-3">';
                                html+='<img src="<?php echo $this->webroot; ?>user_images/'+data.u_img+'" alt="'+data.uname+'" width="50" height="50">';
                            html+='</div>';
                            html+='<div class="col-md-9">';
                                html+='<input type="hidden" name="" value="'+data.data.Review.rating+'" class="rating-sm"  data-step="0.5" data-size="xxs">';
                                html+='<h4>'+data.data.Review.review+'</h4>';
                                html+='<p>Now</p>';
                            html+='</div>';
                        html+='</div>';
                        $("#review_div").prepend(html);
                        $(".clear-rating").trigger("click");
                        $('#rating_frm')[0].reset();
                        setTimeout(function(){
                            $(".review_div_div").css("background-color", "");
                        },1500);
                    }
                    $(".rating-sm").rating({
                        "readonly":true
                    });
                }
            });
        });
    });

</script>
