<?php

function __autoload($classname){
	$classpath="./".$classname.'.php';
	 if(file_exists($classpath)){
	  require_once($classpath);
	 }
	 else{
	  echo 'class file'.$classpath.'not found!';
	 }
}
function getCurrentUrl(){
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$current_url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	return $current_url;
}

// $jssdk = new JSSDK\jssdk("wx4dc3ead692baf638","4ab9048f380f805c08aee7aa6902d823");
// $SignPackage = $jssdk->getSignPackage($url);

// var_dump($SignPackage);

function snsapiBaseAuthorize($appid,$appsecret){
	$current_url = getCurrentUrl();
	if (isset($_GET['code'])){
		$code = $_GET['code'];
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
		$userinfo = json_decode ( httpGet($url) );
		echo $userinfo->openid;
	}else{
		$redirect_uri = urlencode($current_url);
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
		header("Location: $url");
	}

}

snsapi_base_authorize("wx4dc3ead692baf638","4ab9048f380f805c08aee7aa6902d823");

function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_URL, $url);
    $res = curl_exec($curl);
    // $errno = curl_errno( $curl );
    // echo $errno;
    curl_close($curl);

    return $res;
}