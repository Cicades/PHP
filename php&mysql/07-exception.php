<?php
//一,错误管理
//error_reporting 指令确定敏感的级别，共有十六级别
//error_reporting=E_ALL&E_STRICT;设置其报告所有错误
//error_reporting=E_ERROR|E_PARSE|E_CORE_ERROR;只考虑致命的运行时的错误，解析错误和核心错误
//error_reporting=E_ALL&~E_USER_WARNING;//报告除用户导致的错误之外的所有的错误
//display_errors 启用时将显示满足error_reporting所定义规则的所有错误

//二,异常处理
//2.1扩展基类
//默认构造函数——throw new Exception();
//2.2重载构造函数
//throw new Exception(message,errocode,Exception)
//2.3异常类的方法
//	getCode()返回传递给构造函数
//	getFile（）返回抛出异常的文件名
//	getLine（）返回抛出异常的行号
//	getMessage()返回构造函数的消息
//	getPrevious()返回前一个异常
//	getTrace（）
try {
	if (empty($var)) {
		throw new Exception("Error Processing Request", 1);
		
	}
} catch (Exception $e) {
	echo "Warning:"."<br>FileName:".$e->getFile()."<br>Line:".$e->getLine()."<br>Reason:".$e->getMessage();
}
//2.4可以通过继承来扩展Exception基类