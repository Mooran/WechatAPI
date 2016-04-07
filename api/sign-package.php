<?php

require_once('functions.php');

$url = isset($_GET['url'])?$_GET['url']:null;

if (!empty($url)){
	$jssdk = new JSSDK\jssdk("wx4dc3ead692baf638","4ab9048f380f805c08aee7aa6902d823");
	$SignPackage = $jssdk->getSignPackage($url);
	echo json_encode($SignPackage);
}

//snsapi_base_authorize("wx4dc3ead692baf638","4ab9048f380f805c08aee7aa6902d823");
