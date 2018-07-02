


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
                        <h2 class="font-weight-normal">My Purchased Lists</h2>
                        </div>
                        </section>
                        <div class="clr"></div>
                        </div>



                        <div class="right-my-account-blocks-inner">
                        <div class="table-responsive for-msg">
                        <table class="table table-vcenter table-striped">
                        <thead>
                        <tr>
                            <th>Id#</th>
                            <th>User</th>
                            <th>Total Amount</th>
                            <th>Action Taken</th>
                            <th>Order Date</th>
                            <th>Transaction Id</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $cnt = 1;
                                    foreach ($orders as $showorders) {
                            ?>
                            <tr>
                                  <td><?php echo $cnt;?></td>
                                  <td><?php echo $showorders['User']['name'];?></td>
                                  <td><?php echo $showorders['OrderDetail'][0]['amount'];?></td>
                                  <td><?php echo $showorders['OrderDetail'][0]['order_status'];?></td>
                                  <td><?php echo $showorders['OrderDetail'][0]['order_date'];?></td>
                                  <td><?php echo $showorders['Order']['transaction_id'];?></td>
                                  <td><?php echo $showorders['Order']['payment_date'];?></td>
                                  <td><a href="javascript:void(0);" class="btn btn-primary">View</a></td>
                            </tr>

                            <?php            
                                    $cnt++;
                                    }
                            ?>
                                <tr>
                                    <td></td>    
                                </tr>
                        </tbody>
                        </table>						
                       
                    <div class="clr"></div>


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
      
</div>

<div class="clr"></div>