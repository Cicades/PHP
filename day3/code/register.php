<?php 
	//为解决if else嵌套过深的问题，可以定义一个函数 才用return 的方式来实现功能
	if ($_SERVER['REQUEST_METHOD']==='POST') {
		if(empty($_POST['name'])){
			echo "请输入用户名";
		}elseif (empty($_POST['password'])) {
			echo('请输入密码！');
		}elseif (empty($_POST['comfirm'])) {
			echo('请确认密码');
		}elseif ($_POST['password']!==$_POST['comfirm']) {
			echo "两次输入的密码不一致！";
		}elseif (isset($_POST['agree'])&&$_POST['agree']==='on') {
			$username=$_POST['name'];
			$password=$_POST['password'];
			file_put_contents('names.txt', $username.'|'.$password."\n",FILE_APPEND);
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>register</title>
</head>
<style>
	.wrap{
		list-style: none;
		background: aqua;
		color: white;
		width: 400px;
		height: 200px;
		padding: 10px;
	}
	.wrap ul{
		list-style: none;
	}
	.wrap ul>li{
		margin: 5px;
	}
</style>
<body>
	<div class="wrap">
		<form action="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<ul>
			<li>
				<lable>
					用户名：
					<input type="text" name="name" value="<?php echo isset($_POST['name'])? $_POST['name']:'' //获取上一次传入表单的username的值?>"></lable>
			</li>
			<li>
				<lable>
					密码：
					<input type="password" name="password"></lable>
			</li>
			<li>
				<lable>
					确认密码：
					<input type="password" name="comfirm"></lable>
			</li>
			<li>
				<lable>
					同意注册协议：
					<input type="checkbox" name="agree"></lable>
			</li>
			<li>
				<input type="submit">
			</li>
		</ul>
		</form>
	</div>
</body>
</html>