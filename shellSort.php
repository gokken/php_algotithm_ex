<?php
    /*
    適当な間隔をあけた飛び飛びのデータ列に対してあらかじめソートしておき、挿入ソートを適用する
    今回の間隔は
    h(n+1) = 3h(n) + 1 という条件で選び出した数列 1, 4, 13, 40, 121, ...
    h(1) = 1
    このhの中から配列のサイズ / 9の値以下にすると効率が良い。
    */

    function shellSort(&$arr,$increment){
        while($increment > 0){
            $arr_size = count($arr);
            for($i = 0; $i < $arr_size - $increment; $i++){
                $arr_tmp = $arr[$i];
                for ($j = $i; $j < $arr_size - $increment; $j += $increment) {
                    if($arr[$i] > $arr[$j + $increment]){
                        $arr[$i] = $arr[$j + $increment];
                        $arr[$j + $increment] = $arr_tmp;
                    }
                }
            }
            $increment = intval($increment/2);
        }

    }

    define('INCREMENT',4);
    $numbers = range(1, 8);
    shuffle($numbers);
    shellSort($numbers,INCREMENT);
?>
