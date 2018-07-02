<?php
//pr($Privileges);exit;
//echo $Privileges['Privilege']['id'];exit;
?>

<div class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
      <header class="panel-heading"> Edit Sub Admin </header>
      <div class="panel-body">
        <div class="form"> 
		<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data', 
		'class'=>'cmxform form-horizontal adminex-form','id'=>'signupForm')); echo $this->Form->input('id'); ?>
          <div class="form-group ">
            <label for="name" class="control-label col-lg-2">Admin Username <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('username',array('label'=>false,'required'=>'required', 
			'class'=>'form-control','placeholder'=>'Admin Username')); ?> </div>
          </div>
          <?php echo $this->Form->input('hidpw',array('type'=>'hidden','value'=>$this->request->data['User']['txt_password'])); ?>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Admin Password <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('password',array('label'=>false,'class'=>'form-control','type'=>'password', 
			'placeholder'=>'Admin Password')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="username" class="control-label col-lg-2">Admin Email <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('email',array('label'=>false,'class'=>'form-control', 
			'placeholder'=>'Admin Email')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="password" class="control-label col-lg-2">Display Name <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('name',array('label'=>false,'required'=>'required', 
			'class'=>'form-control', 'placeholder'=>'Display Name')); ?> </div>
          </div>
          <div class="form-group ">
            <label for="password1" class="control-label col-lg-2">Department <span style="color:red;">*</span></label>
            <div class="col-lg-10"> 
			<?php echo $this->Form->input('department',array('label'=>false,'required'=>'required', 
			'class'=>'form-control','placeholder'=>'Department')); ?> </div>
          </div>
          <?php echo $this->Form->input('hid_profile_image',array('type'=>'hidden', 
		  'value'=>$this->request->data['User']['profile_image'])); ?>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Sub-Admin Icon Image <span style="color:red;">*</span></label>
            <div class="col-lg-10">
              <?php
				$uploadFolder = "user_images";
				$uploadPath = WWW_ROOT . $uploadFolder;
				$imageName = $this->request->data['User']['profile_image'];
				if(file_exists($uploadPath . '/' . $imageName) && $imageName!=''){
				echo($this->Html->image('/user_images/'.$imageName, array('alt' => 'Profile image', 'height' => '100', 
				'width' => '100')));
				}
			 ?>
              <!--<img id="preview" style=" height:150px; width:200px;" alt="" src="#">-->
            </div>
          </div>
          <div class="form-group ">
            <label for="password1" class="control-label col-lg-2"></label>
            <div class="col-md-1"> <span class="btn btn-alt btn-primary btn-file" style=" overflow:hidden"> 
            <span class="fileupload-new"> <i class="fa fa-paper-clip"></i> Select image </span> 
            <span class="fileupload-exists"> </span>
              <input type="file" name="data[User][profile_image]" class="default" onchange="readURL(this)">
              </span> </div>
          </div>
          <div class="form-group ">
            <label for="email" class="control-label col-lg-2">Assign Privileges <span style="color:red;">*</span></label>
            <div class="col-lg-10">
              <ul style=" list-style-type:none;">
                <li><strong>Contents=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_staticpage]" 
                      <?php if(isset($Privileges['Privilege']['is_staticpage']) && 
                      $Privileges['Privilege']['is_staticpage']==1) {?>checked<?php } ?>>
                      All Escorts</li>
                    <li>
                      <input type="checkbox" value="1"	 name="data[Privilege][is_emailtemplate]" 
                      <?php if(isset($Privileges['Privilege']['is_emailtemplate']) && 
                      $Privileges['Privilege']['is_emailtemplate']==1) {?>checked<?php } ?>>
                      Email Templates</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_headermenu]" 
                      <?php if(isset($Privileges['Privilege']['is_headermenu']) && 
                      $Privileges['Privilege']['is_headermenu']==1) {?>checked<?php } ?>>
                      Header Menu</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_footermenu]" 
                      <?php if(isset($Privileges['Privilege']['is_footermenu']) && 
                      $Privileges['Privilege']['is_footermenu']==1) {?>checked<?php } ?>>
                      Footer Menu</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_contentsection]" 
                      <?php if(isset($Privileges['Privilege']['is_contentsection']) && 
                      $Privileges['Privilege']['is_contentsection']==1) {?>checked<?php } ?>>
                      Content Sections</li>
                  </ul>
                </li>
                <li><strong>Escorts=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allescort]" 
                      <?php if(isset($Privileges['Privilege']['is_allescort']) && 
                      $Privileges['Privilege']['is_allescort']==1) {?>checked<?php } ?>>
                      All Escorts</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_pendingapproval]" 
                      <?php if(isset($Privileges['Privilege']['is_pendingapproval']) && 
                      $Privileges['Privilege']['is_pendingapproval']==1) {?>checked<?php } ?>>
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escorttour]" 
                      <?php if(isset($Privileges['Privilege']['is_escorttour']) && 
                      $Privileges['Privilege']['is_escorttour']==1) {?>checked<?php } ?>>
                      Escort On Tour</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addescort]" 
                      <?php if(isset($Privileges['Privilege']['is_addescort']) && 
                      $Privileges['Privilege']['is_addescort']==1) {?>checked<?php } ?>>
                      Add New Escort</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_accountclose]" 
                      <?php if(isset($Privileges['Privilege']['is_accountclose']) && 
                      $Privileges['Privilege']['is_accountclose']==1) {?>checked<?php } ?>>
                      Account Closed By Member</li>
                  </ul>
                </li>
                <li><strong>Agencies=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allagency]" 
                      <?php if(isset($Privileges['Privilege']['is_allagency']) && 
                      $Privileges['Privilege']['is_allagency']==1) {?>checked<?php } ?>>
                      All Agencies</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_agencypendingapproval]" 
                      <?php if(isset($Privileges['Privilege']['is_agencypendingapproval']) && 
                      $Privileges['Privilege']['is_agencypendingapproval']==1) {?>checked<?php } ?>>
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addagency]" 
                      <?php if(isset($Privileges['Privilege']['is_addagency']) && 
                      $Privileges['Privilege']['is_addagency']==1) {?>checked<?php } ?>>
                      Add New Agency</li>
                  </ul>
                </li>
                <li><strong>Clubs=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allclub]" 
                      <?php if(isset($Privileges['Privilege']['is_allclub']) && 
                      $Privileges['Privilege']['is_allclub']==1) {?>checked<?php } ?>>
                      All Clubs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubmodel]" 
                      <?php if(isset($Privileges['Privilege']['is_clubmodel']) && 
                      $Privileges['Privilege']['is_clubmodel']==1) {?>checked<?php } ?>>
                      Club Models</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubtype]" 
                      <?php if(isset($Privileges['Privilege']['is_clubtype']) && 
                      $Privileges['Privilege']['is_clubtype']==1) {?>checked<?php } ?>>
                      Club Types</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_clubpendingapprove]" 
                      <?php if(isset($Privileges['Privilege']['is_clubpendingapprove']) && 
                      $Privileges['Privilege']['is_clubpendingapprove']==1) {?>checked<?php } ?>>
                      Pending Approvals</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addclub]" 
                      <?php if(isset($Privileges['Privilege']['is_addclub']) && 
                      $Privileges['Privilege']['is_addclub']==1) {?>checked<?php } ?>>
                      Add New Club</li>
                  </ul>
                </li>
                <li><strong>Massage Parlours=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allparlours]" 
                      <?php if(isset($Privileges['Privilege']['is_allparlours']) && 
                      $Privileges['Privilege']['is_allparlours']==1) {?>checked<?php } ?>>
                      All Massage Parlours</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_addparlours]" 
                      <?php if(isset($Privileges['Privilege']['is_addparlours']) && 
                      $Privileges['Privilege']['is_addparlours']==1) {?>checked<?php } ?>>
                      Add Massage Parlours</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allgirls]" 
                      <?php if(isset($Privileges['Privilege']['is_allgirls']) && 
                      $Privileges['Privilege']['is_allgirls']==1) {?>checked<?php } ?>>
                      All Girls</li>
                  </ul>
                </li>
                <li><strong>Users=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alluser]" 
                      <?php if(isset($Privileges['Privilege']['is_alluser']) && 
                      $Privileges['Privilege']['is_alluser']==1) {?>checked<?php } ?>>
                      All Users</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_adduser]" 
                      <?php if(isset($Privileges['Privilege']['is_adduser']) && 
                      $Privileges['Privilege']['is_adduser']==1) {?>checked<?php } ?>>
                      Add New User</li>
                  </ul>
                </li>
                <li><strong>Attributes=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortattribute]" 
                      <?php if(isset($Privileges['Privilege']['is_escortattribute']) && 
                      $Privileges['Privilege']['is_escortattribute']==1) {?>checked<?php } ?>>
                      Escorts Attributes</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_commonphysical]" 
                      <?php if(isset($Privileges['Privilege']['is_commonphysical']) && 
                      $Privileges['Privilege']['is_commonphysical']==1) {?>checked<?php } ?>>
                      Common Physical Attributes</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_parlourattribute]" 
                      <?php if(isset($Privileges['Privilege']['is_parlourattribute']) && 
                      $Privileges['Privilege']['is_parlourattribute']==1) {?>checked<?php } ?>>
                      Parlour Attributes</li>
                  </ul>
                </li>
                <li><strong>Locations=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_country]" 
                      <?php if(isset($Privileges['Privilege']['is_country']) && 
                      $Privileges['Privilege']['is_country']==1) {?>checked<?php } ?>>
                      Countries</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_state]" 
                      <?php if(isset($Privileges['Privilege']['is_state']) && 
                      $Privileges['Privilege']['is_state']==1) {?>checked<?php } ?>>
                      States/Province</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_city]" 
                      <?php if(isset($Privileges['Privilege']['is_city']) && 
                      $Privileges['Privilege']['is_city']==1) {?>checked<?php } ?>>
                      Cities</li>
                  </ul>
                </li>
                <li><strong>Blogs=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allblog]" 
                      <?php if(isset($Privileges['Privilege']['is_allblog']) && 
                      $Privileges['Privilege']['is_allblog']==1) {?>checked<?php } ?>>
                      All Blogs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blogcategory]" 
                      <?php if(isset($Privileges['Privilege']['is_blogcategory']) && 
                      $Privileges['Privilege']['is_blogcategory']==1) {?>checked<?php } ?>>
                      Blog Categories</li>
                  </ul>
                </li>
                <li><strong>Communications=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_enquery]" 
                      <?php if(isset($Privileges['Privilege']['is_enquery']) && 
                      $Privileges['Privilege']['is_enquery']==1) {?>checked<?php } ?>>
                      Site Inquires</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_fakereport]" 
                      <?php if(isset($Privileges['Privilege']['is_fakereport']) && 
                      $Privileges['Privilege']['is_fakereport']==1) {?>checked<?php } ?>>
                      Fake Reports</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_verification]" 
                      <?php if(isset($Privileges['Privilege']['is_verification']) && 
                      $Privileges['Privilege']['is_verification']==1) {?>checked<?php } ?>>
                      Verification Requests</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_usercommunication]" 
                      <?php if(isset($Privileges['Privilege']['is_usercommunication']) && 
                      $Privileges['Privilege']['is_usercommunication']==1) {?>checked<?php } ?>>
                      Users Communications</li>
                  </ul>
                </li>
                <li><strong>Advertisement=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allbannerad]" 
                      <?php if(isset($Privileges['Privilege']['is_allbannerad']) && 
                      $Privileges['Privilege']['is_allbannerad']==1) {?>checked<?php } ?>>
                      All Banner Advertisements</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_purchased]" 
                      <?php if(isset($Privileges['Privilege']['is_purchased']) && 
                      $Privileges['Privilege']['is_purchased']==1) {?>checked<?php } ?>>
                      Purchased Advertisements</li>
                  </ul>
                </li>
                <li><strong>Memberships=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allmemberplan]" 
                      <?php if(isset($Privileges['Privilege']['is_allmemberplan']) && 
                      $Privileges['Privilege']['is_allmemberplan']==1) {?>checked<?php } ?>>
                      All Membership Plans</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_countrywiseplan]" 
                      <?php if(isset($Privileges['Privilege']['is_countrywiseplan']) && 
                      $Privileges['Privilege']['is_countrywiseplan']==1) {?>checked<?php } ?>>
                      Country Specific Plan</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_perchasedmembership]" 
                      <?php if(isset($Privileges['Privilege']['is_perchasedmembership']) && 
                      $Privileges['Privilege']['is_perchasedmembership']==1) {?>checked<?php } ?>>
                      Purchased Memberships</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_freememberships]" 
                      <?php if(isset($Privileges['Privilege']['is_freememberships']) && 
                      $Privileges['Privilege']['is_freememberships']==1) {?>checked<?php } ?>>
                      All Free Membership Plans</li>
                  </ul>
                </li>
                <li><strong>Securities=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_banip]" 
                      <?php if(isset($Privileges['Privilege']['is_banip']) && 
                      $Privileges['Privilege']['is_banip']==1) {?>checked<?php } ?>>
                      Ban Ip</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_weblog]" 
                      <?php if(isset($Privileges['Privilege']['is_weblog']) && 
                      $Privileges['Privilege']['is_weblog']==1) {?>checked<?php } ?>>
                      Web logs</li>
                  </ul>
                </li>
                <li><strong>Credits=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditpackage]" 
                      <?php if(isset($Privileges['Privilege']['is_creditpackage']) && 
                      $Privileges['Privilege']['is_creditpackage']==1) {?>checked<?php } ?>>
                      Credit Packages</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditpurchased]" 
                      <?php if(isset($Privileges['Privilege']['is_creditpurchased']) && 
                      $Privileges['Privilege']['is_creditpurchased']==1) {?>checked<?php } ?>>
                      Credit Purchased</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditredeem]" 
                      <?php if(isset($Privileges['Privilege']['is_creditredeem']) && 
                      $Privileges['Privilege']['is_creditredeem']==1) {?>checked<?php } ?>>
                      Credit Redeem Request</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_creditsetting]" 
                      <?php if(isset($Privileges['Privilege']['is_creditsetting']) && 
                      $Privileges['Privilege']['is_creditsetting']==1) {?>checked<?php } ?>>
                      Credit Settings</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_freecreditassign]" 
                      <?php if(isset($Privileges['Privilege']['is_freecreditassign']) && 
                      $Privileges['Privilege']['is_freecreditassign']==1) {?>checked<?php } ?>>
                      Free Credits Assign</li>
                  </ul>
                </li>
                <li><strong>News Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allnews]" 
                      <?php if(isset($Privileges['Privilege']['is_allnews']) && 
                      $Privileges['Privilege']['is_allnews']==1) {?>checked<?php } ?>>
                      All News</li>
                  </ul>
                </li>
                <li><strong>Blacklist=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blacklist]" 
                      <?php if(isset($Privileges['Privilege']['is_blacklist']) && 
                      $Privileges['Privilege']['is_blacklist']==1) {?>checked<?php } ?>>
                      Blacklist Customers</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_blacklistescort]" 
                      <?php if(isset($Privileges['Privilege']['is_blacklistescort']) && 
                      $Privileges['Privilege']['is_blacklistescort']==1) {?>checked<?php } ?>>
                      Blacklist Escorts</li>
                  </ul>
                </li>
                <li><strong>Advertiser Activities=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortreview]" 
                      <?php if(isset($Privileges['Privilege']['is_escortreview']) && 
                      $Privileges['Privilege']['is_escortreview']==1) {?>checked<?php } ?>>
                      Escort Reviews</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_profilecomment]" 
                      <?php if(isset($Privileges['Privilege']['is_profilecomment']) && 
                      $Privileges['Privilege']['is_profilecomment']==1) {?>checked<?php } ?>>
                      Profile Comments</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortstatus]" 
                      <?php if(isset($Privileges['Privilege']['is_escortstatus']) && 
                      $Privileges['Privilege']['is_escortstatus']==1) {?>checked<?php } ?>>
                      Escort Status</li>
                  </ul>
                </li>
                <li><strong>Transactions=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alltransaction]" 
                      <?php if($Privileges['Privilege']['is_alltransaction']==1) {?>checked<?php } ?>>
                      All Transactions</li>
                  </ul>
                </li>
                <li><strong>Shop Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_shopcategory]" 
                      <?php if($Privileges['Privilege']['is_shopcategory']==1) {?>checked<?php } ?>>
                      Shop Item Categories</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_privatevideocategory]" 
                      <?php if($Privileges['Privilege']['is_privatevideocategory']==1) {?>checked<?php } ?>>
                      Private Video Category</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortsellitem]" 
                      <?php if($Privileges['Privilege']['is_escortsellitem']==1) {?>checked<?php } ?>>
                      Escort Selling Items</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_soldtransaction]" 
                      <?php if($Privileges['Privilege']['is_soldtransaction']==1) {?>checked<?php } ?>>
                      Sold Item Transactions</li>
                  </ul>
                </li>
                <li><strong>Website=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_websitetpl]" 
                      <?php if($Privileges['Privilege']['is_websitetpl']==1) {?>checked<?php } ?>>
                      Website Templates</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_escortwebmanager]" 
                      <?php if($Privileges['Privilege']['is_escortwebmanager']==1) {?>checked<?php } ?>>
                      Escort Website Manager</li>
                  </ul>
                </li>
                <li><strong>Classified Ads=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_classifiedcat]" 
                      <?php if($Privileges['Privilege']['is_classifiedcat']==1) {?>checked<?php } ?>>
                      Classified Category</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_classifiedadmanager]" 
                      <?php if($Privileges['Privilege']['is_classifiedadmanager']==1) {?>checked<?php } ?>>
                      Classified Ad Manager</li>
                  </ul>
                </li>
                <li><strong>Email Templates=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_emailtpladmin]" 
                      <?php if($Privileges['Privilege']['is_emailtpladmin']==1) {?>checked<?php } ?>>
                      Email Tempates For Admin</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_emailtpluser]" 
                      <?php if($Privileges['Privilege']['is_emailtpluser']==1) {?>checked<?php } ?>>
                      Email Templates for Site Users</li>
                  </ul>
                </li>
                <li><strong>Adult Job=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alladultjob]" 
                      <?php if($Privileges['Privilege']['is_alladultjob']==1) {?>checked<?php } ?>>
                      All Adult Job</li>
                  </ul>
                </li>
                <li><strong>Newsletter Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allnewsletter]" 
                      <?php if($Privileges['Privilege']['is_allnewsletter']==1) {?>checked<?php } ?>>
                      All Newsletters</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allsubscribers]" 
                      <?php if($Privileges['Privilege']['is_allsubscribers']==1) {?>checked<?php } ?>>
                      All Newsletter Subscribers</li>
                  </ul>
                </li>
                <li><strong>Event Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_eventmanager]" 
                      <?php if($Privileges['Privilege']['is_eventmanager']==1) {?>checked<?php } ?>>
                      Event Manager</li>
                  </ul>
                </li>
                <li><strong>Avatar Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allavtar]" 
                      <?php if($Privileges['Privilege']['is_allavtar']==1) {?>checked<?php } ?>>
                      All Avatars</li>
                  </ul>
                </li>
                <li><strong>Meta Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allmeta]" 
                      <?php if($Privileges['Privilege']['is_allmeta']==1) {?>checked<?php } ?>>
                      All Meta Tag</li>
                  </ul>
                </li>
                <li><strong>FAQ=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allfaq]" 
                      <?php if($Privileges['Privilege']['is_allfaq']==1) {?>checked<?php } ?>>
                      All FAQs</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allfaqcategory]" 
                      <?php if($Privileges['Privilege']['is_allfaqcategory']==1) {?>checked<?php } ?>>
                      FAQ Categories</li>
                  </ul>
                </li>
                <li><strong>Ad-on Services=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_allad_on]" 
                      <?php if($Privileges['Privilege']['is_allad_on']==1) {?>checked<?php } ?>>
                      All Ad-on Services</li>
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_purchased_ad_on]" 
                      <?php if($Privileges['Privilege']['is_purchased_ad_on']==1) {?>checked<?php } ?>>
                      Purchased Ad-on</li>
                  </ul>
                </li>
                <li><strong>Trash Manager=></strong>
                  <ul style=" list-style-type:none;">
                    <li>
                      <input type="checkbox" value="1" name="data[Privilege][is_alltrashmember]" 
                      <?php if($Privileges['Privilege']['is_alltrashmember']==1) {?>checked<?php } ?>>
                      All Trash Members</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
          <?php echo $this->Form->end(); ?>
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
