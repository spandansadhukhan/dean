<!--<div class="users form">
<?php echo $this->Form->create('User',array('onsubmit'=>'return check()')); ?>
	<fieldset>
		<legend><?php echo __('Change Password'); ?></legend>
	<?php
		echo $this->Form->input('is_admin', array('type' => 'hidden','value'=>1));
		echo $this->Form->input('is_active', array('type' => 'hidden','value'=>1));
                echo $this->Form->input('id',array('value'=>$this->Session->read('userid')));
		echo $this->Form->input('password',array('type'=>'password','required'=>'required','id'=>'pass'));
		echo $this->Form->input('confirm_pass',array('type'=>'password','id'=>'confirm_pass','label'=>'Confirm Password'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>-->
<?php // echo $this->element('admin_sidebar'); ?>
<!--<script>
    function check() { 
    pass=$("#pass").val();
    confirm_pass=$("#confirm_pass").val();
    if(pass!=confirm_pass){
        $('#confirm_pass').get(0).setCustomValidity("Confirm  password doe's not match.");        
        return false;
    }  
    else {  
        $('#confirm_pass').get(0).setCustomValidity("");        
        
        }                 
}  
 </script>-->
<div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Change Password
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form class="cmxform form-horizontal adminex-form" id="signupForm" method="get" action="">-->
				
				<?php echo $this->Form->create('User',array('onsubmit'=>'return check()','class'=>'cmxform form-horizontal adminex-for')); 
					echo $this->Form->input('is_admin', array('type' => 'hidden','value'=>1));
					echo $this->Form->input('is_active', array('type' => 'hidden','value'=>1));
					echo $this->Form->input('id',array('value'=>$this->Session->read('userid')));
				?>
                              
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Password</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('password',array('type'=>'password','label'=>false,'class'=>'form-control','id'=>'pass')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Confirm Password</label>
                                        <div class="col-lg-10"><?php echo $this->Form->input('confirm_pass',array('type'=>'password','id'=>'confirm_pass','label'=>'Confirm Password','label'=>false,'required'=>'required','class'=>'form-control'));
					?>
                                        </div>
                                    </div>
			   	   
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
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
<script>
    function check() { 
    pass=$("#pass").val();
    confirm_pass=$("#confirm_pass").val();
    if(pass!=confirm_pass){
        $('#confirm_pass').get(0).setCustomValidity("Confirm  password does not match.");        
        return false;
    }  
    else {  
        $('#confirm_pass').get(0).setCustomValidity("");        
        
        }                 
}  
 </script>
