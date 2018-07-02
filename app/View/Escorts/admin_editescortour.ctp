
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Edit  Escort Tour Plans
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Escorttour',array('class'=>'cmxform form-horizontal adminex-for')); 
				echo $this->Form->input('id');
				
				?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Location</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('city_id',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Phone No</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('phone',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Phone Instructions</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('phone_instruction',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Tour Start Date</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('tour_from',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Tour End Date</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('tour_to',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                <?php //echo $this->Form->end(__('Submit')); 
					echo $this->Form->end();
				?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

