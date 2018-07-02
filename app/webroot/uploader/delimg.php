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
$upload_dir = '../property_photos/';
if(isset($_GET['id']) && $_GET['id']!=''){
    $selectPhoto = 'SELECT * FROM property_photos WHERE id = '.$_GET['id'];
    $sel = mysql_query($selectPhoto);
    $getPhoto = mysql_fetch_array($sel);
    #print_r($getPhoto);
    if($getPhoto){
        if(unlink($upload_dir.$getPhoto['original'])){
            $delPhoto = 'DELETE FROM property_photos WHERE id = '.$getPhoto['id'];
            $sel = mysql_query($delPhoto);
            $data = 'Success';
        } else {
            $data = 'Error';
        }
    } else {
        $data = 'Error';
    }
} else {
    $data = 'Error';
}
echo $data;
exit;
?>
