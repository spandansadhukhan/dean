        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            SEO Settings
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form class="cmxform form-horizontal adminex-form" id="signupForm" method="get" action="">-->
				
				<?php echo $this->Form->create('SeoSetting', array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); 
					//echo $this->Form->input('hide_logo',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['site_logo'])?$this->request->data['SiteSetting']['site_logo']:''));
					//echo $this->Form->input('hide_email_logo',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['email_template_logo'])?$this->request->data['SiteSetting']['email_template_logo']:''));
					//echo $this->Form->input('hide_fav',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['favicon'])?$this->request->data['SiteSetting']['favicon']:''));
                                        //echo $this->Form->input('hide_water',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['water_mark_img'])?$this->request->data['SiteSetting']['water_mark_img']:''));
                                        echo $this->Form->input('id');
                                 ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Site Default Title</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('site_title',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false)); ?>
                                        </div>
                                    </div>

                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Meta Keyword</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('meta_keyword',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'textarea')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Meta Description</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('meta_description',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'textarea')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Google Indexing</label>
                                        <div class="col-lg-10">
                                            <ul style=" list-style-type:none; display: list-item;">
                                                <li><input type="radio" name="data[SeoSetting][google_indexing]" value="enable" <?php echo $this->request->data['SeoSetting']['google_indexing']=='enable'?'checked':'';?>><label>Enable Google Indexing for website.</label></li>
                                                <li><input type="radio" name="data[SeoSetting][google_indexing]" value="disable" <?php echo $this->request->data['SeoSetting']['google_indexing']=='disable'?'checked':'';?>><label>Disable Google Indexing for website.</label></li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                   <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Google Analytic Code/Script</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('google_code',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'textarea')); ?>
               
                                        </div>
                                    </div>
                                   
                        
				    <div class="form-group ">
                                         <label for="email" class="control-label col-lg-2">Facebook URL</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('fb_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Twitter URL</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('twit_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">YouTube URL</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('youtube_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Instagram URL</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('instra_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Google+ URL</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('google_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Pinterest URL</label>
                                        <div class="col-lg-10">
                    <?php  echo $this->Form->input('print_url',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
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



