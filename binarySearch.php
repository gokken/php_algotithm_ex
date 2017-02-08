<?php
/*
バイナリーサーチ
ソート済みのリストや配列に入ったデータに対する検索を行うにあたって、
中央の値を見て、検索したい値との大小関係を用いて、
検索したい値が中央の値の右にあるか、左にあるかを判断して、片側には存在しないことを確かめながら検索していく手法
 */
/*
問題
95400の値が配列にあるか調べよ。
 */

// 配列のサイズの指定
define('ARRAY_SIZE',1000000);
define('FIND_VALUE',954000);
$list = range(0,ARRAY_SIZE);
$left = 0;
$right = ARRAY_SIZE;
// バイナリーサーチ
$time_start = microtime(true);
while($left <= $right){
    $mid = ceil(($left + $right) / 2);
    if($list[$mid] === FIND_VALUE){
        echo "find!!!!!";
         break;
    }else if($list[$mid] > FIND_VALUE){
        $right = $mid - 1;
    }
    else{
        $left = $mid + 1;
    }
}
$time = microtime(true) - $time_start;
echo "バイナリーサーチ: {$time}秒";
$start = microtime(true);
// 順次探索
foreach($list as $value){
    if($value === FIND_VALUE){
        echo "find!!!!!";
        break;
    }
}
$endtime = microtime(true) - $start;
echo "順次探索: {$endtime}秒";
