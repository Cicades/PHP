<?php  

//引用其他php文件 要使用require指令，每一次require都会载入文件
//require 'constant.php';
//echo(SYSTEM_NAME);

//require_once 如果之前载入过，不再执行
//require 特点：一旦被载入的文件不存在就会报一个错，当前文件不在往下执行
//include 特点：载入的文件不存在时不会报错误（会有警告），当前文件继续执行
//include_once
require_once 'constant.php';
echo SYSTEM_NAME;