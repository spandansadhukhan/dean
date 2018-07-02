	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Reviews</h2>
					</div>
					      <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Reviewing User</th>
						        <th>Reviewing User Image</th>
						        <th>Rating</th>
						        <th>Review</th>
						        <th>Review Date</th>
						        <th>Option</th>
						      </tr>
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
                            <td colspan="7">No  Records Found</td>
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
	