## 关于php中上传文件路径的编码问题

* `move_uploaded_file()`在windows中文系统中传入参数如果有中文必须是GBK编码
* 可以通过iconv（）函数将路径的编码方式进行转换`  string **iconv**    ( string `$in_charset`(原有编码格式)   , string `$out_charset`（需要转化成的编码格式）   , string `$str（需要转码的字符串）`   )`
* json_encode()——只能传入utf-8编码格式的字符串