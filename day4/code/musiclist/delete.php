<?php
$old_data=json_decode(file_get_contents('data.json'),true);
foreach ($old_data as $item) {
	if ($item['id']!==$_GET['id']) {
		continue;
	}
	array_splice($old_data, array_search($item, $old_data),1);
	file_put_contents('data.json',json_encode($old_data));
	header('Location:list.php');
}

