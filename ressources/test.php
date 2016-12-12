<?php
$tableau = '1,2,3';
$test = explode(',',$tableau);
$tableau = '4,5,6';
$test .= explode(',',$tableau);


var_dump($test);
