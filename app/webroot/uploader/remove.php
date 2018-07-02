<?php
$data = '';
$upload_dir = '../task_images/';
if(isset($_GET['img']) && $_GET['img']!=''){
    if(unlink($upload_dir.$_GET['img'])){
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
