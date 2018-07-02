<section class="checkOutPage">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto">
					<div class="checkOutPart p-4">
						<div class="row">
					  		<div class="col-lg-12">
					  			<h2 class="mb-4">Check Out</h2>
					  		</div>
					  	</div>
					  <div class="informationDetails">
					  	
						<div class="row">
							<div class="col-lg-12">
								<h4>Information Details</h4>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">Name</label>
							<div class="col-lg-10"><?php echo $userpanties['User']['name'] ?></div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">Email Address</label>
							<div class="col-lg-10"><a href="nits.avik@gmail.com"><?php echo $userpanties['User']['email'] ?></a></div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">Phone No</label>
							<div class="col-lg-10"><?php echo $userpanties['User']['phone_no'] ?></div>
						</div>
					  </div>
					  <div class="informationDetails mt-3 mb-3">
						<div class="row">
							<div class="col-lg-12">
								<h4>Payment Details</h4>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-2">Total Payment</label>
							<div class="col-lg-10">$<?php echo $this->Session->read('totalamount') ?></div>
						</div>
					  </div>
                                            
                                            
                                            
                                            <?php echo $this->Form->create('Billing',array('enctype'=>'multipart/form-data')); ?>
<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('fuid'))); ?>
                                            
						<div class="address-partss">
							<div class="row">								
									<div class="col-lg-6">
									  <div class="informationDetailsPart">
									  	  <h4 class="mb-3">Shipping Address</h4>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_name',array('required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['name'],'id'=>'shipname','class'=>'form-control text-field')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_email',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Email','value'=>$userpanties['User']['email'],'id'=>'shipemail')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_phone',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['phone_no'],'id'=>'shipphone')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_address1',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Address1','id'=>'baddress1')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=>$countries, 'class'=>'form-control','id'=>'CountryId','required'=>'required')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_state_id',array('empty'=>'Choose State','label'=>false,'div'=>false,'options'=>$states, 'class'=>'form-control','required'=>'required','id'=>'StateId')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_city_id',array('empty'=>'Choose City','label'=>false,'div'=>false,'options'=>$cities, 'class'=>'form-control','id'=>'CityId')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('shipping_zip',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Zip','id'=>'shipzip')); ?> 
									</div>
									  </div>
									</div>
								
									<div class="col-lg-6">
									  <div class="informationDetailsPart">
									<h4 class="mb-3">Billing Address</h4>
									<div class="form-group">
										
                                                                                <?php echo $this->Form->input('billing_name',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['name'],'id'=>'billname')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('billing_email',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Email','value'=>$userpanties['User']['email'],'id'=>'billemail')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('billing_phone',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Name','value'=>$userpanties['User']['phone_no'],'id'=>'billphone')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('address1',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Address','id'=>'baddress1')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('country_id',array('empty'=>'Choose Country','label'=>false,'div'=>false,'options'=>$countries, 'class'=>'form-control','id'=>'CountryId1','required'=>'required')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('state_id',array('empty'=>'Choose State','label'=>false,'div'=>false,'options'=>$states, 'class'=>'form-control','required'=>'required','id'=>'StateId1')); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('city_id',array('empty'=>'Choose City','label'=>false,'div'=>false,'options'=>$cities, 'class'=>'form-control','id'=>'CityId1')); ?>
									</div>
									<div class="form-group">
                                                                                <?php echo $this->Form->input('zip',array('class'=>'form-control text-field','required'=>'required','label'=>false,'div'=>false,'placeholder'=>'Zip','id'=>'billzip')); ?>
									</div>
								</div>
								    </div>
							</div>
							<div class="row mt-4">
								<div class="col-lg-12">
                                                                    <button type="submit" class="btn btn-primary">Order Now</button>
								</div>
							</div>
						</div>
                                            <?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	