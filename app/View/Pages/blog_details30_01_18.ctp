<?php 
  //pr($blogs); exit;

?>
<?php echo $this->element("banner");?>
<section id="contentsection">
<?php echo $this->element("carousel_slider");?>
<div class="col-left">

<section id="wrapper">
  <section id="middle" style="background: #fff;">
    <section id="middle-inner">
      <section class="all-pins-do">
        <h2 class="title"> <span style="float:right;border:none" class="mobile-none"> <a href="#" class="sign-bt">
          Back          </a> </span>
         <?php echo $blogs[0]['Blog']['name'];?>      </h2>
        <div class="in-content">
          <section class="dt-content-blogs" style="width: 100%;">
            <?php 
                foreach ($blogs as $blogdetails) {
                
            ?>
            <article class="post post-details">
              <div class="entry-meta">
                <!--<time class="entry-date"><?php $posted_date = strtotime($blogdetails['Blog']['post_date']); 
                                                            echo date('Y-m-d', $posted_date);
                                                        ?></time>-->
                <!-- <span class="author">by<a href="" hidefocus="true" style="outline: medium none;"></a></span> 
                <span>in<a href="#">
                </a> </span> 
                <span style="border:none"> <a href="" style="outline: medium none;">
                
              </a> 
              </span> --> 
            </div>
              <div class="post-thumbnail">
                <?php 
                  if($blogdetails['Blog']['image'] != ''){
                ?>
                <img alt="" src="<?php echo $this->webroot ?>blog_images/<?php echo $blogdetails['Blog']['image']?>" />
                <?php }else{ ?>
                <img alt="" src="<?php echo $this->webroot ?>noimage.png" />
                <?php } ?>
                <section class="clr"></section>
              </div>
              <div class="entry-content">
              <p><time class="entry-date" style="color: #3e3e3e;"> Posted on:<?php $posted_date = strtotime($blogdetails['Blog']['post_date']); 
                                                            echo date('Y-m-d', $posted_date);
                                                        ?></time></p>
                <p class="blog_description_div">
                    <?php 
                        echo strip_tags($blogdetails['Blog']['contaent']);
                    ?>
                </p>
              </div>
              <section class="clr"></section>
            </article>
            <?php } ?>
            <section class="comments-area" id="comments" style="display: none;"> 
              <!-- Comment Form -->
              <div class="comment-respond" id="respond">
                <h3 class="comment-reply-title" id="reply-title">
                  Leave a Reply                  :</h3>
                <div class="comment-form">
                  <form action="#" method="post" accept-charset="utf-8" class="clearfix ajaxform" id="commentform">                  <div class="smart-forms smart-container" style="margin-bottom:10px">
                    <div class="ajax_report notification spacer-t5 form-msg"> <a class="close-btn" onClick="close_div();" href="javascript:;">�</a> <span class="ajax_message"></span> </div>
                  </div>
                  <p class="comment-form-comment">
                    <label for="comment">
                      Message                      <span class="required">*</span></label>
                    <textarea name="message" maxlength="300" id="comment" style="outline: medium none;" placeholder="Message"></textarea>
                    (
                    Please enter message within 300 characters                    ) </p>
                                    <p class="comment-form-author">
                    <label for="author">
                      YOUR DISPLAY Name                      <span class="required">*</span></label>
                    <input type="text" placeholder="Name" value="" name="name" id="author" style="outline: medium none;" Readonly>
                  </p>
                  <p class="comment-form-email">
                    <label for="email">
                      YOUR EMAIL ADDRESS                      <span class="required">*</span></label>
                    <input type="text" placeholder="Your Email Address" value="" name="email" id="email" style="outline: medium none;" Readonly>
                    <span class="optional">(
                    this will not be shared                    )</span> </p>
                  <p class="comment-form-url">
                    <label for="label">
                      Enter Security Code                      :<span>*</span></label>
                    <input type="text" placeholder="Security Code" class="large" name="captcha" id="captcha"  style="float: left;margin: 0 10px 0 0;width:124px;">
                    <span id="security_code_refresh_img" style="display: inline-block;">
                    <img src="http://107.170.152.166/team2/escort/images/1477566887.9.jpg" width="130" height="40" style="border:0;" alt=" " />                    </span> <a onclick="security_code_refresh(130,40);" class="captcha-refresh"><i class="fa fa-refresh fa-lg"></i></a> </p>
                  <p class="form-submit"> 
                    
                    <!--
											<a onclick="check()" class="sign-bt" style="height:30px;padding-top:13px">SUBMIT COMMENT</a>
-->
                    <input name="commentForm" type="button" class="sign-bt submitCommentForm" value="SUBMIT COMMENT" style=" float: left;  margin: 0;">
                    <input type="reset" value="reset fields" id="reset" name="reset" style="outline: medium none; float: right;">
                  </p>
                  <section class="clr"></section>
                  </form>                </div>
                <section class="clr"></section>
              </div>
              <!--/ Comment Form --> 
              
              <!-- Comment List -->
              <ol class="comment-list">
                <li class="comment depth-1 parent">
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Mande                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://danibarretto.com/purchase-commercial-auto-insurance-online.html">http://danibarretto.com/purchase-commercial-auto-insurance-online.html</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Tiger                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://betterlunchproject.com/bike-insurance-in-online.html">http://betterlunchproject.com/bike-insurance-in-online.html</a>   <a href="http://mercibouquetfloral.com/colonial-penn-insurance-unit.html">colonial penn insurance unit</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Arjay                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://creditospersonales.pw/caja-prestamo-policia.html">http://creditospersonales.pw/caja-prestamo-policia.html</a>   <a href="http://prestamosrapidosonline.top/solicitar-credito-sin-aval-sin-nomina.html">http://prestamosrapidosonline.top/solicitar-credito-sin-aval-sin-nomina.html</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Zavrina                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://webtrends.pw/babymetal-darake.com">babymetal-darake.com</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Wanita                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://creditospersonales.pw/banca-cetelem-bucuresti.html">banca cetelem bucuresti</a>   <a href="http://prestamosrapidosonline.top/banco-casa-propia-entidad-de-ahorro-y-prestamo.html">banco casa propia entidad de ahorro y prestamo</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Arry                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://prestamosrapidosonline.top/credito-1000-euros-cetelem.html">credito 1000 euros cetelem</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Jaylene                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://prestamosrapidosonline.top/creditos-pela-internet-tim.html">creditos pela internet tim</a>   <a href="http://prestamosrapidosonline.top/prestamos-rapidos-sin-nomina-asnef.html">http://prestamosrapidosonline.top/prestamos-rapidos-sin-nomina-asnef.html</a>                        </p>
                      </div>
                    </div>
                  </article>
                                    <article class="comment-body">
                    <div class="comment-avatar">
                                            <img alt="" src="http://107.170.152.166/team2/escort/images/no-image-profile-70x70.jpg>
                                          </div>
                    <div class="comment-aside">
                      <div class="comment-meta"> <span class="comment-author"><a style="outline: medium none;">
                        Betti                        </a></span> </div>
                      <div class="comment-content">
                        <p>
                          <a href="http://creditospersonales.pw/calculo-de-cuotas-de-un-prestamo.html">http://creditospersonales.pw/calculo-de-cuotas-de-un-prestamo.html</a>                        </p>
                      </div>
                    </div>
                  </article>
                                  </li>
              </ol>
              <!--/ Comment List --> 
              
              <!-- Comment Pagination -->
              <div class="comments-pagination">
                                <div class="post-pagination" style="float:left"><p><a style="outline: medium none;"> Prev</a><span class="current" style="margin: 0 5px 7px 0;">1</span><a href="#" style="outline: medium none;"> Next</a></p></div>                              </div>
              <!-- Comment Pagination --> 
            </section>
          </section>
          

          <div class="clr"></div>
        </div>
      </section>
    </section>
  </section>
</section>
<style>
.internal-link {
	color: #e13683;
	cursor: pointer;
	display: inline;
}
</style>
<script type="text/javascript">
		$(document).ready(function() {
			/**Simple image gallery. Uses default settings*/
	$("a.blog_internal_link").fancybox({
  fitToView: false,
  autoSize: false,
  afterLoad: function(){
   
  }
 }); // fancybox
// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
			});
		});
</script>
</div>

<div class="col-right">
  <?php echo $this->element("user_banner");?>
</div>
</section>
<div class="clr"></div>
<style>
 .entry-content p, .post .entry-meta > span, .post .entry-meta > time, .dt-content-blogs a {color:#3e3e3e!important;}
 .post-details .post-thumbnail {max-height: 500px;overflow: hidden;height: auto;}
  @media only screen and (min-width: 480px){
 .post-thumbnail { 	width: 30%; float: left; padding: 5px;}
 .entry-content { 	width: 65%; float: left;}
 }
</style>