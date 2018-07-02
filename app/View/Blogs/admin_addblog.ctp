<?php ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Agency
                        </header>
                        <div class="panel-body">
                            
                            <div class="form">
                <?php echo $this->Form->create('Blog',array('enctype'=>'multipart/form-data','class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm','onsubmit'=>'return valid()')); ?>

                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Name <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Blog Name','type'=>'text')); ?>
                                        </div>
                                    </div>


                
                                    <div class="form-group ">
                                        <label for="name" class="control-label col-lg-2">Description <span style="color:red;">*</span></label>
                                        <div class="col-lg-10">
                    <?php echo $this->Form->input('contaent',array('label'=>false,'required'=>'required','class'=>'form-control','placeholder'=>'Content','type'=>'textarea')); ?>
                                        </div>
                                    </div>

                               
                                


                               
                                     <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Upload Blog Picture</label>
                                        <div class="col-lg-10">
                                            <img id="preview" style=" height:150px; width:200px;" alt="" src="#">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1" class="control-label col-lg-2"></label>
                                        <div class="col-md-1">
                                            <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden">
                                                <span class="fileupload-new">
                                                    <i class="fa fa-paper-clip"></i> Select image                                                           </span>
                        <span class="fileupload-exists">                                                            </span>
                                                <input type="file" name="data[Blog][image]" class="default" onchange="readURL(this)">
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
    
    