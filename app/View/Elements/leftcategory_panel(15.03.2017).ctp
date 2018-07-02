		<section class="side-1 extra_search_section">
           <h3>Category</h3>
           <div class="category_boxx">
				<?php //print_r($category);?>
           <!--<a href="<?php echo $this->Html->url('/');?>escort-details/<?php echo base64_encode($showescortsdata['User']['id']);?>">-->
           <?php if($category){foreach($category as $cat){?>
           <a href="<?php echo $this->Html->url('/');?>users/escortlist/<?php echo $type;?>/<?php echo base64_encode($cat['Category']['id']);?>"><?php echo $cat['Category']['name'];?>(<?php echo $cat['Category']['count'];?>)</a>
           <?php }} ?>
           </div>
        </section><br/>
		<section class="side-1 extra_search_section">
        <h3>Featured Escort</h3>

        <!--<div id="cityList1" class="leftbg scroll-wrapper1 extra_search_cityList1">
           
            <div class="scroll-block extra_search_scroll-block">
             <?php 
                foreach ($showfeature as $showfeatured) {
                 
             ?>  
            <div class="first_part" style="text-align: center; margin: 0 auto; width: 49%; float: left; padding:5px 0;">
            <a href="<?php echo $this->webroot?>escort-details/<?php echo base64_encode($showfeatured['User']['id']);?>" target="_blank">    
            <img style="width: 87px; height:102px; text-align: center; margin: 0 auto;" src="<?php echo $this->webroot?>user_images/<?php echo $showfeatured['User']['profile_image'];?>">
            </a>
            </div>
            <?php } ?>
               </div>
             
            </div>-->
            <ul class="feature_box">
            	<?php 
                foreach ($showfeature as $showfeatured) {
                 
             	?>  
                <li>   <a href="<?php echo $this->webroot ?>escorts/escortdetails/<?php echo base64_encode($showfeatured['User']['id']); ?>"> <img  src="<?php echo $this->webroot?>user_images/<?php echo $showfeatured['User']['profile_image'];?>"></a></li>
				<?php }
				?>
			</ul>
    </section>