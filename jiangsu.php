<?php
$id = isset($_GET['id'])?$_GET['id']:'jsws';
/*
江苏卫视id=jsws
江苏城市id=jscs
江苏公共新闻id=jsgg
江苏综艺id=jszy
江苏影视id=jsys
江苏体育id=jsty
江苏教育id=jsjy
江苏学习id=jsxx
江苏靓妆id=jslz
江苏国际id=jsgj
好享购物id=hxgw
优漫卡通id=ymkt
*/
$e = 'https://live-hls.jstv.com/livezhuzhan/'.$id.'.m3u8';
$a = '/livezhuzhan/'.$id.'.m3u8';
$r = "jstvlivezhuzhan@2022cdn!@#124gg";
$i = time()+300;
$d = substr(md5($r."&".$i."&".$a),12,8).$i;
$m3u8 = $e."?upt=".$d;
header('location:'.$m3u8);
//echo $m3u8
?>
