
<?php 

//获取字符串长度
$str='hello';
echo strlen($str);
echo '<br>';
$str1='你好';
//获取中文字符串的长度
//strlen 只能获取拉丁文字符的长度
//php专门为中文添加了一套宽字符API，且其开头都是mb_xxx,这一套API不在内置API中，模块成员必须通过配置文件载入模块过后才能使用
//添加拓展模块步骤：1.在php中添加php.ini 2.修改php.ini——修改extension_dir;将mbstring拓展前的注释取消 3.在Apache配置文件中修改php.ini 的默认加载路径
echo mb_strlen($str1).'=>获取中文字符串的长度';
