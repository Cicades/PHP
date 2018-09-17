<?php

function upload()
{
    //var_dump($_FILES['avatar']); 上传的文件信息存储在$_FILES全局数组中，且其信息是一个关联数组
    // array(5) { ["name"]=> string(10) "怪兽.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(27) "C:\Windows\Temp\php66BB.tmp" ["error"]=> int(0) ["size"]=> int(21980) }
    if (empty($_FILES['avatar'])) {
        $GLOBALS['message'] = '请选择文件上传！';
        return;
    }
    $avatar = $_FILES['avatar'];
    if ($avatar['error'] !== UPLOAD_ERR_OK) {//UPLOAD_ERR_OK===0;上传文件为空时 $avatar['error']===4;等于1时,上传文件超出php.ini规定的上传文件大小的限制
        $GLOBALS[message] = "上传文件失败！";
        return;
    }
    $source = $avatar['tmp_name']; //原文件信息
    $target = './uploads/' . $avatar['name'];
    if (file_exists('./uploads')) {
        $moved = move_uploaded_file($source, $target);
        if ($moved) {
            $GLOBALS['message'] = '上传文件失败！';
        }
    } else {
        if (mkdir('./uploads', 0700)) {
            $moved              = move_uploaded_file($source, $target);
            $GLOBALS['message'] = $moved ? '上传文件成功' : '上传文件成功！';
        } else {
            $GLOBALS['message'] = '创建文件目录失败！';
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    upload();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传测试</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<input type="file" name="avatar">
		<input type="submit">
	</form>
	<?php if (isset($GLOBALS['message'])): ?>
		<p>
			<?php echo $GLOBALS['message']; ?>
		</p>
	<?php endif?>
</body>
</html>