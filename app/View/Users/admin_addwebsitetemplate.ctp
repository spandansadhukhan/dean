<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Template
                        </header>
                        <div class="panel-body">
                            
                            <div class="form">
				<?php echo $this->Form->create('WebsiteTemplate',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm','onsubmit'=>'return valid()')); ?>
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Name')); ?>
                                        </div>
                                    </div>

                                <div class="form-group ">
                                        <label  class="control-label col-lg-2">Type <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <label for="example-inline-radio1" class="radio-inline">
                                                <input type="radio" value="1"  name="data[WebsiteTemplate][is_paid]" checked="">Paid</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" name="data[WebsiteTemplate][is_paid]">
                                            Free 
					</label>
                                        </div>
                                    </div>
                                
                                
                                <div class="form-group ">
                                        <label class="control-label col-lg-2">Price <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
					<?php echo $this->Form->input('price',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'price','type'=>'number')); ?>
                                        </div>
                                    </div>
                                
                                
                                
                               
                                
                                
                                
                                
                                <div class="form-group ">
                                        <label for="password1" class="control-label col-lg-2">Status <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                                            <label for="example-inline-radio1" class="radio-inline">
                                                <input type="radio" value="1"  name="data[WebsiteTemplate][is_active]" checked=""> Active.</label>
                                            <label for="example-inline-radio2" class="radio-inline">
                                            <input type="radio" value="0" name="data[WebsiteTemplate][is_active]">
                                            Inactive. 
					</label>
                                        </div>
                                    </div>
                                
                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Upload Template</label>
                                        <div class="col-lg-10">
                                            <img id="preview" style=" height:150px; width:200px;" alt="" src="#">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                            <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                                <span class="fileupload-new">
                                                    <i class="fa fa-paper-clip"></i> Select image															</span>
						<span class="fileupload-exists">															</span>
                                                <input type="file" name="data[WebsiteTemplate][template]" class="default" onchange="readURL(this)">
					</span>																		
                                        </div>
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
    
    