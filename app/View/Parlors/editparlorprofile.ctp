<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd", maxDate: "-216m"});
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
	
	
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('parlor_sidebar'); ?>
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-6">
							<div class="agencyInformation bg-gray p-2 mb-2">
                                                             <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="edit_basic">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id']?>" >
                                                                                <input type="hidden" name="ftype" value="persionalinfo" >
								<h2 class="font-20 text-white mb-0">Parlor Information</h2>
								<p class="text-white font-14 mb-0 pb-2 border-bottom">(Please describe basic information about yourelf)</p>					


								<div class="row form-group mt-3">
									<label class="col-lg-4">Parlor Name</label>
									<div class="col-lg-6">
                                                                            <input type="text" placeholder="Parlour Name" class="form-control text-field" id="from" value="<?php echo $this->request->data['User']['org_name']?>" name="org_name">
									</div>
								</div>
								
								
								<div class="row form-group">
									<label class="col-lg-4">About You</label>
									<div class="col-lg-6">
									  <textarea placeholder="About you" name="about" readonly="" id="disabledInput" class="form-control" row="5"
                                                                                                          maxlength="<?php echo $remain_charecter;?>" readonly><?php echo nl2br($user['User']['about'])?></textarea>
<!--									  <div class="hint colorred">Hint:For Edit:Click here</div>-->
									</div>
								</div>
								<div class="row">
									<label class="col-lg-4"></label>
									<div class="col-lg-6">
									  <button type="submit" class="btn btn-primary btn-block">Save</button>
									</div>
								</div>
                                                             </form>
							</div>
							

						</div>
						<div class="col-lg-6">

							
							<div class="agencyInformation bg-gray p-2 mb-2">
                                                            <form action="" method="post" accept-charset="utf-8" class="ajaxform" id="form-ui">
                                                                                <input type="hidden" name="id" value="<?php echo $this->request->data['User']['id']?>" >
                                                                                <input type="hidden" name="ftype" value="contactinfo" >
								<h2 class="font-20 text-white mb-0">Contact Information</h2>
								<div class="row form-group mt-3">
									<label class="col-lg-4">Contact Number</label>
									<div class="col-lg-6">
                                                                            <input type="text" placeholder="Contact Number" class="form-control text-field" value="<?php echo $this->request->data['User']['phone_no']?>" id="phone_no" name="phone_no">
									</div>
								</div>
								
								
								
								<div class="row form-group">
									<label class="col-lg-4">Website Url</label>
									<div class="col-lg-6">
										<input type="text" placeholder="Website Url" class="form-control text-field" value="<?php echo $this->request->data['User']['website_url']?>" id="website_url" name="website_url">
									</div>
								</div>
                                                                
                                                                <div class="row form-group">
									<label class="col-lg-4">Skype ID</label>
									<div class="col-lg-6">
										<input type="text" placeholder="Skype" class="form-control text-field" value="<?php echo $this->request->data['User']['skypeid']?>" id="skype_url" name="skypeid">
									</div>
								</div>
                                                                
                                                                <div class="row form-group">
									<label class="col-lg-4">Facebook ID</label>
									<div class="col-lg-6">
										<input type="text" placeholder="Facebook" class="form-control text-field" value="<?php echo $this->request->data['User']['facebook_url']?>" id="facebook_url" name="facebook_url">
									</div>
								</div>
                                                                
								<div class="row">
									<label class="col-lg-4"></label>
									<div class="col-lg-6">
                                                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
									</div>
								</div>
                                                            </form>
							</div>
						</div>
					</div>
					<div class="locality agencyInformation bg-gray p-3">
						<h2 class="font-20 text-white mb-0">Locality</h2>
						<p class="text-white font-14 mb-0 pb-2 border-bottom">(Please describe your location)</p>								<div class="mapArea mt-3">
							<p class="font-12 text-white">Address:</p>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25263534.825478062!2d157.29145040576293!3d-39.3805157065144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d2c200e17779687%3A0xb1d618e2756a4733!2sNew+Zealand!5e0!3m2!1sen!2sin!4v1513253116495" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>							
							<button type="button" class="btn btn-primary mt-4">Save</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    
        <script>
    	//Reference: 
//https://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
;(function($) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		      isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		    return this.each(function() {

		      var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
		          $wrap = $('<div class="file-upload-wrapper">'),
		          $input = $('<input type="text" class="file-upload-input" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="file-upload-button">Choose File</button>'),
		          // Hack for IE
		          $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Choose File</label>');

		      // Hide by shifting to the left so we
		      // can still trigger events
		      $file.css({
		        position: 'absolute',
		        left: '-9999px'
		      });

		      $wrap.insertAfter( $file )
		        .append( $file, $input, ( isIE ? $label : $button ) );

		      // Prevent focus
		      $file.attr('tabIndex', -1);
		      $button.attr('tabIndex', -1);

		      $button.click(function () {
		        $file.focus().click(); // Open dialog
		      });

		      $file.change(function() {

		        var files = [], fileArr, filename;

		        // If multiple is supported then extract
		        // all filenames from the file array
		        if ( multipleSupport ) {
		          fileArr = $file[0].files;
		          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
		            files.push( fileArr[i].name );
		          }
		          filename = files.join(', ');

		        // If not supported then just take the value
		        // and remove the path to just show the filename
		        } else {
		          filename = $file.val().split('\\').pop();
		        }

		        $input.val( filename ) // Set the value
		          .attr('title', filename) // Show filename in title tootlip
		          .focus(); // Regain focus

		      });

		      $input.on({
		        blur: function() { $file.trigger('blur'); },
		        keydown: function( e ) {
		          if ( e.which === 13 ) { // Enter
		            if ( !isIE ) { $file.trigger('click'); }
		          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
		            // On some browsers the value is read-only
		            // with this trick we remove the old input and add
		            // a clean clone with all the original events attached
		            $file.replaceWith( $file = $file.clone( true ) );
		            $file.trigger('change');
		            $input.val('');
		          } else if ( e.which === 9 ){ // TAB
		            return;
		          } else { // All other keys
		            return false;
		          }
		        }
		      });

		    });

		  };

		  // Old browser fallback
		  if ( !multipleSupport ) {
		    $( document ).on('change', 'input.customfile', function() {

		      var $this = $(this),
		          // Create a unique ID so we
		          // can attach the label to the input
		          uniqId = 'customfile_'+ (new Date()).getTime(),
		          $wrap = $this.parent(),

		          // Filter empty input
		          $inputs = $wrap.siblings().find('.file-upload-input')
		            .filter(function(){ return !this.value }),

		          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

		      // 1ms timeout so it runs after all other events
		      // that modify the value have triggered
		      setTimeout(function() {
		        // Add a new input
		        if ( $this.val() ) {
		          // Check for empty fields to prevent
		          // creating new inputs when changing files
		          if ( !$inputs.length ) {
		            $wrap.after( $file );
		            $file.customFile();
		          }
		        // Remove and reorganize inputs
		        } else {
		          $inputs.parent().remove();
		          // Move the input so it's always last on the list
		          $wrap.appendTo( $wrap.parent() );
		          $wrap.find('input').focus();
		        }
		      }, 1);

		    });
		  }

}(jQuery));

$('input[type=file]').customFile();
    </script>
 