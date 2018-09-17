<?php 

//php 中可以通过define函数定义一个常量define(const_name,const_value,[boolean]),true-忽略大小写，默认为false
//常量的特点：定义后不能被修改 不能被重复定义
//什么时候用常量：一般程序的配置信息都会在常量中定义

//常量或者函数：php命名法都是采用snake_case(小写字母加下划线)
//常量名称：SNAKE_CASE
define('SYSTEM_NAME', '阿里百秀');

//echo(SYSTEM_NAME);