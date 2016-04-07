# WechatAPI
WechatAPITest

# 目录结构
- /html 前段代码  
- /api  php后端代码

# 说明
- 前段可以通过调用api获取openid url:/api/web-access-token.php  
需要传入code参数  
返回json数据如下：
<pre>
  "access_token":"ACCESS_TOKEN",    
   "expires_in":7200,    
   "refresh_token":"REFRESH_TOKEN",    
   "openid":"OPENID",    
   "scope":"SCOPE"
</pre>
- 前段可以通过调用api获取signpackage(包括:jssdk)  
需要传递当前URL参数
返回json数据如下
<pre>
{"appId":APPID,  
"nonceStr":NONCESTR,  
"timestamp":TIMESTAMP,  
"url":URL,  
"signature":SIGNATURE,  
"rawString":RAWSTRING}
</pre>
