<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add/Update Credit Packages
                        </header>
                        <div class="panel-body">
                            <div class="form">
				<?php echo $this->Form->create('Credit',array('class'=>'cmxform form-horizontal adminex-form'));
				echo $this->Form->input('id');
				?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Enter number of credits <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <!--<input class=" form-control" id="firstname" name="firstname" type="text" />-->
					<?php echo $this->Form->input('credit_number',array('label'=>false,'required'=>'required','class'=>'form-control')); ?>
                                        </div>
                                    </div>
				
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Enter Cost (In Euro) <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php echo $this->Form->input('cost',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Total Cost')); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Discount </label>
                                        <div class="col-lg-10">
					    <input type="radio" name="data[Credit][is_discount]" id="yes" value="1" onclick="showDiv(1)" <?php echo ($this->request->data['Credit']['is_discount']=='1'?'checked':''); ?>> Yes
					    <input type="radio" name="data[Credit][is_discount]" id="no" value="0"  onclick="showDiv(0)" <?php echo ($this->request->data['Credit']['is_discount']=='0'?'checked':'') ?>> No
                                        </div>
                                    </div>

				   <div class="form-group" id="discountDiv" style="display:none;">
                                        <label for="email" class="control-label col-lg-2">Enter Discount (In percentage) </label>
                                        <div class="col-lg-10">
                                          <!--  <input class="form-control " id="email" name="email" type="email" />-->
					<?php echo $this->Form->input('discount',array('label'=>false,'class'=>'form-control')); ?>
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
