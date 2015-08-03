<?php
	require_once(__DIR__ . '/../vendor/autoload.php');

	$params = array();
	$params['client_id']            = '88473928796-na201krpoji4iacnr7mv90gu72jsl2r1.apps.googleusercontent.com';
	$params['service_account_name'] = '88473928796-na201krpoji4iacnr7mv90gu72jsl2r1@developer.gserviceaccount.com';
	$params['key']                  = __DIR__.'/../Drive-270b497d578f.p12';
	$params['sub']                  = 'jacob@mathisonprojects.com';
	$params['drive']				= '0BwAvSETHEv4nfk1ua0gwVXJDNllvRnNlSDlIdEZYN1hobTVXX3ZoU1BFREV0VHdFVFJGNjQ';

	$data = new \Divinityfound\GoogleDriveTree\Processor($params);

	echo '<pre>';
	print_r($data->file_tree);
	echo '</pre>';
	exit;
?>