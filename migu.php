<?php
$url = "http://webapi.miguvideo.com/gateway/playurl/v3/play/playurl?contId=".$_GET[id]."&rateType=3";
        $ch = curl_init();  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_URL, $url);
    $re = curl_exec($ch);
curl_close($ch);
header('Location:'.json_decode($re)->body->urlInfo->url);
?>
