<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));

if(isset($_FILES['image_param']['name'])){
	$uploadDir = '/public/img/';
	$uploadFile = $uploadDir . basename($_FILES['image_param']['name']); //Change file name if you want...
	if (move_uploaded_file($_FILES['image_param']['tmp_name'], SITE_ROOT.$uploadFile)) {
		header('Content-type: application/json');
		echo json_encode(['link' => $uploadFile]);
	} else {
		echo "Upload failed";
	}
}
?>