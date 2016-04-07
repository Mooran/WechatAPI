<?php

namespace app;

class Wechat {
	private $access_token;
	private $app_id;
	private $app_secret;

	function __construct($app_id,$app_secret){
		$this->appId = $appId;
		$this->app_secret = $app_secret;
	}

	function getAccessToken(){
		if(!empty($this->access_token)){
			return $this->access_token;
		} else if (true) {
			//判断缓存是否存在,或者过期 TODO
		} else{
			//都不存在则请求微信服务器获取
		}
	}


}

?>