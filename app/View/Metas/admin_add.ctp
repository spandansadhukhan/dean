<script src="<?php echo($this->webroot)?>ckeditor/ckeditor.js"></script>


<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Add  Meta Tag

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form action="#" class="form-horizontal">-->
				<?php echo $this->Form->create('Meta',array('class'=>'form-horizontal')); ?>
				    <div class="form-group ">
                                        <label class="col-sm-2"><strong>Title<span style=" color:red;">*</span></strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('title',array('label'=>false,'class'=>'form-control','required'=>'required')); ?>
                                        </div>
                                    </div>
                                   <div class="form-group ">
					<label class="col-sm-2"><strong>Keyword<span style=" color:red;">*</span></strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('keyword',array("type"=>"text",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
					<label class="col-sm-2"><strong>Description<span style=" color:red;">*</span></strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('description',array("type"=>"textarea",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
					<label class="col-sm-2"><strong>Url<span style=" color:red;">*</span></strong></label>
                                        <div class="col-sm-12">
				            <?php echo $this->Form->input('url',array("type"=>"text",'label'=>false,'class'=>'form-control',"required"=>"required")); ?>
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

