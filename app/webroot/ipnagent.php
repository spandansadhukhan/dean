<?php
error_reporting(0);
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'avik_escort');
define('DB_PASSWORD', 'Host!@#$%^');
define('DB_DATABASE', 'admin_escort');
define('SITE_URL', '"http://thedirectory.nz/newver/');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value)
{
  $value = urlencode(stripslashes($value));
  $req .= "&$key=$value";
}

// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);

if (!$fp)
 {
    // HTTP ERROR
 }
else
 {
    fputs ($fp, $header . $req);
    $res = fgets ($fp, 1024);
    if($_POST['payment_status']=="Completed" and !empty($_REQUEST['txn_id']))
    {
     $adid = $_REQUEST['custom'];
    mysql_query("update agentsubscribers set  is_paid=1,txn_id='".$_REQUEST['txn_id']."' where id='".$adid."'");
    $to = "nits.karunadri@gmail.com";
    $subject = "IPN";
    $txt = "update agentsubscribers set  is_paid=1,txn_id='".$_REQUEST['txn_id']."' where id='".$adid."'";
    $headers = "From: webmaster@example.com" . "\r\n" .
    mail($to,$subject,$txt,$headers);        
            
            
            
               
    }
        else
    {
       // send an email
       //mail("paypal@gatwickmeetandgreet.net", "VERIFIED DUPLICATED TRANSACTION", "Transaction Failed");
    } 
 }
 if (strcmp($res, "INVALID") == 0)
 {
    // log for manual investigation
    //mail("paypal@gatwickmeetandgreet.net", "INVALID IPN", "Transaction Failed");
 }
fclose ($fp);
?>
