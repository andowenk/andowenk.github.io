<?php
$m = curl_init("https://m.1905.com/m/1905tv/live/");
curl_setopt($m,CURLOPT_RETURNTRANSFER,1);
curl_setopt($m,CURLOPT_HTTPHEADER,array('User-Agent: Mozilla/5.0'));
$r = curl_exec($m);
curl_close($m);
preg_match("/video:\'(.*?)\'/",$r,$matches);//print_r($matches);
$playurl=$matches[1];
header('Location:'.$playurl);
?>
