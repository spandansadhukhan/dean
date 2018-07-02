
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('escort_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My credit transaction</h2>
					</div>
					<div class="email mt-3 p-2">
						<p><i class="fa fa-money mr-3"></i>
							My credit statistics
						   <small><b>Manage all your credits</b></small>
						</p>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<ul class="creditListP pl-0">
								<li>
									<div class="liHeader">Total<br> Purchased</div>
									<div class="liContent">0.00 Credits</div>
								</li>
								<li>
									<div class="liHeader">Total<br> Earned</div>
									<div class="liContent">0.00 Credits</div>
								</li>
								<li>
									<div class="liHeader">Total<br> Reward</div>
									<div class="liContent">0.00 Credits</div>
								</li>
								<li>
									<div class="liHeader">Total<br> Used</div>
									<div class="liContent">0.00 Credits</div>
								</li>
								<li>
									<div class="liHeader">Total<br> Redeemed</div>
									<div class="liContent">0.00 Credits</div>
								</li>
								<li>
									<div class="liHeader">Available<br> Balance</div>
									<div class="liContent">0.00 Credits</div>
								</li>
							</ul>
							
							<ul class="nav nav-tabs mt-4 tabParts">
					  			<li class="active"><a data-toggle="tab" href="#home" class="active">Credit Purchased</a></li>
					  			<li><a data-toggle="tab" href="#menu1" class="">Credits Rewards</a></li>
					  			<li><a data-toggle="tab" href="#menu2" class="">Credits Earned</a></li>
					  			<li><a data-toggle="tab" href="#menu3" class="">Credits Redeem</a></li>
					  			<li><a data-toggle="tab" href="#menu4" class="">Credits Used</a></li>
					  			<li><a data-toggle="tab" href="#menu5" class="">All Transactions</a></li>
							</ul>
							<div class="tab-content">
					  <div id="home" class="tab-pane in active">
                                              <h3><p>You Haven’t Purchased Any Credits Yet.</p></h3>
					  </div>
					  <div id="menu1" class="tab-pane">
					    <table class="table table-hover tableParts">
						    <thead>
						      <tr>
						        <th>Sr. No.</th>
						        <th>Order Id</th>
						        <th>Particulars</th>
						        <th>My Credits Transactions</th>
						        <th>Credits</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
                                                          <td colspan="5">No Credits Earned.</td>
						        
						      </tr>
						      
						    </tbody>
<!--						    <tfoot>
								<tr>
									<th colspan="5"><span>TOTAL:</span>1800.00</th>
								</tr>
							</tfoot>-->
						  </table>
					  </div>
                                                            
                                          <div id="menu2" class="tab-pane">
                                              <h3><p>No Credits Earned.</p></h3>
					  </div>
                                                            
                                          <div id="menu3" class="tab-pane">
                                              <h3><p>No Credits Redeem History Found.</p></h3>
					  </div> 
                                                            
                                          <div id="menu4" class="tab-pane">
                                              <h3><p>No Credits Expended History Found.</p></h3>
					  </div>
                                                 <div id="menu5" class="tab-pane">           
                                                     <div class="z-content-inner">
                                                         <div class="table-responsive for-msg">
                                                             <table class="table table-hover tableParts">
                                                                 <thead>
                                                                     <tr>
                                                                         <th>Sr. No.</th>
                                                                         <th>Coints Purchased</th>
                                                                         <th>Coints Rewards</th>
                                                                         <th>Coints Earned</th>
                                                                         <th>Coints Redeem</th>
                                                                         <th>Coints Expended</th>
                                                                         <th>Date</th>
                                                                         <th>Balance</th>
                                                                     </tr></thead>

                                                                 <tbody>

                                                                     <tr>
                                                                         <td colspan="8"> No Transactions History Found.</td>
                                                                                                       
                                                                     </tr>

                                                                 </tbody>
                                                             </table>
                                                             <section class="no-record" id="noitem"  style="display:none">No Transactions History Found.</section>
                                                         </div>
                                                         
                                                     </div>
                                                            
                                                 </div>              
					</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

