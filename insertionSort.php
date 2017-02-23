<?php
/*
単純挿入ソート
ソート済みの部分にソートされていない部分から要素を適切な位置に挿入(insert)することでソートする。
最初はソート済みが 0個から始まる。
*/

function insertionSort(&$arr){
    $arr_size = count($arr);
    for($i = 0;$i < $arr_size; $i++){
        $arr_tmp = $arr[$i];
        for($j = $i;$j < $arr_size; $j++){
            if($arr[$i] > $arr[$j]){
                $arr[$i] = $arr[$j];
                $arr[$j] = $arr_tmp;
                $arr_tmp = $arr[$i];
            }
        }
    }
}

$numbers = [4,3,5,6,7,2,1,8,9];
insertionSort($numbers);
var_dump($numbers);

?>
