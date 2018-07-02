        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Email Settings
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form class="cmxform form-horizontal adminex-form" id="signupForm" method="get" action="">-->
				
				<?php echo $this->Form->create('EmailSetting', array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); 
					
                                        echo $this->Form->input('id');
                                 ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Admin Personal Email </label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('admin_email',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false)); ?>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                         <label for="email" class="control-label col-lg-2">Contact Us Inquiries Recieve on Email</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('contact_email',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>

                                   <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2"> Website Emails Goes From Email</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('website_email',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
                                   
                        
				   
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Website Emails Goes From Name</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('website_email_name',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
                              
                                
                                
                                <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="reset" class="btn btn-default">Cancel</button>
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
        function readURL(input,img_id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+img_id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>



