<?php  
//执行查询语句

//1.建立数据库连接,此函数不在内置函数内，需要引入扩展
//在调用函数的前面加上'@'会忽略警告；
$connection=mysqli_connect('127.0.0.1','root','root','demo');
//2.在查询链接对象之前传入对象和编码格式
mysqli_set_charset($connection,'utf8');
if (!$connection) {
	echo('连接数据库失败！');
	exit();
}
//3.执行查询语句，产生查询结果集
$query=mysqli_query($connection,'select * from test;');
if (!$query) {
	echo('查询失败');
	exit();
}
var_dump($query);
//4.接受查询数据
while ($row=mysqli_fetch_assoc($query)) {
	$rows[]=$row;
}
//5.释放查询结果集
mysqli_free_result($query);
//6.关闭数据库链接
mysqli_close($connection);
