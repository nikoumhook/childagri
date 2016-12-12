<?php
$tableau = '1,2,3';
$test['repas'] = explode(',',$tableau);
$tableau = '4,5,6';
$test = explode(',',$tableau);


var_dump($test);


$te = [
        1   =>  '1,2,3',
        2   =>  '2,4,6'
];

$s = serialize($te);
var_dump($s);

echo '----------------';

$u = unserialize($s);

var_dump($u);
