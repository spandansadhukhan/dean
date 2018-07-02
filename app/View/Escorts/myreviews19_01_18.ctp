<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<script type="text/javascript">
$(document).ready(function(){
	/* default settings */
	$('.venobox').venobox(); 
	/* auto-open #firstlink on page load */
	$("#firstlink").venobox().trigger('click');
});
</script>
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
          
                <div class="table-responsive for-msg">
                <table class="table table-vcenter table-striped">
                    <thead>
                    <th style="width: 100px;">Reviewing User</th>
                    <th style="width: 100px;">Reviewing User Image</th>
                    <th style="width: 200px;">Rating</th>
                    <th>Review</th>
                    <th style="width: 100px;">Review Date</th>
                    <th style="width: 60px;">Option</th>
                    </thead>
                    <tbody>

                        
                          <?php 
                          if(!empty($reviews)){
                          foreach ($reviews as $showreviews) {
                    ?>
                    <tr>
                        <td><?php echo $showreviews['User']['name']?></td>
                        <td><img src="<?php echo $this->webroot?>user_images/<?php echo $showreviews['User']['profile_image']?>" height="50px;" width="50px;"/></td>
                        <td><?php for($i=1;$i<=$showreviews['Review']['rating'];$i++){?>

                            <i class="fa fa-star" aria-hidden="true"></i>
                        <?php } ?>    
                        </td>
                        <td><?php echo $showreviews['Review']['review']?></td>
                        <td><?php echo $showreviews['Review']['review_date']?></td>
                        <td>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletereview', $showreviews['Review']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                        </td>
                    </tr>
                    <?php   
                          }
                      }else{ ?>
                     <tr>
                         <td colspan="5">No records Found</td>   
                     </tr>     
                    <?php 
                        }
                    ?>        
                    </tbody>
                </table>
                </div>



                <div class="clr"></div>
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
</div>

<div class="col-right">
  <?php echo $this->element("user_banner");?>      
    </div>
</section>
<div class="clr"></div>