<?php
function foo()
{
	$arr[]='name';
	$arr[]='gender';
	$arr[]='age';
	return $arr;
}
list($name,$gender,$age)=foo();//运用list结构可以接受从函数返回的多个返回值
echo "$name,$gender,$age";