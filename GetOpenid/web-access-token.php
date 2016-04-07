<?php

$code = $_GET['code'];

if (!empty($code)){
	$appid = "wx4dc3ead692baf638";
	$appsecret = "4ab9048f380f805c08aee7aa6902d823";
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";

	$res = httpGet($url);

	echo $res;
}

/*==================Functions==================*/

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