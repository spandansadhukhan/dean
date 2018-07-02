<?php
require('extras/Uploader.php');
$upload_dir = '../task_images/';
$valid_extensions = array('gif', 'png', 'jpeg', 'jpg');
$Upload = new FileUpload('uploadfile');
$ext = $Upload->getExtension(); // Get the extension of the uploaded file
$Upload->newFileName = uniqid().'.'.$ext;
$result = $Upload->handleUpload($upload_dir, $valid_extensions);
if (!$result) {
    echo json_encode(array('success' => false, 'msg' => $Upload->getErrorMsg()));   
} else {
    echo json_encode(array('success' => true, 'file' => $Upload->newFileName));
}
?>