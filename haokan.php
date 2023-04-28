<?php
$id=$_GET['id'];
$hkurl = file_get_contents("https://haokan.baidu.com/v?vid={$id}");
$pattern = '/{"key":"sc"[\s\S]+?url":"(.*?)","/';
preg_match($pattern,$hkurl,$match);
$hkdata = $match[1];
$play = str_replace("\/","/",$hkdata);
header('location:'.$play);
?>
