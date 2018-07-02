<section class="main_body">
    <div class="container">
        <div class="row">
                <div class="col-md-3">
                    <?php echo $this->element('user_sidebar'); ?>
                </div>
                <div class="col-md-9 whit_bg">
                    
                    <div class="right_dash_board">
                        <h1>Change Password</h1>
                        <div id="cp_validation_err_msg"></div>
                        <form class="edit_profile" method="post" action=''>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="curr_pass">Current Password</label>
                                    <input class="form-control" id="curr_pass" type="password" name="data[User][curr_pass]" required="required">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-6">
                                    <label for="new_pass">New Password</label>
                                    <input class="form-control" id="new_pass" type="password" name="data[User][new_pass]" required="required">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-6">
                                    <label for="con_pass">Repeat Password</label>
                                    <input class="form-control" id="con_pass" type="password" name="data[User][con_pass]" required="required">
                                </div>								
                                <div class="form-group col-md-12">
                                   <button type="submit" onclick="return validate_changepassword();">Svae password</button>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function validate_changepassword(){
        var curr_pass=$('#curr_pass').val();
        var new_pass=$('#new_pass').val();
        var con_pass=$('#con_pass').val();
        if(curr_pass==''){
          $('#curr_pass').css('border','1px solid #e50516');
        }else{
          $('#curr_pass').css('border','1px solid #ccc');
        }
        if(new_pass==''){
          $('#new_pass').css('border','1px solid #e50516');
        }else{
          $('#new_pass').css('border','1px solid #ccc');
        }
        if(con_pass==''){
          $('#con_pass').css('border','1px solid #e50516');
        }else{
          $('#con_pass').css('border','1px solid #ccc');
        }
        
        if(new_pass != con_pass){
            $('#new_pass').css('border','1px solid #e50516');
            $('#con_pass').css('border','1px solid #e50516');
            $('#cp_validation_err_msg').html('<font style="color:#e50516">Password mismatch</font>');
            return false;
        }else{
            $('#cp_validation_err_msg').html('');
            return true;
        }
    }
</script>

