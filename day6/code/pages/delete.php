<?php
$id=$_GET['id'];
$conn=mysqli_connect('127.0.0.1','root','root','demo');
if (!isset($conn)) {
  exit();
  $message_err = '链接数据失败！';
}
$query=mysqli_query($conn,"delete from users where id in ({$id})");
header('Location:index.php');