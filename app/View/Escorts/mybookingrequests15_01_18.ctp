<?php 
    //pr($booking); exit;
?>
<section id="contentsection">
<!-- <div id="wait-div" class="wait-div">
  <div class="wait-divin"> <span style="background: url('<?php echo  $this->Html->url('/') ?>images/loading.gif') no-repeat;"> <span style="margin-left:48px;">
    Please wait    ....</span> </span> </div>
</div> -->

<div class="col-left">
<script type="text/javascript">
function showMoreDetail(id)
{
	$("#more_section_"+id).fadeToggle(300);
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
            <h1 style="display:inline-block;">Manage Bookings</h1>
            
          </section>
  
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner">
          
            <div class="table-responsive for-msg">
                        <table class="table table-vcenter table-striped">
                        <!-- <thead>
                            <th style="text-align:center">ID#</th>  
                            <th style="text-align:center">User image</th>
                            <th style="text-align:center">Booking User</th>
                            <th style="text-align:center">Booking Time</th>
                            <th style="text-align:center">Amount</th>
                            <th style="text-align:center;">Action</th>
                        </thead> -->
                        <thead>
                            <th style="text-align:center">Customer</th>  
                            <th style="text-align:center">Booking Time</th>
                            <th style="text-align:center">Duration</th>
                            <th style="text-align:center">Manage Booking</th>
                            <th style="text-align:center">Contact No.</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center;">Option</th>
                        </thead>
                        <!-- <tbody>
                       
                        <?php 

                            if(!empty($booking)){
                              $c = 1;
                            foreach ($booking as $showbooking) { 
                        ?>
                        <tr>
                            <td><?php echo $c; ?></td>
                            <td><img src="<?php echo $this->webroot?>user_images/<?php echo $showbooking['User']['profile_image']; ?>" height="50px;" width="50px;"></td>
                            <td><?php echo $showbooking['User']['name']; ?></td>
                            <td><?php echo $showbooking['Booking']['booking_date']; ?></td>
                            <td> &#36; <?php echo $showbooking['Booking']['booking_amount']; ?></td>
                            <td>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletebooking', $showbooking['Booking']['id']),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?>
                        </td>
                        </tr>
                        <?php 
                        $c++;
                      } 
                    }else{ ?>
                        <tr>
                            <td colspan="7">No records Found</td>
                        </tr>
                        <?php } ?>
                         </tbody> -->
                             <?php 

                            if(!empty($booking)){
                            foreach ($booking as $showbooking) { 
                        ?>
                        
                            <tr>
                                <td><?php echo $showbooking['User']['name']; ?></td>
                                <td><?php 
                                        $raw_date = strtotime($showbooking['Booking']['booking_date']); 
                                        echo date("j-M-Y", $raw_date);
                                ?></td>
                                <td><?php echo $showbooking['Booking']['duration'] . ' hours';?></td>
                                <td><?php 
                                        $booking_type = $showbooking['Booking']['booking_type'];
                                        $proper_type = str_replace('_',  ' ', $booking_type);
                                        echo $proper_type;
                                ?></td>
                                <td><?php echo $showbooking['User']['phone_no'];?></td>
                                <td>
                                    <?php 
                                        if($showbooking['Booking']['status'] == 1){
                                            echo '<p style="background:#47A447"><i class="glyphicon glyphicon-ok"></i>Approved</p>';
                                        }else{
                                    ?>
                                    <a href="javascript:void(0);" class="btn btn-success" onclick="accept_booking(<?php echo $showbooking['Booking']['id']; ?>);">Accept</a>
                                 
                                    &nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-danger">Reject</a>
                                       <?php }?>
                                </td>
                                <td><a href="javascript:void(0);" class="btn btn-primary">Details</a></td>    
                            </tr>
                        <?php 
                              }
                            }else{ ?>
                        <tr>
                            <td colspan="7">No Booking Request Found</td>
                        </tr>
                        <?php } ?> 
                            <tbody>

                         </tbody>
                        </table>
                        </div>
          
                        <div style="display:none;">

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
<script>
 function accept_booking(id){
         $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot ?>escorts/accept_book/",
            data: {id:id}
        }).done(function (msg) {
            //$('#CityId').html(msg);
            if(msg == 1){
                alert('Booking Confirmed');
            }
        });

 }
</script>