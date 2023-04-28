<?php
$post ='{
  "cid": 999998,
  "streamname": "LIVE8J4LTCXPI7QJ5",
  "uuid": "20656898-3503-4653-bd43-ef4de99a6742",
  "playerid": "769103598897194",
  "nonce": 1657667691,
  "expiretime": 1657668291,
  "page": "https://m.1905.com/m/1905tv/live/"
}';
$ch = curl_init('https://profile.m1905.com/mvod/liveinfo.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: 1e185ed05931910d7691b0cd57495a29d75684e1','Content-Type: application/json'));
$data = curl_exec($ch);
curl_close($ch);
$json=json_decode(trim($data,'()'));
$host=$json->data->quality->hd->host;
$path=$json->data->path->hd->path;
$sign=$json->data->sign->hd->sign;
$playurl=$host.$path.$sign;
header("Location: ".$playurl);
