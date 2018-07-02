<script src="<?php echo($this->webroot)?>ckeditor/ckeditor.js"></script>


<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Advertisement

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('Adpackage',array('class'=>'form-horizontal')); ?>
                                <?php echo $this->Form->input('id'); ?>
				    <div class="form-group ">
					<label class="col-sm-2"><strong>Name</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('name',array('label'=>false,'class'=>'form-control','required'=>'required')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
					<label class="col-sm-2"><strong>Daily Price</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('daily_price',array("type"=>"text",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
					<label class="col-sm-2"><strong>Weekly Price</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('weekly_price',array("type"=>"text",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
					<label class="col-sm-2"><strong>Size</strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('resolution',array("type"=>"text",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
                                        </div>
                                    </div>
                                <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button class="btn btn-primary" type="submit">Save</button>
                              <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

