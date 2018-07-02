<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">

                            <div>
                            Payment Settings
                        </div>

                             <div class="form-group" style="float:right; margin-top:-27px; margin-right:2px;">
                                       
                                            <a href=""><button class="btn btn-success" >Need help?</button></a>
                                       
                                    </div>
                        </header>
                        <div class="panel-body">
                            
                            <div class="form">
                                    
                                    <div class="form-group ">
                                        <div class="row new_gap">

                                         <div class="col-lg-6 newly_gap">
                                        <label for="name" class="control-label" style="margin-left: 35%;">Pay through Credits</label>
                                    </div>
                                         
                                        <div class="col-lg-6 newly_gap">
                    <?php //echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                    <?php
                    if($payment['PaymentSetting']['pay_through_credit']==1)
                    {
                    ?>
                    <a href="javascript:void(0);" onclick="disable(<?php echo $payment['PaymentSetting']['pay_through_credit'];?>)"><button class="btn btn-success" >Disable</button></a>
                    <?php
                    }
                    else
                    {    
                    ?>
                    <a href="javascript:void(0);" onclick="enable(<?php echo $payment['PaymentSetting']['pay_through_credit'];?>)"><button class="btn btn-warning" >Enable</button></a>
                    <?php
                    }
                    ?>
                                        </div>
                                        </div>
                                    </div>
                                
                               

                                   <div class="form-group  ">
                                    <div class="row new_gap">
                                         <div class="col-lg-6 newly_gap">
                                        <label for="name" class="control-label" style="margin-left: 35%;">Pay through Credit Cards</label>
                                    </div>
                                         
                                        <div class="col-lg-6 newly_gap">
                    <?php //echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                    <?php 
                    if($payment['PaymentSetting']['pay_through_credit_cards']==1)
                    {
                    ?>
                    <a href="javascript:void(0);" onclick="disable_card(<?php echo $payment['PaymentSetting']['pay_through_credit_cards'];?>)"><button class="btn btn-success" >Disable</button></a>
                     <?php
                    }
                    else
                    {    
                    ?>
                    <a href="javascript:void(0);" onclick="enable_card(<?php echo $payment['PaymentSetting']['pay_through_credit_cards'];?>)"><button class="btn btn-warning" >Enable</button></a>
                    <?php
                    }
                    ?>
                                        </div>
                                    </div>
                                    </div>


                                    <div class="form-group  ">
                                        <div class="row new_gap">
                                         <div class="col-lg-6 newly_gap">
                                        <label for="name" class="control-label" style="margin-left: 35%;">Direct Payment</label>
                                    </div>
                                         
                                        <div class="col-lg-6 newly_gap">
                    <?php //echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                    <?php 
                    if($payment['PaymentSetting']['direct_payment']==1)
                    {
                    ?>
                    <a href="javascript:void(0);" onclick="disable_payment(<?php echo $payment['PaymentSetting']['direct_payment'];?>)"><button class="btn btn-success" >Disable</button></a>
                     <?php
                    }
                    else
                    {    
                    ?>
                    <a href="javascript:void(0);" onclick="disable_payment(<?php echo $payment['PaymentSetting']['direct_payment'];?>)"><button class="btn btn-warning" >Enable</button></a>
                    <?php
                    }
                    ?>
                    <a href="javascript:void(0);" onclick="direct_payment(<?php echo $payment['PaymentSetting']['id'];?>)"><button class="btn btn-primary" style="">Add info</button></a>
                                        </div>
                                    </div>
                                    </div>
                                 
                               
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


        <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Direct Payment Details</h4>
        </div>
          <div class="modal-body">
            <form method="post" name="" action="<?php echo($this->webroot)?>admin/payment_settings/directpayment">
             <input type="hidden" name="hid_id" id="hid_id" value="">
             

            Direct Payment Details<span style="color:red;">*</span>:<textarea name="direct_payment_details" style="height: 150px; width: 100%;" required><?php echo $payment['PaymentSetting']['direct_payment_details'];?></textarea>


             <div class="form-group" style="margin-top: 9px; margin-left: 87px;">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset" style="margin-left: 11px;">Reset</button>
                                        </div>
                                    </div>

                                  </form>
     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

        
        <script type="text/javascript">
        function valid()
        {
            pass=$("#pass").val();
            confirm_pass=$("#confirm_pass").val();
            if(confirm_pass!=pass)
            {
               $("#error_pass").show();
               return false;
            }
            
        }
        $(document).ready(function(){
        $("#state").change(function(){
        $.post("<?php echo $this->webroot;?>admin/users/changecity/"+$(this).val(),function(data){
        $("#city").html(data);    
        })    
        })    
        })

        function disable(aa){

      var a=confirm("Are you sure, you want to inactive this record?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentstatus/"+aa;
      } 
}

function enable(aa){
  
  var a=confirm("Are you sure, you want to active this record?")
      if (a)
      {
        
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentstatus/"+aa;
      } 
}

   function disable_card(aa){

      var a=confirm("Are you sure, you want to inactive this record?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentcard/"+aa;
      } 
}

function enable_card(aa){
  
  var a=confirm("Are you sure, you want to active this record?")
      if (a)
      {
        
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentcard/"+aa;
      } 
}

   function disable_payment(aa){

      var a=confirm("Are you sure, you want to inactive this record?")
      if (a)
      {
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentdirect/"+aa;
      } 
}

function enable_payment(aa){
  
  var a=confirm("Are you sure, you want to active this record?")
      if (a)
      {
        
        location.href="<?php echo $this->webroot?>admin/payment_settings/paymentdirect/"+aa;
      } 


}

function direct_payment(id){
        //alert("hello");
 
        $("#hid_id").val(id);  
        $("#myModal1").modal("show"); 
         
    }
        
        
    </script>
     <style>
        .btn-file > input {
        cursor: pointer;
        direction: ltr;
        font-size: 23px;
        margin: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform: translate(-300px, 0px) scale(4);
        } 
        input[type="file"] {
        padding-top: 7px;
        }
        .btn-primary.btn-alt {
        background-color: #ffffff;
        color: #1bbae1;
        }
        .btn-primary:hover
        {
        background-color: #1bbae1;
        border-color: #1593b3;
        color: #ffffff;
        }
       
        </style>  
        <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <style>
    .btn-success
    {
        background-color: #AAD178; 
        border-color: #7DB831; 
        color: #FFF;
    }

    .btn-success:hover {
    background-color: #7DB831;
    border-color: #578022;
    color: #FFF;
}
  .btn-primary
  {
    background-color: #6AD2EB;
    border-color: #1BBAE1;
    color: #FFF;
  }

  .btn-primary:hover {

   background-color: #1BBAE1; 
   border-color: #1BBAE1; 
   color: #FFF;
  }

    </style>

    
<style type="text/css">
.new_gap > .newly_gap {
    padding: 30px 0;
    margin-bottom: 10px;
}
.new_gap {
    border-bottom: 1px dotted #ccc;
}
</style>
    
    