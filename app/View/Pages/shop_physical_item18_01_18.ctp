<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<script type="text/javascript">
function resetform(reloadurl)
{
 window.location.href = siteurl+reloadurl;
}

</script>
<style type="text/css">
.pin_d {
	width: 230px;
}
</style>
<section id="wrapper">
  <section id="middle" style="background:#fff;">
    <section id="middle-inner">
      <section class="all-pins-do">
        <div class="detail-heading">
    <section class="title-left">
      <h1 style="display:inline-block;">
        Product Listing      </h1>
      <h6 style=" display: inline-block;  margin-left: 5px;"></h6>
              
    </section>
    <div class="clr"></div>
  </div>
        <!--<div class="show-ad-ser searchint advance_search_click" style="display:block;"><a style="cursor:pointer;"><i class="fa fa-search"></i>
          Advance Search</a></div>-->
        
<div class="clr"></div>
        <section id="content">
          <div class="clr"></div>
          <section class="advance-box-part" style="display:none">
            <div class="smart-wrap">
              <div class="smart-forms smart-container">
                <h3>
                  Advance Search</h3>
                <form action="#" accept-charset="utf-8" method="get" id="ind_form">  <div class="colm colm6">
                  <div class="section">
                    <label class="field">
                      <input type="text" placeholder="Search By Album Title" value="" class="gui-input" id="from" name="title">
                    </label>
                  </div>
                  <!-- end section --> 
                  
                  <!-- end section --> 
                  
                  <!-- end section --> 
                  
                  <!-- end section --> 
                  
                </div>
               

                  <div class="section colm colm6">
                  <label class="field select">
                    <select name="sort_by" id="sort_by">
                      <option value="">
                      Sort By :</option>
                      <option value="newest">
                      Newest First </option>
                      <option value="oldest">
                      Oldest First </option>
                      <option value="price_low">
                      Lower Price First </option>
                      <option value="price_high">
                      Higher Price First </option>
                    </select>
                    <i class="arrow double"></i></label>
                </div>



                
                <div class="clr"></div>
                <center>
                  <input type="reset" value="Reset" name="submit" class="buttonGrey" onclick="resetform('shop/private-gallery/search-advance')" />
                  <input type="submit" value=" Search " name="submit" class="buttonGrey" />
                 
                </center>
              </div>
            </div>
            </form>            <div id="hamburger" class="filter-close-x advance_search_click"><i class="fa fa-times fa-fw"></i></div>
          </section>
          <br />
          <div id="container" class="transitions-enabled centered clearfix">
          
                        
            <?php 
            if(!empty($allproductsfront))
            {
            foreach($allproductsfront as $allproductsfrontend)
            {                
            ?>
              <div class="pin_d box online-girl">
              <div class="pin_d_inner" style="text-align:left;"><a href="<?php echo $this->webroot ?>pages/shop_physical_item_details/<?php echo $allproductsfrontend['Product']['slug']; ?>">
                <center>
                  <div class="ft-height"> <img src="<?php echo $this->webroot ?>product_img/<?php echo $allproductsfrontend['Gettwoimage'][0]['image'] ?>" alt="" /> </div>
                </center>
                </a>
                <div class="overlay-pic-out">
                  <div class="overlay-pic-inner">
                    <h3><?php echo $allproductsfrontend['Product']['name']; ?></h3>
                    <ul>
                      
                      <li>
                        Price:
                        $<?php echo $allproductsfrontend['Product']['price']; ?>,
                      </li>
                        
                       <li>
                       Quantity :- <?php echo $allproductsfrontend['Product']['quan']; ?>
                       </li>
                      
                        <li>
                        By :-Admin <div class="clr"></div>
                      </li>
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
                    <?php
                      }
                     }
else
{
   echo "No product Found In This Category";
}
                     ?>



                      </div>


<p><?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></p>
                    <div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
                    </div>



                    <section class="clr"></section>
        </section>
      </section>
    </section>
  </section>
</section>
<!--</section>
</section>-->

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

<style>
.paging .disabled {background:#7e0b80;}
span.paging.disabled:hover {color:#7e0b80;}
</style>