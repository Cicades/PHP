<?php 

//读取文件的内容
//将内容复制到一个字符串
$content=file_get_contents('names.txt');
//将字符串分割，按照换行分割
$lines=explode("\n",$content);
//遍历每一行分别解析解析每一行中的数据
//同时定义一个数组接收便利后的数组
foreach ($lines as $item) {
	if (!$item) {
		# code...
		continue;
	}
	$cols=explode("|",$item);
	$data[]=$cols;
}
 ?>
 <html>
 <head>
 	<title>names</title>
 </head>
 <body>
 <h1>全部人员信息表</h1> 
 <table>
<thead>
	 <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>年龄</th>
        <th>邮箱</th>
        <th>网址</th>
      </tr>
</thead>
<tbody>
	<?php foreach ($data as $lines): ?>
	<tr>
		<?php foreach ($lines as $cols): ?>
			<?php $cols=trim($cols) ?>
			<?php if (strpos($cols, 'http://') === 0): ?>
				<td><a href="<?php echo strtolower($cols); ?>"><?php echo substr($cols,7); ?></a></td>
			<?php else: ?>
				<td><?php echo $cols; ?></td>
			<?php endif ?>
		<?php endforeach ?>
	</tr>	
	<?php endforeach ?>
</tbody>
 </table>
 </body>
 </html>