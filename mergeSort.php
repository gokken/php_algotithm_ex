<?php
/*
マージソート
分割統治法で解く
配列の全要素をマージソートする関数を定義すると
全要素のソートは左半分のソートと右半分のソートをしてこの左と右の要素を比較して並び替えるとできる。
*/

function mergeSort(&$arr,$first,$last){
    if($first < $last){
        $m = intval(($first+$last)/2);
        $p = 0;
        $j = 0;
        $k = $first;
        $tmp = null;
        var_dump($m);
        mergeSort($arr,$first,$m);
        mergeSort($arr,$m+1,$last);

        for($i = $first;$i <= $m; $i++){
            $tmp[$p++] = $arr[$i];

        }

        while($i <= $last && $j < $p){
            if($tmp[$j] <= $arr[$i]){
                $arr[$k] = $tmp[$j];
                $k++;
                $j++;
            }else{
                $arr[$k] = $arr[$i];
                $k++;
                $i++;
            }
        }
        //余っている待避配列があれば、全て並び替えの対象配列に追加する
        while ($j < $p) {
            $arr[$k++] = $tmp[$j++];
        }
    }
}


$numbers = range(1, 8);

shuffle($numbers);
mergeSort($numbers,0,count($numbers))-1;

var_dump($numbers);


?>
