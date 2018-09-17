<?php
/**
 * 
 */
header("Content-Type:text/html");
class Person
{
	public	$name;
	public	$age;
	public	$gender;
	const PI='3.1415026';//创建常量
	function __set($propName,$propValue)
	{
		# code...支持动态创建属性
	}
	function __construct($name,$age,$gender)
	{
		$this->name=$name;
		$this->age=$age;
		$this->gender=$gender;
	}
}
$per=new Person('cicades',18,'male');
echo $per->name.'<br>';
//访问常量
echo $per::PI.'</br>';
//class_alias()--为函数取别名
class_alias('Person','Student');
//class_exists()--是否存在某类型
var_dump(class_exists('Person'));
//了解所有声明的class
//var_dump(get_declared_classes());
//clone 对象
$per1=clone $per;
$per1->name='hyf';
echo "per1的name:".$per1->name.'--clone--'.'per的name:'.$per->name;