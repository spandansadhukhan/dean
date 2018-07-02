<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add New Escort Type
                        </header>
                        <div class="panel-body">
                            <div class="form">
                <?php echo $this->Form->create('EscortType',array('class'=>'cmxform form-horizontal adminex-for')); 

                ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Escort Type</label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Active</label>
                                        <div class="col-lg-10 col-sm-9">     
                    <?php //echo $this->Form->input('is_active',array('label'=>false)); ?>
                    <input type="checkbox" name="data[EscortType][is_active]" value="1">
                   
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                <?php echo $this->Form->end();  ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
