<?php
$url = "www.baidu.com";//以百度为例
$data = array();
$curl = curl_init();//初始化一个curl会话；

curl_setopt($curl,CURLOPT_URL,$url);//指定访问的url

curl_setopt($curl,CURLOPT_POST,$data);//post请求的参数，

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);//获取的信息以文件流的方式返回

$data = curl_exec($curl);//执行curl;
var_dump($data);
curl_close($curl); // 关闭CURL会话

?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?><?php
 phpinfo();
?>