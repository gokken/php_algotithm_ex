<?php

    /*
    Boyer Moore法
    見つけたい文字(パターン)の末尾から探していく
    テキストの頭から進める。
    パターンに含まれて居ない文字の場合はパターンの数分ずらす
    パターンに含まれている場合は、最小限の移動
    */
    bm_search(['a','a','a','x','a','x','y','a','x','y','z','y','z'],range('x','z'));
    bm_search(['a','a','a','x','a','x','y','a','x','y','z','y','z'],range('x','y'));
    function bm_search($text,$pattern){
        $pattern_length = count($pattern);
        // ステップ数
        $count = 0;
        // パターンマッチの判定フラグ
        $match_frag = false;
        // 現在位置を表す変数
        $text_current = $pattern_length;
        $time_start = microtime(true);
        while (!$match_frag){
            $count++;
            $tp_diff = $text_current - $pattern_length;
            // 現在位置がパターンと照合するか確認
            for($i = $text_current - 1; $i >= $tp_diff; $i--){
                var_dump("i: ".$i);
                if($pattern[$i] !== $text[$i]){
                    for($j = $i; $j >= $tp_diff; $j--){
                        // 末尾まで到着
                        if($j === $tp_diff){
                            // もしパターンと照合した場合
                            if($text[$i] === $pattern[$j]){
                                $text_current += $pattern_length - $j - 1;
                                $pattern = array_pad($pattern,-($text_current), null);
                                break;
                            }
                            $text_current += $pattern_length;
                            $pattern = array_pad($pattern,-($text_current), null);
                        // テキストの途中でパターンが一致
                        }else if($text[$i] === $pattern[$j]){
                            $text_current += $pattern_length - $j - 1;
                            $pattern = array_pad($pattern,-($text_current), null);
                        }
                    }
                    break;
                }else if($i === $tp_diff){
                    var_dump($i);
                    $match_frag = true;
                }
            }
        }
        $time = microtime(true) - $time_start;
        echo "Boyer Moore法: {$time}秒".PHP_EOL;
        echo "ステップ数: {$count}回";
    }
