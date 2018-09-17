<?php
//key()--函数返回数组当前指针所在位置的键
//next()--数组指针移动至下一个位置,并返回值
//prev()--将指针移动至前一个位置，并返回值
//current--返回数组当前指针所在位置的值
$arr=array('name','gender','age');
while ($value=current($arr)) {
	echo $value;
	next($arr);
}
echo "\n";
//reset()--将数组指针设置回到数组开始的地方，并返回值
var_dump(reset($arr));
//end()--将数组指针设置数组的最后一个位置，并返回最后一个元素
array_walk($arr, function($value,$key){
	echo "$key---$value";
});
//count() sizeof（）--返回数组中值的总数  count(arrar array [,int mode])--启用mode参数，将其设置为1，数组将进行递归计数