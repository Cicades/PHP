<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>利用cookie关掉广告案例</title>
	<style>
		div{
			width: 400px;
			height: 300px;
			background-color: #EEFF08;
			position: relative;
			margin: 30px;
		}
		a{
			display: block;
			height: 30px;
			width: 30px;
			background-color: white;
			border-radius: 15px;
			text-align: center;
			line-height: 30px;
			color: red;
			font-weight: bolder;
			font-size: 25px;
			text-decoration: none;
			position: absolute;
			left: 385px;
			top: -15px;
		}
	</style>
</head>
<body>
	<?php if (empty($_COOKIE['close'])||$_COOKIE['close']!=='1'): ?>
	<div>
		<a href="close-ad.php">×</a>
	</div>
	<?php endif ?>
</body>
</html>