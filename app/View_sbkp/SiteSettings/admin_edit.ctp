        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Site Setting
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <!--<form class="cmxform form-horizontal adminex-form" id="signupForm" method="get" action="">-->
				
				<?php echo $this->Form->create('SiteSetting', array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-for')); 
					echo $this->Form->input('hide_logo',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['site_logo'])?$this->request->data['SiteSetting']['site_logo']:''));
					echo $this->Form->input('hide_email_logo',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['email_template_logo'])?$this->request->data['SiteSetting']['email_template_logo']:''));
					echo $this->Form->input('hide_fav',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['favicon'])?$this->request->data['SiteSetting']['favicon']:''));
                                        echo $this->Form->input('hide_water',array('type'=>'hidden','value'=>!empty($this->request->data['SiteSetting']['water_mark_img'])?$this->request->data['SiteSetting']['water_mark_img']:''));
                                        echo $this->Form->input('id');
                                 ?>
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-2">Site Name</label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('site_name',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-2">Default Currency</label>
                                        <div class="col-lg-10">
						<?php echo $this->Form->input('default_currency',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false,'options'=>$currency)); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-2">Credit Conversion Rate </label>
                                        <div class="col-lg-10">
					    <?php echo $this->Form->input('credit_convertation_rate',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-2">Site Status</label>
                                        <div class="col-lg-10">
                                            <ul style=" list-style-type:none; display: list-item;">
                                                <li><input type="radio" name="data[SiteSetting][site_status]" value="1" <?php echo $this->request->data['SiteSetting']['site_status']==1?'checked':'';?>><label>Yes, Site is live.</label></li>
                                                <li><input type="radio" name="data[SiteSetting][site_status]" value="0" <?php echo $this->request->data['SiteSetting']['site_status']==0?'checked':'';?>><label>No, site is in under maintenance. ( But still website will be visible to Admin if Administrator is loggedin into Admin Panel )</label></li>
                                            </ul>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">SiteSetting GEO Location</label>
                                         <div class="col-lg-10">
                                            <input type="radio" name="data[SiteSetting][is_geo]" value="1" <?php echo $this->request->data['SiteSetting']['is_geo']==1?'checked':'';?>><label>Allow (Useful if site is enabled for worldwide)</label>
                                            <input type="radio" name="data[SiteSetting][is_geo]" value="0" <?php echo $this->request->data['SiteSetting']['is_geo']==0?'checked':'';?>><label>Disallow (Useful in site targeted for a specific country)</label>
                                        </div>
                                    </div>
			   	    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Default Country</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('default_country',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'options'=>$country)); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Copyright Text</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('copy_right_text',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Page Size Admin</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('page_size_admin',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                         <label for="email" class="control-label col-lg-2">Page Size Front</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('page_size_front',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Banner Ad After Profile</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('banner_ad_afterprofile',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>
                                    
				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2"> Days For New Profile </label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('day_for_new_profile',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'text')); ?>
               
                                        </div>
                                    </div>                                    

				    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Bank Account Information</label>
                                        <div class="col-lg-10">
					<?php  echo $this->Form->input('bank_info',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>false,'type'=>'textarea')); ?>
               
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Site Logo </label>
                                        <div class="col-lg-10 col-sm-9">
                                            <div style="background-color:#ff; border:1px solid #ddd; border-radius:4px; width:200px; height:100px;">
                                                <?php
                                                if(isset($this->request->data['SiteSetting']['site_logo']))
                                                {    
                                                ?>
                                                <img src="<?php echo $this->webroot;?>site_logo/<?php echo $this->request->data['SiteSetting']['site_logo'];?>" id="site_logo" style="width:200px; height:100px">
                                                <?php  }else{?>
                                                <img src="#" id="site_logo" style="width:200px; height:100px">
                                                <?php } ?>
                                            </div>   
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                        <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                         <span class="fileupload-new">
					 <i class="fa fa-paper-clip"></i> Select image							
                                         </span>
					 
                                         <input type="file" name="data[SiteSetting][site_logo]" class="default" onchange="readURL(this,'site_logo')">
					</span>								
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Email Template Logo </label>
                                         <div class="col-lg-10 col-sm-9">
                                            <div style="background-color:#ff; border:1px solid #ddd; border-radius:4px; width:200px; height:100px;">
                                                <?php
                                                if(isset($this->request->data['SiteSetting']['email_template_logo']) and !empty($this->request->data['SiteSetting']['email_template_logo']))
                                                {    
                                                ?>
                                                <img src="<?php echo $this->webroot;?>site_logo/<?php echo $this->request->data['SiteSetting']['email_template_logo'];?>" id="email_tpllogo" style="width:200px; height:100px">
                                                <?php  }else{?>
                                                <img src="#" id="email_tpllogo" style="width:200px; height:100px">
                                                <?php } ?>
                                            </div>   
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                        <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                         <span class="fileupload-new">
					 <i class="fa fa-paper-clip"></i> Select image							
                                         </span>
					 <span class="fileupload-exists">															
                                         </span>
                                         <input type="file" name="data[SiteSetting][email_template_logo]" class="default" onchange="readURL(this,'email_tpllogo')">
					</span>								
                                        </div>
                                    </div>
                                    
                                
                                <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Watermark Image </label>
                                        <div class="col-lg-10 col-sm-9">
                                            <div style="background-color:#ff; border:1px solid #ddd; border-radius:4px; width:200px; height:100px;">
                                                <?php
                                                if(isset($this->request->data['SiteSetting']['water_mark_img']) and !empty($this->request->data['SiteSetting']['water_mark_img']))
                                                {    
                                                ?>
                                                <img src="<?php echo $this->webroot;?>site_logo/<?php echo $this->request->data['SiteSetting']['water_mark_img'];?>" id="watermark_logo" style="width:200px; height:100px">
                                                <?php  }else{?>
                                                <img src="#" id="watermark_logo"style="width:200px; height:100px">
                                                <?php } ?>
                                            </div>   
                                            
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                        <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                         <span class="fileupload-new">
					 <i class="fa fa-paper-clip"></i> Select image							
                                         </span>
					 <span class="fileupload-exists">															
                                         </span>
                                         <input type="file" name="data[SiteSetting][water_mark_img]" class="default" onchange="readURL(this,'watermark_logo')">
					</span>								
                                        </div>
                                    </div>
                                
                                <div class="form-group ">
                                        <label for="newsletter" class="control-label col-lg-2 col-sm-3">Favicon </label>
                                        <div class="col-lg-10 col-sm-9">
                                         <div style="background-color:#ff; border:1px solid #ddd; border-radius:4px; width:200px; height:100px;">
                                                <?php
                                                if(isset($this->request->data['SiteSetting']['favicon']) and !empty($this->request->data['SiteSetting']['favicon']))
                                                {    
                                                ?>
                                                <img src="<?php echo $this->webroot;?><?php echo $this->request->data['SiteSetting']['favicon'];?>" id="fav_icon" style="width:200px; height:100px">
                                                <?php  }else{?>
                                                <img src="#" id="fav_icon" style="width:200px; height:100px">
                                                <?php } ?>
                                            </div>     
                                            
                                            
                                        </div>
                                    </div>
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                        <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                         <span class="fileupload-new">
					 <i class="fa fa-paper-clip"></i> Select image							
                                         </span>
					 <span class="fileupload-exists">															
                                         </span>
                                         <input type="file" name="data[SiteSetting][favicon]" class="default" onchange="readURL(this,'fav_icon')">
					</span>								
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



