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
                                        <label for="name" class="control-label col-lg-2">Virtual Currency Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('virtual_currency',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Default Currency<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('default_currency',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Total Cost')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Credit Conversion Rate<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('conversion_rate',array('type'=>"text",'label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Total Cost')); ?>
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Minimum Credit Redeem Amount Limit<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('minimum_credit',array('type'=>"text",'label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Total Cost')); ?>
                                        </div>
                                </div>
                                
                                <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Credit Cash out Fees (%)<span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('credit_cash',array('type'=>"text",'label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Total Cost')); ?>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
function showDiv(val)
{
   if(val == 1){
	$('#discountDiv').show();
	}
	else if(val == 0){
	$('#discountDiv').hide();
	}
}

$(document).ready(function(){
if ($("#yes").prop("checked") == true) {
  // alert('hii');
   $('#discountDiv').show();
}
else if ($("#no").prop("checked") == true) {
   //alert('no');
  $('#discountDiv').hide();
}
	/*var val = $("input[name='data[Credit][is_discount]']:checked").val();
alert(val);
	/*if($('#yes').prop('checked') == true){
		alert('yes');
	}
	else if($('#yes').prop('checked') == false){
		alert('no');
	}*/
});
</script>
