<?php
if(isset($_POST['btn_submit'])):
	$content = $_POST['editor_content'];
	echo "WHAT YOU POST IS: ";
	echo "<br>";
	echo htmlspecialchars($content);
else:
	include_once('editor.php');
endif;
?>