<?php 
	//为解决if else嵌套过深的问题，可以定义一个函数 才用return 的方式来实现功能
	function post_back(){
		global $message;//声明全局变量，与html混编的调用
		if(empty($_POST['name'])){
			$message = "请输入用户名";
			return;
		}
		if (empty($_POST['password'])) {
			$message='请输入密码！';
			return;
		}
		if (empty($_POST['comfirm'])) {
			$message= '请确认密码';
			return;
		}
		if ($_POST['password']!==$_POST['comfirm']) {
			$message= "两次输入的密码不一致！";
			return;
		}
		if (isset($_POST['agree'])&&$_POST['agree']==='on') {
			$message='注册成功';
			$username=$_POST['name'];
			$password=$_POST['password'];
			file_put_contents('names1.txt', $username.'|'.$password."\n",FILE_APPEND);
		}
	}
	if ($_SERVER['REQUEST_METHOD']==='POST') {
		post_back();
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
			<?php if (!empty($message)): ?>
				<li>
					<?php echo $message ?>
					</li>
			<?php endif ?>
			<li>
				<input type="submit">
			</li>
		</ul>
		</form>
	</div>
</body>
</html>