<?php
$m3u8 = json_decode(file_get_contents('http://http://stream.jinjiang.tv/1/sd/channel_info.php?id=4'))[0]->m3u8;
header('location:'.$m3u8);
//echo $m3u8;
?>
