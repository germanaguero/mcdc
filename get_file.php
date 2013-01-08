<?php
require_once("controllers/".basename($_SERVER['PHP_SELF']));
//require_once("inlcudes/config.php");

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header("Content-Disposition: attachment; filename=\"" . $file_name . "\";");
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . $file_size);
	readfile($url_download);

  
?>