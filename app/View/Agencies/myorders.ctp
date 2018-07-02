
	<section class="dashBoard mt-4">
		<div class="container">
			<div class="row">
				<?php echo $this->element('agent_sidebar'); ?>
				<div class="col-lg-9">
					<div class="acntSetting p-1">
						<h2 class="font-weight-normal">My Orders</h2>
					</div>
					<ul class="nav nav-tabs mt-4 tabParts">
					  <li class="active"><a data-toggle="tab" href="#home">Advertise Order</a></li>
					  <li ><a data-toggle="tab" href="#menu1">Membership Order</a></li>
					  <li ><a data-toggle="tab" href="#menu2">Credits Purchased</a></li>
					  <li ><a data-toggle="tab" href="#menu3">Add On Services Order</a></li>
					</ul>
					<div class="tab-content">
					  <div id="home" class="tab-pane in active">
					  	  <table class="table table-hover">
                                                      
						    <table class="table table-hover">
                            <thead>
                            <th style="width: 50px;">Id</th>
                            <th>Image</th>
                            <th>Order Date</th>
                            <th>Country</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Option</th>
                            </thead>
                                <tbody>
									                     
                                
                                   </tbody>
                                     <tr ><td class="no-record" colspan="7">No Record Found</td></tr>                            </table>
					  </div>
					  <div id="menu1" class="tab-pane ">
                                              <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Order</th>
                                                        <th>Package</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                        <th>Price</th>
                                                        <th>Payment</th>
						      </tr>
						    </thead>
						    <tbody>
                                                                                                                                                        <tr>
                                                    <td>311 .</td>
                                                                                                                                                          <td>
                                                            Plan Id :- 5<br>
                                                             Plan Name : -Basic Agency Plan<br>
                                                             Plan Validity :- 1 Month											</td>
                                                    <td>direct</td>
                                                    <td>14-Oct-2016</td>
                                                    <td>315.00 EUR</td>
                                                                                                                                                    <td><a class="buttonMissing"> Pending</a></td>

                                                    </tr>
                                                    </tbody>
						  </table>
					  </div>
                                            
                                            
                                            <div id="menu2" class="tab-pane ">
                                              <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Order</th>
                                                        <th>Package</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                        <th>Price</th>
                                                        <th>Payment</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr ><td class="no-record" colspan="7">No Record Found</td></tr>
						      
						    </tbody>
						  </table>
					  </div>
                                            <div id="menu3" class="tab-pane ">
                                              <table class="table table-hover">
						    <thead>
						      <tr>
						        <th>Order</th>
                                                        <th>Package</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                        <th>Price</th>
                                                        <th>Payment</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr ><td class="no-record" colspan="7">No Record Found</td></tr>
						      
						    </tbody>
						  </table>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <script>
    	$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {    
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {    
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})
    </script>
  