<?php
/**
 * 元字符的使用
 * 1.\A	只匹配字符串开头
 * 2.\b	只匹配单词边界(border)
 * 3.\B 匹配除单词边界之外的任意字符
 * 4.\d	数字字符[0-9](digital)
 * 5.\D 非数字字符
 * 6.\s 匹配空白字符(space)
 * 7.\S 非空白字符
 * 8.\w 数字字母下划线字符(非特殊字符)
 * 9.\W 非数字字母下划线字符(特殊字符)
 */

//PHP正则表达式函数
//1.preg_grep 搜索数组，返回值是匹配到的字符组成的数组
$items=array('paste','steak','fish','potatoes');
$food=preg_grep('/^p/', $items);
var_dump($food);//返回数组的对应的索引对应被搜索数组的索引
//2.搜索模式
$flag=preg_match('/\bvim\b/i', 'i love vim');
if ($flag) {
	echo "<br>sucessful match";
}
//3.匹配所有出现模式，preg_match_all()将在字符串中匹配到的结果存入到一个数组当中
//4.替换匹配模式的字符串 preg_replace()


