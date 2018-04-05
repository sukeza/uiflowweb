<?php
	$data = isset($_POST['data']) ? $_POST['data']:(isset($_GET['data']) ? $_GET['data']:"");
	$data = urldecode($data);
	$data = str_replace("\n", "\\n", $data);
	$cmd = 'export NODE_PATH=/usr/local/bin/node;export PATH=$PATH:/usr/local/bin; echo -e "' . $data . '" | /usr/local/bin/uiflow -i /dev/stdin -o /dev/stdout -f svg';
//	error_log($cmd);
	header('Content-Type: image/svg+xml');
	ob_start();
    passthru($cmd);
    $output = ob_get_contents();
    ob_end_clean();
	echo $output;
?>

