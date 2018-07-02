<link href="<?php echo $this->webroot ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
<section class="cart-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 small_width">
                <h3 class="title" style="margin: 10px 0;">Cart Page</h3>
                <div class="table-responsive">
                    <table class="table table-striped cart-table">
                        <thead style="color:white;">
                            <tr style="background: #404040;">
                                <th class="action">Action</th>
                                <th>Product</th>
                                <th>Product Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
		                    	<?php 
                                             $total = 0;
                                             $totalshipping = 0;
                                             if(!empty($cartitems))
                                             {
                                             foreach($cartitems as $cartitem) { 
                                               
                                             $price = number_format(($cartitem['Cart']['price']),2);  
                                                 
                                               ?>
                            <tr style="background: #f5f5f5;">
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="cancel" onClick="del('<?php echo $cartitem['Cart']['id']; ?>');"><i class="fa fa-close"></i></a>
                                    <a href="javascript:void(0);" class="edit" onClick="javascipt: return edit('<?php echo $cartitem['Cart']['id']; ?>');"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <div class="itemimg">
                                        <img src="<?php echo $this->webroot ?>product_img/<?php echo $cartitem['Product']['Gettwoimage']['0']['image'] ?>" alt="" style="width:100px;">
                                    </div>
                                </td>
                                <td>
                                    <div class="itemdes">
                                        <h4><?php echo $cartitem['Product']['name'] ?></h4>
                                        <p><?php echo substr($cartitem['Product']['description'],0,100) ?></p>
                                    </div>
                                </td>
                                <td><p class="text-center"><?php echo '$'.$price; ?></p></td>
                                <td>
                                    <form action="<?php echo $this->webroot ?>pages/edit_cart" method="POST">
                                        <input type="hidden" name="data[Cart][id]" value="<?php echo $cartitem['Cart']['id']; ?>">
                                        <input type="hidden" value="update" name="req" />
                                        <div id="show<?php echo $cartitem['Cart']['id']; ?>" style="display:block;">
                                            <div class="form-group">
                                                <p class="text-center"><?php echo $cartitem['Cart']['quan'] ?></p>
                                                <p>
                                                    <input type="image" alt="Update" src="<?php echo $this->webroot ?>img/SaveButton.gif" id="update<?php echo $cartitem['Cart']['id']; ?>" style="display:none;"/>
                                                </p>
                                            </div>
                                        </div>
                                        <div id="hide<?php echo $cartitem['Cart']['id']; ?>" class="hidecls" style="display:none;" >
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputName2" maxlength="4" name="data[Cart][quan]" value="<?php echo $cartitem['Cart']['quan'] ?>" size="1">
                                                <p>
                                                    <input type="image" style="display: block;" id="update<?php echo $cartitem['Cart']['id']; ?>" src="<?php echo $this->webroot ?>img/SaveButton.gif" alt="Update">
                                                </p>

                                            </div>
                                        </div></form></td>

                                        <?php $subTotal = $cartitem['Cart']['quan'] * $cartitem['Cart']['price'] ?>

                                <td><p class="text-center"><?php echo '$'.$subTotal; ?></p></td>
                            </tr>

                                            <?php
                                            $total = $total + $subTotal;
                                             } }
                                             else {
                                                 ?>
                            <tr><td colspan="6">Your Cart Is Empty.</td></tr>
                                            <?php
                                             }?>

                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <p>Order Subtotal </p>
                                    <p><b>Total</b></p>
                                    <button type="button" class="btn btn-warning" onclick="location.href = '<?php echo $this->webroot ?>users/'">Keep Shopping</button>
                                </td>
                                <?php 
                                    $totalprice = $total;
                                ?>

                                <td>
                                    <p><?php echo '$'.$total; ?></p>


                                    <?php 
                                        $totalprice = $totalprice;
                                     ?>

                                    <p><b><?php echo '$'.$totalprice; ?></b></p>
			                            <?php if($this->Session->read('fuid')!='') {
                                                        if(!empty($cartitems))
                                                        {
                                                        ?>
                                    <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo Router::url(array('controller' => 'pages', 'action' => 'shop_physical_item_buy')); ?>'">Proceed to Checkout</button>
                                                    <?php } } ?>

                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
//echo $maindate = date("Y/m/d")." 08:00:00";
?>



<!-- Bootstrap core JavaScript --> 
<!-- Placed at the end of the document so the pages load faster -->


<script>
    $(document).ready(function () {
        $('.bx_slider').bxSlider({
            slideWidth: 160,
            minSlides: 1,
            maxSlides: 6,
            slideMargin: 10,
            pager: false
        });
    });
</script>
<!--<script defer src="js/jquery.flexslider.js"></script> 
<script type="text/javascript">
        $(function(){
          SyntaxHighlighter.all();
        });
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 187,
            itemMargin: 4,
            pausePlay: false,
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
</script>-->
<!--<script>
$('#myModal').modal('show');
</script>-->


<script language="javascript">
    function edit(id)
    {


        document.getElementById('show' + id).style.display = "none";
        //document.getElementByClassName('hidecls').style.display = "none";
        document.getElementById('hide' + id).style.display = "block";
        //document.getElementById('update' + id).style.display = "block";


    }
    function del(aa)
    {
        var a = confirm("Are you sure, you want to delete this?")
        if (a)
        {
            window.location.href = "<?php echo($this->webroot)?>pages/delete_cart/" + aa;
        }
    }
</script>

<style>
    .custom_class{ font-size:1.5em; color:green;margin-left: 500px;}
    .small_width {width: 95%;}
    th {text-align: center;}
</style>
