<?php
/*
クイックソート
基準値(枢軸)よりも大きい値は右に小さい場合は左に移動させ、これを繰り返して
比較する配列を狭めていき、枢軸と比較ができなくなるまで繰り返す。
*/


function quickSort($arr,$left,$right){
    $pivot = $arr[$right];
    // 交差するまで繰り返し
    while($left < $right){
        $tmpLeft = null;
        $tmpRight = null;
        if($pivot > $arr[$left]){
            $tmpLeft = $arr[$left];
        }

        if($pivot < $arr[$right]){
            $tmpRight = $arr[$right];
        }

        if($tmpLeft !== null){
            // 左右どちらにも変更対象がある場合
            if($tmpRight !== null){
                // 配列内の値を交換
                $arr[$right] = $tmpLeft;
                $right++;
                $left--;
            }
            // 左のみに変更対象がある場合
            else{
                $right++;
            }
        }else{
            // 右のみに変更対象がある場合
            if($tmpRight !== null){
                $left--;
            }
            // どちらにも変更対象がない場合
            else{
                $right++;
                $left--;
            }
        }
    }
}

?>
