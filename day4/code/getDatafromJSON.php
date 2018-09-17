<?php 
 $contents=file_get_contents('musiclist/data.json');
 $data=json_decode($contents);//json_decode——解码，第一参数是需要解码得json格式变量，第二个是boolean类型，控制转化后得数据格式是关联数组还是对象，默认是对象
 var_dump($data);