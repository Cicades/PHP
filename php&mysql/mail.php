<?php
//需要配置SMTP服务器
$mail='1499812174@qq.com';
$subject='test';
$message='hello world';
ini_set('SMTP', 'localhost');
ini_set('smtp_port', '25');
mail($mail, $subject, $message);