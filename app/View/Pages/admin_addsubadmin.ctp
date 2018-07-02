<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
      <header class="panel-heading"> Add Sub Admin </header>
      <div class="panel-body">
        <div class="form"> 
		<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data', 
		'class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm')); ?>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">Admin Username <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('username',array('label'=>false,'required'=>'required', 
			'class'=>'form-control','placeholder'=>'Admin Username')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Admin Password <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('password',array('label'=>false,'required'=>'required','class'=>'form-control', 
			'type'=>'password','placeholder'=>'Admin Password')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="username" class="control-label col-lg-2">Admin Email <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('email',array('label'=>false,'class'=>'form-control','placeholder'=>'Admin Email')); ?> 
            </div>
          </div>
          <div class="form-group ">
            <label for="password" class="control-label col-lg-2">Display Name <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required','class'=>'form-control', 
			'placeholder'=>'Display Name')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="password1" class="control-label col-lg-2">Department <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('department',array('label'=>false,'required'=>'required','class'=>'form-control',
			'placeholder'=>'Department')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Sub-Admin Icon Image <span style="color:red;">*</span></label>
            <div class="col-lg-10"> <img id="preview" style=" height:150px; width:200px;" alt="" src="#"> </div>
          </div>
          <div class="form-group ">
            <label for="password1" class="control-label col-lg-2"></label>
            <div class="col-md-1"> <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden"> 
            <span class="fileupload-new"> <i class="fa fa-paper-clip"></i> Select image </span> 
            <span class="fileupload-exists"> </span>
              <input type="file" name="data[User][profile_image]" class="default" onChange="readURL(this)">
              </span> </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Assign Privileges <span style="color:red;">*</span></label>
            <div class="col-lg-10">
              <ul style=" list-style-type:none;">
                <li><strong>Contents=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_staticpage]" >
                      All Escorts</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_emailtemplate]">
                      Email Templates</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_headermenu]">
                      Header Menu</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_footermenu]" >
                      Footer Menu</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_contentsection]">
                      Content Sections</li>
                  </ul>
                </li>
                <li><strong>Escorts=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allescort]" >
                      All Escorts</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_pendingapproval]">
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escorttour]">
                      Escort On Tour</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addescort]" >
                      Add New Escort</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_accountclose]">
                      Account Closed By Member</li>
                  </ul>
                </li>
                <li><strong>Agencies=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allagency]" >
                      All Agencies</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_agencypendingapproval]">
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addagency]">
                      Add New Agency</li>
                  </ul>
                </li>
                <li><strong>Clubs=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allclub]" >
                      All Clubs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubmodel]">
                      Club Models</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubtype]">
                      Club Types</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubpendingapprove]" >
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addclub]">
                      Add New Club</li>
                  </ul>
                </li>
                <li><strong>Massage Parlours=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allparlours]" >
                      All Massage Parlours</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addparlours]">
                      Add Massage Parlours</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allgirls]">
                      All Girls</li>
                  </ul>
                </li>
                <li><strong>Users=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alluser]" >
                      All Users</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_adduser]">
                      Add New User</li>
                  </ul>
                </li>
                <li><strong>Attributes=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortattribute]" >
                      Escorts Attributes</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_commonphysical]">
                      Common Physical Attributes</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_parlourattribute]">
                      Parlour Attributes</li>
                  </ul>
                </li>
                <li><strong>Locations=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_country]" >
                      Countries</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_state]">
                      States/Province</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_city]">
                      Cities</li>
                  </ul>
                </li>
                <li><strong>Blogs=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allblog]" >
                      All Blogs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blogcategory]">
                      Blog Categories</li>
                  </ul>
                </li>
                <li><strong>Communications=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_enquery]" >
                      Site Inquires</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_fakereport]">
                      Fake Reports</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_verification]">
                      Verification Requests</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_usercommunication]" >
                      Users Communications</li>
                  </ul>
                </li>
                <li><strong>Advertisement=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allbannerad]" >
                      All Banner Advertisements</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_purchased]">
                      Purchased Advertisements</li>
                  </ul>
                </li>
                <li><strong>Memberships=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allmemberplan]" >
                      All Membership Plans</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_countrywiseplan]">
                      Country Specific Plan</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_perchasedmembership]">
                      Purchased Memberships</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_freememberships]" >
                      All Free Membership Plans</li>
                  </ul>
                </li>
                <li><strong>Securities=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_banip]" >
                      Ban Ip</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_weblog]">
                      Web logs</li>
                  </ul>
                </li>
                <li><strong>Credits=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditpackage]" >
                      Credit Packages</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditpurchased]">
                      Credit Purchased</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditredeem]">
                      Credit Redeem Request</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditsetting]" >
                      Credit Settings</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_freecreditassign]">
                      Free Credits Assign</li>
                  </ul>
                </li>
                <li><strong>News Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allnews]" >
                      All News</li>
                  </ul>
                </li>
                <li><strong>Blacklist=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blacklist]" >
                      Blacklist Customers</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blacklistescort]">
                      Blacklist Escorts</li>
                  </ul>
                </li>
                <li><strong>Advertiser Activities=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortreview]" >
                      Escort Reviews</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_profilecomment]">
                      Profile Comments</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortstatus]">
                      Escort Status</li>
                  </ul>
                </li>
                <li><strong>Transactions=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alltransaction]" >
                      All Transactions</li>
                  </ul>
                </li>
                <li><strong>Shop Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_shopcategory]" >
                      Shop Item Categories</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_privatevideocategory]">
                      Private Video Category</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortsellitem]">
                      Escort Selling Items</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_soldtransaction]" >
                      Sold Item Transactions</li>
                  </ul>
                </li>
                <li><strong>Website=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_websitetpl]" >
                      Website Templates</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortwebmanager]">
                      Escort Website Manager</li>
                  </ul>
                </li>
                <li><strong>Classified Ads=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_classifiedcat]" >
                      Classified Category</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_classifiedadmanager]">
                      Classified Ad Manager</li>
                  </ul>
                </li>
                <li><strong>Email Templates=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_emailtpladmin]" >
                      Email Tempates For Admin</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_emailtpluser]">
                      Email Templates for Site Users</li>
                  </ul>
                </li>
                <li><strong>Adult Job=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alladultjob]" >
                      All Adult Job</li>
                  </ul>
                </li>
                <li><strong>Newsletter Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allnewsletter]" >
                      All Newsletters</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allsubscribers]">
                      All Newsletter Subscribers</li>
                  </ul>
                </li>
                <li><strong>Event Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_eventmanager]" >
                      Event Manager</li>
                  </ul>
                </li>
                <li><strong>Avatar Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allavtar]" >
                      All Avatars</li>
                  </ul>
                </li>
                <li><strong>Meta Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allmeta]" >
                      All Meta Tag</li>
                  </ul>
                </li>
                <li><strong>FAQ=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allfaq]" >
                      All FAQs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allfaqcategory]">
                      FAQ Categories</li>
                  </ul>
                </li>
                <li><strong>Ad-on Services=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allad_on]" >
                      All Ad-on Services</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_purchased_ad_on]">
                      Purchased Ad-on</li>
                  </ul>
                </li>
                <li><strong>Trash Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alltrashmember]" >
                      All Trash Members</li>
                  </ul>
                </li>
              </ul>
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
  </section>
</div>
</div>
</div>
<!--body wrapper end-->
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