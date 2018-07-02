<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<style>
.favrouite {
	color: #FF4D4D;
}
.profile-info ul li .s-right {
	width: 240px;
}
.profile-info ul li .s-left1 {
	width: 90px;
}
</style>
<script type="text/javascript">
	function showmore(id)
	{
		var chk=$('#more_txt_'+id).text();
		if(chk=='more'){
			$('#more_txt_'+id).text(' less');
		}else{
			$('#more_txt_'+id).text('more');
		}
		$("#show_text_"+id).toggle('slow');

	 };
</script>
<section id="wrapper">
<section id="middle">
<section id="middle-inner">
<section class="all-pins-do">

<div class="in-content">
<div class="profile-detail-m">
  <div class="pink_heading_box">
    <section class="">
      <h1 style="display:inline-block;">
        <?php echo $fetchproductDetails['Product']['name'] ?></h1>
      <h6 style=" display: inline-block;  margin-left: 5px;">By Admin</h6>
        
    </section>
    <div class="clr"></div>
  </div>
  <div class="agency-detail shop-dea">
    <div class="left-images-part"> <img src="<?php echo $this->webroot ?>product_img/<?php echo $fetchproductDetails['Gettwoimage'][0]['image'] ?>" alt="" style="margin-bottom:10px"/> </div>
    <div class="right-detail-part">
      <div class="profile-bio-stats"> </div>
      <style>
.rapper_block { width: 86px;}
</style>
      <div class="profile-bio-rt2">
        
       <div class="clr"></div>
                <p style="min-height:50px;"><?php echo $fetchproductDetails['Product']['description'] ?></p>
       </div>
      
        <section class="profile-info agency-ld">
        <ul>
          <li><span class="s-left1">
            Title            :</span><span class="s-right">
            <?php echo $fetchproductDetails['Product']['name'] ?></span>
            <section class="clr"></section>
          </li>
          <li><span class="s-left1">
            By :</span><span class="s-right"> <a target="_blank" href="#">
            Admin </a></span>
            <section class="clr"></section>
          </li>
          <li><span class="s-left1">
            Price :</span><span class="s-right">
            $<?php echo $fetchproductDetails['Product']['price'] ?></span>
            <section class="clr"></section>
          </li>

         <li><span class="s-left1">
            Quantity :</span><span class="s-right">
            <?php echo $fetchproductDetails['Product']['quan'] ?></span>
            <section class="clr"></section>
          </li>

          <li><span class="s-left1">
            Category :</span><span class="s-right">
            <?php echo $fetchproductDetails['ShopCategorie']['name'] ?></span>
            <section class="clr"></section>
          </li>

        </ul>
      </section>
      <div class="profile-bio-rt-button">
        <div class="post-share details_share">
        	<a href="" class="fa fa-facebook-square"></a>
        	<a href="" class="fa fa-twitter-square"></a>
        	<a href="" class="fa fa-linkedin-square"></a>        	
        </div>
          
           <form action="<?php echo $this->webroot ?>pages/cart" method="POST">
           <input type="hidden" name="data[Cart][user_id]" value="<?php echo $this->Session->read('fuid') ?>">
           <input type="hidden" name="data[Cart][product_id]" value="<?php echo $fetchproductDetails['Product']['id'] ?>">
           <input type="hidden" name="data[Cart][price]" value="<?php echo $fetchproductDetails['Product']['price'] ?>">
           <input type="hidden" name="data[Cart][quan]" value="1">
           <input type="hidden" name="data[Cart][ip]" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
           <input type="hidden" name="data[Cart][is_active]" value="1">
           <?php if($this->Session->read('fuid')){ ?> 
           <input type="submit" name="submit" value="Buy Now" class="buttonGrey">
           <?php }else{ echo 'Please Login';}?>
           </form>

         </div>
       
    </div>
    <div class="clr"></div>
  </div>
  <div class="title_bottom">
    Private Gallery Pictures  </div>
  <div class="clr"></div>
  <br>
  <div class="middle-tabs">
    <div class="h-content2 z-container">
      <div style="" class="z-content">
        <div class="z-content-inner" id="col1">
          <section class="gallery-shop">
            <ul>
     <?php 
     if(!empty($fetchproductDetails['ProductImage']))
     {
      foreach($fetchproductDetails['ProductImage'] as $productImage) {
     ?>         
<li><a href="#"  onclick="#"><img src="<?php echo $this->webroot ?>product_img/<?php echo $productImage['image'] ?>" style="height:180px;width:220px;" alt="Unlock Gallery"/></a></li>
   <?php }  } ?>           
                                        </ul>
          </section>
                    <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="clr"></div>
  <br>
  </div>
</section>
</section>
</section>
</section>
<script src="http://107.170.152.166/team2/escort/js/jquery.bxslider.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){
    
$('.bxslider').bxSlider({
	 infiniteLoop: false,
  minSlides: 1,
  maxSlides: 10,
  slideWidth: 100,
  slideMargin: 0
});
  });
</script> 

<!-- Fancy Box CSS and Javascript --> 
<!-- Add mousewheel plugin (this is optional) --> 
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="http://107.170.152.166/team2/escort/css/jquery.fancybox.css">
<script type="text/javascript" src="http://107.170.152.166/team2/escort/js/jquery.fancybox.js"></script> 
<script type="text/javascript">
jQuery(document).ready(function() {
		jQuery(".modalbox").fancybox();

		jQuery('.fancybox1').fancybox();

		jQuery("a.fancybox").fancybox({
  fitToView: false,
  afterLoad: function(){
   this.width = jQuery(this.element).data("width");
   this.height = jQuery(this.element).data("height");
  }
 }); // fancybox
// Change title type, overlay closing speed
			jQuery(".fancybox-effects-a").fancybox({
			});

});
</script> 
</div>

<div class="col-right">
   <?php echo $this->element('right_panel'); ?>
</div>
</section>
<div class="clr"></div>