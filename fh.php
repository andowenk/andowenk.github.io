<?php
$id = $_GET['id'];
$url_data = "http://m.fengshows.com/api/v3/live?live_type=tv&page=1&page_size=15";
$con = file_get_contents($url_data);
preg_match_all('/"live_url_fhd":"(.*?)"/', $con, $data);
preg_match('/http(.*?)flv/', $data[0][0], $zx);
preg_match('/http(.*?)flv/', $data[0][1], $zw);
preg_match('/http(.*?)flv/', $data[0][2], $hk);
$ids = array(
            "zx"=> substr($zx[0],-12,8),
            "zw"=>substr($zw[0],-12,8),
            "hk"=>substr($hk[0],-12,8),
        );
//$host = substr($zx[0],0,29);
preg_match('/http(.*?)\d{4}\//', $data[0][0], $host);
$hexString = dechex(time()+1800);
$substring = $ids[$id];
$str2 = "obb9Lxyv5C/live/".$substring.$hexString;
$url = $host[0].'live/'.$ids[$id].'.flv?txSecret='.md5($str2).'&txTime='.$hexString;
header('Location: '.$url);
?>
