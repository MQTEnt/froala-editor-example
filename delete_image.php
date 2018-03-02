<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
if(isset($_POST['deletedImage'])){
	if(unlink(SITE_ROOT.$_POST['deletedImage']))
		echo json_encode(['status' => 1]);
	else
		echo json_encode(['status' => 0]);
}
?>