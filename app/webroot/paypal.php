<?php
define('SITEURL','http://shopsfit.com/');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Redirect to PayPal</title>
<script type="text/javascript">
	function doSubmit() {
		document.frm.submit();
	}
</script>
</head>

<body onload="doSubmit()">
 <div style="float:left;width:100%;margin-top:50px" align="center">
   <div style="float:left;width:100%;" align="center"><img src="img/ajax-loader.gif"/></div>
   <div style="float:left;width:100%;margin-top:20px;font-family: arial;font-size: 14px;color: #8F8D8B;" align="center"><b>Please wait! Redirect to PayPal...</b></div>
 </div>
<form name="frm" action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
<!-- <form name="frm" action="https://www.sandbox.paypal.com/us/cgi-bin/webscr" method="post"> -->
	<input type="hidden" name="cmd" value="_xclick"/>
	<input type="hidden" name="business" value="<?php echo($_GET['business'])?>"/>
	<input type="hidden" name="item_name" value="Featured Shop"/>
	<input type="hidden" name="return" value="<?php echo(SITEURL);?>shops/featured/<?php echo($_GET['shopname'])?>"/>
	<input type="hidden" name="cancel_return" value="<?php echo(SITEURL);?>/shops/preview/<?php echo($_GET['shopname'])?>"/>
	<input type="hidden" name="amount" value="<?php echo($_GET['amount'])?>"/>
	<input type="hidden" name="currency_code" value="USD"/>
	<input type="hidden" name="rm" value="2"/>
	<input type="hidden" name="no_note" value="1" />
	<input type="hidden" name="src" value="1"/>
	<input type="hidden" name="sra" value="1"/>	
</form>
</body>
</html>