<?php
function iteration($num)
{
	return $num==1?1:$num*iteration($num-1);
}
echo iteration(10);		