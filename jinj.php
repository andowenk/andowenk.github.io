<?php
$m3u8 = json_decode(file_get_contents('http://www.jinjiang.tv/m2o/channel/channel_info.php?id=4'))[0]->m3u8;
header('location:'.$m3u8);
//echo $m3u8;
?>
