<section id="contentsection">


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


<section class="prd-details">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="acntSetting p-1 d-flex justify-content-between align-items-center">
						<h2 class="font-weight-normal mb-0"><?php echo $fetchproductDetails['Product']['name'] ?></h2>
						<p class="mb-0 font-16">By Admin</p>
					</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-lg-4">
				<img src="<?php echo $this->webroot ?>product_img/<?php echo $fetchproductDetails['Gettwoimage'][0]['image'] ?>" class="img-fluid">
			</div>
			<div class="col-lg-8">
				<div class="shpText">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<ul class="list-unstyled pl-0 toys-part">
						<li class="d-flex justify-content-start py-2">
							<div class="name">Title:</div>
							<div class="myToys"><?php echo $fetchproductDetails['Product']['name'] ?></div>
						</li>
						<li class="d-flex justify-content-start py-2">
							<div class="name">By:</div>
							<div class="myToys"><a href="#">Admin</a></div>
						</li>
						<li class="d-flex justify-content-start py-2">
							<div class="name">Price:</div>
							<div class="myToys">$<?php echo $fetchproductDetails['Product']['price'] ?></div>
						</li>
						<li class="d-flex justify-content-start py-2">
							<div class="name">Quantity:</div>
							<div class="myToys"><?php echo $fetchproductDetails['Product']['quan'] ?></div>
						</li>
						<li class="d-flex justify-content-start py-2">
							<div class="name">Category:</div>
							<div class="myToys"><?php echo $fetchproductDetails['ShopCategorie']['name'] ?></div>
						</li>
					</ul>
					<div class="d-flex justify-content-end">
						<ul class="socialListss">
							<li><button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i></button></li>
							<li><button type="button" class="btn btn-primary"><i class="fa fa-twitter"></i></button></li>
							<li><button type="button" class="btn btn-primary"><i class="fa fa-linkedin"></i></button></li>
						</ul>
					</div>
                                        
                                        <form action="<?php echo $this->webroot ?>pages/cart" method="POST">
           <input type="hidden" name="data[Cart][user_id]" value="<?php echo $this->Session->read('fuid') ?>">
           <input type="hidden" name="data[Cart][product_id]" value="<?php echo $fetchproductDetails['Product']['id'] ?>">
           <input type="hidden" name="data[Cart][price]" value="<?php echo $fetchproductDetails['Product']['price'] ?>">
           <input type="hidden" name="data[Cart][quan]" value="1">
           <input type="hidden" name="data[Cart][ip]" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
           <input type="hidden" name="data[Cart][is_active]" value="1">
           <?php if($this->Session->read('fuid')){ ?> 
           <button type="submit" class="btn btn-primary mt-3">Buy Now</button>
           <!--<input type="submit" name="submit" value="Buy Now" class="buttonGrey">-->
           <?php }else{ echo 'Please Login';}?>
           </form>
                                        
                                        
                                        
                                        
					<!--<button type="button" class="btn btn-primary mt-3">Buy Now</button>-->
				</div>
			</div>
		</div>
		<div class="privateGallery">
			<div class="row">
				<div class="col-lg-12">
					<div class="picturesPrivate p-2 mt-4">
						Private Gallery Pictures
					</div>
				</div>
			</div>
			<div class="row mt-4">
                            
                            <?php 
     if(!empty($fetchproductDetails['ProductImage']))
     {
      foreach($fetchproductDetails['ProductImage'] as $productImage) {
     ?>  
                            
				<div class="col-lg-3">
					<div class="pornImage" style="background:url(<?php echo $this->webroot ?>product_img/<?php echo $productImage['image'] ?>) no-repeat;"></div>
				</div>
                            
     <?php } } ?>
<!--				<div class="col-lg-3">
					<div class="pornImage" style="background:url(/team6/newver/images/porn.jpg) no-repeat;"></div>
				</div>
				<div class="col-lg-3">
					<div class="pornImage" style="background:url(/team6/newver/images/porn.jpg) no-repeat;"></div>
				</div>
				<div class="col-lg-3">
					<div class="pornImage" style="background:url(/team6/newver/images/porn.jpg) no-repeat;"></div>
				</div>-->
			</div>
		</div>
	</div>
</section>

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