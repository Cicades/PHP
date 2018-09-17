<?php  
$data = array(
	array(
	'id' =>1,
	'name' =>'张三',
	'age' =>18) ,
	array(
	'id' =>2,
	'name' =>'李四',
	'age' =>18) ,
	array(
	'id' =>3,
	'name' =>'王五',
	'age' =>18) ,
	array(
	'id' =>4,
	'name' =>'二柱子',
	'age' =>18) 
);
if (empty($_GET)) {
	$json=json_encode($data);
	echo($json);
}elseif (isset($_GET['id'])) {
	foreach ($data as $item) {
		if ($item['id']!=$_GET['id']) {
			continue;
		}
		echo(json_encode($item));
	}
}