<?php 
$conn=mysqli_connect('127.0.0.1','root','root','demo');
$query=mysqli_query($conn,'select * from test');
while ($col=mysqli_fetch_assoc($query)) {
	$data[]=$col;
}
header('Content-Type:application/javascript');
$callback=$_GET['callback'];
$json=json_encode($data);
if (isset($callback)) {
	echo "typeof {$callback}&&{$_GET['callback']}({$json})";
}else{
	echo $json;
}


