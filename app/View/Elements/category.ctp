		<section class="side-1 extra_search_section">
           <h3>Category</h3>
           <div class="category_boxx">
				
           <?php if($category){foreach($category as $cat){?>
           <a href="<?php echo $this->Html->url('/');?>users/escorttours/<?php echo base64_encode($cat['Category']['id']);?>"><?php echo $cat['Category']['name'];?>(<?php echo $cat['Category']['count']?>)</a>
           <?php }} ?>
           </div>
        </section><br/>
		