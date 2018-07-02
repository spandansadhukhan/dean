<section id="contentsection">
<div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('http://layout9.demoparlour.com/advdirectory/assets/layout9/images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div>

<div class="col-left">
<script type="text/javascript">
function showMoreDetail(id)
{
	$("#more_section_"+id).fadeToggle(300);
}
</script>
<script type="text/javascript">
 function viewComment(id){
			BootstrapDialog.show({
			type : BootstrapDialog.TYPE_PRIMARY,
			title: 'Comment Detail',
			message: $('<div></div>').load('http://layout9.demoparlour.com/advdirectory/customer/my-comments-view/'+id),
			onshow: function(dialogRef){}
			});
		}
</script>
<style>
	.more_section {
    background: linear-gradient(to bottom, #FFFFFF 0%, #F6F6F6 47%, #EDEDED 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #DFDFDF;
    border-radius: 3px;
    padding: 10px;
}
</style>
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
            <h1 style="display:inline-block;">My Comments</h1>
            
          </section>
  
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner">
          
                    <div class="table-responsive for-msg">
                        <table class="table table-vcenter table-striped">
                            <thead>
                                <th style="text-align:center"><b>ID#</b></th>
                                <th style="text-align:center"><b>Image</b></th>
                                <th style="text-align:center"><b>Comment on Profile</b></th>
                                
                                <th style="text-align:center"><b>Comment</b></th>
                                <th style="text-align:center"><b>Commented Date</b></th>
                                <th style="text-align:center"><b>Options</b></th>
                            </thead>
                        <tbody>
                            <?php
                            if(!empty($comments)){    

                            $c = 1;

                                foreach ($comments as $showcomments) {
                            ?>
                               <tr>
                                    <td><?php echo $c; ?></td>
                                    <td><img src="<?php echo $this->webroot?>user_images/<?php echo $showcomments['Commentuser']['profile_image'];?>" height="50px;" width="50px;"></td>
                                    <td><?php echo $showcomments['Commentuser']['name'];?></td>
                                    
                                    <td><?php echo $showcomments['Comment']['comment'];?></td>
                                    <td><?php echo $showcomments['Comment']['comment_date'];?></td>
                                    <td>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletecomment', $showcomments['Comment']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                        </td>
                               </tr>
                            <?php 
                               $c++; 
                                   } 
                               }else{
                        ?>
                            <tr>
                                <td colspan="7">No records Found</td>       
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