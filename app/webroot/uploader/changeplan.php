<?php
$username = "nits_realestate";
$password = "realestate@123";
$hostname = "localhost"; 
$db = "nits_realestate";
        
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

$selected = mysql_select_db($db,$dbhandle) 
or die("Could not select ".$db);


$data = '';
if(isset($_GET['user_id']) && $_GET['user_id']!=''){
    $selectUser = 'SELECT * FROM users WHERE id = '.$_GET['user_id'];
    $sel = mysql_query($selectUser);
    $getUser = mysql_fetch_array($sel);
    if($getUser){
	$selectPlan = 'SELECT * FROM memberships WHERE id = '.$_GET['membership_id'];
	$sel = mysql_query($selectPlan);
	$getPlan = mysql_fetch_array($sel);
	#print_r($getPlan);
	$start_date = date('Y-m-d H:i:s');
	$end_date = date('Y-m-d H:i:s', strtotime("+".$getPlan['duration']." months", strtotime($start_date)));

	$update_user = 'UPDATE users set membership_id='.$getPlan['id'].', membership_start_date="'.$start_date.'", membership_end_date="'.$end_date.'" WHERE id='.$getUser['id'];
	$sel = mysql_query($update_user);
        $data = 'Success'; 
    } else {
        $data = 'Error';
    }
} else {
    $data = 'Error';
}
echo $data;
exit;
?>
