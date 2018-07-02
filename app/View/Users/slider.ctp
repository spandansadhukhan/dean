
<ul class="bxslider">
    <?php 
       foreach ($banners as $showbanners) {
            if($showbanners['Banner']['image'] != ''){
               $img_path = $this->webroot.'images/'.$showbanners['Banner']['image'];
           }else{
                $img_path = $this->webroot.'noimage.png';
           }
    ?>
    <li><img src="<?php echo $img_path; ?>" target="_blank"></li>
   <?php } ?> 
</ul>
<link href="http://bxslider.com/lib/jquery.bxslider.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://bxslider.com/lib/jquery.bxslider.js"></script>
<script>
	$('.bxslider').bxSlider({
	 pager:false,
	 auto:true,
	 mode:'fade',
	 speed : 900
	});
</script>

<style>
	.bx-wrapper img{display: block;margin: 0 auto;}
	body{padding: 0;margin:0;}
	.bx-wrapper .bx-viewport{border:0;padding:0;left:0}
	ul.bxslider{padding:0;margin:0}
	li{height: 328px;overflow:hidden;width:100% !important}
	
	.bx-wrapper .bx-next{background:url(<?php echo $this->webroot.'images/'.'next.png'; ?>);background-position: center !important;}
	.bx-wrapper .bx-prev{background:url(<?php echo $this->webroot.'images/'.'prev.png'; ?>);background-position: center !important;}
</style>