<?php
	require_once(__DIR__ . '/../vendor/autoload.php');

	$data = new \Divinityfound\CredentialsKeysApi\Processor();

	$creds = array('user' => 'divinityfound', 'pass' => 'password');
	$keys  = array('paypalemail' => 'jmathison@bitbasic.com','paypalpassword' => 'testpassword');

	echo $data->setCredentials($creds)->setKeys($keys)->returnData();
?>