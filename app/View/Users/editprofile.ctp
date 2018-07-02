     
<section class="main_body">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->element('user_sidebar'); ?>
            </div>
            <div class="col-md-9 whit_bg">
                <div class="right_dash_board">
                    <h1>Profile</h1>
                    <form class="edit_profile" action="<?php echo $this->webroot; ?>users/editprofile" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="data[User][id]" id="UserId" value="<?php echo($this->request->data['User']['id']);?>"/>
                        <input type="hidden" name="data[User][hidprofile_img]" id="UserHidProfileImg" value="<?php echo($this->request->data['User']['profile_img']);?>"/>
                        <input type="hidden" name="data[User][hidcover_img]" id="UserHidCoverImg" value="<?php echo($this->request->data['User']['cover_img']);?>"/>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="UserProfileImg">Upload Image</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Upload photo</span>
                                    <input type="file" name="data[User][profile_img]" id="UserProfileImg" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Gender">Gender</label>
                                <input type="radio" name="data[User][gender]" id="UserGender" value="M" required="required" <?php echo(($this->request->data['User']['gender']=='M')?'checked':'');?>/>&nbsp;Male &nbsp;<input type="radio" name="data[User][gender]" id="UserGender" value="F" required="required" <?php echo(($this->request->data['User']['gender']=='F')?'checked':'');?>/>&nbsp;Female&nbsp;
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="UserFirstName">First name</label>
                                <input type="text" name="data[User][first_name]" maxlength="50" id="UserFirstName" class="form-control" placeholder="Enter your First name" required="required" value="<?php echo($this->request->data['User']['first_name']);?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="UserLastName">Last name</label>
                                <input type="text" name="data[User][last_name]" maxlength="50" id="UserLastName" class="form-control" placeholder="Enter your First name" required="required" value="<?php echo($this->request->data['User']['last_name']);?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Tagline">Tagline</label>
                                <input type="text" name="data[User][tagline]" maxlength="200" id="Tagline" class="form-control" placeholder="Enter your Tagline" required="required" value="<?php echo($this->request->data['User']['tagline']);?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Location">Location</label>
                                <input type="text" name="data[User][location]" maxlength="200" id="Location" class="form-control" placeholder="Enter your Location" value="<?php echo($this->request->data['User']['location']);?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="zipcode">Zipcode</label>
                                <input type="number" name="data[User][zipcode]" maxlength="200" id="zipcode" class="form-control" placeholder="Enter your Zipcode" value="<?php echo($this->request->data['User']['zipcode']);?>" required="required"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="UserEmail">Email</label>
                                <input type="email" readonly="readonly" class="form-control" id="UserEmail" placeholder="Email" value="<?php echo($this->request->data['User']['email']);?>">
                            </div>
                            <div class="form-group col-md-6 birthday">
                                <label for="UserBirthday">Birthday</label>
                                <input type="text" name="data[User][birthday]" maxlength="100" id="UserBirthday" class="form-control" placeholder="Enter your birthday" value="<?php echo($this->request->data['User']['birthday']);?>"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ABN">ABN</label>
                                <input type="number" value="<?php echo($this->request->data['User']['abn']);?>" name="data[User][abn]" class="form-control" id="ABN" placeholder="ABN">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="UserAbout">Description</label>
                                <textarea name="data[User][about]" id="UserAbout" class="form-control"><?php echo($this->request->data['User']['about']);?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="radio">
                                  <label>
                                      <input type="checkbox" name="Post_type" <?php echo(($this->request->data['User']['user_type']==1 || $this->request->data['User']['user_type']==3)?'checked':'');?> value="Post" />&nbsp;Post tasks
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                      <input type="checkbox" name="Run_type" <?php echo(($this->request->data['User']['user_type']==2 || $this->request->data['User']['user_type']==3)?'checked':'');?> value="Run" />&nbsp;Run tasks
                                  </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                               <button type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
	section.t1 label {
    color: #000!important;
}
</style>
<script>  
$('.right_dash_board').enscroll({
    showOnHover: false,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

$(function(){
    $( "#UserBirthday" ).datepicker({ 
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0"
    });
});
</script>


                
                
