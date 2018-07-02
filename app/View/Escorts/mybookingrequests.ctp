  	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">Manage Booking</h2>
					</div>
					      <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Customers</th>
						        <th>Booking Time</th>
						        <th>Duration</th>
						        <th>Manage Bookings</th>
						        <th>Contact No</th>
						        <th>Status</th>
						        <th>Option</th>
						      </tr>
						    </thead>
						    <tbody>
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
<!--						      <tr>
						        <td>Customer</td>
						        <td>14 June 2017, 10:00:00</td>
						        <td>2 Hrs</td>
						        <td>Incall</td>
						        <td>99977766654</td>
						        <td><button type="button" class="btn btn-default btn_part2 btn-block"><i class="fa fa-check" aria-hidden="true"></i>Approved</button>
						            <div class="mx-auto text-center"><button type="button" class="btn btn-default btn_part3"><i class="fa fa-flag" aria-hidden="true"></i>
</button></div>
						        </td>
						        <td class="pt-4"><button type="button" class="btn btn-primary btnPart">More Detail</button>
						        </td>
						      </tr>
						      <tr>
						        <td>Customer</td>
						        <td>14 June 2017, 10:00:00</td>
						        <td>2 Hrs</td>
						        <td>Incall</td>
						        <td>99977766654</td>
						        <td><button type="button" class="btn btn-default btn_part2 btn-block"><i class="fa fa-check" aria-hidden="true"></i>Approved</button>
						            <div class="mx-auto text-center"><button type="button" class="btn btn-default btn_part3"><i class="fa fa-flag" aria-hidden="true"></i>
</button></div>
						        </td>
						        <td class="pt-4"><button type="button" class="btn btn-primary btnPart">More Detail</button>
						        </td>
						      </tr>
						      <tr>
						        <td>Customer</td>
						        <td>14 June 2017, 10:00:00</td>
						        <td>2 Hrs</td>
						        <td>Incall</td>
						        <td>99977766654</td>
						        <td><button type="button" class="btn btn-default btn_part3 btn-block"><i class="fa fa-times"></i> Rejected</button>
						            <div class="mx-auto text-center"><button type="button" class="btn btn-default btn_part3"><i class="fa fa-flag" aria-hidden="true"></i>
</button></div>
						        </td>
						        <td class="pt-4"><button type="button" class="btn btn-primary btnPart">More Detail</button>
						        </td>
						      </tr>
						      <tr>
						        <td>Customer</td>
						        <td>14 June 2017, 10:00:00</td>
						        <td>2 Hrs</td>
						        <td>Incall</td>
						        <td>99977766654</td>
						        <td><button type="button" class="btn btn-default btn_part2 btn-block"><i class="fa fa-check" aria-hidden="true"></i>Approved</button>
						            <div class="mx-auto text-center"><button type="button" class="btn btn-default btn_part3"><i class="fa fa-flag" aria-hidden="true"></i>
</button></div>
						        </td>
						        <td class="pt-4"><button type="button" class="btn btn-primary btnPart">More Detail</button>
						        </td>
						      </tr>-->
						    </tbody>
						  </table>
					</div>
				</div>
			</div>
		</div>
	</section>
	