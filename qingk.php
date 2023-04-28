<?php
$id = isset($_GET['id']) ? $_GET['id'] : 'bszh';
$ids = array(
'bszh' => 'afxdfauvqqaxsppawwwutbfaufcbxbcv,acf2f96ab0c04d058964deea70349131', //百色综合 广西
'bsgg' => 'afxdfauvqqaxsppawwwutbfaufcbxbcv,571ee81f938e4b14a2e8d0401c8732fa', //百色公共 广西

'ggxwzh' => 'wuawtopbuaoostdpxwttxpdqawqqtbts,2a967944b6044b82b54e09e401f83842', //贵港新闻综合 广西
'gggg' => 'wuawtopbuaoostdpxwttxpdqawqqtbts,5f0da857c243451fb7ab65f5794a62e7', //贵港公共

'ylxwzh' => 'pdrttpsppesoswpfwoedvvfdquxuvasr,482a6d3bc92548268b3494fb92ec3182', //仪陇新闻综合 四川

'sfxwzh' => 'swaofvcwrtrpsxcsxessuteufxfbtfap,1bd7e54d26814488a712a0308f49ff71', //什邡新闻

'hjxwzh' => 'redrsfeoowcpsfabwtobdecouoascwpx,216c7d55a07247549bd4e8ec616e994e', //合江新闻综合 四川

'nxxwzh' => 'fbortdcpobebscoraaedwbstvpccqqfb,2600f723b8a549bcb99e445f72863a3d', //纳溪新闻综合 四川

'qtzh' => 'xwoctcwsxsqbsrpfadxvretxdvxrdetr,0fde9b839bb64f45b10b8f60b7896838', //奇台综合
);
list($a, $p) = explode(',', $ids[$id]); // Split the second value in the array on the comma
$u = 'FB41F7EB7F000001574CE76DDB81FF49'; // udid固定值
date_default_timezone_set("Asia/Shanghai");//默认时区(亚洲上海)
$t = date("YmdHis");
$sign = md5('sign'.$a.$u.$t.'sign');
$postdata = 'timestamp='.$t.'&appid='.$a.'&os=android&terminal=2&udid='.$u.'&sign='.$sign.'&programId='.$p.'&programType=liveVideo';
$url = 'https://api.qingk.cn/jkplatform/v1/mediaPlayer/getPlayerUrl';
$m = curl_init();//初始化一个新的会话，返回一个cURL句柄，供设置函数curl_setopt(), 执行函数curl_exec()和关闭会话函数curl_close() 使用
curl_setopt($m, CURLOPT_URL, $url);//设置取回页面信息的URL地址
curl_setopt($m, CURLOPT_POST, 1);//设置获取数据的方法为post，真
curl_setopt($m, CURLOPT_RETURNTRANSFER, 1);//1 设置获取的信息不是直接输出;0 直接输出
curl_setopt($m, CURLOPT_REFERER,'http://z.qingk.cn/');//设置一个伪造来源
curl_setopt($m, CURLOPT_POSTFIELDS, $postdata);//URL的数据参数
$data = curl_exec($m);//执行给定的会话
curl_close($m);//关闭会话(不要这一行也可，但耗内存）
$obj = json_decode($data);
if ($obj === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON decoding failed with error: " . json_last_error_msg();
    exit;
}
if (isset($obj->results->body->SDUrl)) { // Check for errors before accessing properties
    $playurl = $obj->results->body->SDUrl ;//获取数据的某值,这里是播放线路SDUrl的值。
    header('location:'.$playurl);//将获得的某值输出到浏览器地址栏。
} else {
    echo "Error: Could not retrieve the player URL.";
}
?>
