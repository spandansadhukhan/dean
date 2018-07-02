<section id="contentsection">

<div class="col-left mt-4">
<section id="container" class="container">
<section id="middle">
<section id="middle-inner">

 <section class="all-pins-do">
<div class="my-account-inner row">

<div class="triangleBottomRight firstItem"></div>

<a style="display:none;" href="#;" class="website_activate"></a>
<?php echo $this->element('user_sidebar'); ?>
<div class="triangleBottomleft firstItem"></div>

     
<div class="right-my-account col-lg-9">
<div class="right-my-account-blocks">
<div class="detail-heading">
    <section class="title-left">
            <div class="acntSetting p-1">
           <h2 class="font-weight-normal">My Booking Requests</h2>
            </div>
            
          </section>
  
          <div class="clr"></div>
          </div>
           
          <div class="right-my-account-blocks-inner">
          
            <div class="table-responsive for-msg">
                <table class="table table-vcenter table-striped">
                  <thead>
                    <th style="text-align:center">ID#</th>
                    <th style="text-align:center">Escort Name</th>
                    <th style="text-align:center">Escort Image</th>
                    <th style="text-align:center">Escort Contact</th>
                    <th style="text-align:center">Booking Time</th>
                    <th style="text-align:center">Duration(In Hrs.)</th>
                    <th style="text-align:center;">Status</th>
                  </thead>
                <tbody>
                  <?php if(!empty($bookinglist)){ 
                    $cnt = 1;
                      foreach ($bookinglist as $showbookingusers) {
                       
                    ?>
                  <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><?php echo $showbookingusers['Escort']['name']; ?></td>
                      <td><img src="<?php echo $this->webroot ?>user_images/<?php echo $showbookingusers['Escort']['profile_image']?>" height="50px" width="50px"></td>
                      <td><?php echo $showbookingusers['Escort']['phone_no']; ?></td>
                      <td><?php echo $showbookingusers['Booking']['booking_date']; ?></td>
                      <td><?php echo $showbookingusers['Booking']['duration']; ?></td>
                      <td><?php echo $this->Form->postLink(__('Delete'), array('action' => 'deletebooking', base64_encode($showbookingusers['Booking']['id'])),array("class"=>"btn btn-danger"), __('Are you sure you want to Delete?')); ?></td>
                  </tr>
                  <?php 
                        $cnt++;
                      }
                    }else{ ?>
                  <tr >
                    <td class="no-record" colspan="7">No Record Found</td>
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
      <?php echo $this->element('user_banner');?>
</div>
</section>
<div class="clr"></div>