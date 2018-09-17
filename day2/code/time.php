<?php 

 //time 获得是秒数为单位的时间戳
echo time();

//date 格式化一个时间戳
//第一参数是时间格式
//第二个参数是时间戳，默认是当前的时间戳
echo "<br>";
//默认时间是格林威治时间
//设置时区
date_default_timezone_set('PRC');
//可通过php.ini 配置时区
echo date('Y-m-d H:i:s',time());

//对已有时间做格式化
//strtotime可以将一个有格式的时间转换为一个时间戳
$date='1998-02-09 17:39:50';
echo "<br>";
$date1=date('Y年m月d日<b\r>H:i:s',strtotime($date));
echo($date1);