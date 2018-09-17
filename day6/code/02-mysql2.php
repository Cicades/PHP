<?php  
//执行增改删语句

//1.建立数据链接
$connection=mysqli_connect('127.0.0.1','root','root','demo');
if (!$connection) {
	exit('<h1>链接数据库失败</h1>');
}
//2.执行查询语句
$query=mysqli_query($connection,'delete from test where id=1;');
if (!$query) {
	exit('执行查询语句失败！');
}
//3.拿到受影响的行数
$rows_affected=mysqli_affected_rows($connection);
var_dump($rows_affected);
//4.关闭数据库链接
mysqli_close($connection);