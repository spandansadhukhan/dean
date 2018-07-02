<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Credit Settings
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Creditsetting',array('class'=>'cmxform form-horizontal adminex-form'));
				echo $this->Form->input('id');
				?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Virtual Currency Name</label>
                                        <div class="col-lg-10">
                                           
					<?php echo $this->Form->input('virtual_currency',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Default Currency</label>
                                        <div class="col-lg-10">
                                       <?php $options = array('AUD'=>'AUD','USD'=>'USD','EUR'=>'EUR','CAD'=>'CAD','CHF'=>'CHF','GBP'=>'GBP');?>
					<?php echo $this->Form->input('default_currency',array('label'=>false,'required'=>'required','options'=>$options,'class'=>'form-control')); ?>
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Credit Conversion Rate </label>
                                        <div class="col-lg-10">
                                            
					<?php echo $this->Form->input('conversion_rate',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Minimum Credit Redeem Amount Limit</label>
                                        <div class="col-lg-10">
                                      
					<?php echo $this->Form->input('minimum_credit',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>

                                    
				   <div class="form-group" >
                                        <label for="email" class="control-label col-lg-2">Credit Cash Out Fees (%)</label>
                                        <div class="col-lg-10">
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php echo $this->Form->input('credit_cash',array('label'=>false,'class'=>'form-control')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                <?php 	echo $this->Form->end(); ?>
                            </div>
                                    </div>
                                <!--</form>-->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->
