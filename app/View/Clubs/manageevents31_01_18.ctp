<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">



<section id="wrapper">
<section id="middle">
<section id="middle-inner">

 <section class="all-pins-do">
<div class="my-account-inner"><div class="sb-toggle-right navbar-right">
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
                                                <a style="display:none;" href="#;" class="website_activate"></a>
                                                    <?php echo $this->element('club_sidebar'); ?>
                                                <div class="triangleBottomleft firstItem"></div>
                                            </div>
<div class="right-my-account">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <h1 style="display:inline-block;">Add Event</h1>
            
          </section>
               
          
   
          
          <div class="clr"></div>
          </div>
           
			<div class="right-my-account-blocks-inner">
				<section class="title-left" style="display:none;">
				<h1 style="display:inline-block;">Add  Event</h1>
				</section>

					<form action="<?php echo $this->webroot?>clubs/add_event" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui" enctype="multipart/form-data">
					<input type="hidden" name="user_id" value="<?php echo $this->Session->read('fuid');?>">
					
					<!-- <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onclick="close_div();" href="#">\D7</a> <span class="ajax_message">Hello Message</span> </div> -->


					<div class="form-profile-block">
					<label class="pl">Event Title:</label>
					<div class="inputContainer">
					<div class="section" style="width: 285%">
					<label class="field">
					<input type="text" id="first_name" placeholder="Event Title" required="required" name="name" value="" maxlength="100" class="gui-input">
					</label>
					</div>
					</div>
					</div>

					

					


					<div class="form-profile-block">
					<label class="pl">Event Date:</label>
					<div class="inputContainer">
					<div class="section" style="width: 251%">
					<label class="field prepend-icon">
					<input type="text" placeholder="Event Date" class="event_date" value="" name="event_date" required>
					
					</label>
					</div>
					</div>
					</div>

					<div class="form-profile-block">
					<label class="pl">Event Venue:</label>
					<div class="inputContainer">
					<div class="section" style="width: 251%">
					<label class="field prepend-icon">
					<input type="text" placeholder="Event Venue" class="gui-input" value="" name="venue" required>
					
					</label>
					</div>
					</div>
					</div>
					




					<div class="form-profile-block">
					<label class="pl">Event Description :</label>
					<div class="inputContainer">
					<div class="section">
					<label class="field prepend-icon">
					
					<textarea name="contaent" class="pagecontent" required></textarea>

					</div>
					</div>
					</div>


					<div class="form-profile-block">
					<label class="pl">Event Image:</label>
					<div class="inputContainer">
					<div class="section" style="width: 251%">
					<label class="field prepend-icon">
					<input type="file" class="gui-input" name="img" >
					
					</label>
					</div>
					</div>
					</div>







					<div class="form-profile-block">
					<label class="pl">&nbsp;</label>
					<div class="inputContainer">
					<input type="submit" class="buttonGrey" name="button" id="button" value="Save">
					</div>
					</div>
					</form>

			</div>
</div>


 <div class="clr"></div>
</div>
 <div class="clr"></div>
</div>
 </section>
 <!--<div id="promo-bottom">
 
 </div>-->
</section>
</section>
</section>

<script>
	$('.textarea').wysihtml5();
</script>
</div>
    <div class="col-right">
        <section id="banners">
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x333 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
            <a class="banner200x200 promo" href="javascript:void(0)"> <span class="advertiseText">Advertise<br />
                    Here</span> <span class="targetText">Get targeted traffic<br>
                    to your website</span>
                <div class="simpleButtonBlack clickHere"><span class="buttonBlack">Buy <span>NOW</span></span></div>
            </a>
        </section>
    </div>
</section>
<div class="clr"></div>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<!--<script>
    $('.pagecontent').summernote({height: 300});
</script>-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
        $('.pagecontent').summernote({
            height: 150, // set editor height
            width: 600,
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true, // set focus to editable area after initializing summernote
        });

       
    });


  $( function() {
    $(".event_date").datepicker();
  } );

</script>