  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", MaxDate: "-216m"});
    });
</script>
 <script type="text/javascript">
    function getCityList(cid) {
        //alert(cid);
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>users/getCityListOfState/",
            //dataType: "json",
            data: {cid: cid}
        }).done(function (msg) {
            //alert(msg);
            // ctlt
            $("#ctlt").html(msg);
        });
    }


    function checkUsername(username) {
        if (/^[a-zA-Z0-9]*$/.test(username) == false) {
            $("#ugreen").hide('');
            $("#ured").show('');
            $("#ured").text(' Invalid Username!');
            //$("#username").attr("placeholder", username).val("").focus().blur();
            //BootstrapDialog.alert('Username contains invalid characters. Only letters or numbers please');
            return false;
        }

        if (username) {
            //$('#wait-div-username').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkusername/",
                //dataType: "json",
                data: {username: username}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreen").hide('');
                    $("#ured").show('');
                    $("#ured").text('Username already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#username").attr("placeholder", username).val("").focus().blur();
                } else if (msg == 0) {
                    $("#ured").hide('');
                    $("#ugreen").show('');
                    $("#ugreen").text('Username available');
                }
            });
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function checkEmail(email) {
        if (!validateEmail(email)) {
            $("#ugreene").hide('');
            $("#urede").show('');
            $("#urede").text(' Invalid Email!');
            //BootstrapDialog.alert('Invalid Email');
            return false;
        }

        if (email) {
            $('#wait-div-email').show();
            $.ajax({
                type: "POST",
                url: "<?php echo $this->Html->url('/'); ?>users/checkemail/",
                //dataType: "json",
                data: {email: email}
            }).done(function (msg) {
                $('#wait-div-email').hide();
                if (msg == 1) {
                    $("#ugreene").hide('');
                    $("#urede").show('');
                    $("#urede").text('Email already exists!');
                    //BootstrapDialog.alert('Email already exists!. Try with another.');
                    $("#email").attr("placeholder", email).val("").focus().blur();
                } else if (msg == 0) {
                    $("#urede").hide('');
                    $("#ugreene").show('');
                    $("#ugreene").text('Email available');
                }
            });
        }
    }
</script> 
<style>
    .city-title {
    background: none repeat scroll 0 0 #fbce37;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    color: #0f0f0f;
    padding: 5px 5px 5px;
    float: left;
}
.icon-remove {
    background: url("../images/btn_remove_city.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    cursor: pointer;
    display: inline-block;
    height: 13px;
    margin: 0 0 0px 8px;
    width: 12px;
}
</style>
<style>
    .t1 span {
        color: #ff0000;
    }
</style>	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Profile</h2>
					</div>
					
					
					
					<div class="email mt-3 p-2">
						<p>Private Information</p>
					</div>
					<div class="emailAddress mt-4">
                                            <?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data','class'=>'ajaxform','id'=>'form-ui','accept-charset'=>'utf-8','method'=>'post')); ?>
                                            <?php echo $this->Form->input('id'); ?>
                                            <input type="hidden" name="ftype" value="persionalinfo" >
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Working Name*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control text-field','maxlength'=>100,'div'=>FALSE)); ?>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Age*:</label>
						    <div class="col-lg-8">
						      <input type="text" placeholder="I confirm that I am 18 years of age or older" value="<?php echo $this->request->data['User']['birthday'] ?>" class="form-control text-field" id="datepicker" name="birthday" >
						    </div>
						  </div>
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Height*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('height',array('options'=>$heights,'label'=>false,'class'=>'form-control','required'=>'required','empty'=>'Choose Height','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Weight*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('weight',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control text-field','placeholder'=>'Kgs','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Bust Size:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('bust_size',array('options'=>$busts,'label'=>false,"empty"=>"Choose Bust Size",'class'=>'form-control','required'=>'required','width'=>'280px','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Cup Size:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('cup_size',array('options'=>$cups,"empty"=>"Choose Cup Size",'class'=>'form-control','label'=>false,'required'=>'required','width'=>'280px','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                            
<!--                                            <div class="row">
							<div class="col-lg-12">
								<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Language Known*:</label>
						    <div class="col-lg-8">
						      <div class="option-group field">
							<p class="d-inline-block mr-4 mb-0 mt-2">
                            	<input type="checkbox" id="box-9" value="1" name="languages[]">
								<label for="box-9">Portugues</label>
						  	</p>
						  	<p class="d-inline-block mr-4 mb-0 mt-2">
                            	<input type="checkbox" id="box-19"  value="2" name="languages[]">
								<label for="box-19">Italiano</label>
						  	</p>

				</div>
						    </div>
						  </div>
							</div>
						</div>-->
                                            
                                           
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Availability:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('availability_id',array('label'=>false,'required'=>'required','class'=>'form-control','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Hair Color:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('haircolor_id',array('empty'=>'Choose Hair Color','class'=>'form-control','label'=>false,'required'=>'required','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Eye Color:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('eyecolor_id',array('empty'=>'Choose Eye Color','label'=>false,'class'=>'form-control','required'=>'required','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Body Type:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('bodytype_id',array('empty'=>'Choose Body Type','class'=>'form-control','label'=>false,'div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Choose Category:</label>
						    <div class="col-lg-8">
                                                        <select name="catlist" class="form-control" id="category_id">
                                                                <option value="">Choose Category</option>
                                                                <?php
                                                                foreach ($categories2 as $key=>$val)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key ?>" id="catopt<?php echo $key; ?>" style="display:<?php echo array_key_exists($key, $select_catname)?'none':''; ?>"
                                                                        ><?php echo $val;?></option>
                                                                <?php }?>
                                                            </select>
						    </div>
						  </div>
                                            
                                            <div  class="form-group row">
                                                <div class="col-lg-4"></div>
                                                	<div class="col-lg-8">
                                                                    <div id="servicediv"  >
                                                                        <div class="option-group field" id="serviceInput1">
                                                                            
                                                                            <?php if(!empty($select_catname)){ foreach($select_catname as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title" id="service-li-id_<?php echo $skdt?>">
   <input type="hidden" name="data[User][category_id][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deletecat(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                        </div>
                                                                </div>
                                            
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Choose Language:</label>
						    <div class="col-lg-8">
                                                        <select id="language_id" class="form-control">
                                                                <option value="">Choose Language</option>
                                                                <?php
                                                                foreach ($languages as $key=> $language)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key;?>" id="langopt<?php echo $key;?>" style="display:<?php echo array_key_exists($key, $select_language)?'none':'';?>"><?php echo $language; ?></option>
                                                                <?php } ?>
                                                            </select>
						    </div>
						  </div>
                                            <div  class="form-group row">
                                                <div class="col-lg-4"></div>
                                                	<div class="col-lg-8">
                                                                    <div id="languagediv"  >
                                                                        <div class="option-group field" id="LanguageInput">
                                                                            
                                                                            <?php if(!empty($select_language)){ foreach($select_language as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title">
                                                                                <input type="hidden" name="data[User][language][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deletelang(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                        </div>
                                                                </div>
                                            
                                            
<!--                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Choose Services:</label>
						    <div class="col-lg-8">
                                                        <select id="service_id" class="form-control">
                                                                <option value="">Choose Services</option>
                                                                <?php
                                                                foreach($services as $key =>$serv)
                                                                {
                                                                ?>
                                                                <option value="<?php echo $key; ?>" id="servopt<?php echo $key; ?>"
                                                                        style="display:<?php echo array_key_exists($key, $select_service)?'none':''?>"       
                                                                        ><?php echo $serv;?></option>
                                                                <?php }?>
                                                                
                                                            </select>
						    </div>
						  </div>-->
                                            
<!--                                            <div  class="form-profile-block">
                                                                    <div id="languagediv"  >
                                                                        <div class="option-group field" id="ServiceInput">
                                                                            
                                                                            <?php if(!empty($select_service)){ foreach($select_service as $skdt => $svdt){ ?>
                                                                            <div class="fleft city-title">
                                                                                <input type="hidden" name="data[User][service_id][]" value="<?php echo $skdt; ?>">
                                                                                <label for="service10" style="color:#FEFFFF;">
                                                                                    <?php echo $svdt?>
                                                                                </label>
                                                                                <a class="icon-remove" onclick="javascrpit:$(this).parent().remove();deleteservice(<?php echo $skdt; ?>)">
                                                                                
                                                                                
                                                                                </a>
                                                                            </div>                                                                            
                                                                            <?php } } ?>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="clr"></div>
                                                                </div>-->
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Ethnicity:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('nationality_id',array('empty'=>'Choose  Nationality','label'=>false,'class'=>'form-control','required'=>'required','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Country:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('country_id',array('options'=>$countries2,'default'=>!empty($this->request->data['User']['country_id'])?$this->request->data['User']['country_id']:'','empty'=>'Choose Country','label'=>false,'required'=>'required','class'=>'form-control','div'=>FALSE)); ?>
						    </div>
						  </div>
                                            
                                                <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">City:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('city_id',array('empty'=>'Choose Citiy','label'=>false,'required'=>'required','class'=>'form-control','div'=>FALSE)); ?>
						    </div>
						 </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Showing Face:</label>
						    <div class="col-lg-8">
                                                        <select class="form-control" name="is_show_face">
                                                            <option value="">Select</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
						      <?php //echo $this->Form->input('is_show_face',array('label'=>false,'class'=>'form-control','div'=>FALSE)); ?>
						    </div>
						 </div>
                                            
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">About Me:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('about',array('type'=>'textarea',"readonly"=>TRUE,'maxlength'=>1000,'label'=>false,'class'=>'form-control','div'=>FALSE,'style'=>'height:150px;')) ?>
						    </div>
						 </div>
                                            
                                            

						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Submit</button>
                                                    
						    </div>
						  </div>
                                            </form>
					</div>
                                    
                                    
                                        <div class="email mt-3 p-2">
						<p>Contact Information</p>
					</div>
                                    
					<div class="emailAddress mt-4">
                                            
                                           <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui"> 
                                               <?php echo $this->Form->input('id'); ?>
                                               <input type="hidden" name="ftype" value="contactinfo" >
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Contact Number*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('phone_no',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control text-field','div'=>FALSE,'placeholder'=>"Contact Number")); ?>
						    </div>
						  </div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Website Url*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('website_url',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control text-field','div'=>FALSE,'placeholder'=>'Website Url')); ?>
						    </div>
						  </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Skype ID*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('skypeid',array('type'=>'text','label'=>false,'required'=>'required','class'=>'form-control text-field','div'=>FALSE,'placeholder'=>'Skype')); ?>
						    </div>
						  </div>
                                            
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 col-form-label">Facebook ID*:</label>
						    <div class="col-lg-8">
						      <?php echo $this->Form->input('facebook_url',array('type'=>'text','label'=>false,'class'=>'form-control text-field','div'=>FALSE,'placeholder'=>'Facebook')); ?>
						    </div>
                                            </div>
                                            <div class="form-group row">
						    <label for="staticEmail" class="col-lg-4 text-right col-form-label"></label>
						    <div class="col-lg-8">
						      <button type="submit" class="btn btn-primary btnPart">Submit</button>
                                                    
						    </div>
                                            </div>
                                            
                                           </form> 
                                        </div>
                                    
                                    
					
					
				</div>
			</div>
		</div>
	</section>
	<?php
$remain_charecter=$permissions->my_profile-$count_charecter;
?>
<style>
    .modal-backdrop.in {position: relative;}
</style>

<script>
    function saveAboutMe(id) {
        if ($("#about").val() == "") {
            alert("About You Cannot Empty!");
            $("#about").focus();
            return false;
        }
        var aboutData = $("#about").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url('/'); ?>escorts/editEscortAbout/",
            //dataType: "json",
            data: {id: id, about: $("#about").val()}
        }).done(function (msg) {
            //$("#about").val(aboutData);
            //$("#myModal").modal('hide');
            window.location.href = "<?php echo Router::url(array('controller' => 'Escorts', 'action' => 'editescortprofile')); ?>";
        });
    }
    
    $(document).ready(function($) {
    var text_max = parseInt(<?php echo $permissions->my_profile?>)-parseInt(<?php echo $count_charecter;?>);
    $("#textarea_feedback").html(text_max+" characters remaining");
     $('#about').keyup(function(event) {
        var text_length = $('#about').val().length;
        var text_max=parseInt(<?php echo $permissions->my_profile?>);
        if(text_length==0)
        {
            $(this).attr('maxlength', text_max);
        }
            
        var text_remaining = text_max - text_length;
        if(text_remaining==0)
        {
        $('#textarea_feedback').html("");
        }
        else
        {
        $('#textarea_feedback').html(text_remaining + ' characters remaining');
       }
    }); 
    $("#category_id").change(function(){
        var txt= $("#category_id option:selected").text();
        var txtval= $("#category_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][category_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletecat("+txtval+")'></a></div>";
        $("#serviceInput1").append(html);
        $("#catopt"+txtval).hide();
        $('#category_id option[value=""]').prop('selected', true);

    });
        $("#language_id").change(function(){
        var txt= $("#language_id option:selected").text();
        var txtval= $("#language_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][language][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deletelang("+txtval+")'></a></div>";
        $("#LanguageInput").append(html);
        $("#langopt"+txtval).hide();
        $('#language_id option[value=""]').prop('selected', true);

    });
        $("#service_id").change(function(){
        var txt= $("#service_id option:selected").text();
        var txtval= $("#service_id option:selected").val();
        var html="<div class='fleft city-title'><input type='hidden' name='data[User][service_id][]' value="+txtval+"><label for='service10' style='color:#FEFFFF;'>"+txt+"</label><a class='icon-remove' onclick='javascrpit:$(this).parent().remove();deleteservice("+txtval+")'></a></div>";
        $("#ServiceInput").append(html);
        $("#servopt"+txtval).hide();
        $('#service_id option[value=""]').prop('selected', true);

    });

}); //end if ready(fn)
    function deletecat(cat)
    {
      $("#catopt"+cat).show();

    }
    function deletelang(cat)
    {
        $("#langopt"+cat).show();
    }
    function deleteservice(cat)
    {
        $("#servopt"+cat).show();
    }
    
</script>	