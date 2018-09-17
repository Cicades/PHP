<?php
//当表单提交时才执行以下代码
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>01-form</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
	<!--为了增强程序的鲁棒性，即不要将action的地址写死，使用超全局变量-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    	<ul>
    		<li>姓名：<input type="text"></li>
    		<li>密码：<input type="passwo"></li>
    		<li><button>提交</button></li>
    	</ul>
    </form>
</body>
</html>