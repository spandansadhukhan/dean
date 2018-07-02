<?php ?>

<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
      <header class="panel-heading">Manage Rate </header>
      <div class="panel-body">
        <div class="form"> <?php echo $this->Form->create('Rate',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm')); ?>
            <?php echo $this->Form->input('id'); ?>            
            <div class="form-group ">
            <label for="name" class="control-label col-lg-2">30 Min <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('30min_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('30min_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">1 Hour <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('1hr_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('1hr_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">2 Hour <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('2hr_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('2hr_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">3 Hour <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('3hr_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('3hr_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">Additional Hours <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('addhr_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('addhr_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">Overnight <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('night_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('night_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>  
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">1 Day <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('1day_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('1day_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div> 
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">2 Day <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('30min_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('30min_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>   
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">2 Day <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('2day_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('2day_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">Weekend <span style="color:red;">*</span></label>
            <div class="col-lg-5"> <?php echo $this->Form->input('weekend_incall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Incall')); ?> </div>
            <div class="col-lg-5"> <?php echo $this->Form->input('weekend_outcall',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Outcall')); ?> </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-primary" type="submit">Save</button>
              <button class="btn btn-default" type="reset">Cancel</button>
            </div>
          </div>  
          <?php 
	echo $this->Form->end();
	  ?>
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