<?php
	$name='root';
	$password='root';
	function post_back(){
		global $name;
		global $password;
		if (empty($_POST['name'])) {
			exit('请输入用户名！');
		}
		if (empty($_POST['password'])) {
			exit('请输入密码！');
		}
		if ($_POST['name']===$name) {
			if ($_POST['password']!==$password) {
				exit('密码错误！');
			}else exit('登录成功！');
		}
	}
	if ($_SERVER['REQUEST_METHOD']==='POST') {
		post_back();
	}